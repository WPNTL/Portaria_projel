function addContact(){
    nickname = $('.ContInfo .addrnickname').val();
    strEmail = $('.ContInfo .addremail').val();
    firstname = $('.ContInfo .addrfirstname').val();
    lastname = $('.ContInfo .addrlastname').val();
    label = $('.ContInfo .addrlabel').val();

    strFields = '&addaddr[nickname]=' + nickname + '&addaddr[email]=' + strEmail + '&addaddr[firstname]=' + firstname
    + '&addaddr[lastname]=' + lastname + '&addaddr[label]=' + label;

    if($('.errorEmailField').size() > 0){ 
        str = 'Invalid email, do you want use it?';
        dialog = '<div id="dialogFieldMail">' 
        + str + '</div>';

        $(dialog).dialog({
            resizable: false,
            height:140,
            modal: true,
            buttons: {
                "Yes": function() {
                    insertContactAjax(strFields);
                    $('.errorEmailField').removeClass();
                    $(this).dialog("close");
                },
                Cancel: function() {
                    $(this).dialog( "close" );
                }
            }
        });
    }else{
        insertContactAjax(strFields);
    }
}

function loadMailWin(mailbox,passed_id,startMessage,popup){    
	str = mailbox;
    mailbox = str.replace('+',' ');

    alt = $(window).height() * winP;
    larg =  $(window).width() * winP;

    id = "readerId" + passed_id;
    if($("#" + id).size() != 0)
        return;
    dialog = '<div id="' + id + '" title="Read"><div></div></div>';
   
    $(dialog).dialog({
         height: alt,
         dialogClass: 'windowRead',
         width:larg,
         close: function(event, ui){
            $(this).remove();
         }
    });
    
    improvementDialog();
    minimizeWindow();
    maximizeWindow();
    if(mailbox == null)
        mailbox = "INBOX";
    $.ajax({
        url: 'read_body.php',
        type: 'GET',
        data: {'mailbox': mailbox,'passed_id':passed_id,'startMessage':startMessage,'view_unsafe_images':1,'win':true},
        dataType: 'text',
        success: function(dados) {            
            $('#' + id + '>div').html(dados);
            str = $('#' + id + '>div .subjectMsg td').html();
            //subj = str.match(/[a-zA-z]+:&nbsp;&nbsp;.+/).toString();
            subj = str.match(/:&nbsp;&nbsp;.+/).toString();
            subj = subj.replace(/:&nbsp;&nbsp;/,'').toString();
            $('#ui-dialog-title-' + id).html(subj);
            $("#msg" + passed_id).parent().siblings().css('font-weight','lighter');
            verifyUnread(mailbox);            
        }
    });    
}

function popupNotification(subject,from,id){
    if($(".notice").size() <= 2)
        $("#closeall").hide();
    if($('#not' + id).size() == 0 ){        
        box = $("input:hidden[name=mailbox]").val();
        if(box == undefined)
            box = "INBOX";
        start = $("input:hidden[name=startMessage]").val();
        smtoken = $("input:hidden[name=smtoken]").val();
        targetMailbox = $('select[name=targetMailbox]').val();
        locate = $("input:hidden[name=location]").val();

        if($('.notice').size() == 5)
            return;
        
        var notice = '<div style="z-index:2700" id="not' + id + '" class="notice">'
        + '<div class="notice-body">'
        + '<div onclick=confirmDelete("' + smtoken + '","' + box + '","' + targetMailbox + '","' + locate + '",' + id
        + ','+ start + ',this) id="deleteM"></div>'
        + '<img src="../images/envelope.gif" alt="" />'
        + '<h3>' + from + '</h3>'
        + '<p style="cursor:pointer !important" onclick=loadMailWin("INBOX",' + id + ',"' + $("input:hidden[name=startMessage]").val() + '",true)>' + subject + '</p>'
        + '</div>'
        + '<div class="notice-bottom">'
        + '</div>'
        + '</div>';
        
        $(notice).purr(
            {
                usingTransparentPNG: true,
                isSticky: true
            }
        );

        $('.notice #deleteM').attr("title","Delete message");
    }
} 
function verifiyNew(){
    try{
        if(totalMsg != undefined && totalMsg > 0){
            if(totalMsg == 1){
                obj = newEmail[0];
                changeTitle("New message of " + obj.from,obj.subject);
            }else
                changeTitle("New messages  ","Total: " + totalMsg);
        }
    }catch(err){}
}

function moveContacts(){
    $(".contactPerson").draggable({
        cursor: "move",
        delay: 300,        
        cursorAt: {left: -20},
        start: function(){
            $(".ContGroup .content .nameGroup").droppable({
            accept: '.contactPerson',
            hoverClass: 'backGroup',
            drop: function(){
                el = $(this);                
                $(".ContContact input:checked").each(
                    function(){
                        $(".nameGroup").css('font-weight','lighter');
                        $(el).css('font-weight','bold');
						if(el.children('.spanNameGroup').text() != "")
	                        addUserGroup($(this).siblings(".nick").val(),el.children('.spanNameGroup').text());
                        loadGroups();
                    }
                );
            }
        });
        },
        helper: function(event){
            $(this).children().filter(":checkbox").attr("checked",true);
            if($(".ContContact input:checked").size() > 1){                
                return $('<div id="moveHelperContacts"><img src="../images/group.png">\n\
                        <span>Total Contatos: ' + $(".ContContact input:checked").size() + '</span></div>');
            }
            if($(".ContContact input:checked").size() == 1){                
                return $('<div id="moveHelperContacts"><img src="../images/contact.png"><span>Total Contatos: ' + $(".ContContact input:checked").size() + '</span></div>');
            }
        }
    });
}
function search_contact(query,field){
    $("#autoCompl").show();
    $("#autoCompl").css("top",field.position().top + field.height() + 4);
    $("#autoCompl").css("left",field.position().left);
    $("#autoCompl ul").empty();

    cont = 0;
    if(field.attr("name") == 'send_to')
        idText = 0;
    if(field.attr("name") == 'send_to_cc')
        idText = 1;            
    if(field.attr("name") == 'send_to_bcc')    
        idText = 2;

    //dadosCon Varíavel global com todos os contatos
    //dadosGroups Varíavel global com todos os grupos
    //dadosGroups
    for(i = 0; i <  dadosGroups.groups.length ; i++ ){
        group = dadosGroups.groups[i];
        groupComp = group.toLowerCase();
        if(groupComp.indexOf(query.toLowerCase()) != -1){
            $("#autoCompl ul").append('<li class="listGroup" onclick=addGroupInput("' + group + '",' + idText + ') onmouseout=highlightLi(this,"remove") onmouseover=highlightLi(this,"add")>' + group + ' (GRUPO)</li>');
        }
    }
    for(i = 0; i < dadosCon.nome.length ; i++ ){
        if($.browser.msie){
            name = dadosCon.nome[i].toLowerCase();            
            if(name.indexOf(query.toLowerCase()) != -1){
                $("#autoCompl ul").append('<li class="listContact" onclick=addMailInput(this,idText)  onmouseout=highlightLi(this,"remove") onmouseover=highlightLi(this,"add")>' + name + ' &lt;' + dadosCon.email[i].toLowerCase() + '&gt; </li>');
                cont++;
                if(cont == 15) return;
            }            
        }else{
            name = dadosCon.nome[i].toLowerCase();
            email = dadosCon.email[i].toLowerCase();
            if(name.indexOf(query.toLowerCase()) != -1 || email.indexOf(query.toLowerCase()) != -1){
                $("#autoCompl ul").append('<li class="listContact" onclick=addMailInput(this,idText)  onmouseout=highlightLi(this,"remove") onmouseover=highlightLi(this,"add")>' + name + ' &lt;' + email  + '&gt; </li>');
                cont++;
                if(cont == 15) return;
            }
        }
    }

}

function dialogConfirmCalendar(url){
    instanceResource++;
    id = "resInstance" + instanceResource;
    dialog = '<div title="Success" id="' + id +'"><div>Waiting...</div></div>';
    height = $(window).height() * 0.60;

    $(dialog).dialog({
        dialogClass: 'windowCalendar',
        width:400,
        resizable:false,
        height:170
    });
    $("#" + id + " div").load(url);
}


