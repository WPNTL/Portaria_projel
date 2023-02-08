nextfield = "num_os"; // nome do primeiro campo do site
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

/*
document.onkeydown = keyDown; // work together to analyze keystrokes
if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
*/

function checkList(obj,nStr) {
	var k = event.keyCode;
	var T = findPosY(obj); //top
	var L = findPosX(obj); //left
	var list = document.getElementById('listHolder');

	if(!list) {
	var list = document.createElement('DIV');
	list.id = 'listHolder';
	document.body.appendChild(list);
	}

	list.style.top=(T+obj.offsetHeight);
	list.style.left=L;
	list.style.display='none';

	var txt=obj.value;

	if (txt) {
	var str='<select class="list"'+
        	'onclick="setOption(\''+obj.id+'\',this.options[this.selectedIndex].value)"'+
		'onkeyup="if(event.keyCode==13){setOption(\''+obj.id+'\','+
		'this.options[this.selectedIndex].value)};if(event.keyCode==27){'+
		'document.getElementById(\'listHolder\').style.display=\'none\';'+
		'document.getElementById(\''+obj.id+'\').focus()};" id="selector" size="6">'
	var match=false
	for(a=0;a<nStr.length;a++){

	if(txt.toLowerCase()==nStr[a].toLowerCase().substring(0,txt.length)){
	match=true
	str+=('<option value="'+nStr[a].replace(/\'/gi,'’')+'">'+nStr[a]+'</option>')
	}
	}

	str+='</select>'
	if(match){
	list.innerHTML=str
	list.style.display='block'
	var sel=document.getElementById('selector')
	if(k=='40') {
        sel.focus()
	}
	if(k=='13'){
        document.getElementById('listHolder').style.display='none'

	if (nextfield == 'done') {
	//alert("viu como funciona?");
	return true;
	//return true; // envia quando termina os campos
	} else {
	// se existem mais campos vai para o proximo
	eval('document.pcp.' + nextfield + '.focus()');
	return false;     }

	}
	}
	}
}

function setOption(obj,val){
	var obj=document.getElementById(obj)
	obj.value=val;
	obj.focus()
	document.getElementById('listHolder').style.display='none'
}

function findPosX(obj){
	var curleft=0;
	if(obj.offsetParent) {

	while(obj.offsetParent){
	curleft+=obj.offsetLeft
	obj=obj.offsetParent;
	}
	} else if(obj.x)
	curleft+=obj.x;
	return curleft;
}

function findPosY(obj){
	var curtop=0;
	if(obj.offsetParent){
	while(obj.offsetParent){
	curtop+=obj.offsetTop
	obj=obj.offsetParent;
	}
	} else if(obj.y)
	curtop+=obj.y;
	return curtop;
}