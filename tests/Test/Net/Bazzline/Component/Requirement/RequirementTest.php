<?php

namespace Test\Net\Bazzline\Component\Requirement;

use Net\Bazzline\Component\Requirement\AndCondition;
use Net\Bazzline\Component\Requirement\Requirement;

/**
 * Test for Requirement class
 *
 * @author Jens Wiese <jens@howtrueisfalse.de>
 * @since 2013-06-27
 */
class RequirementTest extends \PHPUnit_Framework_TestCase
{
    /** @var Requirement */
    protected $requirement;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $this->requirement = new Requirement();
    }

    public function testPassingOnOfDepencenciesToConditions()
    {
        $condition = \Mockery::mock('\Net\Bazzline\Component\Requirement\AndCondition');
        $condition->shouldReceive('setSomething')->with('someValue')->once();
        $condition->shouldReceive('getItems')->andReturn(new \SplObjectStorage());

        $this->requirement->addCondition($condition);
        $this->requirement->__call('setSomething', array('someValue'));
    }

    public function testPassingOnOfDepencenciesToItems()
    {
        $item1 = \Mockery::mock(new DummyItem());
        $item2 = \Mockery::mock(new DummyItem());
        $item2->shouldReceive('setSomething')->with('someValue')->once();

        $condition = new AndCondition();
        $condition->addItem($item1);
        $condition->addItem($item2);

        $this->requirement->addCondition($condition);
        $this->requirement->setSomething('someValue');
    }
}
