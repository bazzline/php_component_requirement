<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-30
 */

namespace Test\Net\Bazzline\Component\Requirement;

/**
 * Class AbstractConditionTest
 *
 * @package Test\Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-30
 */
class AbstractItemTest extends TestCase
{
    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-30
     */
    public function testDisable()
    {
        $item = $this->getMockAbstractItem();
        $this->assertFalse($item->isDisabled());

        $item->disable();
        $this->assertTrue($item->isDisabled());
    }
}