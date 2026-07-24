
**PDO (PHP Data Objects)**: Là class chuẩn trong PHP để kết nối và tương tác với nhiều loại cơ sở dữ liệu (MySQL, PostgreSQL, SQLite, SQL Server…).

Ưu điểm: tính trừu tượng, nghĩa là bạn dùng cùng cú pháp PDO cho nhiều DB khác nhau mà không cần thay đổi quá nhiều code.

Hỗ trợ: prepared statements → bảo vệ chống SQL Injection.


**PDOException**: 
Là class Exception riêng của PDO, dùng để bắt lỗi liên quan đến PDO.

Khi có lỗi kết nối hoặc lỗi truy vấn, PDO sẽ ném PDOException.

Bạn có thể dùng try…catch để xử lý.

**2. setAttribute()**: 
Là phương thức của PDO để thiết lập các thuộc tính (attributes) cho kết nối PDO.

Cú pháp:

$pdo->setAttribute($attribute, $value);

$attribute → tên thuộc tính bạn muốn thiết lập.

$value → giá trị bạn muốn gán cho thuộc tính đó.

**PDO::ATTR_ERRMODE**: 
Đây là thuộc tính lỗi của PDO.

Xác định cách PDO xử lý lỗi khi thực thi SQL hoặc kết nối DB.

Các giá trị phổ biến:

PDO::ERRMODE_SILENT → mặc định, PDO chỉ đặt lỗi, không thông báo (phải dùng errorCode() hoặc errorInfo() để kiểm tra).

PDO::ERRMODE_WARNING → PDO phát sinh cảnh báo PHP khi có lỗi.

PDO::ERRMODE_EXCEPTION → PDO ném ra Exception (PDOException) khi có lỗi. Đây là chế độ tốt nhất để xử lý lỗi chuyên nghiệp.

**PDO::ERRMODE_EXCEPTION**
Giá trị gán cho ATTR_ERRMODE.

Khi có lỗi SQL (như syntax sai, table không tồn tại...), PDO sẽ ném ra exception.

Điều này giúp bạn bắt lỗi dễ dàng bằng try/catch:


**fetchAll(...)**: là phương thức của PDOStatement, dùng để lấy toàn bộ dữ liệu từ kết quả query trả về.

**fetchAll()**:
Lấy toàn bộ kết quả của câu truy vấn và trả về dưới dạng một mảng (array).
Nếu bảng có 3 dòng thì bạn sẽ nhận được một mảng 3 phần tử, mỗi phần tử là 1 dòng.

**PDO::FETCH_ASSOC**:
Quy định cách dữ liệu được trả về. Ở đây nó sẽ trả về mỗi dòng dưới dạng mảng kết hợp (associative array), trong đó key chính là tên cột trong CSDL.

Mỗi lần gọi $result->fetch_assoc() nó sẽ lấy ra 1 dòng dữ liệu kế tiếp từ kết quả truy vấn.

Dữ liệu trả về là một mảng kết hợp (associative array), trong đó key chính là tên cột.

Nếu hết dữ liệu thì trả về null.






**file: autoload**:

autoload.php là file do Composer tự động tạo ra để giúp PHP tự động nạp (autoload) các class và thư viện mà bạn đã cài, thay vì phải require từng file riêng lẻ.

**__DIR__**: Là hằng số PHP tự động chứa đường dẫn thư mục của file hiện tại.

Ví dụ: nếu file hiện tại ở C:\xampp\htdocs\project\index.php, thì __DIR__ = C:\xampp\htdocs\project.


**namespace**: Trong PHP, namespace là cách để tổ chức code theo “không gian tên”, giúp tránh xung đột tên class, function hoặc constant khi dự án lớn hoặc dùng nhiều thư viện.

ví dụ: 2️⃣ Lợi ích

Tránh trùng tên
ở đây hai class đều có tên User nhưng không gian tên khác nhau nên không bị lỗi 
namespace App\Models;
class User {}
 
namespace App\Controllers;
class User {}

**cú pháp use**:
Đúng rồi 👍, trong PHP, use là cú pháp để “áp dụng” hoặc “nhập” tham chiếu đến  một namespace/class vào file hiện tại.

**password_hash()**: Đây là hàm có sẵn trong PHP (từ PHP 5.5 trở lên).

Nó dùng để mã hoá (hash) mật khẩu một cách an toàn trước khi lưu vào cơ sở dữ liệu.

Hàm này tự động tạo ra chuỗi hash có thêm salt (ngẫu nhiên thêm vào), nên cùng một mật khẩu "123456" nhưng mỗi lần chạy kết quả sẽ khác nhau.

→ Giúp chống lại tấn công dò mật khẩu (brute force) và rainbow table.
**PASSWORD_DEFAULT**
Đây là một hằng số trong PHP, chỉ định thuật toán hash mặc định mà PHP sử dụng tại thời điểm chạy.

Ở PHP hiện tại (8.x), PASSWORD_DEFAULT thường là bcrypt ($2y$...).

Trong tương lai, PHP có thể thay đổi PASSWORD_DEFAULT sang thuật toán mới hơn, mạnh hơn, nhưng code của bạn không cần sửa.

👉 Ví dụ:

echo password_hash("123456", PASSWORD_DEFAULT);


Có thể cho ra:

$2y$10$X9G5iN4I7BkeE2XK7V/69OC1d3bXnLmLVp0.NQ.0e9JfYl9YPziV6
✅ Tóm lại:

password_hash() = hàm mã hoá mật khẩu an toàn.

PASSWORD_DEFAULT = thuật toán mặc định (hiện là bcrypt, sau này có thể đổi).

Luôn nên dùng password_hash() để lưu mật khẩu vào DB, không lưu plain text.

**Firebase\JWT\JWT**: Đây là class chính dùng để thao tác với JSON Web Token (JWT).

Nó cung cấp các hàm tĩnh (static methods) để:

Tạo token (encode): biến một payload (mảng dữ liệu) thành chuỗi JWT.

Giải mã token (decode): đọc JWT để lấy lại payload ban đầu.

Xử lý các thuật toán ký (HS256, RS256, …).

**Firebase\JWT\Key**: Firebase\JWT\Key

Đây là class đại diện cho khóa bí mật và thuật toán khi decode JWT.

Từ phiên bản 6.x của thư viện, JWT::decode() không nhận trực tiếp chuỗi secret nữa mà phải truyền vào một đối tượng Key.

**======================= hàm password_verify() ===========================**
password_verify() là hàm tích hợp sẵn (built-in function) của PHP.

📌 Cú pháp
bool password_verify ( string $password , string $hash )


$password: mật khẩu người dùng nhập vào (chưa hash).

$hash: mật khẩu đã được hash trước đó (lưu trong database).

Kết quả trả về:

true nếu mật khẩu khớp với hash.

false nếu không khớp.





Nó không phải hàm tự định nghĩa, mà là hàm có sẵn trong PHP từ phiên bản 5.5 trở lên.

Thuộc thư viện xử lý mật khẩu của PHP (Password Hashing Functions).

⚡ Chức năng chính:

Dùng để kiểm tra mật khẩu người dùng nhập vào (chuỗi thuần văn bản) có khớp với chuỗi mật khẩu đã được băm (hash) trong database hay không.

$hashedPassword = password_hash("123456", PASSWORD_DEFAULT);

if (password_verify("123456", $hashedPassword)) {
    echo "Mật khẩu đúng!";
} else {
    echo "Sai mật khẩu!";
}

**$issuer_claim = "http://localhost";**: $issuer_claim = "http://localhost";

iss (issuer) — ai phát hành token.

Giá trị thường là domain hoặc identifier của server (ví dụ: https://api.example.com).

Mục đích: giúp phía nhận token biết token được phát bởi ai; nên kiểm tra khi verify.

**$audience_claim = "http://localhost"**
aud = Audience: người nhận token.

Cho biết token này được phát hành cho ai, ví dụ client hoặc một service khác.

Giúp hạn chế token bị dùng sai mục đích.


**$issuedat_claim = time()**: iat = Issued At: thời gian token được phát hành (timestamp UNIX).

Dùng để biết token này được tạo ra lúc nào.

**$notbefore_claim = $issuedat_claim**;
nbf = Not Before: token chỉ có hiệu lực sau thời điểm này.

Ở đây bằng với $issuedat_claim → tức là token có hiệu lực ngay lập tức.


**$expire_claim = $issuedat_claim + 3600**; // 1 giờ
exp = Expiration Time: thời điểm token hết hạn.

Ở đây = thời điểm phát hành + 3600 giây = 1 giờ.

Sau 1 giờ, token không hợp lệ nữa.


$payload = [
    "iss" => $issuer_claim,
    "aud" => $audience_claim,
    "iat" => $issuedat_claim,
    "nbf" => $notbefore_claim,
    "exp" => $expire_claim,
    "data" => [
        "id" => $user['id'],
        "username" => $user['username']
    ]
];
👉 Đây là payload của JWT, chứa toàn bộ thông tin cần thiết:

iss → ai phát hành

aud → người nhận

iat → lúc phát hành

nbf → có hiệu lực từ khi nào

exp → hết hạn lúc nào

data → dữ liệu người dùng (custom claim). Ở đây gồm:

id: ID người dùng

username: tên đăng nhập

Khi JWT được tạo, server sẽ:

Mã hóa (base64url) header (ví dụ {alg: HS256, typ: JWT})

Mã hóa (base64url) payload (ở trên)

Tạo chữ ký (signature) từ (header + payload) với $secret_key.

Kết quả token sẽ có dạng:

header.payload.signature

**apache_request_headers()**
+Đây là một hàm trong PHP, trả về tất cả HTTP request headers mà client (trình duyệt hoặc app) gửi lên server Apache.

Kết quả trả về là một mảng (array), trong đó key là tên header, value là giá trị header.

**HTTP Headers là gì?**
HTTP Headers là những cặp key–value đi kèm trong request (client → server) hoặc response (server → client).

Chúng nằm trước phần body của HTTP message.


**vendor/autoload.php**: Khi bạn cài Composer (composer install hoặc composer require ...), Composer sẽ sinh ra thư mục /vendor.

Trong đó có file autoload.php, nhiệm vụ là tự động nạp (autoload) tất cả class, function, file theo chuẩn PSR-4 / PSR-0 mà bạn khai báo trong composer.json.

**=============================Thứ tự khai báo tên=====================================**
<?php

declare(...) (nếu có)

namespace (chỉ được có một namespace cho cả file, phải đặt trước tiên)

use ... (dùng để import class/namespace khác, luôn đứng sau namespace)

Các đoạn code khác (require, include, định nghĩa class, function, biến toàn cục, …)

**từ khóa self**:
Trong PHP OOP, từ khóa self dùng để truy cập đến các thành phần tĩnh (static) của chính class đó (thuộc tính hoặc phương thức), chứ không phải instance.

So sánh nhanh:

self → dùng trong class để gọi thuộc tính/phương thức static.

$this → dùng trong object (instance) để gọi thuộc tính/phương thức thường.


**$handleGetData = $models->query("SELECT id, fullname, age FROM dataUsers");
📌 Trả về:

Một đối tượng PDOStatement nếu câu lệnh SQL thực thi thành công.

false nếu câu lệnh thất bại (ví dụ sai cú pháp SQL, bảng không tồn tại).

**Có 2 loại placeholder:**

Dấu ? → gọi là question mark placeholder (ẩn danh).

Dấu :tên → gọi là named placeholder (đặt tên).




**file_get_contents("php://input")**
file_get_contents() là một hàm trong PHP dùng để đọc toàn bộ nội dung từ một file vào một chuỗi.

"php://input" là một luồng (stream) đặc biệt trong PHP, dùng để đọc dữ liệu raw (thô) được gửi qua request body, thường là từ các phương thức như POST, PUT, DELETE mà không cần dùng đến $_POST.



**json_decode(...)**
Hàm json_decode() dùng để chuyển chuỗi JSON thành đối tượng hoặc mảng trong PHP.

json_decode() mặc định sẽ trả về một object (stdClass),


Mặc định, kết quả là một đối tượng PHP (kiểu stdClass). Nếu bạn muốn kết quả là mảng, thì truyền thêm đối số true.

**json_encode là gì?**
json_encode() là hàm trong PHP dùng để chuyển dữ liệu PHP (array hoặc object) thành chuỗi JSON.

🔧 Cú pháp:
php
Copy
Edit
json_encode($value, $options = 0, $depth = 512);
$value: Mảng hoặc đối tượng PHP mà bạn muốn chuyển sang JSON

Kết quả là một chuỗi JSON

++ Tại sao khi gửi dữ liệu qua <form> không cần chuyển sang JSON?
✅ Vì trình duyệt đã tự động định dạng dữ liệu theo kiểu application/x-www-form-urlencoded hoặc multipart/form-data, chứ không phải JSON.

khi dữ liệu gửi từ form đi có dạng 
Trình duyệt gửi dữ liệu theo dạng key=value, ví dụ:

fullname=Hung&age=2


=================================
lệnh file_exists

lệnh file_put_contents($filename, $data, $flags);

dùng để ghi dữ liệu vào file 
Tham số	Ý nghĩa
$filename: 	Tên file hoặc đường dẫn đến file cần ghi
$data:	Nội dung (chuỗi) cần ghi vào file
$flags (tùy chọn):	Tuỳ chọn ghi như thêm vào file (FILE_APPEND),khóa file (LOCK_EX), v.v.




✅ Giải thích từng hàm:
1. count($array)
Là một hàm PHP có sẵn.

Dùng để đếm số phần tử trong mảng.

Ví dụ:
$data = [1, 2, 3];
echo count($data); // Kết quả: 3

2. end($array)
Cũng là một hàm có sẵn trong PHP.

Dùng để di chuyển con trỏ nội bộ của mảng đến phần tử cuối cùng, rồi trả về phần tử đó.

Ví dụ:
$data = [1, 2, 3];
echo end($data); // Kết quả: 3




✅ **Cú pháp đầy đủ của array_filter:**
array_filter(array $array, ?callable $callback = null, int $mode = 0): array
$array: Mảng gốc cần lọc.

$callback: Hàm ẩn danh (anonymous function) hoặc tên hàm để kiểm tra từng phần tử. Nếu hàm trả về true, phần tử đó được giữ lại; nếu false, bị loại bỏ.

$mode: (tùy chọn) – chỉ định cách lọc theo key hoặc value.

Trong PHP, hàm ẩn danh (anonymous function) là hàm không có tên, thường được dùng làm đối số truyền vào các hàm như array_filter(), array_map(), v.v.

✅ Cú pháp của hàm ẩn danh trong PHP:
function ([tham_số]) use ([biến_bên_ngoài]) {
    // phần thân hàm
};
🔍 Giải thích các phần:
function (...): Định nghĩa một hàm ẩn danh.

use (...): Cho phép sử dụng các biến từ bên ngoài hàm (vì hàm ẩn danh không tự động truy cập được biến bên ngoài).

{ ... }: Phần nội dung (thân hàm).

return: Trả về giá trị (nếu có).



**Hàm array_values() trong PHP được dùng để lấy ra tất cả các giá trị của một mảng và đánh lại chỉ số (index) từ 0, 1, 2... – bỏ qua các key gốc nếu có.

🧠 Cú pháp:
array_values(array $array): array

=========================================

1. count($data)
Ý nghĩa: Đếm số phần tử trong mảng $data.

Cú pháp:


count($array, $mode = COUNT_NORMAL)
$array: Mảng cần đếm.

$mode: (tùy chọn) Nếu là COUNT_RECURSIVE, sẽ đếm cả các phần tử con trong mảng đa chiều.

Ví dụ:
$arr = [1, 2, 3];
echo count($arr); // Kết quả: 3





=================2. array_column($data, 'id')======================
Ý nghĩa: Lấy toàn bộ các giá trị của cột 'id' trong mảng $data.

Cú pháp:

array_column($array, $column_key, $index_key = null)
$array: Mảng nguồn (thường là mảng chứa nhiều mảng con).

**$column_key**: Tên khóa muốn lấy giá trị.

$index_key (tùy chọn): Nếu truyền vào, giá trị này sẽ được dùng làm key cho mảng mới.

Ví dụ:

$data = [
    ['id' => 2, 'name' => 'Hung'],
    ['id' => 5, 'name' => 'An']
];
print_r(array_column($data, 'id'));
// Kết quả: [2, 5]


==============================**3. max()**==========================
Ý nghĩa: Trả về giá trị lớn nhất trong một mảng hoặc danh sách số.

Cú pháp:

max($value1, $value2, ..., $valueN)
max(array $array)
Ví dụ:

$numbers = [2, 5, 1];
echo max($numbers); // Kết quả: 5

**từ khóa use trong hàm**

📌 Khi nào cần use trong PHP Closure?

Trong PHP, khi bạn viết một closure (hàm ẩn danh), các biến bên ngoài không tự động "chui" vào trong hàm.
Muốn dùng biến bên ngoài, bạn phải import nó vào trong closure bằng từ khóa use.

với arrow function thì k cần use

**array_filter trong PHP**

array_filter là hàm toàn cục không phải method của array  lọc mảng theo điều kiện callback. Nó sẽ duyệt qua từng phần tử của mảng và giữ lại những phần tử mà callback trả về true.

📖 Cú pháp
**array_filter(array $array, ?callable $callback = null, int $mode = 0): array**

Tham số

$array → mảng đầu vào cần lọc.

$callback (tùy chọn):

Một hàm (closure, function, arrow function) sẽ được gọi cho mỗi phần tử.

Nếu trả về true → phần tử được giữ lại.

Nếu bỏ trống (null) → mọi giá trị falsey (như false, null, 0, "", []) sẽ bị loại bỏ.

$mode (tùy chọn):

0 (mặc định): callback nhận giá trị.

ARRAY_FILTER_USE_KEY: callback nhận key.

ARRAY_FILTER_USE_BOTH: callback nhận cả key và value.

Giá trị trả về

Trả về mảng mới chỉ chứa những phần tử được giữ lại.

Lưu ý: key cũ được giữ nguyên (nếu muốn reset index thì dùng array_values() sau đó).

**2. Question mark placeholder (?)**

Là cách dùng dấu ? để giữ chỗ.

Khi bind phải truyền theo thứ tự vị trí (1, 2, 3, …).

🔹 **1. Named placeholder (dùng dấu :)**

Là cách đặt tên cho tham số, bắt đầu bằng dấu :.

Rất dễ đọc và dễ hiểu khi có nhiều biến.

**cú pháp**

<?= $variable ?>
là cú pháp viết tắt của:

<?php echo $variable; ?>


<?= ... ?> chỉ hoạt động cho echo thôi (không dùng cho print hay lệnh khác).

Đây gọi là short echo tag.

Nó được bật mặc định từ PHP 5.4 trở lên, nên hầu như lúc nào cũng dùng được.

👉 Tóm lại: <?= ... ?> = <?php echo ...; ?>


**$_FILES**: là một biến siêu toàn cục (superglobal) được PHP tạo ra khi có dữ liệu được gửi lên server thông qua form với enctype="multipart/form-data" và sử dụng method="POST ".

👉 Nói đơn giản: $_FILES chứa thông tin về file mà người dùng upload từ form.

**enctype="multipart/form-data"**:

là thuộc tính của thẻ <form> trong HTML. Nó cho trình duyệt biết cách mã hóa dữ liệu khi gửi form lên server.

**danh sách các giá trị enctype**

1. application/x-www-form-urlencoded(mặc đinh): 
Cách hoạt động: Toàn bộ dữ liệu form sẽ được mã hóa thành chuỗi query string theo dạng:

key1=value1&key2=value2&key3=value3

Các ký tự đặc biệt (dấu cách, dấu &, =) sẽ được mã hóa (URL encoded).
Ví dụ: "Hùng đẹp trai" → "H%C3%B9ng+%C4%91%E1%BA%B9p+trai".


Ứng dụng:

Dùng trong hầu hết form thông thường (login, đăng ký, gửi dữ liệu text, số…).

Không upload file được, vì file không thể biến thành chuỗi key=value.

**2. multipart/form-data**

Cách hoạt động: Dữ liệu được chia thành nhiều "phần" (part), mỗi phần có header riêng để mô tả loại dữ liệu (content-type, content-disposition…).

Khi upload file, phần dữ liệu file sẽ được gửi nguyên bản (binary), không encode thành chuỗi.

Ứng dụng:

Bắt buộc khi form có file (<input type="file">).

Có thể dùng để gửi text + file cùng lúc.

**3. text/plain**

Cách hoạt động: Gửi dữ liệu form dưới dạng text thô, không encode ký tự đặc biệt.
Ví dụ:

name=Hùng đẹp trai
age=21


Ứng dụng:

Rất ít dùng trong thực tế.

Chủ yếu để debug hoặc test nhanh.




👉 **fileInput.files là một thuộc tính (property) của thẻ <input type="file">**.

**📌 Cấu trúc $_FILES**

$_FILES['input_name'] = [
    'name' => 'ten_file_goc.jpg',   // tên file gốc trên máy người dùng
    'type' => 'image/jpeg',         // MIME type của file (image/png, image/jpeg, ...)
    'tmp_name' => '/tmp/xyz123',    // đường dẫn file tạm trên server
    'error' => 0,                   // mã lỗi (0 = OK)
    'size' => 12345                 // kích thước file (byte)
];

📌 Các thuộc tính chính của $_FILES['input_name']
Thuộc tính	Ý nghĩa
name	Tên gốc của file do người dùng upload
type	MIME type do trình duyệt gửi (không đáng tin 100% ⇒ nên dùng mime_content_type()    để kiểm tra lại)
tmp_name	        Đường dẫn file tạm trên server (file này sẽ biến mất nếu không move sang chỗ khác)
error	Mã lỗi upload (dùng hằng số UPLOAD_ERR_*)
size	Kích thước file tính bằng byte


📌 Kiểu dữ liệu

files là một FileList object.

Nó hoạt động gần giống như một mảng, chứa danh sách các file mà người dùng đã chọn.

Mỗi phần tử trong files là một đối tượng File.

const file = fileInput.files[0];
fileInput là thẻ <input type="file">.

fileInput.files là một FileList, đại diện cho danh sách các tệp (file) mà người dùng đã chọn.

Nó không chứa đường dẫn đầy đủ trên máy tính (vì trình duyệt không cho phép lấy path tuyệt đối vì lý do bảo mật).

Mỗi phần tử trong FileList là một đối tượng File, chứa:

name: tên tệp

size: dung lượng

type: loại MIME (ví dụ "image/png")

lastModified: thời gian chỉnh sửa cuối cùng

fileInput.files[0] nghĩa là lấy tệp đầu tiên trong danh sách các tệp đã chọn.

Ví dụ nếu người dùng chọn 3 ảnh:

**$_FILES['avatar']['error']**
Trong PHP, khi dùng $_FILES['avatar']['error'], giá trị này chỉ định trạng thái upload của file. Nếu bằng 0, tức là file upload thành công. Các giá trị khác tương ứng với các lỗi khác nhau. Dưới đây là tổng hợp các mã lỗi thường gặp:

**formData**: 👉 Ở đây formData là một đối tượng (instance) của lớp FormData trong JavaScript.

Giải thích:

FormData là một Web API giúp bạn tạo ra một tập hợp key–value (giống như một form HTML) để gửi dữ liệu (đặc biệt là file) qua AJAX / fetch API đến server.

Nó thường dùng để upload file hoặc gửi dữ liệu form mà không cần reload trang.

Đặc điểm:

formData không cần khai báo trước các trường như trong <form>.

Có thể append nhiều giá trị (text, số, file).

Server sẽ nhận dữ liệu này giống như khi bạn gửi form HTML truyền thống (qua $_POST và $_FILES trong PHP)

**hàm is_dir($uploadDir)**

Đây là hàm có sẵn trong PHP.

Nó kiểm tra xem đường dẫn $uploadDir có tồn tại và có phải là một thư mục (directory) hay không.

Trả về:

true nếu là thư mục.

false nếu không tồn tại hoặc không phải thư mục.

**var_dump**: var_dump trong PHP không phải cú pháp đặc biệt, mà là một hàm có sẵn (built-in function) dùng để xuất thông tin chi tiết về biến.

cú pháp : var_dump($variable);

📌 Chức năng

Hiển thị kiểu dữ liệu (string, int, array, object, …).

Hiển thị giá trị của biến.

Với mảng hoặc đối tượng, nó sẽ hiển thị toàn bộ cấu trúc bên trong.

**📌 Cú pháp mkdir**

mkdir(path, mode, recursive, context);
path (bắt buộc) → Đường dẫn đến thư mục muốn tạo.

mode (tùy chọn, mặc định 0777) → Quyền truy cập cho thư mục (Unix/Linux).

0777 = quyền đọc (r), ghi (w), thực thi (x) cho tất cả (owner, group, others).

recursive (tùy chọn, mặc định false) → Nếu true, PHP sẽ tạo cả thư mục cha nếu chưa tồn tại.

context (ít dùng) → Ngữ cảnh dòng lệnh (chủ yếu liên quan đến stream, network).
**Cú pháp phân tích đường dẫn của file bằng hàm pathinfo**

📌 Cú pháp tổng quát

**pathinfo(string $path, int $flags = PATHINFO_ALL): array|string**

$path → đường dẫn hoặc tên file cần phân tích.

$flags (tuỳ chọn) → cho biết muốn lấy phần nào của đường dẫn.



$path → đường dẫn hoặc tên file cần phân tích.

$flags (tuỳ chọn) → cho biết muốn lấy phần nào của đường dẫn.

📌 Cách hoạt động

Nếu không truyền $flags → pathinfo trả về một mảng với các phần:

dirname → thư mục chứa file.

basename → tên file + phần mở rộng.

extension → phần mở rộng (đuôi file).

filename → tên file (không có đuôi).

Nếu có truyền $flags → trả về chuỗi tương ứng (ví dụ chỉ lấy PATHINFO_EXTENSION).


**📌 Các hằng số dùng trong pathinfo()**
Hằng số	Ý nghĩa	Ví dụ với uploads/avatar.png

PATHINFO_DIRNAME	Trả về thư mục chứa file	uploads

PATHINFO_BASENAME	Trả về tên file + phần mở rộng	avatar.png

PATHINFO_EXTENSION	Trả về đuôi mở rộng (extension)	png

ví dụ : → Trả về tên file kèm cả phần mở rộng.

pathinfo("uploads/avatar.png", PATHINFO_BASENAME);
// Kết quả: avatar.png

PATHINFO_FILENAME	Trả về tên file không có đuôi	avatar

**Hàm uniqid()**: trong PHP là hàm dựng sẵn dùng để tạo ra một chuỗi ID duy nhất dựa trên thời gian hiện tại (microtime).


string uniqid(string $prefix = "", bool $more_entropy = false)

Tham số

$prefix (tuỳ chọn): Thêm tiền tố cho chuỗi ID.

$more_entropy (tuỳ chọn, mặc định = false): Nếu true, sẽ thêm các ký tự ngẫu nhiên để ID khó trùng hơn.

Ví dụ
echo uniqid();          
// Kết quả: 64f80c1c8f7a2   (dựa trên microtime)

echo uniqid("user_");   
// Kết quả: user_64f80c1c8f7a5

echo uniqid("", true);  
// Kết quả: 64f80c1c8f7a567.12345678  (có thêm độ nhiễu, gần như không trùng)

**move_uploaded_file**: là hàm (function) của PHP dùng để di chuyển file đã được upload tạm thời lên vị trí mong muốn trên server.

cú pháp: bool move_uploaded_file ( string $filename , string $destination )

$filename: đường dẫn tạm thời của file trên server (thường là $_FILES['input_name']['tmp_name']).

$destination: đường dẫn mới bạn muốn lưu file, kèm tên file.

Trả về true nếu di chuyển thành công, false nếu thất bại.

ví dụ 
$uploadDir = "uploads/";
$tmpName = $_FILES['avatar']['tmp_name']; // file tạm
$fileName = $_FILES['avatar']['name'];   // tên file gốc

if (move_uploaded_file($tmpName, $uploadDir . $fileName)) {
    echo "Upload thành công!";
} else {
    echo "Upload thất bại!";
}
===========================dùng với PDO===================================
**rowCount()**: là phương thức của PDO dùng để đếm số dòng dữ liệu 
**1️⃣ fetch()**: Chức năng: Lấy một bản ghi (row) duy nhất từ kết quả truy vấn.

Trả về: Mảng (associative, numeric, hoặc object) tùy tùy chọn.

Thường dùng trong vòng lặp để duyệt từng dòng.

$stmt = $pdo->query("SELECT id, name FROM users");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
}
Mỗi lần gọi fetch() sẽ lấy 1 dòng tiếp theo trong tập kết quả.

Khi hết dữ liệu, fetch() trả về false → vòng lặp dừng.

**fetchAll()** ;Chức năng: Lấy tất cả các bản ghi trong kết quả truy vấn cùng lúc.

Trả về: Một mảng nhiều chiều, mỗi phần tử là một dòng dữ liệu.

**Thường dùng nếu bạn muốn lấy toàn bộ dữ liệu một lần mà không cần vòng lặp while**

Một số chế độ khác của fetch():
Chế độ	Kết quả
PDO::FETCH_ASSOC	Mảng kết hợp (key là tên cột)
PDO::FETCH_NUM	Mảng số (key là số thứ tự cột: 0,1,2…)
PDO::FETCH_BOTH	Kết hợp cả 2 loại trên
PDO::FETCH_OBJ	Trả về object với thuộc tính là tên cột






**set_charset("utf8mb4"); là một hàm trong PHP dùng với MySQLi để thiết lập bộ ký tự (charset) cho kết nối cơ sở dữ liệu**

Nguyên nhân: PHP và MySQL không dùng cùng charset, MySQL mặc định không hỗ trợ ký tự 4 byte.


charset là viết tắt của character set, tức là bộ ký tự.

Nó xác định cách máy tính lưu trữ và mã hóa các ký tự (letters, numbers, dấu câu, emoji, ký tự đặc biệt…) trong cơ sở dữ liệu hoặc trong văn bản.

Khi bạn gõ chữ “Hùng 😀” trên máy tính, mỗi ký tự được biểu diễn bằng số nhị phân (byte).

charset quyết định cách các byte đó được hiểu là ký tự gì.

Nếu charset không đúng, các ký tự có thể hiển thị thành ký tự lạ hoặc ???.



file_get_contents('php://input')

'php://input' là một “file ảo” đặc biệt trong PHP, đại diện cho toàn bộ nội dung của HTTP request body.

Khi bạn gửi dữ liệu POST/PUT dưới dạng JSON từ frontend (React, JS, Postman…), bạn không thể lấy bằng $_POST vì $_POST chỉ nhận form-data hoặc x-www-form-urlencoded.

file_get_contents('php://input') sẽ đọc nguyên toàn bộ dữ liệu JSON mà client gửi lên.



UPDATE ten_bang
SET ten_cot1 = gia_tri1, ten_cot2 = gia_tri2, ...
WHERE dieu_kien;


DESCRIBE dataUsers; (lệnh dùng để kiểm tra kiểu dữ liệu);
 


 **1. new XMLHttpRequest()**

Chức năng: Tạo một đối tượng XMLHttpRequest mới, dùng để gửi và nhận dữ liệu từ server mà không tải lại trang (AJAX).

Kết quả: xhr là đối tượng quản lý yêu cầu HTTP.

**2. xhr.open(method, url, async)**

Phương thức: open()

Tham số:

method: "POST" → phương thức HTTP (còn có "GET", "PUT", "DELETE"...)

url: "search.php" → địa chỉ server để gửi yêu cầu

async: true → thực hiện bất đồng bộ (không làm treo trang)

Chức năng: Chuẩn bị yêu cầu HTTP trước khi gửi.

**3. xhr.setRequestHeader(header, value)**

Phương thức: setRequestHeader()

Chức năng: Thiết lập header cho request.

Trong ví dụ: "Content-Type": "application/x-www-form-urlencoded" → server biết dữ liệu gửi lên là dạng form (key=value&key2=value2).

**4. xhr.onload**

Thuộc tính: onload là hàm callback

Chức năng: Xử lý khi server trả về dữ liệu thành công.

Trong ví dụ:

document.getElementById("result").innerHTML = this.responseText;


→ Hiển thị kết quả trả về từ server (this.responseText) vào thẻ có id result.

**5. xhr.send(data)**

Phương thức: send()

Chức năng: Gửi yêu cầu đã chuẩn bị tới server.

Trong ví dụ:

xhr.send("keyword=" + keyword);


→ Gửi dữ liệu keyword (giá trị từ input) lên server search.php.

+ ⚠️ Dấu cách " " và các ký tự đặc biệt (như &, =, ?, #, %, tiếng Việt có dấu, ký tự UTF-8…) có thể làm hỏng chuỗi POST vì chúng được coi là ký tự điều khiển trong URL/HTTP.

**TỔNG HỢP CÁCH SẮP XẾP TRONG PHP**
1. Dùng array_multisort()
$ages = array_column($listData, 'age');
array_multisort($ages, SORT_ASC, $listData);
2. Sắp xếp trực tiếp từ SQL
3. Dùng uasort() (nếu muốn giữ key gốc)
4. Dùng array_map + array_multisort (cách viết gọn)
5. Dùng usort() với strnatcmp nếu cần sắp xếp tự nhiên (natural order)

Ít dữ liệu → usort() hoặc array_multisort() đều được.

Nhiều dữ liệu → tốt nhất sort ngay trong SQL (ORDER BY).

Muốn giữ index gốc → uasort().

Muốn sắp xếp nhiều cột cùng lúc → array_multisort().

x





**set_charset("utf8mb4"); là một hàm trong PHP dùng với MySQLi để thiết lập bộ ký tự (charset) cho kết nối cơ sở dữ liệu**

Nguyên nhân: PHP và MySQL không dùng cùng charset, MySQL mặc định không hỗ trợ ký tự 4 byte.


charset là viết tắt của character set, tức là bộ ký tự.

Nó xác định cách máy tính lưu trữ và mã hóa các ký tự (letters, numbers, dấu câu, emoji, ký tự đặc biệt…) trong cơ sở dữ liệu hoặc trong văn bản.

Khi bạn gõ chữ “Hùng 😀” trên máy tính, mỗi ký tự được biểu diễn bằng số nhị phân (byte).

charset quyết định cách các byte đó được hiểu là ký tự gì.

Nếu charset không đúng, các ký tự có thể hiển thị thành ký tự lạ hoặc ???.



**file_get_contents('php://input')**

'php://input' là một “file ảo” đặc biệt trong PHP, đại diện cho toàn bộ nội dung của HTTP request body.

Khi bạn gửi dữ liệu POST/PUT dưới dạng JSON từ frontend (React, JS, Postman…), bạn không thể lấy bằng $_POST vì $_POST chỉ nhận form-data hoặc x-www-form-urlencoded.

file_get_contents('php://input') sẽ đọc nguyên toàn bộ dữ liệu JSON mà client gửi lên.



UPDATE ten_bang
SET ten_cot1 = gia_tri1, ten_cot2 = gia_tri2, ...
WHERE dieu_kien;


DESCRIBE dataUsers; (lệnh dùng để kiểm tra kiểu dữ liệu);
 


 **1. new XMLHttpRequest()**

Chức năng: Tạo một đối tượng XMLHttpRequest mới, dùng để gửi và nhận dữ liệu từ server mà không tải lại trang (AJAX).

Kết quả: xhr là đối tượng quản lý yêu cầu HTTP.

**2. xhr.open(method, url, async)**

Phương thức: open()

Tham số:

method: "POST" → phương thức HTTP (còn có "GET", "PUT", "DELETE"...)

url: "search.php" → địa chỉ server để gửi yêu cầu

async: true → thực hiện bất đồng bộ (không làm treo trang)

Chức năng: Chuẩn bị yêu cầu HTTP trước khi gửi.

3. xhr.setRequestHeader(header, value)

Phương thức: setRequestHeader()

Chức năng: Thiết lập header cho request.

Trong ví dụ: "Content-Type": "application/x-www-form-urlencoded" → server biết dữ liệu gửi lên là dạng form (key=value&key2=value2).

4. xhr.onload

Thuộc tính: onload là hàm callback

Chức năng: Xử lý khi server trả về dữ liệu thành công.

Trong ví dụ:

document.getElementById("result").innerHTML = this.responseText;


→ Hiển thị kết quả trả về từ server (this.responseText) vào thẻ có id result.

5. xhr.send(data)

Phương thức: send()

Chức năng: Gửi yêu cầu đã chuẩn bị tới server.

Trong ví dụ:

xhr.send("keyword=" + keyword);


→ Gửi dữ liệu keyword (giá trị từ input) lên server search.php.

+ ⚠️ Dấu cách " " và các ký tự đặc biệt (như &, =, ?, #, %, tiếng Việt có dấu, ký tự UTF-8…) có thể làm hỏng chuỗi POST vì chúng được coi là ký tự điều khiển trong URL/HTTP.

**TỔNG HỢP CÁCH SẮP XẾP TRONG PHP**
1. Dùng array_multisort()
$ages = array_column($listData, 'age');
array_multisort($ages, SORT_ASC, $listData);
2. Sắp xếp trực tiếp từ SQL
3. Dùng uasort() (nếu muốn giữ key gốc)
4. Dùng array_map + array_multisort (cách viết gọn)
5. Dùng usort() với strnatcmp nếu cần sắp xếp tự nhiên (natural order)

Ít dữ liệu → usort() hoặc array_multisort() đều được.

Nhiều dữ liệu → tốt nhất sort ngay trong SQL (ORDER BY).

Muốn giữ index gốc → uasort().

Muốn sắp xếp nhiều cột cùng lúc → array_multisort().

**cách sắp xếp mảng theo một khóa cụ thể trong PHP**
1️⃣ usort()

Hàm usort() sắp xếp mảng chỉ số (indexed array) dựa vào hàm so sánh do bạn định nghĩa.

Cú pháp:

usort(array &$array, callable $callback)


$callback($a, $b) phải trả về:

< 0 nếu $a đứng trước $b

0 nếu bằng nhau

> 0 nếu $a đứng sau $b

2️⃣ **Toán tử Spaceship <=>**

$a['age'] <=> $b['age'] là toán tử “spaceship” trong PHP 7+:

Trả về -1, 0, 1 tương ứng nếu:

$a['age'] < $b['age'] → -1

$a['age'] == $b['age'] → 0

$a['age'] > $b['age'] → 1

Đây là cách ngắn gọn để viết hàm so sánh mà không cần dùng if-else.

3️⃣ Hiệu quả đoạn code

$listData là mảng các mảng kết hợp (mỗi phần tử có key 'age').

Sau usort(), mảng được sắp xếp tăng dần theo tuổi (age).

Nếu muốn giảm dần, chỉ cần đổi chỗ $a và $b:

return $b['age'] <=> $a['age'];


✅ Tóm tắt:

Đây là sắp xếp mảng theo giá trị một trường (key) trong mảng kết hợp)

Dùng usort + toán tử <=> để sắp xếp tăng/giảm một cách gọn gàng.

Nếu bạn muốn, mình có thể viết ví dụ trực quan trước và sau khi sắp xếp để dễ hình dung hơn. Bạn có muốn mình làm không?





🔹 Rút ra bài học / lưu ý

Không load cùng một file JS nhiều lần trong cùng một trang HTML

Một file JS chỉ nên <script src="..."></script> một lần cuối <body> hoặc trong layout.

Viết JS “an toàn” khi dùng chung cho nhiều page

Luôn check element tồn tại trước khi gán event:

const btnAdd = document.getElementById("btnAdd");
if (btnAdd) {
    btnAdd.addEventListener("click", () => { ... });
}


Nếu dùng layout / template

Chỉ include <script> ở cuối layout, không include trong từng file con.

Biết phân biệt giữa “tách file HTML” và “gộp file PHP”

require PHP là gộp nội dung, không phải load file HTML riêng biệt → các script, style có thể bị chạy nhiều lần nếu copy trong nhiều file.


**Rewrite URL (hay URL Rewriting) là một kỹ thuật trong lập trình web, thuộc mảng Web Server & Routing. Nó giúp biến những đường dẫn URL khó hiểu, dài dòng thành đường dẫn đẹp, ngắn gọn, dễ nhớ và thân thiện SEO**