<?php

namespace Net\Bazzline\Component\Requirement;

use RuntimeException;

/**
 * Class OrCondition
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-25
 */
class OrCondition extends ConditionAbstract
{
    /**
     * {$inheritdoc}
     */
    public function isMet()
    {
        if ($this->items->count() == 0) {
            throw new RuntimeException('No items set in this condition.');
        }

        foreach ($this->items as $item) {
            if ($item->isMet()) {
                return true;
            }
        }

        return false;
    }
}