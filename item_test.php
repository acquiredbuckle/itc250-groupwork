<?php
//calculator_test2.php
require_once 'simpletest/autorun.php';
include 'Item.php';

class TestOfItem extends UnitTestCase {
	function testItem() {
        $food = new Item("Chicken","Delicious food!",5.99);
        $this->assertIdentical($food->name,"Chicken", "Food name = Chicken");
        $this->assertIdentical($food->description,"Delicious food!", "Description = Delicious food!");
        $this->assertIdentical($food->price,5.99, "Price = 5.99");
    
	}

	function testItem2() {
        $food = new Item('test','test',0);
        $food->name = "Fish";
        $food->description = "Something smells...";
        $food->price = 9.99;
        $this->assertIdentical($food->name,"Fish", "Food name = Fish");
        $this->assertIdentical($food->description,"Something smells...", "Description = Something smells...");
        $this->assertIdentical($food->price,9.99, "Price = 9.99");
    
	}
	

}