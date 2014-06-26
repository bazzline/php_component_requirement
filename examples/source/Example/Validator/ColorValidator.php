<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-12 
 */

namespace Example\Validator;

/**
 * Class ColorValidator
 *
 * @package Example\Validator
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-12
 */
class ColorValidator extends AbstractTableValidator
{
    /**
     * Validates if given requirement is met
     *
     * @return boolean
     * @throws \RuntimeException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-25
     */
    public function isMet()
    {
        $color = strtolower($this->table->getColor());
        $colors = array('red' => true, 'blue' => true, 'green' => true);

        return (isset($colors[$color]));
    }
}