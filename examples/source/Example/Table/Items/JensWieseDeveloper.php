<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26 
 */

namespace Example\Table\Items;

/**
 * Class JensWieseDeveloper
 *
 * @package Example\Table\Items
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26
 */
class JensWieseDeveloper extends Developer
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    public function __construct()
    {
        $this->expectedDeveloper = 'jens wiese';
    }
}