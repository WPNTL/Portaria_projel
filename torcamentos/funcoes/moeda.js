var objBrow,LAST_ERR_VALUE="",errorCode=0;
var ERRO=REPET_ERR=false;
var LAST_FIELD=CURRENT_FIELD=LAST_ERR_FIELD=null;
var SZ_DATE=8,
SZ_CEP=8,
SZ_MONEY=20,
SZ_FLOAT=20,
SZ_CPF=11,
SZ_CNPJ=14,
SZ_CPF_CNPJ=SZ_CNPJ,
SZ_PERCENT=6,
SZ_MONTH_YEAR=6,
SZ_TIME=4,
MAX_VALUE=999999999999999.99;

function formatCamp(campo,tp,par1,par2,par3){
var ie=(brow().isIE()&&!brow().isMac()),v=brow().getVersion();
var b=parent.buttons;
if(ie&&(v>=5 && v<5.2)&&b&&b.myBarra&&b.myBarra.clicked==true){
	parent.buttons.myBarra.clicked=false;
	eval("try{campo.focus();}catch(e){}");
	return false;
}
var nArg=formatCamp.arguments.length;
ERRO=false;
var vr=trim(campo.value);
if(!campo|| !vr ||vr.length==0){
	if(/^(neg_)?(money|money2)$/.test(tp))campo.value="0,00";
	return false;
}
if(!campo|| !vr ||vr.length==0){
	if(/^(neg_)?(dataa|datab)$/.test(tp))campo.value="00/00/00";
	return false;
}
if(nArg==2)par1="";
if(tp=="interval"){
	if(nArg<=4)par3="";
	return formatType(campo,tp,par3,par1,par2);
}else return formatType(campo,tp,par1);
}

function formatType(f,tp,msgErr,adarg1,adarg2){
if(tp=="none"){f.value=removeSpcChars(f.value);return true;}
var vr=unformatField(f.value,tp,f.type);
LAST_FIELD=f;
var ret=isValidValue(vr,tp,adarg1,adarg2);
if(!ret){showError(tp,msgErr);return false;}
else if(!_isRE(tp))f.value=getFmtValue((typeof ret=="boolean")?vr:ret,tp);
ERRO=false;
return true;
}

function removeSpcChars(vr,type){
var ret="",re=/197|198|208|215|216|222|223|229|230|240|247|248/,c=0,s=String(vr);
for(var i=0;i<s.length;i++){
	c=s.charCodeAt(i);
	if((c>31&&c<253&&(c<127||c>191)&&!re.test(c))||(type=="textarea"&& (c==9||c==13||c==10)))ret+=s.charAt(i);
}
return ret;
}

function validaConteudo(event,el,tp){
var t=(typeof event.which!="undefined"&& event.which!=null?event.which:event.keyCode),key;
if (t == 13)
   return false;
if(tp=='none' || t<20)return true;
key=removeSpcChars(String.fromCharCode(t),el.type);
if(key=="")return false;
var tp_sp=/^sp_/.test(tp);
if(_isRE(tp))return tp.test(key);
else if(/^(percent|(neg_)?(numeric|float(\d{0,1})|money(\d{0,1})))$/.test(tp)){
	return isNumeric(key)||(!/numeric/.test(tp)&&key==","&&el.value.indexOf(",")==-1)||(/^neg_/.test(tp)&&key=="-" && el.value.indexOf("-")==-1);
}else if(/^(sp_)?alfanumeric$/.test(tp))
	return isAlfaNumeric(key)||(tp_sp && key==" ");
else if(/^(sp_)?textnumber$/.test(tp))
	return isTextNumber(key)||(tp_sp && key==" ");
else{
	switch(tp){
	case "email":return true;
	case "uppercase":return true;
	case "text": case "full_name":return isAlfa(key)|| /[ ]/.test(key);
	case "text_entry":return isTextNumber(key)||/[\.\-\/\,=]|\s/.test(key);
	case "default":return !/'|"/.test(key);
	default:return isNumeric(key);
	}
}
}

function _getNDec(t){
	var arr=t.match(/(\d+)\s*$/);
	return arr?parseInt(arr[1],10):2;
}

function unformatField(valor,tipo,inputType){
var t=(arguments.length<1)?"default":String(tipo),
vr=trim(removeSpcChars((typeof valor=="object"?valor.value:valor),(inputType?inputType:valor.type)));
if(!vr||vr.length==0)return "";
if(/^(date|month_year|time|cep|(neg_)?numeric|interval)$/.test(t))
	vr=(/^neg_/.test(t)&&vr.indexOf("-")==0?"-":"")+justNumbersStr(vr);
else if(/^(percent|(neg_)?(float(\d{0,1})|money(\d{0,1})))$/.test(t))vr=toFloat(vr,_getNDec(t));
else{
	if(/^(cpf|cnpj|cpf_cnpj)$/.test(t)){
		vr=justNumbersStr(vr);
		var isCPF=tipo=="cpf"||(tipo=="cpf_cnpj" && vr.length<=SZ_CPF);
		vr=repeatStr(vr,"0",isCPF?SZ_CPF:SZ_CNPJ);
		if(parseInt(vr,10)==0)vr="";
	}else if(t=="email")vr=trim(vr)
}
if(typeof valor=="object")valor.value=vr;
return vr;
}

function removeCaracs(f,type){
if(_isRE(type))return;
var vr=unformatField(f.value,type,f.type);
if(f.value!=vr)f.value=vr;
focusNetscape(f);
}

function _isRE(re){return typeof re=="object" && typeof re.test=="function";}

function isValidValue(vr,tp,adarg1,adarg2){
var re,isNum=isNumeric(vr);
if(_isRE(tp))return tp.test(vr);
else if(/^(cep)$/.test(tp))
	return isNum && vr.length==eval("SZ_"+tp.toUpperCase());
else if(/^(percent|(neg_)?(float(\d{0,1})|money(\d{0,1})))$/.test(tp))
	return (!/^neg_/.test(tp)&&vr.indexOf("-")!=-1?false:isFloatNumber(vr));
else if(/textnumber$/.test(tp))
	return isTextNumber((tp.indexOf("sp_")==0)?removeStr(vr," "):vr);
else if(/text_entry$/.test(tp))
	return isTextNumber(vr.replace(/[\.\-\/\,=]|\s/g,""));
else if(/alfanumeric$/.test(tp))
	return isAlfaNumeric((tp.indexOf("sp_")==0)?removeStr(vr," "):vr);
else{
	switch(tp){
	case "time":
		switch(vr.length){
		case 1:vr="0"+vr+"00";break;
		case 2:vr+="00";break;
		case 3:vr="0"+vr+"0";break;
		}
		vr=repeatStr(vr,"0",4,"right");
		return(isNum && /^([0-1]\d[0-5]\d)|(2[0-3][0-5]\d)$/.test(vr))?vr:null;
	case "date":var obj=new DateValidation(vr);return (isNum && obj.isDate())?obj:null;
	case "month_year":var obj=new DateValidation("01"+vr);return (isNum && obj.isDate())?obj:null;
	case "text":return isAlfa(vr.replace(/[ ]/g,""));
	case "full_name":return isFullName(vr);
	case "email":return isEmail(vr);
	case "cpf":return isCPF(vr);
	case "cnpj":return isCNPJ(vr);
	case "cpf_cnpj":return (vr.length <=SZ_CPF)?isCPF(vr):isCNPJ(vr);
	case "interval":vr=parseInt(vr,10);return vr>=adarg1 && vr<=adarg2;
	case "default":return !/'|"/.test(vr);
	default:return true;
	}
}
}

function getFmtValue(vr,tp){
	if(tp=="cpf_cnpj")tp=(vr.length <=SZ_CPF)?"cpf":"cnpj";
	if(/^(neg_)?money/.test(tp))return fmtMoney(vr,_getNDec(tp));
	else{
		switch(tp){
		case "time":return vr.slice(0,2)+":"+vr.slice(2,4);
		case "date":return vr.getDateValue();
		case "month_year":return vr.getMonthDateValue();
		case "cep":return vr.slice(0,5)+"-"+vr.slice(5,8);
		case "uppercase":case "full_name": return vr.toUpperCase();
		case "cpf":return vr.slice(0,3)+"."+vr.slice(3,6)+"."+ vr.slice(6,9)+ "-"+vr.slice(9,11);
		case "cnpj":return vr.slice(0,2)+"."+vr.slice(2,5)+"."+vr.slice(5,8)+"/"+vr.slice(8,12)+"-"+vr.slice(12,14);
		default:return vr;
		}
	}
}

function fmtMoney(vr,ndec){
var neg=vr.indexOf("-")==0;
if(verifyMaxValue(vr)){ERRO=true;return "0,00";}
vr=toFloat(vr,ndec);
var vraux="",p,pDec=vr.indexOf(","),vrDec=vr.slice(pDec+1);
for(var i=pDec;i>(neg?1:0);i--){
	p=i-pDec;
	if(i!=pDec&&(p%3==0))vraux+=".";
	vraux+=vr.charAt(i-1);
}
return (neg?"-":"")+invertStr(vraux)+","+vrDec;
}

function setMaxValue(vr){MAX_VALUE=vr;}

function verifyMaxValue(vr){return vr.length>0 &&(parseFloat(vr)>MAX_VALUE);}

function toFloat(src,ndec){
src=trim(src);
if(!/^\-?([0-9]|\.)*\,{0,1}[0-9]*$/.test(src)||src.charAt(0)==".")return src;
var tam=src.length,pDec=src.indexOf(",");
if(src.length==0)src="0";
if(pDec==-1){
	var p=src.indexOf(".");
	if(p!=-1&&p==(tam-ndec-1))src=src.replace(/\.(\d*)$/,",$1");
	else return removeStr(src,".")+","+repeatNStr("0",ndec);
	pDec=src.indexOf(",");
}
src=removeStr(src,".");
if(pDec==0)return "0"+src+repeatNStr("0",ndec+1-src.length);
else{
	if(pDec>(tam-ndec-1))src+=repeatNStr("0",pDec-(tam-ndec-1));
	pDec=src.indexOf(",");
	return parseInt(src.slice(0,pDec),10)+src.slice(pDec,pDec+ndec+1);
}
}

function saltaCampo(ev,field,tp,size){
var max=field.maxLength,tc,nargs=saltaCampo.arguments.length;
if(/^(neg_)?float/.test(tp))
	{//max=(nargs>3)?size:SZ_FLOAT;
   }
else if(/^(neg_)?money/.test(tp)){
	if(!verifyMaxValue(field.value))
	{//max=(nargs>3)?size:SZ_MONEY;
	}
	else field.value="";
}else if(/^(date|month_year|time|cpf|cnpj|cpf_cnpj|cep|percent)$/.test(tp))
	max=eval("SZ_"+tp.toUpperCase());
tc=brow().isNetscape()?ev.which:ev.keyCode;
if ((size != null) && (size != '0'))
    max = size;
if(String(field.value).length>=max && tc>=48){autoSkip(field);return true;}
else return false;
}

function showError(type,msgU){
ERRO=true;
var b=brow(),canShow=true;
if(typeof type=="object" && !_isRE(type)){alert(msgU);focusCamp(type);return;}
if(b.isIE() && parseInt(b.getMajorver(),10)<5){
	if(CURRENT_FIELD && LAST_ERR_FIELD==CURRENT_FIELD && LAST_ERR_VALUE==CURRENT_FIELD.value){
		REPET_ERR=true;
		CURRENT_FIELD.value=LAST_ERR_VALUE="";
		LAST_ERR_FIELD=null;
		canShow=false;
	}else{
		LAST_ERR_FIELD=CURRENT_FIELD;
		LAST_ERR_VALUE=(CURRENT_FIELD?CURRENT_FIELD.value:null);
		REPET_ERR=false;
	}
}
if(canShow){
	var m=". Digite novamente.";
	switch(type){
	case "date":msg="Data inválida"+m;break;
	case "time":msg="Hora inválida"+m;break;
	case "cep":msg="CEP inválido"+m;break;
	case "email":msg="E-mail incorreto"+m;break;
	case "cpf":msg="CPF inválido"+m;break;
	case "cnpj":msg="CNPJ inválido"+m;break;
	case "cpf_cnpj":msg="CPF/CNPJ inválido"+m;break;
	case "month_year":msg="Mês e ano inválidos"+m;break;
	case "full_name":
		switch(errorCode){
			case 0:msg="Nome inválido."+m;break;
			case 1:msg="Informe sobrenome.";break;
			case 2:msg="Informe primeiro nome com mais de 2 caracteres.";break;
			case 3:msg="Informe nome sem caracteres repetidos mais de 3 vezes.";break;
		}
		break;
	default:msg="Valor inválido"+m;
	}
	alert((!msgU || msgU=="")?msg:msgU);
}
if(brow().isNetscape())LAST_FIELD.value="";
if(LAST_FIELD)LAST_FIELD.focus();
}

function focusCamp(f){
if(brow().isNetscape())f.value="";
else f.focus();
ERRO=true;
}

function focusNetscape(f){
CURRENT_FIELD=f;
var b=brow();
if(b.isNetscape()){
	if(ERRO){LAST_FIELD.focus();ERRO=false;}
}else if(b.isIE()&& parseInt(b.getMajorver(),10)>4)if(f.select)f.select();
}

function focusField(f){
if(!f){alert("focusField: Campo não encontrado.");return;}
var ie=(brow().isIE()&&!brow().isMac()),v=brow().getVersion(),b=parent.buttons;
if(ie&&(v>=5 && v<5.2)&&b&&b.myBarra){
	var tp=f.type;
	if(tp && /^(text|password)$/.test(tp)&& f.onblur&&/formatCamp\(/.test(f.onblur)){
	  if(!window.event)window.focus();
	}else b.myBarra.clicked=false;
}
f.focus();
}

function brow(){if(typeof objBrow!="object")objBrow=new Browser();return objBrow;}

function repeatNStr(vr,n){
var r="",i;
for(i=0;i<n;i++)r+=vr;
return r;
}

function unformatFields(form){
var f,i,tp;
if(!form)return;
for(i=0;i<form.length;i++){
	f=form.elements[i];
	if(f.type=="text"){
		tp=getFieldType(f);
		if(tp){vr=unformatField(f.value,tp);f.value=(!vr?"":vr);}
	}
}
}

function getFieldType(f){
var blur=f.onblur;
if(!blur)return null;
var c=changeStr(removeStr(blur.toString()," "),"\'","\"");
c=c.replace(/[\n\t]/g,"").toLowerCase();
var ret=/^.*formatcamp\((.*)\).*$/.exec(c)[1];
return ret.split("\"")[1];
}

function isTextNumber(v){return /^[0-9a-zA-ZáéíóúçãõâêôàÁÉÍÓÚÇÃÕÂÊÔÀ]+$/.test(v);}

function isFloatNumber(n){return /^\-?\d+(,\d+|\d*)$/.test(n);}

function popup(caminho,nome,largura,altura,rolagem)
{
var esquerda = (screen.width - largura) / 2;
var cima = (screen.height - altura) / 2 -50;
window.open(caminho,nome,'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=' + rolagem + ',resizable=no,copyhistory=no,top=' + cima + ',left=' + esquerda + ',width=' + largura + ',height=' + altura);
}
var PatternsDict = new Object();

PatternsDict.cep = /^\d{5}(-\d{3})?$/;
  // matches zip codes

PatternsDict.mail = /^([\w-_]+\.)*[\w-_]+\@([\w-_]+\.)+[a-zA-Z]{2,3}([a-zA-Z]{2})?$/;
  // matches nome@dominio.com.br or nome.sobrenome@dominio.net

PatternsDict.integer = /^\d*$/;
  // matches 123542

PatternsDict.time=/^((0|1)[0-9]|2[0-3]):[0-5]\d$/;
  // matches 00:55 or 05:04 or 14:34 or 23:59

PatternsDict.string=/(\w)*|(\s)*/;
  // matches abcDEf

PatternsDict.date=/^\d{2}\/\d{2}\/\d{4}$/;
  // matches 01/02/2003

PatternsDict.currency=/^\d+(\.\d{1,2})?$/;
  // matches 2.4 or 23.34 or 0.34 or 1246.23

PatternsDict.cgc=/\d*/;
  // matches valid cgc

PatternsDict.cpf=/\d*/;
  // matches valid cpf

var Message = '';

// Funções para retirar espaços Strings
function ltrim(s)
{
   var count=0;
   var i = 0;
   var space = " ";
   var newLine="\n";
   var cr = "\r";
   var tab = "\t";
   var sRet;
   while (
      (s.charAt(i) == space) |
      (s.charAt(i) == newLine) |
      (s.charAt(i) == cr) |
      (s.charAt(i) == tab)){
      count++;
      i++
    }
   if (count > 0)
      sRet = s.substring(count, s.length);
   else
      sRet = s;

   return(sRet);
}

function rtrim(s)
{
   var count=0;
   var i = s.length - 1;
   var space = " ";
   var newLine="\n";
   var cr = "\r";
   var tab = "\t";
   var sRet;
   while (
      (s.charAt(i) == space) |
      (s.charAt(i) == newLine) |
      (s.charAt(i) == cr) |
      (s.charAt(i) == tab)) {
      count++;
      i--
   }
   if (count > 0)
      sRet = s.substring(0, s.length - count);
   else
      sRet = s;

   return(sRet);
}

function trim(s)
{
   return(rtrim(ltrim(s)));
}

//função que verifica se o CGC está correto
function ValidaCGC(CGC){
	mult1 = "543298765432";
 	mult2 = "6543298765432";
	num1 = 0;
	num2 = 0;
	dig1 = 0;
	dig2 = 0;

	for (var x = 0; x <= 12; x++) {
		num1 = CGC.charAt(x);
		num2 = mult1.charAt(x);
		num1 *= num2;
		dig1 += num1;
	}
	for (var X = 0; X <=13; X++) {
		num1 = CGC.charAt(X);
		num2 = mult2.charAt(X);
		num1 *= num2;
		dig2 += num1;
	}
	dig1 *= 10;
	dig1 %= 11;
	dig2 *= 10;
	dig2 %= 11;
	if (dig1 == 10)
		dig1 = 0;
	if (dig2 == 10)
		dig2 = 0;
	var ret = true;
	if (dig1 != CGC.charAt(12)) {
		ret = false;
		}
	if (dig2 != CGC.charAt(13)) {
		ret = false;
		}
	return ret;
}

//função que verifica se o CPF está correto
function ValidaCPF (CPF) {
	if (CPF.length != 11 || CPF == "00000000000" || CPF == "11111111111" ||
		CPF == "22222222222" ||	CPF == "33333333333" || CPF == "44444444444" ||
		CPF == "55555555555" || CPF == "66666666666" || CPF == "77777777777" ||
		CPF == "88888888888" || CPF == "99999999999")
		return false;
	soma = 0;
	for (i=0; i < 9; i ++)
		soma += parseInt(CPF.charAt(i)) * (10 - i);
	resto = 11 - (soma % 11);
	if (resto == 10 || resto == 11)
		resto = 0;
	if (resto != parseInt(CPF.charAt(9)))
		return false;
	soma = 0;
	for (i = 0; i < 10; i ++)
		soma += parseInt(CPF.charAt(i)) * (11 - i);
	resto = 11 - (soma % 11);
	if (resto == 10 || resto == 11)
		resto = 0;
	if (resto != parseInt(CPF.charAt(10)))
		return false;
	return true;
}

function ValidaData(LData)
{
	if(LData.length==0)
		return true;

	if (LData != "")
	{
		if (LData.length != 10)
			return false;

		if (((LData.substring(3,5) > 12)||(LData.substring(3,5) < 1)) || (LData.substring(0,2) < 1) || (LData.substring(6,10) < 1800))
			return false;

		if (LData.substring(3,5) == 2)
			LMaxDias = (((1996 - LData.substring(6,10)) % 4) == 0) ? 29 : 28
		else
		{
			if (LData.substring(3,5) <= 7)
				LMaxDias = ((LData.substring(3,5) % 2) == 0) ? 30 : 31
			else
				LMaxDias = ((LData.substring(3,5) % 2) == 0) ? 31 : 30
		}

		if (LMaxDias < LData.substring(0,2))
			return false;
	}

	return true;
}

function ValidaInteiro(nNumero)
{
	var aux_teste;
	aux_teste = '';

	for(var i = 0; i < nNumero.length; i++)
		aux_teste = aux_teste + '0';

	if (nNumero != aux_teste)
		return true;
	else
		return false;
}

function validate(theForm)
{
	var elArr = theForm.elements; // recebe todos os elementos do form em um array
	var elFoco;
	var oTem_Foco = false;
	var oObrigatorio = false;

	for(var i = 0; i < elArr.length; i++)
	{
		if ((elArr[i].name == 'undefined') || (elArr[i].name == undefined))
			continue;

		if ((elArr[i].type.toUpperCase() == "SUBMIT") || (elArr[i].type.toUpperCase() == "RESET") || (elArr[i].type.toUpperCase() == "BUTTON") ||
			 (elArr[i].type.toUpperCase() == "HIDDEN"))
				continue;

		with(elArr[i])
		{
			var req = elArr[i].required; // para teste de campo obrigatório

			if (IE5 > 5)
			{
				if (req!=undefined)
					oObrigatorio = true;
				else
					oObrigatorio = false;
			}
			else
			{
				if (req!='undefined')
					oObrigatorio = true;
				else
					oObrigatorio = false;
			}

			if (oObrigatorio)
			{
				value = trim(value);

				if (value.length == 0)
				{
					Message = Message + elArr[i].mensagem + " deve ser preenchido!\n";

					if (!oTem_Foco)
                                        {
						elFoco = elArr[i];
						oTem_Foco = true;
                                        }

					continue;
				}
			}
		}
	}
	if (Message.length == 0)
	{
		return true;
	}
	else
	{
		alert(Message);
		Message = '';
		oTem_Foco = false;
		elFoco.focus();
		return false;
	}
}

function Browser(){
this.name=this.platform="Unknown";
this.majorver=this.version=this.minorver="";
this.mozilla=false;
this.init=_Init;
this.getName=function(){return this.name};
this.getMinorver=function(){return this.minorver};
this.getMajorver=function(){return this.majorver};
this.getVersion=function(){return parseFloat(this.version,10)};
this.getPlatform=function(){return this.platform};
this.isIE=function(){return(this.name=="IE")};
this.isNetscape=function(){return(this.name=="Netscape")};
this.isMozilla=function(){return this.mozilla};
this.isWindows=function(){return _has(this.platform,["Windows","WinNT"])};
this.isWinNT=function(){return _has(this.platform,["WinNT","Windows NT"])};
this.isWin95=function(){return _has(this.platform,["Win95","Windows 95"])};
this.isWin98=function(){return _has(this.platform,["Win98","Windows 98"])};
this.isLinux=function(){return _has(this.platform,"Unix")};
this.isMac=function(){return _has(this.platform,"Mac");};
this.init();
}

function _Init(){
var ua=navigator.userAgent,t="",ts="",i,bv;
bv=ua.slice(0,ua.indexOf("("));
ts=ua.slice(ua.indexOf("(")+1,ua.indexOf(")")).split(";");
for(i=0;i<ts.length;i++){
	t=ts[i].trim();
	if(_has(t,["MSIE","Opera"]))bv=t;
	else if(_has(t,["X11","SunOS","Linux"]))this.platform="Unix";
	else if(_has(t,["Mac","PPC","Win"]))this.platform=t;
}
var idx=bv.indexOf("MSIE"),lo="";
if(idx>=0)bv=bv.slice(idx);
if(bv.slice(0,7)=="Mozilla"){
	lo="";
	this.name="Netscape";
	if(ua.indexOf("Gecko/")!=-1){
		if(/Netscape/.test(ua)){
			var v=/([^\/]+)\s*$/.exec(ua);
			if(v&&v.length>1)lo=v[1]+" ";
		}else{
			this.mozilla=true;
			var v=/rv:([^\)]+)\)/.exec(ua);
			if(v&&v.length>1)lo=v[1]+" ";
		}
	}
	if(lo=="")lo=bv.slice(8);
}else if (bv.slice(0,4)=="MSIE"){
	this.name="IE";lo=bv.slice(5);
}else if (bv.slice(0,27)=="Microsoft Internet Explorer"){
	this.name="IE";lo=bv.slice(28);
}else if (bv.slice(0,5)=="Opera"){
	this.name="Opera";lo=bv.slice(6);
}
lo=lo.trim();
i=lo.indexOf(" ");
if(i>=0)this.version=lo.slice(0,i);
else this.version=lo;
j=this.version.indexOf(".");
if(j>=0){
	this.majorver=this.version.slice(0,j);
	this.minorver=this.version.slice(j+1);
}else this.majorver=this.version;
}

function _has(s,a){
s=String(s);
if(typeof(a)=="string")return s.indexOf(a)!=-1;
else{
	for(var i=0;i<a.length;i++)if(s.indexOf(a[i])!=-1)return true;
	return false;
}
}

function _TRIM(){
var s=0,e=this.length;
while(s<e&&this.charAt(s)==' ')s++;
while(e>0&&this.charAt(e-1)==' ')e--;
return this.slice(s,e);
}

String.prototype.trim=_TRIM;
function trim(s){return String(s).replace(/^\s+/,"").replace(/\s+$/,"");}

function autoSkip(field,orient){
	var ind=-1,f=field.form;
	for(i=0;i<f.elements.length;i++)
		if(field==f.elements[i]){ind=i;break;}
	focusCampByPos(f,ind,orient);
}

function autoFocus(f){focusCampByPos((arguments.length==0?document.forms[0]:f),-1);}

function focusCampByPos(fr,ind,orient){
	orient=orient?orient:"down";
	var iNext=(orient=="down"?1:-1),el;
	if((typeof fr.elements[ind+iNext])=="undefined"){
      if(ind!=-1)if(fr.elements[ind]&&fr.elements[ind].blur)fr.elements[ind].blur();
		return;
   }
	for(var i=ind+iNext;i<fr.elements.length;i+=iNext){
		el=fr.elements[i];
		if(/^(button|text|textarea|password|select.*|radio|checkbox.*)$/.test(el.type) && !el.disabled)
		{
			try
			{
				el.focus(); return;
			}
			catch(er)
			{
			}
		}
   }
	if(fr.elements[ind]&&fr.elements[ind].blur)fr.elements[ind].blur();
}

function isNumeric(v){return /^[0-9]+$/.test(v);}

function isAlfa(v){return /^[a-zA-ZáéíóúçãõâêôàÁÉÍÓÚÇÃÕÂÊÔÀ]+$/.test(v);}

function isAlfaNumeric(v){return /^[0-9a-zA-Z]+$/.test(v);}

function invertStr(s){
	var t="",i;
	for(i=0;i<s.length;i++)t=s.charAt(i)+t;
	return t;
}

function removeStr(src,arg){
	var v=(typeof arg=="string")?[arg]:arg;
	var r="";
	for(var i=0;i<v.length;i++)r=changeStr(src,v[i],"");
	return r;
}

function repeatStr(src,str,size,orient){
	var r=String(src);
	if(!orient)orient="left";
	while(r.length < size)r=orient.toLowerCase()=="right"?(r+str):(str+r);
	return r;
}

function changeStr(src,from,to)
{
	src=String(src);
	var i,li=0,lFrom= from.length,dst="";
	while((i=src.indexOf(from,li))!=-1){
		dst+=src.substring(li,i)+to;
		li=i+lFrom;
	}
	dst+=src.substring(li);
	return dst;
}

function justNumbersStr(s){return String(s).replace(/\D*/g,"");}

function onlySameNumber(s){return isNumeric(s)&& (new RegExp("^("+s.charAt(0)+")(\\1)*$")).test(s);}

function StrToFloat(valor)
{
	if (valor == '')
		return parseFloat('0')
	else
		return parseFloat(changeStr(changeStr(valor, '.',''),',','.'));
}

function Round(Numero, decimais)
{
  Valor = Numero;
  ndecimais = Math.pow(10, decimais);
  Valor = Valor * ndecimais;

  Valor = Math.round(Valor);
  Valor = Valor /ndecimais

  return Valor;
}
