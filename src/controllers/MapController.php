<?php
session_start();

require_once 'AppController.php';
require_once __DIR__.'/../models/Incident.php';
require_once __DIR__.'/../repository/MapRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class MapController extends AppController
{
    private $IncidentRepository;
    public function __construct()
    {
        parent::__construct();
        $this->IncidentRepository = new MapRepository();
    }

    public function map()
    {
        $this->render('map');
    }

    public function Incidents()
    {
        $Incidents = $this->IncidentRepository->getIncidents();
        $this->UserRepository = new UserRepository();

        foreach ($Incidents as $key => $incident) {
            $authorName = $this->UserRepository->getUsername($incident['author']);
            $Incidents[$key]['author'] = $authorName ? $authorName : 'Nieznany autor';
        }

        header('Content-type: application/json');
        http_response_code(200);

        echo json_encode($Incidents);
    }
}