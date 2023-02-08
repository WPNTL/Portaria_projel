nextfield = "tag_novo"; // nome do primeiro campo do site
netscape = "";
ver = navigator.appVersion; len = ver.length;
for(iln = 0; iln < len; iln++) if (ver.charAt(iln) == "(") break;
	netscape = (ver.charAt(iln+1).toUpperCase() != "C");

function keyDown(DnEvents) {
	// ve quando e o netscape ou IE
	k = (netscape) ? DnEvents.which : window.event.keyCode;
	if (k == 13) { // preciona tecla enter
	if (nextfield == 'done') {
	//alert("viu como funciona?");
	return true;
	//return true; // envia quando termina os campos
	} else {
	// se existem mais campos vai para o proximo
	eval('document.pcp.' + nextfield + '.focus()');
	return false;
     }
   }
}
document.onkeydown = keyDown; // work together to analyze keystrokes
if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
