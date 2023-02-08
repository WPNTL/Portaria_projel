// 'scrollbars=yes,width=795,height=550,top=2,left=1'  fullscreen=yes

function Abrir_Consulta() {  with(document.pcp)   {  javascript:void(open('frame_consulta_pcp.php','principal1','scrollbars=yes,fullscreen=yes')); } }

function Abrir_Cadastro_PCP() { with(document.pcp)   { javascript:void(open('frame_cadastro_pcp.php','principal','scrollbars=yes,fullscreen=yes')); } }

function Abrir_Cadastro_Pedido() { with(document.pcp)   { javascript:void(open('cadastro_pedido.php','principal','scrollbars=yes')); } }

function Abrir_Consulta_Pedido() { with(document.pcp)   { javascript:void(open('frame_consulta_pedido.php','principal1','scrollbars=yes,width=795,height=550,top=2,left=1')); } }

function Abrir_PCP() { with(document.pcp)   { javascript:void(open('frame_altera_pcp.php','principal3','scrollbars=yes,fullscreen=yes')); } }

function Abrir_PCP_Antigos() { with(document.pcp)   { javascript:void(open('frame_altera_pcp_antigos.php','principal3','scrollbars=yes,fullscreen=yes')); } }

function Abrir_PCP_Geral_Antigos() { with(document.pcp)   { javascript:void(open('frame_consulta_pcp_antigos.php','principal3','scrollbars=yes,fullscreen=yes')); } }

function Abrir_Consulta_Placar() { with(document.pcp)   { javascript:void(open('frame_placar_pcp.php','principal3','scrollbars=yes,fullscreen=yes')); } }

function Abrir_imprimir_etiquetas() { with(document.pcp)   { javascript:void(open('imprimir_pcp_etiquetas.php','principal_altera','scrollbars=no,fullscreen=yes')); } }

function Atualizar_Dados() { with(document.pcp) { action  = "cabecalho_cons_pcp.php"; target="menu_dados"; submit(); action  = "consulta_geral_pcp.php"; target="principal_dados"; submit(); } }

function Atualizar_Dados_Pedido() { with(document.pcp) { action  = "consulta_pedido.php"; target="principal_pedido"; submit(); } }

function Atualizar_Dados_Consulta() { with(document.pcp) {  action  = "altera_pcp_db_setor.php"; target="principal_dados"; submit(); } }

function Atualizar_Dados_PCP() { with(document.pcp) { action  = "consulta_geral_pcp.php";  target="principal_dados";  submit(); } }

function Atualizar_Dados_PCP_Antigos() { with(document.pcp) { action  = "consulta_geral_pcp_antigo.php";  target="principal_dados";  submit(); } }

function Atualizar_Placar_PCP() { with(document.pcp) { action  = "consulta_placar_pcp.php";  target="principal_dados";  submit(); } }

function Atualizar_Dados_PCP_Altera() { with(document.pcp) { action  = "altera_geral_pcp.php"; target="principal_altera"; submit(); } }

function Atualizar_Dados_PCP_Altera_Antigos() { with(document.pcp) { action  = "altera_geral_pcp_antigo.php"; target="principal_altera"; submit(); } }

function Atualizar_Imprimir_PCP_Altera() { with(document.imprimir_pcp_etiquetas) { action  = "imprimir_pcp_etiquetas.php"; target="principal_altera"; submit(); } }

function Sair() { with(document.pcp) { action = "logout.php"; submit(); } }

function Atualizar_Controle_Usuario() { with(document.pcp) { action  = "controle_usuario_pcp.php"; submit(); } }

function Alterar_Dados_PCP_Altera() { with(document.pcp) { action  = "altera_geral_pcp_db.php"; target="principal_altera"; submit(); } }



function Alterar_Dados_Pedido_Altera() { with(document.pcp)   { action = "consulta_pedido_db.php";  target="principal_pedido"; submit();  } }


function Baixa() {
   with(document.pcp)   { 
     		
			 if (baixa_novo.value == "P") { 
     	if(confirm("Reprogramar Entrega ?")) { reprogramacao_novo.focus(); reprogramacao_novo.value = ""; data_baixa_novo.value = "";
	 if (reprogramacao_novo.value == "") { alert("Data da Reprogramação!"); reprogramacao_novo.focus();	return true; }  }  } 	
 	        
			 if (baixa_novo.value == "E") {
		if(confirm("Item Fabricado - Expedição")) {  data_baixa_novo.focus(); data_baixa_novo.value = ""; 
	 if (data_baixa_novo.value == "") { alert("Data da Baixa!"); data_baixa_novo.focus();	return true; }  }  }  		
 	        
			 if (baixa_novo.value == "S") {
		if(confirm("Deseja Suspender esse item ?")) { Atualizar_Cadastro.focus();   return true; } } 
 	        
			 if (baixa_novo.value == "C") {
		if(confirm("Deseja Cancelar esse item ?")) { Atualizar_Cadastro.focus(); return true; } } 
   }          
}




function Alterar_DB() {
   with(document.pcp)   {

		//		IF VERIFICAR DADOS VAZIOS 
	 	if (lib_alterar.value == "sim")  {     
if (num_os_novo.value == "") { alert("Digita o Número da O.S!"); num_os_novo.focus(); return true; }
if (item_novo.value == "") { alert("Digita o Número do Item!");	item_novo.focus(); return true; }

if (nome_cliente_novo.value == "") { alert("Digita o Nome do Cliente!"); nome_cliente_novo.focus(); return true; }
if (mercado_novo.value == "") { alert("Digita o Tipo de Mercado!"); mercado_novo.focus(); return true; }
if (estado_novo.value == "") { alert("Digita o Estado!"); estado_novo.focus(); return true; }

if (data_entrega_novo.value == "") { alert("Digita a Data da Entrega (00/00/0000)!"); data_entrega_novo.focus(); return true; }

if (local_venda_novo.value == "") { alert("Digita o Local da Venda!"); local_venda_novo.focus(); return true; } 	
if (fornecimento_motor_novo.value == "") { alert("Digita o Fornecimento do Motor!"); fornecimento_motor_novo.focus(); return true; }

if (descr_vent_novo.value == "") { alert("Digita a Descrição!"); descr_vent_novo.focus(); return true; }
if (modelo_novo.value == "") { alert("Digita o Modelo!"); modelo_novo.focus(); return true; }
if (tamanho_novo.value == "") { alert("Digita o Tamanho!"); tamanho_novo.focus(); return true; }

if (qt_novo.value == "") { alert("Digita a Quantidade!"); qt_novo.focus(); return true; }
if (qt_novo.value == "0") { alert("Digita a Quantidade!"); qt_novo.focus(); return true; }
if (valor_uni_novo.value == "") { alert("Digita o Valor Unitário!"); valor_uni_novo.focus(); return true; }
	   
	//IF VERIFICAR DADOS VAZIOS 
	if (baixa.value == "E")  { if (baixa_novo.value == "P")  { 
	   if (reprogramacao_novo.value == "") { alert("Data da Reprogramação!"); reprogramacao_novo.focus(); return true; } } 
		action = "altera_pcp_db.php"; 'principal_dados';  submit();  } 
		
	if (baixa.value == "S")  { if (baixa_novo.value == "P")  { 
	   if (reprogramacao_novo.value == "") { alert("Data da Reprogramação!"); reprogramacao_novo.focus(); return true; } }
		action = "altera_pcp_db.php"; 'principal_dados';  submit(); }
	   
	if (baixa.value == "C")  { if (baixa_novo.value == "P") { 
	   if (reprogramacao_novo.value == "") { alert("Data da Reprogramação!"); reprogramacao_novo.focus(); return true; } } 
		action = "altera_pcp_db.php"; 'principal_dados';  submit();  }
		
	if (baixa.value == "P")  { if (baixa_novo.value == "E")  { 
	   if (data_baixa_novo.value == "") { alert("Data da Baixa!"); data_baixa_novo.focus(); return true; }  
		action = "altera_pcp_db.php"; 'principal_dados';  submit(); } }
		
	if (baixa.value == "P")  { if (baixa_novo.value == "checked")  { 
	   if (data_baixa_novo.value == "") { alert("Data da Baixa!"); data_baixa_novo.focus(); return true; }  
		action = "altera_pcp_db.php"; 'principal_dados';  submit(); } }
   
  	if (baixa.value == "P")  { if (baixa_novo.value == "P")  { action = "altera_pcp_db.php"; 'principal_dados';  submit();	} }	
  	
  	if (baixa.value == "P")  { if (baixa_novo.value == "S") { action = "altera_pcp_db.php"; 'principal_dados';  submit(); } }
		
	if (baixa.value == "P")  { if (baixa_novo.value == "C") { action = "altera_pcp_db.php"; 'principal_dados';  submit(); } }

  	if (baixa.value == "P")  { action = "altera_pcp_db.php"; 'principal_dados';  submit(); }
		
		}//FECHAR IF LIBERADO PARA ALTERACAO
	}//FECHAR IF DOCUMENT
}//FECHAR IF PRINCIPAL





function Cadastro_PCP() {
   with(document.pcp)   { 
            if (num_os.value == "") { alert("Digita o Número da O.S!"); num_os.focus(); return true; }
            if (item.value == "") { alert("Digita o Número do Item!"); item.focus(); return true; }
   		    if (nome_cliente.value == "") {	alert("Digita o Nome do Cliente!");	nome_cliente.focus(); return true; }
	        if (estado.value == "") { alert("Digita o Estado!"); estado.focus(); return true; }
 		    if (data_entrega.value == "") { alert("Digita a Data da Entrega (00/00/0000)!"); data_entrega.focus(); return true; }
 			if (local_venda.value == "") { alert("Digita o Local da Venda!"); local_venda.focus(); return true; } 	
			if (fornecimento_motor.value == "") { alert("Digita o Fornecimento do Motor!"); fornecimento_motor.focus(); return true; }
 			if (mercado.value == "") { alert("Digita o Tipo de Mercado!"); mercado.focus(); return true; }
 			if (descr_vent.value == "") { alert("Digita a Descrição!"); descr_vent.focus(); return true; }
 			if (modelo.value == "") { alert("Digita o Modelo!"); modelo.focus(); return true; }
 			if (tamanho.value == "") { alert("Digita o Tamanho!"); tamanho.focus(); return true; }
 	 	 	if (qt.value == "") { alert("Digita a Quantidade!"); qt.focus(); return true; }
  	 	 	if (qt.value == "0") { alert("Digita a Quantidade!"); qt.focus(); return true; }
 	 		if (valor_uni.value == "") { alert("Digita o Valor Unitário!"); valor_uni.focus(); return true; }
		 	action = "cadastro_pcp_db.php";  submit();
        }
}


function Cadastro_Pedido() {
   with(document.pcp)   { 
   		if (nome_cliente.value == "") {	alert("Digita o Nome do Cliente!");	nome_cliente.focus(); return true; }
 	    if (oc_obra.value == "") { alert("Digita a Obra ou Referência!"); oc_obra.focus(); return true; }
 	    if (data_rec_pedido.value == "") { alert("Digita a Data do Recebimento Pedido (00/00/0000)!"); data_rec_pedido.focus(); return true; }
// 	    if (prazo_entrega_data.value == "") { alert("Digita o Prazo da Entrega em Data (00/00/0000)!"); prazo_entrega_data.focus(); return true; }
		 	action = "cadastro_pedido_db.php";  submit();
        }
}


function Altera_Pedido() {
   with(document.pcp)   { 
   		if (nome_cliente_novo.value == "") { alert("Digita o Nome do Cliente!"); nome_cliente_novo.focus(); return true; }
 	    if (oc_obra_novo.value == "") { alert("Digita a Obra ou Referência!"); oc_obra_novo.focus(); return true; }
 	    if (data_rec_pedido_novo.value == "") { alert("Digita a Data do Recebimento Pedido (00/00/0000)!"); data_rec_pedido_novo_novo.focus(); return true; }
// 	    if (prazo_entrega_dias_novo.value == "") { alert("Digita o Prazo da Entrega em Dias!"); prazo_entrega_dias_novo.focus(); return true; }
		 	action = "altera_pedido_db.php";  submit();
        }
}




function Cadastro_Novo_Item() {
   with(document.pcp)   { 	
     descr_vent.value = ""; modelo.value = ""; tamanho.value = ""; arranjo.value = ""; classe.value = ""; rotacao.value = ""; gab.value = ""; qt.value = ""; valor_uni.value = ""; tag.value = ""; certif_balanc.value = ""; certif_materiais.value = ""; desenho_certif.value = "";
  	 action  = "cadastro_pcp.php"; target="principal"; submit(); 
        }
}

function Cadastro_Nova_Os() {
   with(document.pcp)   {  
    num_os.value = ""; item.value = ""; num_proposta.value = ""; nome_cliente.value = ""; oc_obra.value = ""; mercado.value = ""; representante.value = ""; estado.value =""; data_entrega.value = "" ; local_venda.value  = ""; fornecimento_motor.value = "";
	descr_vent.value = ""; modelo.value = ""; tamanho.value = ""; arranjo.value = ""; classe.value = ""; rotacao.value = ""; gab.value = ""; qt.value = ""; valor_uni.value = ""; obs.value = ""; tag.value = ""; data_book.value = ""; certif_balanc.value = ""; certif_materiais.value = ""; desenho_certif.value = ""; 
	 action  = "cadastro_pcp.php"; target="principal"; submit(); 
	}	
}


function Alterar_Dados_PCP_Placar() { with(document.pcp) { action  = "consulta_placar_pcp_db.php"; submit(); } }

function Alterar_Placar() { with(document.pcp) { action  = "consulta_placar_pcp.php"; submit(); } }
