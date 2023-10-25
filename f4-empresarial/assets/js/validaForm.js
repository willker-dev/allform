// JavaScript Document
const outputJson = {
    "nomeTermo": "Termo de Opção",
    "tipoOpcao": 5,
    "nomePatrocinadora": "",
    "emailPatrocinadora": "",
    "nomeParticipante": "",
    "cpf": "",
    "emailParticipante": "",
    "nomeResponsavel": "CADASTRO",
    "emailResponsavel": "cadastro@sebraeprev.com.br",
    "residenteExterior": "",
    "nNif": "",
    "dataSaida": null,
    "isentoIr": null,
    "arquivoTermo": "",
    "identidadeParticipante": "",
    "comprovanteBancario": "",
    "rescisaoContratual": "",
    "certidaoObitoParticipante": "",
    "identificacaoRequerentes": "",
    "certidaoCasamento":""
}

if (navigator.appName.indexOf('Microsoft') != -1){   
    clientNavigator = "IE";   
}else{   
    clientNavigator = "Other";   
}

function convertToBase64(param) {
    var selectedFile = document.getElementById(param).files;
    if (selectedFile.length > 0) {
        if (ValidateFile(param) !== true) {
            alert("O arquivo é inválido. As extensões permitidas são: jpg, png e pdf");
            document.getElementById(param).value = "";
            return false;
        }

        var fileToLoad = selectedFile[0];
        var fileReader = new FileReader();
        fileReader.onload = function (fileLoadedEvent) {
            var arrayBuffer = fileLoadedEvent.target.result;
            var bytes = new Uint8Array(arrayBuffer);
            var binaryData = '';
            for (var i = 0; i < bytes.byteLength; i++) {
                binaryData += String.fromCharCode(bytes[i]);
            }
            var base64 = btoa(binaryData);

            // Cria um novo jsPDF
            var pdf = new jsPDF();

            // Adicione o conteúdo ao PDF (aqui você pode personalizar o que deseja adicionar)
            pdf.addImage(base64, 'JPEG', 10, 10, 180, 200);


            // Gere o PDF em base64
            var pdfBase64 = pdf.output('datauristring');

            // Remova o prefixo "data:application/pdf;filename=generated.pdf;base64,"
            pdfBase64 = pdfBase64.substring(pdfBase64.indexOf(",") + 1);

            // Adicione um alert para confirmar que o arquivo foi convertido para PDF
            alert("Arquivo convertido para PDF com sucesso!");

            // Continue com o seu código, atribuindo o PDF em base64 à variável apropriada em outputJson, por exemplo:
            switch (param) {
                case "identidade_patrocinio":
                case "identidade_beneficio":
                case "identidade_resgate":
                case "identidade_portabilidade":
                case "identidade_cancelamento":
                    outputJson.identidadeParticipante = pdfBase64;
                    break;
                case "recisao_patrocinio":
                case "recisao_beneficio":
                case "recisao_portabilidade":
                case "recisao_cancelamento":
                    outputJson.rescisaoContratual = pdfBase64;
                    break;
                case "comprovante_resgate":
                    outputJson.comprovanteBancario = pdfBase64;
                    break;
            }

            // Agora você pode continuar com o restante do seu processo.
            // Lembre-se de chamar a função gerarPDF() ou fazer outras operações necessárias.
            gerarPDF();
        };
        fileReader.readAsArrayBuffer(fileToLoad);
    }
}





function limparInputFile (param) {
	document.getElementById(param).value = "";

}

function limparFile (param) {

    document.getElementById(param).value = "";

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
        else {
            src. value === ('pdf').textContent
        }
} 



// validar formulario

function validaFormF4() {
    var d = document.querySelector('form');

    if (d.patrocinadora.value === "") {
        alert("Por favor informe o nome da empresa patrocinadora.");
        d.patrocinadora.focus();
        return false;
    }

    if (/^[a-zA-Z\s]*$/.test(d.nome.value)) {
        // O valor do campo "nome" contém apenas letras e espaços
    } else {
        alert("Por favor, informe um nome válido (apenas letras e espaços).");
        d.nome.focus();
        return false;
    }
    

    if (d.data_nasc.value === "" || d.data_nasc.value.length !== 10 || !check_date(d.data_nasc.value)) {
        alert("Por favor informe a data de nascimento corretamente (dd/mm/aaaa).");
        d.data_nasc.focus();
        return false;
    }

    if (/^\d{11}$/.test(d.cpf.value)) {
        // O valor do campo "cpf" contém exatamente 11 dígitos numéricos
        // e não contém letras ou caracteres especiais
    } else {
        alert("Por favor, informe o CPF corretamente (11 dígitos numéricos).");
        d.cpf.focus();
        return false;
    }
    

    if (d.email.value === "") {
        alert("Por favor informe o e-mail.");
        d.email.focus();
        return false;
    }

    if (d.email.value !== "" && (d.email.value.indexOf('@') === -1 || d.email.value.indexOf('.') === -1)) {
        alert("O campo de e-mail deve conter um endereço eletrônico válido. Ex: nome@dominio.com");
        d.email.focus();
        return false;
    }

    if (d.txtCep.value === "") {
        alert("Por favor informe o CEP.");
        d.txtCep.focus();
        return false;
    }

    if (/^[a-zA-Z\s]*$/.test(d.txtBairro.value)) {
        // O valor do campo "nome" contém apenas letras e espaços
    } else {
        alert("Por favor, informe um Bairro válido (apenas letras e espaços).");
        d.txtBairro.focus();
        return false;
    }

    if (/^[a-zA-Z\s]*$/.test(d.txtCidade.value)) {
        // O valor do campo "nome" contém apenas letras e espaços
    } else {
        alert("Por favor, informe uma Cidade válida (apenas letras e espaços).");
        d.txtCidade.focus();
        return false;
    }
    

    if (d.residencial.value === "" || d.residencial.value.length < 8) {
        alert("Por favor informe o telefone residencial corretamente.");
        d.residencial.focus();
        return false;
    }

    if (d.celular.value === "" || d.celular.value.length < 8) {
        alert("Por favor informe o telefone celular corretamente.");
        d.celular.focus();
        return false;
    }

	if(!d.opc[0].checked && !d.opc[1].checked && !d.opc[2].checked && !d.opc[3].checked) {
        alert("Escolha uma das opções do termo.");
       d.opc[0].focus();
       return false;
    }

if(document.getElementById('opc1').style.display=='' )
{
      //faz validação dos campos dentro de #opc1
    if(!d.opca[0].checked && !d.opca[1].checked) {
        alert("Escolha entre manter ou alterar o percentual da contribuição.");
       d.opca[0].focus();
       return false;
    }
    
    if(d.opca[1].checked) {
                    
       if(!d.opcz1.checked && !d.opcz2.checked && !d.opcz3.checked){
               alert("Escolha um tipo de contribuição.");
               d.opcz1.focus();
               return false; 	
       }
    }
    
    if(d.opcz1.checked) {
        if(d.porcentual1.value == '0') {
            alert ("Escolha o percentual da contribuição básica.");
            d.porcentual1.focus();
            return false;
        }
    }
    
    if(d.opcz2.checked) {
        if(d.porcentual2.value == '0') {
            alert ("Escolha o percentual da contribuição serviço passado.");
            d.porcentual2.focus();
            return false;
        }
    }
    
    if(d.opcz3.checked) {
        if(d.porcentual3.value == "") {
            alert ("Escolha o percentual da contribuição voluntária mensal.");
            d.porcentual3.focus();
            return false;
        }
    }
    
    
    
    if(!d.form_re[0].checked && !d.form_re[1].checked) {
        alert("Escolha a forma de recolhimento.");
       d.form_re[0].focus();
       return false;
    }

    
    
    if(d.form_re[1].checked == true) {
    
                if (d.nm_banco.value=="") {
                   alert("Por favor informe se o seu banco é o Banco do Brasil ou o Itaú");
                   d.nm_banco.focus();
                   return false;
                   
               }
               
               if (d.ag_banco.value=="") {
                   alert("Por favor informe o número da agência do banco.");
                   d.ag_banco.focus();
                   return false;
                   
               }else if (d.ag_banco.value.length != 6){
                   alert("Agência do banco deve ter cinco dígitos (formato xxxx-x)");
                   d.ag_banco.focus();
                   return false;
                   
               }
               
               if (d.cc_banco.value=="") {
                   alert("Por favor informe o número da conta corrente.");
                   d.cc_banco.focus();
                   return false;

               }else if (d.cc_banco.value.length < 3) {
                   alert("O número da conta corrente deve ter ao menos 4 dígitos");
                   d.cc_banco.focus();
                   return false;
               }
    }

    if(d.identidade_patrocinio.value == "") {
       alert('Precisa incluir uma cópia da identidade')
       return false;
    }

    if(d.recisao_patrocinio.value == "") {
       alert('Precisa incluir uma cópia da recisão')
       return false;
    }
        
}

if(document.getElementById('opc2').style.display=='' ) {

if(d.identidade_beneficio.value == "") {
   alert('Precisa incluir uma cópia da identidade')
   return false;
}

if(d.recisao_beneficio.value == "") {
   alert('Precisa incluir uma cópia da recisão')
   return false;
}
}

if( document.getElementById('opc3').style.display=='' )
{
      //faz validação dos campos dentro de #opc1
    if (!d.resg[0].checked && !d.resg[1].checked ) {
       alert("O tipo de Resgate não foi selecionado.");
       d.resg[0].focus();
       return false;
   }

   if (d.motivo.value=="") {
        alert("Campo MOTIVO não foi preenchido.");
       d.motivo.focus();
       return false;
    }
   
   if(d.resg[1].checked){
       if(!d.perfilInvestimento[0].checked && !d.perfilInvestimento[1].checked){
           alert("Escolha um Perfil de Investimentos.");
           d.resg[1].focus();
           return false;
       }	
   }

   //if (!d.n_cc[0].checked && !d.n_cc[1].checked ) {
   //	alert("Escolha o tipo de pagamento.");
   //	d.n_cc[0].focus();
   //	return false;
   //}

   if (!d.n_cc.checked) {
       alert("Escolha o tipo de pagamento.");
       d.n_cc.focus();
       return false;
   }
   
   if(d.n_cc.checked) {
               if (d.n_bancon_b2.value=="") {
                   alert("Número do banco não foram preenchido.");
                   d.n_bancon_b2.focus();
                   return false;
                }
                
                if (d.n_banco_b2.value=="") {
                   alert("Nome do banco não foram preenchido.");
                   d.n_banco_b2.focus();
                   return false;
                }	
                
                if (d.ag_banco2.value=="") {
                   alert("Agência do banco não foi preenchido.");
                   d.ag_banco2.focus();
                   return false;
                }
                
                if (d.ag_banco2.value.length != 6) {
                   alert("Agência do banco deve ter cinco dígitos (formato xxxx-x)");
                   d.ag_banco2.focus();
                   return false;
                }
                
                if (d.cc_banco2.value=="") {
                   alert("Conta do banco não foi preenchido.");
                   d.cc_banco2.focus();
                   return false;
                }
                
                if (!d.tipoC[0].checked && !d.tipoC[1].checked ) {
                   alert("Escolha o tipo de conta.");
                   d.tipoC[0].focus();
                   return false;
               }
   }
   if(d.identidade_resgate.value == "") {
       alert('Precisa incluir uma cópia da identidade')
       return false;
   }

   if(d.comprovante_resgate.value == "") {
       alert('Precisa incluir uma cópia do comprovante bancário')
       return false;
   }
   
   
    
}

if( document.getElementById('opc4').style.display=='' )
{
      //faz validação dos campos dentro de #opc1
    if (d.p_entidade.value=="") {
        alert("Campo entidade administradora não foi preenchido.");
       d.p_entidade.focus();
       return false;
    }

    if (d.motivo2.value=="") {
        alert("Campo MOTIVO não foi preenchido.");
       d.motivo2.focus();
       return false;
    }
    
    if (d.p_endereco.value=="") {
        alert("Campo endereço não foi preenchido.");
       d.p_endereco.focus();
       return false;
    }
    
    if (d.p_cidade.value=="") {
        alert("Campo cidade não foi preenchido.");
       d.p_cidade.focus();
       return false;
    }
    
    if (d.p_uf.value=="--") {
        alert("Campo UF não foi preenchido.");
       d.p_uf.focus();
       return false;
    }
    
    if (d.p_cep.value=="") {
        alert("Campo Cep não foi preenchido.");
       d.p_cep.focus();
       return false;
    }
    
    if (d.p_cnpj.value=="") {
        alert("Campo CNPJ/MF não foi preenchido.");
       d.p_cnpj.focus();
       return false;
    }
    
    if (d.p_n_plano.value=="") {
        alert("Campo nome do plano não foi preenchido.");
       d.p_n_plano.focus();
       return false;
    }
    
    if (d.p_cnpj_fundo.value=="") {
        alert("Campo CNPJ do fundo não foi preenchido.");
       d.p_cnpj_fundo.focus();
       return false;
    }
    
    if (!d.t_plano[0].checked && !d.t_plano[1].checked && !d.t_plano[2].checked && !d.t_plano[3].checked && !d.t_plano[4].checked) {
       alert("O tipo de plano não foi selecionado.");
       d.t_plano[0].focus();
       return false;
   }
   
   if (!d.regi[0].checked && !d.regi[1].checked ) {
       alert("O tipo de Regime de tributação não foi selecionado.");
       d.regi[0].focus();
       return false;
   }
   
   if (d.data_ad.value=="") {
        alert("Data de adesão não foi preenchida.");
       d.data_ad.focus();
       return false;
    }
    
   if (d.matr_plano.value=="") {
        alert("O campo matrícula no plano não foi preenchido.");
       d.matr_plano.focus();
       return false;
    }
    
   if (d.n_susep.value=="") {
        alert("O campo Nº do processo na SUSEP ou SPC não foi preenchido.");
       d.n_susep.focus();
       return false;
    }
    
    if (d.n_banco_b3.value=="") {
        alert("O campo banco da entidade não foi preenchido.");
       d.n_banco_b3.focus();
       return false;
    }
    
    if (d.ag_banco3.value=="") {
        alert("O campo Agência não foi preenchido.");
       d.ag_banco3.focus();
       return false;
    }

    if (d.ag_banco3.value.length != 6) {
       alert("Agência do banco deve ter cinco dígitos (formato xxxx-x)");
       d.ag_banco3.focus();
       return false;
    }
    
    if (d.cc_banco3.value=="") {
        alert("O campo de número da conta não foi preenchido.");
       d.cc_banco3.focus();
       return false;
    }
    if(d.identidade_portabilidade.value == "") {
       alert('Precisa incluir uma cópia da identidade')
       return false;
   }
    if(d.recisao_portabilidade.value == "") {
       alert('Precisa incluir uma cópia da recisão')
       return false;
   }
   
}

function limparInputFile (param) {
	document.getElementById(param).value = "";

}

function limparFile (param) {

    document.getElementById(param).value = "";

}


    outputJson.nomePatrocinadora = d.patrocinadora.value;
	outputJson.nomeParticipante = d.nome.value;
	outputJson.dataNascimento = d.data_nasc.value;
	outputJson.cpf = d.cpf.value;
	outputJson.nNif = d.nif.value;
	outputJson.emailParticipante = d.email.value;
	localStorage.setItem('myJson', JSON.stringify(outputJson));
	console.log(outputJson);

}
function check_date(date) {
    // Implementação da validação da data
    return true; // Retorne true se a data for válida
}

function check_cpf(numcpf) {
    // Implementação da validação do CPF
    return true; // Retorne true se o CPF for válido
}

//valida input file
var _validFileExtensions = [".jpg", ".jpeg", ".png", ".pdf"];    
function ValidateFile(inputId) {
	var oInput = document.getElementById(inputId);
	if (oInput.type == "file") {
		var sFileName = oInput.value;
		if (sFileName.length > 0) {
			var blnValid = false;
			for (var j = 0; j < _validFileExtensions.length; j++) {
				var sCurExtension = _validFileExtensions[j];
				if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
					blnValid = true;
					break;
				}
			}

			if (!blnValid) {
				return false;
			}
			return true;
		}
		return false;
	} 
	return false;
}