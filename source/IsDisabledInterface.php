<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-29
 */

namespace Net\Bazzline\Component\Requirement;

/**
 * Class IsDisableInterface
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-29
 */
interface IsDisabledInterface
{
    /**
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    public function disable();

    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    public function isDisabled();
}