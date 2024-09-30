<?php

class nilai{
    private $tugas = 0;
    private $uts = 0;
    private $uas = 0;

    // setter
    public function setTugas($tugas){
        if($tugas <= 100 && $tugas >= 0){
            $this->tugas = $tugas;
        }else{
            $this->tugas = 0;
        }
    }

    public function setUts($uts){
        if($uts <= 100 && $uts >= 0){
            $this->tugas = $uts;
        }else{
            $this->uts = 0;
        }
    }
    public function setUas($uas){
        if($uas <= 100 && $uas >= 0){
            $this->uas = $uas;
        }else{
            $this->uas = 0;
        }
    }

    //getter
    public function getTugas(){
        return $this->tugas;
    }

    public function getUts(){
        return $this->uts;
    }

    public function getUas(){
        return $this->uas;
    }

    // method
    public function hitunganTotal(){
        $nilaiTotal = 0.30 * $this->uts + 0.35 * $this->uas;
        return $nilaiTotal
    }

}