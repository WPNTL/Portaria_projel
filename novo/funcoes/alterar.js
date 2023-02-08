function Alterar_Funcionarios() { 
	with(document.avaliacao_desempenho) { action  = "alterar_funcionarios_db.php"; submit();
		} 
}

function Atualizar_Alterar_Funcionarios() { 
	with(document.avaliacao_desempenho) { action  = "alterar_funcionarios.php"; submit();
		} 
}

function Alterar_Setor() {
   with(document.avaliacao_desempenho)   { 
   			if (nome_setor_anterior.value == "") { 
				alert("Digita o Setor Anterior!"); nome_setor_anterior.focus(); return true; 
				}
            if (nome_setor_novo.value == "") { 
				alert("Digita o Setor Atual!"); nome_setor_novo.focus(); return true; 
				}
		 	action = "alterar_setor_db.php";  submit();
        }
}


function Atualizar_Alterar_Setor() { 
	with(document.avaliacao_desempenho) { action  = "alterar_setor.php"; submit();
		} 
}


function Alterar_Funcao() {
   with(document.avaliacao_desempenho)   { 
   			if (nome_funcao_anterior.value == "") { 
				alert("Digita a Função Anterior!"); nome_funcao_anterior.focus(); return true; 
				}
            if (nome_funcao_novo.value == "") { 
				alert("Digita a Função Atual!"); nome_funcao_novo.focus(); return true; 
				}
		 	action = "alterar_funcao_db.php";  submit();
        }
}


function Atualizar_Alterar_Funcao() { 
	with(document.avaliacao_desempenho) { action  = "alterar_funcao.php"; submit();
		} 
}