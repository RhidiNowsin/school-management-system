<?php 

class profileModel extends database {

    public function addstudent($student){

        if($this->Query("INSERT INTO student(name, id, course, userId) VALUES (?,?,?,?)", $student)){
            return true;
        }

    }


}

?>
