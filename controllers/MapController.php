<?php

namespace app\controllers;

class MapController extends \app\core\Controller
{
    public function init()
    {
        return $this->render('map');
    }

    public function getData()
    {
        echo '{"type":"Polygon","coordinates":[[[12.1451849670559,-5.77188592678666],[12.1451849670559,-5.11706440856696],[12.5311494943228,-5.11706440856696],[12.5311494943228,-5.77188592678666],[12.1451849670559,-5.77188592678666]]]}';
    }
}