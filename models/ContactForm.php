<?php

namespace app\models;

use app\core\db\DbModel;


class ContactForm extends DbModel
{
    public string $name = '';
    public string $email = '';
    public string $subject = '';
    public string $message = '';

    public function save(): bool
    {
        $this->subject = 'Contacto pelo site';
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED],
            'message' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'name' => 'Nome',
            'email' => 'Email',
            'message' => 'Mensagem'
        ];
    }

    public function send():bool
    {
        return self::save();
    }

    function tableName(): string
    {
        return 'contacts';
    }

    function attributes(): array
    {
        return ['email', 'name', 'subject', 'message'];
    }

    function primaryKey(): string
    {
        return 'id';
    }
}