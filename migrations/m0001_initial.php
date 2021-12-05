<?php

class m0001_initial {
    public function up() {
        $db = \app\core\Application::$app->db;
        $SQL = "
        CREATE TABLE users (
        id serial PRIMARY KEY,
        email character varying,
        firstname character varying,
        lastname character varying,
        status integer,
        created_at timestamp default now()
        )";
        $db->pdo->exec($SQL);
    }
    public function down() {
        $db = \app\core\Application::$app->db;
        $SQL = "DROP TABLE users;";
        $db->pdo->exec($SQL);
    }
}