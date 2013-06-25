<?php

namespace Net\Bazzline\Component\Requirement;

/**
 * Class OrCollection
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-25
 */
class OrCollection extends AbstractCollection
{
    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    public function isMet()
    {
        foreach ($this->collection as $item) {
            if ($item->isMet()) {
                return true;
            }
        }

        return false;
    }
}