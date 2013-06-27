<?php

namespace Example\Simple\Items;

use Net\Bazzline\Component\Requirement\IsMetInterface;

/**
 * Class CorrectWeekday
 *
 * @author jens
 * @since 2013-06-27
 */
class CorrectWeekday implements IsMetInterface
{
    /** @var integer */
    protected $expectedWeekday;

    /** @var integer */
    protected $actualWeekday;

    /**
     * @param $expectedWeekday
     */
    public function __construct($expectedWeekday)
    {
        $this->setExpectedWeekday($expectedWeekday);
    }

    /**
     * @param int $actualWeekday
     */
    public function setActualWeekday($actualWeekday)
    {
        $this->actualWeekday = $actualWeekday;
    }

    /**
     * @param int $expectedWeekday
     */
    public function setExpectedWeekday($expectedWeekday)
    {
        $this->expectedWeekday = $expectedWeekday;
    }

    /**
     * {@inheritdoc}
     */
    public function isMet()
    {
        return ($this->actualWeekday == $this->expectedWeekday);
    }

}