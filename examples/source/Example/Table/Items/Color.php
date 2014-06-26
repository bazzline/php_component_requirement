<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-26 
 */

namespace Example\Table\Items;

use Net\Bazzline\Component\Requirement\AbstractItem;

/**
 * Class Color
 *
 * @package Example\Table\Items
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-26
 */
class Color extends AbstractItem
{
    /**
     * @var string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-26
     */
    protected $color;

    /**
     * @var string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-26
     */
    protected $expectedColor;

    /**
     * @param string $color - the color you want to met for
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-26
     */
    public function setColor($color)
    {
        $this->color = (string) $color;
    }

    /**
     * {$inheritdoc}
     */
    public function isMet()
    {
        return (strtolower($this->color) == $this->expectedColor);
    }
}