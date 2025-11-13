<?php
namespace Persons\Employees;

use Restaurants\Restaurant;
use FoodOrders\FoodOrder;
use Invoices\Invoice;

class Casher extends Employee{
    public function __construct(string $name, int $age, string $address, int $employeeId, float $salary){
        parent:: __construct($name, $age, $address, $employeeId, $salary);
    }

    public function generateOrder(array $categories): FoodOrder{
        echo $this->name . " received the order.". PHP_EOL;
        $items = [];
        
        foreach($categories as $name => $count){
            $className = "FoodItems\\" . $name;
            for ($i = 0; $i < $count; $i++){
                $items[] = new $className();
            }
        }
        return new FoodOrder($items);

    }

    public function generateInvoice(FoodOrder $order): Invoice{
        $finalPrice = 0;
        $items = $order->getItems();
        foreach($items as $item){
            $finalPrice += $item->getPrice();
        }
        echo "{$this->name} made the invoice.". PHP_EOL;

        return new Invoice($finalPrice, 7);#本来出来上がる時間はItemごとに設定すべきだがここでは割愛
    }
}