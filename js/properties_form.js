
// pick màu
var colorPicker = document.getElementById("colorPicker");

colorPicker.addEventListener("input",function () {
    var colorCode = document.getElementById("selectedColor");
    var mauDaChon = colorPicker.value;
    colorCode.textContent = mauDaChon;
    colorCode.style.color = mauDaChon;
});


// tại form thêm 1 bolt
var quantity = 0;
var addBolt = document.getElementById("addBolt");
addBolt.addEventListener("click", function () {
    // console.log('hi');
    // Tạo một thẻ div mới
    const newForm = document.createElement('div');
    newForm.className = 'add_bolt';
   
    newForm.innerHTML = '<span>'+(quantity+1)+'.</span>     <img src="../image/bolt-removebg-preview.png" alt="" class="bolt-icon">     <input type="text" placeholder="length" id="lengthOfBolt" style="width:52px;">      <span>m</span>';

    // Thêm form mới vào container
    document.getElementById("formAddBolt").appendChild(newForm);


    quantity++;
    var totalBolt = document.getElementById("quantity");
    totalBolt.textContent = "Quantity: " + quantity;
});


// xóa 1 form thêm bolt
var delBolt = document.getElementById("delBolt");

delBolt.addEventListener("click", function () {
    var boltForm = document.querySelectorAll('.add_bolt');

    if (boltForm.length > 0) {
        const lastestForm = boltForm[boltForm.length-1];
        lastestForm.remove();
        quantity--;
        var totalBolt = document.getElementById("quantity");
        totalBolt.textContent = "Quantity: " + quantity;
    }
});