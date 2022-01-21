<?php
include_once "Patient.php";

class PatientService
{
    public $patients;

    /**
     * @param $patients
     */
    public function __construct()
    {
        $this->patients = $this->loadData();
    }


    public function saveData()
    {
        $dataJson = json_encode($this->patients);
        file_put_contents("patients.json", $dataJson);

    }

    public function loadData()
    {
        if (file_exists("patients.json")) {
            $dataJson = file_get_contents("patients.json");
            return json_decode($dataJson);
        } else {
            return [];
        }
    }

    public function addPatient($request)
    {
        $patient = new Patient($request["name"]);
        $patient->setId($this->getId());
        $patient->setAge($request["age"]);
        $patient->setAddress($request["address"]);
        $patient->setPhone($request["phone"]);
        $this->patients[] = $patient;
        $this->saveData();
    }

    public function getPatient($id)
    {
        foreach ($this->patients as $patient) {
            if ($patient->id == $id) {
                return $patient;
            }
        }
        return null;

    }

    public function getAll()
    {
        return $this->patients;
    }

    public function getId(): int
    {
        return $this->patients[count($this->patients) - 1]->id + 1;
    }

}
