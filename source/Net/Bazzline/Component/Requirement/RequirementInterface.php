<?php

namespace Net\Bazzline\Component\Requirement;

/**
 * Class RequirementInterface
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-25
 */
interface RequirementInterface extends IsMetInterface
{
    /**
     * Adds a condition to the requirement
     *
     * @param ConditionInterface $condition
     * @return $this
     * @throws \RuntimeException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    public function addCondition(ConditionInterface $condition);

    public function isLocked();
}