<?php

namespace Test\Net\Bazzline\Component\Requirement;

use Net\Bazzline\Component\Requirement\AndCollection;
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

    public function testPassingOnOfDepencenciesToCollections()
    {
        $collection = \Mockery::mock('\Net\Bazzline\Component\Requirement\AndCollection');
        $collection->shouldReceive('setSomething')->with('someValue')->once();
        $collection->shouldReceive('getItems')->andReturn(new \SplObjectStorage());

        $this->requirement->addCollection($collection);
        $this->requirement->__call('setSomething', array('someValue'));
    }

    public function testPassingOnOfDepencenciesToItems()
    {
        $item1 = \Mockery::mock(new DummyItem());
        $item2 = \Mockery::mock(new DummyItem());
        $item2->shouldReceive('setSomething')->with('someValue')->once();

        $collection = new AndCollection();
        $collection->addItem($item1);
        $collection->addItem($item2);

        $this->requirement->addCollection($collection);
        $this->requirement->setSomething('someValue');
    }
}
