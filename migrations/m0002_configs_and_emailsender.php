<?php

/**
 * CREate configurations table for administration stuff
 * Create send_email to put all emails to send. Exists a script that uses this table to send emails automatically
 * Trigger to copy from contacts to send_email
 *
 * cd /var/www/html/workspace/carlasantos
 * php migrations.php
 */
class m0002_configs_and_emailsender
{
    public function up()
    {
        $db = \app\core\Application::$app->db;

        /* SQL to create tables */

        $create_configurations = "
        CREATE TABLE configurations (
        id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        key character varying NOT NULL,
        value character varying NOT NULL,
        descr character varying,
        created_at timestamp default now()
        )";

        $create_send_email = "
        CREATE TABLE send_email (
        id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        mail_to character varying NOT NULL,
        cc character varying,
        bcc character varying,
        subject character varying NOT NULL,
        text character varying,
        html character varying,
        mixed character varying,
        created_at timestamp default now(),
        sent timestamp ,
        error character varying
        )";


        /* SQL to create trigger and trigger functions  */

        $create_function_contact2send_email = "
        CREATE OR REPLACE FUNCTION contact2send_email()
        RETURNS trigger
        LANGUAGE 'plpgsql'
        AS \$BODY\$
        BEGIN
        
            INSERT INTO send_email
            (mail_to, subject, html)
            SELECT c1.value, c2.value
            ,   'Contacto feito no site:<br><p>Nome: ' || NEW.name || '</p><p>email: ' || NEW.email || '</p><p>Mensagem: ' || NEW.message || '</p>'
            FROM configurations c1
            ,   configurations c2
            WHERE c1.key = 'contacts_receiver'
              AND c2.key = 'contacts_subject';
              
            RETURN new;
        END;
        \$BODY\$;";

        $createTrigger = "CREATE TRIGGER contact2send_email AFTER INSERT ON contacts FOR EACH ROW EXECUTE PROCEDURE contact2send_email();";

        $db->pdo->exec("BEGIN;");
        $db->pdo->exec($create_configurations);
        $db->pdo->exec($create_send_email);
        $db->pdo->exec($create_function_contact2send_email);
        $db->pdo->exec($createTrigger);
        $db->pdo->exec("COMMIT;");

    }

    public function down()
    {
        $db = \app\core\Application::$app->db;

        $db->pdo->exec("DROP TRIGGER contact2send_email ON contacts;");
        $db->pdo->exec("DROP TABLE configurations;");
        $db->pdo->exec("DROP TABLE send_email;");
    }
}
?>