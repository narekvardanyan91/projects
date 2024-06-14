let score = document.getElementById('a1');  // score
let time = document.getElementById('a2');  // time
let q = document.getElementById('q');    // banan
let q1 = document.getElementById('q1');  // banan
let q2 = document.getElementById('q2');  // banan
let q3 = document.getElementById('q3');  // banan
let q4 = document.getElementById('q4');  // banan
let q5 = document.getElementById('q5');  // banan
let monkey = document.getElementById('q6');  // monkey
let over = document.getElementById('q7');  // game over
let win = document.getElementById('q8');  // you win
let winScore = document.getElementById('winScore'); //win score div
let loseScore = document.getElementById('loseScore'); //lose score div
let menu = document.getElementById('menu'); // menu button ----- for reload
let start = document.getElementById('start'); // start btn
let xx1 = document.getElementById('xx1');  // main menu
let xx2 = document.getElementById('xx2');  // main game
let easy = document.getElementById('easy');
let medium = document.getElementById('medium');
let hard = document.getElementById('hard');
let talk = document.getElementById('talk');  // choose your .....;
let bg1 = document.getElementById('bg1')
let bg2 = document.getElementById('bg2')
let u;


let xtime = '';
function fr(id) {
	xtime = id;
	if (xtime == 'hard') {
		hard.style.boxShadow = ('-0px -18px 19px 5px rgba(253, 48, 33, 0.88)');
		easy.style.boxShadow = 'none';
		medium.style.boxShadow = 'none';
	} else if (xtime == 'medium') {
		medium.style.boxShadow = ('-0px -18px 19px 5px rgba(255, 255, 0, 0.88)');
		easy.style.boxShadow = 'none';
		hard.style.boxShadow = 'none';
	} else if (xtime == 'easy') {
		easy.style.boxShadow = ('-0px -18px 19px 5px rgba(27, 190, 27, 0.88)');
		medium.style.boxShadow = 'none';
		hard.style.boxShadow = 'none';
	}
}

let xmonkey = '';
function gr(id) {
	xmonkey = id;
	if (id == 'bg1') {
		bg1.style.boxShadow = '-0px -18px 19px 5px rgba(1, 142, 167, 1)'
		bg2.style.boxShadow = 'none';
	} else if (id == 'bg2') {
		bg2.style.boxShadow = '-0px -18px 19px 5px rgba(8, 38, 60, 1)';
		bg1.style.boxShadow = 'none'
	}
}




start.onclick = function () {
	console.log(xtime)
	console.log(xmonkey)
	if (xmonkey == 'bg1') {
		xx2.style.backgroundImage = 'url("bg1.jpg")';
		monkey.style.backgroundImage = 'url("m1.gif")';

	} else if (xmonkey == "bg2") {
		xx2.style.backgroundImage = 'url("bg2.jpg")';
		monkey.style.backgroundImage = 'url("m2.gif")';
		monkey.style.width = '170px';
	}
	if (xmonkey == '' && xtime == '') {
		talk.innerHTML = ('Choose Your Skin and Dificulty');
	} else if (xmonkey != '' && xtime == '') {
		talk.innerHTML = ('Choose Your Dificulty');
	} else if (xmonkey == '' && xtime != '') {
		talk.innerHTML = ('Choose Your Skin');
	} else if (xmonkey != '' && xtime != '') {
		xx1.style.display = 'none';
		xx2.style.display = 'block';
		game();
	}
}

menu.onclick = function reload() {
	window.location.reload();
}


let newGame = document.getElementById('newGame');  //new game button
newGame.onclick = function () {
	game()
}

let winCounter = 0;
let loseCounter = 0;



function game() {
	over.style.display = 'none';
	win.style.display = 'none';
	newGame.style.display = 'none';
	score.innerHTML = 0;


	let arr = document.getElementsByClassName('q');
	for (let i = 0; i < arr.length; i++) {
		arr[i].style.top = (Math.floor(Math.random() * 88)) + '%';
		arr[i].style.left = (Math.floor(Math.random() * 94)) + '%';
		arr[i].classList.remove('rr');
	}

	if (xtime == 'easy') {
		u = 45;
	} else if (xtime == 'medium') {
		u = 30;
	} else {
		u = 15;
	}

	let stop = setInterval(function () {
		u--
		time.innerHTML = u
		if (u == 0) {
			clearInterval(stop);
			document.onkeydown = null;
			over.style.display = 'block';
			loseScore.innerHTML = `lose: ${loseCounter += 1}`;
			newGame.style.display = 'block';
		}
	}, 1000)



	document.onkeydown = function (e) {


		let ll = monkey.offsetLeft;
		let tt = monkey.offsetTop;

		let ll1 = q.offsetLeft;
		let tt1 = q.offsetTop;

		let ll2 = q1.offsetLeft;
		let tt2 = q1.offsetTop;

		let ll3 = q2.offsetLeft;
		let tt3 = q2.offsetTop;

		let ll4 = q3.offsetLeft;
		let tt4 = q3.offsetTop;

		let ll5 = q4.offsetLeft;
		let tt5 = q4.offsetTop;

		let ll6 = q5.offsetLeft;
		let tt6 = q5.offsetTop;

		if (e.keyCode == 38 || e.keyCode == 87) {
			tt = tt - 10
			if (tt < 0) {
				tt = innerHeight
			}
			monkey.style.top = tt + 'px';
		}
		if (e.keyCode == 40 || e.keyCode == 83) {
			tt = tt + 10
			if (tt > innerHeight) {
				tt = 0;
			}
			monkey.style.top = tt + 'px';
		}
		if (e.keyCode == 37 || e.keyCode == 65) {
			ll = ll - 10
			if (ll < 0) {
				ll = innerWidth;
			}
			monkey.style.left = ll + 'px';
		}
		if (e.keyCode == 39 || e.keyCode == 68) {
			ll = ll + 10
			if (ll > innerWidth) {
				ll = 0;
			}
			monkey.style.left = ll + 'px';
		}
		if (e.keyCode == 27) {
			location.reload()
		}
		if (e.keyCode == 13) {
			monkey.classList.add('rot');
		}
		if (e.keyCode == 32) {
			console.log(tt)
			console.log(monkey.offsetTop)
			monkey.style.top = tt - 100 + 'px';
		    setTimeout(() => {
				// monkey.style.transition = '0.2s'
				monkey.style.top = tt + 'px';
				
			}, 200);
			// monkey.style.transition = '0'

		}
		document.onkeyup = function (e) {
			if (e.keyCode == 13) {
				monkey.classList.remove('rot')
			}
			
		}

		



		if (ll + 100 > ll1 && ll < ll1 + 100 && tt + 100 > tt1 && tt < tt1 + 100) {
			q.classList.add('rr');
		}
		if (ll + 100 > ll2 && ll < ll2 + 100 && tt + 100 > tt2 && tt < tt2 + 100) {
			q1.classList.add('rr');
		}
		if (ll + 100 > ll3 && ll < ll3 + 100 && tt + 100 > tt3 && tt < tt3 + 100) {
			q2.classList.add('rr');
		}
		if (ll + 100 > ll4 && ll < ll4 + 100 && tt + 100 > tt4 && tt < tt4 + 100) {
			q3.classList.add('rr');
		}
		if (ll + 100 > ll5 && ll < ll5 + 100 && tt + 100 > tt5 && tt < tt5 + 100) {
			q4.classList.add('rr');
		}
		if (ll + 100 > ll6 && ll < ll6 + 100 && tt + 100 > tt6 && tt < tt6 + 100) {
			q5.classList.add('rr');
		}

		let cl = document.getElementsByClassName('rr').length * 5;
		score.innerHTML = cl;
		if (cl == 30) {
			document.onkeydown = null;
			clearInterval(stop);
			win.style.display = 'block';
			winScore.innerHTML = `win: ${winCounter += 1}`;
			newGame.style.display = 'block';
		}
	}


}






