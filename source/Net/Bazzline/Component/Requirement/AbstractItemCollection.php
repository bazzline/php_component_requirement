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
    protected $storage;

    /**
     * {$inheritDoc}
     */
    public function add(ItemInterface $item)
    {
        if (is_null($this->storage)) {
            $this->storage = new SplObjectStorage();
        }
        $this->storage->attach($item);
    }

    /**
     * {$inheritDoc}
     */
    public function getItems()
    {
        return $this->storage;
    }
}