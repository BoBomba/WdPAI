<?php
session_start();

require_once 'AppController.php';
require_once __DIR__.'/../models/Incident.php';
// TODO zrobic podlaczenie do bazy danych
//require_once __DIR__.'/../repository/MapRepository.php';

class MapController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function map()
    {
        $this->render('map');
    }

}