let start = document.getElementById('start');
let starting = document.getElementById('starting');
let calc = document.getElementById('calc');
let led = document.getElementById('led');
starting.onclick = function () {
    start.style.display = ('none');
    calc.style.display = ('block');
    onOff.onclick = function () {
        calc.style.display = ('none');
        start.style.display = ('block');
    }
}

function f(val) {
    led.value += val;
}
function c() {
    led.value = '';
}
function back() {
    led.value = led.value.slice(0, -1);
}
function ev() {
    let text = eval(led.value);
    led.value = text;
}

// 2+2=5
// 20-20=25-25
// 4*5-4*5=5*5-5*5
// 4*(5-5)= 5*(5-5)
// 4=5
// 2+2=5