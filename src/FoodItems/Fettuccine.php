<?php
namespace FoodItems;

class Fettuccine extends FoodItem{
    private static string $category = "Pasta";

    public function __construct(){
        parent:: __construct("Fettuccine", "a type of long, flat pasta", 5);
    }

    public static function getCategory(): string{
        return self::$category;
    }
}