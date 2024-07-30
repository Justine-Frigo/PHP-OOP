<?php
declare(strict_types=1);

class Beverage
{
    protected string $color;
    protected float $price;
    protected string $temperature;

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

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }
}

class Beer extends Beverage
{
    protected string $name;
    protected float $alcoholPercentage;

    public function __construct(string $color, float $price, string $name, float $alcoholPercentage, string $temperature = "cold")
    {
        parent::__construct($color, $price, $temperature);
        $this->name = $name;
        $this->alcoholPercentage = $alcoholPercentage;
    }

    public function getAlcoholPercentage(): void
    {
        echo $this->alcoholPercentage . '%';
    }

    public function getName(): string
    {
        return $this->name;
    }

    private function beerInfo(): string
    {
        return "Hi I'm " . $this->name . " and have an alcohol percentage of " . $this->alcoholPercentage . "% and I have a " . $this->color . " color.";
    }

    public function printBeerInfo(): void
    {
        echo $this->beerInfo();
    }
}

$duvel = new Beer("blond", 3.5, "Duvel", 8.5);


$duvel->getAlcoholPercentage();
echo '<br>';
echo $duvel->getAlcoholPercentage();
echo '<br>';


echo $duvel->getColor();
echo '<br>';


$duvel->getInfo();

$duvel->setColor("light");
echo $duvel->getColor();
echo '<br>';


$duvel->printBeerInfo();
?>
