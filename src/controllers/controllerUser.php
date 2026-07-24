<?php
    namespace Hung\StudentManagement\controllers;
    use Hung\StudentManagement\models\modelUser;


    class controllerUser {
                public static function getData($dataInput){
                    $students = modelUser::modelUsers($dataInput);
             
                    // echo "Dữ liệu nhận được là " . $students;
                }
                public static function showHeader(){
                          require __DIR__ . "/../view/header.php";
                }
                public static function addUsers(){
                    $data =  $_POST;
                    // thực hiện kiểm tra dữ liệu có tồn tại k 
    if(!isset($data['fullname']) ||
       !isset($data['age']) ||
       !isset($data['sex']) ||
        $_FILES['img']['error'] !== 0
      ){
            http_response_code(400);
            exit("dữ liệu chưa đủ ");

     }else {
       
    $addStudents =  modelUser::modelsAddUsers($data);
     }
}           
    public static function handleDel($id){
                        $students = modelUser::handleDelete($id);
                    
                }

                public static function handleUpdate($dataInput){
                        $students = modelUser::handleUpdate($dataInput);
                }
    }


?>


























