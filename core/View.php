<?php

namespace app\core;

use app\models\ContactForm;

class View
{
    public string $title = '';
    public string $activeMenu = '';


    public function isActive(string $menu): bool
    {
        return $menu === $this->activeMenu;
    }

    public function renderView(string $view, $params = [])
    {
        $viewContent = $this->renderOnlyView($view, $params);
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function layoutContent()
    {
        $layout = Application::$app->layout;
        if (Application::$app->getController()) {
            $layout = Application::$app->getController()->layout;
        }

        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
        return ob_get_clean();
    }

    public function renderOnlyView($view, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }

}