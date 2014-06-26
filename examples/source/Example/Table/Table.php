<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-26 
 */

namespace Example\Table;

/**
 * Class Table
 *
 * @package Example\Table
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-26
 */
class Table
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
    protected $feature;

    /**
     * @var string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-26
     */
    protected $height;

    /**
     * @var string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-26
     */
    protected $developer;

    /**
     * @param string $color
     * @param string $feature
     * @param string $height
     * @param string $developer
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-26
     */
    public function __construct($color, $feature = '', $height = '0cm', $developer = 'tux')
    {
        $this->color = $color;
        $this->feature = $feature;
        $this->height = $height;
        $this->developer = $developer;
    }

    /**
     * @return string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-26
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-26
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * @return string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-26
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-26
     */
    public function getDeveloper()
    {
        return $this->developer;
    }
}