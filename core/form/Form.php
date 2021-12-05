<?php

namespace app\core\form;

use app\core\Model;

class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function inputField(Model $model, $attribute): InputField
    {
        return new InputField($model, $attribute);
    }

    public function textareaField(Model $model, $attribute): TextareaField
    {
        return new TextareaField($model, $attribute);
    }
}