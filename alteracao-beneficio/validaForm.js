// JavaScript Document
if (navigator.appName.indexOf('Microsoft') != -1){   
    clientNavigator = "IE";   
}else{   
    clientNavigator = "Other";   
}

function setPercentual(param){
	if(param > 2 || param <= 0){
	  percentual = document.getElementById('percentual');
	  alert('O percentual precisa ser entre 0.1 e 2');
	  percentual.value = '';
	}
}

// JavaScript Document
// validar formulario
function mascara(src, mask){
	var i = src.value.length;
	var saida = mask.substring(0,1);
	var texto = mask.substring(i)
		if (texto.substring(0,1) != saida)
		{
			src.value += texto.substring(0,1);
		}
} 

function validaFormF4() {
	d = document.form1;

	if(!check_cpf(d.cpf.value)) {
		alert ("Número do CPF invalido.");
		d.cpf.focus();
		return false;
	}
	
	if (d.nome.value=="") {
		alert("Por favor informe nome do(a) Participante.");
		d.nome.focus();
		return false;
	
	}
	
	if (d.cpf.value=="") {
		alert("Por favor informe o CPF.");
		d.cpf.focus();
		return false;
	}
	
	if (d.email.value=="") {
		alert("Por favor informe o e-mail.");
		d.email.focus();
		return false;
	}
		       //validar email(verificao de endereco eletrônico)
      /*  parte1 = d.email.value.indexOf("@");
        parte2 = d.email.value.indexOf(".");
        parte3 = d.email.value.length;
        if (!(parte1 >= 2 && parte2 >= 1 && parte3 >= 20)) {
                alert ("");
                 d.email.focus();
                  return false;
    }*/
	
	
	if (d.email.value != ""){
		if (d.email.value.indexOf('@', 0) == -1 || d.email.value.indexOf('.', 0) == -1) { 
			alert("O campo de e-mail deve conter um endereço eletrônico válido. Ex: nome@dominio.com");
			d.email.focus()
			return false;
		}
	}
	
	if (d.Tcelular.value=="" || d.Tcelular.value.length < 8) {
		alert("Por favor informe o telefone celular.");
		d.Tcelular.focus();
		return false;
	}
	
	
	if(!d.opc[0].checked && !d.opc[1].checked) {
			 	alert("Escolha uma das opções do termo.");
				d.opc[0].focus();
				return false;
			 }
	
	if(document.getElementById('opc1').style.display=='' )
		{
	  		 //faz validação dos campos dentro de #opc1
			 if(d.anos.value == ''){
				alert("Precisa preencher a quantidade de anos")
				return false;
			 }
			 if(d.anos.value < 5 || d.anos.value > 20){

				alert("Preencha a quantidade de anos entre 5 e 20")
				return false;

			 }
			 	
	    }
	
	if( document.getElementById('opc2').style.display=='' )
		{
	  		 //faz validação dos campos dentro de #opc1
			 if(d.percentual.value == ''){
				alert('Preencha o percentual');
				d.percentual.focus();
				return false;
			 }
			 if(d.percentual.value <= 0 || d.percentual.value > 2){
				alert('Percentual incorreto');
				d.percentual.focus();
				return false;
			 }
			
			
			 
		}
}

         



//valida corretamente data de nascimento
		 
function check_date(date) {
   var err = 0
   string = date
   var valid = "0123456789/"
   var ok = "yes";
   var temp;
   for (var i=0; i< string.length; i++) {
     temp = "" + string.substring(i, i+1);
     if (valid.indexOf(temp) == "-1") err = 1;
   }
   if (string.length != 10) err=1
   b = string.substring(3, 5)        // month
   c = string.substring(2, 3)        // '/'
   d = string.substring(0, 2)        // day
   e = string.substring(5, 6)        // '/'
   f = string.substring(6, 10)    // year
   if (b<1 || b>12) err = 1
   if (c != '/') err = 1
   if (d<1 || d>31) err = 1
   if (e != '/') err = 1
   if (f<1850 || f>2050) err = 1
   if (b==4 || b==6 || b==9 || b==11){
     if (d==31) err=1
   }
   if (b==2){
     var g=parseInt(f/4)
     if (isNaN(g)) {
         err=1
     }
     if (d>29) err=1
     if (d==29 && ((f/4)!=parseInt(f/4))) err=1
   }
   if (err==1) {
       alert("Por favor data de nascimento incorreta.");
    return false;
   }
}

//checa cfp
function check_cpf(numcpf){

	x = 0;

	soma = 0;

	dig1 = 0;

	dig2 = 0;

	texto = "";

	numcpf1="";

	len = numcpf.length; x = len -1;

	// var numcpf = "12345678909";

	for (var i=0; i <= len - 3; i++) {

		y = numcpf.substring(i,i+1);

		soma = soma + ( y * x);

		x = x - 1;

		texto = texto + y;

	}

	dig1 = 11 - (soma % 11);

	if (dig1 == 10) dig1=0 ;

	if (dig1 == 11) dig1=0 ;

	numcpf1 = numcpf.substring(0,len - 2) + dig1 ;

	x = 11; soma=0;

	for (var i=0; i <= len - 2; i++) {

		soma = soma + (numcpf1.substring(i,i+1) * x);

		x = x - 1;

	}

	dig2= 11 - (soma % 11);

	if (dig2 == 10) dig2=0;

	if (dig2 == 11) dig2=0;

	//alert ("Digito Verificador : " + dig1 + "" + dig2);

	if ((dig1 + "" + dig2) == numcpf.substring(len,len-2)) {

		return true;

	}

//	alert ("Número do CPF invalido.");

	return false;

}

function somenteNumeros(evnt,permitidos){ 
	/****************************************************************************************
	* Função para permitir somente digitação de número                                      *
	* sintaxe: somenteNumeros(event, [caracteres não numéricos permitidos])                 *
	* ex:  onKeyPress="return somenteNumeros(event,',.;');"                                 *
	****************************************************************************************/
	
	if (evnt.charCode == undefined){
		var tecla = evnt.keyCode;
	}else{
		var tecla = evnt.charCode;
	}
	
	var teste = false;
	if (permitidos != undefined && permitidos != ""){
		if (permitidos.indexOf(String.fromCharCode(tecla)) != -1) teste = true;
	}
	
    if (clientNavigator == "IE"){ 
        if (tecla < 48 || tecla > 57){   
            return teste;   
        }   
    }else{
        if ((tecla < 48 || tecla > 57) && evnt.keyCode == 0){
            return teste;
        }
    }   
}   
