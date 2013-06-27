<?php

namespace Net\Bazzline\Component\Requirement;

/**
 * Class OrCollection
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-25
 */
class OrCollection extends AbstractItemCollection
{
    /**
     * {$inheritDoc}
     */
    public function isMet()
    {
        if ($this->items->count() == 0) {
            throw new \RuntimeException('No items set in this collection.');
        }

        foreach ($this->items as $item) {
            if ($item->isMet()) {
                return true;
            }
        }

        return false;
    }
}