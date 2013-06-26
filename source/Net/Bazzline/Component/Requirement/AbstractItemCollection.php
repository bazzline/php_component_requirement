<?php

namespace Net\Bazzline\Component\Requirement;

/**
 * Class RequirementCollection
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-25
 * @todo move basic collection stuff to collection
 */
abstract class AbstractItemCollection implements IsMetInterface, ItemCollectionInterface
{
    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    protected $items;

    /**
     * {$inheritDoc}
     */
    public function add(ItemInterface $item)
    {
        $this->items[] = $item;
    }

    /**
     * {$inheritDoc}
     */
    public function getItems()
    {
        return (is_null($this->items)) ? array() : $this->items;
    }
}