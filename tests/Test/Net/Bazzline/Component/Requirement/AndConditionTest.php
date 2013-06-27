<?php

namespace Test\Net\Bazzline\Component\Requirement;

use Net\Bazzline\Component\Requirement\AndCondition;

/**
 * Test for AndCondition
 *
 * @author Jens Wiese
 * @since 2013-06-26
 */
class AndConditionTest extends \PHPUnit_Framework_TestCase
{
    /** @var AndCondition */
    protected $condition;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $this->condition = new AndCondition();
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testConditionFailsWhenNoItemIsProvided()
    {
        $this->condition->isMet();
    }

    public function testConditionValidatesTrueWhenAllItemsValidate()
    {
        $item1 = \Mockery::mock('\Net\Bazzline\Component\Requirement\IsMetInterface')->shouldDeferMissing();
        $item1->shouldReceive('isMet')->andReturn(true);
        $item2 = \Mockery::mock('\Net\Bazzline\Component\Requirement\IsMetInterface')->shouldDeferMissing();
        $item2->shouldReceive('isMet')->andReturn(true);

        $this->condition->addItem($item1);
        $this->condition->addItem($item2);

        $this->assertTrue($this->condition->isMet());
    }

    public function testConditionFailsWhenOneItemDoesNotValidate()
    {
        $item1 = \Mockery::mock('\Net\Bazzline\Component\Requirement\IsMetInterface')->shouldDeferMissing();
        $item1->shouldReceive('isMet')->andReturn(true);
        $item2 = \Mockery::mock('\Net\Bazzline\Component\Requirement\IsMetInterface')->shouldDeferMissing();
        $item2->shouldReceive('isMet')->andReturn(false);

        $this->condition->addItem($item1);
        $this->condition->addItem($item2);

        $this->assertFalse($this->condition->isMet());
    }

    public function testConditionFailsWhenAllItemsDoNotValidate()
    {
        $item1 = \Mockery::mock('\Net\Bazzline\Component\Requirement\IsMetInterface')->shouldDeferMissing();
        $item1->shouldReceive('isMet')->andReturn(false);
        $item2 = \Mockery::mock('\Net\Bazzline\Component\Requirement\IsMetInterface')->shouldDeferMissing();
        $item2->shouldReceive('isMet')->andReturn(false);

        $this->condition->addItem($item1);
        $this->condition->addItem($item2);

        $this->assertFalse($this->condition->isMet());
    }
}
