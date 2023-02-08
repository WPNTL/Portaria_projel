function Trocando_Data(Campo, teclapres)
			{
				var tecla = teclapres.keyCode;
				var vr = new String(Campo.value);
				vr = vr.replace("/", "");
				vr = vr.replace("/", "");
				vr = vr.replace("/", "");
				tam = vr.length + 1;
				if (tecla != 8 && tecla != 8)
				{
					if (tam > 0 && tam < 2)
						Campo.value = vr.substr(0, 2) ;
					if (tam > 2 && tam < 4)
						Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2);
					if (tam > 4 && tam < 7)
						Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2) + '/' + vr.substr(4, 7);
				}
			}
			
	
			
function Digitar_Numero(campo){
	var digits="0123456789"
	var campo_temp
	for (var i=0;i<campo.value.length;i++){
	campo_temp=campo.value.substring(i,i+1)
		if (digits.indexOf(campo_temp)==-1){
		campo.value = campo.value.substring(0,i);
	break;
}
}
}

function scrolaVert(quem,quanto){
  var novo = quem.scrollTop + quanto;
  if(novo>0 && novo<quem.scrollHeight){
    quem.scrollTop = novo;
  }
}