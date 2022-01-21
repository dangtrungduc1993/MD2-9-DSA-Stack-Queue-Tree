<?php
include_once "PatientService.php";
if ( isset($_REQUEST["id"])){
    $id = $_REQUEST["id"];
    $ps = new PatientService();
    $patient = $ps->getPatient($id);
    print_r($patient);
}