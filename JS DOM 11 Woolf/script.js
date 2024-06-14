// 1
// let rab = document.getElementsByClassName('rab');
// for (let i = 0; i < rab.length; i++) {
//     // rab[i].style.top = (Math.floor(Math.random() * innerHeight) - 50) + 'px';
//     // rab[i].style.left = (Math.floor(Math.random() * innerWidth) - 30) + 'px';
//     rab[i].style.top = (Math.floor(Math.random() * 88)) + '%';
//     rab[i].style.left = (Math.floor(Math.random() * 94)) + '%';
//     rab[i].onmouseover = function () {
//         // rab[i].style.top = (Math.floor(Math.random() * innerHeight) - 50) + 'px';
//         // rab[i].style.left = (Math.floor(Math.random() * innerWidth) - 30) + 'px';
//         rab[i].style.top = (Math.floor(Math.random() * 88)) + '%';
//         rab[i].style.left = (Math.floor(Math.random() * 94)) + '%';
//     }
// }






//2
let rab = document.getElementsByClassName('rab');
for (let i = 0; i < rab.length; i++) {
    rab[i].style.top = (Math.floor(Math.random() * 88)) + '%';
    rab[i].style.left = (Math.floor(Math.random() * 94)) + '%';
}
function f(id) {
    let rab = document.getElementById(id);
    rab.style.top = (Math.floor(Math.random() * 88)) + '%';
    rab.style.left = (Math.floor(Math.random() * 94)) + '%';
}
document.onmousemove = function (e) {
    document.getElementById('wolf').style.top = e.pageY;
    document.getElementById('wolf').style.left = e.pageX;
}