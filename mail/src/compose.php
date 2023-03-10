	<?php

	/**
	 * compose.php
	 *
	 * This code sends a mail.
	 *
	 * There are 4 modes of operation:
	 *    - Start new mail
	 *    - Add an attachment
	 *    - Send mail
	 *    - Save As Draft
	 *
	 * @copyright 1999-2010 The SquirrelMail Project Team
	 * @license http://opensource.org/licenses/gpl-license.php GNU Public License 
	 * @version $Id: compose.php 13968 2010-07-21 19:19:47Z pdontthink $
	 * @package squirrelmail
	 */

	/** This is the compose page */
	define('PAGE_NAME', 'compose');

	/**
	 * Path for SquirrelMail required files.
	 *
	 * @ignore
	 */
	define('SM_PATH','../');

	/* SquirrelMail required files. */ 
	require_once(SM_PATH . 'include/validate.php');
	require_once(SM_PATH . 'functions/global.php');
	require_once(SM_PATH . 'functions/imap.php');
	require_once(SM_PATH . 'functions/utils.php');
	require_once(SM_PATH . 'functions/date.php');
	require_once(SM_PATH . 'functions/mime.php');
	require_once(SM_PATH . 'functions/plugin.php');
	require_once(SM_PATH . 'functions/display_messages.php');
	require_once(SM_PATH . 'class/deliver/Deliver.class.php');
	require_once(SM_PATH . 'functions/addressbook.php');
	require_once(SM_PATH . 'functions/forms.php');
	require_once(SM_PATH . 'functions/identity.php');

	/* --------------------- Get globals ------------------------------------- */
	/** COOKIE VARS */
	sqgetGlobalVar('key',       $key,           SQ_COOKIE);

	/** SESSION VARS */
	sqgetGlobalVar('username',  $username,      SQ_SESSION);
	sqgetGlobalVar('onetimepad',$onetimepad,    SQ_SESSION);
	sqgetGlobalVar('base_uri',  $base_uri,      SQ_SESSION);
	sqgetGlobalVar('delimiter', $delimiter,     SQ_SESSION);

	sqgetGlobalVar('composesession',    $composesession,    SQ_SESSION);
	sqgetGlobalVar('compose_messages',  $compose_messages,  SQ_SESSION);

	// compose_messages only useful in SESSION when a forward-as-attachment 
	// has been preconstructed for us and passed in via that mechanism; once 
	// we have it, we can clear it from the SESSION
	sqsession_unregister('compose_messages');

	/** SESSION/POST/GET VARS */
	sqgetGlobalVar('send', $send, SQ_POST);
	// Send can only be achieved by setting $_POST var. If Send = true then
	// retrieve other form fields from $_POST
	if (isset($send) && $send) {
	    $SQ_GLOBAL = SQ_POST;
	} else {
	    $SQ_GLOBAL = SQ_FORM;
	}
	sqgetGlobalVar('smaction',$action, $SQ_GLOBAL);
	if (!sqgetGlobalVar('smtoken',$submitted_token, $SQ_GLOBAL)) {
	    $submitted_token = '';
	}
	sqgetGlobalVar('session',$session, $SQ_GLOBAL);
	sqgetGlobalVar('mailbox',$mailbox, $SQ_GLOBAL);
	if ( !sqgetGlobalVar('identity',$identity, $SQ_GLOBAL) ) {
	    $identity = 0;
	}
	sqgetGlobalVar('send_to',$send_to, $SQ_GLOBAL);
	sqgetGlobalVar('send_to_cc',$send_to_cc, $SQ_GLOBAL);
	sqgetGlobalVar('send_to_bcc',$send_to_bcc, $SQ_GLOBAL);
	sqgetGlobalVar('subject',$subject, $SQ_GLOBAL);
	sqgetGlobalVar('body',$body, $SQ_GLOBAL);
	sqgetGlobalVar('mailprio',$mailprio, $SQ_GLOBAL);
	sqgetGlobalVar('request_mdn',$request_mdn, $SQ_GLOBAL);
	sqgetGlobalVar('request_dr',$request_dr, $SQ_GLOBAL);
	sqgetGlobalVar('html_addr_search',$html_addr_search, SQ_FORM);
	sqgetGlobalVar('mail_sent',$mail_sent, SQ_FORM);
	sqgetGlobalVar('passed_id',$passed_id, $SQ_GLOBAL);
	sqgetGlobalVar('passed_ent_id',$passed_ent_id, $SQ_GLOBAL);

	sqgetGlobalVar('attach',$attach, SQ_POST);
	sqgetGlobalVar('draft',$draft, SQ_POST);
	sqgetGlobalVar('draft_id',$draft_id, $SQ_GLOBAL);
	sqgetGlobalVar('ent_num',$ent_num, $SQ_GLOBAL);
	sqgetGlobalVar('saved_draft',$saved_draft, SQ_FORM);
	
	$subject = utf8_decode($subject);	

	if ( sqgetGlobalVar('delete_draft',$delete_draft) ) {
	    $delete_draft = (int)$delete_draft;
	}

	if ( sqgetGlobalVar('startMessage',$startMessage) ) {
	    $startMessage = (int)$startMessage;
	} else {
	    $startMessage = 1;
	}

	/** POST VARS */
	sqgetGlobalVar('sigappend',             $sigappend,             SQ_POST);
	sqgetGlobalVar('from_htmladdr_search',  $from_htmladdr_search,  SQ_POST);
	sqgetGlobalVar('addr_search_done',      $html_addr_search_done, SQ_POST);
	sqgetGlobalVar('send_to_search',        $send_to_search,        SQ_POST);
	sqgetGlobalVar('do_delete',             $do_delete,             SQ_POST);
	sqgetGlobalVar('delete',                $delete,                SQ_POST);
	sqgetGlobalVar('attachments',           $attachments,           SQ_POST);
	$attachments = utf8_decode($attachments);

	// Not used any more, but left for posterity
	//sqgetGlobalVar('restoremessages',       $restoremessages,       SQ_POST);
	if ( sqgetGlobalVar('return', $temp, SQ_POST) ) {
	    $html_addr_search_done = 'Use Addresses';
	}

	/** GET VARS */
	// (none)

	/**
	 * Here we decode the data passed in from mailto.php.
	 */
	if ( sqgetGlobalVar('mailtodata', $mailtodata, SQ_GET) ) {
	    $trtable = array('to'       => 'send_to',
			 'cc'           => 'send_to_cc',
			 'bcc'          => 'send_to_bcc',
			 'body'         => 'body',
			 'subject'      => 'subject');
	    $mtdata = unserialize($mailtodata);

	    foreach ($trtable as $f => $t) {
		if ( !empty($mtdata[$f]) ) {
		    $$t = $mtdata[$f];
		}
	    }
	    unset($mailtodata,$mtdata, $trtable);
	}

	/* Location (For HTTP 1.1 Header("Location: ...") redirects) */
	$location = get_location();
	/* Identities (fetch only once) */
	$idents = get_identities();
	?>

	<?php
	/* --------------------- Specific Functions ------------------------------ */

	function replyAllString($header) {
	    global $include_self_reply_all, $username, $data_dir;
	    $excl_ar = array();
	    /**
	     * 1) Remove the addresses we'll be sending the message 'to'
	     */
	    $url_replytoall_avoid_addrs = '';
	    if (isset($header->reply_to)) {
		$excl_ar = $header->getAddr_a('reply_to');
	    }
	    /**
	     * 2) Remove our identities from the CC list (they still can be in the
	     * TO list) only if $include_self_reply_all is turned off
	     */
	    if (!$include_self_reply_all) {
		global $idents;
		foreach($idents as $id) {
		    $excl_ar[strtolower(trim($id['email_address']))] = '';
		}
	    }

	    /**
	     * 3) get the addresses.
	     */
	    $url_replytoall_ar = $header->getAddr_a(array('to','cc'), $excl_ar);

	    /**
	     * 4) generate the string.
	     */
	    $url_replytoallcc = '';
	    foreach( $url_replytoall_ar as $email => $personal) {
		if ($personal) {
		    // always quote personal name (can't just quote it if
		    // it contains a comma separator, since it might still
		    // be encoded)
		    $url_replytoallcc .= ", \"$personal\" <$email>";
		} else {
		    $url_replytoallcc .= ', '. $email;
		}
	    }
	    $url_replytoallcc = substr($url_replytoallcc,2);

	    return $url_replytoallcc;
	}

	function getReplyCitation($orig_from, $orig_date) {
	    global $reply_citation_style, $reply_citation_start, $reply_citation_end;

	    // FIXME: why object is rewritten with string.

	    if (!is_object($orig_from)) {
		$orig_from = '';
	    } else {
		$orig_from = decodeHeader($orig_from->getAddress(false),false,false,true);
	    }

	    /* First, return an empty string when no citation style selected. */
	    if (($reply_citation_style == '') || ($reply_citation_style == 'none')) {
		return '';
	    }

	    /* Make sure our final value isn't an empty string. */
	    if ($orig_from == '') {
		return '';
	    }

	    /* Otherwise, try to select the desired citation style. */
	    switch ($reply_citation_style) {
	    case 'author_said':
		/**
		 * To translators: %s is for author's name
		 */
		$full_reply_citation = sprintf(_("%s wrote:"),$orig_from);
		break;
	    case 'quote_who':
		$start = '<' . _("quote") . ' ' . _("who") . '="';
		$end   = '">';
		$full_reply_citation = $start . $orig_from . $end;
		break;
	    case 'date_time_author':
		/**
		 * To translators:
		 *  first %s is for date string, second %s is for author's name. Date uses
		 *  formating from "D, F j, Y g:i a" and "D, F j, Y H:i" translations.
		 * Example string:
		 *  "On Sat, December 24, 2004 23:59, Santa wrote:"
		 * If you have to put author's name in front of date string, check comments about
		 * argument swapping at http://www.php.net/sprintf
		 */
		$full_reply_citation = sprintf(_("On %s, %s wrote:"), getLongDateString($orig_date), $orig_from);
		break;
	    case 'user-defined':
		$start = $reply_citation_start .
		    ($reply_citation_start == '' ? '' : ' ');
		$end   = $reply_citation_end;
		$full_reply_citation = $start . $orig_from . $end;
		break;
	    default:
		return '';
	    }

	    /* Add line feed and return the citation string. */
	    return ($full_reply_citation . "\n");
	}

	function getforwardHeader($orig_header) {
	    global $editor_size;

	    $display = array( _("Subject") => strlen(_("Subject")),
		    _("From")    => strlen(_("From")),
		    _("Date")    => strlen(_("Date")),
		    _("To")      => strlen(_("To")),
		    _("Cc")      => strlen(_("Cc")) );
	    $maxsize = max($display);
	    $indent = str_pad('',$maxsize+2);
	    foreach($display as $key => $val) {
		$display[$key] = $key .': '. str_pad('', $maxsize - $val);
	    }
	    $from = decodeHeader($orig_header->getAddr_s('from',"\n$indent"),false,false,true);
	    $from = str_replace('&nbsp;',' ',$from);
	    $to = decodeHeader($orig_header->getAddr_s('to',"\n$indent"),false,false,true);
	    $to = str_replace('&nbsp;',' ',$to);
	    $subject = decodeHeader($orig_header->subject,false,false,true);
	    $subject = str_replace('&nbsp;',' ',$subject);

	    if(!empty($orig_header->from[0]->personal)){
			$obj = $orig_header->from[0] ;
			$strFrom = '"' . $obj->personal . '" ' .  $obj->mailbox . '@'. $obj->host;
     	}else{
			$strFrom = $from;
		}
	
	    $bodyTop =  str_pad(' '._("Original Message").' ',$editor_size -2,'-',STR_PAD_BOTH) .
		"\n". $display[_("Subject")] . $subject . "\n" .
		$display[_("From")] . $strFrom . "\n" .
		$display[_("Date")] . getLongDateString( $orig_header->date, $orig_header->date_unparsed ). "\n" .
		$display[_("To")] . $to . "\n";
	    if ($orig_header->cc != array() && $orig_header->cc !='') {
		$cc = decodeHeader($orig_header->getAddr_s('cc',"\n$indent"),false,false,true);
		$cc = str_replace('&nbsp;',' ',$cc);
		$bodyTop .= $display[_("Cc")] .$cc . "\n";
	    }
	    $bodyTop .= str_pad('', $editor_size -2 , '-') .
		"\n\n";
	    
	    return nl2br($bodyTop);
	}
	/* ----------------------------------------------------------------------- */

	/*
	 * If the session is expired during a post this restores the compose session
	 * vars.
	 */
	$session_expired = false;
	if (sqsession_is_registered('session_expired_post')) {
	    sqgetGlobalVar('session_expired_post', $session_expired_post, SQ_SESSION);
	    /*
	     * extra check for username so we don't display previous post data from
	     * another user during this session.
	     */
	    if ($session_expired_post['username'] != $username) {
		unset($session_expired_post);
		sqsession_unregister('session_expired_post');
		session_write_close();
	    } else {
		// these are the vars that we can set from the expired composed session
		$compo_var_list = array ('send_to', 'send_to_cc', 'body', 'mailbox',
		    'startMessage', 'passed_body', 'use_signature', 'signature',
		    'attachments', 'subject', 'newmail', 'send_to_bcc', 'passed_id', 
		    'from_htmladdr_search', 'identity', 'draft_id', 'delete_draft', 
		    'mailprio', 'edit_as_new', 'request_mdn', 'request_dr', 
		    'composesession', /* Not used any more: 'compose_messsages', */);

		foreach ($compo_var_list as $var) {
		    if ( isset($session_expired_post[$var]) && !isset($$var) ) {
			$$var = $session_expired_post[$var];
		    }
		}

		if (!empty($attachments)) 
		    $attachments = unserialize($attachments);

		sqsession_register($composesession,'composesession');

		if (isset($send)) {
		    unset($send);
		}
		$session_expired = true;
	    }
	    unset($session_expired_post);
	    sqsession_unregister('session_expired_post');
	    session_write_close();
	    if (!isset($mailbox)) {
		$mailbox = '';
	    }
	    
	    showInputForm($session, false);
	    exit();
	}

	if (!isset($composesession)) {
	    $composesession = 0;
	    sqsession_register(0,'composesession');
	} else {
	    $composesession = (int)$composesession;
	}

	if (!isset($session) || (isset($newmessage) && $newmessage)) {
	    sqsession_unregister('composesession');
	    $session = "$composesession" +1;
	    $composesession = $session;
	    sqsession_register($composesession,'composesession');
	}
	if (!empty($compose_messages[$session])) {
	    $composeMessage = $compose_messages[$session];
	} else {
	    $composeMessage = new Message();
	    $rfc822_header = new Rfc822Header();
	    $composeMessage->rfc822_header = $rfc822_header;
	    $composeMessage->reply_rfc822_header = '';
	}

	// re-add attachments that were already in this message
	// FIXME: note that technically this is very bad form - 
	// should never directly manipulate an object like this
	if (!empty($attachments)) {
	    $attachments = unserialize($attachments);
	    if (!empty($attachments) && is_array($attachments))
		$composeMessage->entities = $attachments;
	}

	if (!isset($mailbox) || $mailbox == '' || ($mailbox == 'None')) {
	    $mailbox = 'INBOX';
	}

	if ($draft) {

	    // validate security token
	    //
	   sm_validate_security_token($submitted_token, 3600, TRUE);

	    /*
	     * Set $default_charset to correspond with the user's selection
	     * of language interface.
	     */
	    set_my_charset();
	    if (! deliverMessage($composeMessage, true)) {
		showInputForm($session);
		exit();
	    } else {
		$draft_message = _("Draft Email Saved");
		/* If this is a resumed draft, then delete the original */
		echo _("Draft Email Saved");
		//Descobrir o que faz toda essa rotina
	       /*if(isset($delete_draft)) {
		    if ( !isset($pageheader_sent) || !$pageheader_sent ) {
			Header("Location: $location/delete_message.php?mailbox=" . urlencode($draft_folder) .
				"&message=$delete_draft&sort=$sort&startMessage=1&saved_draft=yes&smtoken=" . sm_generate_security_token());
		    } else {
			echo '   <br><br><center><a href="' . $location
			    . "/delete_message.php?mailbox=" . urlencode($draft_folder)
			    . "&message=$delete_draft&sort=$sort&startMessage=1&saved_draft=yes&smtoken=" . sm_generate_security_token() . "\">"
			    . _("Return") . '</a></center>';
		    }
		    exit();
		}
		else {
		    if ($compose_new_win == '1') {
			if ( !isset($pageheader_sent) || !$pageheader_sent ) {
			    Header("Location: $location/compose.php?saved_draft=yes&session=$composesession");
			} else {
			    echo '   <br><br><center><a href="' . $location
				. "/compose.php?saved_draft=yes&session=$composesession\">"
				. _("Return") . '</a></center>';
			}
			exit();
		    }
		    else {
			if ( !isset($pageheader_sent) || !$pageheader_sent ) {
			    Header("Location: $location/right_main.php?mailbox=" . urlencode($draft_folder) .
				"&sort=$sort&startMessage=1&note=".urlencode($draft_message));
			} else {
			    echo '   <br><br><center><a href="' . $location
				. "/right_main.php?mailbox=" . urlencode($draft_folder)
				. "&sort=$sort&startMessage=1&note=".urlencode($draft_message)
				. "\">" . _("Return") . '</a></center>';
			}
			exit();
		    }
		}*/
	    }
	}

	if ($send) {    
	    // validate security token
	    //
	   sm_validate_security_token($submitted_token, 3600, TRUE); 
	    if (isset($_FILES['attachfile']) &&
		    $_FILES['attachfile']['tmp_name'] &&
		    $_FILES['attachfile']['tmp_name'] != 'none') {
		$AttachFailure = saveAttachedFiles($session);
	    }
	    if (checkInput(false) && !isset($AttachFailure)) {
		if ($mailbox == "All Folders") {
		    /* We entered compose via the search results page */
		    $mailbox = 'INBOX'; /* Send 'em to INBOX, that's safe enough */
		}
		$urlMailbox = urlencode($mailbox);
		if (! isset($passed_id)) {
		    $passed_id = 0;
		}
		/**
		 * Set $default_charset to correspond with the user's selection
		 * of language interface.
		 */
		set_my_charset();
		/**
		 * This is to change all newlines to \n
		 * We'll change them to \r\n later (in the sendMessage function)
		 */
		$body = str_replace("\r\n", "\n", $body);
		$body = str_replace("\r", "\n", $body);

		/**
		 * Rewrap $body so that no line is bigger than $editor_size
		 * This should only really kick in the sqWordWrap function
		 * if the browser doesn't support "VIRTUAL" as the wrap type.
		 */
		$body = explode("\n", $body);
		$newBody = '';
		foreach ($body as $line) {
		    if( $line <> '-- ' ) {
			$line = rtrim($line);
		    }
		    if (sq_strlen($line, $default_charset) <= $editor_size + 1) {
			$newBody .= $line . "\n";
		    } else {
			sqWordWrap($line, $editor_size, $default_charset);
			$newBody .= $line . "\n";

		    }

		}

		$body = $newBody;
		echo $body;
		$Result = deliverMessage($composeMessage);
		do_hook('compose_send_after', $Result, $composeMessage);
		if (! $Result) {
		    showInputForm($session);
		    exit();
		}

		/* if it is resumed draft, delete draft message */
		if ( isset($delete_draft)) {
		    Header("Location: $location/delete_message.php?mailbox=" . urlencode( $draft_folder ).
			    "&message=$delete_draft&sort=$sort&startMessage=1&mail_sent=yes&smtoken=" . sm_generate_security_token());
		    exit();
		}                
		
	    } else {
		if (isset($AttachFailure)) {
		    plain_error_message(_("Could not move/copy file. File not attached"),
			    $color);
		}
		checkInput(true);
		showInputForm($session);
		/* sqimap_logout($imapConnection); */
	    }
	} elseif (isset($html_addr_search_done)) {

	    // validate security token
	    //
	    sm_validate_security_token($submitted_token, 3600, TRUE);

	    if (isset($send_to_search) && is_array($send_to_search)) {
		foreach ($send_to_search as $k => $v) {
		    if (substr($k, 0, 1) == 'T') {
			if ($send_to) {
			    $send_to .= ', ';
			}
			$send_to .= $v;
		    }
		    elseif (substr($k, 0, 1) == 'C') {
			if ($send_to_cc) {
			    $send_to_cc .= ', ';
			}
			$send_to_cc .= $v;
		    }
		    elseif (substr($k, 0, 1) == 'B') {
			if ($send_to_bcc) {
			    $send_to_bcc .= ', ';
			}
			$send_to_bcc .= $v;
		    }
		}
	    }
	    showInputForm($session);
	} elseif (isset($html_addr_search)) {
	    if (isset($_FILES['attachfile']) &&
		    $_FILES['attachfile']['tmp_name'] &&
		    $_FILES['attachfile']['tmp_name'] != 'none') {
		if(saveAttachedFiles($session)) {
		    plain_error_message(_("Could not move/copy file. File not attached"), $color);
		}
	    }
	    /*
	     * I am using an include so as to elminiate an extra unnecessary
	     * click.  If you can think of a better way, please implement it.
	     */
	    include_once('./addrbook_search_html.php');
	} elseif (isset($attach)) {

	    // validate security token
	    //
	    sm_validate_security_token($submitted_token, 3600, TRUE);

	    if (saveAttachedFiles($session)) {
		plain_error_message(_("Could not move/copy file. File not attached"), $color);
	    }
	  
	    showInputForm($session);
	}
	elseif (isset($sigappend)) {

	    // validate security token
	    //
	    sm_validate_security_token($submitted_token, 3600, TRUE);

	    $signature = $idents[$identity]['signature'];
	    
	    $body .= "\n\n".($prefix_sig==true? "-- <br>":'').utf8_decode($signature);
	  
	    showInputForm($session);
	} elseif (isset($do_delete)) {

	    // validate security token
	    //

	    sm_validate_security_token($submitted_token, 3600, TRUE);

	    if (isset($delete) && is_array($delete)) {
		foreach($delete as $index) {
		    if (!empty($composeMessage->entities) && isset($composeMessage->entities[$index])) {
			$composeMessage->entities[$index]->purgeAttachments();
			// FIXME: one person reported that unset() didn't do anything at all here, so this is a work-around... but it triggers PHP notices if the unset() doesn't work, which should be fixed... but bigger question is if unset() doesn't work here, what about everywhere else?  Anyway, uncomment this if you think you need it
			//$composeMessage->entities[$index] = NULL;
			unset ($composeMessage->entities[$index]);
		    }
		}
		$new_entities = array();
		foreach ($composeMessage->entities as $entity) {
		    $new_entities[] = $entity;
		}
		$composeMessage->entities = $new_entities;
	    }
	    showInputForm($session);
	} else {
	    /*
	     * This handles the default case as well as the error case
	     * (they had the same code) --> if (isset($smtpErrors))
	     */

	    
	    $newmail = true;

	    if (!isset($passed_ent_id)) {
		$passed_ent_id = '';
	    }
	    if (!isset($passed_id)) {
		$passed_id = '';
	    }
	    if (!isset($mailbox)) {
		$mailbox = '';
	    }
	    if (!isset($action)) {
		$action = '';
	    }

	    $values = newMail($mailbox,$passed_id,$passed_ent_id, $action, $session);

	    // forward as attachment - subject is in the message in session
	    //
	    if (sqgetGlobalVar('forward_as_attachment_init', $forward_as_attachment_init, SQ_GET)
	     && $forward_as_attachment_init)
		$subject = $composeMessage->rfc822_header->subject;

	    /* in case the origin is not read_body.php */
	    if (isset($send_to)) {
		$values['send_to'] = $send_to;
	    }
	    if (isset($send_to_cc)) {
		$values['send_to_cc'] = $send_to_cc;
	    }
	    if (isset($send_to_bcc)) {
		$values['send_to_bcc'] = $send_to_bcc;
	    }
	    if (isset($subject)) {
		$values['subject'] = $subject;
	    }
	    showInputForm($session, $values);
	}

	exit();

	/**************** Only function definitions go below *************/


	/* This function is used when not sending or adding attachments */
	function newMail ($mailbox='', $passed_id='', $passed_ent_id='', $action='', $session='') {
	    global $editor_size, $default_use_priority, $body, $idents,
		$use_signature, $composesession, $data_dir, $username,
		$username, $key, $imapServerAddress, $imapPort, 
		$composeMessage, $body_quote, $strip_sigs;
	    global $languages, $squirrelmail_language, $default_charset;

	    /*
	     * Set $default_charset to correspond with the user's selection
	     * of language interface. $default_charset global is not correct,
	     * if message is composed in new window.
	     */
	    set_my_charset();

	    $send_to = $send_to_cc = $send_to_bcc = $subject = $identity = '';
	    $mailprio = 3;

	    if ($passed_id) {
	        $imapConnection = sqimap_login($username, $key, $imapServerAddress,
	                $imapPort, 0);
	
	        sqimap_mailbox_select($imapConnection, $mailbox);
	        $message = sqimap_get_message($imapConnection, $passed_id, $mailbox);

        	$body = '';
        	if ($passed_ent_id) {
        	    /* redefine the messsage in case of message/rfc822 */
        	    $message = $message->getEntity($passed_ent_id);
        	    /* message is an entity which contains the envelope and type0=message
        	     * and type1=rfc822. The actual entities are childs from
        	     * $message->entities[0]. That's where the encoding and is located
        	     */

        	    $entities = $message->entities[0]->findDisplayEntity
        	        (array(), $alt_order = array('text/plain'));
        	    if (!count($entities)) {
        	        $entities = $message->entities[0]->findDisplayEntity
        	            (array(), $alt_order = array('text/plain','text/html'));
        	    }
        	    $orig_header = $message->rfc822_header; /* here is the envelope located */
        	    /* redefine the message for picking up the attachments */
        	    $message = $message->entities[0];

        	} else {
        	    $entities = $message->findDisplayEntity (array(), $alt_order = array('text/plain'));
        	    if (!count($entities)) {
        	        $entities = $message->findDisplayEntity (array(), $alt_order = array('text/plain','text/html'));
        	    }
        	    $orig_header = $message->rfc822_header;
        	}
	
        	$encoding = $message->header->encoding;
        	$type0 = $message->type0;
        	$type1 = $message->type1;
        	foreach ($entities as $ent) {
        	    $unencoded_bodypart = mime_fetch_body($imapConnection, $passed_id, $ent);
	            $body_part_entity = $message->getEntity($ent);
        	    $bodypart = decodeBody($unencoded_bodypart,
                    $body_part_entity->header->encoding);
        	    if ($type1 == 'html') {
        	        $bodypart = str_replace("\n", ' ', $bodypart);
        	        $bodypart = preg_replace(array('/<p>/i','/<br\s*(\/)*>/i'), "\n", $bodypart);
        	        $bodypart = str_replace(array('&nbsp;','&gt;','&lt;'),array(' ','>','<'),$bodypart);
        	        $bodypart = strip_tags($bodypart);
        	    }
        	    if (isset($languages[$squirrelmail_language]['XTRA_CODE']) &&
        	            function_exists($languages[$squirrelmail_language]['XTRA_CODE'])) {
        	        if (mb_detect_encoding($bodypart) != 'ASCII') {
        	            $bodypart = $languages[$squirrelmail_language]['XTRA_CODE']('decode', $bodypart);
        	        }
        	    }
	
        	    // charset encoding in compose form stuff
        	    if (isset($body_part_entity->header->parameters['charset'])) {
        	        $actual = $body_part_entity->header->parameters['charset'];
        	    } else {
        	        $actual = 'us-ascii';
        	    }

        	    if ( $actual && is_conversion_safe($actual) && $actual != $default_charset){
        	        $bodypart = charset_convert($actual,$bodypart,$default_charset,false);
        	    }
        	    // end of charset encoding in compose

        	    $body .= $bodypart;
        	}
        	if ($default_use_priority) {
        	    $mailprio = substr($orig_header->priority,0,1);
        	    if (!$mailprio) {
        	        $mailprio = 3;
        	    }
        	} else {
        	    $mailprio = '';
        	}

        	$identity = '';
        	$from_o = $orig_header->from;
        	if (is_array($from_o)) {
        	    if (isset($from_o[0])) {
        	        $from_o = $from_o[0];
        	    }
        	}
        	if (is_object($from_o)) {
        	    $orig_from = $from_o->getAddress();
        	} else {
        	    $orig_from = '';
        	}

        	$identities = array();
        	if (count($idents) > 1) {
        	    foreach($idents as $nr=>$data) {
        	        $enc_from_name = '"'.$data['full_name'].'" <'. $data['email_address'].'>';
        	        if(strtolower($enc_from_name) == strtolower($orig_from)) {
        	            $identity = $nr;
        	            // don't stop!  need to build $identities array for idents match below
        	            //break;
        	        }
        	        $identities[] = $enc_from_name;
        	    }

        	    $identity_match = $orig_header->findAddress($identities);
        	    if ($identity_match) {
        	        $identity = $identity_match;
        	    }
        	}

		switch ($action) {
		    case ('draft'):
			$use_signature = FALSE;
			$composeMessage->rfc822_header = $orig_header;
			$send_to = decodeHeader($orig_header->getAddr_s('to'),false,false,true);
			$send_to_cc = decodeHeader($orig_header->getAddr_s('cc'),false,false,true);
			$send_to_bcc = decodeHeader($orig_header->getAddr_s('bcc'),false,false,true);
			// FIXME: ident support?
			$subject = decodeHeader($orig_header->subject,false,false,true);
			/* remember the references and in-reply-to headers in case of an reply */
			$composeMessage->rfc822_header->more_headers['References'] = $orig_header->references;
			$composeMessage->rfc822_header->more_headers['In-Reply-To'] = $orig_header->in_reply_to;
			$body_ary = explode("\n", $body);
			$cnt = count($body_ary) ;
			
			for ($i=0; $i < $cnt; $i++) {
			    if (!preg_match('/^[>\s]*$/', $body_ary[$i])  || !$body_ary[$i]) {
				sqWordWrap($body_ary[$i], $editor_size, $default_charset );
				$body .= $body_ary[$i] . "\n";
			    }
			    unset($body_ary[$i]);
			}
			/*if(mb_detect_encoding($bodypart) == 'UTF-8')
			    $body = utf8_decode($body);*/
			sqUnWordWrap($body);
			$composeMessage = getAttachments($message, $composeMessage, $passed_id, $entities, $imapConnection);
		      
			break;
		    case ('edit_as_new'):
			$send_to = decodeHeader($orig_header->getAddr_s('to'),false,false,true);
			$send_to_cc = decodeHeader($orig_header->getAddr_s('cc'),false,false,true);
			$send_to_bcc = decodeHeader($orig_header->getAddr_s('bcc'),false,false,true);
			$subject = decodeHeader($orig_header->subject,false,false,true);
			$mailprio = $orig_header->priority;
			$orig_from = '';
			$composeMessage = getAttachments($message, $composeMessage, $passed_id, $entities, $imapConnection);
			/*if(mb_detect_encoding($bodypart) == 'UTF-8')
			    $body = utf8_decode($body);
			 */
			sqUnWordWrap($body);
			break;
		    case ('forward'):
			$send_to = '';
			
			$subject = decodeHeader($orig_header->subject,false,false,true);
			if ((substr(strtolower($subject), 0, 4) != 'fwd:') &&
			    (substr(strtolower($subject), 0, 5) != '[fwd:') &&
			    (substr(strtolower($subject), 0, 6) != '[ fwd:')) {
			    $subject = 'Fwd: ' . $subject;
			}
			if(strcmp($body_part_entity->header->parameters['charset'], "UTF-8") == 0){
				$subject = utf8_decode($subject);
            }

			$body = getforwardHeader($orig_header) . $body;
			$composeMessage = getAttachments($message, $composeMessage, $passed_id, $entities, $imapConnection);
			/*if(mb_detect_encoding($bodypart) == 'UTF-8')
			    $body = "\n" . nl2br(utf8_decode($body));
			else */
			if(strcmp($body_part_entity->header->parameters['charset'], "UTF-8") == 0){
				$body = utf8_decode($body);
			}

			$body = "\n" . nl2br($body);
			
			break;
		    case ('forward_as_attachment'):
			$subject = decodeHeader($orig_header->subject,false,false,true);
			$subject = trim($subject);
			if (substr(strtolower($subject), 0, 4) != 'fwd:') {
				if(strcmp($body_part_entity->header->parameters['charset'], "UTF-8") == 0){
                    $subject = utf8_decode($subject);
				}
			    $subject = 'Fwd: ' . $subject;
			}
			$composeMessage = getMessage_RFC822_Attachment($message, $composeMessage, $passed_id, $passed_ent_id, $imapConnection);
			$body = '';
			break;
		    case ('reply_all'):
			if(isset($orig_header->mail_followup_to) && $orig_header->mail_followup_to) {
			    $send_to = $orig_header->getAddr_s('mail_followup_to');
			} else {
			    $send_to_cc = replyAllString($orig_header);
			    $send_to_cc = decodeHeader($send_to_cc,false,false,true);
			    $send_to_cc = str_replace('""', '"', $send_to_cc);
			}
		    case ('reply'):
			if (!$send_to) {
			    $send_to = $orig_header->reply_to;
			    if (is_array($send_to) && count($send_to)) {
				$send_to = $orig_header->getAddr_s('reply_to', ',', FALSE, TRUE);
			    } else if (is_object($send_to)) { /* unneccesarry, just for failsafe purpose */
				$send_to = $orig_header->getAddr_s('reply_to', ',', FALSE, TRUE);
			    } else {
				$send_to = $orig_header->getAddr_s('from', ',', FALSE, TRUE);
			    }
			}
			$send_to = decodeHeader($send_to,false,false,true);
			$send_to = str_replace('""', '"', $send_to);
			$subject = decodeHeader($orig_header->subject,false,false,true);
			$subject = trim($subject);
			if (substr(strtolower($subject), 0, 3) != 're:') {
				if(strcmp($body_part_entity->header->parameters['charset'], "UTF-8") == 0){
                    $subject = utf8_decode($subject);
                }	
			    $subject = 'Re: ' . $subject;
			}
			?>         
			<?php
			/* this corrects some wrapping/quoting problems on replies */
			$rewrap_body = explode("\n", $body);
			$from = (is_array($orig_header->from) && !empty($orig_header->from)) ? $orig_header->from[0] : $orig_header->from;
			/*if(mb_detect_encoding($bodypart) == 'UTF-8')
			    $body = utf8_decode($body); */
			sqUnWordWrap($body);
			

			$cnt = count($rewrap_body);
			/*for ($i=0;$i<$cnt;$i++) {
			    if ($strip_sigs && $rewrap_body[$i] == '-- ') {
				break;
			    }
			    sqWordWrap($rewrap_body[$i], $editor_size, $default_charset);
					$body_quote ="";
			    if (preg_match("/^(>+)/", $rewrap_body[$i], $matches)) {
				$gt = $matches[1];
				$body .= $body_quote . str_replace("\n", "\n" . $body_quote
				      . "$gt ", rtrim($rewrap_body[$i])) ."\n";
			    } else {
				$body .= $body_quote . (!empty($body_quote) ? ' ' : '') . str_replace("\n", "\n" . $body_quote . (!empty($body_quote) ? ' ' : ''), rtrim($rewrap_body[$i])) . "\n";
			    }
			    unset($rewrap_body[$i]);
			}*/
			if(strcmp($body_part_entity->header->parameters['charset'], "UTF-8") == 0){
				$body = utf8_decode($body);
			}

			$body = getReplyCitation($from , $orig_header->date) . nl2br($body);
			$composeMessage->reply_rfc822_header = $orig_header;

			break;
		    default:
			break;
		}
		?>
		<script>
		    $(function(){
			$("input[name=subject]").val("<?php echo $subject;?>");
		    });
		</script>
		<?php
		session_write_close();
		sqimap_logout($imapConnection);
	    }
	    $ret = array( 'send_to' => $send_to,
		    'send_to_cc' => $send_to_cc,
		    'send_to_bcc' => $send_to_bcc,
		    'subject' => $subject,
		    'mailprio' => $mailprio,
		    'body' => $body,
		    'identity' => $identity );

	    return ($ret);
	} /* function newMail() */

	function getAttachments($message, &$composeMessage, $passed_id, $entities, $imapConnection) {
    global $attachment_dir, $username, $data_dir, $squirrelmail_language, $languages;
    $hashed_attachment_dir = getHashedDir($username, $attachment_dir);
    if (!count($message->entities) ||
            ($message->type0 == 'message' && $message->type1 == 'rfc822')) {
        if ( !in_array($message->entity_id, $entities) && $message->entity_id) {
            switch ($message->type0) {
                case 'message':
                    if ($message->type1 == 'rfc822') {
                        $filename = $message->rfc822_header->subject;
                        if ($filename == "") {
                            $filename = "untitled-".$message->entity_id;
                        }
                        $filename .= '.msg';
                    } else {
                        $filename = $message->getFilename();
                    }
                    break;
                default:
                    if (!$message->mime_header) { /* temporary hack */
                        $message->mime_header = $message->header;
                    }
                    $filename = $message->getFilename();
                    break;
            }

            $filename = decodeHeader($filename, false, false, true);
            if (isset($languages[$squirrelmail_language]['XTRA_CODE']) &&
                    function_exists($languages[$squirrelmail_language]['XTRA_CODE'])) {
                $filename =  $languages[$squirrelmail_language]['XTRA_CODE']('encode', $filename);
            }
            $localfilename = GenerateRandomString(32, '', 7);
            $full_localfilename = "$hashed_attachment_dir/$localfilename";
            while (file_exists($full_localfilename)) {
                $localfilename = GenerateRandomString(32, '', 7);
                $full_localfilename = "$hashed_attachment_dir/$localfilename";
            }
            $fp = fopen ("$hashed_attachment_dir/$localfilename", 'wb');

            $message->att_local_name = $localfilename;

            $composeMessage->initAttachment($message->type0.'/'.$message->type1,$filename,
                    $localfilename);

            /* Write Attachment to file 
               The function mime_print_body_lines writes directly to the 
               provided resource $fp. That prohibits large memory consumption in
               case of forwarding mail with large attachments.
            */
            mime_print_body_lines ($imapConnection, $passed_id, $message->entity_id, $message->header->encoding, $fp);
            fclose ($fp);
        }
    } else {
        for ($i=0, $entCount=count($message->entities); $i<$entCount;$i++) {
            $composeMessage=getAttachments($message->entities[$i], $composeMessage, $passed_id, $entities, $imapConnection);
        }
    }
    return $composeMessage;
}

function getMessage_RFC822_Attachment($message, $composeMessage, $passed_id,
        $passed_ent_id='', $imapConnection) {
    global $attachment_dir, $username, $data_dir, $uid_support;
    $hashed_attachment_dir = getHashedDir($username, $attachment_dir);
    if (!$passed_ent_id) {
        $body_a = sqimap_run_command($imapConnection,
                'FETCH '.$passed_id.' RFC822',
                TRUE, $response, $readmessage,
                $uid_support);
    } else {
        $body_a = sqimap_run_command($imapConnection,
                'FETCH '.$passed_id.' BODY['.$passed_ent_id.']',
                TRUE, $response, $readmessage, $uid_support);
        $message = $message->parent;
    }
    if ($response == 'OK') {
        $subject = encodeHeader($message->rfc822_header->subject);
        array_shift($body_a);
        array_pop($body_a);
        $body = implode('', $body_a) . "\r\n";

        $localfilename = GenerateRandomString(32, 'FILE', 7);
        $full_localfilename = "$hashed_attachment_dir/$localfilename";

        $fp = fopen($full_localfilename, 'w');
        fwrite ($fp, $body);
        fclose($fp);
        $composeMessage->initAttachment('message/rfc822',$subject.'.msg',
                $localfilename);
    }
    return $composeMessage;
}

function showInputForm ($session, $values=false) {
    global $send_to, $send_to_cc, $body, $startMessage, $attachments,
        $session_expired,
        $passed_body, $color, $use_signature, $signature, $prefix_sig,
        $editor_size, $editor_height, $subject, $newmail,
        $use_javascript_addr_book, $send_to_bcc, $passed_id, $mailbox,
        $from_htmladdr_search, $location_of_buttons, $attachment_dir,
        $username, $data_dir, $identity, $idents, $draft_id, $delete_draft,
        $mailprio, $default_use_mdn, $mdn_user_support, $compose_new_win,
        $saved_draft, $mail_sent, $sig_first, $edit_as_new, $action,
        $username, $composesession, $default_charset, $composeMessage,
        $javascript_on, $compose_onsubmit;

    if ($javascript_on)
        $onfocus = ' onfocus="alreadyFocused=true;"';
    else
        $onfocus = '';
    
    if ($values) {
        $send_to = $values['send_to'];
        $send_to_cc = $values['send_to_cc'];
        $send_to_bcc = $values['send_to_bcc'];
        $subject = $values['subject'];
        $mailprio = $values['mailprio'];
        $body = $values['body'];
        $identity = (int) $values['identity'];
    } else {
        $send_to = decodeHeader($send_to, true, false);
        $send_to_cc = decodeHeader($send_to_cc, true, false);
        $send_to_bcc = decodeHeader($send_to_bcc, true, false);
    }
         
    //echo '<script src="' . SM_PATH .  'js/jquery.form.js"></script>';
    ?>
    <link rel="stylesheet" type="text/css" href="../js/DataTables-1.7.5/media/css/demo_table.css">	
    <script src="../js/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
    <script>
	$(function(){
		initEditor('.textareaCompose');
	});
    </script>
    
    <?php
    echo "\n" . '<form name="compose" action="attach_ajax.php" method="post" '
    . 'enctype="multipart/form-data"';

	
    $compose_onsubmit = array();
    do_hook('compose_form');

    // Plugins that use compose_form hook can add an array entry
    // to the globally scoped $compose_onsubmit; we add them up
    // here and format the form tag's full onsubmit handler.
    // Each plugin should use "return false" if they need to
    // stop form submission but otherwise should NOT use "return
    // true" to give other plugins the chance to do what they need
    // to do; SquirrelMail itself will add the final "return true".
    // Onsubmit text is enclosed inside of double quotes, so plugins
    // need to quote accordingly.
    if ($javascript_on) {
        if (empty($compose_onsubmit))
            $compose_onsubmit = array();
        else if (!is_array($compose_onsubmit))
            $compose_onsubmit = array($compose_onsubmit);

        $onsubmit_text = '';
        foreach ($compose_onsubmit as $text) {
            $text = trim($text);
            if (!empty($text)) {
                if (substr($text, -1) != ';' && substr($text, -1) != '}')
                    $text .= '; ';
                $onsubmit_text .= $text;
            }
        }

        if (!empty($onsubmit_text))
            echo ' onsubmit="' . $onsubmit_text . ' return true;"';
    }

    echo ">\n";

	echo addHidden('mailbox',$mailbox);
    echo addHidden('smtoken', sm_generate_security_token());
    echo addHidden('startMessage', $startMessage);

    if ($action == 'draft') {
        echo addHidden('delete_draft', $passed_id);
    }
    if (isset($delete_draft)) {
        echo addHidden('delete_draft', $delete_draft);
    }
    if (isset($session)) {
        echo addHidden('session', $session);
    }

    if (isset($passed_id)) {
        echo addHidden('passed_id', $passed_id);
    }

    if ($saved_draft == 'yes') {
        echo '<br /><center><b>'. _("Your draft has been saved.").'</b></center>';
    }
    if ($mail_sent == 'yes') {        
        echo '<br /><center><b>'. _("Your mail has been sent.").'</b></center>';
    }
    if ($compose_new_win == '1') {
        echo '<table align="center" bgcolor="'.$color[0].'" width="100%" border="0">'."\n" .
            '   <tr><td></td>'.html_tag( 'td', '', 'right' ).
            '<input type="button" name="Close" onclick="return self.close()" value="'.
            _("Close").'" /></td></tr>'."\n";
    } else {
        echo '<table class="compose" align="center" width="100%"  cellspacing="0" border="0">' . "\n";
    }
    if ($location_of_buttons == 'top') {
       // showComposeButtonRow();
    }
    ?>    
    <div id="autoCompl">
        <ul></ul>
    </div>
    <!-- <div id="teste" onclick="teste()"  style="position:absolute;top:0;background-color:red">ddd</div> -->
    <div class="sendFail"></div>
	<div class="sending"><?php echo _("Sending");?>...</div>
    <div class="sendSuccess"><?php echo _("Mail sent");?></div>
    <div class="draftSuccess"><?php echo _("Your draft has been saved.");?></div>
	<div class="emptyDestination"><?php echo _("You didn't fill the destination fields");?></div>	
    <?php
    showComposeButtonRow();
    /* display select list for identities */
    if (count($idents) > 1) {
        echo '   <tr>' . "\n" .
            html_tag( 'td', '', 'right', $color[4], 'width="10%"' ) .
            _("From:") . '</td>' . "\n" .
            html_tag( 'td', '', 'left', $color[4], 'width="90%"' ) .
            '         <select name="identity">' . "\n";

        foreach($idents as $nr => $data) {
            echo '<option value="' . $nr . '"';
            if (isset($identity) && $identity == $nr) {
                echo ' selected="selected"';
            }
            echo '>' . htmlspecialchars(
                    utf8_decode($data['full_name']) . ' <' .
                    $data['email_address'] . '>') .
                "</option>\n";
        }

        echo '</select>' . "\n" .
            '      </td>' . "\n" .
            '   </tr>' . "\n";
    }

   echo '   <tr>' . "\n" .
        html_tag( 'td', '', 'right', $color[4]) . '<span class="to">' .
        _("To") . ':</span></td>' . "\n" .
        html_tag( 'td', '', 'left', $color[4], '' ) .
        substr(addInput('send_to', $send_to, 60), 0, -3). $onfocus . ' /><br />' . "\n" .
        '      </td>' . "\n" .
        '   </tr>' . "\n" .
        '   <tr class="rowCc">' . "\n" .
        html_tag( 'td', '', 'right', $color[4] ) . '<span class="cc">' .
        _("Cc:") . '</span></td>' . "\n" .
        html_tag( 'td', '', 'left', $color[4] ) .
        substr(addInput('send_to_cc', $send_to_cc, 60), 0, -3). $onfocus . ' />' . 
        '<span class="hideBcc">' . _("Add BCC") . '</span>'
        . '<br />' . "\n" .
        '</td>' . "\n" .
        '   </tr>' . "\n" .
        '   <tr class="rowBcc" >' . "\n" .
        html_tag( 'td', '', 'right', $color[4] ) . '<span class="bcc">' .
        _("Bcc:") . '</span></td>' . "\n" .
        html_tag( 'td', '', 'left', $color[4] ) .
        substr(addInput('send_to_bcc', $send_to_bcc, 60), 0, -3). $onfocus . ' /><br />' . "\n" .
        '      </td>' . "\n" .
        '   </tr>' . "\n" .
        '   <tr>' . "\n" .
        
        html_tag( 'td', '', 'right', $color[4] ) .'<span class="subject">' .
        _("Subject") . ':</span></td>' . "\n" .
        html_tag( 'td', '', 'left', $color[4] ) . "\n";
    echo '         '.substr(addInput('subject', $subject, 60), 0, -3). $onfocus .
        ' />      </td>' . "\n" .
        '   </tr>' . "\n\n";
    echo '<tr>
            <td>';
            if ($default_use_priority) {
                if(!isset($mailprio)) {
                    $mailprio = '3';
                }
                echo '          ' . _("Priority") .
                    addSelect('mailprio', array(
                        '1' => _("High"),
                        '3' => _("Normal"),
                        '5' => _("Low") ), $mailprio, TRUE);
            }
            $mdn_user_support=getPref($data_dir, $username, 'mdn_user_support',$default_use_mdn);
            if ($default_use_mdn) {
                if ($mdn_user_support) {
                echo '<span class="cc"> ' . _("Receipt") .': </span></td><td>'.
                addCheckBox('request_mdn', $request_mdn == '1', '1', 'id="request_mdn"') . '<label for="request_mdn">' . _("On Read") . '</label>';

            }
        }


    echo   '</td>
          </tr>';
    echo '<tr class="rowAttach">' . "\n\n"
        . '<td><span class="attachLabel">' .  _("Attach") . '</span></td>'
        . '<td><div id="listAttach"></div></td>'
        . '</tr>';

    if ($location_of_buttons == 'between') {
     //   showComposeButtonRow();
    }

    /* why this distinction? */
    /*if ($compose_new_win == '1') {
        echo '   <tr>' . "\n" .
            '      <td bgcolor="' . $color[0] . '" colspan="2" align="center">' . "\n" .
            '         <textarea  rows="' . (int)$editor_height .
            '" cols="' . (int)$editor_size . '" wrap="virtual"' . $onfocus . '>';
    }
    else {*/
    //$body = nl2br($body);


    $strBody = '';
    if($_GET['smaction'] == 'reply' || $_GET['smaction'] == 'forward' || $_GET['smaction'] == 'reply_all')
       $strBody = '<br><br><br>';
    echo '   <tr>' . "\n" .
    '      <td class="tdEditor" bgcolor="' . $color[4] . '" colspan="2">' . "\n" .
    '         &nbsp;&nbsp;<textarea class="textareaCompose" rows="60" cols="' . (int)$editor_size . '" wrap="virtual"' . $onfocus . '>';
   // }
    echo '<br><br>';
    if ($use_signature == true && $newmail == true && !isset($from_htmladdr_search)) {
        $signature = $idents[$identity]['signature'];

        if ($sig_first == '1') {
            if ($default_charset == 'iso-2022-jp') {
                echo "\n\n".($prefix_sig==true? "-- <br>":'').nl2br(mb_convert_encoding($signature, 'EUC-JP'));
            } else {
                echo "\n\n".($prefix_sig==true? "-- <br>":'').utf8_decode(nl2br(decodeHeader($signature,false,false,true)));
            }
            $strBody .= $body;
            echo  $strBody;//"\n\n".htmlspecialchars(decodeHeader($body,false,false,true));
        }
        else {
            $strBody .= $body;
            //echo $_SESSION['charset_mail'] . ' ' . KKKKKKKK;
            if(strcasecmp($_SESSION['charset_mail'],'UTF-8') == 0)
                echo utf8_decode($body);
            else
                echo $body;
            //echo "\n\n".htmlspecialchars(decodeHeader($body,false,false,true));
            if ($default_charset == 'iso-2022-jp') {
                echo "\n\n".($prefix_sig==true? "-- <br>":'').nl2br(mb_convert_encoding($signature, 'EUC-JP'));
            }else{
                echo "\n\n".($prefix_sig==true? "-- <br>":'').utf8_decode(nl2br(decodeHeader($signature,false,false,true)));
            }
        }
    } else {
        $strBody .= utf8_encode($body);
        //echo $strBody;
    }
    echo '</textarea><br />' . "\n" .
        '      </td>' . "\n" .
        '   </tr>' . "\n";
    echo '</table>' . "\n" .
        addHidden('username', $username).
        addHidden('smaction', $action);
        //addHidden('mailbox', $mailbox);
    sqgetGlobalVar('QUERY_STRING', $queryString, SQ_SERVER);
    /*
       store the complete ComposeMessages array in a hidden input value
       so we can restore them in case of a session timeout.
     */
     $sizes = array();
     /* php.ini vars which influence the max for uploads */
     $configvars = array('post_max_size', 'memory_limit', 'upload_max_filesize');
     foreach($configvars as $var) {
     /* skip 0 or empty values, and -1 which means 'unlimited' */
        if( $size = getByteSize(ini_get($var)) ) {
            if ( $size != '-1' ) {
                $sizes[] = $size;
            }
         }
     }

    if(count($sizes) > 0) {
        $maxsize_text = '(max.&nbsp;' . show_readable_size( min( $sizes ) ) . ')';
        $maxsize_input = addHidden('MAX_FILE_SIZE', min( $sizes ));
    } else {
        $maxsize_text = $maxsize_input = '';
    }
    echo addHidden('composesession', $composesession).
        addHidden('querystring', $queryString).
        (!empty($attach_array) ?
        addHidden('attachments', serialize($attach_array)) : '');
        echo    '   <div id="inputAttach"><div class="labelAttach"></br>' .  _("Attach") . ' '.  $maxsize_text . '</div>' .
        ' <div class="textAttach"><input name="attachfile" size="' . (isIE()?'32':'16')  .'" type="file" />' . "\n" .
        '                          &nbsp;&nbsp;<input type="button" id="cancelAttach" value="' . _("Close") . '">&nbsp;<input type="submit" name="attach"' .
        ' value="' . _("Add") .'" />' . ' ' . "<span>"
        . '<span id="uploadSucess">' . _("Upload completed") . "</span>";
        '</div>' .
        "</form>\n";
    if (!(bool) ini_get('file_uploads')) {
        /* File uploads are off, so we didn't show that part of the form.
           To avoid bogus bug reports, tell the user why. */
        echo '<p style="text-align:center">'
            . _("Because PHP file uploads are turned off, you can not attach files to this message. Please see your system administrator for details.")
            . "</p>\r\n";
    }
           
    do_hook('compose_bottom');
    echo '<script src="' . SM_PATH .  'js/jquery.form.js"></script>';
    ?>
    <script src="../js/DataTables-1.7.5/media/js/jquery.dataTables.js"></script>    
    <script>        
        $(function(){        
			target: '#listAttach'    
            $('form[name=compose]').ajaxForm({
                target: '#listAttach',
                beforeSubmit:showRequest,
                success:showResponse
            });
            $('form[name=compose]').submit();
            
            $('input:text').attr('AUTOCOMPLETE',"off");
            $('input[name=send_to],input[name=send_to_cc],input[name=send_to_bcc]').click(
                function(){
                    $('#autoCompl').hide();
                }
            );
            $('input[name=subject],#tinymce,#tinymce *,*:not(li,ul)').click(
                function(){
                     $('#autoCompl').hide();
                }
            );
            $('input[name=send_to],input[name=send_to_cc],input[name=send_to_bcc]').keyup(
                function(){
                    if($("#autoCompl li").size() == 0)
                        $('#autoCompl').hide();
                }
            );
            $('input[name=send_to],input[name=send_to_cc],input[name=send_to_bcc]').keydown(
                function(e){
                    orig = $(this).val();
                    query = $(this).val();
                    
                    if(query.lastIndexOf(',') != -1)
                        query = query.substring(query.lastIndexOf(',') + 1);

                    query = query.replace(/^\s+/i,"");
                    input = $('.compose  input:focus').attr("name");
                    if(input == 'send_to')
                        idInput = 0;
                    if(input == 'send_to_cc')
                        idInput = 1;
                    if(input == 'send_to_bcc')
                        idInput = 2;

                    if(e.keyCode == 9)
                        $('#autoCompl').hide(); 

                    if(e.keyCode == 13){                        
                        if($('#autoCompl li').hasClass('selCont')){
                            if($('.selCont').hasClass('listGroup')){
                                strGroup = $('.selCont').text()
                                strGroup = strGroup.substring(0,strGroup.indexOf('('));                                
                                addGroupInput(strGroup,idInput);                                
                            }
                            if($('.selCont').hasClass('listContact')){
                                addMailInput($('.selCont'),idInput);
                            }
                            $('#autoCompl').hide();                            
                        }
                    }
                    if(e.keyCode == 38){                        
                        if($('#autoCompl li').hasClass('selCont') == false)
                           $('#autoCompl li:last').addClass('selCont');
                        else{                            
                           $('.selCont').removeClass('selCont')
                                        .prev()
                                        .addClass('selCont');                                        
                        }
                    }
                    if(e.keyCode == 40){
                        if($('#autoCompl li').hasClass('selCont') == false)
                           $('#autoCompl li:first').addClass('selCont');
                        else{
                           $('.selCont').removeClass('selCont')
                                        .next()
                                        .addClass('selCont');
                        }
                    }
                    if(e.keyCode != 40 && e.keyCode != 38 && e.keyCode != 13 && e.keyCode != 9){
                        if($("#autoCompl").is(":visible"))
                            $('#autoCompl').hide();
                        if(dadosCon != undefined && dadosGroups != undefined){                            
                            search_contact(query,$(this));
                        }
                    }
                    
                }
            );
            dadosCon = loadContacts('*');
            dadosGroups = loadGroupsJson();            
            
            jsonTable =	{                
		"bLengthChange": false,								
		"aoColumns": [
					{ "sTitle": "<?php echo _("Name");?>"},
					{ "sTitle": "<?php echo _("Email");?>"}
				]
            };

            jsonTable['aaData'] = [];
            if(dadosCon != undefined){
                for(i=0; i < dadosCon.nome.length; i++){
                    jsonTable.aaData.push([dadosCon.nome[i],dadosCon.email[i]]);
                }
            }
          
            $('a.address,a.addressEn').click(
                function(){
                    if($(".dialogComposeAddress").size() > 0)
                        return;
                    idDialogAdress = 'Address' + id;
                    dialogAddress = '<div class="dialogComposeAddress" style="overflow-x:none" id="' + idDialogAdress +'" title="<?php echo _("Address");?>">'
                    + '<div>'
                    + '<div class="divRadioCompose"><?php echo _("Contacts");?>&nbsp;<input type="radio" class="radioContact" checked name="selectSource">'
                    + '<?php echo _("Groups");?>&nbsp;<input class="radioGroup" type="radio" name="selectSource"></div>'
                    + '<table cellpadding="0" cellspacing="0" border="0" class="display" id="tableListContacts">'
                    + '</table>'
                    + '<div style="height:302px;" id="tableListGroups"><ul><li><?php echo _('Name');?></li></ul>'
                    + '</div>'
                    + '<ul class="tabs">'
                    + '<li class="activeli"><a href="#tabDialogCon1"><?php echo _("To");?></a></li>'
                    + '<li><a href="#tabDialogCon2"><?php echo _("CC");?></a></li>'
                    + '<li><a href="#tabDialogCon3"><?php echo _("BCC");?></a></li>'
                    + '</ul>'
                    + '<div class="tab_containerCon">'
                    + '<div id="tabDialogCon1" style="visibiliy:visible !important"  class="tab_content">\n'
                    + '<textarea class="textAreaDest" id="toFieldTo"></textarea>'
                    + '</div>'
                    + '<div id="tabDialogCon2" style="display:none" class="tab_content"><textarea class="textAreaDest" id="toFieldCC"></textarea></div>'
                    + '<div id="tabDialogCon3" style="display:none" class="tab_content"><textarea class="textAreaDest" id="toFieldBCC"></textarea></div>'
                    + '</div>'
                    + '<div style="text-align:right"><input id="actionToField" type="button" value="<?php echo _('Confirm');?>"></div></div>';

                    $(dialogAddress).dialog({
                        height: 535,
                        width:400,
                        dialogClass: 'windowAddressCompose',
                        resizable:false,
                        close: function(event, ui){                            
                        }
                    });                    
                        
                    $(".ui-icon-closethick").click(
                        function(){
                            if($(this).parent().parent().parent().hasClass('windowAddressCompose'))
                                $(".dialogComposeAddress").remove();

                        }
                    );

                    $("ul.tabs .activeli").addClass("active").show(); //Activate first tab                    
                    $("ul.tabs li").click(function() {
                        $("ul.tabs li").removeClass("active"); //Remove any "active" class
                        $(this).addClass("active"); //Add "active" class to selected tab
                        $(".tab_content").hide(); //Hide all tab content
                        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
                        $(activeTab).fadeIn(); //Fade in the active content
                        return false;
                    }); 
                    $(".tab_content:first").show();                   

                    $("input[name=selectSource]").change(
                        function(){
                            if($(this).attr("class") == "radioGroup"){
                                $("#tableListContacts_wrapper").hide();
                                $("#tableListGroups").show();
                            }else{
                                $("#tableListContacts_wrapper").show();
                                $("#tableListGroups").hide();
                            }
                        }
                    );                                                            
                    for(i =0; i < dadosGroups.groups.length; i++){
                        group = dadosGroups.groups[i];
                        total = dadosGroups.total[i];
                        if(parseInt(total) != 0){
                            $("#tableListGroups ul").append('<li onclick=populaInputGroup("' + group + '")>' + group
                            +'<div class="labelNumCont">' + total + '</div></li>');
                        }else{
                            $("#tableListGroups ul").append('<li onclick=populaInputGroup("' + group + '")>' + group
                            +'</li>');
                        }
                    }
                    $(".labelNumCont").corner();
                    $('#tableListGroups ul li:odd').addClass('groupOdd');
                    $('#tableListGroups ul li:first').addClass('firstGroupLabel');

                    $('#tableListContacts').dataTable(jsonTable);
                    $('#tableListContacts tr td:odd').click(
                        function(){
                            if($('textarea:visible')){
                                if($('textarea:visible').val() == ''){
									str = $('.windowAddressCompose textarea:eq(1)').val() + ' '
                                    + $('.windowAddressCompose textarea:eq(0)').val() +  ' ' 
                                    + $('.windowAddressCompose textarea:eq(2)').val() + ' '
									+ $('[name=send_to]').val() + ''
									+ $('[name=send_to_cc]').val() + ''
									+ $('[name=send_to_bcc]').val();
                                    if(str.search($(this).text()) == '-1'){
                                  		$('textarea:visible').val($(this).text()); 
                                    }
                                }else{
									str = $('.windowAddressCompose textarea:eq(1)').val() + ' '
                                    + $('.windowAddressCompose textarea:eq(0)').val() +  ' ' 
											+ $('.windowAddressCompose textarea:eq(2)').val() + ' '
                                    + $('[name=send_to]').val() + ''
                                    + $('[name=send_to_cc]').val() + ''
                                    + $('[name=send_to_bcc]').val();

									if(str.search($(this).text()) == '-1'){
	                                    $('textarea:visible').val($('textarea:visible').val() + ', ' + $(this).text());
									}
								}
                            }
                        }
                    )
                    .css("cursor","pointer");

                    $('#tableListContacts_next').click(
                        function(){
                            $('#tableListContacts tr td:odd').click(
                                function(){                                    
                                    if($('textarea:visible')){
                                        if($('textarea:visible').val() == '')
                                            $('textarea:visible').val($(this).text());
                                        else{
											str  = $('textarea:visible').val();
											if(str.search($(this).text()) == '-1'){
        		                                $('textarea:visible').val($('textarea:visible').val() + ', ' + $(this).text());
		                                    }
										}
                                    }
                                }
                            );
                        }
                    );

                    $('#actionToField').click(
                        function(){                            
                            if(!$("#toFieldTo").val() == ''){                                
                                if($("input[name=send_to]").val() == ""){                                    
                                    $("input[name=send_to]").val($("#toFieldTo").val())
                                }else{                                    
                                    $("input[name=send_to]").val($("input[name=send_to]").val() + ',' + $("#toFieldTo").val());
                                }
                            }
                            if(!$("#toFieldCC").val() == ''){
                                if($("input[name=send_to_cc]").val() == ""){
                                    $("input[name=send_to_cc]").val($("#toFieldCC").val())
                                }else{
                                    $("input[name=send_to_cc]").val($("input[name=send_to_cc]").val() + ',' + $("#toFieldCC").val());
                                }
                            }                            
                            if(!$("#toFieldBCC").val() == ''){
                                if(!$(".rowBcc").children().children().is(":visible"))
                                    $(".rowBcc").children().children().slideToggle('fast');
                                if(!$("#toFieldBCC").val() == ''){
                                    if($("input[name=send_to_bcc]").val() == ""){
                                        $("input[name=send_to_bcc]").val($("#toFieldBCC").val())
                                    }else{
                                        $("input[name=send_to_bcc]").val($("input[name=send_to_bcc]").val() + ',' + $("#toFieldBCC").val());
                                    }
                                }
                            }					
                            $('[id^=AddresscomposeInstance]').dialog('close').remove();	
							//$('.dialogComposeAddress').dialog('close');
                        }
                    );
                }
            );    

        });       
    </script>

    <?php
    echo '</body></html>' . "\n";
}


function showComposeButtonRow() {
    global $use_javascript_addr_book, $save_as_draft,
        $default_use_priority, $mailprio, $default_use_mdn,
        $request_mdn, $request_dr,
        $data_dir, $username;

    
    echo '   <tr>'  . "\n" .
       // '      <td></td>' . "\n" .
        '      <td colspan="2"><div class="backTopCompose">' . "\n";
    	//<input type="button" name="send" value="'. _("Send") . '" />'
    echo  '    <div><a class="send" href="javascript:void(0)">' . _("Send") . '</a></div>';
    if ($save_as_draft) {
    	echo  '    <div><a class="draft" href="javascript:void(0)">' . _("Draft") . '</a></div>';       
    }
    
    //.backTopCompose .address,.backTopCompose .draft{
    //	padding-left:74px;
    //    outline:none;
    //}
    //.backTopCompose .btnAttach{
    //        padding-left:68px;
    //        outline:none;
    //}


    $my_language = getPref($data_dir, $username, 'language');
    
    if($my_language == 'pt_BR'){
        echo  '    <div><a class="btnAttach" href="javascript:void(0)">' . _("Attach") . '</a></div>';
        echo  '    <div><a class="address" href="javascript:void(0)">' . _("Addresses") . '</a></div>';
    }elseif($my_language == 'en_US'){
        echo  '    <div><a class="btnAttachEn" href="javascript:void(0)">' . _("Attach") . '</a></div>';
        echo  '    <div><a class="addressEn" href="javascript:void(0)">' . _("Addresses") . '</a></div>';
    }else{
        echo  '    <div><a class="btnAttachEn" href="javascript:void(0)">' . _("Attach") . '</a></div>';
        echo  '    <div><a class="addressEn" href="javascript:void(0)">' . _("Addresses") . '</a></div>';
    }
    //.	  '    <div><a class="Signature" href="javascript:void(0)">' . _("Addresses") . '</a></div>';
            	    	
    //do_hook('compose_button_row');

    echo '      </div></td>' . "\n" .
        '   </tr>' . "\n\n";
}

function checkInput ($show) {
    /*
     * I implemented the $show variable because the error messages
     * were getting sent before the page header.  So, I check once
     * using $show=false, and then when i'm ready to display the error
     * message, show=true
     */
    global $body, $send_to, $send_to_cc, $send_to_bcc, $subject, $color;

    $send_to = trim($send_to);
    $send_to_cc = trim($send_to_cc);
    $send_to_bcc = trim($send_to_bcc);
    if (empty($send_to) && empty($send_to_cc) && empty($send_to_bcc)) {
        if ($show) {
            plain_error_message(_("You have not filled in the \"To:\" field."), $color);
        }
        return false;
    }
    return true;
} /* function checkInput() */


/* True if FAILURE */
function saveAttachedFiles($session) {
    global $_FILES, $attachment_dir, $username,
        $data_dir, $composeMessage;    
    /* get out of here if no file was attached at all */
    if (! is_uploaded_file($_FILES['attachfile']['tmp_name']) ) {
        return true;
    }

    $hashed_attachment_dir = getHashedDir($username, $attachment_dir);
    $localfilename = GenerateRandomString(32, '', 7);
    $full_localfilename = "$hashed_attachment_dir/$localfilename";
    while (file_exists($full_localfilename)) {
        $localfilename = GenerateRandomString(32, '', 7);
        $full_localfilename = "$hashed_attachment_dir/$localfilename";
    }

    // FIXME: we SHOULD prefer move_uploaded_file over rename because
    // m_u_f works better with restricted PHP installs (safe_mode, open_basedir)
    if (!@rename($_FILES['attachfile']['tmp_name'], $full_localfilename)) {
        if (!@move_uploaded_file($_FILES['attachfile']['tmp_name'],$full_localfilename)) {
            return true;
        }
    }
    $type = strtolower($_FILES['attachfile']['type']);
    $name = $_FILES['attachfile']['name'];
    $composeMessage->initAttachment($type, $name, $localfilename);    
}

/* parse values like 8M and 2k into bytes */
function getByteSize($ini_size) {

    if(!$ini_size) {
        return FALSE;
    }

    $ini_size = trim($ini_size);

    // if there's some kind of letter at the end of the string we need to multiply.
    if(!is_numeric(substr($ini_size, -1))) {

        switch(strtoupper(substr($ini_size, -1))) {
            case 'G':
                $bytesize = 1073741824;
                break;
            case 'M':
                $bytesize = 1048576;
                break;
            case 'K':
                $bytesize = 1024;
                break;
        }

        return ($bytesize * (int)substr($ini_size, 0, -1));
    }

    return $ini_size;
}


/**
 * temporary function to make use of the deliver class.
 * In the future the responsible backend should be automaticly loaded
 * and conf.pl should show a list of available backends.
 * The message also should be constructed by the message class.
 *
 * @param object $composeMessage The message being sent.  Please note
 *                               that it is passed by reference and
 *                               will be returned modified, with additional
 *                               headers, such as Message-ID, Date, In-Reply-To,webmail.php
 *                               References, and so forth.
 *
 * @return boolean FALSE if delivery failed, or some non-FALSE value
 *                 upon success.
 *
 */
function deliverMessage(&$composeMessage, $draft=false) {
    global $send_to, $send_to_cc, $send_to_bcc, $mailprio, $subject, $body,
        $username, $popuser, $usernamedata, $identity, $idents, $data_dir,
        $request_mdn, $request_dr, $default_charset, $color, $useSendmail,
        $domain, $action, $default_move_to_sent, $move_to_sent;
    global $imapServerAddress, $imapPort, $sent_folder, $key;

    $rfc822_header = $composeMessage->rfc822_header;
   	echo "ORIGINAL " . html_entity_decode($subject); 
    $abook = addressbook_init(false, true);
    $rfc822_header->to = $rfc822_header->parseAddress($send_to,true, array(), '', $domain);
    $rfc822_header->cc = $rfc822_header->parseAddress($send_to_cc,true,array(), '',$domain, array(&$abook,'lookup'));
    $rfc822_header->bcc = $rfc822_header->parseAddress($send_to_bcc,true, array(), '',$domain, array(&$abook,'lookup'));
    $rfc822_header->priority = $mailprio;
    $rfc822_header->subject = $subject;

    $special_encoding='';        
    if (strtolower($default_charset) == 'iso-2022-jp') {
        if (mb_detect_encoding($body) == 'ASCII') {
            $special_encoding = '8bit';
        } else {
            $body = mb_convert_encoding($body, 'JIS');
            $special_encoding = '7bit';
        }
    }        
    $composeMessage->setBody($body);

    if (preg_match('|^([^@%/]+)[@%/](.+)$|', $username, $usernamedata)) {
        $popuser = $usernamedata[1];
        $domain  = $usernamedata[2];
        unset($usernamedata);
    } else {
        $popuser = $username;
    }
    $reply_to = '';
    $from_mail = $idents[$identity]['email_address'];
    $full_name = utf8_decode($idents[$identity]['full_name']);
    $reply_to  = $idents[$identity]['reply_to'];
    if (!$from_mail) {
        $from_mail = "$popuser@$domain";
    }
    $rfc822_header->from = $rfc822_header->parseAddress($from_mail,true);
    if (!$rfc822_header->from[0]->host) $rfc822_header->from[0]->host = $domain;
    if ($full_name) {
        $from = $rfc822_header->from[0];
        $full_name_encoded = encodeHeader('"' . $full_name . '"');
        if ($full_name_encoded != $full_name) {
            $from_addr = $full_name_encoded .' <'.$from->mailbox.'@'.$from->host.'>';
        } else {
            $from_addr = '"'.$full_name .'" <'.$from->mailbox.'@'.$from->host.'>';
        }
        $rfc822_header->from = $rfc822_header->parseAddress($from_addr,true);
    }
    if ($reply_to) {
        $rfc822_header->reply_to = $rfc822_header->parseAddress($reply_to,true);
    }
    /* Receipt: On Read */
    if (isset($request_mdn) && $request_mdn) {
        $rfc822_header->dnt = $rfc822_header->parseAddress($from_mail,true);
    }

    /* Receipt: On Delivery */
    if (isset($request_dr) && $request_dr) {
        $rfc822_header->more_headers['Return-Receipt-To'] = $from_mail;
    }

    /* multipart messages */
    if (count($composeMessage->entities)) {
        $message_body = new Message();
        $message_body->body_part = $composeMessage->body_part;
        $composeMessage->body_part = '';
        $mime_header = new MessageHeader;
        $mime_header->type0 = 'text';
        $mime_header->type1 = 'plain';
        if ($special_encoding) {
            $mime_header->encoding = $special_encoding;
        } else {
            $mime_header->encoding = '8bit';
        }
        if ($default_charset) {
            $mime_header->parameters['charset'] = $default_charset;
        }
        $message_body->mime_header = $mime_header;
        array_unshift($composeMessage->entities, $message_body);
        $content_type = new ContentType('multipart/mixed');
    } else {
        $content_type = new ContentType('text/html');
        if ($special_encoding) {
            $rfc822_header->encoding = $special_encoding;
        } else {
            $rfc822_header->encoding = '8bit';
        }
        if ($default_charset) {
            $content_type->properties['charset']=$default_charset;
        }
    }

    $rfc822_header->content_type = $content_type;
    $composeMessage->rfc822_header = $rfc822_header;
    if ($action == 'reply' || $action == 'reply_all') {
        global $passed_id, $passed_ent_id;
        $reply_id = $passed_id;
        $reply_ent_id = $passed_ent_id;
    } else {
        $reply_id = '';
        $reply_ent_id = '';
    }

    /* Here you can modify the message structure just before we hand
       it over to deliver */
    $hookReturn = do_hook('compose_send', $composeMessage);
    /* Get any changes made by plugins to $composeMessage. */
    if ( is_object($hookReturn[1]) ) {
        $composeMessage = $hookReturn[1];
    }

    if (!$useSendmail && !$draft) {
        require_once(SM_PATH . 'class/deliver/Deliver_SMTP.class.php');
        $deliver = new Deliver_SMTP();
        global $smtpServerAddress, $smtpPort, $pop_before_smtp, $pop_before_smtp_host;

        $authPop = (isset($pop_before_smtp) && $pop_before_smtp) ? true : false;
        
        $user = '';
        $pass = '';
        if (empty($pop_before_smtp_host))
            $pop_before_smtp_host = $smtpServerAddress;
        
        get_smtp_user($user, $pass);

        $stream = $deliver->initStream($composeMessage,$domain,0,
                $smtpServerAddress, $smtpPort, $user, $pass, $authPop, $pop_before_smtp_host);
    } elseif (!$draft) {
        require_once(SM_PATH . 'class/deliver/Deliver_SendMail.class.php');
        global $sendmail_path, $sendmail_args;
        // Check for outdated configuration
        if (!isset($sendmail_args)) {
            if ($sendmail_path=='/var/qmail/bin/qmail-inject') {
                $sendmail_args = '';
            } else {
                $sendmail_args = '-i -t';
            }
        }
        $deliver = new Deliver_SendMail(array('sendmail_args'=>$sendmail_args));
        $stream = $deliver->initStream($composeMessage,$sendmail_path);
    } elseif ($draft) {
        global $draft_folder;
        $imap_stream = sqimap_login($username, $key, $imapServerAddress,
                $imapPort, 0);
        if (sqimap_mailbox_exists ($imap_stream, $draft_folder)) {
            require_once(SM_PATH . 'class/deliver/Deliver_IMAP.class.php');
            $imap_deliver = new Deliver_IMAP();
            $succes = $imap_deliver->mail($composeMessage, $imap_stream, $reply_id, $reply_ent_id, $imap_stream, $draft_folder);
            sqimap_logout($imap_stream);
            unset ($imap_deliver);
            $composeMessage->purgeAttachments();
            return $succes;
        } else {
            $msg  = '<br />'.sprintf(_("Error: Draft folder %s does not exist."),
                htmlspecialchars($draft_folder));
            plain_error_message($msg, $color);
            return false;
        }
    }
    $succes = false;
    if ($stream) {
        $deliver->mail($composeMessage, $stream, $reply_id, $reply_ent_id);
        $succes = $deliver->finalizeStream($stream);
    }
    
    if (!$succes) {        
        $msg  = _("Message not sent.") .' '.  _("Server replied:") .
            "\n<blockquote>\n" . $deliver->dlv_msg . '<br />' .
            $deliver->dlv_ret_nr . ' ' .
            $deliver->dlv_server_msg . "</blockquote>\n\n";
        echo $msg;
        exit();
    } else {        
        unset ($deliver);
        $imap_stream = sqimap_login($username, $key, $imapServerAddress, $imapPort, 0);

        // mark original message as having been replied to if applicable
        global $passed_id, $mailbox, $action;
        if ($action == 'reply' || $action == 'reply_all') {
            sqimap_mailbox_select ($imap_stream, $mailbox);
            sqimap_messages_flag ($imap_stream, $passed_id, $passed_id, 'Answered', false);
        }

        // copy message to sent folder
        $move_to_sent = getPref($data_dir,$username,'move_to_sent');
        if (isset($default_move_to_sent) && ($default_move_to_sent != 0)) {
            $svr_allow_sent = true;
        } else {
            $svr_allow_sent = false;
        }

        if (isset($sent_folder) && (($sent_folder != '') || ($sent_folder != 'none'))
                && sqimap_mailbox_exists( $imap_stream, $sent_folder)) {
            $fld_sent = true;
        } else {
            $fld_sent = false;
        }

        if ((isset($move_to_sent) && ($move_to_sent != 0)) || (!isset($move_to_sent))) {
            $lcl_allow_sent = true;
        } else {
            $lcl_allow_sent = false;
        }

        if (($fld_sent && $svr_allow_sent && !$lcl_allow_sent) || ($fld_sent && $lcl_allow_sent)) {
            require_once(SM_PATH . 'class/deliver/Deliver_IMAP.class.php');
            $imap_deliver = new Deliver_IMAP();
            $imap_deliver->mail($composeMessage, $imap_stream, $reply_id, $reply_ent_id, $imap_stream, $sent_folder);
            unset ($imap_deliver);
        }
        $composeMessage->purgeAttachments();
        sqimap_logout($imap_stream);
    }
    return $succes;
}

