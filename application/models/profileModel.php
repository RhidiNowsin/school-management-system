<?php 

class profileModel extends database {

    public function addstudent($student){

        if($this->Query("INSERT INTO student(name, id, course, userId) VALUES (?,?,?,?)", $student)){
            return true;
        }

    }

    public function getData($userId){

        if($this->Query("SELECT * FROM student WHERE userId = ? ", [$userId])){

            $data = $this->fetchAll();
            return $data;

        }

    }



}

?>
