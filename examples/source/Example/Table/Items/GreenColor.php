<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26 
 */

namespace Example\Table\Items;

/**
 * Class GreenColor
 *
 * @package Example\Table\Items
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26
 */
class GreenColor extends Color
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    public function __construct()
    {
        $this->expectedColor = 'green';
    }
}