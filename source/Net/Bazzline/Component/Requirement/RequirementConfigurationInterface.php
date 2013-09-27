<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-27
 */

namespace Net\Bazzline\Component\Requirement;

/**
 * Class RequirementConfigurationInterface
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-27
 */
interface RequirementConfigurationInterface
{
    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-27
     */
    public function getDisableReturnValue();



    /**
     * @param $returnValue
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-27
     */
    public function setDisableReturnValue($returnValue);
}