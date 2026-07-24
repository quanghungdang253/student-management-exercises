<?php
namespace Hung\StudentManagement\models;
use Hung\StudentManagement\connectDB;

    use PDO;
    use PDOException;
    

 class modelUser {
    
    // lấy tất cả dữ 
    // public static function getAllData(){
    //      $connect = connectDB::handleConnect();
    //      $listData = $connect->query("SELECT * FROM dataUsers");
    //      return $listData->fetchAll();
    // }

     public static function modelUsers($dataInput){
        $listData = [];
      
        //  $girl = $dataInput['girl'] ?? null;
        //  $boy = $dataInput['boy'] ?? null;
        //  $girlBoy = $dataInput['girlBoy'] ?? null;
        $sex = $dataInput['sex'] ?? null;


         
         $select = $dataInput['select'] ?? null;
     
         $models =  connectDB::handleConnect();
         // thực hiện tạo truy vấn lấy dữ liệu 
        $handleGetData = null;
         if($sex === "Nam"){
                $handleGetData = $models->prepare("SELECT id, fullname, age, link_img, sex FROM users WHERE sex = ?");
                $handleGetData->bindParam(1, $sex, PDO::PARAM_STR);
                $handleGetData->execute();
                
         }else if($sex === "Nữ"){
                $handleGetData = $models->prepare("SELECT id, fullname, age, link_img, sex FROM users WHERE sex = ?");
                $handleGetData->bindParam(1, $sex, PDO::PARAM_STR);

                $handleGetData->execute();
            
         }else {
            $handleGetData = $models->prepare("SELECT * FROM users");
            $handleGetData->execute();
         }
     
      
         // ở đây kết quả của truy vấn sẽ trả về đối tượng kết quả chứa 
         // sử dụng var_dump để in ra chi tiết 
          if($handleGetData){
                if($handleGetData->rowCount() > 0){
                    // lấy một dòng dữ liệu từ kết quả truy vấn mỗi lần gọi 
                     while($data = $handleGetData->fetch(PDO::FETCH_ASSOC)){
                            // thực hiện thêm mỗi phần từ vào cuối mảng 
                            $listData[] = $data;
                     }
                }
          }
         if($select === "short"){
                // sử dụng hàm sắp xếp từ thấp đến cao tự định nghĩa 
                usort($listData, function($a,$b){
                    return(int)$a['age'] <=> (int)$b['age'];
                });
                echo json_encode($listData); 

         }else if($select === "tall"){
                usort($listData, function($a, $b){
                        return (int)$b['age'] <=>(int)$a['age'];
                });
                  echo json_encode($listData); 
         }else {
                echo json_encode($listData); 
         }
         // ở đây nếu thực thi sẽ trar
     }

     
public static function modelsAddUsers($data){
    $fullname = $data['fullname'];
    $age = $data['age'];
    $sex = $data['sex'];
    $getImg = $_FILES['img']['name'];
    $tmpName = $_FILES['img']['tmp_name'];

    $folder = __DIR__ . "/../../public/avatars/";

    if(!is_dir($folder)){
        mkdir($folder, 0755, true);
    }

    $ext = pathinfo($getImg, PATHINFO_EXTENSION);
    $fileName = uniqid() . '.' . $ext;
    $filePath = $folder . $fileName;
    $filePathDB = "avatars/$fileName"; // lưu vào database

    if(move_uploaded_file($tmpName, $filePath)){
        $connectDB = connectDB::handleConnect();
        $sqlCode = "INSERT INTO users(fullname, age, link_img, sex) VALUES (?, ?, ?, ?)";
        $stml = $connectDB->prepare($sqlCode);
        $stml->execute([$fullname, $age, $filePathDB, $sex]);

        echo "Upload thành công";
    } else {
        echo "Upload chưa thành công";
    }
}








//      public static function modelsAddUsers($data){
//           $sql = connectDB::handleConnect();
//           $fullname = $data['fullname'];
//           $age = $data['age'];
//           // thực hiện lấy tên file gốc do người dùng upload . ví dụ anh.jpg;
//           $getImg = $_FILES['img']['name'];
//           // thực hiện lấy đường dẫn file tạm thời  trên server 
//           $tmpName = $_FILES['img']['tmp_name'];
//          $folder = __DIR__ . "/../../public/avatars/";
 
//           // thực hiện kiếm tra xem thư mục có tồn tại không 
//           if(!is_dir($folder)){
//             // thực hiện tạo thư mục nếu chưa tồn tại 
//                  mkdir($folder, 0777, true);
//           }
//           // thực hiện phân tích đường dẫn của file 
//           // tham số 1: đường dẫn file cần phân tích 
//           // tham số 2: cho biết muốn lấy phần nào cũng đươc dẫn 
//           // thực hiện tách riêng đường dẫn và chỉ lấy ra phần đuổi mở rộng 
//         $path = pathinfo($getImg, PATHINFO_EXTENSION);

//         // thực hiện đặt tên file tự động tránh trùng lặp dùng uniqide() để tạo id tự động dựa trên thời gian thực 
// // sau khi thực hiện sẽ có dạng abcifeif.jpg
//         $pathName = uniqid() . '.' . $path;
//         $filePath = $folder . $pathName;
//           // ở đây thực hiện di chuyển file từ vị trí này sang vị trí khác rồi đổi tên 
//           // ở đây nếu trả về true là chuyển thành công 
//         if(move_uploaded_file($tmpName, $filePath)){
//               $connectDB = connectDB::handleConnect();
//               $sqlCode = "INSERT INTO dataUsers(fullname, age, link_img)
//               VALUES(?, ?, ?);
              
//               ";
//               $stml = $connectDB->prepare($sqlCode);
//               $stml->bindParam(1, $fullname, PDO::PARAM_STR);
//               $stml->bindParam(2, $age, PDO::PARAM_INT);
//               $stml->bindParam(3, $filePath, PDO::PARAM_STR);

//               $stml->execute();

//               echo "UPdate thành công";
//         }else {
//             echo "Up chưa thành công";
//         }

//         // thực hiện

//      }

     public static function handleDelete($id){
              $connect = connectDB::handleConnect();
              $sql = $connect->prepare("DELETE FROM dataUsers WHERE id= ?");
              $sql->bindParam(1, $id, PDO::PARAM_INT);

              $sql->execute();
     }

     public static function handleUpdate($dataInput){
         $connect = connectDB::handleConnect();
         $sql = $connect->prepare("
         UPDATE dataUsers
         SET fullname = :fullname, age = :age
         WHERE id = :id
         
         
         ");
         $sql->bindParam(':fullname', $dataInput['fullname'], PDO::PARAM_STR);
         $sql->bindParam(':age', $dataInput['age'], PDO::PARAM_INT);
         $sql->bindParam(':id', $dataInput['id'], PDO::PARAM_INT);

         $sql->execute();
     }

 }










































// namespace Hung\StudentManagement\models;
// use Hung\StudentManagement\controllers\controllerUser;
// use Hung\StudentManagement\database;     
// use PDO;       
// require __DIR__ . "/../../vendor/autoload.php";
// class modelUser {
//     public static function getData(){
//         $data = database::connectDB();
//         $listData = $data->query("SELECT id, fullname, age FROM dataUsers");
//         // nếu kết quả truy vấn thành công sẽ trả về đối tượng PDOStatement
//         return $listData->fetchAll(PDO::FETCH_ASSOC);
//     }

//     public static function addUser($dataInput){
//               // tiến hành kiemr tra xem hai trường có toonftaij k nếu có true 
//         if(!isset($dataInput['fullname']) ||  !isset($dataInput['age'])){
//             // thực hiện gửi mã trang thái 
//             http_response_code(401);
//             echo json_encode(["error" => "add data faild"]);
//         }
//           $fullname = $dataInput['fullname'];
//         $age = $dataInput['age'];

//         $db = database::connectDB();
//         $sql = "INSERT INTO dataUsers (fullname, age) VALUES (:fullname, :age)";
//         $stmt = $db->prepare($sql);
//         return $stmt->execute([
//             ':fullname' => $fullname,
//             ':age' => $age
//         ]);

//     }
// }
