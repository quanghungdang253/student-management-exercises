:checked trong CSS selector là gì?

:checked là một pseudo-class trong CSS (và querySelector cũng hiểu được).

Nó chọn những form control đang được chọn, ví dụ:

<input type="checkbox"> mà đang tick ✅

<input type="radio"> mà đang chọn 🔘

<option> trong <select> mà đang được chọn

<input type="radio" name="sex" value="Nam">
<input type="radio" name="sex" value="Nữ">


const selected = document.querySelector('input[name="sex"]:checked');
console.log(selected?.value);



👉 Kết quả:

Nếu chọn Nam → in ra "Nam".

Nếu chọn Nữ → in ra "Nữ".

Nếu chưa chọn gì → null