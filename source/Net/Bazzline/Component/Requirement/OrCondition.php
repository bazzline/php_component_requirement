<?php

namespace Net\Bazzline\Component\Requirement;

use RuntimeException;

/**
 * Class OrCondition
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-25
 */
class OrCondition extends AbstractCondition
{
    /**
     * {$inheritdoc}
     */
    public function isMet()
    {
        if ($this->isDisabled()) {
            return $this->getReturnValueIfIsDisabled();
        } else {
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
}