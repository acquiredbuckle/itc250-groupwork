<?php 
//foodtruck.php

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

include 'Item.php';

$pizza = new Item("Pizza","Delicious slices with your choice of toppings",5.50);
$salad = new Item("Salad","Romaine lettuce with cheese, tomato, and crutons",6.00);
$brownie = new Item("Brownie","Gooey and chewy chocolate",2.00);


if(isset($_POST['submit']))
{//data submitted
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    
    $numSlices = $_POST['numSlices'];
    $brownies = $_POST['brownies'];
    $salads = $_POST['salads'];
    $topping = $_POST['topping'];
        
    
    $total = ($numSlices * $pizza->price);
    $total += ($brownies * $brownie->price);
    $total += ($salads * $salad->price);
    
    echo "Your order includes: <br/><br/>";
    if ($numSlices > 0  and $toppings.length > 0) {
            $toppings = '';
        foreach($topping as $topps) {
              $toppings .= $topps; 
        }
        if ($numSlices = 1){
        echo $numSlices . ' slice of Pizza topped with ' . $toppings;
        }else {
        echo $numSlices . ' slices of Pizza topped with ' . $toppings;
        }
    }else if($numSlices = 1){
        echo $numSlices . ' slice of Pizza topped with no toppings'; 
    }else if($numSlices > 1){
        echo $numSlices . ' slices of Pizza topped with no toppings'; 
    }
    
    
    echo '<br/>The total for the order is $' .  $total;
}else{//show form
    echo '
    <form method="post" action="' . THIS_PAGE . '">
    <fieldset name="pizza">
    <legend>Pizza</legend>
    
    Select toppings:<br />
    <input type="checkbox" name="topping[]" value="pepperoni, ">Pepperoni<br/>
    <input type="checkbox" name="topping[]" value="salami, ">Salami<br/>
    <input type="checkbox" name="topping[]" value="pineapple, ">Pineapple<br/>
    <input type="checkbox" name="topping[]" value="sausage, ">Sausage<br/>
    <input type="checkbox" name="topping[]" value="mushroom">Mushroom<br/>
    </select><br />
    
    How many slices?<br />
    <select name="numSlices">
    <option value="0">zero</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
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