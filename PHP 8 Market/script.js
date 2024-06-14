
weight = 0;

$('.kgp').on('click', function () {
    weight = +$(this).parent().parent().parent().find('.display').val();
    let price = +$(this).parent().parent().parent().parent().parent().find('.ginn').text();
    $(this).parent().parent().parent().find('.display').val((weight += 1).toFixed(1));
    $(this).parent().parent().parent().parent().parent().find('.finish_price').text((weight * price).toFixed(1) );
})
$('.grp').on('click', function () {
    weight = +$(this).parent().parent().parent().find('.display').val();
    let price = +$(this).parent().parent().parent().parent().parent().find('.ginn').text();
    $(this).parent().parent().parent().find('.display').val((weight += 0.1).toFixed(1));
    $(this).parent().parent().parent().parent().parent().find('.finish_price').text((weight * price).toFixed(1) );
})
$('.kgm').on('click', function () {
    weight = +$(this).parent().parent().parent().find('.display').val();
    let price = +$(this).parent().parent().parent().parent().parent().find('.ginn').text();
    if (weight >= 1) {
        $(this).parent().parent().parent().find('.display').val((weight -= 1).toFixed(1));
        $(this).parent().parent().parent().parent().parent().find('.finish_price').text((weight * price).toFixed(1) );
    }
})
$('.grm').on('click', function () {
    weight = +$(this).parent().parent().parent().find('.display').val();
    let price = +$(this).parent().parent().parent().parent().parent().find('.ginn').text();
    if (weight >= 0.1) {
        $(this).parent().parent().parent().find('.display').val((weight -= 0.1).toFixed(1));
        $(this).parent().parent().parent().parent().parent().find('.finish_price').text((weight * price).toFixed(1) );
    }
})
 
// let deleteItem = document.getElementsByClassName('')

