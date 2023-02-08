<? include "config_pesquisa.php"; ?>
<html>
<head>
<title> Cadastro Pesquisa Satisfação de Cliente </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
</head>
<body>
<?php

/* monta query em SQL para insercao  */
$sql = "INSERT INTO pesquisa_satisfacao
(
atendimento_dep_comercial_importancia, atendimento_dep_comercial_satisfacao, atendimento_dep_comercial_concorrencia,

atendimento_representante_importancia, atendimento_representante_satisfacao, atendimento_representante_concorrencia,

atendimento_dep_projeto_importancia, atendimento_dep_projeto_satisfacao, atendimento_dep_projeto_concorrencia,

atendimento_pcp_importancia, atendimento_pcp_satisfacao, atendimento_pcp_concorrencia,

atendimento_dep_expedicao_importancia, atendimento_dep_expedicao_satisfacao, atendimento_dep_expedicao_concorrencia,

assistencia_tecnica_importancia,assistencia_tecnica_satisfacao,assistencia_tecnica_concorrencia,

catalagos_tecnicos_importancia,catalagos_tecnicos_satisfacao,catalagos_tecnicos_concorrencia,

condicao_de_pagamento_importancia,condicao_de_pagamento_satisfacao,condicao_de_pagamento_concorrencia,

embalagem_importancia,embalagem_satisfacao,embalagem_concorrencia,

prazo_de_entrega_importancia,prazo_de_entrega_satisfacao,prazo_de_entrega_concorrencia,

preco_dos_produtos_importancia,preco_dos_produtos_satisfacao,preco_dos_produtos_concorrencia,

programa_de_selecao_importancia,programa_de_selecao_satisfacao,programa_de_selecao_concorrencia,

qualidade_dos_produtos_importancia,qualidade_dos_produtos_satisfacao,qualidade_dos_produtos_concorrencia,

seguranca_do_produto_importancia,seguranca_do_produto_satisfacao,seguranca_do_produto_concorrencia,

variedade_dos_produtos_importancia,variedade_dos_produtos_satisfacao,variedade_dos_produtos_concorrencia,

conduta_da_equipe_tecnica_importancia,conduta_da_equipe_tecnica_satisfacao,conduta_da_equipe_tecnica_concorrencia,

cumprimento_do_prazo_importancia,cumprimento_do_prazo_satisfacao,cumprimento_do_prazo_concorrencia,

equipe_com_confiabilidade_e_qualificacao_importancia,equipe_com_confiabilidade_e_qualificacao_satisfacao,
equipe_com_confiabilidade_e_qualificacao_concorrencia,

equipes_disponiveis_para_atendimento_importancia,equipes_disponiveis_para_atendimento_satisfacao,
equipes_disponiveis_para_atendimento_concorrencia,

facilidade_nas_solicitacoes_importancia,facilidade_nas_solicitacoes_satisfacao,facilidade_nas_solicitacoes_concorrencia,

qualidade_dos_servicos_importancia,qualidade_dos_servicos_satisfacao,qualidade_dos_servicos_concorrencia,

rapido_atendimento_ao_telefone_importancia,rapido_atendimento_ao_telefone_satisfacao,rapido_atendimento_ao_telefone_concorrencia,

criticas_sugestoes, compraria_novamente_projelmec, recomendaria_projelmec, razao_social, nome, cargo, telefone, preenchido, estado
)
VALUES
( 
  '$atendimento_dep_comercial_importancia',
  '$atendimento_dep_comercial_satisfacao',
  '$atendimento_dep_comercial_concorrencia',

  '$atendimento_representante_importancia',
  '$atendimento_representante_satisfacao',
  '$atendimento_representante_concorrencia',

  '$atendimento_dep_projeto_importancia',
  '$atendimento_dep_projeto_satisfacao',
  '$atendimento_dep_projeto_concorrencia',

  '$atendimento_pcp_importancia',
  '$atendimento_pcp_satisfacao',
  '$atendimento_pcp_concorrencia',

  '$atendimento_dep_expedicao_importancia',
  '$atendimento_dep_expedicao_satisfacao',
  '$atendimento_dep_expedicao_concorrencia',

  '$assistencia_tecnica_importancia',
  '$assistencia_tecnica_satisfacao',
  '$assistencia_tecnica_concorrencia',

  '$catalagos_tecnicos_importancia',
  '$catalagos_tecnicos_satisfacao',
  '$catalagos_tecnicos_concorrencia',

  '$condicao_de_pagamento_importancia',
  '$condicao_de_pagamento_satisfacao',
  '$condicao_de_pagamento_concorrencia',

  '$embalagem_importancia',
  '$embalagem_satisfacao',
  '$embalagem_concorrencia',

  '$prazo_de_entrega_importancia',
  '$prazo_de_entrega_satisfacao',
  '$prazo_de_entrega_concorrencia',

  '$preco_dos_produtos_importancia',
  '$preco_dos_produtos_satisfacao',
  '$preco_dos_produtos_concorrencia',

  '$programa_de_selecao_importancia',
  '$programa_de_selecao_satisfacao',
  '$programa_de_selecao_concorrencia',

  '$qualidade_dos_produtos_importancia',
  '$qualidade_dos_produtos_satisfacao',
  '$qualidade_dos_produtos_concorrencia',

  '$seguranca_do_produto_importancia',
  '$seguranca_do_produto_satisfacao',
  '$seguranca_do_produto_concorrencia',

  '$variedade_dos_produtos_importancia',
  '$variedade_dos_produtos_satisfacao',
  '$variedade_dos_produtos_concorrencia',

  '$conduta_da_equipe_tecnica_importancia',
  '$conduta_da_equipe_tecnica_satisfacao',
  '$conduta_da_equipe_tecnica_concorrencia',

  '$cumprimento_do_prazo_importancia',
  '$cumprimento_do_prazo_satisfacao',
  '$cumprimento_do_prazo_concorrencia',

  '$equipe_com_confiabilidade_e_qualificacao_importancia',
  '$equipe_com_confiabilidade_e_qualificacao_satisfacao',
  '$equipe_com_confiabilidade_e_qualificacao_concorrencia',

  '$equipes_disponiveis_para_atendimento_importancia',
  '$equipes_disponiveis_para_atendimento_satisfacao',
  '$equipes_disponiveis_para_atendimento_concorrencia',

  '$facilidade_nas_solicitacoes_importancia',
  '$facilidade_nas_solicitacoes_satisfacao',
  '$facilidade_nas_solicitacoes_concorrencia',

  '$qualidade_dos_servicos_importancia',
  '$qualidade_dos_servicos_satisfacao',
  '$qualidade_dos_servicos_concorrencia',

  '$rapido_atendimento_ao_telefone_importancia',
  '$rapido_atendimento_ao_telefone_satisfacao',
  '$rapido_atendimento_ao_telefone_concorrencia',

  '$criticas_sugestoes', '$compraria_novamente_projelmec', '$recomendaria_projelmec', '$razao_social', '$nome' , '$cargo', '$telefone', '$preenchido', '$estado'
  
)";


$sql = mysql_query($sql) or die ("Houve erro na gravação dos dados.");  ?>

<table class=titulo width=50% align="center" height="25">
<tr><td align="center"> CADASTRADO COM SUCESSO! </tr></td>
<tr><td align="center"> <input class="botao1" type="button" value="Fechar Janela " onclick="javascript:window.close()"> </tr></td></table>

</body>
</html>
