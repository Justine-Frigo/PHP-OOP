<?php
namespace app\Models;
use DateTime;

class Post extends Model
{
    protected static string $table = 'posts';

    public int $id;
    public string $title;
    public string $body;
    public string $author;
    public string $created_at;
    public string $updated_at;

    public static function create(array $data): static
    {
        if (isset($data['created_at']) && $data['created_at'] instanceof DateTime) {
            $data['created_at'] = $data['created_at']->format('Y-m-d H:i:s');
        }
        if (isset($data['updated_at']) && $data['updated_at'] instanceof DateTime) {
            $data['updated_at'] = $data['updated_at']->format('Y-m-d H:i:s');
        }
        return parent::create($data);
    }

    public static function update(array $data, $id): bool
{
    // Vérifier et formater les dates
    if (isset($data['created_at']) && $data['created_at'] instanceof DateTime) {
        $data['created_at'] = $data['created_at']->format('Y-m-d H:i:s');
    }
    if (isset($data['updated_at']) && $data['updated_at'] instanceof DateTime) {
        $data['updated_at'] = $data['updated_at']->format('Y-m-d H:i:s');
    } else {
        // Sinon, on ajoute automatiquement la date actuelle
        $data['updated_at'] = (new DateTime())->format('Y-m-d H:i:s');
    }

    // Appeler la méthode update de la classe parente
    return parent::update($data, $id);
}

}