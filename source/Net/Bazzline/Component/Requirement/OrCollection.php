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
     * {$inheritDoc}
     */
    public function isMet()
    {
        foreach ($this->items as $item) {
            if ($item->isMet()) {
                return true;
            }
        }

        return false;
    }
}