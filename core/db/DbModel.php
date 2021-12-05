<?php

namespace app\core\db;

use app\core\Application;
use app\core\Model;

abstract class DbModel extends Model
{

    public function __construct()
    {

    }

    abstract function tableName(): string;

    abstract function attributes(): array;

    abstract function primaryKey(): string;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($p) => ":$p", $attributes);
        $sql = "INSERT INTO $tableName (".implode(',', $attributes).") VALUES (".implode(',', $params).");";
        $statement = self::prepare($sql);
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    public function findOne($who) {
        $tableName = static::tableName();
        $attributes = array_keys($who);
        $where = implode(' AND ', array_map(fn($k) => "$k = :$k", $attributes));
        $sql = "SELECT * FROM $tableName WHERE $where";
        $statement = self::prepare($sql);
        foreach ($who as $key=>$value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public static function prepare($sql)
    {
        $db = Application::$app->db;
        return $db->pdo->prepare($sql);
    }

}