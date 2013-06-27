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
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    public function addCondition(ConditionInterface $condition);
}