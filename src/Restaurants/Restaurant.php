<?php
namespace Restaurants;

use Persons\Employees\Employee;
use FoodItems\FoodItem;
use Invoices\Invoice;

class Restaurant{
    private array $foodItems;
    private array $employees;

    public function __construct(array $foodItems, array $employees){
        $this->foodItems = $foodItems;
        $this->employees = $employees;
    }

    public function getFoodItems(): array{
        return $this->foodItems ?? [];
    }

    public function getEmployees(): array{
        return $this->employees ?? [];
    }

    public function order(array $categories): Invoice{
        $casher = null;
        $chef = null;

        foreach($this->employees as $employee){
            if($employee instanceof \Persons\Employees\Casher){
                $casher = $employee;
            }
            else if($employee instanceof \Persons\Employees\Chef){
                $chef = $employee;
            }
        }

        if(!$casher){
            throw new \Exception("Casher not found");
        }

        if(!$chef){
            throw new \Exception("Chef not found");
        }

        $order = $casher->generateOrder($categories);
        $invoice = $casher->generateInvoice($order);

        $chef->prepareFood($order);

        return $invoice;

    }
}
