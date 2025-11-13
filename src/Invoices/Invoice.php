<?php
namespace Invoices;

class Invoice{
    private float $finalPrice;
    private string $timestamp;
    private int $estimatedTimeInMimutes;

    public function __construct(float $finalPrice, int $estimatedTimeInMimutes){
        $this->finalPrice = $finalPrice;
        $this->timestamp = date("D M d, Y G:i");
        $this->estimatedTimeInMimutes = $estimatedTimeInMimutes;

    }

    public function printInvoice(): void{
        echo "------------------------" . PHP_EOL;
        echo "Date: " . $this->timestamp . PHP_EOL;
        echo "Final Price: " . $this->finalPrice . PHP_EOL;
        echo "------------------------" . PHP_EOL;
    }
}