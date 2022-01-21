<?php
include_once "Patient.php";
class QueuePatient
{
    private $queue;

    /**
     * @param $name
     * @param $code
     */
    public function __construct()
    {
        $this->queue = $this->loadData();

    }

    public function getQueue()
    {
        return $this->queue;
    }

    public function enqueue($patient)
    {
        $this->queue[] = $patient;
        $this->saveData();
    }

    public function dequeue()
    {
        if(!$this->isEmpty()){
            $index = 0;
            $patient = $this->queue[0];
            for ( $i = 0 ; $i < count($this->queue); $i++){
                if ( $this->queue[$i]->code < $patient->code){
                    $patient = $this->queue[$i];
                    $index = $i;
                }
            }
            array_splice($this->queue,$index,1);
            $this->saveData();
            return $patient;
        }
    }

    public function isEmpty(): bool
    {
        return count($this->queue) == 0;
    }

    public function toString():array
    {
        return ($this->queue);
    }

    public function saveData()
    {
        $dataJson = json_encode($this->queue);
        file_put_contents("data.json",$dataJson);

    }
    public function loadData()
    {
        if (file_exists("data.json")){
            $dataJson = file_get_contents("data.json");
            return json_decode($dataJson);
        }
        else{
            return [];
        }
    }
}
