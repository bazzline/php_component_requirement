<?php

namespace Test\Net\Bazzline\Component\Requirement;

use Net\Bazzline\Component\Requirement\AndCondition;
use Net\Bazzline\Component\Requirement\Requirement;
use Mockery;

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

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-29
     */
    protected function tearDown()
    {
        Mockery::close();
    }

    public function testPassingOnOfDepencenciesToConditions()
    {
        $condition = $this->createCondition();
        $condition->shouldReceive('setSomething')->with('someValue')->once();
        $condition->shouldReceive('getItems')->andReturn(new \SplObjectStorage());

        $this->requirement->addCondition($condition);
        $this->requirement->__call('setSomething', array('someValue'));
    }

    public function testPassingOnOfDepencenciesToItems()
    {
        $item1 = Mockery::mock(new DummyItem());
        $item2 = Mockery::mock(new DummyItem());
        $item2->shouldReceive('setSomething')->with('someValue')->once();

        $condition = new AndCondition();
        $condition->addItem($item1);
        $condition->addItem($item2);

        $this->requirement->addCondition($condition);
        $this->requirement->setSomething('someValue');
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-29
     */
    public function testIsLocked()
    {
        $this->assertFalse($this->requirement->isLocked());
        $this->requirement->lock();
        $this->assertTrue($this->requirement->isLocked());
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Requirement is locked, no new condition could be added.
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-29
     */
    public function testLocking()
    {
        $condition = $this->createCondition();

        $this->requirement->lock();
        $this->requirement->addCondition($condition);
    }

    /**
     * @return \Mockery\MockInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-29
     */
    private function createCondition()
    {
        $condition = Mockery::mock('\Net\Bazzline\Component\Requirement\AndCondition');

        return $condition;
    }
}
