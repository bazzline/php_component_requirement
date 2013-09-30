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
 * @todo implement addItem and getItems test
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
}