
function validForm() {
	var allGood = true;
	var allTags = document.getElementsByTagName("*");

	for (var i = 0; i < allTags.length; i++) {
		if (!validTag(allTags[i])) {
			allGood = false;
		}
	}
	return allGood;

	function validTag(thisTag) {
		var outClass = "";
		var allClasses = thisTag.className.split(" ");

		for (var j = 0; j < allClass.length; j++) {
			outClass += validBasedOnClass(allClasses[j]) + " ";
		}

		thisTag.className = outClass;
		
		if (outClass.indexOf("invalid") > -1) {
			thisTag.focus();
			if (thisTag.nodeName == "INPUT") {
				thisTag.select();
			}
			return false;
		}
		return true;

		function validBasedOn(thisClass) {
			var classBack = "";

			switch(thisClass){
				case "":
				case "invalid":
					break;
				case "reqd":
					if (allGood && thisTag.value == "") {
						classBack = "invalid";
					}
					classBack += thisClass;
					break;
				default:
				classBack += thisClass;	
			}
			return classBack;
		}
	}

}