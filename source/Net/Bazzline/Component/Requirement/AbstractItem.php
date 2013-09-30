<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-30
 */

namespace Net\Bazzline\Component\Requirement;

/**
 * Class AbstractItem
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-30
 */
abstract class AbstractItem implements ItemInterface
{
    /**
     * @var bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-30
     */
    protected $isDisabled;

    /**
     * @var bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-30
     */
    private $returnValueIfIsDisabled;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-30
     */
    public function __construct()
    {
        $this->isDisabled = false;
        $this->setReturnValueIfIsDisabledToTrue();
    }

    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-29
     */
    public function isDisabled()
    {
        return $this->isDisabled;
    }

    /**
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-29
     */
    public function disable()
    {
        $this->isDisabled = true;

        return $this;
    }

    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-30
     */
    protected function getReturnValueIfIsDisabled()
    {
        return $this->isDisabled;
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-30
     */
    protected function setReturnValueIfIsDisabledToFalse()
    {
        $this->returnValueIfIsDisabled = false;
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-30
     */
    protected function setReturnValueIfIsDisabledToTrue()
    {
        $this->returnValueIfIsDisabled = true;
    }
}