let header = document.getElementById('header');
let playerX = document.getElementById('playerX');
let start = document.getElementById('start');
let playerO = document.getElementById('playerO');
let tbl = document.getElementById('tbl');
let footer = document.getElementById('footer');
let x_win = document.getElementById('x_win');
let player_turn = document.getElementById('player_turn');
let o_win = document.getElementById('o_win');
let startCounter = 0;
let table = document.createElement('table');
let k = 0;
let x_win_counter = 0;
let o_win_counter = 0;
x_win.innerHTML = x_win_counter;
o_win.innerHTML = o_win_counter;
let winBox = document.getElementById('winBox');


start.onclick = function () {
    if (startCounter == 0) {
        if (playerX.value == '') {
            playerX.value = 'Player X';
        }
        if (playerO.value == '') {
            playerO.value = 'Player O';
        }

        start.innerHTML = 'Play Again';
        if (start.innerHTML == 'Play Again') {
            start.style.backgroundColor = 'rgb(0, 253, 177)';
        }
        
        player_turn.innerHTML = (`Now is ${playerX.value}'s turn`);
        player_turn.style.backgroundColor = 'rgb(77, 77, 219)';
        for (let r = 0; r < 3; r++) {
            let tr = document.createElement('tr');
            for (let d = 0; d < 3; d++) {
                let td = document.createElement('td');
                td.onclick = function () {
                    if (td.innerHTML == '') {
                        if (k % 2 == 0) {
                            td.innerHTML = 'X';
                            player_turn.innerHTML = (`Now is ${playerO.value}'s turn`);
                            player_turn.style.backgroundColor = 'rgb(238, 81, 81)';
                        } else {
                            td.innerHTML = 'O';
                            player_turn.innerHTML = (`Now is ${playerX.value}'s turn`);
                            player_turn.style.backgroundColor = 'rgb(77, 77, 219)';
                        }
                        k++;
                        win();
                    }
                }
                tr.append(td);
            }
            table.append(tr);
        }
        tbl.append(table);
        startCounter++;
    } else {
        ret();
    }
}
function ret() {
    let td = document.getElementsByTagName('td');
    for (let i = 0; i < td.length; i++) {
        td[i].innerHTML = '';

        k = 0;
    }
    player_turn.innerHTML = (`Now is ${playerX.value}'s turn`);
}
function win() {
    const comb = [
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6]
    ];
    let td = document.getElementsByTagName('td');
    let drow = false;
    for (let i = 0; i < comb.length; i++) {
        if (td[comb[i][0]].innerText == 'X' && td[comb[i][1]].innerText == 'X' && td[comb[i][2]].innerText == 'X') {
            drow = true;
            setTimeout(() => {
                winBox.style.display = 'block';
                winBox.style.color = 'rgb(77, 77, 219)';
                winBox.innerHTML = (`WIN ${playerX.value}`);
                setTimeout(() => {
                    winBox.style.display = 'none';
                    ret();
                }, 2000);
            }, 100);
            x_win_counter++;
            x_win.innerHTML = x_win_counter;
        }
        if (td[comb[i][0]].innerText == 'O' && td[comb[i][1]].innerText == 'O' && td[comb[i][2]].innerText == 'O') {
            drow = true;
            setTimeout(() => {
                winBox.style.display = 'block';
                winBox.style.color = 'rgb(238, 81, 81)';
                winBox.innerHTML = (`WIN ${playerO.value}`);
                setTimeout(() => {
                    winBox.style.display = 'none';
                    ret();
                }, 2000);
            }, 100);
            o_win_counter++;
            o_win.innerHTML = o_win_counter;
        }
    }
    if (k == 9 && drow == false) {
        setTimeout(() => {
            winBox.style.display = 'block';
            winBox.style.color = 'white';
            winBox.innerHTML = (`Draw guys) let's play again ;)`);
            setTimeout(() => {
                winBox.style.display = 'none';
                ret();
            }, 2000);

        }, 100);
    }
}


