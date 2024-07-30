<?php

namespace app\Models;

use PDO;
use app\Models\Model;

class User extends Model
{
    protected static string $table = 'users';
    public int $id;
    public string $username;
    public string $email;
    public string $password;

    public static function findByEmail(string $email): ?User
    {
        $stmt = parent::getPDO()->prepare("SELECT * FROM " . self::$table . " WHERE email = :email");

        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result ?: null;
    }
}