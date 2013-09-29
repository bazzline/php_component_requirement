<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
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
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-29
 */
class TestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-29
     */
    protected function tearDown()
    {
        Mockery::close();
    }

    /**
     * @return Requirement
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-29
     */
    protected function getNewRequirement()
    {
        return new Requirement();
    }

    /**
     * @return AndCondition
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-29
     */
    protected function getNewAndCondition()
    {
        return new AndCondition();
    }

    /**
     * @return OrCondition
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-29
     */
    protected function getNewOrCondition()
    {
        return new OrCondition();
    }

    /**
     * @return Mockery\Mock|\Net\Bazzline\Component\Requirement\IsMetInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-29
     */
    protected function getMockItem()
    {
        return Mockery::mock('Net\Bazzline\Component\Requirement\IsMetInterface')->shouldDeferMissing();
    }

    /**
     * @return Mockery\MockInterface|\Net\Bazzline\Component\Requirement\AndCondition
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-29
     */
    protected function getMockAndCondition()
    {
        return Mockery::mock('Net\Bazzline\Component\Requirement\AndCondition');
    }
}