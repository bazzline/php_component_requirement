<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-19
 */

namespace Example\WithShutdown;

use Net\Bazzline\Component\Requirement\IsMetInterface;

/**
 * Class WillFailItem
 *
 * @package Example\WithShutdown
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-16
 */
class WillFailItem implements IsMetInterface
{
    /**
     * Validates if given requirement is met
     *
     * @return boolean
     * @throws \RuntimeException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    public function isMet()
    {
        return false;
    }
}