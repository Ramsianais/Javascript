var brailleMap = new Map();
brailleMap.set("a", "100000");
brailleMap.set("b", "110000");
brailleMap.set("c", "100100");
brailleMap.set("d", "100110");
brailleMap.set("e", "100010");
brailleMap.set("f", "110100");
brailleMap.set("g", "110110");
brailleMap.set("h", "110010");
brailleMap.set("i", "010100");
brailleMap.set("j", "010110");
brailleMap.set("k", "101000");
brailleMap.set("l", "111000");
brailleMap.set("m", "101100");
brailleMap.set("n", "101110");
brailleMap.set("o", "101010");
brailleMap.set("p", "111100");
brailleMap.set("q", "111110");
brailleMap.set("r", "111010");
brailleMap.set("s", "011100");
brailleMap.set("t", "011110");
brailleMap.set("u", "101001");
brailleMap.set("v", "111001");
brailleMap.set("w", "010111");
brailleMap.set("x", "101101");
brailleMap.set("y", "101111");
brailleMap.set("z", "101011");
brailleMap.set("capital", "000001");
brailleMap.set(" ", "000000");



function showBraille(text_input, result) {
	var text = document.getElementById(text_input).value;
	var braille = toBraille(text);
	document.getElementById(result).innerHTML = braille;
}


function toBraille(text) {
	var braille="This is your braille traduction  : <br> <br>";
	for (var i=0; i < text.length; i++){
		var c= text.charAt(i);
		if(c == c.toUpperCase() && c!=" "){
			braille += brailleMap.get("capital");
		}
		braille += brailleMap.get(c.toLowerCase());
	}

	return braille;
}
