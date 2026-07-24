
**1️⃣ Cấu trúc ví dụ:**
student-management/
├─ public/            ← DocumentRoot (server chỉ phục vụ thư mục này)
│   ├─ index.php
│   ├─ js/
│   │   └─ script.js
│   └─ css/
├─ src/
│   ├─ Controllers/
│   │    └─ UserController.php
│   ├─ Models/
│   │    └─ User.php
│   └─ Database.php

public/ là nơi tất cả file client có thể truy cập: HTML, JS, CSS, hình ảnh.

src/ chứa code PHP nội bộ, không trực tiếp truy cập từ trình duyệt.

**Nguyên tắc khi dùng fetch()**

Đường dẫn trong fetch luôn là URL từ DocumentRoot chứ không phải đường dẫn file hệ thống.

Ví dụ, từ public/js/script.js muốn gọi index.php:

fetch("/index.php?action=addUser")


/index.php → từ root của server (public/)

Không dùng ../ trong fetch để ra ngoài public/, vì server không phục vụ file ngoài DocumentRoot:

// ❌ Sai
fetch("../src/Controllers/UserController.php")


./ nghĩa là thư mục hiện tại (so với URL), / nghĩa là root của web server.

**3️⃣ Kiến thức quan trọng**
1. DocumentRoot (public/):

Chỉ các file trong thư mục này được trình duyệt truy cập trực tiếp.

File PHP bên ngoài (src/) phải gọi thông qua file trong public (router).

2. Router pattern:

Bạn có thể dùng index.php?action=... để gọi controller.

fetch("/index.php?action=addUser") → index.php sẽ load UserController và gọi phương thức thêm user.

3.  Phân biệt đường dẫn:

../ → file system (tương đối trên ổ cứng)

/ → URL root (trên web server)

./ → URL hiện tại

4. Security:

Không expose thư mục src/ ra web, để tránh hacker truy cập trực tiếp code PHP.

Tất cả AJAX / fetch nên đi qua public/index.php hoặc một API endpoint.

php -S localhost:8000 -t public
thì -t chính là option (tham số) của PHP built-in server, nó viết tắt từ document root.

👉 Ý nghĩa:

**-t <dir>**: Chỉ định thư mục nào sẽ được dùng làm document root cho web server.

Nếu không có -t, mặc định PHP sẽ lấy thư mục hiện tại (pwd) làm document root.

Ví dụ: