<?php 
//foodtruck.php

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

include 'Item.php';

$pizza = new Item("Pizza","Delicious slices with your choice of toppings",5.99);
$salad = new Item("Salad","Romaine lettuce with cheese, tomato, and crutons",4.99);
$brownie = new Item("Brownie","Gooey and chewy chocolate brownies",3.99);


if(isset($_POST['submit']))
{//data submitted
//    echo '<pre>';
//    var_dump($_POST);
//    echo '</pre>';
    
    $numSlices = $_POST['numSlices'];
    $brownies = $_POST['brownies'];
    $salads = $_POST['salads'];
    $topping = $_POST['topping'];
        
    
    $total = ($numSlices * $pizza->price);
    $total += ($brownies * $brownie->price);
    $total += ($salads * $salad->price);
    
    echo "Your order includes: <br/><br/>";
    
    //Pizza & toppings
    if ($numSlices != 0 and sizeof($topping) != 0) {
        $toppings = '';
        foreach($topping as $topps) {
              $toppings .= '<br>' . $topps; 
        }
        if ($numSlices == 1){
        echo $numSlices . ' slice of Pizza topped with: ' . $toppings . '<br/>';
        }else {
        echo $numSlices . ' slices of Pizza topped with: ' . $toppings . '<br/>';
        }
    }else if($numSlices == 1){
        echo $numSlices . ' slice of Pizza topped with no toppings<br/>'; 
    }else if($numSlices != 1){
        echo $numSlices . ' slices of Pizza topped with no toppings<br/>'; 
    }
    
    if ($brownies != 0) {
        echo $brownies . ' sides of brownies<br/>';
    }
    if ($salads != 0) {
        echo $salads . ' sides of salads<br/>';
    }
    
    echo '<br/>The total for the order is $' .  $total;
}else{//show form
    echo '
    <form method="post" action="' . THIS_PAGE . '">
    <fieldset name="pizza">
    <legend>Pizza</legend>
    <br/>Description: ' . $pizza->description   . '.<br/>
    <br/>Price: $' . $pizza->price   . '<br/><br/>
    
    How many slices?<br/>
    <select name="numSlices">
    <option value="0">zero</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    </select><br /><br />
    
    Select toppings:<br />
    <input type="checkbox" name="topping[]" value="Pepperoni">Pepperoni<br/>
    <input type="checkbox" name="topping[]" value="Salami">Salami<br/>
    <input type="checkbox" name="topping[]" value="Pineapple">Pineapple<br/>
    <input type="checkbox" name="topping[]" value="Sausage">Sausage<br/>
    <input type="checkbox" name="topping[]" value="Mushroom">Mushroom<br/>
    </select><br />
    
    </fieldset>
    
    <fieldset name="Sides">
    <legend>Sides</legend>
    
    Salad<br />
    <br/>Description: ' . $salad->description   . '.<br/>
    <br/>Price: $' . $salad->price   . '<br/><br/>
    <select name="salads">
    <option value="0">zero</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    </select><br /><br /><br />
    
    Brownie<br />
    <br/>Description: ' . $brownie->description   . '.<br/>
    <br/>Price: $' . $brownie->price   . '<br/><br/>
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