const chk = document.querySelector('.chk');
const saleValue = document.querySelector('.saleValue');
chk.onchange = function () {
    if (chk.checked) {
        saleValue.style.display = 'block';
    } else {
        saleValue.style.display = 'none';
    }
}

$('.dell').on('click', function () {
    $(this).closest('.container1').hide();
    $(this).closest('.container1').next('.container2').show();
});

$('.cancelll').on('click', function () {
    $(this).closest('.container3').hide();
    $(this).closest('.container3').prev().prev('.container1').show();
    $(this).closest('.container2').hide();
    $(this).closest('.container2').prev('.container1').show();
});
$(document).ready(function () {
    $('.changeee').click(function () {
        $(this).closest('.container1').hide();
        $(this).closest('.container1').next().next('.container3').show();
        let cName = $(".for_change_name");
        let cPrice = $(".for_change_price");
        let cSale = $(".for_change_sale");
        let cType = $(".for_change_type");
        let cMeasure = $(".for_change_measure");
        let cPhoto = $(".for_change_image");

        let text = $(this).text();

        if (text === "Change Name") {
            cName.css("display", "block");
            cPrice.css("display", "none");
            cSale.css("display", "none");
            cType.css("display", "none");
            cMeasure.css("display", "none");
            cPhoto.css("display", "none");
            console.log("Button Change Name was clicked");
        } else if (text === "Change Sale") {
            cName.css("display", "none");
            cPrice.css("display", "none");
            cSale.css("display", "block");
            cType.css("display", "none");
            cMeasure.css("display", "none");
            cPhoto.css("display", "none");
            console.log("Button Change Sale was clicked");
        } else if (text === "Change Type") {
            cName.css("display", "none");
            cPrice.css("display", "none");
            cSale.css("display", "none");
            cType.css("display", "block");
            cMeasure.css("display", "none");
            cPhoto.css("display", "none");
            console.log("Button Change Type was clicked");
        } else if (text === "Change Measure") {
            cName.css("display", "none");
            cPrice.css("display", "none");
            cSale.css("display", "none");
            cType.css("display", "none");
            cMeasure.css("display", "block");
            cPhoto.css("display", "none");
            console.log("Button Change Measure was clicked");
        } else if (text === "Change Photo") {
            cName.css("display", "none");
            cPrice.css("display", "none");
            cSale.css("display", "none");
            cType.css("display", "none");
            cMeasure.css("display", "none");
            cPhoto.css("display", "block");
            console.log("Button Change Photo was clicked");
        } else if (text === "Change Price") {
            cPrice.css("display", "block");
            cName.css("display", "none");
            cSale.css("display", "none");
            cType.css("display", "none");
            cMeasure.css("display", "none");
            cPhoto.css("display", "none");
            console.log("Button Change Price Was clicked");
        } else {
            console.log("Unknown button was clicked");
        }
        let submit = $('<input>').attr({
            type: 'submit',
            name: 'submit',
            value: 'change'
        });
    });
});