<?php

namespace Test\Net\Bazzline\Component\Requirement;

use Net\Bazzline\Component\Requirement\Requirement;

/**
 * Test for Requirement class
 *
 * @author Jens Wiese
 * @since 2013-06-27
 */
class RequirementTest extends \PHPUnit_Framework_TestCase
{
    /** @var Requirement */
    protected $requirement;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $this->requirement = new Requirement();
    }

    public function testPassingOnOfDepencenciesToItems()
    {
        $item = \Mockery::mock('\Net\Bazzline\Component\Requirement\ItemInterface');


    }


}
