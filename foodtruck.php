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
    //$toppings = $_POST['topping'];
    $toppings = '';
        
    //IF $_POST
        //for all the stuff in POST
        //loop through, adding each each 
        //for($i ; $i < length($_POST; $i++){
          //  $cart[] = new item($_POST[$i]}
    
    $total = ($numSlices * $pizza->price);
    $total += ($brownies * $brownie->price);
    $total += ($salads * $salad->price);
    
    if($_POST['pepperoni'] != "1"){
           $toppings += 'pepperoni';
    }
    
    echo 'The total for the order is $' .  $total;
}else{//show form
    echo '
    <form method="post" action="' . THIS_PAGE . '">
    <fieldset name="pizza">
    <legend>Pizza</legend>
    
    Select toppings:<br />
    <input type="checkbox" value="1" name="pepperoni">Pepperoni<br/>
    <input type="checkbox" value="salami" name="topping">Salami<br/>
    <input type="checkbox" value="pineapple" name="topping">Pineapple<br/>
    <input type="checkbox" value="sausage" name="topping">Sausage<br/>
    <input type="checkbox" value="mushroom" name="topping">Mushroom<br/>
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