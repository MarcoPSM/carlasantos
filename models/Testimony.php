<?php

namespace app\models;

class Testimony extends \app\core\db\DbModel
{
    public string $testimony = '';
    public string $author = '';
    public string $date = '';
    public string $relevancy = '';

    function tableName(): string
    {
        return "testimonials";
    }

    function attributes(): array
    {
        return ["testimony", "author", "date", "relevancy"];
    }

    function primaryKey(): string
    {
        return "id";
    }

    public function rules(): array
    {
        return [];
    }
}