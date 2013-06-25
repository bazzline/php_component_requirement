<?php

namespace Net\Bazzline\Component\Requirement;

/**
 * Class RequirementCollectionInterface
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-25
 */
interface CollectionInterface
{
    /**
     * @param ItemInterface $item
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    public function add(ItemInterface $item);
}