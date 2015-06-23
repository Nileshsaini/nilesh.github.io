window.onload = initForm;

function initForm(){
	document.getElementById("city").selectedIndex = 0;
	document.getElementById("city").onchange = populateBranches;
	document.getElementById("bankbranch").onchange = specificSelector;
	document.getElementById("atmbranch").onchange = specificSelector;
}

function populateBranches() {
	var city = this.options[this.selectedIndex].value;

	if (city != "") {
		var theBranch = parseInt(city);

		for (var i = 0; i < 4; i++) {
			var id = document.getElementById(i);
			var temp = id.getAttribute("class")
			id.className = "none";
		}

		var id = document.getElementById(theBranch);
		var temp = id.getAttribute("class")
		id.className = "block";
		
	}
	else{
		for (var i = 0; i < 4; i++) {
			var id = document.getElementById(i);
			var temp = id.getAttribute("class")
			id.className = "block";
		}
	}
}
function specificSelector() {
	var city = document.getElementById("city").options[document.getElementById("city").selectedIndex].value;
	var theBranch = parseInt(city);
	if (theBranch == 0) {
		specificBranches1();
	}
	else if (theBranch == 1) {
		specificBranches2();
	}
	else if (theBranch == 2) {
		specificBranches3();
	}
	else if (theBranch == 3) {
		specificBranches4();
	}
	else{
		specificBranches0();
	}
}

function specificBranches0() {
	if (document.getElementById("bankbranch").checked && !document.getElementById("atmbranch").checked) {
		for (var i = 4; i < 8; i++) {
			var id = document.getElementById(i);
			var temp = id.getAttribute("class")
			id.className = "block";
		}
		for (var i = 8; i < 12; i++) {
			var id = document.getElementById(i);
			var temp = id.getAttribute("class")
			id.className = "none";
		}
	}
	else if (document.getElementById("atmbranch").checked && !document.getElementById("bankbranch").checked) {
		for (var i = 4; i < 8; i++) {
			var id = document.getElementById(i);
			var temp = id.getAttribute("class")
			id.className = "none";
		}
		for (var i = 8; i < 12; i++) {
			var id = document.getElementById(i);
			var temp = id.getAttribute("class")
			id.className = "block";
		}
	}
	else if ((document.getElementById("bankbranch").checked && document.getElementById("atmbranch").checked) || (!document.getElementById("bankbranch").checked && !document.getElementById("atmbranch").checked)){
		for (var i = 4; i < 8; i++) {
			var id = document.getElementById(i);
			var temp = id.getAttribute("class")
			id.className = "block";
		}
		for (var i = 8; i < 12; i++) {
			var id = document.getElementById(i);
			var temp = id.getAttribute("class")
			id.className = "block";
		}
	}

}
function specificBranches1() {
	if (document.getElementById("bankbranch").checked && !document.getElementById("atmbranch").checked) {
		var id = document.getElementById("4");
		var temp = id.getAttribute("class")
		id.className = "block";
		var id = document.getElementById("8");
		var temp = id.getAttribute("class")
		id.className = "none";
	}
	else if (document.getElementById("atmbranch").checked && !document.getElementById("bankbranch").checked) {
		var id = document.getElementById("4");
		var temp = id.getAttribute("class")
		id.className = "none";
		var id = document.getElementById("8");
		var temp = id.getAttribute("class")
		id.className = "block";
	}
	else if ((document.getElementById("bankbranch").checked && document.getElementById("atmbranch").checked) || (!document.getElementById("bankbranch").checked && !document.getElementById("atmbranch").checked)) {
		var id = document.getElementById("4");
		var temp = id.getAttribute("class")
		id.className = "block";
		var id = document.getElementById("8");
		var temp = id.getAttribute("class")
		id.className = "block";
	}
}
function specificBranches2() {
	if (document.getElementById("bankbranch").checked && !document.getElementById("atmbranch").checked) {
		var id = document.getElementById("5");
		var temp = id.getAttribute("class")
		id.className = "block";
		var id = document.getElementById("9");
		var temp = id.getAttribute("class")
		id.className = "none";
	}
	else if (document.getElementById("atmbranch").checked && !document.getElementById("bankbranch").checked) {
		var id = document.getElementById("5");
		var temp = id.getAttribute("class")
		id.className = "none";
		var id = document.getElementById("9");
		var temp = id.getAttribute("class")
		id.className = "block";
	}
	else if ((document.getElementById("bankbranch").checked && document.getElementById("atmbranch").checked) || (!document.getElementById("bankbranch").checked && !document.getElementById("atmbranch").checked)) {
		var id = document.getElementById("5");
		var temp = id.getAttribute("class")
		id.className = "block";
		var id = document.getElementById("9");
		var temp = id.getAttribute("class")
		id.className = "block";
	}
}
function specificBranches3() {
	if (document.getElementById("bankbranch").checked && !document.getElementById("atmbranch").checked) {
		var id = document.getElementById("6");
		var temp = id.getAttribute("class")
		id.className = "block";
		var id = document.getElementById("10");
		var temp = id.getAttribute("class")
		id.className = "none";
	}
	else if (document.getElementById("atmbranch").checked && !document.getElementById("bankbranch").checked) {
		var id = document.getElementById("6");
		var temp = id.getAttribute("class")
		id.className = "none";
		var id = document.getElementById("10");
		var temp = id.getAttribute("class")
		id.className = "block";
	}
	else if ((document.getElementById("bankbranch").checked && document.getElementById("atmbranch").checked) || (!document.getElementById("bankbranch").checked && !document.getElementById("atmbranch").checked)) {
		var id = document.getElementById("6");
		var temp = id.getAttribute("class")
		id.className = "block";
		var id = document.getElementById("10");
		var temp = id.getAttribute("class")
		id.className = "block";
	}
}
function specificBranches4() {
	if (document.getElementById("bankbranch").checked && !document.getElementById("atmbranch").checked) {
		var id = document.getElementById("7");
		var temp = id.getAttribute("class")
		id.className = "block";
		var id = document.getElementById("11");
		var temp = id.getAttribute("class")
		id.className = "none";
	}
	else if (document.getElementById("atmbranch").checked && !document.getElementById("bankbranch").checked) {
		var id = document.getElementById("7");
		var temp = id.getAttribute("class")
		id.className = "none";
		var id = document.getElementById("11");
		var temp = id.getAttribute("class")
		id.className = "block";
	}
	else if ((document.getElementById("bankbranch").checked && document.getElementById("atmbranch").checked) || (!document.getElementById("bankbranch").checked && !document.getElementById("atmbranch").checked)) {
		var id = document.getElementById("7");
		var temp = id.getAttribute("class")
		id.className = "block";
		var id = document.getElementById("11");
		var temp = id.getAttribute("class")
		id.className = "block";
	}
}