const showPass = document.querySelector('.input-group .show-pass');
const inputPass = document.querySelector('.input-group input');
let isShow = false;

showPass.addEventListener('click', function () {
	isShow = !isShow;

	if(isShow) {
		showPass.classList.replace('bxs-show', 'bxs-hide');
		inputPass.type = 'text';
	} else {
		showPass.classList.replace('bxs-hide', 'bxs-show');
		inputPass.type = 'password';
	}
})



const strengthIndicator = document.querySelector('.strength');
let numStrength = 0;
const listColor = ['#FF002E', '#FCDE05', '#249FD5', '#67CA5B'];

let isContainsNum = false;
let isContainsAlp = false;
let isContainsSymbol = false;
let isGreater8 = false;


inputPass.addEventListener('input', function () {
	checkPassword(this.value);

	if(this.value === '') {
		numStrength = 0;
	}

	strengthIndicator.style.setProperty('--width', `${numStrength * 25}%`);
	strengthIndicator.style.setProperty('--bg-color', listColor[numStrength-1]);
})



function checkPassword(string) {
	const number = new RegExp('.*[0-9]');
	const alphabet = new RegExp('.*[a-zA-Z]');
	const symbol = new RegExp('.*\\W');
	const greater8 = new RegExp('.{8,}');

	if(number.test(string)) {
		if(!isContainsNum) {
			numStrength++;
			isContainsNum = true;
		}
	} else {
		if(isContainsNum) {
			numStrength--;
			isContainsNum = false;
		}
	}

	if(alphabet.test(string)) {
		if(!isContainsAlp) {
			numStrength++;
			isContainsAlp = true;
		}
	} else {
		if(isContainsAlp) {
			numStrength--;
			isContainsAlp = false;
		}
	}

	if(symbol.test(string)) {
		if(!isContainsSymbol) {
			numStrength++;
			isContainsSymbol = true;
		}
	} else {
		if(isContainsSymbol) {
			numStrength--;
			isContainsSymbol = false;
		}
	}

	if(greater8.test(string)) {
		if(!isGreater8) {
			numStrength++;
			isGreater8 = true;
		}
	} else {
		if(isGreater8) {
			numStrength--;
			isGreater8 = false;
		}
	}
}