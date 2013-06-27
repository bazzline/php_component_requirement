<?php

namespace Test\Net\Bazzline\Component\Requirement;

use Net\Bazzline\Component\Requirement\AndCollection;

/**
 * Test for AndCollection
 *
 * @author Jens Wiese
 * @since 2013-06-26
 */
class AndCollectionTest extends \PHPUnit_Framework_TestCase
{
    /** @var AndCollection */
    protected $collection;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $this->collection = new AndCollection();
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testCollectionFailsWhenNoItemIsProvided()
    {
        $this->collection->isMet();
    }

    public function testCollectionValidatesTrueWhenAllItemsValidate()
    {
        $item1 = \Mockery::mock('\Net\Bazzline\Component\Requirement\IsMetInterface')->shouldDeferMissing();
        $item1->shouldReceive('isMet')->andReturn(true);
        $item2 = \Mockery::mock('\Net\Bazzline\Component\Requirement\IsMetInterface')->shouldDeferMissing();
        $item2->shouldReceive('isMet')->andReturn(true);

        $this->collection->addItem($item1);
        $this->collection->addItem($item2);

        $this->assertTrue($this->collection->isMet());
    }

    public function testCollectionFailsWhenOneItemDoesNotValidate()
    {
        $item1 = \Mockery::mock('\Net\Bazzline\Component\Requirement\IsMetInterface')->shouldDeferMissing();
        $item1->shouldReceive('isMet')->andReturn(true);
        $item2 = \Mockery::mock('\Net\Bazzline\Component\Requirement\IsMetInterface')->shouldDeferMissing();
        $item2->shouldReceive('isMet')->andReturn(false);

        $this->collection->addItem($item1);
        $this->collection->addItem($item2);

        $this->assertFalse($this->collection->isMet());
    }

    public function testCollectionFailsWhenAllItemsDoNotValidate()
    {
        $item1 = \Mockery::mock('\Net\Bazzline\Component\Requirement\IsMetInterface')->shouldDeferMissing();
        $item1->shouldReceive('isMet')->andReturn(false);
        $item2 = \Mockery::mock('\Net\Bazzline\Component\Requirement\IsMetInterface')->shouldDeferMissing();
        $item2->shouldReceive('isMet')->andReturn(false);

        $this->collection->addItem($item1);
        $this->collection->addItem($item2);

        $this->assertFalse($this->collection->isMet());
    }
}
