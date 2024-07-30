<?php

namespace app\Models;

use PDO;
use PDOException;
use Exception;
use DateTime;

abstract class Model
{
    private static ?PDO $pdo = null;
    protected static string $table;

    // Singleton de base de données, pour l'instancier uniquement quand nécessaire    
    protected static function getPDO(): PDO
    {
        if (self::$pdo === null) {
            self::initializeDatabase();
        }
        return self::$pdo;
    }

    private static function initializeDatabase(): void
    {
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo = $pdo;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function findById(int $id): ?static
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $stmt = static::getPDO()->prepare("SELECT * FROM " . static::$table . " WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public static function findAll(): array
    {
        $stmt = static::getPDO()->prepare("SELECT * FROM " . static::$table);
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function create(array $data): static
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_map(fn($key) => ":$key", array_keys($data)));
        $stmt = static::getPDO()->prepare("INSERT INTO " . static::$table . " ($columns) VALUES ($placeholders)");
        foreach ($data as $key => $value) {
            $type = PDO::PARAM_STR;
            if (is_int($value)) {
                $type = PDO::PARAM_INT;
            } elseif (is_bool($value)) {
                $type = PDO::PARAM_BOOL;
            }
            $stmt->bindValue(":$key", $value, $type);
        }
        if ($stmt->execute()) {
            $data['id'] = static::getPDO()->lastInsertId();
            return static::createInstance($data);
        }
        throw new Exception("Failed to create new record in " . static::$table);
    }

    public static function update(array $data, int $id): bool
    {
        $columns = array_keys($data);
        $columns[] = 'updated_at';
        $data['updated_at'] = (new DateTime())->format('Y-m-d H:i:s');

        $setClause = implode(', ', array_map(function ($col) {
            return "$col = :$col";
        }, $columns));

        $sql = "UPDATE " . static::$table . " SET $setClause WHERE id = :id";
        $stmt = static::getPDO()->prepare($sql);

        foreach ($data as $col => $value) {
            $stmt->bindValue(":$col", $value);
        }
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }


    public static function delete(int $id): bool
    {
        $stmt = static::getPDO()->prepare("DELETE FROM " . static::$table . " WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public static function count(): int
    {
        $pdo = static::getPDO();
        $stmt = $pdo->query("SELECT COUNT(*) as count FROM " . static::$table);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $result['count'];
    }

    public static function findPaginated(int $offset, int $limit): array
    {
        $stmt = static::getPDO()->prepare("SELECT * FROM " . static::$table . " LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    protected static function createInstance(array $data): static
    {
        $instance = new static();
        foreach ($data as $property => $value) {
            if (property_exists($instance, $property)) {
                $instance->$property = $value;
            }
        }
        return $instance;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
