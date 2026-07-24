
<?php
        require __DIR__ . "/../vendor/autoload.php";
        use Hung\StudentManagement\controllers\controllerUser;
       // thực hiện lấy dữ liệu từ chuỗi truy vấn được gửi từ client 
        $actionInput = $_GET['action'] ?? null;

        if($actionInput === "addUsers"){
              
                controllerUser::addUsers();
        }else if($actionInput === "deleteUser"){

                    $dataIput = json_decode(file_get_contents('php://input'), true);
                 controllerUser::handleDel($dataIput['id']);
        }else if($actionInput === "updateUser"){
                $dataInput = json_decode(file_get_contents('php://input'), true);

                controllerUser::handleUpdate($dataInput);
        
        }
     
        else if($actionInput === "getUser") {
        $dataInput = json_decode(file_get_contents('php://input'), true);
     
                  $data = controllerUser::getData($dataInput);
            
                  // thực hiện dừng ct 
                  exit;
        }
      else {
                controllerUser::showHeader();
        }

        echo "xin chào các bạn";
        

?>

























<!-- 
      require __DIR__ . "/../vendor/autoload.php";
      use Hung\StudentManagement\controllers\controllerUser;
   
      $action = $_GET['action'] ?? null;
      $data = new controllerUser();
  
    




switch ($action) {
    case 'addUser':
         $data->addUser();
        break;

    default:
            $data->output();
}
 -->
