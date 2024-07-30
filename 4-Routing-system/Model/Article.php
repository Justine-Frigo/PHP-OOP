<?php

declare(strict_types=1);

class Article
{   
    public int $id;
    public string $title;
    public ?string $description;
    public ?string $publishDate;
    public string $author;

    public function __construct(int $id, string $title, ?string $description, ?string $publishDate, string $author)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->publishDate = $publishDate;
        $this->author = $author;
    }

    public function formatPublishDate($format = 'd-m-Y')
    {
        // Check if publishDate is not null
        if ($this->publishDate === null) {
            return 'Date not available';
        }

        try {
            // Create a DateTime object from the publishDate
            $date = new DateTime($this->publishDate);

            // Return the formatted date
            return $date->format($format);
        } catch (Exception $e) {
            // Handle any exceptions that may occur
            return 'Invalid date format';
        }
    }
}