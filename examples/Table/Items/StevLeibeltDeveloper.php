<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-26 
 */

namespace Example\Table\Items;

/**
 * Class StevLeibeltDeveloper
 *
 * @package Example\Table\Items
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-26
 */
class StevLeibeltDeveloper extends Developer
{
    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-26
     */
    public function __construct()
    {
        $this->expectedDeveloper = 'stev leibelt';
    }
}