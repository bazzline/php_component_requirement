<?php

namespace Net\Bazzline\Component\Requirement;

use SplObjectStorage;

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
     * @var \SplObjectStorage
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    protected $items;

    /**
     * {$inheritDoc}
     */
    public function add(IsMetInterface $item)
    {
        // @TODO how to deal with that check? put it in the constructor?
        if (is_null($this->items)) {
            $this->items = new SplObjectStorage();
        }
        $this->items->attach($item);
    }

    /**
     * {$inheritDoc}
     */
    public function getItems()
    {
        return $this->items;
    }
}