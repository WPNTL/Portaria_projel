<html>
<head>
<title> Pesquisa Satisfação de Cliente </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" src="funcoes/geral.js"></script>
</head>
<body>

<table class=sem_borda width="750" align="center">
<tr><td>

<table class=titulo width=100% align="center" height="25">
<tr><td><b><font size="5" color="#000000"> Pesquisa Satisfação de Cliente </font></b></td></tr></table>
<br>

<form action="cadastro_pesquisa_db.php" method="post" name="pesquisa" OnSubmit="javascript:return Inserir()">
<?/*
<FORM NAME="pesquisa" method="post">
*/?>
<table class=sem_borda width="750" align="center">
<td>

<tr>
<td class=sem_borda rowspan="2"><b><font size="3" color="#FF0000"> Itens Gerais </font></b></td>
<td class=sem_borda colspan="3"><b><font size="3" color="#FF0000"> Grau de Importância </font></b></td>
<td class=sem_borda > &nbsp; </td>
<td class=sem_borda colspan="3"><b><font size="3" color="#FF0000"> Grau de Satisfação </font></b></td>
<td class=sem_borda > &nbsp; </td>
<td class=sem_borda colspan="3"><b><font size="3" color="#FF0000"> Nossa Empresa em relação a Concorrência </font></b></td>
</tr>

<tr>
<td class=sem_borda width=5% > Baixo <BR></td>
<td class=sem_borda width=5%> Médio <BR></td>
<td class=sem_borda width=5%> Alto <BR></td>
<td class=sem_borda width=1%> &nbsp; <BR></td>

<td class=sem_borda width=5%> Baixo <BR></td>
<td class=sem_borda width=5%> Médio <BR></td>
<td class=sem_borda width=5%> Alto <BR></td>
<td class=sem_borda width=1%> &nbsp; <BR></td>

<td class=sem_borda width=10%> Projelmec é Melhor <BR></td>
<td class=sem_borda width=10%> Projelmec é Igual <BR></td>
<td class=sem_borda width=10%> Deles é Melhor <BR></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 1) Atendimento do Dep. Comercial &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT TYPE="radio" NAME="atendimento_dep_comercial_importancia" VALUE="1"></td>
<td><INPUT TYPE="radio" NAME="atendimento_dep_comercial_importancia" VALUE="2"></td>

<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_comercial_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_comercial_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_comercial_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_comercial_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_comercial_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_comercial_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_comercial_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 2) Atendimento Representante &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_representante_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_representante_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_representante_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_representante_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_representante_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_representante_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_representante_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_representante_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_representante_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 3) Atendimento Dep. Projeto &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_projeto_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_projeto_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_projeto_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_projeto_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_projeto_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_projeto_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_projeto_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_projeto_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_projeto_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 4) Atendimento PCP &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_pcp_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_pcp_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_pcp_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_pcp_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_pcp_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_pcp_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_pcp_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_pcp_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_pcp_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 5) Atendimento Dep. Expedição &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_expedicao_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_expedicao_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_expedicao_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_expedicao_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_expedicao_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_expedicao_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_expedicao_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_expedicao_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="atendimento_dep_expedicao_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 6) Assistência Técnica &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="assistencia_tecnica_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="assistencia_tecnica_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="assistencia_tecnica_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="assistencia_tecnica_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="assistencia_tecnica_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="assistencia_tecnica_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="assistencia_tecnica_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="assistencia_tecnica_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="assistencia_tecnica_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 7) Catálogos Técnicos &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="catalagos_tecnicos_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="catalagos_tecnicos_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="catalagos_tecnicos_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="catalagos_tecnicos_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="catalagos_tecnicos_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="catalagos_tecnicos_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="catalagos_tecnicos_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="catalagos_tecnicos_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="catalagos_tecnicos_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 8) Condição de Pagamento &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="condicao_de_pagamento_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="condicao_de_pagamento_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="condicao_de_pagamento_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="condicao_de_pagamento_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="condicao_de_pagamento_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="condicao_de_pagamento_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="condicao_de_pagamento_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="condicao_de_pagamento_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="condicao_de_pagamento_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 9) Embalagem &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="embalagem_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="embalagem_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="embalagem_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="embalagem_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="embalagem_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="embalagem_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="embalagem_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="embalagem_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="embalagem_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 10) Prazo de Entrega &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="prazo_de_entrega_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="prazo_de_entrega_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="prazo_de_entrega_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="prazo_de_entrega_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="prazo_de_entrega_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="prazo_de_entrega_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="prazo_de_entrega_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="prazo_de_entrega_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="prazo_de_entrega_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 11) Preço dos Produtos &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="preco_dos_produtos_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="preco_dos_produtos_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="preco_dos_produtos_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="preco_dos_produtos_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="preco_dos_produtos_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="preco_dos_produtos_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="preco_dos_produtos_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="preco_dos_produtos_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="preco_dos_produtos_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 12) Programa de Seleção &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="programa_de_selecao_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="programa_de_selecao_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="programa_de_selecao_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="programa_de_selecao_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="programa_de_selecao_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="programa_de_selecao_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="programa_de_selecao_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="programa_de_selecao_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="programa_de_selecao_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 13) Qualidade dos Produtos &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_produtos_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_produtos_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_produtos_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_produtos_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_produtos_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_produtos_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_produtos_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_produtos_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_produtos_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 14) Segurança do Produto &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="seguranca_do_produto_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="seguranca_do_produto_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="seguranca_do_produto_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="seguranca_do_produto_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="seguranca_do_produto_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="seguranca_do_produto_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="seguranca_do_produto_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="seguranca_do_produto_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="seguranca_do_produto_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 15) Variedade dos Produtos &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="variedade_dos_produtos_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="variedade_dos_produtos_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="variedade_dos_produtos_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="variedade_dos_produtos_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="variedade_dos_produtos_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="variedade_dos_produtos_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="variedade_dos_produtos_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="variedade_dos_produtos_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="variedade_dos_produtos_concorrencia" VALUE="3"></td>
</tr></td></table>

<br>
<br>

<table class=sem_borda width="750" align="center">
<td>

<tr>
<td class=sem_borda rowspan="2"><b><font size="3" color="#FF0000"> Itens de Assistência Técnica </font></b></td>
<td class=sem_borda colspan="3"><b><font size="3" color="#FF0000"> Grau de Importância </font></b></td>
<td class=sem_borda > &nbsp; </td>
<td class=sem_borda colspan="3"><b><font size="3" color="#FF0000"> Grau de Satisfação </font></b></td>
<td class=sem_borda > &nbsp; </td>
<td class=sem_borda colspan="3"><b><font size="3" color="#FF0000"> Nossa Empresa em relação a Concorrência </font></b></td>
</tr>

<tr>
<td class=sem_borda width=5%> Baixo <BR></td>
<td class=sem_borda width=5%> Médio <BR></td>
<td class=sem_borda width=5%> Alto <BR></td>
<td class=sem_borda width=1%> &nbsp; <BR></td>

<td class=sem_borda width=5%> Baixo <BR></td>
<td class=sem_borda width=5%> Médio <BR></td>
<td class=sem_borda width=5%> Alto <BR></td>
<td class=sem_borda width=1%> &nbsp; <BR></td>

<td class=sem_borda width=10%> Projelmec é Melhor <BR></td>
<td class=sem_borda width=10%> Projelmec é Igual <BR></td>
<td class=sem_borda width=10%> Deles é Melhor <BR></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 16) Conduta da Equipe Técnica &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="conduta_da_equipe_tecnica_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="conduta_da_equipe_tecnica_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="conduta_da_equipe_tecnica_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="conduta_da_equipe_tecnica_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="conduta_da_equipe_tecnica_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="conduta_da_equipe_tecnica_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="conduta_da_equipe_tecnica_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="conduta_da_equipe_tecnica_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="conduta_da_equipe_tecnica_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 17) Cumprimento do Prazo &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="cumprimento_do_prazo_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="cumprimento_do_prazo_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="cumprimento_do_prazo_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="cumprimento_do_prazo_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="cumprimento_do_prazo_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="cumprimento_do_prazo_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="cumprimento_do_prazo_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="cumprimento_do_prazo_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="cumprimento_do_prazo_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 18) Equipe com Confiabilidade e Qualificação &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipe_com_confiabilidade_e_qualificacao_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipe_com_confiabilidade_e_qualificacao_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipe_com_confiabilidade_e_qualificacao_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipe_com_confiabilidade_e_qualificacao_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipe_com_confiabilidade_e_qualificacao_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipe_com_confiabilidade_e_qualificacao_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipe_com_confiabilidade_e_qualificacao_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipe_com_confiabilidade_e_qualificacao_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipe_com_confiabilidade_e_qualificacao_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 19) Equipes Disponíveis para Atendimento &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipes_disponiveis_para_atendimento_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipes_disponiveis_para_atendimento_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipes_disponiveis_para_atendimento_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipes_disponiveis_para_atendimento_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipes_disponiveis_para_atendimento_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipes_disponiveis_para_atendimento_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipes_disponiveis_para_atendimento_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipes_disponiveis_para_atendimento_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="equipes_disponiveis_para_atendimento_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 20) Facilidade nas Solicitações &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="facilidade_nas_solicitacoes_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="facilidade_nas_solicitacoes_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="facilidade_nas_solicitacoes_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="facilidade_nas_solicitacoes_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="facilidade_nas_solicitacoes_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="facilidade_nas_solicitacoes_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="facilidade_nas_solicitacoes_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="facilidade_nas_solicitacoes_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="facilidade_nas_solicitacoes_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 21) Qualidade dos Serviços &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_servicos_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_servicos_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_servicos_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_servicos_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_servicos_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_servicos_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_servicos_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_servicos_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="qualidade_dos_servicos_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 22) Rápido Atendimento ao Telefone &nbsp;</td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="rapido_atendimento_ao_telefone_importancia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="rapido_atendimento_ao_telefone_importancia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="rapido_atendimento_ao_telefone_importancia" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="rapido_atendimento_ao_telefone_satisfacao" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="rapido_atendimento_ao_telefone_satisfacao" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="rapido_atendimento_ao_telefone_satisfacao" VALUE="3"></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda ><INPUT TYPE="radio" NAME="rapido_atendimento_ao_telefone_concorrencia" VALUE="1"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="rapido_atendimento_ao_telefone_concorrencia" VALUE="2"></td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="rapido_atendimento_ao_telefone_concorrencia" VALUE="3"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 23) Fique a vontade para fazer suas críticas ou &nbsp; sugestões no espaço ao lado &nbsp;</td>
<td class=left_sem_borda colspan="11"><textarea name="criticas_sugestoes" rows=3 cols=54></textarea></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 24) Você compraria novamente da Projelmec? &nbsp;</td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="compraria_novamente_projelmec" VALUE="1">Sim</td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="compraria_novamente_projelmec" VALUE="2">Não</td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 25) Você recomendaria a Projelmec para outras &nbsp; empresas? &nbsp;</td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="recomendaria_projelmec" VALUE="1">Sim</td>
<td class=sem_borda ><INPUT TYPE="radio" NAME="recomendaria_projelmec" VALUE="2">Não</td>
</tr>

<tr><td> &nbsp; </td></tr>

<tr><td class=sem_borda colspan="12"><b><font size="3" color="#FF0000"> Dados Opcionais </font></b></td></tr>

<tr><td> &nbsp; </td></tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> Razão Social &nbsp;</td>
<td class=left_sem_borda colspan="11"><INPUT name="razao_social" size="55"> </td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> Nome &nbsp;</td>
<td class=left_sem_borda colspan="11"><INPUT name="nome" size="55"> </td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> Cargo &nbsp;</td>
<td class=left_sem_borda colspan="11"><INPUT name="cargo" size="55"> </td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> Telefone &nbsp;</td>
<td class=left_sem_borda colspan="11"><INPUT name="telefone" size="12"> </td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> Preenchido por &nbsp;</td>
<td class=left_sem_borda colspan="11"><INPUT name="preenchido" size="55"> </td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> Estado &nbsp;</td>
<td class=left_sem_borda colspan="11">
<select size="1" name="estado" >
<option value='Selecione' <? echo ($estado=='Selecione'?"SELECTED":""); ?> > Selecione </option>
<option value='AC' <? echo ($estado=='AC'?"SELECTED":""); ?> > AC </option>
<option value='AL' <? echo ($estado=='AL'?"SELECTED":""); ?> > AL </option>
<option value='AM' <? echo ($estado=='AM'?"SELECTED":""); ?> > AM </option>
<option value='AP' <? echo ($estado=='AP'?"SELECTED":""); ?> > AP </option>
<option value='BA' <? echo ($estado=='BA'?"SELECTED":""); ?> > BA </option>
<option value='CE' <? echo ($estado=='CE'?"SELECTED":""); ?> > CE </option>
<option value='DF' <? echo ($estado=='DF'?"SELECTED":""); ?> > DF </option>
<option value='ES' <? echo ($estado=='ES'?"SELECTED":""); ?> > ES </option>
<option value='GO' <? echo ($estado=='GO'?"SELECTED":""); ?> > GO </option>
<option value='MA' <? echo ($estado=='MA'?"SELECTED":""); ?> > MA </option>
<option value='MG' <? echo ($estado=='MG'?"SELECTED":""); ?> > MG </option>
<option value='MS' <? echo ($estado=='MS'?"SELECTED":""); ?> > MS </option>
<option value='MT' <? echo ($estado=='MT'?"SELECTED":""); ?> > MT </option>
<option value='PA' <? echo ($estado=='PA'?"SELECTED":""); ?> > PA </option>
<option value='PE' <? echo ($estado=='PE'?"SELECTED":""); ?> > PE </option>
<option value='PI' <? echo ($estado=='PI'?"SELECTED":""); ?> > PI </option>
<option value='PR' <? echo ($estado=='PR'?"SELECTED":""); ?> > PR </option>
<option value='RJ' <? echo ($estado=='RJ'?"SELECTED":""); ?> > RJ </option>
<option value='RN' <? echo ($estado=='RN'?"SELECTED":""); ?> > RN </option>
<option value='RO' <? echo ($estado=='RO'?"SELECTED":""); ?> > RO </option>
<option value='RR' <? echo ($estado=='RR'?"SELECTED":""); ?> > RR </option>
<option value='RS' <? echo ($estado=='RS'?"SELECTED":""); ?> > RS </option>
<option value='SC' <? echo ($estado=='SC'?"SELECTED":""); ?> > SC </option>
<option value='SE' <? echo ($estado=='SE'?"SELECTED":""); ?> > SE </option>
<option value='SP' <? echo ($estado=='AM'?"SELECTED":""); ?> > SP </option>
<option value='TO' <? echo ($estado=='TO'?"SELECTED":""); ?> > TO </option>
</select> </td>
</tr></td></table>

<BR>
<?/*<INPUT class="botao1" TYPE="button" NAME="concluir" VALUE="Concluir" onClick="javascript:Inserir()">*/?>

<input class="botao1" type="submit" name="concluir" value="Concluir">

</FORM>
<BR>
</td></tr></table>
</body>
</html>
