<?php

namespace Net\Bazzline\Component\Requirement;

/**
 * Class RequirementInterface
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-25
 */
interface IsMetInterface
{
    /**
     * @return boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    public function isMet();
}