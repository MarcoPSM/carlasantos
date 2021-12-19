<?php

use app\core\Application;

class m0003_testimonials
{
    public function up()
    {
        $db = Application::$app->db;

        $create_testimonials = "
        CREATE TABLE testimonials (
            id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
            testimony character varying NOT NULL,
            author character varying,
            date timestamp,
            relevancy integer default 0,
            created_at timestamp default now()
        )";
        $db->pdo->exec("BEGIN;");
        $db->pdo->exec($create_testimonials);
        $db->pdo->exec("COMMIT;");
    }
    public function down()
    {
        $db = Application::$app->db;

        $db->pdo->exec("DROP TABLE testimonials;");
    }
}