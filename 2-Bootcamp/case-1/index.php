<?php

class Product {
    public $name;
    public $quantity;
    public $price;
    public $taxRate;

    public function __construct($name, $quantity, $price, $taxRate) {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->taxRate = $taxRate;
    }

    public function getTotalPrice() {
        return $this->quantity * $this->price;
    }

    public function getTotalTax() {
        return $this->getTotalPrice() * $this->taxRate;
    }
}

class Basket {
    public $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function getTotalPrice() {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $totalPrice += $product->getTotalPrice();
        }
        return $totalPrice;
    }

    public function getTotalTax() {
        $totalTax = 0;
        foreach ($this->products as $product) {
            $totalTax += $product->getTotalTax();
        }
        return $totalTax;
    }
}


$banana = new Product("Banana", 6, 1, 0.06);
$apple = new Product("Apple", 3, 1.5, 0.06);
$wine = new Product("Wine", 2, 10, 0.21);


$basket = new Basket();
$basket->addProduct($banana);
$basket->addProduct($apple);
$basket->addProduct($wine);


$totalPrice = $basket->getTotalPrice();
$totalTax = $basket->getTotalTax();

echo "Total Price: €" . number_format($totalPrice + $totalTax, 2) . "<br>";
echo "Total Tax: €" . number_format($totalTax, 2) . "<br>";

?>
