let test = document.getElementById('test');
let shiftRight = document.getElementById('shiftRight');
let shiftDown = document.getElementById('shiftDown');
let spread = document.getElementById('spread');
let blurr = document.getElementById('blurr');
let opacity = document.getElementById('opacity');
let display = document.getElementById('display');
let color = document.getElementById('color');
let ptichka = document.getElementById('ptichka');
display.value = `${0 + 'px'} ${0 + 'px'} ${0 + 'px'} ${5 + 'px'} ${1}`;
function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    // console.log(result);
    result = {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    };
    return `rgba(${result.r}, ${result.g}, ${result.b}, ${opacity.value})`
}
function fr() {
    // console.log(color.value);
    // console.log(hexToRgb(color.value));
    document.getElementById('sr').innerHTML = shiftRight.value;
    document.getElementById('sd').innerHTML = shiftDown.value;
    document.getElementById('sp').innerHTML = spread.value;
    document.getElementById('bl').innerHTML = blurr.value;
    document.getElementById('op').innerHTML = opacity.value;
    let r = shiftRight.value + 'px';
    let d = shiftDown.value + 'px';
    let s = spread.value + 'px';
    let b = blurr.value + 'px';
    let c = color.value;
    let o = opacity.value;
    if (o < 1) {
        c = hexToRgb(c);
    }
    display.value = `${ptichka.checked ? 'inset' : ''}  ${r} ${d} ${s} ${b} ${c}`;
    test.style.boxShadow = `${display.value}`;
}