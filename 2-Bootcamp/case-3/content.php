<?php

abstract class Content {
    protected $title;
    protected $text;

    public function __construct($title, $text) {
        $this->title = $title;
        $this->text = $text;
    }

    abstract public function getFormattedTitle();

    public function getTitle() {
        return $this->title;
    }

    public function getText() {
        return $this->text;
    }

    public function displayContent() {
        echo "<div>";
        echo "<h1>" . $this->getFormattedTitle() . "</h1>";
        echo "<p>" . $this->getText() . "</p>";
        echo "</div>";
    }
}

class Article extends Content {
    private $isBreaking;

    public function __construct($title, $text, $isBreaking = false) {
        parent::__construct($title, $text);
        $this->isBreaking = $isBreaking;
    }

    public function getFormattedTitle() {
        return $this->isBreaking ? "BREAKING: " . $this->title : $this->title;
    }
}

class Ad extends Content {
    public function getFormattedTitle() {
        return strtoupper($this->title);
    }
}

class Vacancy extends Content {
    public function getFormattedTitle() {
        return $this->title . " - apply now!";
    }
}

?>

