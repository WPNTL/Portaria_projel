<?
# Variaveis de conecção com o banco de dados Base quente!
$HOST_DB = "mysql08.kinghost.net";
$USER_DB = "projelmec";
$PASS_DB = "400654";
$DATA_DB = "projelmec";



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
