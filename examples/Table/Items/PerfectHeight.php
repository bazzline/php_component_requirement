<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26 
 */

namespace Example\Table\Items;

/**
 * Class PerfectHeight
 *
 * @package Example\Table\Items
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26
 */
class PerfectHeight extends Height
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    public function __construct()
    {
        $this->expectedHeight = '80cm';
    }
}