<?php

require("config.php");
require ("functions.php");
require ("lang/" . $Language . "/strings.php");
require ("themes/" . $Theme . "/theme.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<title><?php echo "Webmail Projelmec";?></title>
<link href="<?php echo "themes/" . $Theme;?>/main.css" rel="stylesheet" rev="stylesheet" type="text/css" media="all" title="The main style sheet">
</head>
<body bgcolor="#FFFFFF" text="#000000" link="#008080" vlink="#008080" alink="#00FFFF">
<!--Title Bar s-->
<h1><?php echo "Webmail Projelmec";?></h1>
<!--Title Bar e-->

<!--Login Form s-->
<form action="interface.php" method="post">
<table border="0" cellspacing="0" cellpadding="2" align="center">
<tr class="FormField">
	<td width="50%" align="left" valign="middle" nowrap><?php echo $PROMPT_Username;?></td>
	<td width="50%" align="right" valign="middle" nowrap><input type="text" name="PWC" size="21"></td>
</tr>
<tr><td></td><td></td></tr>
<?php if (!$POPHostname) { ?>
<tr class="FormField">
	<td width="50%" align="left" valign="middle" nowrap><?php echo $PROMPT_Domain;?></td>
	<td width="50%" align="right" valign="middle"><input type="text" name="DOM" size="21"></td>
</tr>
<tr><td></td><td></td></tr>
<?php } ?>
<tr class="FormField">
	<td width="50%" align="left" valign="middle" nowrap><?php echo $PROMPT_Password;?></td>
	<td width="50%" align="right" valign="middle"><input type="password" name="USN" size="21"></td>
</tr>
<tr><td></td><td></td></tr>
<?php if (!$POPHostname) { ?>
<tr class="FormField">
	<td width="50%" align="left" valign="middle" nowrap><?php echo $PROMPT_Server;?></td>
	<td width="50%" align="right" valign="middle"><input type="text" name="POP" size="21"></td>
</tr>
<tr><td></td><td></td></tr>
<?php } ?>
<tr><td></td><td class="FormField"><input type="submit" value="<?php echohtml ($BUTTON_Login);?>">&nbsp;<input type="reset" value="<?php echohtml ($BUTTON_Clear);?>"></td></tr>
</table>
</form>
<!--Login Form e-->
<?php if ($DemoMode) { ?>
<hr>
<p><?php echo $MISC_DemoWarning; ?></p>
<hr>
<?php } ?>
<hr>
<?php if (!$POPHostname) { ?>
<p><b><?php echo $MISC_SideNote; ?>:</b><?php echo $PM_EMail; ?></p>
<?php } ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td colspan="2" align="center" valign="bottom"></td>
</tr>
<tr>
	<td width="50%" align="left" valign="top">
		Desenvolvido por Informática Projelmec, 2014
	</td>
	<td width="50%" align="right" valign="top">
		<IMG alt="Projelmec" src="images/projelmec.gif" hspace="0" vspace="0" border="0" width="150" height="44"></A>
	</td>
</tr>
</table>
</body></html>
