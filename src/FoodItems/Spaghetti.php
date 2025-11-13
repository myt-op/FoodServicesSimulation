<?php
namespace FoodItems;

class Spaghetti extends FoodItem{
    private static string $category = "Pasta";
    public function __construct(){
        parent::__construct("Spaghetti", "a type of long, thin pasta", 7);

    }

    public static function getCategory(): string{
        return self::$category;
    }
}