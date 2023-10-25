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
                case "identidade_file":
                    outputJson.identidadeParticipante = pdfBase64;
                    break;
                case "recisao_file":
                    outputJson.rescisaoContratual = pdfBase64;
                    break;
                case "bancario_file":
                    outputJson.comprovanteBancario = pdfBase64;
                    break;
                case "inss_file":
                    outputJson.cartaConcessaoINSS = pdfBase64;
                    break;
                case "doenca_file":
                    outputJson.cessacaoAuxilioDoenca = pdfBase64;
                    break;
                case "obito_file":
                    outputJson.certidaoObitoParticipante = pdfBase64;
                    break;
                case "identidadeMenor_file":
                    outputJson.identificacaoRequerentes = pdfBase64;
                    break;
                case "casamento_file":
                    outputJson.certidaoCasamento = pdfBase64;
                    break;
            }
            

            // Agora você pode continuar com o restante do seu processo.
            // Lembre-se de chamar a função gerarPDF() ou fazer outras operações necessárias.
            gerarPDF();
        };
        fileReader.readAsArrayBuffer(fileToLoad);
    }
}



function validaForm() {
    var d = document.form1;

    if (d.emp_pat.value === "") {
        alert("Por favor informe nome da empresa patrocinadora.");
        d.emp_pat.focus();
        return false;
    }

    if (!/^[A-Za-z\s]+$/.test(d.participante.value)) {
        alert("Por favor, informe um nome válido com letras e espaços apenas.");
        d.participante.focus();
        return false;
    }
    

    if (!/^[A-Za-z\s]+$/.test(d.requerente.value)) {
        alert("Por favor, informe um nome válido com letras e espaços apenas.");
        d.requerente.focus();
        return false;
    }


    if (d.dataNascimentoP.value === "") {
        alert("Por favor informe a data de nascimento.");
        d.dataNascimentoP.focus();
        return false;
    }

    var cpfValue = d.cpf.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

    if (cpfValue === "" || cpfValue.length !== 11) {
        alert("Por favor, informe um CPF válido com 11 dígitos numéricos.");
        d.cpf.focus();
        return false;
    }
    

    if (!d.sexo[0].checked && !d.sexo[1].checked) {
        alert("Por favor escolha o sexo.");
        d.sexo[0].focus();
        return false;
    }

    if (d.identidade.value === "") {
        alert("Por favor informe a identidade.");
        d.identidade.focus();
        return false;
    }

    if (isNaN(d.identidade.value)) {
        alert("Número da identidade deve conter apenas números.");
        d.identidade.focus();
        return false;
    }

    if (d.orgaoExp.value === "") {
        alert("Por favor informe o orgão expedidor.");
        d.orgaoExp.focus();
        return false;
    }

    if (d.email.value === "") {
        alert("Por favor informe o e-mail.");
        d.email.focus();
        return false;
    }

    var pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (!pattern.test(d.email.value)) {
        alert("O campo de e-mail deve conter um endereço eletrônico válido. Ex: nome@dominio.com");
        d.email.focus();
        return false;
    }

    if (d.endCompleto.value === "") {
        alert("Por favor informe o endereço.");
        d.endCompleto.focus();
        return false;
    }


    if (d.bairro.value === "") {
        alert("Por favor informe seu bairro.");
        d.bairro.focus();
        return false;
    }

    if (d.cidade.value === "") {
        alert("Por favor informe a cidade.");
        d.cidade.focus();
        return false;
    }

    if (d.cep.value === "") {
        alert("Por favor informe o CEP.");
        d.cep.focus();
        return false;
    }


    if (d.uf.value === "") {
        alert("Por favor informe estado(UF)");
        d.uf.focus();
        return false;
    }

    if (d.Tcelular.value === "") {
        alert("Por favor informe o telefone celular.");
        d.Tcelular.focus();
        return false;
    }
	
	// if(!d.tipoAposentadoria[3].checked){
      
	// 	if (d.dependentes.value === "") {
	// 		alert("Por favor selecione uma opção no campo Informações dos Beneficiários: Pessoa que irá receber o benefício no caso de falecimento do Participante.");
	// 		d.dependentes.focus();
	// 		return false;
	// 	}
	// }

    if (d.dependentes2.value === "") {
        alert("Por favor informe a quantidade de dependentes.");
        d.dependentes2.focus();
        return false;
    }

    if (!d.tipoAposentadoria[0].checked && !d.tipoAposentadoria[1].checked && !d.tipoAposentadoria[2].checked && !d.tipoAposentadoria[3].checked) {
        alert("Por favor informe o tipo de requerimento.");
        d.tipoAposentadoria[0].focus();
        return false;
    }

    if (d.tipoAposentadoria[0].checked || d.tipoAposentadoria[1].checked || d.tipoAposentadoria[2].checked || d.tipoAposentadoria[3].checked) {
        
        if(d.tipoAposentadoria[0].checked || d.tipoAposentadoria[1].checked){

            if(d.identidade_file.value === ""){
                d.identidade_file.focus();
                alert("Por favor anexar a Cópia da identidade do Participante");
                return false;
            }
            if(d.recisao_file.value === ""){
                d.recisao_file.focus();
                alert("Por favor anexar a Cópia da rescisão contratual");
                return false;
            }
            if(d.bancario_file.value === ""){
                d.bancario_file.focus();
                alert("Por favor anexar a Comprovante bancário");
                return false;
            }

            
        }

        if(d.tipoAposentadoria[2].checked){

            if(d.identidade_file.value === ""){
                d.identidade_file.focus();
                alert("Por favor anexar a Cópia da identidade do Participante");
                return false;
            }
            if(d.bancario_file.value === ""){
                d.bancario_file.focus();
                alert("Por favor anexar o Comprovante bancário");
                return false;
            }
            if(d.inss_file.value === ""){
                d.inss_file.focus();
                alert("Por favor anexar a Cópia autenticada da Carta de Concessão do INSS");
                return false;
            }
            if(d.doenca_file.value === ""){
                d.doenca_file.focus();
                alert("Por favor anexar a Declaração de cessação do auxílio doença");
                return false;
            }

            
        }

        if(d.tipoAposentadoria[3].checked){

            if(d.identidade_file.value === ""){
                d.identidade_file.focus();
                alert("Por favor anexar a Cópia da identidade do Participante");
                return false;
            }
            if(d.recisao_file.value === ""){
                d.recisao_file.focus();
                alert("Por favor anexar a Cópia da rescisão contratual");
                return false;
            }
            if(d.bancario_file.value === ""){
                d.bancario_file.focus();
                alert("Por favor anexar o Comprovante bancário");
                return false;
            }
            if(d.obito_file.value === ""){
                d.obito_file.focus();
                alert("Por favor anexar a Cópia da certidão de óbito do Participante");
                return false;
            }
            if(d.identidadeMenor_file.value === ""){
                d.identidadeMenor_file.focus();
                alert("Por favor anexar a Cópia da identidade / certidão de nascimento (se menor) dos requerentes");
                return false;
            }
            
        }

    }

    if (d.xim.checked) {
        if (d.porct.value === "") {
            alert("Indicar a porcentagem da parcela única.");
            d.porct.focus();
            return false;
        }
    } else {
        //alert("Marque a opção de receber a porcentagem em parcela única.");
        //d.xim.focus();
        //return false;
    }

    if (d.rendaM1ano.value === 0 && d.rendaM2pc.value === 0) {
        alert("Indicar a porcentagem da renda mensal.");
        d.rendaM1ano.focus();
        return false;

    }


    if (!d.rendaMensal[0].checked && !d.rendaMensal[1].checked && !d.rendaMensal[2].checked && !d.rendaMensal[3].checked) {
        alert("Por favor escolha o tipo de renda.");
        d.rendaMensal[0].focus();
        return false;
    }

    if (d.rendaMensal[0].checked) {
        if (d.rendaM1ano.value === "0") {
            alert("Nesta opção, informe o período.");
            d.rendaM1ano.focus();
            return false;
        }
    }

    if (d.rendaMensal[1].checked) {
        if (d.rendaM2pc.value === "") {
            alert("Informe o Percentual dentro da renda mensal correspondente.");
            d.rendaM2pc.focus();
            return false;
        }
    }

    if (d.rendaMensal[1].checked) {
        if (d.rendaM2pc.value < '0,5' || d.rendaM2pc.value > '2') {
            alert("Nesta opção, informe a porcentagem.");
            d.rendaM2pc.focus();
            return false;
        }
    }
	
    if (d.rendaMensal[1].checked) {
        if (!d.tipo_m2x[0].checked && !d.tipo_m2x[1].checked) {
            alert("Por favor escolha uma opção para a renda 'Renda Mensal correspondente à aplicação de um percentual'.");
            d.tipo_r[0].focus();
            return false;
        }
    }

    if (d.rendaMensal[1].checked) {
        if (d.rendaM2pc.value === "0") {
            alert("Informe o Percentual dentro da renda mensal correspondente.");
            d.rendaM2pc.focus();
            return false;
        }
    }

    if (d.rendaMensal[2].checked) {
        if (!d.tipo_r[0].checked && !d.tipo_r[1].checked) {
            alert("Por favor escolha COM ou SEM reserva de pensão.");
            d.tipo_r[0].focus();
            return false;
        }
    }

    if (!d.perfilInvestimento[0].checked && !d.perfilInvestimento[1].checked) {
        alert("Por favor informe o Perfil de Investimento.");
        d.perfilInvestimento[0].focus();
        return false;
    }

    if (!d.noDep.checked && document.getElementById("linha2").style.display !== 'none') {


        if (d.nomec2.value === "") {
            alert("O campo Nome do primeiro dependente não foi preenchido!");
            d.nomec2.focus();
            return false;
        }

        if (d.datac2.value === "" || d.datac2.value.length < 10) {
            alert("O campo Data primeiro dependente não foi preenchido.");
            d.datac2.focus();
            return false;
        }

        if (d.sexoc2.value === "") {
            alert("Por favor informe o Sexo do primeiro dependente.");
            d.sexoc2.focus();
            return false;
        }

        if (!d.coD1[0].checked && !d.coD1[1].checked && !d.coD1[2].checked && !d.coD1[3].checked && !d.coD1[4].checked && !d.coD1[5].checked && !d.coD1[6].checked && !d.coD1[7].checked && !d.coD1[8].checked) {
            alert("O campo Cód. de Dependência do primeiro dependente não foi preenchido.");
            d.coD1[0].focus();
            return false;
        }
    }
    else {
        if (!d.noDep.checked) {
            alert("Marque a opção NÃO Tenho Dependentes para Fins de IMPOSTO DE RENDA ou indique a quantidade de dependentes.");
            d.noDep.focus();
            return false;
        }
    }

    if (document.getElementById("c2").style.display !== 'none') {


        if (d.nomec3.value === "") {
            alert("O campo Nome do segundo dependente não foi preenchido!");
            d.nomec3.focus();
            return false;
        }

        if (d.datac3.value === "" || d.datac3.value.length < 10) {
            alert("O campo Data segundo dependente não foi preenchido.");
            d.datac3.focus();
            return false;
        }

        if (d.sexoc3.value === "") {
            alert("Por favor informe o Sexo do segundo dependente.");
            d.sexoc3.focus();
            return false;
        }

        if (!d.coD2[0].checked && !d.coD2[1].checked && !d.coD2[2].checked && !d.coD2[3].checked && !d.coD2[4].checked && !d.coD2[5].checked && !d.coD2[6].checked && !d.coD2[7].checked && !d.coD2[8].checked) {
            alert("O campo Cód. de Dependência do segundo dependente não foi preenchido.");
            d.coD2[0].focus();
            return false;
        }
    }

    if (document.getElementById("c3").style.display !== 'none') {


        if (d.nomec4.value === "") {
            alert("O campo Nome do terceiro dependente não foi preenchido!");
            d.nomec4.focus();
            return false;
        }

        if (d.datac4.value === "" || d.datac4.value.length < 10) {
            alert("O campo Data terceiro dependente não foi preenchido.");
            d.datac4.focus();
            return false;
        }

        if (d.sexoc4.value === "") {
            alert("Por favor informe o Sexo do terceiro dependente.");
            d.sexoc4.focus();
            return false;
        }

        if (!d.coD3[0].checked && !d.coD3[1].checked && !d.coD3[2].checked && !d.coD3[3].checked && !d.coD3[4].checked && !d.coD3[5].checked && !d.coD3[6].checked && !d.coD3[7].checked && !d.coD3[8].checked) {
            alert("O campo Cód. de Dependência do terceiro dependente não foi preenchido.");
            d.coD3[0].focus();
            return false;
        }
    }

    if (document.getElementById("c4").style.display !== 'none') {


        if (d.nomec5.value === "") {
            alert("O campo Nome do quarto dependente não foi preenchido!");
            d.nomec5.focus();
            return false;
        }

        if (d.datac5.value === "" || d.datac5.value.length < 10) {
            alert("O campo Data quarto dependente não foi preenchido.");
            d.datac5.focus();
            return false;
        }

        if (d.sexoc5.value === "") {
            alert("Por favor informe o Sexo do quarto dependente.");
            d.sexoc5.focus();
            return false;
        }

        if (!d.coD4[0].checked && !d.coD4[1].checked && !d.coD4[2].checked && !d.coD4[3].checked && !d.coD4[4].checked && !d.coD4[5].checked && !d.coD4[6].checked && !d.coD4[7].checked && !d.coD4[8].checked) {
            alert("O campo Cód. de Dependência do quarto dependente não foi preenchido.");
            d.coD4[0].focus();
            return false;
        }
    }

    if (document.getElementById("c5").style.display !== 'none') {


        if (d.nomec6.value === "") {
            alert("O campo Nome do quinto dependente não foi preenchido!");
            d.nomec6.focus();
            return false;
        }

        if (d.datac6.value === "" || d.datac6.value.length < 10) {
            alert("O campo Data quinto dependente não foi preenchido.");
            d.datac6.focus();
            return false;
        }

        if (d.sexoc6.value === "") {
            alert("Por favor informe o Sexo do quinto dependente.");
            d.sexoc6.focus();
            return false;
        }

        if (!d.coD5[0].checked && !d.coD5[1].checked && !d.coD5[2].checked && !d.coD5[3].checked && !d.coD5[4].checked && !d.coD5[5].checked && !d.coD5[6].checked && !d.coD5[7].checked && !d.coD5[8].checked) {
            alert("O campo Cód. de Dependência do quinto dependente não foi preenchido.");
            d.coD5[0].focus();
            return false;
        }
    }

    if (document.getElementById("c6").style.display !== 'none') {


        if (d.nomec7.value === "") {
            alert("O campo Nome do sexto dependente não foi preenchido!");
            d.nomec7.focus();
            return false;
        }

        if (d.datac7.value === "" || d.datac7.value.length < 10) {
            alert("O campo Data sexto dependente não foi preenchido.");
            d.datac7.focus();
            return false;
        }

        if (d.sexoc7.value === "") {
            alert("Por favor informe o Sexo do sexto dependente.");
            d.sexoc7.focus();
            return false;
        }

        if (!d.coD6[0].checked && !d.coD6[1].checked && !d.coD6[2].checked && !d.coD6[3].checked && !d.coD6[4].checked && !d.coD6[5].checked && !d.coD6[6].checked && !d.coD6[7].checked && !d.coD6[8].checked) {
            alert("O campo Cód. de Dependência do sexto dependente não foi preenchido.");
            d.coD6[0].focus();
            return false;
        }
    }

    if (document.getElementById("c7").style.display !== 'none') {


        if (d.nomec8.value === "") {
            alert("O campo Nome do sétimo dependente não foi preenchido!");
            d.nomec8.focus();
            return false;
        }

        if (d.datac8.value === "" || d.datac8.value.length < 10) {
            alert("O campo Data sétimo dependente não foi preenchido.");
            d.datac8.focus();
            return false;
        }

        if (d.sexoc8.value === "") {
            alert("Por favor informe o Sexo do sétimo dependente.");
            d.sexoc8.focus();
            return false;
        }

        if (!d.coD7[0].checked && !d.coD7[1].checked && !d.coD7[2].checked && !d.coD7[3].checked && !d.coD7[4].checked && !d.coD7[5].checked && !d.coD7[6].checked && !d.coD7[7].checked && !d.coD7[8].checked) {
            alert("O campo Cód. de Dependência do sétimo dependente não foi preenchido.");
            d.coD3[0].focus();
            return false;
        }
    }

    if (document.getElementById("c8").style.display !== 'none') {


        if (d.nomec9.value === "") {
            alert("O campo Nome do oitavo dependente não foi preenchido!");
            d.nomec9.focus();
            return false;
        }

        if (d.datac9.value === "" || d.datac9.value.length < 10) {
            alert("O campo Data oitavo dependente não foi preenchido.");
            d.datac9.focus();
            return false;
        }

        if (d.sexoc9.value === "") {
            alert("Por favor informe o Sexo do oitavo dependente.");
            d.sexoc9.focus();
            return false;
        }

        if (!d.coD8[0].checked && !d.coD8[1].checked && !d.coD8[2].checked && !d.coD8[3].checked && !d.coD8[4].checked && !d.coD8[5].checked && !d.coD8[6].checked && !d.coD8[7].checked && !d.coD8[8].checked) {
            alert("O campo Cód. de Dependência do oitavo dependente não foi preenchido.");
            d.coD8[0].focus();
            return false;
        }
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

function validarData(campo) {

    var input = $('#' + campo.id);

    if (campo.value !== "") {
        var expReg = /^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[1-2][0-9]\d{2})$/;
        var msgErro = "";

        if ((campo.value.match(expReg)) && (campo.value !== '')) {
            var dia = campo.value.substring(0, 2) * 1;
            var mes = campo.value.substring(3, 5) * 1;
            var ano = campo.value.substring(6, 10) * 1;
            if ((mes === 4 || mes === 6 || mes === 9 || mes === 11) && dia > 30) {
                msgErro = "Dia incorreto! O mês especificado contém no máximo 30 dias.";

            } else {
                if (ano % 4 !== 0 && mes === 2 && dia > 28) {
                    msgErro = "Data incorreta! O mês especificado contém no máximo 28 dias.";

                } else {
                    if (ano % 4 === 0 && mes === 2 && dia > 29) {
                        msgErro = "Data incorreta!! O mês especificado contém no máximo 29 dias.";
                    }
                }
            }
        } else {
            msgErro = "Formato inválido de data.";
        }

        if (msgErro !== "") {
            alert(msgErro);
            try {
                setTimeout("document.forms[0]." + campo.name + ".focus();" +
                    "document.forms[0]." + campo.name + ".select();", 1);
            } catch (e) {
            }

            input.siblings(".alert").html('A data ' + campo.value + ' não é válida!');
            input.siblings(".alert").addClass('active');

            campo.focus();

            input.val('');

            return false;
        }

        input.siblings(".alert").html('');
        input.siblings(".alert").removeClass('active');
    }
}

function somenteNumeros(evnt, permitidos) {

    var tecla = null;

    if (evnt.charCode === undefined) {
        tecla = evnt.keyCode;
    } else {
        tecla = evnt.charCode;
    }

    var teste = false;
    if (permitidos !== undefined && permitidos !== "") {
        if (permitidos.indexOf(String.fromCharCode(tecla)) !== -1) teste = true;
    }

    if (clientNavigator === "IE") {
        if (tecla < 48 || tecla > 57) {
            return teste;
        }
    } else {
        if ((tecla < 48 || tecla > 57) && evnt.keyCode === 0) {
            return teste;
        }
    }
}

function ValidaEmail(event) {

    var input = $('#' + event.id);

    if (event.value !== "") {

        if (event.value.indexOf('@', 0) === -1 || event.value.indexOf('.', 0) === -1) {

            alert("E-mail invalido!");

            input.siblings(".alert").html('O email ' + event.value + ' não é válido!');
            input.siblings(".alert").addClass('active');
            event.focus();

            input.val('');
        }
    }
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
