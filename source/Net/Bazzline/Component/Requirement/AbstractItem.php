<?php

namespace Net\Bazzline\Component\Requirement;

/**
 * Class AbstractItem
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-25
 */
abstract class AbstractItem implements ItemInterface
{
    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    protected $initialPropertyNames;

    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    protected $runtimePropertyNames;

    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    final public function isMet()
    {
        $isMet = $this->internalIsMet();
        $this->clearRuntimeProperties();

        return $isMet;
    }

    /**
     * Internal isMet method since public method is declared as final
     *
     * @return boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    abstract protected function internalIsMet();

    /**
     * Removes values of runtime properties
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    protected function clearRuntimeProperties()
    {
        foreach ($this->runtimePropertyNames as $propertyName)
        {
            unset($this->$propertyName);
        }
    }
}