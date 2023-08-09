<?php 

class profile extends framework {


    public function __construct()
    {

        if(!$this->getSession('userId')){

            $this->redirect("accountController/loginForm");
    
          }

        $this->helper("link");
        $this->profileModel = $this->model("profileModel");

    }
    public function index(){



       $this->view("profile");

    }

    public function studentform(){
        $this->view("addstudent");
      }

    public function studentstore(){
      $studentData = [

        'name'            => $this->input('name'),
        'id'              => $this->input('id'),
        'course'          => $this->input('course'),
        'nameError'       => '',
        'idError'         => '',
        'courseError' => ''
 
       ];
 
       if(empty($studentData['name'])){
         $studentData['nameError'] = "Name is required";
       }
       if(empty($studentData['id'])){
         $studentData['idError'] = "id is required";
       }
       if(empty($studentData['course'])){
         $studentData['courseError'] = "course is required";
       }

       if(empty($studentData['nameError']) && empty($studentData['idError']) && empty($studentData['courseError'])){ 

        $data = [$studentData['name'], $studentData['id'], $studentData['course'], $this->getSESSION('userId')];
         if($this->profileModel->addstudent($data)){

                
        $this->setFlash("studentUpdated", "Student course has been inserted successfully");
         $this->redirect("profile/index");
         }
         

      } else {
        $this->view("addstudent", $studentData);
      }


    }

  
    public function logout(){

        $this->destroy();
        $this->redirect("accountController/loginForm");

    }

  }



?>