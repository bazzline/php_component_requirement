<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-12 
 */

namespace Example\Validator;

/**
 * Class LengthValidator
 *
 * @package Example\Validator
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-12
 */
class LengthValidator extends AbstractTableValidator
{
    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function isMet()
    {
        $length = $this->table->getLength();
        $maxLength = 210;
        $minLength = 70;

        return (($length >= $minLength) && ($length <= $maxLength));
    }
}