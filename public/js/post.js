
const btnShowUser = document.getElementById("btn-filter");

const box_list_user = document.getElementById("box-list-user");



const search = document.getElementById("search");
let arrayData = [];
btnShowUser.addEventListener('click', () => {
    const short = document.querySelector("#select").value;
    const select = document.getElementById("select").value;
    // const girl = document.getElementById("girl").value;
    // const boy = document.getElementById("boy").value;
    // const girlBoy = document.getElementById('girl-boy').value;

    const sex = document.getElementById("sex").value;
  

 
    fetch('/index.php?action=getUser', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            select: select,
            sex: sex
            
        })
    })
         .then(res => {
            return res.json();
           
    })
    .then(data => {
  
            box_list_user.innerHTML = "";
            
            data.forEach(element => {
                    arrayData.push(element);
                    const fullName = document.createElement('h3');
                    fullName.textContent = element.fullname;
                    fullName.className = "fullName";
                    const age = document.createElement('h3');
                    age.textContent = element.age;

                    const sex = document.createElement("h3");
                    sex.textContent = element.sex;
                    const img = document.createElement('img');
                    img.src = element.link_img;
                    box_list_user.append(fullName, age, sex, img);
            });
            
        
            
    })
    .catch(error => {
        console.log("Lỗi khi lấy dữ liệu " + error);
    })
})



const btnAdd = document.getElementById("btnAdd");

btnAdd.addEventListener('click',() => {
    const fileImage = document.getElementById("fileImage");
    const age = document.getElementById("age").value;
    const sex = document.querySelector('input[name="sex"]:checked')?.value;

    const fullname = document.getElementById("fullname").value;
    const preview = document.getElementById("preview");
// thưc hiện lấy danh sách các file ảnh 
    const getImg = fileImage.files[0];

  // thực hiện tạo đối tượng để gửi dữ liệu như thẻ form 
    const formData = new FormData();
    formData.append('fullname', fullname);
    formData.append('age', age);
    formData.append('img', getImg);
    formData.append('sex', sex);

    
    fetch("/index.php?action=addUsers", {
        method: "POST",
        body: formData
    })
    .then(res => {
        if(res.status === 200){
            alert("Add users successful");
        }
        return res.text();
    })
    .then(data => {
            console.log("add users successful", data);
    })
    .catch(error => {
        console.log("Error while add users "+ error);
    })
    
    
})

const handleDel = (id) => {
        fetch('/index.php?action=deleteUser',{
            method: "DELETE",
            headers: {
                'Content-Type':'application/json'
            },
            body: JSON.stringify({
                'id': id
            })
        })
        .then(res => {
            if(res.status === 200){
                alert("Xóa dữ liệu thành công ");
            }
        })
        .catch(error => {
            console.log("xóa dữ liệu thất bại ", error);
        })
        
}

const handleUpdate = (data) => {
    const fullName = prompt("Nhập vào tên mới ");
    const age = prompt("Nhập vào tuổi ");

    fetch("/index.php?action=updateUser", {
        method: "PUT",
        headers: {
            "Content-Type":"application/json"
        },
        body: JSON.stringify({
            'id': data.id,
            'fullname': fullName,
            'age': age
        })
    })
    .then(res => {
        if(res.status === 200){

            alert("Cập nhật dữ liệu thành công ")
        }
        return res.json();
    })
    .then(data => {
        console.log("dữ liệu sau khi cập nhật là ", data);

    })
    
}