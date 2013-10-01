<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-30
 */

namespace Test\Net\Bazzline\Component\Requirement;

/**
 * Class AbstractConditionTest
 *
 * @package Test\Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-30
 */
class AbstractConditionTest extends TestCase
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-30
     */
    public function testDisable()
    {
        $condition = $this->getMockAbstractCondition();
        $this->assertFalse($condition->isDisabled());

        $condition->disable();
        $this->assertTrue($condition->isDisabled());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-10-01
     */
    public function testAddItem()
    {
        $condition = $this->getMockAbstractCondition();
        $item = $this->getMockAbstractItem();

        $this->assertEquals($condition, $condition->addItem($item));
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-10-01
     */
    public function testGetItems()
    {
        $condition = $this->getMockAbstractCondition();
        $this->assertEquals(array(), $condition->getItems());

        $itemOne = $this->getMockAbstractItem();
        $itemTwo = $this->getMockAbstractItem();

        $condition->addItem($itemOne);
        $condition->addItem($itemTwo);

        $expectedItems = array(
            $itemOne,
            $itemTwo
        );

        $this->assertArraysContainEqualEntries($expectedItems, $condition->getItems());
    }
}