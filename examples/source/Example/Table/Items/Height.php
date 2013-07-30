<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26 
 */

namespace Example\Table\Items;

use Net\Bazzline\Component\Requirement\IsMetInterface;

/**
 * Class Height
 *
 * @package Example\Table\Items
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26
 */
class Height implements IsMetInterface
{
    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    protected $height;

    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    protected $expectedHeight;

    /**
     * @param string $height - the color you want to met for
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    public function setHeight($height)
    {
        $this->height = (string) $height;
    }

    /**
     * {$inheritdoc}
     */
    public function isMet()
    {
        return (strtolower($this->height) == $this->expectedHeight);
    }
}