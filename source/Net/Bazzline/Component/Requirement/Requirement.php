<?php

namespace Net\Bazzline\Component\Requirement;

/**
 * Class Requirement
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-25
 */
class Requirement implements IsMetInterface, IsMetInterface
{
    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    protected $collections;

    /**
     * @param ItemInterface $item
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    public function addItem(ItemInterface $item)
    {
        $collection = new AndCollection();
        $collection->add($item);

        $this->addCollection($collection);
    }

    /**
     * @param ItemCollectionInterface $collection
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    public function addCollection(ItemCollectionInterface $collection)
    {
        $this->collections[] = $collection;
    }



    /**
     * Magic setter method to keep this class as generic as possible.
     *
     * @param string $name - property name
     * @param mixed $value - value of property
     * @author sleibelt
     * @since 2013-06-25
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
        $setterMethodName = 'set' . ucfirst($name);

        foreach ($this->collections as $collection) {
            foreach ($collection->getItems() as $item) {
                $itemMethods = array_flip(get_class_methods($item));
                if (isset($itemMethods[$setterMethodName])) {
                    $item->$setterMethodName($value);
                    $collection->addItem($item);
                }
            }
        }
    }

    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    public function isMet()
    {
        foreach ($this->collections as $collection) {
            if (!$collection->isMet()) {
                return false;
            }
        }

        return true;
    }
}