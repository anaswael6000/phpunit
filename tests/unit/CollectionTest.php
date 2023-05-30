<?php

require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function testEmptyCollectionIsEmpty()
    {
        $collection = new App\Support\Collection();

        $this->assertEmpty($collection->get());
    }
    
    public function testItemsReturnedAreItemsPassedIn()
    {
        $collection = new App\Support\Collection(["one", "two", "three"]);

        $this->assertEquals($collection->get(), ["one", "two", "three"]);
    }
    
    public function testCountIsCorrectForItemsPassedIn()
    {
        $collection = new App\Support\Collection(['one', 'two', 'three']);

        $this->assertEquals($collection->count(), 3);
    }

    public function testThatCollectionCanBeMergedIntoAnother()
    {
        $collection1 = new App\Support\Collection(['one', 'two']);

        $collection2 = new App\Support\Collection(['three', 'four']);

        $collection1->merge($collection2);

        $this->assertCount(4, $collection1->get());
        $this->assertEquals(4, $collection1->count());

    }

    public function testThatWeCanAddItemsToCollection()
    {
        $collection = new App\Support\Collection(['one', 'two']);

        $collection->add(['three', 'four']);

        $this->assertCount(4, $collection->get());
        $this->assertEquals($collection->get(), ['one', 'two', 'three', 'four']);
    }

    public function testtoJsonWorks()
    {
        $collection = new App\Support\Collection([
            ["username" => "anas"],
            ["username" => "roger"]
        ]);

        $this->assertIsString($collection->toJson());
        $this->assertEquals('[{"username":"anas"},{"username":"roger"}]', $collection->toJson());
    }

    public function testThatJsonlyEncodedObjectsReturnsJson()
    {
        $collection = new App\Support\Collection([
            ["username" => "anas"],
            ["username" => "roger"]
        ]);

        $encoded = json_encode($collection);

        $this->assertEquals('[{"username":"anas"},{"username":"roger"}]', $encoded);
    }
}