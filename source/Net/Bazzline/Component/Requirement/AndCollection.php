<?php

namespace Net\Bazzline\Component\Requirement;

/**
 * Class AndCollection
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-25
 */
class AndCollection extends AbstractCollection
{
    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    public function isMet()
    {
        foreach ($this->collection as $item) {
            if (!$item->isMet()) {
                return false;
            }
        }

        return true;
    }
}