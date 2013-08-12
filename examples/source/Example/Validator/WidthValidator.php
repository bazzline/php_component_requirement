<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-12 
 */

namespace Example\Validator;

/**
 * Class WidthValidator
 *
 * @package Example\Validator
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-12
 */
class WidthValidator extends AbstractTableValidator
{
    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function isMet()
    {
        $width = $this->table->getWidth();
        $maxWidth = 160;
        $minWidth = 70;

        return (($width >= $minWidth) && ($width <= $maxWidth));
    }
}