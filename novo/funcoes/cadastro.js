
function Cadastro_Avaliacao() {
   with(document.avaliacao_desempenho)   { 
   	action = "cadastro_avaliacao_db.php";  submit();	
	}	
}


function Cadastro_Setor() {
   with(document.avaliacao_desempenho)   { 
   	        if (nome_setor.value == "") { alert("Digita o Nome do Setor!"); nome_setor.focus(); return true; }
            if (senha.value == "") { alert("Digita a Senha do Setor!"); senha.focus(); return true; }
		 	action = "cadastro_setor_db.php";  submit();
        }
}


function Cadastro_Funcionario() {
   with(document.frmFoto)   { 
   	        if (nome_funcionarios.value == "") { alert("Digita o Nome!"); nome_funcionarios.focus(); return true; }
			if (status.value == "") { alert("Digita o Status!"); status.focus(); return true; }
            if (setor_funcionario.value == "") { alert("Digita o Setor!"); setor_funcionario.focus(); return true; }
            if (funcao_funcionario.value == "") { alert("Digita o Função!"); funcao_funcionario.focus(); return true; }
//            if (encarregado.value == "") { alert("Digita o Encarregado!"); encarregado.focus(); return true; }
		 	action = "cadastro_funcionarios_db.php";  submit();
        }
}


function Atualizar_Cadastro_Funcionario() { 
	with(document.frmFoto) { 
		action  = "cadastro_funcionarios.php"; submit();
		} 
}


function Cadastro_Funcao() {
   with(document.avaliacao_desempenho)   { 
   	        if (nome_funcao.value == "") { alert("Digita a Função!"); nome_funcao.focus(); return true; }
		 	action = "cadastro_funcao_db.php";  submit();
        }
}


