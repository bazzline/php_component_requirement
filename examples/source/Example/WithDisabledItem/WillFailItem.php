<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-19
 */

namespace Example\WithDisabledItem;

use Net\Bazzline\Component\Requirement\AbstractItem;

/**
 * Class WillFailItem
 *
 * @package Example\WithDisabledRequirement
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-16
 */
class WillFailItem extends AbstractItem
{
    /**
     * Validates if given requirement is met
     *
     * @return boolean
     * @throws \RuntimeException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-25
     */
    public function isMet()
    {
        if ($this->isDisabled()) {
            return $this->getReturnValueIfIsDisabled();
        } else {
            return false;
        }
    }
}