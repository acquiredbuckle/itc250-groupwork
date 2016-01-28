<?php
//Item.php

class Item{
    public $name = '';
    //public $description = '';
    public $price = 0;
	public $quantity = 0;
	public $total = 0;
    
    public function __construct($name, $quantity, $price)
    {
        $this->name = $name;
        $this->price = $price;
		$this->quantity = $quantity;
		$this->total = $quantity * $price;
    }
	
	public function print_me(){
		return "hey!";
	}
    
}
