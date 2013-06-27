<?php

namespace Test\Net\Bazzline\Component\Requirement;

use Net\Bazzline\Component\Requirement\AndCondition;
use Net\Bazzline\Component\Requirement\Requirement;

/**
 * Test for Requirement class
 *
 * @author Jens Wiese
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

    public function testPassingOnOfDepencenciesToCondition()
    {
        $collection = \Mockery::mock('\Net\Bazzline\Component\Requirement\AndCondition');
        $collection->shouldReceive('setSomething')->with('someValue')->once();
        $collection->shouldReceive('getItems')->andReturn(new \SplObjectStorage());

        $this->requirement->addCondition($collection);
        $this->requirement->__call('setSomething', array('someValue'));
    }

    public function testPassingOnOfDepencenciesToItems()
    {
        $item1 = \Mockery::mock(new DummyItem());
        $item2 = \Mockery::mock(new DummyItem());
        $item2->shouldReceive('setSomething')->with('someValue')->once();

        $collection = new AndCondition();
        $collection->addItem($item1);
        $collection->addItem($item2);

        $this->requirement->addCondition($collection);
        $this->requirement->setSomething('someValue');
    }
}
