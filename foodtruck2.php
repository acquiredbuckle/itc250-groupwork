<?php 
//foodtruck.php
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));
include 'Item.php';
if(isset($_POST['submit']))
{//data submitted
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    $toppings = $_POST['toppings'];
	$brownies = (int)$_POST['brownies'];
	$salads = (int)$_POST['salads'];
	$slices = (int)$_POST['numSlices'];
		
	//create new objects based on data entered
	$pizza = new Item("Pizza", $slices, 5.50);
	$salad = new Item("Salad", $salads, 6.00);
	$brownie = new Item("Brownie", $brownies, 2.00);
	$toppingsPrice = 0.50;
	$toppingsTotal = count($toppings) * $toppingsPrice * $slices;
	$total = $pizza->total + $salad->total + $brownie->total +$toppingsTotal;
		
	echo 'You ordered ' . $slices . ' slices of pizza with '. $salads . ' salads and ' . $brownies . ' brownie(s).';
	echo '<br/>';
	echo 'The total for the order is $' .  $total . ', thank you for your purchase!';
}else{//show form
    echo '
    <form method="post" action="' . THIS_PAGE . '">
    <fieldset name="pizza">
    <legend>Pizza</legend>
    
    Select toppings:<br />
    <input type="checkbox" value="pepperoni" name="toppings[]">Pepperoni<br/>
    <input type="checkbox" value="salami" name="toppings[]">Salami<br/>
    <input type="checkbox" value="pineapple" name="toppings[]">Pineapple<br/>
    <input type="checkbox" value="sausage" name="toppings[]">Sausage<br/>
    <input type="checkbox" value="mushroom" name="toppings[]">Mushroom<br/>
    </select><br />
    
    How many slices?<br />
    <select name="numSlices">
    <option name="slices[]" value="0">zero</option>
    <option name="slices[]" value="1">One</option>
    <option name="slices[]" value="2">Two</option>
    <option name="slices[]" value="3">Three</option>
    </select><br /><br />
    </fieldset>
    
    <fieldset name="Sides">
    <legend>Sides</legend>
    
    Salad<br />
    <select name="salads">
    <option value="0">zero</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    </select><br /><br />
    
    Brownie<br />
    <select name="brownies">
    <option value="0">zero</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    </select><br /><br />
    </fieldset>
    <br />
    <input type="submit" name="submit" value="Submit It!" />
    </form>
    ';
}