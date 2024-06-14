let yes = document.getElementById('yes');
let no = document.getElementById('no');
let color = document.getElementById('color');
yes.checked = true;
yes.onclick = function () {
    yes.checked = true;
    no.checked = false;
    color.style.display = 'block';
}

no.onclick = function () {
    yes.checked = false;
    no.checked = true;
    color.style.display = 'none';
}


let create = document.getElementById('create');
create.onclick = function () {
    let width = document.getElementById('width').value;
    let height = document.getElementById('height').value;
    let row = document.getElementById('row').value;
    let column = document.getElementById('column').value;
    let table = document.createElement('table');
    table.style.margin = '50px auto';
    if (yes.checked) {
        table.style.border = 'solid ' + color.value;
    } 
    for (let r = 0; r < row; r++) {
        let tr = document.createElement('tr');
        for (let c = 0; c < column; c++) {
            let td = document.createElement('td');
            td.style.width = width + 'px';
            td.style.height = height + 'px';
            td.style.border = 'solid';
            td.onmouseover = function () {
                let red = Math.round(Math.random() * 256);
                let green = Math.round(Math.random() * 256);
                let blue = Math.round(Math.random() * 256);
                let random_col = 'rgb(' + red + ',' + green + ',' + blue + ')';
                td.style.background = random_col;
                td.style.transition = '0s';
                setTimeout(() => {
                    td.style.background = 'transparent';
                    td.style.transition = '2s';
                }, 300);
            }
            // td.onmouseout = function() {
            //     td.style.backgroundColor = 'white';
            //     td.style.transition = 2 + 's';
            // }
            tr.append(td)
        }
        table.append(tr)
    }
    document.body.append(table);


}