<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-12 
 */

namespace Example\Validator;

/**
 * Class Table
 *
 * @package Example\Validator
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-12
 */
class Table
{
    /**
     * @var string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    protected $color;

    /**
     * @var int
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    protected $height;

    /**
     * @var int
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    protected $length;

    /**
     * @var int
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    protected $width;

    /**
     * @param string $color
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param int $height
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return int
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $length
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * @return int
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int $width
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function getWidth()
    {
        return $this->width;
    }
}