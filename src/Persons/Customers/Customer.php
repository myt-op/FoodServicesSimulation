<?php
namespace Persons\Customers;

use Persons\Person;
use Restaurants\Restaurant;
use Invoices\Invoice;

class Customer extends Person{
    private array $interestedTasteMap;

    public function __construct(string $name, int $age, string $address, array $interestedTasteMap){
        parent:: __construct($name, $age, $address);
        $this->interestedTasteMap = $interestedTasteMap;
    }

    public function interestedCategories(Restaurant $restaurant): array{
        $available = [];

        foreach($restaurant->getFoodItems() as $item){
            $name = $item->getName();
            if(array_key_exists($name, $this->interestedTasteMap)){
                $available[$name] = $this->interestedTasteMap[$name];
            }
        
        }
        return $available;
    }

    public function order(Restaurant $restaurant): Invoice{
        $categories = $this->interestedCategories($restaurant);

        echo $this->name . " wanted to eat ";
        echo implode(", ", array_keys($this->interestedTasteMap)). "." . PHP_EOL;


        echo $this->name . " was looking at the menu, and ordered ";

        $orderParts = [];
        foreach($categories as $name => $count){
            $orderParts[] = "{$name} x {$count}";
        }

        echo implode(", ", $orderParts). ".". PHP_EOL;

        return $restaurant->order($categories);

    }
}