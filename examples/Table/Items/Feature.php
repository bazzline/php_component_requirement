<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26 
 */

namespace Example\Table\Items;

use Net\Bazzline\Component\Requirement\IsMetInterface;

/**
 * Class Feature
 *
 * @package Example\Table\Items
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26
 */
class Feature implements IsMetInterface
{
    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    protected $feature;

    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    protected $expectedFeature;

    /**
     * @param string $feature - the feature you want to met for
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    public function setFeature($feature)
    {
        $this->feature = (string) $feature;
    }

    /**
     * {$inheritDoc}
     */
    public function isMet()
    {
        return (strtolower($this->feature) == $this->expectedFeature);
    }
}