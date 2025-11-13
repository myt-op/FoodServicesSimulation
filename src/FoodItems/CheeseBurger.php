<?php
namespace FoodItems;

class CheeseBurger extends FoodItem{
    private static string $category = "Burger";

    public function __construct(){
        parent:: __construct("CheeseBurger", "Hamburger with cheese", 4);
    }

    public static function getCategory(): string{
        return self:: $category;
    }
}