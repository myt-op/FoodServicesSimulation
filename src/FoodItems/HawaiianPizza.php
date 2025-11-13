<?php
namespace FoodItems;

class HawaiianPizza extends FoodItem{
    private static string $category = "Pizza";

    public function __construct(){
        parent:: __construct("Hawaiian Pizza", "very yammy pizza!", 8);
    }

    public static function getCategory(): string{
        return self:: $category;
    }
}