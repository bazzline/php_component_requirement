<?php

namespace Net\Bazzline\Component\Requirement;

/**
 * Class Condition
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-25
 */
interface ConditionInterface extends IsDisabledInterface, IsMetInterface
{
    /**
     * Adds an item to the condition.
     * If an instance is already added, it will be replaced.
     *
     * @param IsMetInterface $item
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-25
     */
    public function addItem(IsMetInterface $item);

    /**
     * Returns all added items as array
     *
     * @return null|IsMetInterface[]
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-25
     */
    public function getItems();
}