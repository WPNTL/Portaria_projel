// 'scrollbars=yes,width=795,height=550,top=2,left=1'  fullscreen=yes

function Atualizar_Filtros() { with(document.avaliacao_desempenho) { 
	action="../controle_total/cabecalho_menu.php"; target="top"; submit(); 
	action="../controle_total/controle_total.php"; target="principal"; submit(); } }

function Atualizar_Organizar() { with(document.avaliacao_desempenho) { 
	action="../controle_total/controle_total.php"; target="principal"; submit(); } }

function Atualizar_Index() { with(document.avaliacao_desempenho) { 
	action="inicio.php";  submit(); } }

function Cadastro_Logout() { with(document.avaliacao_desempenho) { 
	action="logout.php";  submit(); } }



function Abrir_Cadastro_Funcionarios() {  with(document.avaliacao_desempenho)   {  
	javascript:void(open('../controle_total/cadastro_funcionarios.php', 'cadastro_funcionarios', 'scrollbars=yes, width=595,height=350,top=2,left=1')); } }
	
function Abrir_Alterar_Funcionarios() {  with(document.avaliacao_desempenho)   {  
	javascript:void(open('../controle_total/alterar_funcionarios.php', 'cadastro_funcionarios', 'scrollbars=yes, width=595,height=350,top=2,left=1')); } }
	
function Abrir_Cadastro_Setor() {  with(document.avaliacao_desempenho)   {  
	javascript:void(open('../controle_total/cadastro_setor.php', 'cadastro_setor', 'scrollbars=yes, width=595,height=350,top=2,left=1')); } }
	
function Abrir_Alterar_Setor() {  with(document.avaliacao_desempenho)   {  
	javascript:void(open('../controle_total/alterar_setor.php', 'cadastro_setor', 'scrollbars=yes, width=595,height=350,top=2,left=1')); } }
	
function Abrir_Cadastro_Funcao() {  with(document.avaliacao_desempenho)   {  
	javascript:void(open('../controle_total/cadastro_funcao.php', 'cadastro_funcao', 'scrollbars=yes, width=595,height=350,top=2,left=1')); } }
	
function Abrir_Alterar_Funcao() {  with(document.avaliacao_desempenho)   {  
	javascript:void(open('../controle_total/alterar_funcao.php', 'cadastro_funcao', 'scrollbars=yes, width=595,height=350,top=2,left=1')); } }