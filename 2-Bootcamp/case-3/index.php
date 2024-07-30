<?php

// Inclure les classes définies précédemment
require_once 'content.php';

$contents = [
    new Article("New Innovations in Tech", "This is the text of the article about technology innovations.", true),
    new Article("Local Sports Update", "Here is the latest news in local sports."),
    new Ad("Super Sale on Laptops", "Get the best deals on laptops this weekend!"),
    new Vacancy("Software Engineer Position", "We are looking for a software engineer to join our team.")
];

foreach ($contents as $content) {
    $content->displayContent();
}

?>