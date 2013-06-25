<?php

namespace Net\Bazzline\Component\Requirement;

/**
 * Class AbstractRequirementFactory
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26
 */
abstract class AbstractRequirementFactory
{
    /**
     * @return ItemInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    abstract public function create();
}
