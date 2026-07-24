<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet"  href="/styles/index.css">  -->
    <title>Document</title>
</head>
<body>
        <div>
                
            <div class="main-input"> 
                <div> 
                        <h3> HỆ THỐNG QUẢN LÝ NGƯỜI DÙNG </h3>
                </div>
                   <input type="text" placeholder="Nhập vào tên " id="fullname">
                   <input type="text" placeholder="Nhập tuổi" id="age">
                   <h3> Chọn giới tính </h3>
                 <div>
                   <label for=""> Nam </label>
                   <input 
                        type="radio" 
                        id="boy" 
                        name="sex"
                        value="Nam"
                        class="sex"
                   >
                      </div>

                      <div>
                            <label for=""> Nữ </label>
                            <input 
                            type="radio" 
                            id="girl" 
                            name="sex"
                            value="Nữ"
                            class="sex"
                            >
                      </div>
                       <div>
                            <label for=""> Cả Nam và Nữ </label>
                            <input 
                            type="radio" 
                            id="girl-boy" 
                            name="sex"
                            value="girl-boy"
                            class="sex"
                            >
                      </div>
           
                   <div>  
                         <h3 for=""> Vui lòng chọn một ảnh </h3>  
                         <input type="file" name="image" id="fileImage">
                    </div>
                           <button id="btnAdd"> Thêm người dùng </button>

                           <div id="box-list-user">  </div>

             </div>
    

        
        </div>

     
</body>
</html>