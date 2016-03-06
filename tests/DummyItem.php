<?php

namespace Test\Net\Bazzline\Component\Requirement;

use Net\Bazzline\Component\Requirement\IsMetInterface;

/**
 * Class DummmyItem
 *
 * @author Jens Wiese
 * @since 2013-06-27
 */
class DummyItem implements IsMetInterface
{
    /**
     * @inheritdoc
     */
    public function isMet()
    {
    }

    /**
     * Test method to check for expectations with Mockery
     *
     * @param $value
     */
    public function setSomething($value)
    {
    }
}