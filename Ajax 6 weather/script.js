// function f() {
//     fetch('https://api.openweathermap.org/data/2.5/weather?q=' + input.value + '&appid=b8c1d83f8e3b11e4a2a4354e097bf304')
//         .then(function (res) {
//             return res.json();
//         })
//         .then(function (res) {
//             console.log(res)
//             document.getElementById('pCity').innerHTML = 'country - ' + res.name;
//             let temperature = res.main.feels_like - 273;
//             document.getElementById('pShort').innerHTML = 'shortname - ' + res.sys.country;
//             document.getElementById('pTemp').innerHTML = 'temperature -' + temperature.toFixed(2);
//         })
// }
$("#ok").on('click', function () {
    $.ajax({
        url: 'https://api.openweathermap.org/data/2.5/weather?q=' + $("#input").val() + '&appid=b8c1d83f8e3b11e4a2a4354e097bf304',
        dataType: 'json',

        success: function (res) {
            console.log(res)
            $('#pCity').html('Country - ' + res.name);
            let temperature = res.main.feels_like - 273;
            $('#pShort').html('ShortName - ' + res.sys.country);
            $('#pTemp').html('temperature - ' + temperature.toFixed(1))
        }
    })
})