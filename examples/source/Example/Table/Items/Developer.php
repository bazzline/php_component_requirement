<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26 
 */

namespace Example\Table\Items;

use Net\Bazzline\Component\Requirement\AbstractItem;

/**
 * Class Developer
 *
 * @package Example\Table\Items
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26
 */
class Developer extends AbstractItem
{
    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    protected $developer;

    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    protected $expectedDeveloper;

    /**
     * @param string $developer - the color you want to met for
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    public function setDeveloper($developer)
    {
        $this->developer = (string) $developer;
    }

    /**
     * {$inheritdoc}
     */
    public function isMet()
    {
        return (strtolower($this->developer) == $this->expectedDeveloper);
    }
}