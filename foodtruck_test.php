<?php
//foodtruck_test.php
include_once 'includes/settings.php';
require_once 'simpletest/autorun.php';
require_once 'simpletest/web_tester.php';

class FoodTruckFormTests extends WebTestCase {

	  function testFoodTruckSubmit() {
		$this->get(VIRTUAL_PATH . '/foodtruck.php');
		$this->assertResponse(200);
          
        $this->setField("numSlices", 1);
		$this->setField("brownies", 2);
        $this->setField("salads", 1);

		$this->clickSubmit("Submit It!");

		$this->assertResponse(200);
		$this->assertText("Your order includes:");
        $this->assertText("1 slice of Pizza topped with no toppings");
        $this->assertText("2 side brownies"); 
        $this->assertText("1 side salads");
        $this->assertText("Subtotal: $18.96");
        $this->assertText("Sales Tax: $1.71");
        $this->assertText("The total for the order is $20.67");  
        
	}

}