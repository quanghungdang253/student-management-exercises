<?php
       
        // thuecj hiện nạp file autoload để từ đọng tải các class 
        namespace Hung\StudentManagement;
        require __DIR__ . "/../vendor/autoload.php";
    //
        use PDO;
        use PDOException;
        class connectDB {
            private static $data = null;
            public static function handleConnect(){
 // thực hiện tạo kết nối rồi mới truy vấn 
                try {
                          $host = "127.0.0.1";  // địa chỉ server mysql;
                    $name = "root";
                    $pass = "";
                    $dbname = "testdb";
                self::$data = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8; ", $name, $pass);
                self::$data->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// ở đây nếu lỗi sẽ ném cho 
                }
              catch(PDOException $e){
                  die("error while get data " . $e);
              }
                return self::$data;

            }
        }
        

























































//    namespace Hung\StudentManagement;
//     require __DIR__ . "/../vendor/autoload.php";
    
//     use PDO;
//     use PDOException;


//     class database {

//         private static $nameData = null;
//         public static function connectDB(){
//          try {
              
         
//              if(self::$nameData === null){
//                     $host = "127.0.0.1";
//              $name = "root";
//              $pass = "";
//              $namedb = "testdb";
//         self::$nameData = new PDO("mysql:host=$host;dbname=$namedb;charset=utf8", $name, $pass
//             );

//                  self::$nameData->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//              }
//          }
//          // ở đây nếu lỗi sẽ ném ra 
//          catch(PDOException $e){
//                 exit("error while connect database $e");
//          }
             

//          return self::$nameData;
//         }
//     }





