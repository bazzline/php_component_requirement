<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26 
 */

namespace Example\Table\Items;

use Net\Bazzline\Component\Requirement\IsMetInterface;

/**
 * Class Color
 *
 * @package Example\Table\Items
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26
 */
class Color implements IsMetInterface
{
    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    protected $color;

    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    protected $expectedColor;

    /**
     * @param string $color - the color you want to met for
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    public function setColor($color)
    {
        $this->color = (string) $color;
    }

    /**
     * {$inheritDoc}
     */
    public function isMet()
    {
        return (strtolower($this->color) == $this->expectedColor);
    }
}