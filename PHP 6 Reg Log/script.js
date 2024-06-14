let show_btns = document.getElementById('show_btns');
let change_name_btn = document.getElementById('change_name');
let change_last_btn = document.getElementById('change_last');
let change_uid_btn = document.getElementById('change_uid');
let change_email_btn = document.getElementById('change_email');
let gen_change_btn = document.getElementById('gen_change');
let changeContainer = document.getElementById('changeContainer');
let input_change = document.getElementById('input_change');
let gencounter = 0;
gen_change.onclick = function () {
    if (gencounter % 2 == 0) {
        document.getElementById('genChangeBox').style.display = 'block';
        gencounter++;
    } else {
        document.getElementById('genChangeBox').style.display = 'none';
        gencounter++;
    }
}
let showCounter = 0;
show_btns.onclick = function () {
    let ch_btns = document.getElementsByClassName('ch_btn');
    if (showCounter % 2 == 0) {
        for (let i = 0; i < ch_btns.length; i++) {
            changeContainer.style.display = "block";
            ch_btns[i].style.display = "inline-block";
        }
        showCounter++;
    } else {
        for (let i = 0; i < ch_btns.length; i++) {
            ch_btns[i].style.display = "none";
            changeContainer.style.display = "none";

        }
        showCounter++;
    }
}

let chng = function chng(id) {
    // input_change.setAttribute.name = ("hola");
    input_change.setAttribute("name", `${id}`);
    input_change.setAttribute('placeholder', `${id}`)
    console.log(input_change);
   



    // let change_last_btn = document.getElementById('change_last');
    // let change_uid_btn = document.getElementById('change_uid');
    // let change_email_btn = document.getElementById('change_email');
    // let gen_change_btn =
}
