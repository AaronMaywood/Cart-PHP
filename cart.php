<?php
class Product {
    private $name;
    private $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }
}

class Cart {
    private $products = [];

    public function addProduct($product) {
        $this->products[] = $product;
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }

    public function listProducts() {
        foreach ($this->products as $product) {
            echo "{$product->getName()}: {$product->getPrice()}円<br>";
        }
    }
}

// ショッピングをする
$product1 = new Product("りんご", 100);
$product2 = new Product("バナナ", 200);

$cart = new Cart();
$cart->addProduct($product1);   // りんごをカートに入れる 
$cart->addProduct($product2);   // バナナをカートに入れる 
$cart->addProduct($product2);   // バナナをカートに入れる 

$cart->listProducts();          // りんご: 100円
                                // バナナ: 200円
                                // バナナ: 200円
echo "合計金額: " . $cart->getTotalPrice() . "円<br>";  // 合計金額: 500円
