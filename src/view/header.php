<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">'
    <!-- <link rel="stylesheet" href="/styles/header.css"> -->
 
</head>
<body>
    <div class="main-header">
        <div class="main-header__one"> 
        <div class="box main-header__img">
            <img src="https://png.pngtree.com/png-clipart/20190924/original/pngtree-user-management-icon-trendy-style-isolated-background-png-image_4834547.jpg" alt="" 
            
            
            >
        </div>
        <div class="box main-header__title">
            <h2> Quản lý người dùng </h2>
        </div>
         </div>
              <div class="main-header__two"> 
        <div class="box main-header__nav">
             <select name="select" id="select">
                <option value="short"> Thấp đến cao </option>
                <option value="tall"> Cao đến thấp </option>
                <option value="default"> Mặc định</option>
             </select>
             <select name="sex" id="sex">
                <option value="Nam"> Danh sách Nam </option>
                <option value="Nữ"> Danh sách Nữ </option>
                <option value="girlBoy"> Danh sách cả Nam và Nữ </option>
             
             </select>

             <button id="btn-filter"> Lọc và hiển thị  </button>
        </div>
        <div class="box main-header__search">
                <input type="text" placeholder="Nhập vào tên người dùng muốn tìm kiếm">
                <button id="search"> Tìm kiếm </button>
        </div>
          </div>
    </div>
  <?php require __DIR__ . "/index.php"; ?>
   <?php require __DIR__ . "/list-user.php"; ?>
<script src="/js/post.js"></script>

</body>
</html>