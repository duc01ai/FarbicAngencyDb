const statusSelect = document.getElementById('selectSupplier');

statusSelect.addEventListener("change", function () {
    var status =  statusSelect.value;
    var reasonInput = document.getElementById('reasonid');
    // console.log(status);
    if (status == 'cancelled') {
        reasonInput.removeAttribute("disabled");
    } else {
        reasonInput.setAttribute("disabled",true);
    }

});