<?php

namespace Test\Net\Bazzline\Component\Requirement;

use Net\Bazzline\Component\Requirement\OrCondition;

/**
 * Test for OrCondition
 *
 * @author Jens Wiese
 * @since 2013-06-26
 */
class OrConditionTest extends TestCase
{
    /** @var OrCondition */
    protected $condition;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $this->condition = $this->getNewOrCondition();
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testConditionFailsWhenNoItemIsProvided()
    {
        $this->condition->isMet();
    }


    public function testConditionValidatesTrueWhenAtLeastOneItemValidates()
    {
        $item1 = $this->getMockItem();
        $item1->shouldReceive('isMet')->andReturn(false);
        $item2 = $this->getMockItem();
        $item2->shouldReceive('isMet')->andReturn(true);

        $this->condition->addItem($item1);
        $this->condition->addItem($item2);

        $this->assertTrue($this->condition->isMet());
    }

    public function testConditionFailsWhenNoItemValidates()
    {
        $item1 = $this->getMockItem();
        $item1->shouldReceive('isMet')->andReturn(false);
        $item2 = $this->getMockItem();
        $item2->shouldReceive('isMet')->andReturn(false);

        $this->condition->addItem($item1);
        $this->condition->addItem($item2);

        $this->assertFalse($this->condition->isMet());
    }

    public function testConditionValidatesTrueWhenAllItemsValidate()
    {
        $item1 = $this->getMockItem();
        $item1->shouldReceive('isMet')->andReturn(true);
        $item2 = $this->getMockItem();
        $item2->shouldReceive('isMet')->andReturn(true);

        $this->condition->addItem($item1);
        $this->condition->addItem($item2);

        $this->assertTrue($this->condition->isMet());
    }
}
