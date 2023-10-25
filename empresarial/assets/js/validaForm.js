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
    "rescisaoContratual": ""
}

function convertToBase64(param) {
    var base64;
    var selectedFile = document.getElementById(param).files;
    console.log(selectedFile)
    if (selectedFile.length > 0) {
        var fileToLoad = selectedFile[0];
        var fileReader = new FileReader();
        fileReader.onload = function(fileLoadedEvent) {
            base64 = fileLoadedEvent.target.result;
            //console.log(base64);
            switch (param) {
                case "identidade_patrocinio":
                    outputJson.identidadeParticipante = base64;
                    break;
				case "identidade_beneficio":
                    outputJson.identidadeParticipante = base64;
                    break;
				case "identidade_resgate":
                    outputJson.identidadeParticipante = base64;
                    break;
				case "identidade_portabilidade":
					outputJson.identidadeParticipante = base64;
					break;
                case "recisao_patrocinio":
                    outputJson.rescisaoContratual = base64;
                    break;
				case "recisao_beneficio":
                    outputJson.rescisaoContratual = base64;
                    break;
				case "recisao_portabilidade":
					outputJson.rescisaoContratual = base64;
					break;
                case "comprovante_resgate":
                    outputJson.comprovanteBancario = base64;
                    break;                
            }
        };
        fileReader.readAsDataURL(fileToLoad);
    }
    console.log(outputJson);
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
} 


// validar formulario


function validaForm() {
    var d = document.querySelector('form');

    if (d.patrocinadora.value === "") {
        alert("Por favor informe o nome da empresa patrocinadora.");
        d.patrocinadora.focus();
        return false;
    }

    if (d.nome.value.trim() === "") {
        alert("Por favor informe o nome do(a) Participante.");
        d.nome.focus();
        return false;
        
    } else if (!/^[\s]+$/.test(d.nome.value)) {
        alert("O nome do(a) Participante só deve conter espaços.");
        d.nome.focus();
        return false;
    }
    if (d.data_nasc.value === "" || d.data_nasc.value.length !== 10 || !check_date(d.data_nasc.value)) {
        alert("Por favor informe a data de nascimento corretamente (dd/mm/aaaa).");
        d.data_nasc.focus();
        return false;
    }

    if (d.cpf.value === "" || d.cpf.value.length !== 11 || !check_cpf(d.cpf.value)) {
        alert("Por favor informe o CPF corretamente (11 dígitos).");
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

    if (!d.solicito[0].checked && !d.solicito[1].checked) {
        alert("Escolha uma das opções.");
        d.solicito[0].focus();
        return false;
    }

    if (d.solicito[1].checked) {
        if (d.banco.value === "") {
            alert("Por favor informe se o seu banco é o Banco do Brasil ou o Itaú.");
            d.banco.focus();
            return false;
        }
        if (d.agencia.value === "" || d.codigo_agencia.value === "" || d.conta_corrente.value === "" || d.codigo_conta.value === "") {
            alert("Por favor informe todos os campos bancários.");
            return false;
        }
    }
	outputJson.nomePatrocinadora = d.emp_pat.value;
	outputJson.nomeParticipante = d.nome.value;
	outputJson.dataNascimento = d.dataNascimento.value;
	outputJson.cpf = d.cpf.value;
	outputJson.nNif = d.nif.value;
	outputJson.residenteExterior = d.resE.value;
	outputJson.dataSaida = d.dataSaida.value;
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

function salvarJSONLocalStorage() {
    localStorage.setItem('myJson', JSON.stringify(outputJson));
    console.log(outputJson);
}
