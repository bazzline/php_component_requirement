<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-26 
 */

namespace Example\Table\Items;

/**
 * Class FoldableFeature
 *
 * @package Example\Table\Items
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-26
 */
class FoldableFeature extends Feature
{
    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-26
     */
    public function __construct()
    {
        $this->expectedFeature = 'foldable';
    }
}