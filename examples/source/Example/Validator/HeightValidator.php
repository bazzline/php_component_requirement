<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-12 
 */

namespace Example\Validator;

/**
 * Class HeightValidator
 *
 * @package Example\Validator
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-12
 */
class HeightValidator extends AbstractTableValidator
{
    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function isMet()
    {
        $height = $this->table->getHeight();
        $maxHeight = 90;
        $minHeight = 70;

        return (($height >= $minHeight) && ($height <= $maxHeight));
    }
}