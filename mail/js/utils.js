/*
Alguns plugins antigos não funcionam com as novas versões da jquery acima do 1.5, entre os motivos
a função handleError foi removida, abaixo criei uma em branco para que os plugins que não tem mais atualização
ainda continuem funcionando
*/
jQuery.extend({
	handleError: function( s, xhr, status, e ) {
		// If a local callback was specified, fire it
		if ( s.error )
			s.error( xhr, status, e );
		// If we have some XML response text (e.g. from an AJAX call) then log it in the console
		else if(xhr.responseText)
			console.log(xhr.responseText);
	}
});


/**
 * Rotinas e funções do Webmails
 * Autor 2010 Bruno Borges <bruno.borges@brc.com.br>
 *
 */

var flagWidth = false;
//var arraySelectMsg = new Array();
var pressedCtrl = false;
var mailId = new Array();
//Defina qual o loader será usado na requisição
var loader = "#loader";
//Proporção das janelas de leitura e compose
var winP = 0.80;


function sendMDN(url) {
   $.ajax({
       	url: url,
        type: 'GET',
   	    dataType: 'text',
       	success: function(dados) {	
		}
	});
}


function subject(sub1,sub2 ) {
	this.original = sub1;
}
function isValidEmail(strEmail){
	validRegExp = /^[^@]+@[^@]+.[a-z]{2,}$/i;

   // search email text for regular exp matches
    if (strEmail.search(validRegExp) == -1) 
   {
      return false;
    } 
    return true; 
}


function objNewMsg(subject,from){
    this.subject = subject;
    this.from = from;
}

function resizeSubjectVertical(){
    caracteres = Math.round($('.tableHeader th').width()/12);

    if($("#flagSub").val() == 'false')
        arraySubject = [];
    $('.textSubject').each(
        function(index){
            if($("#flagSub").val() == 'false'){
                str = $(this).text();
                arraySubject.push(new subject($(this).text()));
                if(caracteres < str.length)
                    $(this).text(str.substr(0,caracteres) + '...');
                else
                    $(this).text(str);
            }else{
                if(arraySubject[index].original != undefined){
                    str = arraySubject[index].original;
                    if(caracteres < str.length)
                        $(this).text(str.substr(0,caracteres) + '...');
                    else
                        $(this).text(str);
                }
            }
        }
    );
    $("#flagSub").val('true');
}

/* Objeto de mensagens do mailbox*/
function objMsg(mailbox,smtoken,moveButton,startMessage,locate){
    this.mailbox = mailbox;
    this.smtoken = smtoken;
    this.moveButton = moveButton;
    this.startMessage = startMessage;
    this.locate = locate;
}

var mail = new Array();


function selectMsgForId(passed_id){
    $('input:checkbox[value=' + passed_id  + ']').parent()
                                                 .siblings()
                                                 .addClass('readMailBack')
                                                 .end()
                                                 .parent()
                                                 .addClass('readMailBack');
    $('input:checkbox:not(input:checkbox:[value=' + passed_id  + '])')
                                                 .parent()
                                                 .siblings()
                                                 .removeClass('readMailBack')
                                                 .end()
                                                 .parent()
                                                 .removeClass('readMailBack');
    $('input:checkbox[value=' + passed_id  + ']').parent().addClass('readMailBack');
    $('input:checkbox:not(input:checkbox:[value=' + passed_id  + '])').parent().removeClass("readMailBack");
    if($("#alignWebmail").val() == "vertical"){
        $('input:checkbox[value=' + passed_id  + ']').parent().parent().next().children().addClass('readMailBack');
        $('input:checkbox:not(input:checkbox:[value=' + passed_id  + '])').parent().parent().next().children().removeClass('readMailBack');
        $('input:checkbox:not(input:checkbox:[value=' + passed_id  + '])').parent().removeClass('readMailBack');
    }
}


/* Carrega e-mail
 *
 * mailbox = Mailbox onde está a mensagem
 * passed_id = Id da mensagem
 * startMessage = Mensagem inicial default:1
 *
 * */
function loadMail(mailbox,passed_id,startMessage,popup,e,keyboard){
    if(e.ctrlKey)
        return false;

    if(mailbox == null)
        mailbox = "INBOX";
    $.ajax({
        url: 'read_body.php',
        type: 'GET',
        cache:false,
        data: {'mailbox': mailbox,'passed_id':passed_id,'startMessage':startMessage,'view_unsafe_images':1},
        dataType: 'text',
        success: function(dados) {
            $('#read').html(dados);
            if($("#alignWebmail").val() != 'vertical'){
                $("#msg" + passed_id).parent().siblings().css('font-weight','lighter');
                if($("#msg" + passed_id).siblings().filter('div').hasClass('flagMsgUnread')){
                    $("#msg" + passed_id).siblings().filter('div').removeClass('flagMsgUnread');
                    $("#msg" + passed_id).siblings().filter('div').addClass('flagMsgRead');
                    verifyUnread(mailbox);
                }
            }else{
                $("#msg" + passed_id).parent().siblings().css('font-weight','lighter');
                $("#msg" + passed_id).parent().parent().next().children().css('font-weight','lighter');
            }
        }
    });

    if(keyboard != undefined)
        return;
     selectMsgForId(passed_id);

}

function highLightFolder(ele){
    $(".left li .folder").css("color","black");
    if(ele == undefined)
        return false;
    ele.style.color = "red";
}

function contextMenuTrash(){
     $('.left .folder[name$="Trash"]').contextMenu({
            menu: 'myMenuTrash'
    }, function(action, el, pos) {
            switch(action){
                case "open":
                    loadListMails($("#alignWebmail").val(),el.attr("name"),0,0,null,6,1);
                    break;
                case "empty":
                    $.ajax({
                        url: 'empty_trash.php',
                        type: 'GET',
                        cache: false,
                        data: {},
                        dataType: 'text',
                        success: function(dados) {
                            setTimeout("loadFolders(true)",900);
                        }
                    });
                    break;
                case "quit":
                   break;
            }

    });
}

function contextMenuInb(){
     $(".left,.left .folder[name=INBOX]").contextMenu({
            menu: 'myMenuInbox'
    }, function(action, el, pos) {
            switch(action){
                case "open":
                    loadListMails($("#alignWebmail").val(),el.attr("name"),0,0,null,6,1);
                    break;
                case "refresh":
                    loadFolders(true);
                    break;
                case "addfolder":
                    $('#dialogCreate input[name=folder_name]').val("");
                    constructSelect(el.attr("name"));
                    $("#dialogCreate").dialog({
                        resizable: false,
                        height: 160
                    });
                    break;
                case "quit":
                   break;
            }
    });
}
function contextMenuOut(){
     $('.left .folder[name$="Drafts"],.left .folder[name$="Sent"]').contextMenu({
            menu: 'myMenuOutr'
    }, function(action, el, pos) {
            switch(action){
                case "open":
                    loadListMails($("#alignWebmail").val(),el.attr("name"),0,0,null,6,1);
                    break;
                case "addfolder":
                    $('#dialogCreate input[name=folder_name]').val("");
                    constructSelect(el.attr("name"));
                    $("#dialogCreate").dialog({
                        resizable: false,
                        height: 160
                    });
                    break;
                case "quit":
                   break;
            }

    });
}
function contextMenuFolder(){
    $('.left .folder:not(.folder[name$="Trash"],.folder[name=INBOX],.folder[name$="Sent"],.folder[name$="Drafts"])').contextMenu({
            menu: 'myMenuFolder'
    }, function(action, el, pos) {
            switch(action){
                case "open":
                    loadListMails($("#alignWebmail").val(),el.attr("name"),0,0,null,6,1);
                    break;
                case "addfolder":
                    $('#dialogCreate input[name=folder_name]').val("");
                    constructSelect(el.attr("name"));
                    $("#dialogCreate").dialog({
                        resizable: false,
                        height: 160
                    });
                    //createFolder(nameFolder,subFolder);
                    break;
                case "rename":
                    name = el.children('span:first').text();
                    nameFull = el.attr("name");
                    $(el).empty();
                    $('<input type="text" size="10" value="' + name + '"style="font-size:8pt;height:22px;">').appendTo(el);
                    $(el).children().focus();
                    $(".folder input").blur(
                        function(){
                            $(el).empty();
                            $(el).text(name);
                        }
                    );
                    $(".folder input").keydown(
                        function(e){
                            if(e.keyCode == 13){
                                newName = $(".folder input").val();
                                if(name != newName && newName != ""){
                                    renameFoldersDialog(newName,name,nameFull);
                                    $(el).empty();
                                    $(el).text(newName);
                                    $(el).attr("name",newName);
                                    setTimeout("loadFolders(true)",5000);
                                }else{
                                    $(el).empty();
                                    $(el).text(name);
                                }
                            }
                        }
                    );
                    $(".folder input").change(
                        function(){
                            newName = $(".folder input").val();
                            if(newName == ""){
                                $(el).empty();
                                $(el).text(name);
                            }else{
                                renameFoldersDialog(newName,name,nameFull);
                                $(el).empty();
                                $(el).text(newName);
                                $(el).attr("name",newName);
                                setTimeout("loadFolders(true)",5000);
                            }
                        }
                    );
                    break;
                case "delete":
                   confirmDeleteFolder(el.attr("name"));
                   break;
                case "quit":
                   highLightFolder();
                   break;
            }

    });
}
/*
 * Menu de contexto
 *
 **/
function contextMenu(){
    $(".gridmail td").contextMenu({
            menu: 'myMenu'
    }, function(action, el, pos) {
            $(el).siblings().addClass('highlight').end().addClass('highlight');
            msg = new Array();

            $(el).siblings().children("input[type=checkbox]").each(
                function(){
                    msg[0] = $(this).val();
                }
            );
            $(el).siblings().children("input[type=checkbox]").attr('checked', true);
            id = $(el).siblings().children("input[type=checkbox]").attr("value");
            box = $("input:hidden[name=mailbox]").val();
            start = $("input:hidden[name=startMessage]").val();
            smtoken = $("input:hidden[name=smtoken]").val();
            targetMailbox = $('select[name=targetMailbox]').val();
            locate = $("input:hidden[name=location]").val();

            if(id == undefined){
                $(el).parent().prev().children().children("input[type=checkbox]").attr('checked', true);
                id = $(el).parent().prev().children().children("input[type=checkbox]").attr("value");
            }

            switch(action){
                case "open":
                    loadMailWin(box,id,start,'');
                    break;
                case "reply":
                    openCompose(id,box,start,0,'reply');
                    break;
                case "replyall":
                    openCompose(id,box,start,0,'reply_all');
                    break;
                case "forward":
                    openCompose(id,box,start,0,'forward');
                    break;
                case "editmsg":
                    openCompose(id,box,start,0,'edit_as_new');
                    break;
                case "forward_as_attachment":
                    openCompose(id,box,start,0,'forward_as_attachment');
                    break;
                case "delete":
                    if($('#listmails input[type=checkbox]:checked').size() > 0){
                        $("#dialogConfirmDelete").dialog({
                            resizable: false,
                            height: 160,
                            modal: true,
                            buttons: {
                                Sim: function() {
                                    selectMultipleAction('delete');
                                    $(this).dialog('close');
                                },
                                Cancelar: function() {
                                    $(this).dialog('close');
                                }
                            }
                        });
                    }else{
                        confirmDelete(smtoken,box,targetMailbox,true,msg, start,this);
                    }
                    break;
                case "msgunread": //
                    if($('#listmails input[type=checkbox]:checked').size() > 0){
                        selectMultipleAction("unread");
                    }else{
                        markUnread(smtoken,box,box,"unread",msg,start,locate);
                    }
                    break;
                case "msgread":
                    if($('#listmails input[type=checkbox]:checked').size() > 0){
                        selectMultipleAction("read");
                    }else{
                        markRead(smtoken,box,box,"read",msg,start,locate);
                    }
                    break;
                case "quit":
                   break;
            }


    });
}
/*
 * Altera a cor das células
 **/
function highlight(align){
    $(".gridmail td input[type=checkbox]").click(
        function(){
            if($(this).attr("checked")){                
                $(this).parent().siblings().addClass('highlight');
                $(this).parent().addClass('highlight');
                if(align == 'vertical')
                    $(this).parent().parent().next().children().addClass('highlight');
            }else{                
                $(this).parent().siblings().removeClass('highlight');
                $(this).parent().removeClass('highlight');
                if(align == 'vertical')
                    $(this).parent().parent().next().children().removeClass('highlight');
            }
        }
    );
}

/*
 * Exibe ajuda ao arrastar uma mensagem
 *
 **/
var flagMove = true;
function showAjuda(event,titulo,descricao){
  if(!flagMove){
      $("#boxAjuda").hide();
      return;
  }

  caixa = document.all? document.all.boxAjuda : document.getElementById("boxAjuda");
  if(parseInt($.browser.version,10) == 9){
        $("#boxAjuda").css('visibility','visible');
        $("#boxAjuda").css('top',event.clientY - 10);
        $("#boxAjuda").css('left',event.clientX + 15);
    }else{
        caixa.style.visibility = "visible";
        caixa.style.top = event.clientY + document.body.scrollTop - 10;
        caixa.style.left = event.clientX + document.body.scrollLeft + 15;
    }
}

function MoverAjuda(event){
  if($("#boxAjuda").is(":visible")){
    caixa.style.top = event.clientY + document.body.scrollTop - 10;
    caixa.style.left = event.clientX + document.body.scrollLeft + 15;
  }
}

/*
 * Esconde a ajuda ao soltar uma mensagem
 *
 **/
function hideAjuda(){
    try{
        mousecaixa = document.all? document.all.boxAjuda : document.getElementById("boxAjuda");
        caixa.style.visibility = "hidden";
        $(".move").draggable( "disable" );
        $(".move").draggable( "enable" );
    }catch(e){}
}

/*
 * Soltar mensagens
 **/
function dropMsg(){
    $(".folder").droppable({
        accept: '.gridmail td div',
        cursor:'move',
        out: function(){
           $(this).removeClass('moveMouseFolder');
        },
        over: function(){
           $(this).addClass('moveMouseFolder');
           /*if($(this).next().is(":hidden"))
               $(this).next().show();*/

        },
        drop: function(event, ui) {
            $(this).removeClass('moveMouseFolder');
            //$("#listmails input[type=checkbox]:checked").parent().siblings().removeClass("dragMsg");
            $("#listmail input[type=checkbox]:checked,.listmailVertical input[type=checkbox]:checked,.listmailWindow input[type=checkbox]:checked,#listmails input[type=checkbox]:checked").each(
                function(index){                    
                    mailId[index] = $(this).val();                    
                }
            );
            moveMsg(mail[0].smtoken,mail[0].mailbox,$(this).attr('name'),'Mover',mailId,mail[0].startMessage,mail[0].locate);
            //$("#listmails input[type=checkbox]:checked").parent().siblings().removeClass("dragMsg");
            hideAjuda();
            //verifyUnread();
        }
    });
}

/*
 *Rotina de arrastar mensagens
 **/
function buildDrag(){
    $(".move div").draggable({
        scroll: false,
        helper:'',
        start:function(e){
            $(this).parent().siblings().children("input[type=checkbox]").attr('checked', true);
            $(this).parent().addClass("highlight");
            $(this).parent().siblings().addClass("highlight");
            if($('#alignWebmail').val() == 'vertical'){ 
                $(this).parent().parent().next().children().addClass("highlight");
            }

            mail[0] = new objMsg($("input:hidden[name=mailbox]").val(),$("input:hidden[name=smtoken]").val(),"moveButton", $("input:hidden[name=startMessage]").val(),$("input:hidden[name=locate]").val());

            $("#boxAjuda ul").empty();
            $(".listmailVertical input[type=checkbox]:checked,.listmailWindow input[type=checkbox]:checked,#listmails input[type=checkbox]:checked").each(
                function(){                    
                    if($('#alignWebmail').val() == 'vertical'){                        
                        $("<li style='margin: 0;' >" + $(this).parent().parent().find(".textSubject").text() + "&nbsp;&nbsp;</li>").appendTo("#boxAjuda ul");
                    }else{                                                
                        $("<li style='margin: 0;'>" + $(this).parent().parent().find(".textSubject").text() + "&nbsp;&nbsp;</li>").appendTo("#boxAjuda ul");                        
                    }
                }
            );
        },
        drag: function(event, ui) {
            if(flagMove){
                showAjuda(event ,'titulo','descricao');
                //$('.gridmail td').removeClass("dragMsg");
            }

        },
        stop: function(){;
            hideAjuda();

            /*if($("#alignWebmail").val() == 'vertical')
                $("#listmails input[type=checkbox]:checked").parent().parent().next().find('.tdSubject').removeClass("dragMsg");
            $("#listmails input[type=checkbox]:checked").parent().siblings().removeClass("dragMsg");
            $("#listmails input[type=checkbox]:checked").parent().removeClass("dragMsg");*/

            if($(".highlight").size() == 0){
                $('#listmails input:checkbox').attr("checked",false);
            }
            /*$(this).siblings()
                   .removeClass("dragMsg")
                   .end()
                   .removeClass("dragMsg");*/
        }
    });
}
//var isDrag;
function dragMsg(){
    buildDrag();
}

/* Selecionar múltiplas mensagens*/
function selectMultiple(){
    $('.gridmail tr:not(.gridmail tr:empty)').toggle(function(e) {
        if(e.ctrlKey || e.metaKey){
            if($('#alignWebmail').val() == 'vertical'){
                if($(this).children().hasClass('readMailBack')){
                    if($(this).children().hasClass('tdSubject')){
                        $(this).children().removeClass('readMailBack');
                        $(this).prev().children().removeClass('readMailBack');
                        $(this).prev().removeClass('readMailBack');
                    }else{
                        $(this).children().removeClass('readMailBack');
                        $(this).prev().removeClass('readMailBack');
                        $(this).next().children().removeClass('readMailBack');
                    }
                }
                if($(this).children().hasClass('tdSubject')){
                    $(this).prev().children().addClass('highlight');
                    $(this).children().addClass('highlight');
                    $(this).prev().children().find("input[type=checkbox]").attr("checked",true);
                }else{                    
                    if($(this).children().hasClass('fromVertical')){
                        $(this).children().addClass('highlight');
                        $(this).prev().children().addClass('highlight');
                        $(this).prev().find('.tdCheck').find("input[type=checkbox]").attr("checked",true);
                    }else{
                        $(this).children().addClass('highlight');
                        $(this).next().children().addClass('highlight');
                        $(this).children().find("input[type=checkbox]").attr("checked",true);
                    }
                }
            }else{
                if($(this).children().hasClass('readMailBack')){
                    $('.gridmail tr').children().removeClass('readMailBack');
                }
                $(this).children().addClass('highlight');
                $(this).children().find("input[type=checkbox]").attr("checked",true);
            }
        }else{
            $('.gridmail tr').children().removeClass('highlight');
            $('.gridmail td').removeClass("dragMsg");
            $('#listmails input:checkbox').attr("checked",false);
        }
    $(this).focus();
        },function(e){
            if(e.ctrlKey || e.metaKey){
                if($('#alignWebmail').val() == 'vertical'){
                    if($(this).children().hasClass('tdSubject')){
                        $(this).prev().children().removeClass('highlight');
                        $(this).children().removeClass('highlight');
                        $(this).prev().children().find("input[type=checkbox]").attr("checked",false);
                    }else{
                        $(this).children().removeClass('highlight');
                        $(this).next().children().removeClass('highlight');
                        $(this).children().find("input[type=checkbox]").attr("checked",false);
                    }
                }else{
                    $(this).children().removeClass('highlight');
                    $(this).children().find("input[type=checkbox]").attr("checked",false);
                }
            }else{
                $('.gridmail tr').children().removeClass('highlight');
                $('.gridmail tr').children().find("input[type=checkbox]").attr("checked",false);
            }
            $(this).focus();

        }
    );
}

/* Carrega lista de e-mails
 *
 * align = Alinhamento do webmail
 * mailbox = Nome do mailbox
 * showall = Exibe todas as mensagens
 * cache = Cache para carregar as mensagens já lidas
 * passed_id Id da mensagem a ser selecionada
 * */

function loadListMails(align,mailbox,showall,cache,passed_id,sort,startMessage,notcleanread){    
    //.labelTo	
	//alert(sort + ' ' + sort + ' ' + 'statMessage ' + statMessage);

	$('#controlPage').show();
	if(notcleanread == undefined || notcleanread != 1)
	    $('#read').html('');


	//alert(arraySubject.length);
	$("#flagSub").val('false');

    if(mailbox == 'INBOX.Sent'){
        $('.labelTo').show();
        $('.labelFrom').hide();
    }else{
        $('.labelTo').hide();
        $('.labelFrom').show();
    }
    if($("#calendar").is(':visible')){
        $('.right').show();
        $("#calendar").hide();
    }
    if(passed_id == undefined || passed_id == "")
        passed_id = null;

    if(sort == undefined)
        sort = 6;
    if(startMessage == undefined){
        if($("#numPage").val() == 1 || $("#numPage").size() == 0 )
            startMessage = 1;
        else
            startMessage =  1 + ($("#numPage").val() * $("#show_num").val() - $("#show_num").val());
    }

    if($('.right').is(":hidden")){
       // $(".pagelink").hide();
       // $(".right").show();
    }

    if (mailbox == null)
        mailbox = 'INBOX';
    if(showall == null)
        showall = 0;
    if(cache == null)
        cache = 0;
    $.ajax({
        url: 'right_main.php',
        type: 'GET',
        data: {'startMessage': startMessage,'mailbox':mailbox,'newsort':sort,'PG_SHOWALL':showall,'use_mailbox_cache':cache},
        dataType: 'text',
        success: function(dados) {            
            $(".tableHeader").show();
            $('.listmail').html(dados);
            resizeMail(align);
            contextMenu();
            dragMsg(); //
            if($('.tableHeader').width() ==  $('.listmailHorizontal').width())
                $('.tableHeader').width($('.tableHeader').width() + 2);
            dropMsg();
            check(align);
            $(".gridmail, .gridmail td").css("cursor:pointer;border-color,white");
            $(".headerMsg,.headerMsgVer,#labelBox").show();
            $(".divSubject").width($(".tdSubject").width());
            $(".divFrom").width($(".tdFrom").width());
            $(".divDate").width($(".tdDate").width());
            var size = 0;
            resizeHeaderMail();

            if($("#select_checkbox").val() == 0){
                selectMultiple();
                highlight(align);
            }else{
                $('.tdCheck input').click(
                    function(){
                        if($(this).attr("checked"))							{
                            $(this).parent().siblings().addClass('highlight');
                            $(this).parent().addClass('highlight');
							if(align == 'vertical'){
								$(this).parent().parent().next().children().addClass('highlight');
							}
                        }else{
                            $(this).parent().siblings().removeClass('highlight');
                            $(this).parent().removeClass('highlight');
							if(align == 'vertical'){
                                $(this).parent().parent().next().children().removeClass('highlight');
                            }
                        }
                    }
                );
            }

            $(".gridmail td:not(.tdCheck,.folderEmpty)").click(
                function(event){
                    if(align == 'vertical'){						
                        if($(this).parent().children().find("input:checkbox").val() == undefined)
                            loadMail($("input:hidden[name=mailbox]").val(),$(this).parent().prev().children().find("input:checkbox").val(),$("input:hidden[name=startMessage]").val(),'',event);
                        else
                            loadMail($("input:hidden[name=mailbox]").val(),$(this).parent().children().find("input:checkbox").val(),$("input:hidden[name=startMessage]").val(),'',event);
                    }else
                        loadMail($("input:hidden[name=mailbox]").val(),$(this).parent().children().find("input:checkbox").val(),$("input:hidden[name=startMessage]").val(),'',event);
                }
            );
            $(".gridmail td:not(.tdCheck)").dblclick(
                function(event){
                    if(align == 'vertical'){
                        if($(this).parent().children().find("input:checkbox").val() == undefined)
                            loadMailWin($("input:hidden[name=mailbox]").val(),$(this).parent().prev().children().find("input:checkbox").val(),$("input:hidden[name=startMessage]").val(),'');
                        else
                            loadMailWin($("input:hidden[name=mailbox]").val(),$(this).parent().children().find("input:checkbox").val(),$("input:hidden[name=startMessage]").val(),'');
                    }else{
                        loadMailWin($("input:hidden[name=mailbox]").val(),$(this).parent().children().find("input:checkbox").val(),$("input:hidden[name=startMessage]").val(),'');
                    }
                }
            );
            if(passed_id != null){
                $("#msg" + passed_id).parent().siblings().addClass('readMailBack');
                $("#msg" + passed_id).parent().addClass('readMailBack');
                if(align == 'vertical'){
                    $("#msg" + passed_id).parent().parent().next().children().addClass("readMailBack");
                }
            }
            createControlPaginator(startMessage,mailbox);
            color = $('.listmailHorizontal').css('border-bottom-color');
            if(align != 'vertical'){
                $('.tableHeader th:first').css("border-left","1pt solid " + color);
                $('.tableHeader th:last').css("border-right","1pt solid " + color);
            }
    	    if($("#alignWebmail").val() == 'vertical'){
				resizeSubjectVertical();
			}
        }
    });        
   
}
function constructSelect(selected){
    $.ajax({
        url: 'select_folder.php',
        type: 'POST',
        data: {},
        dataType: 'text',
        success: function(dados) {
            $("#selectfolder").html(dados);
            $('#dialogCreate select option[value="' + selected + '"]').attr("selected","selected");
            $("#dialogCreate input:button").click(
                function(){
                    createFolder($('#dialogCreate input[name=folder_name]').val(),$("#dialogCreate select option:selected").val());
                    $('#dialogCreate input[name=folder_name]').val("");
                    $("#dialogCreate").dialog('close');
                }
            );
        }
    });
}
function renameFoldersDialog(newName,nameOld,folder){
    $.ajax({
        url: 'folders_rename_do.php',
        type: 'POST',
        data: {'new_name':newName,'orig':folder,'old_name':nameOld,'smtoken':$('input[name=smtoken]').val(),'flagAjax':true},
        dataType: 'text',
        success: function(dados) {
          //reloadFolder(2000);
        }
    });
}
function deleteFoldersdelete(mailbox){
    $.ajax({
        url: 'folders_delete.php',
        type: 'POST',
        data: {'mailbox':mailbox,'confirmed':true},
        dataType: 'text',
        success: function(dados) {
            setTimeout("loadFolders(true)",2000);
        }
    });
}

function createFolder(nameFolder,subFolder){
    $.ajax({
        url: 'folders_create.php',
        type: 'POST',
        data: {'folder_name':nameFolder,'subfolder':subFolder,'flagToken':true},
        dataType: 'text',
        success: function(dados) {
            loadFolders(true);
        }
    });
}

// Não carrega todas as pastas ao carregar o webmail
function initFolders(){
     $.ajax({
        url: 'left_main.php',
        type: 'GET',
        data: {'initfolder' : 1},
        dataType: 'text',
        success: function(dados) {
            $('.left').html(dados);
        }
     });
}


function loadFolders(reConstruct){
    $.ajax({
        url: 'left_main.php',
        type: 'GET',
        data: {},
        dataType: 'text',
        success: function(dados) {
            $('.left').html(dados);
            $('.folder').each(
                function(){
                    $(this).click(
                        function(){
                            $('.replyMsgIcon,.forwardMsgIcon,#controlPage,#search').show();
                            $('#searchEvent,.btnImportEvent,.btnDailyCalendar,.btnWeeklyCalendar,.btnMonthlyCalendar,.btnListCalendar').hide();
                            $('.folder').removeClass('selFolder');
                            strFolder = $(this).attr("name");
                            pos = strFolder.lastIndexOf(".");
                            newTitle = strFolder.substr(pos + 1) + ' :::: ' + $("#email").val();
                            $(this).addClass('selFolder');
                            document.title = newTitle;
                            loadListMails($("#alignWebmail").val(),$(this).attr("name"),0,0,null,6,1);
                            verifyUnread(strFolder);
                        }
                    );
                }
            );
            if(reConstruct)
                buildFileTree();

            contextMenuFolder();
            contextMenuTrash();
            contextMenuInb();
            contextMenuOut();
            dropMsg();
            $(".labelNumMSg").corner();
            if(correctionIE)
                $(".labelNumMSg").css('float','none');
            verifyUnread('INBOX');
        }
    });
}

/*Constrói árvore de diretórios*/
function buildFileTree(){
    if($("#browserFake").size() > 0){
        $("#browserFake").treeview({
            collapsed: true,
            animated: "medium",
            control:"#sidetreecontrol"
        });
    }
    $("#browser").treeview({
        collapsed: true,
        persist: "cookie",
        animated: "medium",
        control:"#sidetreecontrol"
    });
    if($("#browser .root-hitarea").hasClass("expandable-hitarea")){
       $("#browser .root-hitarea").trigger('click');
    }

}

/* Rotina do pre-load Ajax
 *
 * String align = Alinhamento do webmail
 * */
function preloadAjax(align){

    $(loader).ajaxStart(function() {
        if($('.background').is(':visible'))
            $('#preloadMini').css('visibility','visible');
        else
            $(this).fadeIn(500);
    });
    $(loader).ajaxStop(function() {
        if($('.background').is(':visible')){
            $('#preloadMini').css('visibility','hidden');
        }else{
            $(this).fadeOut('slow');
            $(loader,'*').hide();
        }

        if(!$(".left").is(":visible")){
            $('.miniCalendar,.left,.header,.right,.barcontrol,#divisorLeft,#divisorVertical').show();
            $('.left').width($('.left').width() - 6);

            $(".tableHeader").width($(".readHorizontal").width());

            if($('.tableHeader').width() ==  $('.listmailHorizontal').width())
                $('.tableHeader').width($('.tableHeader').width() + 2);

			$('#ordermails').click(
				function(){
					if($('#menuSelect').is(":visible"))
                        $('#menuSelect').hide();
					else
						showDropMenu($('#menuSelect'),$(this));
				}
			);

			$('#menuSelect a').click(
				function(){
					$('#menuSelect').hide();
				}
			);

			$(".fromVertical,#read,.tdPar,.tdInpar").mouseover(
				function(){
	                $('#menuSelect').hide();
				}
			);		


            buildFileTree();

            $('.newOption').dblclick(
                function(){
                    openCompose();
                }
            );

            $('.newOption').mouseover(
                function(){
                    if($('#menuReply').is(":visible"))
                        $('#menuReply').hide();
                    showDropMenu($('#menuNew'),$(this));
                }
            );

            $('.replyAllMenu a').click(
                function(){
                    replyDropMenu(true);
                }
            );			

            $('.left,.read,.forwardMsgIcon,.printMsgIcon').mouseover(
                function(){
                    $('.menuDrop').hide();
                }
            );
            $('.replyMsgIcon a,.replyMsgIconEn a').mouseover(
                function(){
                    if($('#menuNew').is(":visible"))
                        $('#menuNew').hide();
                    showDropMenu($('#menuReply'),$(this));
                }
            );
            $('.replyMenu a').click(
                function(){
                    replyDropMenu(false);
                }
            );
            $('.forwardMsgIcon a').click(
                function(){
                    forwardDropMenu();
                }
            );
            $('.deleteMsgIcon').click(
                function(){
                    dropDelMgs();
                }
            );
            $('.printMsgIcon').click(
                function(){
                    id = $("#read #idMsgRead").val();
                    box = $("input:hidden[name=mailbox]").val();
                    print(id,box);
                }
            );
            resizeMail(align);
            space = $(".right").height() - $(".tableHeader").height() - 8;
            $("#listmails").height(space * 0.5);
            $("#read").height(space * 0.5);            
            openLink('options.php','');
            if($.browser.msie)
                $('.barcontrol').height();
         			
			if($("#alignWebmail").val() == 'vertical'){
            	resizeSubjectVertical();
            }
            return;
        }
        resizeMail(align);

    });
    /*if($('#browser').is(":hidden"))
       $('#browser').show();*/
    if($.browser.msie)
        $('.barcontrol').height();
    return;
}
/* Faz a correção no redimensionamento do div na horizontal*/
function resizeWidth(){
    $(".listmailHorizontal,.tableHeader").width($(".readHorizontal").width());
    if($.browser.msie)
        $(".listmailHorizontal").width($(".listmailHorizontal").width() - 2);
    if($('.tableHeader').width() ==  $('.listmailHorizontal').width())
        $('.tableHeader').width($('.tableHeader').width() + 2);

}

/* Faz o redimensionamento da div de leitura de emails e da listagem*/
function resizeMail(align){    
    if(!flagWidth){
       //Dimensiona a barra de controle
       $(".right").width($(".right").width() - 44);
       flagWidth = true;
    }

    if(parseInt($.browser.version,10) == 9){
        $('.tableHeader').css("left","-4px");
        $('.tableHeader').width($('#read').width() + 2);
        $('.listmailHorizontal').width($('#read').width());
    }

    if($.browser.msie)
        $("#divisorLeft").height($(window).height() - $(".header").height());
    if($.browser.mozilla){
        $(".left,.barcontrol div").height(window.innerHeight - $(".header").height() - 10);
        if($('.labelQuota').size() != 0){
            $("#browser,#browserFake").height($(".left").height() - 270);
        }else{
            $("#browser,#browserFake").height($(".left").height() - 180);
        }
    }else{
        $(".left,.barcontrol div").height($(window).height() - $(".header").height() - 10);
        if($('.labelQuota').size() != 0){
            $("#browser,#browserFake").height($(".left").height() - 270);
        }else{
            $("#browser,#browserFake").height($(".left").height() - 200);
        }
    }
    if(align == "horizontal"){
        if($.browser.msie || $.browser.webkit){
            altura = $(window).height() - $(".header").height() - $(".listmailHorizontal").height() - 15;
            if($('#search').is(':visible'))
                $(".readHorizontal").height(altura - 18);
            else
                $(".readHorizontal").height(altura);
            return;
        }
        altura = window.innerHeight - $(".header").height() - $(".listmailHorizontal").height() - 15;
        if($('#search').is(':visible'))
            $(".readHorizontal").height(altura - 18);
        else
            $(".readHorizontal").height(altura);
        return;
    }else if(align == "vertical"){
        if($.browser.msie){
            $('.listmailVertical').height($(window).height() - $(".header").height() - 24);
            $('.readVertical').height($(window).height() - $(".header").height() - 5);
            correctBarIE();
            width = $(window).width() - $('.listmailVertical').width() - $(".left").width() - 55;
            $('.readVertical').width(width);
        }else{
            $('.readVertical').height(window.innerHeight - $(".header").height() - 5);
            $('.listmailVertical').height(window.innerHeight - $(".header").height() - 24);
            width = window.innerWidth - $('.listmailVertical').width() - $(".left").width() - 55;
            $('.readVertical').width(width);
        }
        return;
    }else{
        if($.browser.msie){
            $('.listmailWindow').height($(window).height() - $(".header").height() - 20);
        }else{
            $('.listmailWindow').height(window.innerHeight - $(".header").height() - 20);
        }
    }
}

/* Permite o redimensionamento da listagem do webmail na horizontal*/
function resizeHorizontal(){
    $('.listmailHorizontal').Resizable({
        minWidth: 50,
        minHeight: 50,
        maxWidth: '',
        maxHeight: '',
        minTop: '',
        minLeft: '',
        maxRight: '',
        maxBottom: '',
        handlers: {
            s: '#divisorHorizontal'
        },
        onStop: function(size){
             resizeMail("horizontal");
             resizeWidth();
             resizeCalendar();
            //$('textarea', this).css('height', size.height - 6 + 'px');
        }
    });
    return;
}

/* Corrige o problema com a barra no IE na vertical*/
function correctBarIE(){
    if($.browser.msie){
        heightBar = $(window).height() - $('.header').height();
        $("#divisorVertical").height(heightBar);
    }
    return;
}

var flagSub = false;
var arraySubject = new Array()

/* Permite o redimensionamento da listagem do webmail na Vertical*/
function resizeVertical(){

    $('.listmailVertical').Resizable({
        minWidth: '100',
        minHeight: '100',
        maxWidth: '830',
        maxHeight: '',
        minTop: '',
        minLeft: '',
        maxRight: '',
        maxBottom: '',
        handlers: {
            e: '#divisorVertical'
        },
        onResize: function(size){
          $('.headerMsgVer').width($('.listmailVertical').width());
        },
        onStop: function(size){
       		resizeMail("vertical");
            $('.headerMsgVer').width($('.listmailVertical').width());
			if($("#alignWebmail").val() == 'vertical'){
				resizeSubjectVertical();		
			}
        }
    });
    return;
}

/* Permite o redimensionamento do div esquerdo*/
function resizeLeft(){
    $('.left').Resizable({
        minWidth: '120',
        minHeight: 50,
        maxWidth: '220',
        maxHeight: '',
        minTop: '',
        minLeft: '',
        maxRight: '',
        maxBottom: '',
        handlers: {
            e: '#divisorLeft'
        },
        onStop: function(size){
            $(".right").width($(window).width() - $('.left').width() - 42);
            $(".listmails").width($(window).width() - $('.left').width() - 42);
            resizeHeaderMail();
            resizeWidth();
            resizeMail($('#alignWebmail').val());
        }
    });
    return;
}

/* Abre link em um div interno*/
function openLink(link,ele){    
    if(link == 'options.php' && ele == ''){                
        user = $('#username').val();
        $.ajax({
            url: 'email_option.php',
            type: 'POST',
            data: {'user': user, 'action': 1},
            dataType: 'text',
            success: function(dados) {                
                if(dados == 0){                    
                    $('.dialogOptions').dialog({
                        height: 512,
                        dialogClass: 'windowOptions',
                        width:800,
                        resizable:false,
                        modal: true,
                        close: function() {$(this).hide();}
                    });
                    improvementDialog();
                    minimizeWindow();
                    $(".tab_content").hide(); //Hide all content
                    $("ul.tabs .activeli").addClass("active").show(); //Activate first tab
                    $("#tab1").load('options.php?optpage=personal');
                    $("#tab2").load('options.php?optpage=display');
                    //$("#tab3").load('options.php?optpage=display');
                    $("#tab1").show(); //Show first tab content
                    $("ul.tabs li").click(function() {
                        $("ul.tabs li").removeClass("active"); //Remove any "active" class
                        $(this).addClass("active"); //Add "active" class to selected tab
                        $(".tab_content").hide(); //Hide all tab content
                        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
                        $(activeTab).fadeIn(); //Fade in the active content
                        return false;
                    });
                    return;
                }else{
                    return;
                }
            }
        });
        
    }

    if($(ele).parent().attr('class') == 'options' || $(ele).parent().attr('class') == 'optionsWebmail'){
        $('.dialogOptions').dialog({
            height: 512,
            dialogClass: 'windowOptions',
            width:800,
            resizable:false
            //close: function() {$(this).hide();}
        });

        improvementDialog();
        minimizeWindow();

        $(".tab_content").hide(); //Hide all content
		$("ul.tabs li").removeClass("active");
        $("ul.tabs .activeli").addClass("active").show(); //Activate first tab
        $("#tab1").load('options.php?optpage=personal');
        $("#tab2").load('options.php?optpage=display');
        //$("#tab3").load('../plugins/filters/options.php'); //options.php?action=add
        $("#tab1").show(); //Show first tab content

		$('ul.tabs li').unbind('click');
        $("ul.tabs li").click(function() {
            $("ul.tabs li").removeClass("active"); //Remove any "active" class
            $(this).addClass("active"); //Add "active" class to selected tab
            $(".tab_content").hide(); //Hide all tab content
            var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
            $(activeTab).fadeIn(); //Fade in the active content
            return false;
        });
    }
    if($(ele).parent().attr('class') == 'folders' || $(ele).parent().attr('class') == 'liNewFolder' ){
        $('.dialogFolders').dialog({
            stack:true,
            height: 500,
            width:1000,
            dialogClass: 'windowFolder',
            resizable:false,
            close: function() {$(this).hide();}
        });
        improvementDialog();
        minimizeWindow();
        $("#tabfolder").load('folders.php');

    }
    if($(ele).children().attr('class') == 'iconContact' || $(ele).parent().attr('class') == 'contact' || $(ele).parent().attr('class') == 'liOpenContact'
        || $(ele).parent().attr('class') == 'liOpenGroup'){
        $('.dialogContacts').dialog({
            stack:true,
            height: 510,
            dialogClass: 'windowContacts',
            width:900,
            resizable:false,
            close: function() {$(this).hide();}
        });
        improvementDialog();
        minimizeWindow();

        loadAllContacts()
        loadGroups();

        $('input[name=edit]').click(
            function(){
                showFormAddContacts(true);
            }
        );
        $('.btnRemoveContGroup').click(
            function(){
                $(".ContContact input:checked").each(
                    function(){
                        removeContactGroup($(this).siblings('.nick').val(),$("input[name=selectGroup]").val());
                        loadGroups();
                    }
                );

            }
        );

        if($(ele).parent().attr('class') == 'liOpenContact')
            showFormAddContacts();

        if($(ele).parent().attr('class') == 'liOpenGroup')
            addGroup();


    }

    $('.menuDrop ').hide();
}


function showRequest(formData, jqForm, options) {
    //.rowAttach td *

    return true;
}


function constructForm(id){

    $('input[name=attach]').click(function() {

       if($('.compose input[type=text]:focus').size() > 0){
           return;
       }
       idCompose = '#' + $(this).parents().find('[id^=composeInstance]').attr('id');
       form = idCompose + ' form[name=compose]';
       body = $.URLEncode($(form).children().find('textarea').val());
       $.ajax({
            url: 'compose.php',
            type: 'POST',
            data:  'body=' + body + '&' + 'attach=true&' + $(form).serialize(),
            dataType: 'text',
            success: function(dados) {
            }
        });
    });
    $('a.send').unbind('click');
    $('a.send').click(function() {
		if($('[name=send_to]').val() == "" && $('[name=send_to_cc]').val() == "" && $('[name=send_to_bcc]').val() == ""){
			$(".emptyDestination").slideDown('fast');
			hide = function(){$(".emptyDestination").slideUp("slow")};
			setTimeout(hide,3000);
			return;
		}

        idCompose = '#' + $(this).parents().find('[id^=composeInstance]').attr('id');
        form = idCompose + ' form[name=compose]';	
		body = $.URLEncode(uni2ent($(form).find('textarea').val()));

		$(".sending").slideDown('fast');
        $.ajax({
            url: 'compose.php',
            type: 'POST',
            data: 'body=' + body + '&' + 'send=true&' + $(form).serialize(),
            dataType: 'text',
			error: function(jqXHR,textStatus){
				if($.browser.msie){	
					if(textStatus == 'parsererror'){
			            $(".sending").slideUp('fast');
						$('#listAttach').empty();
	                    $(idCompose + " .rowAttach td *").hide();
       	    	        $(idCompose + " .sendSuccess").slideDown('slow');
						try{
	           	    	    $(idCompose + ' [name=send_to],' + idCompose  + ' [name=send_to_cc],' + idCompose +' [name=send_to_bcc],' + idCompose + ' [name=subject],' + idCompose + ' textarea').val('');
						}catch(err){
						}					
	                    hide = function(){$(idCompose + " .sendSuccess").slideUp("slow"),$(idCompose).dialog("close")}
       		            setTimeout(hide,3000);
					}				

				}
			},
            success: function(dados) {
               str = dados;
			   $(".sending").slideUp('fast');
               if(str.indexOf('not sent') != -1){
                    $(idCompose + ' .sendFail').html(dados);
                    $(idCompose + " .sendFail").slideDown('slow');
                    hide = function(){$(idCompose + " .sendFail").slideUp("slow") }
                    setTimeout(hide,6000);
               }else{
                    $('#listAttach').empty();
                    $(idCompose + " .rowAttach td *").hide();
                    $(idCompose + " .sendSuccess").slideDown('slow');
					try{
	                    $(idCompose + ' [name=send_to],' + idCompose  + ' [name=send_to_cc],' + idCompose +' [name=send_to_bcc],' + idCompose + ' [name=subject],' + idCompose + ' textarea').val('');
					}catch(err){}
                    hide = function(){$(idCompose + " .sendSuccess").slideUp("slow"),$(idCompose).dialog("close")}
                    setTimeout(hide,3000);
               }
            }
        });
    });
    $('a.draft').click(function() {
       idCompose = '#' + $(this).parents().find('[id^=composeInstance]').attr('id');
       form = idCompose + ' form[name=compose]';
       body = $.URLEncode($(form).children().find('textarea').val());
       $.ajax({
            url: 'compose.php',
            type: 'POST',
            data:  'body=' + body + '&' + 'draft=true&' + $(form).serialize(),
            dataType: 'text',
            success: function(dados) {
               $(idCompose + " .draftSuccess").slideDown('slow');
               hide = function(){$(idCompose + " .draftSuccess").slideUp("slow")};
               setTimeout(hide,3000);
            }
        });
    });
}
function showResponse(responseText){ //function showResponse(responseText){
	//$("#listAttach").html(responseText);
    if($("#listAttach .itemsAttach div").size() > 0){
        $(".rowAttach td *").show();
        $('#uploadSucess').show();
        setTimeout("$('#uploadSucess').fadeOut()",5000);
    }else{
        $(".rowAttach td *").hide();
    }
}
function removeAttach(ele){
    $(ele).siblings().filter("input:checkbox").attr("checked",true);
}
/*
 * Abrir o compose
 **/
var instanceCompose = 0;
function openCompose(passed_id,mailbox,startMessage,passed_ent_id,smaction){    
	if(mailbox != undefined){
		while (mailbox.indexOf('+') != -1) {
 			mailbox = mailbox.replace('+', ' ');
		}
	}
    if($('[id^=composeInstance]').size() > 0)
        return;

    alt = $(window).height() * winP;
    larg =  $(window).width() * winP;

    instanceCompose++;
    id = "composeInstance" + instanceCompose;
    dialog = '<div style="width:105% !important;" id="' + id +'" title="Escrever e-mail"><div></div></div>';

    $(dialog).dialog({
        stack:true,
        height: alt,
        dialogClass: 'windowCompose',
        width: larg,
        close: function() {$(this).remove();},
		beforeClose: function(){
			if($(".tempFileAttach").size() > 0){
				var strFile = '';
				$("#dialogAttachDelete").dialog({
					resizable: false,
					height:140,
					buttons: {
						"Sim": function() {
							$('.tempFileAttach').each(
								function(){
									strFile += $(this).val() + '|';
								}
							);
						    $.ajax({
								url:'remove_temp_attach.php',
							    type: 'POST',
							    data: {'file':strFile},
							    dataType: 'text'
							});						
							$(this).dialog("close");							
							win = '#' + id;							
							$(win).remove();				
						},
						Cancel: function() {
							$( this ).dialog( "close" );
						}
					}
				});				
				return false;
			}		
		},
        resize: function(e,ui){
            resizeCompose($("#" + $(this).attr('id')));
        }
    });

    improvementDialog();
    minimizeWindow();
    maximizeWindow();
    
    //minimizeWindow()
    $("#" + id).children().empty();    
    if(passed_id == null && mailbox == null && startMessage == null && passed_ent_id == null && smaction == null){
         $.ajax({
            url:'compose.php',
            type: 'GET',
            data: {'id':instanceCompose},
            dataType: 'text',
            success: function(dados) {                
                $("#" + id).children().html(dados);
                constructForm(id);
                initCompose();
                resizeCompose($("#" + id));
                idForm = '#formComposeInstance' + instanceCompose;                
                $(".btnAttach,#cancelAttach").unbind('click');
		
                $(".btnAttach,#cancelAttach,.btnAttachEn").click(
                   function(){
                      $("#inputAttach").toggle();
                   }
                );
                $("#inputAttach").draggable({cursor: 'move'});
                
            }
        });
    }else{
         $.ajax({
            url:'compose.php',
            type: 'GET',
            data: {'id':instanceCompose,'passed_id':passed_id,'mailbox':mailbox,'startMessage':startMessage,'passed_ent_id':passed_ent_id,'smaction':smaction},
            dataType: 'text',
            success: function(dados) {
                $("#" + id).children().html(dados);
                constructForm(id);
                initCompose();
                $("#inputAttach").draggable({cursor: 'move'});
                resizeCompose($("#" + id));
				  var options={
	                target:"#listAttach",
    	            success: showResponse
        	    };
		        $("#formCompose").ajaxForm(options);

				/*
                $('form[name=compose]').ajaxForm(function(){
                    target: '#listAttach',
                    beforeSubmit:showRequest,
                    success:showResponse,
					error: showResponse
                });*/
                $(".btnAttach,#cancelAttach").unbind('click');
                $(".btnAttach,#cancelAttach").click(
                   function(){
                      idCompose = '#' + $(this).parents().find('.ui-dialog-content').attr('id');
                      $(idCompose + " #inputAttach").toggle();
                   }
                );
                $("#inputAttach").draggable({cursor: 'move'});
            }

        });
    }
    $('.menuDrop ').hide();
    
    return;
}

/* Deletar mensagem */

function deleteMsg(smtoken,mailbox,targetMailbox,strdelete,locate,msg,startmessage,el){
    $.ajax({
        url: 'move_messages.php',
        type: 'POST',
        data: {'smtoken':smtoken,'mailbox':mailbox,'targetMailbox':targetMailbox,'delete':strdelete,'location':locate,msg:[msg.toString()],'startMessage':startmessage},
        dataType: 'text',
        success: function(dados) {
            if($('input[name=flagSearch]').val() == 'true'){
                search($("input:hidden[name=smtoken]").val(),mailbox,$('input[name=whatHidden]').val(),'TEXT');
            }else{
                loadListMails($("#alignWebmail").val(),mailbox,0,0);
            }
            verifyUnread(mailbox);
            $("#read").html('');
        }
    });
}

/* Mover mensagem*/
function moveMsg(smtoken,mailbox,targetMailbox,strmove,msg,startmessage,locate){
    $.ajax({
        url: 'move_messages.php',
        type: 'POST',
        data: {'smtoken':smtoken,'mailbox':mailbox,'targetMailbox':targetMailbox,'moveButton':strmove,'location':locate,msg:[msg.toString()],'startMessage':startmessage},
        dataType: 'text',
        success: function(dados) {
			startMessage =  1 + ($("#numPage").val() * $("#show_num").val() - $("#show_num").val());
            loadListMails($("#alignWebmail").val(),mailbox,0,0,null,6,startMessage);
            verifyUnread(mailbox);
        }
    });
}
/* Marcar mensagem como não lida*/
function markUnread(smtoken,mailbox,targetMailbox,markunread,msg,startmessage,locate){

    $.ajax({
        url: 'move_messages.php',
        type: 'POST',
        data: {'smtoken':smtoken,'mailbox':mailbox,'targetMailbox':targetMailbox,'markUnread':markunread,'location':locate,msg:[msg.toString()],'startMessage':startmessage},
        dataType: 'text',
        success: function(dados) {
          if($('input[name=flagSearch]').val() == true){
              search(smtoken,mailbox,$('input[name=whatHidden]').val(),'TEXT');
          }else
              loadListMails($("#alignWebmail").val(),mailbox,0,0,null,6,1);
          verifyUnread(mailbox);
        }
    });
}
/* Marcar mensagem como lida*/
function markRead(smtoken,mailbox,targetMailbox,markread,msg,startmessage,locate){
    $.ajax({
        url: 'move_messages.php',
        type: 'POST',
        data: {'smtoken':smtoken,'mailbox':mailbox,'targetMailbox':targetMailbox,'markRead':markread,'location':locate,msg:[msg.toString()],'startMessage':startmessage},
        dataType: 'text',
        success: function(dados) {
          if($('input[name=flagSearch]').val() == true)
            search(smtoken,mailbox,$('input[name=whatHidden]').val(),'TEXT');
          else
            loadListMails($("#alignWebmail").val(),mailbox,0,0,null,6,1);
          verifyUnread(mailbox);
        }
    });
}

/* Check */
function check(align){
     $("#check").change(
        function(){
           if($(this).attr('checked')){
               $("#listmails input[type=checkbox],#listmail input[type=checkbox],.listmail input[type=checkbox]")
                .attr("checked",true)
                .parent()
                .siblings()
                .addClass('highlight');
                if(align == 'vertical')
                    $("#listmails input[type=checkbox],#listmail input[type=checkbox],.listmail input[type=checkbox]").parent().parent().next().children().addClass('highlight');
                $("#listmails input[type=checkbox],#listmail input[type=checkbox],.listmail input[type=checkbox]")
                    .parent()
                    .addClass('highlight');
           }else{
                $("#listmails input[type=checkbox],#listmail input[type=checkbox],.listmail input[type=checkbox]")
                .attr("checked",false)
                .parent()
                .siblings()
                .removeClass('highlight');
                 $("#listmails input[type=checkbox],#listmail input[type=checkbox]i,.listmail input[type=checkbox]")
                .parent()
                .removeClass('highlight');
                if(align == 'vertical'){
                    $("#listmails input[type=checkbox],#listmail input[type=checkbox]").parent().parent().next().children().removeClass('highlight');
				}else{
			
				}
           }
        }

     );
}

/*Resize header mail*/
function resizeHeaderMail(){
}

function linksHeader(){
    $('.openCompose').click(
        function(){
            openCompose();
        }
    );
}

function selectMultipleAction(action){

    msg = new Array();
    box = $("input:hidden[name=mailbox]").val();
    start = $("input:hidden[name=startMessage]").val();
    smtoken = $("input:hidden[name=smtoken]").val();
    targetMailbox = $('select[name=targetMailbox]').val();
    locate = $("input:hidden[name=location]").val();
	$('#listmails input[type=checkbox]:checked,.listmailVertical input[type=checkbox]:checked').each(
        function(index){
            msg[index] = $(this).val();
        }
    );
    switch(action){
        case 'delete':
            deleteMsg(smtoken,box,box,'delete',locate,msg,start,'');
            break;
         case 'unread':
            markUnread(smtoken,box,box,"unread",msg,start,locate);
            break;
         case 'read':
            markRead(smtoken,box,box,"unread",msg,start,locate);
            break;
    }
}

function captureKey(e){

    if(e.keyCode == 13 && pressedCtrl == false){
        loadMail($("input:hidden[name=mailbox]").val(),$(".readMailBack input:checkbox").val(),$("input:hidden[name=startMessage]").val(),"","",true);
        return false;
    }
    if(e.keyCode == 40){ //Avança a seleção das mensagens
        if($("#alignWebmail").val() == 'vertical'){
            idMsg = $(".readMailBack input:checkbox").parent().parent().next().next().children().find('input:checkbox').val();
        }else{
            idMsg = $(".readMailBack input:checkbox").parent().parent().next().children().find('input:checkbox').val();
        }

        if(idMsg == undefined){
            idMsg = $(".readMailBack input:checkbox").val();
        }
        selectMsgForId(idMsg);
        $(".gridmail tr").each(
            function(index){
                if($(this).children().hasClass('readMailBack'))
                    ind = index;
            }
        );
        if($("#alignWebmail").val() == 'vertical'){
            alt = ($(".gridmail tr:lt("+ ind + ")").size()) * 20;
            scroll = $('.listmailVertical').scrollTop();
            if(alt > $('.listmailVertical').height() - 80){
                $('.listmailVertical').scrollTop(scroll + 42);
            }
        }else{
            alt = ($(".gridmail tr:lt("+ ind + ")").size()) * 20;
            scroll = $('.listmailHorizontal').scrollTop();
            if(alt > $('.listmailHorizontal').height() - 20){
                $('.listmailHorizontal').scrollTop(scroll + 20);
            }
        }
        return false;
    }
    if(e.keyCode == 38){ //Volta a seleção das mensagens
         if($("#alignWebmail").val() == 'vertical'){
            idMsg = $(".readMailBack input:checkbox").parent().parent().prev().prev().children().find('input:checkbox').val();
         }else{
             idMsg = $(".readMailBack input:checkbox").parent().parent().prev().children().find('input:checkbox').val();
         }

         if(idMsg == undefined){
             idMsg = $(".readMailBack input:checkbox").val();
         }
         $(".gridmail tr").each(
            function(index){
                if($(this).children().hasClass('readMailBack'))
                    ind = index;
            }
        )
        selectMsgForId(idMsg);
        if($("#alignWebmail").val() == 'vertical'){
            alt = ($(".gridmail tr:gt("+ ind + ")").size()) * 20;
            scroll = $('.listmailVertical').scrollTop();
            altd = $('.listmailVertical').height() - 90;
            if(alt > altd){
                $('.listmailVertical').scrollTop(scroll - 42);
            }
        }else{
            alt = ($(".gridmail tr:gt("+ ind + ")").size()) * 20;
            scroll = $('.listmailHorizontal').scrollTop();
            altd = $('.listmailHorizontal').height() - 20;
            if(alt > altd){
                $('.listmailHorizontal').scrollTop(scroll - 20);
            }
        }
       return false;
    }
    //Pressionar delete - Inicio
    if(e.keyCode == 46 || e.keyCode == 8 && $('input:focus').size() == 0){
        if($.browser.webkit){
            if($("#autoCompl").is(':visible') || $('input:focus').size() > 0)
                return;
        }

        if($('.readMailBack input:checkbox').val() != undefined)
            msgA = new Array($('.readMailBack input:checkbox').val());

        if($('input:checkbox:checked').size() == 0 ){
            if($('.tdCheck').hasClass('readMailBack')){
                $("#dialogConfirmDelete").dialog({
                    resizable: false,
                    height: 160,
                    modal: true,
                        buttons: {
                        Sim: function() {
                            deleteMsg($("input:hidden[name=smtoken]").val(),
                            $("input:hidden[name=mailbox]").val(),
                            $('select[name=targetMailbox]').val(),
                            true,
                            $("input:hidden[name=location]").val(),
                            msgA,
                            $("input:hidden[name=startMessage]").val(),'');
                            $(this).dialog('close');
                        },
                        Cancelar: function() {
                            $(this).dialog('close');
                        }
                    }
                });
            }
        }

        if($('input:checkbox:checked').size() > 0){
            $("#dialogConfirmDelete").dialog({
                resizable: false,
                height: 160,
                modal: true,
                    buttons: {
                    Sim: function() {
                        selectMultipleAction('delete');
                        $(this).dialog('close');
                    },
                    Cancelar: function() {
                        $(this).dialog('close');
                    }
                }
            });
        }
        if(e.keyCode == 8)
            return false;
    }
}

function confirmDelete(smtoken,box,targetMailbox,locate,id, start,notice){
      $("#dialogConfirmDelete").dialog({
            resizable: false,
            height: 160,
            modal: true,
            buttons: {
            Sim: function() {
                deleteMsg(smtoken,box,targetMailbox,"Apagar",locate,id, start, '');
                $(this).dialog('close');
                $(notice).parent().parent().find('.close').trigger('click');
                reloadWebmail();
                },
                Cancelar: function() {
                    $(this).dialog('close');
                }
            }
        });
}


var timerNewMsg;
var isNotification = false;
function showNotification(){
    if($(".left").is(":visible") && isNotification == false && isUnreadCycle == false){
        isNotification = true;
        $("#loader").addClass("hideLoad");
        $.ajax({
            url:'notification.php',
            type: 'POST',
            data: {},
            dataType: 'script',
            success: function(dados) {
                $("#loader").removeClass("hideLoad");
                if($('.selFolder').attr('name') == "INBOX"){
                    loadListMails($("#alignWebmail").val(),'INBOX',0,0,null,6,1,1);
                }
                //verifyUnread();
                isNotification = false;
                //timerNot = setInterval('verifiyNew()',1000);
            }
        });
    }
}
var flagTitle = 0;
function changeTitle(from,sub){
    if(flagTitle == 0){
        $(document).attr("title",from);
        flagTitle = 1;
    }else{
        $(document).attr("title",sub);
        flagTitle = 0;
    }
}

function improvementDialog(){

    $('.ui-widget-header:not(.ui-datepicker-header)').append("<a role='button' class='ui-dialog-titlebar-maxi ui-corner-all'><span class='ui-icon ui-icon-extlink maximize'></span></a>");
    $('.ui-dialog-titlebar-maxi:not(.ui-datepicker-header)').hover( function() {$(this).addClass('ui-state-hover');} , function() {$(this).removeClass('ui-state-hover');});
    $('.ui-dialog-titlebar-maxi:not(.ui-datepicker-header)').focus( function() {$(this).addClass('ui-state-focus');} , function() {$(this).removeClass('ui-state-focus');});

    $('.ui-widget-header:not(.ui-datepicker-header)').append("<a role='button' class='ui-dialog-titlebar-min ui-corner-all' ><span class='ui-icon ui-icon-minus'></span></a>");
    $('.ui-dialog-titlebar-min:not(.ui-datepicker-header)').hover( function() {$(this).addClass('ui-state-hover');} , function() {$(this).removeClass('ui-state-hover');});
    $('.ui-dialog-titlebar-min:not(.ui-datepicker-header)').focus( function() {$(this).addClass('ui-state-focus');} , function() {$(this).removeClass('ui-state-focus');})

}

function restore(id){
    $(".hideMsg" + id).show();
    $(this).parent().parent().parent().removeClass('hideMsg' + id);
    $(".iconMinimize" + id).remove();
}

var contMinimize = 0;
function maximizeWindow(){
     var widthOrig;
     var heightOrig;
     var leftOrig;
     var topOrig;

     $('.maximize').toggle(
        function(){
            widthOrig =  $ (this).parent().parent().parent().width();
            heightOrig =  $(this).parent().parent().parent().height();
            leftOrig = $(this).parent().parent().parent().position().left;
            topOrig = $(this).parent().parent().parent().position().top;

            $(this).parent().parent().parent().find("div[id^=composeInstance]").height($(window).height());
            $(this).parent().parent().parent().find("div[id^=composeInstance]").width($(window).width());
            $(this).parent().parent().parent().find('[id^=resInstance]').height($(window).height() - 60);
            $('div[id^=composeInstance] .compose input:text').width($(window).width() - 160);
            if($(this).hasClass('ui-icon-extlink')){
                $(this).removeClass('ui-icon-extlink')
                   .addClass('ui-icon-newwin');
            }
            $(this).parent().parent().parent().width($(window).width());
            $(this).parent().parent().parent().height($(window).height());
            $(this).parent().parent().parent().css({"top":"0","left":"0"});
            resizeEditor();
            if($(".tab_content").is("not(:visible)")){
               resizeCompose($(this).parent().parent().parent().find("div[id^=composeInstance]"));
            }


        },
        function(){
            if($(this).hasClass('ui-icon-newwin')){
                $(this).removeClass('ui-icon-newwin')
                   .addClass('ui-icon-extlink');
            }
            $(this).parent().parent().parent().width(widthOrig);
            $(this).parent().parent().parent().height(heightOrig);
            $(this).parent().parent().parent().find("div[id^=composeInstance]").height(heightOrig);
            $(this).parent().parent().parent().find('[id^=resInstance]').height(heightOrig - 60);
            $(this).parent().parent().parent().find("div[id^=composeInstance]").width(widthOrig);
            $('div[id^=composeInstance] .compose input:text').width(widthOrig - 170);
            $(this).parent().parent().parent().css({"top":topOrig,"left":leftOrig});
            resizeEditor();
            if($(".tab_content").is("not(:visible)")){
               resizeCompose($(this).parent().parent().parent().find("div[id^=composeInstance]"));
            }
        }
    );
}

function minimizeWindow(){
     $('.ui-icon-minus').click(
        function(){
            //.minicompose,.miniread,.minioptions,.minifolder,.minicontacts,.minipic{
            if($(this).parent().parent().parent().hasClass('windowCompose'))
                nameClass = 'minicompose';
            if($(this).parent().parent().parent().hasClass('windowRead'))
                nameClass = 'miniread';
            if($(this).parent().parent().parent().hasClass('windowOptions'))
                nameClass = 'minioptions';
            if($(this).parent().parent().parent().hasClass('windowFolder'))
                nameClass = 'minifolder';
            if($(this).parent().parent().parent().hasClass('windowContacts'))
                nameClass = 'minicontacts';
            if($(this).parent().parent().parent().hasClass('windowPic'))
                nameClass = 'minipic';
            contMinimize++;
            if($(this).parent().parent().parent().find('.subjectMsg td').size() > 0){
                str = $(this).parent().parent().parent().find('.subjectMsg td').html();
                title = str.match(/:&nbsp;&nbsp;.+/).toString();
                title = title.replace(/:&nbsp;&nbsp;/,'').toString();
            }else
                title = $(this).parent().parent().next().children().find("input:hidden").val();
            $("<div title='" + title  + "' class='" + nameClass +" iconMinimize" + contMinimize + "' onclick=restore(" + contMinimize  + ")></div>").appendTo('.barcontrol>div');
            $(this).parent().parent().parent().addClass('hideMsg' + contMinimize);
            $(this).parent().parent().parent().addClass('teste');
            $(this).parent().parent().parent().hide();
        }
    );
}

var isUnreadCycle = false;
function verifyUnread(folder){
    if($(".left").is(":visible") && isNotification == false && isUnreadCycle == false && $('#browserFake').size() == 0){
        isUnreadCycle = true;
        $.ajax({
            url:'unread_ajax.php',
            type: 'POST',
            data: {'folder': folder},
            dataType: 'script',
            success: function(dados) {
                try{
                    $(".labelNumMSg").corner();
                }catch(err){

                }
                isUnreadCycle = false;
            }
        });
    }
}


function resizeEditor(){
    //$('iframe[id^=mce]').width($('.windowCompose').width() - 5);
    altWindow = $('.windowCompose').height();
    altEditor =  altWindow - 300;
	console.log(altEditor);
    CKEDITOR.config.height = altEditor;
    //$('iframe[id^=mce]').height(altEditor);
}


function resizeCompose(id){
    $(id).width($(id).parent().width());
    $(id).find('.compose input:text').width($(id).parent().width() - 170);
    $(id).find('#inputAttach').css('top',$(id).find('input[name=send_to_cc]').position().top + 90);
    resizeEditor();
}

function initCompose(){
    //rowBcc rowCc
    $('.ShowHideCC').click(
        function(){
            $(this).parent().parent().siblings().filter('.rowCc').children().children().slideToggle('fast');
        }
    );
    $('.hideBcc').click(
        function(){
            $(this).parent().parent().siblings().filter('.rowBcc').children().children().slideToggle('fast');
        }
    );

}


function initEditor(input){
//	tinymce.PluginManager.load('moxiemanager', '/js/moxiemanager/plugin.min.js');
	$( document ).ready( function() {
		if($('#language').val() == 'pt_BR'){
			$( 'textarea:visible' ).ckeditor(
				{
					language: 'pt-br',	
				}
			);
		}else{
			$( 'textarea:visible' ).ckeditor();	
		}

	} );

/*
	tinymce.init({
					selector: "textarea",
					 plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"	
						});
$( document ).ready( function() {
	$( 'textarea#editor1' ).ckeditor();
} )e
*/

	/*
	tinymce.init(
		{
			selector:'textarea',
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"

		}
	);
	*/
	/*
	$(input).tinymce({ 
		setup : function(ed) {
				ed.onPostRender.add(function(ed, cm) {
				resizeEditor();
			});
		},
		width:'100%',
        height:'100%',
        script_url : '../js/tinymce_safari/jscripts/tiny_mce/tiny_mce.js',
        plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
        // General options
        theme : "advanced",
        // Theme options
        theme_advanced_buttons1 : "cut,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect,paste,pastetext,pastword,image,undo,redo,link,unlink,forecolor,backcolor,code,tablecontrols",
        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : false,
		force_p_newlines:false,
        // Example content CSS (should be your site CSS)
        content_css : "css/content.css",
		force_br_newlines : true,
		force_p_newlines : false,
		forced_root_block : '',
        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "lists/template_list.js",
        external_link_list_url : "lists/link_list.js",
        external_image_list_url : "lists/image_list.js",
        media_external_list_url : "lists/media_list.js"

        // Replace values for the template plugin

	});
	*/
    //setTimeout('resizeEditor()',1000);
    //$(".textareaCompose:first").tinymce().focus();
}

function createControlPaginator(startmessage,mailbox){
    $.ajax({
        url:'get_paginator.php',
        type: 'POST',
        data: {'startmessage':startmessage,'mailbox':mailbox},
        dataType: 'text',
        success: function(dados) {
            $("#barmenucontrol #controlPage").html(dados);
            $('#numPage').keydown(
                 function(e){
                    if(e.keyCode == 13){
                       var flagPage = true;
                       if($(this).val() <  parseInt($("#TotalPages").text()) && $(this).val() > 0){
                          msg = ($(this).val() - 1) * $('input[name=show_num]').val() + 1;
                          loadListMails($("#alignWebmail").val(),$('input[name=mailbox]').val(),0,0,null,6,msg);                          
                       }else{
                           return;
                       }
                    }
                 }
            );
        }
    });
}


function search(smtoken,mailbox,what,where){
    align = $("#alignWebmail").val();	
    $.ajax({
        url:'search.php',
        type: 'GET',
        data: {'smtoken':smtoken,'mailbox':mailbox,'where':where,'what':what},
        dataType: 'text',
        success: function(dados) {
			$('#controlPage').hide();
            $(".listmail").html(dados);
            resizeMail(align);
            contextMenu();
            highlight(align);            
            dragMsg(); //
            if($('.tableHeader').width() ==  $('.listmailHorizontal').width())
                $('.tableHeader').width($('.tableHeader').width() + 2);
            dropMsg();
            check(align);
            $(".gridmail, .gridmail td").css("cursor:pointer;border-color,white");
            $(".headerMsg,.headerMsgVer,#labelBox").show();
            $(".divSubject").width($(".tdSubject").width());
            $(".divFrom").width($(".tdFrom").width());
            $(".divDate").width($(".tdDate").width());
            var size = 0;
            resizeHeaderMail();

            if($("#select_checkbox").val() == 0){
                selectMultiple();                
            }
            
            $(".gridmail td:not(.folderEmpty)").click(
                function(event){
                    if(align == 'vertical'){
                        if($(this).parent().children().find("input:checkbox").val() == undefined)
                            loadMail($("input:hidden[name=mailbox]").val(),$(this).parent().prev().children().find("input:checkbox").val(),$("input:hidden[name=startMessage]").val(),'',event);
                        else
                            loadMail($("input:hidden[name=mailbox]").val(),$(this).parent().children().find("input:checkbox").val(),$("input:hidden[name=startMessage]").val(),'',event);
                    }else
                        loadMail($("input:hidden[name=mailbox]").val(),$(this).parent().children().find("input:checkbox").val(),$("input:hidden[name=startMessage]").val(),'',event);
                }
            );
            $(".gridmail td").dblclick(
                function(event){
                    if(align == 'vertical'){
                        if($(this).parent().children().find("input:checkbox").val() == undefined)
                            loadMailWin($("input:hidden[name=mailbox]").val(),$(this).parent().prev().children().find("input:checkbox").val(),$("input:hidden[name=startMessage]").val(),'');
                        else
                            loadMailWin($("input:hidden[name=mailbox]").val(),$(this).parent().children().find("input:checkbox").val(),$("input:hidden[name=startMessage]").val(),'');
                    }else{
                        loadMailWin($("input:hidden[name=mailbox]").val(),$(this).parent().children().find("input:checkbox").val(),$("input:hidden[name=startMessage]").val(),'');
                    }
                }
            );

            color = $('.listmailHorizontal').css('border-bottom-color');
            if(align != 'vertical'){
                $('.tableHeader th:first').css("border-left","1pt solid " + color);
                $('.tableHeader th:last').css("border-right","1pt solid " + color);
            }
        }
    });
}

function inputSearch(){
    $('#search').show();
    $('input[name=where]').change(
        function(){
            $('#optionSearch').hide();
        }
    );
    $('#search input:text').keyup(
        function(e){
            if(e.keyCode == 13){
                search($("input[name=smtoken]").val(),$("input[name=mailbox]").val(),
                $("input[name=what]").val(),$("input[name=where]:checked").val());
            }
        }
    );
    $('#search input:text').click(
        function(){
            if($(this).hasClass('searchEmpty')){
                $(this).val('');
                $(this).removeClass('searchEmpty');
            }
            $(this).css("color","black");
            $('#optionSearch').hide();
        }
    );
    $('#search img').click(
        function(el){
            elemento = $("#barmenucontrol");
            $('#optionSearch').css('top',elemento.position().top + 19);
            $('#optionSearch').css('left',elemento.position().left + 16);
            $('#optionSearch').show();
        }
    );
}
function saveOptions(){
        
    if($('input.fieldRequired').val() == ''){        
        $('input.fieldRequired').focus();
        return;
    }

    str ="";
    $.ajax({
        url:'options.php',
        type: 'POST',
        data: $('.tab_container form:visible').serialize(),
        dataType: 'text',
        success: function(dados) {
            $.get('ajax.php',{'optage': 'personal'},function(dados) {
                $('#tab1').html(dados);
            },'text');
            $.get('ajax.php',{'optage': 'display'},function(dados) {
                $('#tab2').html(dados);
            },'text');
            str = dados;
            if(str.search('Successfully Saved Options') != -1){
                $(".saveSuccess").slideDown('slow');
                setTimeout("$('.saveSuccess').slideUp('slow')",4000);
                setTimeout("location.href = 'webmail.php'",4300);
            }else{
                $(".saveError").slideDown('slow');
                setTimeout("$('.saveError').slideUp('slow')",8000);
            }
        }
    });
}

function confirmDeleteFolder(name){
    $("#dialogConfirmDeleteFolder").dialog({
        resizable: false,
        height: 160,
        modal: true,
        buttons: {
            Sim: function() {
                deleteFoldersdelete(name);
                $(this).dialog('close');
            },
            Cancelar: function() {
                $(this).dialog('close');
            }
        }
    });
}
function unSubFolders(){
    str = "";
    $(".selectUnsub option:checked").each(
        function(){
            str += '&mailbox[]=' + $(this).val();
        }
    );
    $.ajax({
        url: 'folders_subscribe.php?method=unsub',
        type: 'POST',
        data: 'smtoken=' + $("input:hidden[name=smtoken]").val() + str ,
        dataType: 'text',
        success: function(dados) {
            $("#tabfolder").load('folders.php');
        }
    });

}

function subFolders(){
    str = "";
    $(".selectSub option:checked").each(
        function(){
            str += '&mailbox[]=' + $(this).val();
        }
    );
    $.ajax({
        url: 'folders_subscribe.php?method=sub',
        type: 'POST',
        data: 'smtoken=' + $("input:hidden[name=smtoken]").val() + str ,
        dataType: 'text',
        success: function(dados) {
            $("#tabfolder").load('folders.php');
        }
    });

}

//dialogRename
function renameFolder(){
    $(".dialogRename").dialog({
        resizable: false,
        height: 160,
        modal: true,
        buttons: {
            Sim: function() {
                str = $('select[name=old]').val();
                name = str.substr(str.lastIndexOf('.') + 1);
                renameFoldersDialog($('.dialogRename input[name=newfolder]').val(),name,str);
                loadFolders(true);
                $(this).dialog('close');
            },
            Cancelar: function() {
                $(this).dialog('close');
            }
        }
    });
}

function changeBackGroup(field){
    $(field).addClass('backGroup');
}
function changeBackContact(field){
    $(field).addClass('backContact');
}

function showInfoContact(field){
   $('.ContContact div').css('font-weight','lighter');
   $(field).css('font-weight','bold');
   //$(".ContInfo .content,.divAddGroup").hide();
   $('.infoCont,.divAddGroup').hide();
   $(".ContInfo .content").show();

   $('.nameContact').text($(field).text());
   $(".nickContact").text($(field).children().filter(".nick").val());
   $(".emailContact").text($(field).children().filter(".email").val());
   $(".infoContact").text($(field).children().filter(".extra").val());
   $(".fnContact").text($(field).children().filter(".firstname").val());
   $(".lnContact").text($(field).children().filter(".lastname").val());
   $(".ContInfo .content").load('addressbook.php?showForm=true&editContato=true');
}
function showFormAddContacts(edit){
    $('.infoCont,.divAddGroup').hide();
    $(".ContInfo .content").show()
    if(edit)
        $(".ContInfo .content").load('addressbook.php?showForm=true&editContato=true');
    else
        $(".ContInfo .content").load('addressbook.php?showForm=true');
}
//dress ) [oldnick] => fadf [backend] => 1 [doedit] => 1 )

function editContact(){

    nickname = $('.ContInfo .addrnickname').val();
    strEmail = $('.ContInfo .addremail').val();
    firstname = $('.ContInfo .addrfirstname').val();
    lastname = $('.ContInfo .addrlastname').val();
    label = $('.ContInfo .addrlabel').val();

    str = '&editaddr[nickname]=' + nickname + '&editaddr[email]=' + strEmail + '&editaddr[firstname]=' + firstname
    + '&editaddr[lastname]=' + lastname + '&editaddr[label]=' + label + '&oldnick=' + $(".nickContact").text() +'&doedit=1&backend=1&SUBMIT=Update address';

    $.ajax({
        url: 'addressbook.php',
        type: 'POST',
        data: 'smtoken=' + $("input:hidden[name=smtoken]").val() + str ,
        dataType: 'text',
        success: function(dados) {	
			group = $('.selGroup span').text();
			if(group == ''){
				$(".ContContact .content").load('addressbook.php?showListContact=true');
				$('.nameGroup:first').css("font-weight","bold").addClass('selGroup');
			}else{
				changeGroup(group,'','');
				$('.nameGroup').each(
					function(){
						if($(this).find('.spanNameGroup').text() == group){
							$(this).css("font-weight","bold").addClass('selGroup');
						}
					}
				);		
			}
            //$(".ContContact .content").load('addressbook.php?showListContact=true');
        }
    });
}

function insertContactAjax(str){
	$.ajax({
	    url: 'addressbook.php',
        type: 'POST',
        data: 'smtoken=' + $("input:hidden[name=smtoken]").val() + str ,
        dataType: 'text',
        success: function(dados){
    		if(dados.search("ERRO") != -1){
	        	dialog = '<div id="dialog">' +
            	'<p>' + dados + '</p>' +
        	    '</div>';
    	        $(dialog).dialog(
	 	           { resizable: false }
            	);
        	}
    	    $(".ContContact .content").load('addressbook.php?showListContact=true');
	        $(".ContInfo input:text").val('');
        }
	});
}

function addContact(){
    nickname = $('.ContInfo .addrnickname').val();
    strEmail = $('.ContInfo .addremail').val();
    firstname = $('.ContInfo .addrfirstname').val();
    lastname = $('.ContInfo .addrlastname').val();
    label = $('.ContInfo .addrlabel').val();

    strFields = '&addaddr[nickname]=' + nickname + '&addaddr[email]=' + strEmail + '&addaddr[firstname]=' + firstname
    + '&addaddr[lastname]=' + lastname + '&addaddr[label]=' + label;

	if($('.errorEmailField').size() > 0){
		if($("#language").val() == 'pt_BR')
			str = 'Email invalido, inserir mesmo assim?';
		else
			str = 'Invalid email, do you want use it?';

		dialog = '<div id="dialogFieldMail">' 
		+ str + '</div>';

		$(dialog).dialog({
			resizable: false,
			height:140,
			modal: true,
			buttons: {
				"Sim": function() {
					insertContactAjax(strFields);
					$('.errorEmailField').removeClass();
                    $(this).dialog("close");
				},
				Cancelar: function() {
					$(this).dialog( "close" );
				}
			}
		});
	}else{
		insertContactAjax(strFields);
	}
}
function changeGroup(name,field,all){
    $('.checkAllCon').attr('checked',false);
    $(".nameGroup").css('font-weight','lighter').removeClass('selGroup');
    $(field).css('font-weight','bold').addClass('selGroup');
    $('.infoCont,.ContInfo .content').hide();
    $(".divAddGroup").show();
    $('.Continfo input[type=text]').val(name);

    $("input[name=selectGroup]").val(name);

    $('.btnAddGroup').hide();
    $('.btnRenameGroup,.btnDeleteGroup').show();

    if(all){
        loadAllContacts();
    }else{
        $.ajax({
            url: '../plugins/abook_group/listMembers.php',
            type: 'GET',
            data: 'groupName=' + $("input[name=selectGroup]").val(),
            dataType: 'text',
            success:function(dados){
                $(".ContContact .content").html(dados);
                $(".ContContact .content input:checkbox").change(
                    function(){
                        if($(this).is(":checked"))
                            $(this).parent().addClass('backContactCheck');
                        else
                            $(this).parent().removeClass('backContactCheck');
                    }
                );
            }
        });
    }

    $(".divAddGroup .btnDeleteGroup").click(
        function(){
            removeGroup($("input[name=selectGroup]").val());
            return;
        }
    );

    $(".btnRenameGroup").click(
        function(){
			if($('#nameGroup').val() == "")
				return;
            $.ajax({
                url: '../plugins/abook_group/handler_group.php',
                type: 'GET',
                data: 'action=4&group=' + $("#selectGroup").val() + '&newName=' + $('#nameGroup').val(),
                dataType: 'text',
                success:function(dados){
					group = $('#nameGroup').val();
          			actionLoadGroup(group); 
                    $("input[name=selectGroup]").val($('input[type=text]').val());
                    return;
                }
            });
            return;
        }
    );
}

function addGroup(){
    $('.infoCont,.ContInfo .content').hide();
    $(".divAddGroup").show();
    $('input[type=text]').val('');
    $('.btnAddGroup').show();
    $('.btnRenameGroup,.btnDeleteGroup').hide();
    $(".divAddGroup .btnAddGroup").click(
        function(){
            $.ajax({
                url: '../plugins/abook_group/creategroup.php',
                type: 'GET',
                data: 'group=' + $(".divAddGroup input:text").val(),
                dataType: 'text',
                success: function(dados) {
					if(dados.search("ERROR") != -1){
            			$("#errorGroup").html('ERRO: J&aacute; existe um grupo com esse nome').show();
        	        	setTimeout('$("#errorGroup").hide()',5000);
		            }	
                    loadGroups();
                    $('input[type=text]').val('');
                }
            });
        }
    );
}

function deleteContats(){
    str = '';
    $(".ContContact input[name^⁼sel]:checked").each(
        function(){
            str =  str + '&' + $(this).attr('name') + '=' + $(this).val();
        }
    );
    if($(".ContContact input[name^⁼sel]:checked").size() > 0){
        $.ajax({
            url: 'addressbook.php',
            type: 'POST',
            data: 'smtoken=' + $("input:hidden[name=smtoken]").val() + str + '&deladdr=true',
            dataType: 'text',
            success: function(dados) {
                $(".ContContact .content").load('addressbook.php?showListContact=true');
                loadGroups();
			    $('.checkAllCon').attr('checked',false);
            }
        });
    }else{
        $(".msgContact").show();
        setTimeout('$(".msgContact").hide()',4000);
    }

}
function removeGroup(name){
    $.ajax({
        url: '../plugins/abook_group/handler_group.php',
        type: 'GET',
        data: 'action=3&group=' + name ,
        dataType: 'text',
        success: function(dados) {
            loadGroups();
            $('input[type=text]').val('');
        }
    });
    return;
}

function highLightGroup(group){
	 $('.nameGroup').each(
	     function(){
    	     if($(this).find('.spanNameGroup').text() == group){
        	     $(this).css("font-weight","bold").addClass('selGroup');
	         }
         }
     );
}

function actionLoadGroup(group){
	 $.ajax({
	     url: '../plugins/abook_group/list_abook_group.php',
         type: 'GET',
         data: '',
         dataType: 'text',
         success:function(dados){
         	$(".ContGroup .content").html(dados);
            highLightGroup(group);
            $(".labelNumCont").corner();
            if(correctionIE){
            	$(".labelNumMSg").css('float','none');
            }
      	}
	});
}


function addUserGroup(user,group){
    $.ajax({
        url: '../plugins/abook_group/handler_group.php',
        type: 'GET',
        data: 'action=1&group=' + group + '&user=' + user,
        dataType: 'text',
        success: function(dados) {
            $.ajax({
                url: '../plugins/abook_group/listMembers.php',
                type: 'GET',
                data: 'groupName=' + group,
                dataType: 'text',
                success:function(dados){
                   $(".ContContact .content").html(dados);																																										actionLoadGroup(group);													    
                }
            });
        }
    });
}
function loadGroups(){
    $.ajax({
        url: '../plugins/abook_group/list_abook_group.php',
        type: 'GET',
        data: '',
        dataType: 'text',
        success:function(dados){
            $(".ContGroup .content").html(dados);
            $('.nameGroup:first').css('font-weight','bold').addClass('selGroup');
            $(".labelNumCont").corner();
            if(correctionIE)
                $(".labelNumMSg").css('float','none');
        }
    });
}

function removeContactGroup(user,group){
    $.ajax({
        url: '../plugins/abook_group/handler_group.php',
        type: 'GET',
        data: 'action=2&group=' + group + '&user=' + user,
        dataType: 'text',
        success:function(dados){
            $.ajax({
                url: '../plugins/abook_group/listMembers.php',
                type: 'GET',
                data: 'groupName=' + group,
                dataType: 'text',
                success:function(dados){
                    $(".ContContact .content").html(dados);
					actionLoadGroup(group);
                }
            })
        }
    });
}

function loadAllContacts(page){
	if(page == undefined){
		param =  'showListContact=true';
	}else{
		param =  'showListContact=true&part=' + page;
	}
    $.ajax({
        url: 'addressbook.php',
        type: 'GET',
		cache:true,
        data: param,
        dataType: 'text',
        success:function(dados){
            $(".ContContact .content").html(dados);
            $(".ContContact .content input:checkbox").change(
                function(){
                    if($(this).is(":checked"))
                        $(this).parent().addClass('backContactCheck');
                    else
                        $(this).parent().removeClass('backContactCheck');
                }
            );
        }
    });
}

function showDropMenu(menu,el){
	if(correctionIE){
		$('.menuDrop ul').css({'position' : 'relative', 'left' : '-30px'});
    }

    if($(menu).is(":visible"))
        $(menu).hide();
    else
        $(menu).show();

    $(menu).css('top',$(el).position().top + 19);
	
	if(menu.attr('id') == 'menuSelect'){
	    $(menu).css('left',$(el).position().left - 10);
	    $(menu).css('top',$(el).position().top + 15);
	}else
		$(menu).css('left',$(el).position().left);

}

function reloadWebmail(){
    loadFolders(true);
    loadListMails($("#alignWebmail").val(),"INBOX",0,0,null,6,1);

}
function replyDropMenu(replyAll){
    box = $("input:hidden[name=mailbox]").val();
    start = $("input:hidden[name=startMessage]").val();
    id = $("#read #idMsgRead").val();
    if(id != undefined){
        if(replyAll){
            openCompose(id,box,start,0,'reply_all');
        }else{
            openCompose(id,box,start,0,'reply');
        }
    }
}
function forwardDropMenu(){
    box = $("input:hidden[name=mailbox]").val();
    start = $("input:hidden[name=startMessage]").val();
    id = $("#read #idMsgRead").val();
    if(id != undefined)
        openCompose(id,box,start,0,'forward');
}

function dropDelMgs(){
    msg = new Array();
    msg[0] = $("#read #idMsgRead").val();

    box = $("input:hidden[name=mailbox]").val();
    start = $("input:hidden[name=startMessage]").val();
    smtoken = $("input:hidden[name=smtoken]").val();
    targetMailbox = $('select[name=targetMailbox]').val();
    locate = $("input:hidden[name=location]").val();

    if($('#listmail input[type=checkbox]:checked,#listmails input[type=checkbox]:checked,.listmailVertical input[type=checkbox]:checked').size() > 0){
        $("#dialogConfirmDelete").dialog({
            resizable: false,
            height: 160,
            modal: true,
            buttons: {
            Sim: function() {		
                selectMultipleAction('delete');
                $(this).dialog('close');
            },
            Cancelar: function() {
                $(this).dialog('close');
            }
        }
        });
    }else{
        confirmDelete(smtoken,box,targetMailbox,true,msg, start,this);
    }
}
function print(id,box){
    if(id== undefined)
        return;
    window.open("../src/printer_friendly_main.php?passed_ent_id=0&mailbox=" + box + "&passed_id="+ id +"&view_unsafe_images=","Print","width=800,height=600");
}

function showInfoMsg(el){
    if($(el).find('.hideSub').text() == '+'){
        $(el).siblings().slideDown();
        $(el).find('.hideSub').text('-');
    }else{
        $(el).siblings().slideUp();
        $(el).find('.hideSub').text('+');
    }
}

/*
 *Carrega a lista de contatos em memória
 * return Objeto Json com nome e email
 *
 * **/
function loadContacts(query){
    var jsonContacts;
    $.ajax({
        url:'search_ajax.php',
        type: 'POST',
        async: false,
        data: {'addrquery': query},
        dataType: 'json',
        success: function(dados) {
            jsonContacts = dados;
        }
    });
    return jsonContacts;
}

function addMailInput(field,campo){
    $("#autoCompl").hide();
    id = $(field).parents().find('[id^=composeInstance]').attr('id');
    campoStr = $('#' + id).find('.compose input:text').eq(campo).val();
    str = $(field).text();
    stremail = str.substring(str.indexOf('<') + 1 ,str.indexOf('>'));
    if(campoStr.indexOf(',') == -1)
        $('#' + id).find('.compose input:text').eq(campo).val(stremail);
    else{
        $('#' + id).find('.compose input:text').eq(campo).val(campoStr.substring(0,campoStr.lastIndexOf(',') + 1) + ' ' + stremail);
    }

}

function highlightLi(field,action){
    if(action == 'add')
        $(field).addClass('selCont');
    else
        $(field).removeClass('selCont');
}

/*
 * Retorna um objeto JSON com os nomes dos grupos do usuário para o autocomplete
 *
 **/
function loadGroupsJson(){
    var jsonGroups;
    $.ajax({
        url:'../plugins/abook_group/handler_group.php',
        type: 'GET',
        async: false,
        data: 'action=6',
        dataType: 'json',
        success: function(dados) {
            jsonGroups = dados;
        }
    });
    return jsonGroups;
}
/*
 * Adicionar o grupo ao input no autocomplete
 **/
function addGroupInput(group,id){
    //id = $(field).parents().find('[id^=composeInstance]').attr('id');
    var jsonGroups;
    strMail = "";
    $.ajax({
        url:'../plugins/abook_group/handler_group.php',
        type: 'GET',
        async: false,
        data: {'action':5,'group':group},
        dataType: 'json',
        success: function(dados) {
            idField =  '#' + $('#autoCompl:visible').parents().find('[id^=composeInstance]').attr('id');
            if(dados.email.length > 0){
                for(i=0; i < dados.email.length; i++){
                    if(dados.email.length - 1 == i)
                        strMail = strMail + dados.email[i];
                    else
                        strMail = strMail + dados.email[i] + ', ';
                }
            }
            campoStr = $(idField).find('.compose input:text').eq(id).val();
            if(campoStr.indexOf(',') == -1){
                $(idField).find('.compose input:text').eq(id).val(strMail);
            }else{
                $(idField).find('.compose input:text').eq(id).val(campoStr.substring(0,campoStr.lastIndexOf(',') + 1) + ' ' + strMail);
            }
        }
    });
    return jsonGroups;
}

function loadFormExport(){
    $('.infoCont,.divAddGroup').hide();
    $(".ContInfo .content").show();
    $(".ContInfo .content").load('addressbook.php?export=1');
}

function showRespImport(responseText, statusText, xhr, $form)  { 
	$('.checkAllCon').attr('checked',false);
	if(responseText.search("ERROR") != -1){
		$("#dialogErrorImport div").html(responseText);
		$("#dialogErrorImport").dialog({
		    resizable: false	
		}); 
	}else{
		$("#dialogErrorImport div").html(responseText);
        $("#dialogErrorImport").dialog({
            resizable: false
        });
	}
    $(".ContContact .content").load('addressbook.php?showListContact=true');
	$("#importWin").dialog("close");
} 

function verifyFieldsImport(){
	if($("#importWin select option:selected[value=3],#importWin select option:selected[value=1],#importWin select option:selected[value=0]").size() < 3 ){
		$(".infoimport").css('color','red');
		return false;
	}
}

function dialogImport(){
    $("#importWin").dialog({
        width:980,
        height:300
    });
    $('#formImportConfirm').ajaxForm({
		beforeSubmit:verifyFieldsImport,
        success: showRespImport
    });
 }

function loadFormImport(){
    $('.infoCont,.divAddGroup').hide();
    $(".ContInfo .content").show();
    $.ajax({
        url:'addressbook.php',
        type: 'GET',
        data: 'import=1',
        dataType: 'text',
        success: function(dados) {
            $(".ContInfo .content").html(dados);
            $('#importForm').ajaxForm({
                target: '#importWin',
                success:dialogImport
            });
        }
    });

}
var instanceResource = 0;

function dialogImgTexMail(url){
    instanceResource++;
    id = "resInstance" + instanceResource;
    dialog = '<div id="' + id +'"><div></div></div>';

    width = $(window).width() * 0.60;
    height = $(window).height() * 0.60;

    $(dialog).dialog({
        dialogClass: 'windowPic',
        width:width,
        height:height
    });

    improvementDialog();
    maximizeWindow();
    minimizeWindow();
    $("#" + id + " div").load(url);
}

function changeGroupCompose(group){
    $.ajax({
        url: '../plugins/abook_group/handler_group.php',
        type: 'GET',
        data: 'action=7&group=' + group,
        dataType: 'json',
        success:function(dados){
            $("#listComposeContacts").empty();
            for(i = 0; i < dados.name.length; i++){
                $("#listComposeContacts").append('<li onclick=populaInputContact("' + dados.email[i] + '",0)>' + dados.name[i]  + '</li>');
            }
        }
    });
}

function populaInputGroup(group){
    $.ajax({
        url: '../plugins/abook_group/handler_group.php',
        type: 'GET',
        data: 'action=7&group=' + group,
        dataType: 'json',
        success:function(dados){
            for(i = 0; i < dados.email.length; i++){
                if($('textarea:visible').is(':empty'))
                    $('textarea:visible').text(dados.email[i]);
                else
                    $('textarea:visible').text($('textarea:visible').text() + ', ' + dados.email[i]);
            }
        }
    });
}


function populaInputContact(contact){
    ind = $('input[name=radDest]:checked').index();
    if($('.compose input:text').eq(ind).val() == "")
        $('.compose input:text').eq(ind).val(contact);
    else
        $('.compose input:text').eq(ind).val($('.compose input:text').eq(ind).val() + ', ' + contact);
}


function showDialogIdentities(){
    $("#dialogOpIdentities").dialog({
        resizable: false,
        zIndex:3997,
        stack: true,
        height: 500,
        width:700
    });
    $("#dialogOpIdentities div").load('../src/options_identities.php');
}

//Correção falha do firefox
function correctionFF(){
    if($.browser.mozilla || $.browser.webkit){
        if($('.listmailHorizontal').is(':visible') && $('.listmailHorizontal').width() == 0);
            resizeWidth();
        if($('#listmails').position().left == 0)
            resizeWidth();
        if($('.gobox').position() != null){
            if($('.gobox').position().left == 0){

            }
        }
    }
}

function testeLocal(){
    $('.notice').each(
        function(index){$
            if($.browser.msie)
                $(this).show();
        }
    );
}

function errorPage(){
    $(".body").css({"margin":0 , "overflow": "hidden","padding": 0});
    $(".right,#listmails"). width("100%").height("100%").css("overflow", "hidden");
    $(".left,.barcontrol,.header,#read,.tableheader,#divisorleft,.pagelink,#divisorHorizontal").remove();
}


 function sortDate(){
    $('.orderDate').toggle(
        function(){            
            $(".dscOrderSub,.ascOrderSub,.dscOrderFrom,.ascOrderFrom,.dscOrderDate,.ascOrderDate").hide();
            $(".dscOrderDate").show();
            //$('.orderDate div').addClass('iconOrderAsc');
            loadListMails($("#alignWebmail").val(),$("input[name=mailbox]").val(),0,0,null,0)
        },
        function(){
            $(".dscOrderSub,.ascOrderSub,.dscOrderFrom,.ascOrderFrom,.dscOrderDate,.ascOrderDate").hide();
            $(".ascOrderDate").show();
            loadListMails($("#alignWebmail").val(),$("input[name=mailbox]").val(),0,0,null,1)
        },
        function(){            
            orderNormal();
        }
    );
 }
 function sortFrom(){     
     $('.orderFrom').toggle(
        function(){            
            $(".dscOrderSub,.ascOrderSub,.dscOrderFrom,.ascOrderFrom,.dscOrderDate,.ascOrderDate").hide();
            $(".dscOrderFrom").show();
            //$('.orderDate div').addClass('iconOrderAsc');
            loadListMails($("#alignWebmail").val(),$("input[name=mailbox]").val(),0,0,null,2);
        },
        function(){
            $(".dscOrderFrom").hide();
            $(".ascOrderFrom").show();
            loadListMails($("#alignWebmail").val(),$("input[name=mailbox]").val(),0,0,null,3);
        },
        function(){            
            orderNormal();
        }
     );
 }
 function sortSub(){
     $('.orderSubject').toggle(
        function(){             
            $(".ascOrderSub,.dscOrderFrom,.ascOrderFrom,.dscOrderDate,.ascOrderDate").hide();
            $(".dscOrderSub").show();
            loadListMails($("#alignWebmail").val(),$("input[name=mailbox]").val(),0,0,null,4);
        },
        function(){
            $(".dscOrderSub").hide();
            $(".ascOrderSub").show();
            loadListMails($("#alignWebmail").val(),$("input[name=mailbox]").val(),0,0,null,5);
        },
        function(){
            orderNormal();
        }
     );
 }
 function sortSize(){
     $('.orderSize').toggle(
        function(){
            $(".ascOrderSub,.dscOrderFrom,.ascOrderFrom,.dscOrderDate,.ascOrderDate").hide();
            $(".dscOrderSize").show();
            loadListMails($("#alignWebmail").val(),$("input[name=mailbox]").val(),0,0,null,8);
        },
        function(){
            $(".dscOrderSize").hide();
            $(".ascOrderSize").show();
            loadListMails($("#alignWebmail").val(),$("input[name=mailbox]").val(),0,0,null,9);
        },
        function(){
            orderNormal();
        }
     );
 }
 function orderNormal(){
     $(".ascOrderSub,.dscOrderFrom,.ascOrderFrom,.dscOrderDate,.ascOrderDate").hide();
     loadListMails($("#alignWebmail").val(),$("input[name=mailbox]").val(),0,0,null,6);
 }

function ucfirst(str) {
    var firstLetter = str.substr(0, 1);
    return firstLetter.toUpperCase() + str.substr(1);
}
function uni2ent(srcTxt) {
  var entTxt = '';
  var c, hi, lo;
  var len = 0;
  for (var i=0, code; code=srcTxt.charCodeAt(i); i++) {
    var rawChar = srcTxt.charAt(i);
    // needs to be an HTML entity
    if (code > 255) {
      // normally we encounter the High surrogate first
      if (0xD800 <= code && code <= 0xDBFF) {
        hi  = code;
        lo = srcTxt.charCodeAt(i+1);
        // the next line will bend your mind a bit
        code = ((hi - 0xD800) * 0x400) + (lo - 0xDC00) + 0x10000;
        i++; // we already got low surrogate, so don't grab it again
      }
      // what happens if we get the low surrogate first?
      else if (0xDC00 <= code && code <= 0xDFFF) {
        hi  = srcTxt.charCodeAt(i-1);
        lo = code;
        code = ((hi - 0xD800) * 0x400) + (lo - 0xDC00) + 0x10000;
      }
      // wrap it up as Hex entity
      c = "&#x" + code.toString(16).toUpperCase() + ";";
    }
    else {
      c = rawChar;
    }
    entTxt += c;
    len++;
  }
  return entTxt;
}

var Utf8 = {
 
	// public method for url encoding
	encode : function (string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";
 
		for (var n = 0; n < string.length; n++) {
 
			var c = string.charCodeAt(n);
 
			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}
 
		}
 
		return utftext;
	},
 
	// public method for url decoding
	decode : function (utftext) {
		var string = "";
		var i = 0;
		var c = c1 = c2 = 0;
 
		while ( i < utftext.length ) {
 
			c = utftext.charCodeAt(i);
 
			if (c < 128) {
				string += String.fromCharCode(c);
				i++;
			}
			else if((c > 191) && (c < 224)) {
				c2 = utftext.charCodeAt(i+1);
				string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
				i += 2;
			}
			else {
				c2 = utftext.charCodeAt(i+1);
				c3 = utftext.charCodeAt(i+2);
				string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
				i += 3;
			}
 
		}
 
		return string;
	}
 
}















