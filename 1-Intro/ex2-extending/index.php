<?php
declare(strict_types=1);

class Beverage
{
    public string $color;
    public float $price;
    public string $temperature;

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
        echo $this->temperature;
    }
}

class Beer extends Beverage
{
    public string $name;
    public float $alcoholPercentage;

    public function __construct(string $color, float $price, string $name, float $alcoholPercentage, string $temperature = "cold")
    {
        parent::__construct($color, $price, $temperature);
        $this->name = $name;
        $this->alcoholPercentage = $alcoholPercentage;
    }

    public function getAlcoholPercentage(): void
    {
        echo $this->alcoholPercentage;
    }
}


$duvel = new Beer("blond", 3.5, "Duvel", 8.5);


$duvel->getAlcoholPercentage(); 
echo '<br>';
echo $duvel->alcoholPercentage;
echo '<br>';


echo $duvel->color;
echo '<br>';

$duvel->getInfo();
?>
