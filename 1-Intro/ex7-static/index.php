<?php
declare(strict_types=1);

class Beverage
{
    private string $color;
    private float $price;
    private string $temperature;
    const BARNAME = 'Het Vervolg';
    private static string $address = "Melkmarkt 9, 2000 Antwerpen";

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

    public function printBarName(): void
    {
        echo 'Bar name: ' . self::BARNAME . '<br>';
    }

    public static function printAddress(): void
    {
        echo 'Address: ' . self::$address . '<br>';
    }

    public static function getAddress(): string
    {
        return self::$address;
    }
}

class Beer extends Beverage
{
    private string $name;
    private float $alcoholPercentage;

    public function __construct(string $color, float $price, string $name, float $alcoholPercentage, string $temperature = "cold")
    {
        parent::__construct($color, $price, $temperature);
        $this->name = $name;
        $this->alcoholPercentage = $alcoholPercentage;
    }

    public function getAlcoholPercentage(): void
    {
        echo $this->alcoholPercentage . '%<br>';
    }

    public function printBeerInfo(): void
    {
        echo 'Beer name: ' . $this->name . ' with alcohol percentage of ' . $this->alcoholPercentage . '%<br>';
    }

    public function printBarName(): void
    {
        echo 'Bar name in Beer class: ' . parent::BARNAME . '<br>';
    }
}

$duvel = new Beer("blond", 3.5, "Duvel", 8.5);


$duvel->getAlcoholPercentage();
echo $duvel->getAlcoholPercentage();
echo '<br>';


$duvel->getInfo();

$duvel->printBarName();

$duvel->printBarName();

$duvel->printBeerInfo();


Beverage::printAddress();
echo Beverage::getAddress() . '<br>';
?>
