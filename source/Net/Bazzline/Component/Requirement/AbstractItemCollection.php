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
    protected $items = array();

    /**
     * {$inheritDoc}
     */
    public function add(ItemInterface $item)
    {
        //@TODO switch to SplObjectStorage?
        $key = spl_object_hash($item);
        $this->items[$key] = $item;
    }

    /**
     * {$inheritDoc}
     */
    public function getItems()
    {
        return $this->items;
    }
}