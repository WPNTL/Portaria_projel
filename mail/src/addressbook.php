<?php

/**
 * addressbook.php
 *
 * Manage personal address book.
 *
 * @copyright 1999-2010 The SquirrelMail Project Team
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version $Id: addressbook.php 13893 2010-01-25 02:47:41Z pdontthink $
 * @package squirrelmail
 * @subpackage addressbook
 */

/** This is the addressbook page */
define('PAGE_NAME', 'addressbook');

/**
 * Path for SquirrelMail required files.
 * @ignore
 */
define('SM_PATH','../');

/** SquirrelMail required files. */
require_once(SM_PATH . 'include/validate.php');
require_once(SM_PATH . 'functions/global.php');
require_once(SM_PATH . 'functions/display_messages.php');
require_once(SM_PATH . 'functions/addressbook.php');
require_once(SM_PATH . 'functions/strings.php');
require_once(SM_PATH . 'functions/html.php');
require_once(SM_PATH . 'functions/forms.php');
require_once(SM_PATH . 'plugins/abook_group/handler.class.php');

/** lets get the global vars we may need */
if (!sqgetGlobalVar('smtoken',$submitted_token, SQ_POST)) {
    $submitted_token = '';
}
sqgetGlobalVar('key',       $key,           SQ_COOKIE);

sqgetGlobalVar('username',  $username,      SQ_SESSION);
sqgetGlobalVar('onetimepad',$onetimepad,    SQ_SESSION);
sqgetGlobalVar('base_uri',  $base_uri,      SQ_SESSION);
sqgetGlobalVar('delimiter', $delimiter,     SQ_SESSION);

/* From the address form */
sqgetGlobalVar('addaddr',    $addaddr,    SQ_POST);
sqgetGlobalVar('editaddr',   $editaddr,   SQ_POST);
sqgetGlobalVar('deladdr',    $deladdr,    SQ_POST);
sqgetGlobalVar('compose_to', $compose_to, SQ_POST);
sqgetGlobalVar('sel',        $sel,        SQ_POST);
// renumber $sel array
if (!empty($sel)) $sel = array_merge($sel, array());
sqgetGlobalVar('oldnick',    $oldnick,    SQ_POST);
sqgetGlobalVar('backend',    $backend,    SQ_POST);
sqgetGlobalVar('doedit',     $doedit,     SQ_POST);

/* Get sorting order */
$abook_sort_order = get_abook_sort();

/**
 * Make an input field
 * @param string $label
 * @param string $field
 * @param string $name
 * @param string $size
 * @param array $values
 * @param string $add
 */
function addressbook_inp_field($label, $field, $name, $size, $values, $add) {
    global $color;
    $value = ( isset($values[$field]) ? $values[$field] : '');
    $fieFull = "addaddr[$field]";

    $td_str = "<input class='addr$field' type='text' name='$fieFull' value='$value' size='$size'>" . $add;
    /*$td_str = addInput($name.'['.$field.']', $value, $size)
        . $add ;*/

    return html_tag( 'tr' ,
            html_tag( 'td', $label . ':', 'right', $color[4]) .
            html_tag( 'td', $td_str, 'left', $color[4])
            )
        . "\n";
}

/**
 * Output form to add and modify address datas
 */
function address_form($name, $submittext, $values = array()) {
    global $color, $squirrelmail_language;

    if ($squirrelmail_language == 'ja_JP') {
        echo html_tag( 'table',
                addressbook_inp_field(_("Nickname"),     'nickname', $name, 15, $values,
                    ' <small>' . _("Must be unique and no special characters") . '</small>') .
                addressbook_inp_field(_("E-mail address"),  'email', $name, 45, $values, '') .
                addressbook_inp_field(_("Last name"),    'lastname', $name, 45, $values, '') .
                addressbook_inp_field(_("First name"),  'firstname', $name, 45, $values, '') .
                addressbook_inp_field(_("Additional info"), 'label', $name, 45, $values, '') .
                list_writable_backends($name) .
                html_tag( 'tr',
                    html_tag( 'td',
                        addSubmit($submittext, $name.'[SUBMIT]'),
                        'center', $color[4], 'colspan="2"')
                    )
                , 'center', '', 'border="0" cellpadding="1" width="90%"') ."\n";
    } else {
        if(isset($_GET['editContato']))
            $submittext = _("Update address");
        
        echo html_tag( 'table',
                addressbook_inp_field(_("Nickname"),     'nickname', $name, 15, $values,
                    ' <small>' . _("Must be unique and no special characters") . '</small>') .
                addressbook_inp_field(_("E-mail address"),  'email', $name, 45, $values, '') .
                addressbook_inp_field(_("First name"),  'firstname', $name, 45, $values, '') .
                addressbook_inp_field(_("Last name"),    'lastname', $name, 45, $values, '') .
                addressbook_inp_field(_("Additional info"), 'label', $name, 45, $values, '') .
                list_writable_backends($name) .
                html_tag( 'tr',
                    html_tag( 'td', //$('input[name=addaddr[nickname]]').val();
                        "<input  class='btnContact' onclick=" . ((isset($_GET['editContato']))? ' editContact()': 'addContact()') . " type='button' value='$submittext'>",
                         //addSubmit($submittext, $name.'[SUBMIT]') ,
                        'right', $color[4], 'colspan="2"')
                    )
                , 'center', '', 'border="0" cellpadding="1" width="90%"') ."\n";
    }
}


/**
 * Provides list of writeable backends.
 * Works only when address is added ($name='addaddr')
 * @param string $name name of form
 * @return string html formated backend field (select or hidden)
 */
function list_writable_backends($name) {
    global $color, $abook;
    if ( $name != 'addaddr' ) { return; }
    $writeable_abook = 1;
    if ( $abook->numbackends > 1 ) {
        $backends = $abook->get_backend_list();
        $writeable_abooks=array();
        while (list($undef,$v) = each($backends)) {
            if ($v->writeable) {
                // add each backend to array
                $writeable_abooks[$v->bnum]=$v->sname;
                // save backend number
                $writeable_abook=$v->bnum;
            }
        }
        if (count($writeable_abooks)>1) {
            // we have more than one writeable backend
            $ret=addSelect('backend',$writeable_abooks,null,true);
            return html_tag( 'tr',
                             html_tag( 'td', _("Add to:"),'right', $color[4] ) .
                             html_tag( 'td', $ret, 'left', $color[4] )) . "\n";
        }
    }
    // Only one backend exists or is writeable.
    return html_tag( 'tr',
                     html_tag( 'td',
                               addHidden('backend', $writeable_abook),
                               'center', $color[4], 'colspan="2"')) . "\n";
}

// Create page header before addressbook_init in order to
// display error messages correctly, unless we might be
// redirecting the browser to the compose page. 
//
/*if ((empty($compose_to)) || sizeof($sel) < 1)
    displayPageHeader($color, 'None');*/

/* Open addressbook, with error messages on but without LDAP (the *
 * second "true"). Don't need LDAP here anyway                    */
$abook = addressbook_init(true, true);
if($abook->localbackend == 0) {
    plain_error_message(
            _("No personal address book is defined. Contact administrator."),
            $color);
    exit();
}

$defdata   = array();
$formerror = '';
$abortform = false;
$showaddrlist = true;
$defselected  = array();
$form_url = 'addressbook.php';


/* Handle user's actions */
if(sqgetGlobalVar('REQUEST_METHOD', $req_method, SQ_SERVER) && $req_method == 'POST') {

    // first, validate security token
    sm_validate_security_token($submitted_token, 3600, TRUE);

    /**************************************************
     * Add new address                                *
     **************************************************/
    if (isset($addaddr)) {
        if (isset($backend)) {
            $r = $abook->add($addaddr, $backend);
        } else {
            $r = $abook->add($addaddr, $abook->localbackend);
        }

        /* Handle error messages */
        if (!$r) {
            /* Remove backend name from error string */
            $errstr = $abook->error;
            $errstr = preg_replace('/^\[.*\] */', '', $errstr);

            $formerror = $errstr;
            $showaddrlist = false;
            $defdata = $addaddr;
        }
    } else {

        /************************************************
         * Delete address(es)                           *
         ************************************************/
        if ((!empty($deladdr)) && sizeof($sel) > 0) {
            $orig_sel = $sel;
            sort($sel);

            /* The selected addresses are identidied by "backend:nickname". *
             * Sort the list and process one backend at the time            */
            $prevback  = -1;
            $subsel    = array();
            $delfailed = false;

            for ($i = 0 ; (($i < sizeof($sel)) && !$delfailed) ; $i++) {
                list($sbackend, $snick) = explode(':', $sel[$i], 2);

                /* When we get to a new backend, process addresses in *
                 * previous one.                                      */
                if ($prevback != $sbackend && $prevback != -1) {

                    $r = $abook->remove($subsel, $prevback);
                    if (!$r) {
                        $formerror = $abook->error;
                        $i = sizeof($sel);
                        $delfailed = true;
                        break;
                    }
                    $subsel   = array();
                }

                /* Queue for processing */
                array_push($subsel, $snick);
                $prevback = $sbackend;
            }

            if (!$delfailed) {
                $r = $abook->remove($subsel, $prevback);
                if (!$r) { /* Handle errors */
                    $formerror = $abook->error;
                    $delfailed = true;
                }
            }

            if ($delfailed) {
                $showaddrlist = true;
                $defselected  = $orig_sel;
            }

        /************************************************
         * Compose to selected address(es)              *
         ************************************************/
        } else if ((!empty($compose_to)) && sizeof($sel) > 0) {
            $orig_sel = $sel;
            sort($sel);

            // The selected addresses are identidied by "backend:nickname"
            $lookup_failed = false;
            $send_to = '';

            for ($i = 0 ; (($i < sizeof($sel)) && !$lookup_failed) ; $i++) {
                list($sbackend, $snick) = explode(':', $sel[$i], 2);

                $data = $abook->lookup($snick, $sbackend);

                if (!$data) {
                    $formerror = $abook->error;
                    $lookup_failed = true;
                    break;
                } else {
                    $addr = $abook->full_address($data);
                    if (!empty($addr))
                        $send_to .= $addr . ', ';
                }
            }


            if ($lookup_failed || empty($send_to)) {
                $showaddrlist = true;
                $defselected  = $sel;

                // we skipped the page header above for this functionality, so add it here
                //displayPageHeader($color, 'None');
            }


            // send off to compose screen
            else {
                $send_to = trim($send_to, ', ');
                header('Location: ' . $base_uri . 'src/compose.php?send_to=' . rawurlencode($send_to));
                exit;
            }

        } else {

            /***********************************************
             * Update/modify address                       *
             ***********************************************/
            if (!empty($editaddr)) {                
                /* Stage one: Copy data into form */
                if (isset($sel) && sizeof($sel) > 0) {
                    if(sizeof($sel) > 1) {
                        $formerror = _("You can only edit one address at the time");
                        $showaddrlist = true;
                        $defselected = $sel;
                    } else {
                        $abortform = true;
                        list($ebackend, $enick) = explode(':', $sel[0], 2);
                        $olddata = $abook->lookup($enick, $ebackend);

                        /* Display the "new address" form */
                        echo addForm($form_url, 'post', '', '', '', '', TRUE).
                            html_tag( 'table',
                                    html_tag( 'tr',
                                        html_tag( 'td',
                                            "\n". '<strong>' . _("Update address") . '</strong>' ."\n",
                                            'center', $color[0] )
                                        ),
                                    'center', '', 'width="100%" ' );
                        address_form("editaddr", _("Update address"), $olddata);
                        echo addHidden('oldnick', $olddata['nickname']).
                            addHidden('backend', $olddata['backend']).
                            addHidden('doedit', '1').
                            '</form>';
                    }
                } elseif ($doedit == 1) {
                    /* Stage two: Write new data */
                    $newdata = $editaddr;                    
                    $r = $abook->modify($oldnick, $newdata, $backend);
					global	$username, $dsn_pear;
					if($newdata['nickname'] != $oldnick){
						$obj = new HandlerGroup($username, $dsn_pear);
						$obj->updateNickname($oldnick,$newdata['nickname']);
					}		
                    /* Handle error messages */
                    if (!$r) {
                        /* Display error */
                        echo html_tag( 'table',
                                 html_tag( 'tr',
                                     html_tag( 'td',
                                               "\n". '<strong><font color="' . $color[2] .
                                               '">' . _("ERROR") . ': ' . htmlspecialchars($abook->error) . '</font></strong>' ."\n",
                                               'center' )
                                           ),
                                       'center', '', 'width="100%"' );

                        /* Display the "new address" form again */
                        echo addForm($form_url, 'post', '', '', '', '', TRUE).
                            html_tag( 'table',
                                html_tag( 'tr',
                                    html_tag( 'td',
                                              "\n". '<strong>' . _("Update address") . '</strong>' ."\n",
                                              'center', $color[0] )
                                          ),
                                      'center', '', 'width="100%"' );
                        address_form("editaddr", _("Update address"), $newdata);
                        echo 
                            addHidden('oldnick', $oldnick).
                            addHidden('backend', $backend).
                            addHidden('doedit',  '1').
                            "\n" . '</form>';
                        $abortform = true;
                    }
                } else {
                    /**
                     * $editaddr is set, but $sel (address selection in address listing) 
                     * and $doedit (address edit form) are not set. 
                     * Assume that user clicked on "Edit address" without selecting any address.
                     */
                    $formerror = _("Please select address that you want to edit");
                    $showaddrlist = true;
                } /* end of edit stage detection */
            } /* !empty($editaddr)                     - Update/modify address */
        } /* (!empty($deladdr)) && sizeof($sel) > 0    - Delete address(es)
          or (!empty($compose_to)) && sizeof($sel) > 0 - Compose to address(es) */
    } /* !empty($addaddr['nickname'])                  - Add new address */

    // Some times we end output before forms are printed
    if($abortform) {
        echo "</body></html>\n";
        exit();
    }
}


/* =================================================================== *
 * The following is only executed on a GET request, or on a POST when  *
 * a user is added, or when "delete" or "modify" was successful.       *
 * =================================================================== */

/* Display error messages */
if (!empty($formerror)) {
    echo html_tag( 'table',
            html_tag( 'tr',
                html_tag( 'td',
                    "\n". '<br /><strong><font color="' . $color[2] .
                    '">' . _("ERROR") . ': ' . htmlspecialchars($formerror) . '</font></strong>' ."\n",
                    'center' )
                ),
            'center', '', 'width="100%"' );
	exit;
}


/* Display the address management part */
if (isset($_GET['showListContact'])) {
    /* Get and sort address list */
    $alist = $abook->list_addr();
    if(!is_array($alist)) {
        $abook->error = htmlspecialchars($abook->error);
        plain_error_message($abook->error, $color);
        exit;
    }

    usort($alist,'alistcmp');

    // filter listing as needed
    $hook_return = do_hook_function('abook_list_filter', $alist);
    if (!empty($hook_return)) $alist = $hook_return;

    $prevbackend = -1;
    $headerprinted = false;

    $compose_to_in_new_window_javascript = ' onclick="var send_to = \'\'; var f = document.forms.length; var i = 0; var grab_next_hidden = \'\'; while (i < f) { var e = document.forms[i].elements.length; var j = 0; while (j < e) { if (document.forms[i].elements[j].type == \'checkbox\' && document.forms[i].elements[j].checked) { var pos = document.forms[i].elements[j].value.indexOf(\':\'); if (pos >= 1) { grab_next_hidden = document.forms[i].elements[j].value; } } else if (document.forms[i].elements[j].type == \'hidden\' && grab_next_hidden == document.forms[i].elements[j].name) { if (send_to != \'\') { send_to += \', \'; } send_to += document.forms[i].elements[j].value; } j++; } i++; } if (send_to != \'\') { comp_in_new(\''. $base_uri . 'src/compose.php?send_to=\' + send_to); } return false;"';

    //echo html_tag( 'div', '<a href="#AddAddress">' . _("Add address") . '</a>', 'center' ) . "\n";

    /* List addresses */
	if(!isset($_GET['part'])){
		$piece = 0;
	}else{
		if(is_numeric($_GET['part'])){
			$piece = $_GET['part'];
			$pieceOrig = $_GET['part'];
		}
	}
    if (count($alist) > 0) {
        echo addForm($form_url, 'post', 'address_book_form', '', '', '', TRUE);
        if ($abook->add_extra_field) {
            $abook_fields = 6;
        } else {
            $abook_fields = 5;
        }

		if(count($alist) > 100){
			$array_pagination = array_chunk($alist,100,true);
			global $boolPagination;
			$boolPagination = true;
		}
		
		if(!is_null($array_pagination)){
			$alist = $array_pagination[$piece];
		}		
		
        while(list($undef,$row) = each($alist)) {

            /* New table header for each backend */
            if($prevbackend != $row['backend']) {
                

                $line = 0;
                $headerprinted = true;
            } /* End of header */

            $prevbackend = $row['backend'];

            /* Print one row, with alternating color */
            if ($line % 2) {
                $tr_bgcolor = $color[12];
            } else {
                $tr_bgcolor = $color[4];
            }

            // Print special message if that's what we have
            // here instead of an actual address entry
            if (!empty($row['special_message'])) {
                echo html_tag('tr', '', '', $tr_bgcolor)
                   . html_tag('td', $row['special_message'], 'center', '', 'colspan="5"')
                   . "</tr>\n";
                $line++;
                continue;
            }

            /* Check if this user is selected */
            $selected = in_array($row['backend'] . ':' . $row['nickname'], $defselected);

            if ($squirrelmail_language == 'ja_JP') {
                echo html_tag( 'tr', '', '', $tr_bgcolor);
                if ($abook->backends[$row['backend']]->writeable) {
                    echo html_tag( 'td',
                            '<small>' .
                            addCheckBox('sel[' . $count . ']', $selected, $row['backend'].':'.$row['nickname'], ' id="' . $row['backend'] . '_' . urlencode($row['nickname']) . '"').
                            '</small>' ,
                            'center', '', 'valign="top" width="1%"' );
                } else {
                    echo html_tag( 'td',
                            '&nbsp;' ,
                            'center', '', 'valign="top" width="1%"' );
                }
                echo html_tag( 'td', '&nbsp;<label for="' . $row['backend'] . '_' . urlencode($row['nickname']) . '">' . htmlspecialchars($row['nickname']) . '</label>&nbsp;', 'left', '', 'valign="top" width="10%" nowrap' ) . 
                    html_tag( 'td', '&nbsp;<label for="' . $row['backend'] . '_' . urlencode($row['nickname']) . '">' . htmlspecialchars($row['lastname']) . ' ' . htmlspecialchars($row['firstname']) . '</label>&nbsp;', 'left', '', 'valign="top" width="10%" nowrap' ) .
                    html_tag( 'td', '', 'left', '', 'valign="top" width="10%" nowrap' ) . '&nbsp;';
            }
            
            $email = $abook->full_address($row);
            
            echo  '<div class="contactPerson" onclick="showInfoContact(this)" onmouseout=$(this).removeClass("backContact") onmousemove="changeBackContact(this)">'
            . addCheckBox('sel[' . $count . ']', $selected, $row['backend'] . ':' . utf8_decode($row['nickname']), ' id="' . utf8_decode($row['backend']) . '_' . utf8_decode($row['nickname']) . '"')
            . utf8_decode(htmlspecialchars($row['name'])) //
            . '<input type="hidden" value="' . utf8_decode(htmlspecialchars($row['firstname'])) . '" class="firstname">'
            . '<input type="hidden" value="' . utf8_decode(htmlspecialchars($row['lastname'])) . '" class="lastname">'
            . '<input type="hidden" value="' . utf8_decode($row['nickname']) . '" class="nick">'
            . '<input type="hidden" value="' . utf8_decode($row['label']) . '" class="extra">'
            . '<input type="hidden" value="' . utf8_decode($row['email']) . '" class="email">'
            . '</div></ br>';
           
            echo "</tr>\n";
            $line++;
            $count++;
        }
		$totalPage = count($array_pagination);
		$piece++;
		if($piece == 1){
			$prev = '';
			$next = "<a title=\"" . _('Next')  . "\" onclick=loadAllContacts($piece)>></a>";
		}else{
			if($piece == $totalPage){
				$next = '';
				$p = --$piece - 1;
    	        $prev = "<a title=\"" . _('Previous')  . "\"  onclick=loadAllContacts($p)><</a>";	
			}else{
				$p = --$piece - 1;
				$n = ++$piece;
				$prev = "<a title=\"" . _('Previous')  . "\" onclick=loadAllContacts($p)><</a>"; 
				$next = "<a title=\"" . _('Next')  . "\" onclick=loadAllContacts($n)>></a>"; 
			}
		}
		$selectPage = '<select id=\"selectPageP\">';
		for($i = 0; $i < ($totalPage - 1); $i++){
			$checked = ($i == $pieceOrig) ? 'selected=selected':'';
			$selectPage .= "<option $checked  value=\"$i\">" . ($i + 1) . "</option>";
		}
	    $selectPage .= '</select>';
	
		$lblTotal = $totalPage - 1;
		global $boolPagination;
		if($lblTotal > 1)
			$strPage = _('pages');
		else
			$strPage = _('page');

		if($boolPagination){
			echo "<script>$('.paginationCont').html('<b>Total: $lblTotal $strPage </b>  $prev $selectPage $next  ');</script>";
		}
     
        echo '</table></form>';
    }
} /* end of addresslist */



do_hook('addressbook_bottom');
do_hook('addressbook_import_export');
if($_GET['import'] || $_GET['export']){
    ?>
    </body></html>
    <?php
    exit;
}
/* Display the "new address" form */
if(isset($_GET['showForm'])){
    addForm($form_url, 'post', 'f_add', '', '', '', TRUE).
    html_tag( 'table',  
        html_tag( 'tr',
            html_tag( 'td', "\n". '<strong>' . sprintf(_("Add to %s"), $abook->localbackendname) . '</strong>' . "\n",
                'right', $color[0]
                )
            )
        , 'right', '', 'width="80%"' ) ."\n";
    address_form('addaddr', _("Save"), $defdata);
    echo "</form>\n";
}
if(isset($_GET['editContato'])){
?>
<script>
    $(function(){ 
        $('.ContInfo .addrnickname').val($('.nickContact').text());
        $('.ContInfo .addremail').val($('.emailContact').text());
        $('.ContInfo .addrfirstname').val($('.fnContact').text());
        $('.ContInfo .addrlastname').val($('.lnContact').text());
        $('.ContInfo .addrlabel').val($('.infoContact').text());        
	
    });
</script>

<?php
}
/* Add hook for anything that wants on the bottom */


?>
<script src="../js/jquery.form.js"></script>
<script>
 $(function(){   
	$("#selectPageP").change(
		function(){
			loadAllContacts($(this).val());
		}
	);
    $('.addremail').change(
		function(){
			if(!isValidEmail($(this).val())){		
				$(this).addClass("errorEmailField");
				$(this).attr('title','<?php echo _('Invalid email address, if you want you can use it');?>');
			}else{
                $(this).removeClass("errorEmailField");
				$(this).attr('title','');
			}
		}
    );
    moveContacts();
 });
</script>
</body></html>
