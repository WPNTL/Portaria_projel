<?
###################################################
#                    ELTON                        #
#                                                 #
# Tela:         Função de datas					  #
# Rotina:       Retorna diferença entre duas datas#
# Desenvovedor: Elton Baroncello - elb            #
# e-mail 	  : eltonbaroncello@gmail.com		  #
# Criado:       08/03/2005                        #
# Atualizado:   00/00/0000                        #
#                                                 #
###################################################

# Variaveis de conecção com o banco de dados Base quente!
$HOST_DB = "localhost";
$USER_DB = "root";
$PASS_DB = "";
$DATA_DB = "t_n_orcamentos";



# Script de conecção com o banco de dados
$ICON = mysql_connect("$HOST_DB","$USER_DB","$PASS_DB");

if (!$ICON)
	{
	echo '<b><font color="#FF0000">Erro na conexão com o Servidor<br></font></b>';
	echo mysql_error();
	exit;
	}
# Script de conecção com a Base de Dados
else
	{
	// conecta com o banco de dados
	$DATABASE=mysql_select_db($DATA_DB,$ICON);
	if (!$DATABASE)
		{
		echo '<b><font color="#FF0000">Erro na conexão com o Banco de dados<br></font></b>';
		echo mysql_error();
		exit;
		}
    #Testes
    #Else
    #    {
    #    echo '<b><font color="#FF0000">Conecção Efetuada com Sucesso!<br></font></b>';
    #    }
	}
?>
