nextfield = "cliente"; // nome do primeiro campo do site
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
	eval('document.n_orcamento.' + nextfield + '.focus()');
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
	eval('document.n_orcamento.' + nextfield + '.focus()');
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


function Abrir_N_Orcamento() {
     with(document.n_orcamento)   {
     javascript:void(open('cabecalho_n_orcamento.php','menu','scrollbars=no'));
     javascript:void(open('n_orcamento.php','principal','scrollbars=yes'));
    
    }
}

function Abrir_Cons_Orcamento() {
     with(document.n_orcamento)   {
     javascript:void(open('centro.php','menu','scrollbars=no'));
     javascript:void(open('cons_orcamento.php','principal','scrollbars=yes'));
    
    }
}

function Atualizar_Cons_Orcamento() { 
	with(document.n_orcamento) { action  = "cons_orcamento.php"; target="principal"; submit(); } }

function Abrir_Cadastro_Orcamento() {
     with(document.n_orcamento)   {
     javascript:void(open('centro.php','menu','scrollbars=no'));
     javascript:void(open('cadastro_orcamento.php','principal','scrollbars=yes'));

    }
}

function Abrir_Alterar_Orcamento() {
     with(document.n_orcamento)   {
     javascript:void(open('cabecalho_altera_orcamento.php','menu','scrollbars=no'));
     javascript:void(open('centro.php','principal','scrollbars=no'));

    }
}

function Abrir_Cliente_Orcamento() {
     with(document.n_orcamento)   {
     javascript:void(open('centro.php','menu','scrollbars=no'));
     javascript:void(open('emissao_dados.php','principal','scrollbars=no'));

    }
}

function Atualizar_Alterar() {
     with(document.n_orcamento1)   {
     action  = "cabecalho_altera_orcamento.php"; submit();
     action  = "altera_orcamento1.php"; target="principal"; submit();
    }
}

function Atualizar1() {
     with(document.n_orcamento1)   {
     action  = "cabecalho_n_orcamento.php"; submit();
     action  = "n_orcamento.php"; target="principal"; submit();
    }
}

function Atualizar() {
     with(document.n_orcamento)   {
     action  = "n_orcamento.php";
     submit();
    }
}

function Atualizar2() {
     with(document.n_orcamento)   {
     action  = "cons_orcamento.php";
     submit();
    }
}

function Sair() {
   with(document.n_orcamento)   {
    action = "logout.php";
     submit();
    }
}

function Inserir() {
   with(document.n_orcamento)   {
                      if (cliente.value == "") {
			alert("Digita o Nome do Cliente!");
			cliente.focus();
			return true;
 		}
   		      if (mercado.value == "Selecione") {
			alert("Selecione o Tipo de Mercado!");
			mercado.focus();
			return false;
 		}
 		       if (mercado.value == "") {
			alert("Selecione o Tipo de Mercado!");
			mercado.focus();
			return false;
 		}
 		        if (contato.value == "") {
			alert("Digita o Nome do Contato!");
			contato.focus();
			return true;
 		}
/* 		        if (referencia.value == "") {
			alert("Digita a Referência / Obra!");
			referencia.focus();
			return true;
 		}
*/ 		        if (uf.value == "Selecione") {
			alert("Selecione o Estado!");
			uf.focus();
			return false;
 		}
 		        if (uf.value == "") {
			alert("Selecione o Estado!");
			uf.focus();
			return false;
 		}
 /*		        if (representante.value == "") {
		        alert("Digita o Representante!");
			representante.focus();
			return true;
 		}
*/
                     action = "cadastro_orcamento_db.php";
                     submit();
    }
}

function Alterar() {
   with(document.n_orcamento)   {
                      if (cliente_novo.value == "") {
			alert("Digita o Nome do Cliente!");
			cliente_novo.focus();
			return true;
 		}
   		      if (mercado_novo.value == "Selecione") {
			alert("Selecione o Tipo de Mercado!");
			mercado_novo.focus();
			return false;
 		}
 		       if (mercado_novo.value == "") {
			alert("Selecione o Tipo de Mercado!");
			mercado_novo.focus();
			return false;
 		}
 		        if (contato_novo.value == "") {
			alert("Digita o Nome do Contato!");
			contato_novo.focus();
			return true;
 		}
 /*		        if (referencia_novo.value == "") {
			alert("Digita a Referência / Obra!");
			referencia_novo.focus();
			return true;
 		}
 */		        if (uf_novo.value == "Selecione") {
			alert("Selecione o Estado!");
			uf_novo.focus();
			return false;
 		}
 		        if (uf_novo.value == "") {
			alert("Selecione o Estado!");
			uf_novo.focus();
			return false;
 		}
 /*		        if (representante_novo.value == "") {
		        alert("Digita o Representante!");
			representante_novo.focus();
			return true;
 		}
*/   	 	        action = "altera_orcamento_db.php";
        	        submit();
        }
}



/*function Mostrar1() {
     with(document.n_orcamento)   {
     	   n_orcamento.checkcliente.checked = false;
           n_orcamento.checkmercado.checked = false;
           n_orcamento.checkcontato.checked = false;
           n_orcamento.checkreferencia.checked = false;
           n_orcamento.checkuf.checked = false;
           n_orcamento.checkrepresentante.checked = false;
	   n_orcamento.checkvalor.checked = false;
	   n_orcamento.checkdata.checked = false;
	   n_orcamento.checkperiodo.checked = false;
   	   n_orcamento.checkusuario.checked = false;
	   action  = "n_orcamento.php";
           submit();
           fn_orc.value = '*'; fcliente.value = '*'; fmercado.value = '*';
	   fcontato.value = '*'; freferencia.value = '*'; fuf.value = '*';
	   frepresentante.value = '*'; fvalor.value = '*'; fdata.value = '*';
	   fperiodo.value = '*'; fusuario.value = '*';
           action  = "n_orcamento.php";
           submit();
    }
}

function roger() {
       with(document.n_orcamento)   { action  = "n_orcamento.php";  submit();
       if ( libcliente.value == "") { n_orcamento.checkcliente1.checked = false;
       if ( checkcliente1.value == "") { fselectcliente.value = '*'; } }
       action  = "n_orcamento.php";
       submit();
    }
}

function Mostar_Conforme_Usuario() {
       with(document.n_orcamento)   {
    if ( libcliente.value == "") {
        n_orcamento.checkcliente.checked = false; action  = "n_orcamento.php"; submit();
        //fcliente.value = '*'; action  = "n_orcamento.php"; submit();
	}

    if ( libmercado.value == "") {
        n_orcamento.checkmercado.checked = false; action  = "n_orcamento.php"; submit();
        //fmercado.value = '*'; action  = "n_orcamento.php"; submit();
	}
    }
}*/

/*function Checar() {
      if ( (n_orcamento.checkcliente.checked) == true ) {
       with(document.n_orcamento)   {checkcliente.value = 'checked'; } }
else { with(document.n_orcamento)   {checkcliente.value = '';  } }

      if ( (n_orcamento.checkmercado.checked) == true ) {
       with(document.n_orcamento)   {checkmercado.value = 'checked'; } }
else { with(document.n_orcamento)   {checkmercado.value = ''; } }

      if ( (n_orcamento.checkcontato.checked) == true ) {
       with(document.n_orcamento)   {checkcontato.value = 'checked'; }  }
else { with(document.n_orcamento)   {checkcontato.value = ''; } }

      if ( (n_orcamento.checkreferencia.checked) == true ) {
       with(document.n_orcamento)   {checkreferencia.value = 'checked'; }  }
else { with(document.n_orcamento)   {checkreferencia.value = ''; }  }

      if ( (n_orcamento.checkuf.checked) == true ) {
       with(document.n_orcamento)   {checkuf.value = 'checked'; } }
else { with(document.n_orcamento)   {checkuf.value = ''; }  }

      if ( (n_orcamento.checkrepresentante.checked) == true ) {
       with(document.n_orcamento)   {checkrepresentante.value = 'checked'; } }
else { with(document.n_orcamento)   {checkrepresentante.value = ''; } }

      if ( (n_orcamento.checkvalor.checked) == true ) {
       with(document.n_orcamento)   {checkvalor.value = 'checked'; } }
else { with(document.n_orcamento)   {checkvalor.value = ''; } }

      if ( (n_orcamento.checkdata.checked) == true )  {
       with(document.n_orcamento)   {checkdata.value = 'checked'; }  }
else { with(document.n_orcamento)   {checkdata.value = ''; }  }

      if ( (n_orcamento.checkperiodo.checked) == true ) {
       with(document.n_orcamento)   {checkperiodo.value = 'checked'; } }
else { with(document.n_orcamento)   {checkperiodo.value = ''; }  }

      if ( (n_orcamento.checkusuario.checked) == true ) {
       with(document.n_orcamento)   {checkusuario.value = 'checked'; }  }
else { with(document.n_orcamento)   {checkusuario.value = ''; }  }

       with(document.n_orcamento)   {
       action  = "n_orcamento.php";
       submit();
    }
}*/


