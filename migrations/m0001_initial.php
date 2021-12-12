<?php

class m0001_initial {
    public function up() {
        $db = \app\core\Application::$app->db;
        $create_users = "
        CREATE TABLE users (
        id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        email character varying NOT NULL,
        password character varying NOT NULL,
        firstname character varying  NOT NULL,
        lastname character varying,
        status integer  NOT NULL,
        created_at timestamp default now()
        )";
        $create_sentences = "
        CREATE TABLE sentences (
            id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
            pt character varying NOT NULL,
            en character varying,
            fr character varying,
            created_at timestamp default now()
        )";
        $create_contacts = "
        CREATE TABLE contacts (
            id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
            email character varying NOT NULL,
            name character varying,
            subject character varying,
            message character varying,
            created_at timestamp default now()
        )";
        $create_newsletter_subscribers = "
        CREATE TABLE newsletter_subscribers (
            id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
            email character varying NOT NULL,
            active boolean default true,
            created_at timestamp default now()
        )";
        $create_pages = "
        CREATE TABLE pages (
            id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
            title integer,
            contents integer[], 
            created_at timestamp default now(),
            CONSTRAINT fk_pages_title
                FOREIGN KEY(title) 
	            REFERENCES sentences(id)
                ON DELETE SET NULL
        )";
        $create_contents = "
        CREATE TABLE contents (
            id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
            title integer,
            description integer,
            created_at timestamp default now(),
            CONSTRAINT fk_contents_title
                FOREIGN KEY(title) 
	            REFERENCES sentences(id)
                ON DELETE SET NULL,
            CONSTRAINT fk_contents_description
                FOREIGN KEY(description) 
	            REFERENCES sentences(id)
                ON DELETE SET NULL
        )";

        $db->pdo->exec($create_users);
        $db->pdo->exec($create_sentences);
        $db->pdo->exec($create_contacts);
        $db->pdo->exec($create_newsletter_subscribers);
        $db->pdo->exec($create_pages);
        $db->pdo->exec($create_contents);
    }
    public function down() {
        $db = \app\core\Application::$app->db;

        $db->pdo->exec("DROP TABLE users;");
        $db->pdo->exec("DROP TABLE sentences;");
        $db->pdo->exec("DROP TABLE contacts;");
        $db->pdo->exec("DROP TABLE newsletter_subscribers;");
        $db->pdo->exec("DROP TABLE pages;");
        $db->pdo->exec("DROP TABLE contents;");
    }
}