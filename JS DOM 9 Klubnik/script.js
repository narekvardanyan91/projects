let kgP = document.getElementById('kgP');
let grP = document.getElementById('grP');
let kgM = document.getElementById('kgM');
let grM = document.getElementById('grM');
let weight = document.getElementById('weight');
let cart = document.getElementById('cart');
let gin = document.getElementById('gin');
let www = 0;

if (localStorage.getItem('count') == null) {
    localStorage.setItem('count', www);
} else {
    www = +localStorage.getItem('count');
    weight.value = www.toFixed(1);
    gin.innerHTML = (weight.value * 1600).toFixed(1);
}

kgP.onclick = function () {
    weight.value = (www += 1).toFixed(1);
    gin.innerHTML = (weight.value * 1600).toFixed(1);
    localStorage.setItem('count', www);
}
kgM.onclick = function () {
    if (www >= 1) {
        weight.value = (www -= 1).toFixed(1);
        gin.innerHTML = (weight.value * 1600).toFixed(1);
        localStorage.setItem('count', www);
    }
}
grP.onclick = function () {
    weight.value = (www += 0.1).toFixed(1);
    gin.innerHTML = (weight.value * 1600).toFixed(1);
    localStorage.setItem('count', www);
}
grM.onclick = function () {
    if (www >= 0.1) {
        weight.value = (www -= 0.1).toFixed(1);
        gin.innerHTML = (weight.value * 1600).toFixed(1);
        localStorage.setItem('count', www);
    }
}


// setitemov haytararum enq
// getitemov kanchum enq