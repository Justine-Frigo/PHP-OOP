<?php
namespace app\Controllers;
use app\Models\Post;
use DateTime;
use Faker\Factory as Faker;

class PostSeederController extends Controller
{
    public function seed()
    {
        $faker = Faker::create();
        $now = new DateTime();
        $count = 50;
       
        for ($i = 0; $i < $count; $i++) {
            Post::create([
                'title' => $faker->sentence(5),
                'body' => $faker->text(),
                'author' => $faker->name(),
                'created_at' => $now->format('Y-m-d H:i:s'),
                'updated_at' => $now->format('Y-m-d H:i:s')
            ]);
        }
        return $this->jsonResponse(['status' => 200, 'message' => $count . ' posts have been seeded.']);
    }
}