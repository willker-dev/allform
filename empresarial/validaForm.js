// JavaScript Document
if (navigator.appName.indexOf('Microsoft') != -1){   
    clientNavigator = "IE";   
}else{   
    clientNavigator = "Other";   
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



function validaFormF16() {
	
	d = document.form1;

	if (d.patrocinadora.value=="") {
		alert("Por favor informe nome da empresa patrocinadora.");
		d.patrocinadora.focus();
		return false;
	
	}
	
	if (d.nome.value=="") {
		alert("Por favor informe nome do(a) Participante.");
		d.nome.focus();
		return false;
	
	}
	
	if (d.nascimento.value=="" || d.nascimento.value.length != 10) {
		alert("Por favor informe a data de nascimento corretamente (10 dígitos: dd/mm/aaaa).");
		d.nascimento.focus();
		return false;
	}
	
	if (d.cpf.value=="" || d.cpf.value.length != 11) {
		alert("Por favor informe o CPF corretamente (11 digitos)");
		d.cpf.focus();
		return false;
	}
	
	if (d.email.value=="") {
		alert("Por favor informe o e-mail.");
		d.email.focus();
		return false;
	}
	
	if (d.email.value != ""){
		if (d.email.value.indexOf('@', 0) == -1 || d.email.value.indexOf('.', 0) == -1) { 
			alert("O campo de e-mail deve conter um endereço eletrônico válido. Ex: nome@dominio.com");
			d.email.focus()
			return false;
		}
	}
	
	if (d.residencial.value=="" || d.residencial.value.length < 8) {
		alert("Por favor informe o telefone residencial");
		d.residencial.focus();
		return false;
	}
	
	if (d.celular.value=="" || d.celular.value.length < 8) {
		alert("Por favor informe o telefone celular");
		d.celular.focus();
		return false;
	}
	
	if(!d.solicito[0].checked && !d.solicito[1].checked && !d.solicito[2].checked) {
	 	alert("Escolha uma das opções.");
		d.solicito[0].focus();
		return false; 
	 }
	
	if(d.solicito[1].checked)
		{
	  		 //faz validação dos campos dentro de #opc1
			 if(!d.manter[0].checked && !d.manter[1].checked) {
			 	alert("Escolha uma das opções abaixo.");
				d.manter[0].focus();
				return false;
			 }
			 
			 if(d.manter[1].checked) {
				if(d.contribuicao.value == ""){
					alert("Escolha o % de contribuição");
					d.contribuicao.focus();
					return false; 	
				}
			 }
			 

			 if (!d.divRecolhimento[0].checked) {
				alert("Escolha uma forma de recolhimento da contribuição");
				d.divRecolhimento[0].focus();
				return false;
			 }
	    }

	if(!d.solicito[2].checked){
		if (d.dtafastamento.value=="" || d.dtafastamento.value.length != 10) {
			alert("Por favor informe a data do afastamento corretamente (10 dígitos: dd/mm/aaaa).");
			d.dtafastamento.focus();
			return false;
		}
		if (d.motivo.value == ""){
			alert("Escolha o motivo do afastamento");
			d.motivo.focus();
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

	alert ("Número do CPF invalido.");

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
