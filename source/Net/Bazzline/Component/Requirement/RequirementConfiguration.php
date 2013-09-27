<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-27
 */

namespace Net\Bazzline\Component\Requirement;

/**
 * Class RequirementConfiguration
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-27
 */
class RequirementConfiguration implements RequirementConfigurationInterface
{
    /**
     * @var bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-27
     */
    private $disabledReturnValue;

    /**
     * @return null|bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-27
     */
    public function getDisabledReturnValue()
    {
        return $this->disabledReturnValue;
    }

    /**
     * @param $returnValue
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-27
     */
    public function setDisabledReturnValue($returnValue)
    {
        $this->disabledReturnValue = (bool) $returnValue;

        return $this;
    }
}