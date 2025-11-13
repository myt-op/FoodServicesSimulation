<?php 
spl_autoload_extensions(".php");
spl_autoload_register(function($class){
    $filePath = __DIR__ . "/src/". str_replace("\\", "/", $class). ".php";
    
    if(file_exists($filePath)){
        require_once $filePath;
    }else{
        echo "[Autoload] File not found for class: $class ($filePath)" . PHP_EOL;
    }
});


$cheeseBurger = new FoodItems\CheeseBurger();
$fettuccine = new FoodItems\Fettuccine();
$hawaiianPizza = new FoodItems\HawaiianPizza();
$spaghetti = new FoodItems\Spaghetti();

$Lex = new \Persons\Employees\Chef("Lex", 20, "Osaka", 1, 30);
$Sara = new \Persons\Employees\Casher("Sara", 28, "Osaka", 2, 27);

$saizeriya = new \Restaurants\Restaurant(
    [
        $cheeseBurger,
        $fettuccine,
        $hawaiianPizza,
        $spaghetti
    ],

    [
        $Lex,
        $Sara
    ]

);

$interestedTasteMap = [
    "Margherita" => 1,
    "CheeseBurger" => 2,
    "Spaghetti" => 1
];

$Tom = new Persons\Customers\Customer("Tom", 45, "Okayama", $interestedTasteMap);

$invoice = $Tom->order($saizeriya);
$invoice -> printInvoice();