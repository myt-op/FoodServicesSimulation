<?php
namespace FoodOrders;

use FoodItems\FoodItem;

class FoodOrder{
    private array $items;
    private string $timestamp;

    public function __construct(array $items){
        $this->items = $items;
        $this->timestamp = date("D M d, Y G:i");
    }

    public function getItems(): array{
        return $this->items;
    }
    
}