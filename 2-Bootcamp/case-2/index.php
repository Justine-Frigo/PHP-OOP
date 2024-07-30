<?php

class Product {
    public $name;
    public $quantity;
    public $price;
    public $taxRate;
    public $category;

    public function __construct($name, $quantity, $price, $taxRate, $category) {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->taxRate = $taxRate;
        $this->category = $category;
    }

    public function getTotalPrice() {
        return $this->quantity * $this->price;
    }

    public function getTotalTax() {
        return $this->getTotalPrice() * $this->taxRate;
    }

    public function applyDiscount($discountRate) {
        if ($this->category == 'fruit') {
            $this->price *= (1 - $discountRate);
        }
    }
}

class Basket {
    public $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function applyDiscountToFruits($discountRate) {
        foreach ($this->products as $product) {
            $product->applyDiscount($discountRate);
        }
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


$banana = new Product("Banana", 6, 1, 0.06, 'fruit');
$apple = new Product("Apple", 3, 1.5, 0.06, 'fruit');
$wine = new Product("Wine", 2, 10, 0.21, 'non-fruit');


$basket = new Basket();
$basket->addProduct($banana);
$basket->addProduct($apple);
$basket->addProduct($wine);


$basket->applyDiscountToFruits(0.50);


$totalPrice = $basket->getTotalPrice();
$totalTax = $basket->getTotalTax();

echo "Total Price: €" . number_format($totalPrice + $totalTax, 2) . "<br>";
echo "Total Tax: €" . number_format($totalTax, 2) . "<br>";

?>
