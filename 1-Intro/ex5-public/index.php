<?php 
declare(strict_types=1);

class Beverage
{
    private string $color;
    private float $price;
    private string $temperature;

    public function __construct(string $color, float $price, string $temperature = "cold")
    {
        $this->color = $color;
        $this->price = $price;
        $this->temperature = $temperature;
    }

    public function getInfo(): void
    {
        echo 'This beverage is ' . $this->temperature . ' and ' . $this->color . '<br>';
    }

    public function getTemperature(): void
    {
        echo $this->temperature . '<br>';
    }

    public function printPrice(): void
    {
        echo $this->price . ' euro<br>';
    }

    public function changePrice(float $newPrice): void
    {
        $this->price = $newPrice;
    }
}

$cola = new Beverage("black", 2);

$cola->getInfo();
$cola->getTemperature();

$cola->changePrice(3.5);
$cola->printPrice();

?>
