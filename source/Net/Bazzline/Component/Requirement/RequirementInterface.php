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
     * Throws exception if requirement is locked
     *
     * @param ConditionInterface $condition
     * @return $this
     * @throws \RuntimeException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    public function addCondition(ConditionInterface $condition);

    /**
     * Test of requirement is locked
     *
     * @return boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-29
     */
    public function isLocked();

    /**
     * Locks requirement, no condition could be added afterwards
     *
     * @return $this
     * @throws \RuntimeException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-29
     */
    public function lock();
}