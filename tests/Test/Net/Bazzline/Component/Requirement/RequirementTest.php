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
class RequirementTest extends TestCase
{
    /** @var Requirement */
    protected $requirement;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $this->requirement = $this->getNewRequirement();
    }

    public function testPassingOnOfDependenciesToConditions()
    {
        $condition = $this->getMockAndCondition();
        $condition->shouldReceive('setSomething')->with('someValue')->once();
        $condition->shouldReceive('getItems')->andReturn(new \SplObjectStorage());

        $this->requirement->addCondition($condition);
        $this->requirement->__call('setSomething', array('someValue'));
    }

    public function testPassingOnOfDepencenciesToItems()
    {
        $item1 = Mockery::mock(new DummyItem());
        $item2 = Mockery::mock(new DummyItem());
        $item3 = Mockery::mock('Net\Bazzline\Component\Requirement\IsMetInterface');
        $item4 = Mockery::mock('Test\Net\Bazzline\Component\Requirement\DummyItem');

        $item1->shouldReceive('setSomething')->with('someValue')->once();
        $item2->shouldReceive('setSomething')->with('someValue')->once();
        $item4->shouldReceive('setSomething')->with('someValue')->once();

        $condition = new AndCondition();
        $condition->addItem($item1);
        $condition->addItem($item2);
        $condition->addItem($item3);
        $condition->addItem($item4);

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
        $condition = $this->getMockAndCondition();

        $this->requirement->lock();
        $this->requirement->addCondition($condition);
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-16
     */
    public function testIsDisabled()
    {
        $this->assertFalse($this->requirement->isDisabled());
        $this->requirement->disable();
        $this->assertTrue($this->requirement->isDisabled());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-16
     */
    public function testDisable()
    {
        $condition = $this->getMockAndCondition();
        $condition->shouldReceive('isMet')
            ->never();

        $this->requirement->addCondition($condition);
        $this->requirement->disable();

        $this->assertTrue($this->requirement->isMet());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-29
     */
    public function testGetConditions()
    {
        $conditionOne = $this->getMockAndCondition();
        $conditionOne
            ->shouldReceive('isMet')
            ->never();
        $conditionTwo = $this->getMockAndCondition();
        $conditionTwo
            ->shouldReceive('isMet')
            ->never();
        $expectedConditions = array(
            $conditionOne,
            $conditionTwo
        );

        $this->requirement
            ->addCondition($conditionOne)
            ->addCondition($conditionTwo);

        $availableConditions = (array) $this->requirement->getConditions();

        sort(array_values($expectedConditions));
        sort(array_values($availableConditions));

        $this->assertEquals(
            $expectedConditions,
            $availableConditions
        );
    }
}
