<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-29
 */

namespace Test\Net\Bazzline\Component\Requirement;

use Net\Bazzline\Component\Requirement\OrCondition;
use Net\Bazzline\Component\Requirement\AndCondition;
use Net\Bazzline\Component\Requirement\Requirement;
use Mockery;
use PHPUnit_Framework_TestCase;

/**
 * Class TestCase
 *
 * @package Test\Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-29
 */
class TestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    protected function tearDown()
    {
        Mockery::close();
    }

    /**
     * @return Requirement
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    protected function getNewRequirement()
    {
        return new Requirement();
    }

    /**
     * @return AndCondition
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    protected function getNewAndCondition()
    {
        return new AndCondition();
    }

    /**
     * @return OrCondition
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    protected function getNewOrCondition()
    {
        return new OrCondition();
    }

    /**
     * @return Mockery\Mock|\Net\Bazzline\Component\Requirement\IsMetInterface
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    protected function getMockItem()
    {
        return Mockery::mock('Net\Bazzline\Component\Requirement\IsMetInterface')->shouldDeferMissing();
    }

    /**
     * @return Mockery\MockInterface|\Net\Bazzline\Component\Requirement\AndCondition
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    protected function getMockAndCondition()
    {
        return Mockery::mock('Net\Bazzline\Component\Requirement\AndCondition');
    }

    /**
     * @return Mockery\MockInterface|\Net\Bazzline\Component\Requirement\AbstractItem
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-30
     */
    protected function getMockAbstractItem()
    {
        return Mockery::mock('Net\Bazzline\Component\Requirement\AbstractItem[IsMet]');
    }

    /**
     * @return Mockery\MockInterface|\Net\Bazzline\Component\Requirement\AbstractCondition
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-30
     */
    protected function getMockAbstractCondition()
    {
        return Mockery::mock('Net\Bazzline\Component\Requirement\AbstractCondition[IsMet]');
    }

    /**
     * @param array $expectedArray
     * @param array $array
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-10-01
     */
    protected function assertArraysContainEqualEntries(array $expectedArray, array $array)
    {
        $this->assertEquals(
            count($expectedArray),
            count($array)
        );

        foreach ($expectedArray as $expectedItem) {
            $expectedItemHash   = spl_object_hash($expectedItem);
            $itemExists         = false;

            foreach ($array as $item) {
                $itemHash = spl_object_hash($item);

                if ($expectedItemHash === $itemHash) {
                    $itemExists = true;
                    break;
                }
            }

            $this->assertTrue($itemExists);
        }
    }
}
