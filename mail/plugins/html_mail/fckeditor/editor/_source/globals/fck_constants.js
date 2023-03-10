/*
 * FCKeditor - The text editor for internet
 * Copyright (C) 2003-2005 Frederico Caldeira Knabben
 * 
 * Licensed under the terms of the GNU Lesser General Public License:
 * 		http://www.opensource.org/licenses/lgpl-license.php
 * 
 * For further information visit:
 * 		http://www.fckeditor.net/
 * 
 * "Support Open Source software. What about a donation today?"
 * 
 * File Name: fck_constants.js
 * 	Defines some constants used by the editor. These constants are also 
 * 	globally available in the page where the editor is placed.
 * 
 * File Authors:
 * 		Frederico Caldeira Knabben (fredck@fckeditor.net)
 */

// Editor Instance Status.
var FCK_STATUS_NOTLOADED	= window.parent.FCK_STATUS_NOTLOADED	= 0 ;
var FCK_STATUS_ACTIVE		= window.parent.FCK_STATUS_ACTIVE		= 1 ;
var FCK_STATUS_COMPLETE		= window.parent.FCK_STATUS_COMPLETE		= 2 ;

// Tristate Operations.
var FCK_TRISTATE_OFF		= window.parent.FCK_TRISTATE_OFF		= 0 ;
var FCK_TRISTATE_ON			= window.parent.FCK_TRISTATE_ON			= 1 ;
var FCK_TRISTATE_DISABLED	= window.parent.FCK_TRISTATE_DISABLED	= -1 ;

// For unknown values.
var FCK_UNKNOWN				= window.parent.FCK_UNKNOWN				= -1000 ;

// Toolbar Items Style.
var FCK_TOOLBARITEM_ONLYICON	= window.parent.FCK_TOOLBARITEM_ONLYTEXT	= 0 ;
var FCK_TOOLBARITEM_ONLYTEXT	= window.parent.FCK_TOOLBARITEM_ONLYTEXT	= 1 ;
var FCK_TOOLBARITEM_ICONTEXT	= window.parent.FCK_TOOLBARITEM_ONLYTEXT	= 2 ;

// Edit Mode
var FCK_EDITMODE_WYSIWYG	= window.parent.FCK_EDITMODE_WYSIWYG	= 0 ;
var FCK_EDITMODE_SOURCE		= window.parent.FCK_EDITMODE_SOURCE		= 1 ;