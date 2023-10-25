<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <title>Formul&aacute;rio de Requerimento de Benef&iacute;cio</title>
    <link rel="stylesheet" href="F11.css">
    <script type="application/javascript" src="jquery321.min.js"></script>
    <script type="application/javascript" src="jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function mostrarfacta() {
            if (document.getElementById("mfacta").style.display == "none"){
                document.getElementById("mfacta").style.display = "block";
            }

        }
        function ocultafacta() {
            if (document.getElementById("mfacta").style.display == "block"){
                document.getElementById("mfacta").style.display = "none";
                document.form1.nif.value = "";
                $(".opcao3").html("");
            }

        }
    </script>
    <script type="application/javascript">
      function Dependentes2(valor) {
    var habilitar = "";
    switch (valor) {
        case "1":
            habilitar = "linha2";
            break;
        case "2":
            habilitar = "linha2,c2";
            break;
        case "3":
            habilitar = "linha2,c2,c3";
            break;
        case "4":
            habilitar = "linha2,c2,c3,c4";
            break;
        case "5":
            habilitar = "linha2,c2,c3,c4,c5";
            break;
        case "6":
            habilitar = "linha2,c2,c3,c4,c5,c6";
            break;
        case "7":
            habilitar = "linha2,c2,c3,c4,c5,c6,c7";
            break;
        case "8":
            habilitar = "linha2,c2,c3,c4,c5,c6,c7,c8";
            break;
    }

    var padrao = "linha2,c2,c3,c4,c5,c6,c7,c8";
    padrao = padrao.split(",");
    for (var i = 0; i < padrao.length; i++)
        document.getElementById(padrao[i]).style.display = 'none';
    if (habilitar !== "") {
        habilitar = habilitar.split(",");
        for (var j = 0; j < habilitar.length; j++)
            document.getElementById(habilitar[j]).style.display = '';
    }
}

function Dependentes(valor) {
    var habilitar = "";
    switch (valor) {
        case "1":
            habilitar = "linha,d1";
            break;
        case "2":
            habilitar = "linha,d1,d2";
            break;
        case "3":
            habilitar = "linha,d1,d2,d3";
            break;
        case "4":
            habilitar = "linha,d1,d2,d3,d4";
            break;
        case "5":
            habilitar = "linha,d1,d2,d3,d4,d5";
            break;
        case "6":
            habilitar = "linha,d1,d2,d3,d4,d5,d6";
            break;
        case "7":
            habilitar = "linha,d1,d2,d3,d4,d5,d6,d7";
            break;
        case "8":
            habilitar = "linha,d1,d2,d3,d4,d5,d6,d7,d8";
            break;
    }

    var padrao = "linha,d2,d3,d4,d5,d6,d7,d8";
    padrao = padrao.split(",");
    for (var i = 0; i < padrao.length; i++)
        document.getElementById(padrao[i]).style.display = 'none';

    if (habilitar !== "") {
        habilitar = habilitar.split(",");
        for (var j = 0; j < habilitar.length; j++)
            document.getElementById(habilitar[j]).style.display = '';
    }
}


function ativarDataSaida(opcao) {
            var dataSaida = document.getElementById('saida');
            var dataSaidaInput = document.getElementById('dataSaida');

            if (opcao === 'Sim') {
                dataSaida.style.display = 'block';
                dataSaidaInput.required = true;
            } else {
                dataSaida.style.display = 'none';
                dataSaidaInput.required = false;
            }
        }

function exibe(id) {
    if (document.getElementById(id).style.display === "none") {
        document.getElementById(id).style.display = "inline";
    }

    else {
        document.getElementById(id).style.display = "none";
    }
}

function exibeF(id,e) {
    if (e.value == "FILHO(A)") {
        document.getElementById(id).style.display = "block";
    }else {
        document.getElementById(id).style.display = "none";
    }
}

function exibeDep(id) {

    if (document.getElementById(id).style.display === "none") {
        document.getElementById(id).style.display = "";
    }

    else {
        document.getElementById(id).style.display = "none";
    }

}

function disable() {

    document.getElementById("porct").disabled = document.getElementById("xim").checked !== true;

}

function habilitaDesabilitaCombo(opc) {
        if (opc.value === "rendaM1") {
            document.getElementById("rendaM1ano").disabled = false;
        } else {
            document.getElementById("rendaM1ano").disabled = true;
            document.getElementById("rendaM1ano").value = "0";
        }
    }

function toggleReceber(opc) {
    console.log("asdf4: " + opc);
    if (opc.value === true) {
        document.getElementById("porct").disabled = false;
    } else {
        document.getElementById("porct").disabled = true;
        document.getElementById("porct").value = "0";
    }
}

function habilitaDesabilitaCombo2(opc) {
        if (opc.value === "rendaM2") {
            document.getElementById("rendaM2pc").disabled = false;
        } else {
            document.getElementById("rendaM2pc").disabled = true;
            document.getElementById("rendaM2pc").value = "0";
        }

        // Ao selecionar "Renda Mensal correspondente à aplicação de um percentual", exibe as partes de rendaM2x
        if (opc.value === "rendaM2") {
            document.getElementById("rendaM2x").style.display = "block";
        } else {
            document.getElementById("rendaM2x").style.display = "none";
        }
    }



function habilitaDesabilitaCombo3(opc) {

    if (opc.value === "pUnica") {
        document.getElementById("rendaUni").disabled = false;
    } else {
        document.getElementById("rendaUni").disabled = true;
        document.getElementById("rendaUni").value = "0";
    }
}

function ckmesmo() {

    console.log('teste')

    if (document.getElementById("mesmo").checked === true) {
        document.getElementById("requerente").disabled = true;
        document.getElementById("parentesco").disabled = true;
        document.getElementById("requerente").value = document.getElementById("nomePatrocinadora2").value;
        document.getElementById("parentesco").value = "";
    }

    else {
        document.getElementById("requerente").disabled = false;
        document.getElementById("parentesco").disabled = false;
        document.getElementById("parentesco").value = "";
        document.getElementById("requerente").value = "";
    }

}

function quadro1(id) {

    if (document.getElementById(id).style.display === "none") {
        document.getElementById(id).style.display = "";
    }

    else {
        document.getElementById(id).style.display = "none";
    }

}

function MM_openBrWindow(theURL, winName, features) { //v2.0
    window.open(theURL, winName, features);
}


function check_cpf2(numcpfT) {


	var numcpf = "";
	var id = "div."+numcpfT.id
	// console.log(cpf_alert);
    $(id).html("");
	numcpf = numcpfT.value;

    if (numcpf !== "") {
        numcpf = numcpf.replace(".", "");
        numcpf = numcpf.replace(".", "");
        numcpf = numcpf.replace("-", "");

        var x = 0;

        var soma = 0;

        var dig1 = 0;

        var dig2 = 0;

        var texto = "";

        var numcpf1 = "";

        var len = numcpf.length;
        x = len - 1;

        // var numcpf = "12345678909";

        for (var i = 0; i <= len - 3; i++) {
            y = numcpf.substring(i, i + 1);
            soma = soma + ( y * x);
            x = x - 1;
            texto = texto + y;
        }

        var dig1 = 11 - (soma % 11);
        if (dig1 === 10) dig1 = 0;
        if (dig1 === 11) dig1 = 0;
        var numcpf1 = numcpf.substring(0, len - 2) + dig1;
        var x = 11;
        var soma = 0;

        for (var i = 0; i <= len - 2; i++) {
            soma = soma + (numcpf1.substring(i, i + 1) * x);
            x = x - 1;
        }

        var dig2 = 11 - (soma % 11);
        if (dig2 === 10) dig2 = 0;
        if (dig2 === 11) dig2 = 0;

        if ((dig1 + "" + dig2) === numcpf.substring(len, len - 2)) {

			$(id).html("");
            // $(id).removeClass('active');

			// console.log(numcpf);
            return true;

        }

        // $(id).addClass('active');
		$(id).html("Número do CPF inválido.");

		// if(numcpfT.id === "cpfd1"){
			// console.log("a");
		// }

        return false;
    }
}

function mostraDocs(pItem) {
    // document.getElementById('normal_antecipada').style.display = 'none';
    // document.getElementById('invalidez').style.display = 'none';
    // document.getElementById('morte').style.display = 'none';
    document.getElementById('beneficiario_select').style.display = 'none';
    document.getElementById('identidadeDiv').style.display = 'none';
    document.getElementById('recisaoDiv').style.display = 'none';
    document.getElementById('bancarioDiv').style.display = 'none';
    document.getElementById('inssDiv').style.display = 'none';
    document.getElementById('doencaDiv').style.display = 'none';
    document.getElementById('obitoDiv').style.display = 'none';
    document.getElementById('identidadeMenorDiv').style.display = 'none';
    document.getElementById('casamentoDiv').style.display = 'none';
    switch (pItem) {
        case "1":
            //document.getElementById('normal_antecipada').style.display = '';
            document.getElementById('dependentes').disabled = true;
            document.getElementById('identidadeDiv').style.display = '';
            document.getElementById('recisaoDiv').style.display = '';
            document.getElementById('bancarioDiv').style.display = '';
            break;

        case "2":
            //document.getElementById('antecipada').style.display = '';
            document.getElementById('dependentes').disabled = true;
            document.getElementById('identidadeDiv').style.display = '';
            document.getElementById('recisaoDiv').style.display = '';
            document.getElementById('bancarioDiv').style.display = '';
            break;

        case "3":
            //document.getElementById('invalidez').style.display = '';
            document.getElementById('dependentes').disabled = true;
            document.getElementById('identidadeDiv').style.display = '';
            document.getElementById('inssDiv').style.display = '';
            document.getElementById('doencaDiv').style.display = '';
            document.getElementById('bancarioDiv').style.display = '';
            break;

        case "4":
            //document.getElementById('morte').style.display = '';
            document.getElementById('beneficiario_select').style.display = '';
            document.getElementById('dependentes').disabled = false;
            document.getElementById('identidadeDiv').style.display = '';
            document.getElementById('recisaoDiv').style.display = '';
            document.getElementById('bancarioDiv').style.display = '';
            document.getElementById('obitoDiv').style.display = '';
            document.getElementById('identidadeMenorDiv').style.display = '';
            document.getElementById('identidadeRepresentanteDiv').style.display = '';
            document.getElementById('casamentoDiv').style.display = 'none';
			Dependentes('');
            break;
    }

}



function limparFile (param) {

    document.getElementById(param).value = "";

}


var rendaM2pc = $('#rendaM2pc');

rendaM2pc.mask('A.ZZ', {
        translation: {
            'Z': {pattern: /[0-9]/, optional: true},
            'A': {pattern: /[0-2]/, optional: true}
        }
    }
);

rendaM2pc.on("blur", function () {
    var Nval = $(this).val();
    if (Nval < 0.5 || Nval > 2) {
        $(this).val('' + '');
        alert("Digite valores entre 0,5% e 2% Conforme Regulamento.");
    }

});

function userforms(valor) {


    document.getElementById('formemails').innerHTML = '';

    if (valor > 8) {
        alert('Numero de dependentes limitado &agrave; 8 ');
        document.forms[0].num_dependentes.value = 8;
        valor = 8;
    }

    for (var i = 0; i < valor; i++) {
        document.getElementById('formemails').innerHTML += '<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="241" valign="bottom" class="tituloCurtas"><font color="red" size="1" class="tituloCurtas">&nbsp;&nbsp;&nbsp;( Dados do ' + (i + 1) + '&ordm; dependente)</font><br><span class="tituloCurtas">&nbsp;&nbsp;&nbsp;Nome Completo: <input name="depNome' + (i + 1) + '" type="text" id="depNome' + (i + 1) + '" size="30"><br>&nbsp;&nbsp;&nbsp;Data de Nasc: <input name="depNasc_dia' + (i + 1) + '" type="text" id="depNasc_dia' + (i + 1) + '" size="2" maxlength="2">/<input name="depNasc_mes' + (i + 1) + '" type="text" id="depNasc_mes' + (i + 1) + '" size="2" maxlength="2">/<input name="depNasc_ano' + (i + 1) + '" type="text" id="depNasc_ano' + (i + 1) + '" size="4" maxlength="4"></span><br>';
        document.getElementById('formemails').innerHTML += '</td><br><td width="154" valign="bottom"><span class="tituloCurtas">&nbsp;&nbsp;&nbsp;(I) Inclus&atilde;o<br>&nbsp;&nbsp;&nbsp;(E) Exclus&atilde;o </span><select name="dep_inc_exc' + (i + 1) + '" id="dep_inc_exc' + (i + 1) + '"><option value="Inclus&atilde;o"><span class="tituloCurtas">     Inclus&atilde;o</span></option><option value="Exclus&atilde;o"><span class="tituloCurtas">     Exclus&atilde;o</option></select></span><br>';
        document.getElementById('formemails').innerHTML += '<br><span class="tituloCurtas">&nbsp;&nbsp;&nbsp;Parentesco      <input name="dep_Parentesco' + (i + 1) + '" type="text" id="dep_Parentesco' + (i + 1) + '">      Sexo:      <select name="depSexo' + (i + 1) + '" id="depSexo' + (i + 1) + '"><option>Masculino</option><option>Feminino</option></select></td><td width="62" valign="bottom"><span class="tituloCurtas">     Inv&aacute;lido:        <select name="depInvalido' + (i + 1) + '" id="depInvalido' + (i + 1) + '"><option value="Sim">Sim</option><option value="N&atilde;o" selected>N&atilde;o</option></select></td></tr></table><br><br><br>';
    }


}


function exibe3(id) {
  var elemento = document.getElementById(id); // Obtém o elemento com base no ID

  if (elemento) {
    if (elemento.style.display === 'none' || elemento.style.display === '') {
      // Se o elemento estiver oculto ou não tiver estilo de exibição definido, mostra-o
      elemento.style.display = 'block';
    } else {
      // Caso contrário, oculta o elemento
      elemento.style.display = 'none';
    }
  }
}



    </script>
    <script>
document.getElementById('rendaM2pc').addEventListener('input', function() {
  var min = 0.1;
  var max = 2;
  var value = parseFloat(this.value);
  
  if (value < min || value > max) {
    // Exibir mensagem de erro, por exemplo:
    alert('O valor deve estar entre 0.1% e 2%.');
    this.value = ''; // Limpar o campo se estiver fora do intervalo permitido.
  }
});
</script>

</head>
<body>
<form name="form1" method="post" action="impresso.php" onsubmit="return validaForm()">
    <table width="721" height="110" border="0" align="center">
        <tr>
            <td width="715" colspan="4" class="tituloCurtas">
                <table width="702" height="110" border="0" align="center" cellspacing="5">

                    <!--                    LOGOMARCA-->
                    <tr>
                        <td colspan="5"><img src="images/logotopo.png" width="225" height="77"/></td>
                    </tr>
                    <!--                    HEADER COM TÍTULO DO FORM-->
                    <tr>
                        <td height="65" colspan="5" align="center" style="background:#09F;">
                                <span class="style19"
                                      style="color:white; font-family:Arial, Helvetica, sans-serif !important;">
                                <br/>REQUERIMENTO DE BENEF&Iacute;CIO </span>
                            <span class="style19"><br/>
                                    <br/>
                                </span>
                        </td>
                    </tr>


                    <!--                    INICIO DOS DADOS DO REQUERENTE-->
                    <tr>
                        <td colspan="2" class="style20">

                            Empresa Patrocinadora:
                        </td>
                        <td colspan="3" class="style20">

                            <select name="emp_pat" id="empPat">

                                <option value="" selected></option>

                                <option value="Abase"> Abase</option>

                                <option value="Sebrae nacional"> Sebrae/NA</option>

                                <option value="SEBRAEPREV"> SB SEBRAEPREV</option>

                                <option value="SEBRAE Amapá"> AP</option>

                                <option value="SEBRAE Acre"> AC</option>

                                <option value="SEBRAE Amazonas"> AM</option>

                                <option value="SEBRAE Alagoas"> AL</option>

                                <option value="SEBRAE Bahia"> BA</option>

                                <option value="SEBRAE Ceára"> CE</option>

                                <option value="SEBRAE Distrito-Federal"> DF</option>

                                <option value="SEBRAE Espirito-Santo"> ES</option>

                                <option value="SEBRAE Goiás"> GO</option>

                                <option value="SEBRAE Maranhão"> MA</option>

                                <option value="SEBRAE Minas-Gerais"> MG</option>

                                <option value="SEBRAE Mato-Grosso"> MT</option>

                                <option value="SEBRAE Mato-Grosso-do-Sul"> MS</option>

                                <option value="SEBRAE Piauí"> PI</option>

                                <option value="SEBRAE Pernambuco"> PE</option>

                                <option value="SEBRAE Paraiba"> PB</option>

                                <option value="SEBRAE Pará"> PA</option>

                                <option value="SEBRAE Paraná"> PR</option>

                                <option value="SEBRAE Rio-Grande-do-Norte"> RN</option>

                                <option value="SEBRAE Rio-Grande-do-Sul"> RS</option>

                                <option value="SEBRAE Rondônia"> RO</option>

                                <option value="SEBRAE Roraima"> RR</option>

                                <option value="SEBRAE Rio-de-Janeiro"> RJ</option>

                                <option value="SEBRAE São-Paulo"> SP</option>

                                <option value="SEBRAE Santa-Catarina"> SC</option>

                                <option value="SEBRAE Sergipe"> SE</option>

                                <option value="SEBRAE Tocantins"> TO</option>

                            </select>
                            <div class="alert empPat2" style="color:red"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="style20">
                            Nome Completo do(a) Participante:
                        </td>
                        <td colspan="3" class="style20">
                            <input name="participante" id="nomePatrocinadora2" size="30"/>
                            <span class="style12">(Sem abrevia&ccedil;&otilde;es)</span>
                            <div class="alert nomePatrocinadora2" style="color:red;"/>
                        </td>
                    </tr>
<script>
  console.log('JVYYXRE');
  console.log('23,9,12,12,11,5,18');
</script>
                    <tr>
                        <td colspan="2" class="style20">

                            Nome Completo do Requerente:
                        </td>

                        <td colspan="3" class="style20"><input name="requerente" id="requerente" size="30"/>

                            <input name="mesmo" type="checkbox" id="mesmo" value="mesmo" onclick="ckmesmo();"/>

                            <span class="style35">Marque se for o mesmo.</span>
                            <div class="alert requerente" style="color:red;"/>
                        </td>

                    </tr>
                    <tr>

                        <td colspan="2" class="style20">

                            Data de nascimento:
                        </td>

                        <td colspan="3" class="style20"><input name="dataNascimentoP" id="dataNascimentoP" maxlength="10" onblur="validarData(this);" onkeypress="return somenteNumeros(event,'');"/>
                            <div class="alert dataNascimentoP" style="color:red;"/>
                        </td>

                    </tr>
                    <tr>

                        <td colspan="2" class="style20">

                            CPF:
                        </td>

                        <td colspan="3" class="style20">
                            <input name="cpf" id="cpf" maxlength="14" onblur="return check_cpf2(this)" onkeypress="return somenteNumeros(event,'');"/>
                            <div class="alert cpf" style="color:red;"/>
                        </td>

                    </tr>
                    <tr>

                        <td colspan="2" class="style20">

                            Sexo:

                            <label></label></td>

                        <td colspan="3" class="style20"><input name="sexo" type="radio" value="m"/>

                            Masculino

                            <label>

                                <input name="sexo" type="radio" value="f"/>

                                Feminino</label>
                            <div class="alert sexo" style="color:red;"/>
                        </td>

                    </tr>
                    <tr>

                        <td colspan="2" class="style20">

                            Identidade:
                        </td>

                        <td colspan="3" class="style20"><input name="identidade" id="identidade" onkeypress="return somenteNumeros(event,'');"/>
                            <div class="alert identidade" style="color:red;"/>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2" class="style20">

                            Org&atilde;o Expedidor UF:
                        </td>

                        <td colspan="3" class="style20"><input name="orgaoExp" id="orgaoExp"/>
                            <div class="alert orgaoExp" style="color:red;"/>
                        </td>

                    </tr>
                    <tr>

                        <td colspan="2" class="style20">

                            Parentesco:
                        </td>

                        <td colspan="3" class="style20">
							<!--input name="parentesco" id="parentesco"/-->
							<span class="style25">
								<select name="parentesco" id="parentesco" >
									<option value="nd">---</option>
									<option value="COMPANHEIRO(A)">COMPANHEIRO(A)</option>
									<option value="CÔNJUGE">CÔNJUGE</option>
									<option value="ENTEADO(A)">ENTEADO(A)</option>
									<option value="FILHO(A)">FILHO(A)</option>
									<option value="GENITORES">GENITORES</option>
									<option value="INDICADO(A">INDICADO(A)</option>
									<option value="IRMÃO(A)">IRMÃO(A)</option>
								</select>
							</span>
                            <div class="alert parentesco" style="color:red;"/>
                        </td>

                    </tr>
                    <tr>

                        <td colspan="2" class="style20">

                            E-mail:
                        </td>

                        <td colspan="3" class="style20">
                            <input name="email" id="email" onblur="ValidaEmail(this)"/>
                            <div class="alert email" style="color:red;"/>
                        </td>

                    </tr>
                    <tr>

                        <td colspan="2" class="style20">

                            Endere&ccedil;o Completo:
                        </td>

                        <td colspan="3" class="style20"><input name="endCompleto" id="endCompleto" size="50"/>
                            <div class="alert endCompleto" style="color:red;"/>
                        </td>
                    </tr>
                    <tr>

                        <td colspan="2" class="style20">

                            Bairro:
                        </td>

                        <td colspan="3" class="style20"><input name="bairro" id="bairro"/>
                            <div class="alert bairro" style="color:red;"/>
                        </td>

                    </tr>
                    <tr>

                        <td colspan="2" class="style20">

                            Cidade:
                        </td>

                        <td colspan="3" class="style20"><input name="cidade" id="cidade"/>
                            <div class="alert cidade" style="color:red;"/>
                        </td>

                    </tr>
                    <tr>

                        <td colspan="2" class="style20">

                            CEP:
                        </td>

                        <td colspan="3" class="style20"><input name="cep" id="cep" onkeyup="mascara(this, '#####-###');"  onkeypress="return somenteNumeros(event,'');" maxlength="9"/>
                            <div class="alert cep" style="color:red;"/>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2" class="style20">

                            UF:
                        </td>

                        <td colspan="3" class="style20"><select name='uf' id='uf'>

                            <option value=""> --</option>

                            <option value=Amapá> AP</option>

                            <option value=Acre> AC</option>

                            <option value=Amazonas> AM</option>

                            <option value=Alagoas> AL</option>

                            <option value=Bahia> BA</option>

                            <option value=Ceára> CE</option>

                            <option value=Distrito-Federal> DF</option>

                            <option value=Espirito-Santo> ES</option>

                            <option value=Goiás> GO</option>

                            <option value=Maranhão> MA</option>

                            <option value=Minas-Gerais> MG</option>

                            <option value=Mato-Grosso> MT</option>

                            <option value=Mato-Grosso-do-Sul> MS</option>

                            <option value=Piauí> PI</option>

                            <option value=Pernambuco> PE</option>

                            <option value=Paraiba> PB</option>

                            <option value=Pará> PA</option>

                            <option value=Paraná> PR</option>

                            <option value=Rio-Grande-do-Norte> RN</option>

                            <option value=Rio-Grande-do-Sul> RS</option>

                            <option value=Rondônia> RO</option>

                            <option value=Roraima> RR</option>

                            <option value=Rio-de-Janeiro> RJ</option>

                            <option value=São-Paulo> SP</option>

                            <option value=Santa-Catarina> SC</option>

                            <option value=Sergipe> SE</option>

                            <option value=Tocantins> TO</option>

                        </select>
                            <div class="alert uf" style="color:red;"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="style20">
                            Telefones: <span class="style35">(com ddd)</span>
                            <div class="alert tels" style="color:red;"/>
                        </td>
                    </tr>
                    <tr>

                        <td width="186" class="style20">&nbsp;</td>

                        <td width="72" class="style20">Residencial:</td>

                        <td width="144" class="style20"><input name="Tresidencial" id="Tresidencial"
                                                               maxlength="13"
                                                               onkeypress="return somenteNumeros(event,'');"/></td>

                        <td width="86" class="style20">Comercial:</td>

                        <td width="192" class="style20"><input name="Tcomercial" id="Tcomercial"
                                                               maxlength="13"
                                                               onkeypress="return somenteNumeros(event,'');"/></td>

                    </tr>
                    <tr>
                        <td class="style20">&nbsp;</td>
                        <td class="style20">Celular:</td>
                        <td class="style20"><input name="Tcelular" maxlength="13" id="Tcelular"
                                                   onkeypress="return somenteNumeros(event,'');"/></td>
                        <td class="style20">Outros:</td>
                        <td class="style20"><input name="Toutros" id="Toutros" maxlength="13"
                                                   onkeypress="return somenteNumeros(event,'');"/></td>
                    </tr>
                    <td colspan="5" bgcolor="#FFFFFF" class="style20">
                      Voc&ecirc; &eacute; uma pessoa Politicamente Exposta?</strong></td>
                    </tr>
                  <tr>
                    <td colspan="5" bgcolor="#FFFFFF" class="style20"><label>
                      <input name="opcao" type="radio" value="Sim">
                      Sim</label>
                      <label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="opcao" type="radio" value="Nao">N&atilde;o</label></td>
                  </tr>
                  <tr>
                    <td colspan="5" bgcolor="#FFFFFF" class="style20">
                      Voc&ecirc; &eacute; report&aacute;vel a FATCA? 
                    </tr>
                  <tr>
                    <td colspan="5" bgcolor="#FFFFFF" class="style20"><label>
                        <input name="opcao3" type="radio" value="Sim" onClick="mostrarfacta()">
                        Sim</label>
                        <label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="opcao3" type="radio" value="Nao" onClick="ocultafacta()">N&atilde;o</label>
                        <div id="mfacta" style="display:none"><br>NIF (Número de Identificação Fiscal no Exterior): <input name="nif" type="text" id="nif" size="10" maxlength="9" onkeyup="return somenteNumeros(event,'');" onblur="checavazionif();" />
                            <span class="style1">(somente n&uacute;meros)</span></div>
                        <div class="alert opcao3" style="color:red;"></div>
                    </td>
                  </tr>
                    <tr>
                        <td colspan="4" bgcolor="#FFFFFF" class="style20">Você é residente no exterior?</td>
                    </tr>
                    <tr>
                        <td colspan="2" bgcolor="#FFFFFF" class="style20"><label>
                            <input name="opcaore" type="radio" value="Sim" onclick="ativarDataSaida('Sim')">
                            Sim</label>
                            <label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input name="opcaore" type="radio" value="Nao" onclick="ativarDataSaida('Nao')">N&atilde;o</label>
                            <div class="alert opcao" style="color:red;"></div>
                            
                        </td>
                        <td class="style20">
                            <div id="saida" style="display:none;" class="">
                                <label for="">Data de Saída</label>
                                <input name="dataSaida" id="dataSaida" placeholder="dd/mm/aaaa" maxlength="10" onblur="validarData(this);" onkeypress="return somenteNumeros(event,'');"/>
                            </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="2" class="style20">
                            Banco: <span class="style25"><img src="images/interrogacao.png" width="15" height="15" border="0" style="margin-bottom:-2px;" title="Os dados bancários devem ser do titular da conta"/>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </td>

                        <td colspan="3" class="style20"><select name="banco">

                            <option value="" selected></option>

                            <option value="001 - Banco do Brasil"> 001 - Banco do Brasil</option>

                            <option value="002 - Banco Central do Brasil"> 001 - Banco Central do Brasil
                            </option>

                            <option value="003 - Banco da Amazônia"> 003 - Banco da Amazônia</option>

                            <option value="004 - Banco do Nordeste do Brasil"> 004 - Banco do Nordeste do Brasil
                            </option>

                            <option value="007 - Banco Nacional de Desenvolvimento Econômico e Social"> 007 -
                                Banco
                                Nacional de Desenvolvimento Econômico e Social
                            </option>

                            <option value="104 - Caixa Econômica Federal"> 104 - Caixa Econômica Federal
                            </option>

                            <option value="046 - Banco Regional de Desenvolvimento do Extremo Sul"> 046 - Banco
                                Regional de Desenvolvimento do Extremo Sul
                            </option>

                            <option value="046 - Banco de Desenvolvimento do Espírito Santo"> 046 - Banco de
                                Desenvolvimento do Espírito Santo
                            </option>

                            <option value="023 - Banco de Desenvolvimento de Minas Gerais"> 023 - Banco de
                                Desenvolvimento de Minas Gerais
                            </option>

                            <option value="023 - Banco de Desenvolvimento do Paraná"> 023 - Banco de Desenvolvimento do Paraná
                            </option>

                            <option value="070 - Banco de Brasília"> 070 - Banco de Brasília</option>

                            <option value="047 - Banco do Estado de Sergipe"> 047 - Banco do Estado de Sergipe
                            </option>

                            <option value="021 - Banco do Estado do Espírito Santo"> 021 - Banco do Estado do
                                Espírito Santo
                            </option>

                            <option value="037 - Banco do Estado do Pará"> 037 - Banco do Estado do Pará
                            </option>

                            <option value="041 - Banco do Estado do Rio Grande do Sul"> 041 - Banco do Estado do Rio Grande do Sul
                            </option>

                            <option value="085 - Banco Ailos"> 085 - Banco Ailos</option>

                            <option value="025 - Banco Alfa"> 025 - Banco Alfa</option>

                            <option value="719 - Banco Banif"> 719 - Banco Banif</option>

                            <option value="107 - Banco BBM"> 107 - Banco BBM</option>

                            <option value="318 - Banco BMG"> 318 - Banco BMG</option>

                            <option value="218 - Banco Bonsucesso"> 218 - Banco Bonsucesso</option>

                            <option value="208 - Banco BTG Pactual"> 208 - Banco BTG Pactual</option>

                            <option value="263 - Banco Alfa"> 263 - Banco Cacique</option>

                            <option value="745 - Banco Citibank"> 745 - Banco Citibank</option>

                            <option value="721 - Banco Credibel"> 025 - Banco Credibel</option>

                            <option value="505 - Banco Credit Suisse"> 505 - Banco Credit Suisse</option>

                            <option value="229 - Banco Cruzeiro do Sul"> 229 - Banco Cruzeiro do Sul</option>

                            <option value="707 - Banco Daycoval"> 707 - Banco Daycoval</option>

                            <option value="265 - Banco Fator"> 265 - Banco Fator</option>

                            <option value="224 - Banco Fibra"> 224 - Banco Fibra</option>

                            <option value="612 - Banco Guanabara"> 612 - Banco Guanabara</option>

                            <option value="604 - Banco Industrial do Brasil"> 604 - Banco Industrial do Brasil</option>

                            <option value="320 - Banco Industrial e Comercial"> 320 - Banco Industrial e Comercial</option>

                            <option value="630 - Banco Intercap"> 630 - Banco Intercap</option>

                            <option value="077 - Banco Intermedium"> 077 - Banco Intermedium</option>

                            <option value="184 - Banco Itaú BBA"> 184 - Banco Itaú BBA</option>

                            <option value="479 - Banco ItaúBank"> 479 - Banco ItaúBank</option>

                            <option value="M09 - Banco Itaucred Financiamentos"> M09 - Banco Itaucred Financiamentos</option>

                            <option value="389 - Banco Mercantil do Brasil"> 389 - Banco Mercantil do Brasil</option>

                            <option value="746 - Banco Modal"> 746 - Banco Modal</option>

                            <option value="738 - Banco Morada"> 738 - Banco Morada</option>

                            <option value="623 - Banco Panamericano"> 623 - Banco Panamericano</option>

                            <option value="611 - Banco Paulista"> 611 - Banco Paulista</option>

                            <option value="643 - Banco Pine"> 643 - Banco Pine</option>

                            <option value="638 - Banco Prosper"> 638 - Banco Prosper</option>

                            <option value="654 - Banco Renner"> 654 - Banco Renner</option>

                            <option value="453 - Banco Rural"> 453 - Banco Rural</option>

                            <option value="422 - Banco Safra"> 422 - Banco Safra</option>

                            <option value="033 - Banco Santander"> 033 - Banco Santander</option>

                            <option value="756 - Sicoob - Sistema de Cooperativas de Crédito do Brasil"> 756 - Sicoob - Sistema de Cooperativas de Crédito do Brasil</option>

                            <option value="637 - Banco Sofisa"> 637 - Banco Sofisa</option>

                            <option value="082 - Banco Topázio"> 082 - Banco Topázio</option>

                            <option value="655 - Banco Votorantim"> 655 - Banco Votorantim</option>

                            <option value="237 - Bradesco"> 237 - Bradesco</option>

                            <option value="399 - HSBC Bank Brasil"> 399 - HSBC Bank Brasil</option>

                            <option value="341 - Itaú Unibanco"> 341 - Itaú Unibanco</option>

                            <option value="260 - Nubank"> 260 - Nubank</option>

                            <option value="748 - SICREDI – Sistema de Crédito Cooperativo"> 748 - SICREDI – Sistema de Crédito Cooperativo</option>

                        </select>
                            <div class="alert banco" style="color:red;"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="style20">
                            Agência:
                        </td>
                        <td colspan="3" class="style20"><input name="agencia" id="agencia"
                                                               onkeypress="return somenteNumeros(event,'');"
                                                               maxlength="5" size="12"/>
                            <div class="alert agencia" style="color:red;"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="style20">
                            Conta Bancária:
                        </td>
                        <td colspan="3" class="style20">
                            <input name="conta" id="conta" size="12"/>
                    </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="style20">
                            Tipo de Conta:
                            <label></label></td>
                        <td colspan="3" class="style20"><input name="tconta" type="radio" value="pp"/>
                            Conta Poupança
                            <label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input name="tconta" type="radio" value="cc"/>
                                Conta Corrente</label>
                            <div class="alert tconta" style="color:red;"></div>
                        </td>
                    </tr>
                    <!--                    FIM DOS DADOS DO REQUERENTE-->


                    <!--                    INFORMAÇÕES DOS BENEFICIÁRIOS-->
                    <tr>
                        <td colspan="5" class="style20"
                            style="border:2px solid #09F; padding-left:30px; padding-right: 30px;padding-bottom: 15px">

                          <table>
                                <tr>
                                    <td colspan="2" class="style20">
                                        Requerimento do Benef&iacute;cio:
                                    </td>
                                    <td colspan="3" class="style20">
                                        <input name="tipoAposentadoria" id="normal" type="radio" value="1"
                                               onclick="mostraDocs(this.value);"/>
                                        Aposentadoria Normal
                                        <br/>
                                        <input name="tipoAposentadoria"  id="antecipada" type="radio" value="2"
                                               onclick="mostraDocs(this.value);"/>
                                        Aposentadoria Antecipada
                                        <br/>
                                        <input name="tipoAposentadoria"  id="invalidez" type="radio" value="3"
                                               onclick="mostraDocs(this.value);"/>
                                        Aposentadoria por Invalidez
                                        <br/>
                                        <span style="font-size:10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Anexar cópia da carta de concessão do INSS.)</span>
                                        <label>
                                            <br/>
                                            <input name="tipoAposentadoria"  id="morte" type="radio" value="4"
                                                   onclick="mostraDocs(this.value);"/>
                                            Pens&atilde;o por Morte
                                            <span style="font-size:10px">
                                <br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Anexar cópia do atestado de óbito.)
                            </span>
                                        </label>
                                        <div class="alert tipoAposentadoria" style="color:red;"></div>
                                        <br/>
                                        <br/>
                                    </td>
                                </tr>
                            </table>
                            <section style="display: flex;flex-direction: column;">
                                <div id="identidadeDiv" style="display:none; margin-bottom: 16px;"><label for="identidade">Cópia da identidade do Participante</label><br>
                                    <input type="file" name="identidade_file" id="identidade_file" onchange="convertToBase64('identidade_file');"/> <span onclick="limparFile('identidade_file')" style="cursor: pointer; margin-left: 50px;">limpar</span>
                                    <br>
                                </div>
                                <div id="recisaoDiv" style="display: none; margin-bottom: 16px;">
                                    <label for="">Cópia da rescisão contratual</label><br>
                                    <input type="file" name="recisao_file"  id="recisao_file" onchange="convertToBase64('recisao_file');"> <span onclick="limparFile('recisao_file')" style="cursor: pointer; margin-left: 50px;">limpar</span>
                                    <br>
                                </div>
                                <div id="bancarioDiv" style="display: none; margin-bottom: 16px;">
                                    <label for="">Comprovante bancário</label><br>
                                    <input type="file" name="bancario_file"  id="bancario_file" onchange="convertToBase64('bancario_file');"> <span onclick="limparFile('bancario_file')" style="cursor: pointer; margin-left: 50px;">limpar</span>
                                    <br>
                                </div>
                                <div id="inssDiv" style="display: none; margin-bottom: 16px;">
                                    <label for="">Cópia autenticada da Carta de Concessão do INSS</label><br>
                                    <input type="file" name="inss_file"  id="inss_file" onchange="convertToBase64('inss_file');"><span onclick="limparFile('inss_file')" style="cursor: pointer; margin-left: 50px;">limpar</span><br>
                                </div>
                                <div id="doencaDiv" style="display: none; margin-bottom: 16px;">
                                    <label for="">Declaração de cessação do auxílio doença (emitido pelo Patrocinador)</label><br>
                                    <input type="file" name="doenca_file"  id="doenca_file" onchange="convertToBase64('doenca_file');"><span onclick="limparFile('doenca_file')" style="cursor: pointer; margin-left: 50px;">limpar</span><br>
                                </div>
                                <div id="obitoDiv" style="display: none; margin-bottom: 16px;">
                                    <label for="">Cópia da certidão de óbito do Participante</label><br>
                                    <input type="file" name="obito_file"  id="obito_file" onchange="convertToBase64('obito_file');">
                                    <span onclick="limparFile('obito_file')" style="cursor: pointer; margin-left: 50px;">limpar</span>
                                    <br>
                                </div>
                                <div id="identidadeMenorDiv" style="display: none; margin-bottom: 16px;">
                                    <label for="">Cópia da identidade / certidão de nascimento (se menor) dos requerentes</label><br>
                                    <input type="file" name="identidadeMenor_file" id="identidadeMenor_file" onchange="convertToBase64('identidadeMenor_file');">
                                    <span onclick="limparFile('identidadeMenor_file')" style="cursor: pointer; margin-left: 50px;">limpar</span>
                                    <br>
                                </div>
                                <div id="identidadeRepresentanteDiv" style="display: none; margin-bottom: 16px;">
                                    <label for="">Cópia da identidade do representante legal, se for o caso.</label><br>
                                    <input type="file" name="identidadeRepresentante_file"  id="identidadeRepresentante_file" onchange="convertToBase64('identidadeRepresentante_file');">
                                    <span onclick="limparFile('identidadeRepresentante_file')" style="cursor: pointer; margin-left: 50px;">limpar</span>
                                    <br>
                                </div>
                                <div id="casamentoDiv" style="display: none; margin-bottom: 16px;">
                                    <label for="">Certidão de casamento, se for o caso</label><br>
                                    <input type="file" name="casamento_file"  id="casamento_file" onchange="convertToBase64('casamento_file');">
                                    <span onclick="limparFile('casamento_file')" style="cursor: pointer; margin-left: 50px;">limpar</span>
                                    <br>
                                </div>
                            </section>
                            
                            <br/>
                            <section style="display: flex;display: none;" id="beneficiario_select">
                                Informa&ccedil;&otilde;es dos Benefici&aacute;rios:
                                <p><strong>Benefici&aacute;rio(s)</strong>:</p>
                                <div class='alert dependentes' style='color:red'></div>
                                <select name="dependentes" id="dependentes" title="Escolha primeiro a opção de Requerimento do Benefício!"
                                        onchange="Dependentes(this.value);">
                                    <option value="">--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                                <span class="style35"> (Pessoa que ir&aacute; receber o benef&iacute;cio no caso de falecimento do Participante. Opção indisponível caso seja selecionado "Pensão por Morte" no item acima.)</span>


                                <table width="100%">
                                    <tr id="linha" style="display:none;">
                                        <td>
                                            <!--BENEFICIÁRIO 1-->
                                            <table width="100%" border="1" cellpadding="10" cellspacing="0" bordercolor="#003863" id="d1" style="display:none">
                                                <tr>
                                                    <td>
                                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                            <tr>
                                                                <td colspan="2" align="center" class="TituloCurtas">
                                                                    <span class="style25">(dados do 1 &ordm; Beneficiário) </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="40%" class="TituloCurtas">
                                                                    <span class="style25">Nome completo:</span>
                                                                </td>
                                                                <td width="60%">
                                                                    <span class="style25">
                                                                        <input name="nomed1" id="nomed1" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Data de nascimento: </span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <input name="datad1" id="datad1" onkeypress="return somenteNumeros(event,'');" onblur="validarData(this);" size="10" maxlength="10"/>
                                                                        (dd/mm/aaaa)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CPF:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cpfd1" id="cpfd1" size="12" maxlength="14" onblur="return check_cpf2(this)" onkeypress="return somenteNumeros(event,'');"/>
                                                                        (Se for menor de idade, n&atilde;o &eacute; necess&aacute;ria a obrigatoriedade do CPF)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">E-mail:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="emaild1" id="emaild1" size="40" onblur="ValidaEmail(this)" />
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Estado Civil:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="civild1" id="civild1">
                                                                            <option value=""></option>
                                                                            <option value="SOLTEIRO">SOLTEIRO</option>
                                                                            <option value="CASADO">CASADO</option>
                                                                            <option value="VIÚVO">VIÚVO</option>
                                                                            <option value="DIVORCIADO">DIVORCIADO</option>
                                                                            <option value="SEPARADO JUDICIALMENTE">SEPARADO JUDICIALMENTE</option>
                                                                            <option value="COMPANHEIRO">COMPANHEIRO</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Parentesco:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="parentescod1" id="parentescod1"  onchange="exibeF('filho1', this)">
                                                                            <option value=""> </option>
                                                                            <option value="COMPANHEIRO(A)">COMPANHEIRO(A)</option>
                                                                            <option value="CÔNJUGE">CÔNJUGE</option>
                                                                            <option value="ENTEADO(A)">ENTEADO(A)</option>
                                                                            <option value="FILHO(A)">FILHO(A)</option>
                                                                            <option value="GENITORES">GENITORES</option>
                                                                            <option value="INDICADO(A)">INDICADO(A)</option>
                                                                            <option value="IRMÃO(A)">IRMÃO(A)</option>
                                                                        </select>
                                                                    </span>
                                                                    <div id="filho1" style="margin-top: 10px;display:none;">
                                                                        <span class="style25">Declara seu filho como beneficiário indicado quando maior de 21 anos  <img src="images/interrogacao.png" width="15" height="15" border="0" style="margin-bottom:-2px;" title="De acordo com o regulamento do Plano SEBRAEPREV,  o filho maior de 21 anos de idade não é
    beneficiário dependente. O filho maior de 21 anos somente terá direito ao benefício de
    pensão por morte na falta de beneficiários dependentes, e se estiver indicado."/>&nbsp;&nbsp;&nbsp;&nbsp;</span>

                                                                        <span class="style25">
                                                                            <input name="tipo_f1" id="tipo_f1" type="radio" value="sim" />
                                                                            <span class="style20">Sim </span>
                                                                            <input name="tipo_f1" id="tipo_f1" type="radio" value="nao" />
                                                                            <span class="style20">Não</span>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Sexo:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="sexod1" id="sexod1">
                                                                            <option value=""> </option>
                                                                            <option value="M">Masculino</option>
                                                                            <option value="F">Feminino</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Inv&aacute;lido:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="invalidod1" id="invalidod1">
                                                                            <option value=""></option>
                                                                            <option value="S">Sim</option>
                                                                            <option value="N">N&atilde;o</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Endere&ccedil;o:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="enderecod1" id="enderecod1" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Bairro:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="bairrod1" id="bairrod1" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Cidade:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cidaded1" id="cidaded1" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CEP:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input  name="cepd1" id="cepd1" size="10" onkeyup="mascara(this, '#####-###');" onkeypress="return somenteNumeros(event,'');" maxlength="9"/>
                                                                        (xxxxx-xxx)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Telefone:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="telefoned1" id="telefoned1" size="10"/>
                                                                        (xx) xxxx-xxxx
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Escolaridade:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="escolaridaded1" id="escolaridaded1">
                                                                            <option value=""></option>
                                                                            <option value="Fundamental - Incompleto">Fundamental - Incompleto</option>
                                                                            <option value="Fundamental - Completo">Fundamental - Completo</option>
                                                                            <option value="M&eacute;dio - Incompleto">M&eacute;dio - Incompleto</option>
                                                                            <option value="M&eacute;dio - Completo">M&eacute;dio - Completo</option>
                                                                            <option value="T&eacute;cnico - Incompleto">T&eacute;cnico - Incompleto</option>
                                                                            <option value="T&eacute;cnico - Completo">T&eacute;cnico - Completo</option>
                                                                            <option value="Tecn&oacute;logo - Incompleto">Tecn&oacute;logo - Incompleto</option>
                                                                            <option value="Tecn&oacute;logo - Completo">Tecn&oacute;logo - Completo</option>
                                                                            <option value="Superior - Incompleto">Superior - Incompleto</option>
                                                                            <option value="Superior - Completo">Superior - Completo</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Incompleto">P&oacute;s-gradua&ccedil;&atilde;o - Incompleto</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Completo">P&oacute;s-gradua&ccedil;&atilde;o - Completo</option>
                                                                            <option value="Mestrado - Incompleto">Mestrado - Incompleto</option>
                                                                            <option value="Mestrado - Completo">Mestrado - Completo</option>
                                                                            <option value="Doutorado - Incompleto">Doutorado - Incompleto</option>
                                                                            <option value="Doutorado - Completo">Doutorado - Completo</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>

                                            <!--BENEFICIÁRIO 2-->
                                            <table width="100%" border="1" cellpadding="10" cellspacing="0" bordercolor="#003863" id="d2" style="display:none">
                                                <tr>
                                                    <td>
                                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                            <tr>
                                                                <td colspan="2" align="center" class="TituloCurtas">
                                                                    <span class="style25">(dados do 2 &ordm; Beneficiário) </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="40%" class="TituloCurtas">
                                                                    <span class="style25">Nome completo:</span>
                                                                </td>
                                                                <td width="60%">
                                                                    <span class="style25">
                                                                        <input name="nomed2" id="nomed2" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Data de nascimento: </span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <input name="datad2" id="datad2" onkeypress="return somenteNumeros(event,'');" onblur="validarData(this);" size="10" maxlength="10"/>
                                                                        (dd/mm/aaaa)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CPF:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cpfd2" id="cpfd2" size="12" maxlength="14" onblur="return check_cpf2(this)" onkeypress="return somenteNumeros(event,'');"/>
                                                                        (Se for menor de idade, n&atilde;o &eacute; necess&aacute;ria a obrigatoriedade do CPF)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">E-mail:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="emaild2" id="emaild2" size="40" onblur="ValidaEmail(this)"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Estado Civil:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="civild2" id="civild2">
                                                                            <option value=""></option>
                                                                            <option value="SOLTEIRO">SOLTEIRO</option>
                                                                            <option value="CASADO">CASADO</option>
                                                                            <option value="VIÚVO">VIÚVO</option>
                                                                            <option value="DIVORCIADO">DIVORCIADO</option>
                                                                            <option value="SEPARADO JUDICIALMENTE">SEPARADO JUDICIALMENTE</option>
                                                                            <option value="COMPANHEIRO">COMPANHEIRO</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Parentesco:</span>
                                                                </td>

                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="parentescod2" id="parentescod2"  onchange="exibeF('filho2', this)">
                                                                            <option value=""> </option>
                                                                            <option value="COMPANHEIRO(A)">COMPANHEIRO(A)</option>
                                                                            <option value="CÔNJUGE">CÔNJUGE</option>
                                                                            <option value="ENTEADO(A)">ENTEADO(A)</option>
                                                                            <option value="FILHO(A)">FILHO(A)</option>
                                                                            <option value="GENITORES">GENITORES</option>
                                                                            <option value="INDICADO(A">INDICADO(A)</option>
                                                                            <option value="IRMÃO(A)">IRMÃO(A)</option>
                                                                        </select>
                                                                    </span>
                                                                    <div id="filho2" style="margin-top: 10px;display:none;">
                                                                        <span class="style25">Declara seu filho como beneficiário indicado quando maior de 21 anos  <img src="images/interrogacao.png" width="15" height="15" border="0" style="margin-bottom:-2px;" title="De acordo com o regulamento do Plano SEBRAEPREV,  o filho maior de 21 anos de idade não é
    beneficiário dependente. O filho maior de 21 anos somente terá direito ao benefício de
    pensão por morte na falta de beneficiários dependentes, e se estiver indicado."/>&nbsp;&nbsp;&nbsp;&nbsp;</span>

                                                                        <span class="style25">
                                                                            <input name="tipo_f2" id="tipo_f2" type="radio" value="sim" />
                                                                            <span class="style20">Sim </span>
                                                                            <input name="tipo_f2" id="tipo_f2" type="radio" value="nao" />
                                                                            <span class="style20">Não</span>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Sexo:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="sexod2" id="sexod2">
                                                                            <option value=""> </option>
                                                                            <option value="M">Masculino</option>
                                                                            <option value="F">Feminino</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Inv&aacute;lido:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="invalidod2" id="invalidod2">
                                                                            <option value=""></option>
                                                                            <option value="S">Sim</option>
                                                                            <option value="N">N&atilde;o</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Endere&ccedil;o:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="enderecod2" id="enderecod2" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Bairro:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="bairrod2" id="bairrod2" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Cidade:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cidaded2" id="cidaded2" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CEP:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cepd2" id="cepd2" size="10" onkeyup="mascara(this, '#####-###');" onkeypress="return somenteNumeros(event,'');" maxlength="9"/>
                                                                        (xxxxx-xxx)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Telefone:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="telefoned2" id="telefoned2" size="10"/>
                                                                        (xx) xxxx-xxxx
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Escolaridade:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="escolaridaded2" id="escolaridaded2">
                                                                            <option value=""></option>
                                                                            <option value="Fundamental - Incompleto">Fundamental - Incompleto</option>
                                                                            <option value="Fundamental - Completo">Fundamental - Completo</option>
                                                                            <option value="M&eacute;dio - Incompleto">M&eacute;dio - Incompleto</option>
                                                                            <option value="M&eacute;dio - Completo">M&eacute;dio - Completo</option>
                                                                            <option value="T&eacute;cnico - Incompleto">T&eacute;cnico - Incompleto</option>
                                                                            <option value="T&eacute;cnico - Completo">T&eacute;cnico - Completo</option>
                                                                            <option value="Tecn&oacute;logo - Incompleto">Tecn&oacute;logo - Incompleto</option>
                                                                            <option value="Tecn&oacute;logo - Completo">Tecn&oacute;logo - Completo</option>
                                                                            <option value="Superior - Incompleto">Superior - Incompleto</option>
                                                                            <option value="Superior - Completo">Superior - Completo</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Incompleto">P&oacute;s-gradua&ccedil;&atilde;o - Incompleto</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Completo">P&oacute;s-gradua&ccedil;&atilde;o - Completo</option>
                                                                            <option value="Mestrado - Incompleto">Mestrado - Incompleto</option>
                                                                            <option value="Mestrado - Completo">Mestrado - Completo</option>
                                                                            <option value="Doutorado - Incompleto">Doutorado - Incompleto</option>
                                                                            <option value="Doutorado - Completo">Doutorado - Completo</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>

                                            <!--BENEFICIÁRIO 3-->
                                            <table width="100%" border="1" cellpadding="10" cellspacing="0" bordercolor="#003863" id="d3" style="display:none">
                                                <tr>
                                                    <td>
                                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                            <tr>
                                                                <td colspan="2" align="center" class="TituloCurtas">
                                                                    <span class="style25">(dados do 3 &ordm; Beneficiário) </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="40%" class="TituloCurtas">
                                                                    <span class="style25">Nome completo:</span>
                                                                </td>
                                                                <td width="60%">
                                                                    <span class="style25">
                                                                        <input name="nomed3" id="nomed3" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Data de nascimento: </span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <input name="datad3" id="datad3" onkeypress="return somenteNumeros(event,'');" onblur="validarData(this);" size="10" maxlength="10"/>
                                                                        (dd/mm/aaaa)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CPF:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cpfd3" id="cpfd3" size="12" maxlength="14" onblur="return check_cpf2(this)" onkeypress="return somenteNumeros(event,'');"/>
                                                                        (Se for menor de idade, n&atilde;o &eacute; necess&aacute;ria a obrigatoriedade do CPF)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">E-mail:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="emaild3" id="emaild3" size="40" onblur="ValidaEmail(this)"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Estado Civil:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="civild3" id="civild3">
                                                                            <option value=""></option>
                                                                            <option value="SOLTEIRO">SOLTEIRO</option>
                                                                            <option value="CASADO">CASADO</option>
                                                                            <option value="VIÚVO">VIÚVO</option>
                                                                            <option value="DIVORCIADO">DIVORCIADO</option>
                                                                            <option value="SEPARADO JUDICIALMENTE">SEPARADO JUDICIALMENTE</option>
                                                                            <option value="COMPANHEIRO">COMPANHEIRO</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Parentesco:</span>
                                                                </td>

                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="parentescod3" id="parentescod3"  onchange="exibeF('filho3', this)">
                                                                            <option value=""> </option>
                                                                            <option value="COMPANHEIRO(A)">COMPANHEIRO(A)</option>
                                                                            <option value="CÔNJUGE">CÔNJUGE</option>
                                                                            <option value="ENTEADO(A)">ENTEADO(A)</option>
                                                                            <option value="FILHO(A)">FILHO(A)</option>
                                                                            <option value="GENITORES">GENITORES</option>
                                                                            <option value="INDICADO(A">INDICADO(A)</option>
                                                                            <option value="IRMÃO(A)">IRMÃO(A)</option>
                                                                        </select>
                                                                    </span>
                                                                    <div id="filho3" style="margin-top: 10px;display:none;">
                                                                        <span class="style25">Declara seu filho como beneficiário indicado quando maior de 21 anos  <img src="images/interrogacao.png" width="15" height="15" border="0" style="margin-bottom:-2px;" title="De acordo com o regulamento do Plano SEBRAEPREV,  o filho maior de 21 anos de idade não é
    beneficiário dependente. O filho maior de 21 anos somente terá direito ao benefício de
    pensão por morte na falta de beneficiários dependentes, e se estiver indicado."/>&nbsp;&nbsp;&nbsp;&nbsp;</span>

                                                                        <span class="style25">
                                                                            <input name="tipo_f3" id="tipo_f3" type="radio" value="sim" />
                                                                            <span class="style20">Sim </span>
                                                                            <input name="tipo_f3" id="tipo_f3" type="radio" value="nao" />
                                                                            <span class="style20">Não</span>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Sexo:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="sexod3" id="sexod3">
                                                                            <option value=""> </option>
                                                                            <option value="M">Masculino</option>
                                                                            <option value="F">Feminino</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Inv&aacute;lido:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="invalidod3" id="invalidod3">
                                                                            <option value=""></option>
                                                                            <option value="S">Sim</option>
                                                                            <option value="N">N&atilde;o</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Endere&ccedil;o:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="enderecod3" id="enderecod3" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Bairro:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="bairrod3" id="bairrod3" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Cidade:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cidaded3" id="cidaded3" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CEP:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cepd3" id="cepd3" size="10" onkeyup="mascara(this, '#####-###');" onkeypress="return somenteNumeros(event,'');" maxlength="9"/>
                                                                        (xxxxx-xxx)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Telefone:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="telefoned3" id="telefoned3" size="10"/>
                                                                        (xx) xxxx-xxxx
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Escolaridade:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="escolaridaded3" id="escolaridaded3">
                                                                            <option value=""></option>
                                                                            <option value="Fundamental - Incompleto">Fundamental - Incompleto</option>
                                                                            <option value="Fundamental - Completo">Fundamental - Completo</option>
                                                                            <option value="M&eacute;dio - Incompleto">M&eacute;dio - Incompleto</option>
                                                                            <option value="M&eacute;dio - Completo">M&eacute;dio - Completo</option>
                                                                            <option value="T&eacute;cnico - Incompleto">T&eacute;cnico - Incompleto</option>
                                                                            <option value="T&eacute;cnico - Completo">T&eacute;cnico - Completo</option>
                                                                            <option value="Tecn&oacute;logo - Incompleto">Tecn&oacute;logo - Incompleto</option>
                                                                            <option value="Tecn&oacute;logo - Completo">Tecn&oacute;logo - Completo</option>
                                                                            <option value="Superior - Incompleto">Superior - Incompleto</option>
                                                                            <option value="Superior - Completo">Superior - Completo</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Incompleto">P&oacute;s-gradua&ccedil;&atilde;o - Incompleto</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Completo">P&oacute;s-gradua&ccedil;&atilde;o - Completo</option>
                                                                            <option value="Mestrado - Incompleto">Mestrado - Incompleto</option>
                                                                            <option value="Mestrado - Completo">Mestrado - Completo</option>
                                                                            <option value="Doutorado - Incompleto">Doutorado - Incompleto</option>
                                                                            <option value="Doutorado - Completo">Doutorado - Completo</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>

                                            <!--BENEFICIÁRIO 4-->
                                            <table width="100%" border="1" cellpadding="10" cellspacing="0" bordercolor="#003863" id="d4" style="display:none">
                                                <tr>
                                                    <td>
                                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                            <tr>
                                                                <td colspan="2" align="center" class="TituloCurtas">
                                                                    <span class="style25">(dados do 4 &ordm; Beneficiário) </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="40%" class="TituloCurtas">
                                                                    <span class="style25">Nome completo:</span>
                                                                </td>
                                                                <td width="60%">
                                                                    <span class="style25">
                                                                        <input name="nomed4" id="nomed4" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Data de nascimento: </span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <input name="datad4" id="datad4" onkeypress="return somenteNumeros(event,'');" onblur="validarData(this);" size="10" maxlength="10"/>
                                                                        (dd/mm/aaaa)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CPF:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cpfd4" id="cpfd4" size="12" maxlength="14" onblur="return check_cpf2(this)" onkeypress="return somenteNumeros(event,'');"/>
                                                                        (Se for menor de idade, n&atilde;o &eacute; necess&aacute;ria a obrigatoriedade do CPF)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">E-mail:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="emaild4" id="emaild4" size="40" onblur="ValidaEmail(this)"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Estado Civil:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="civild4" id="civild4">
                                                                            <option value=""></option>
                                                                            <option value="SOLTEIRO">SOLTEIRO</option>
                                                                            <option value="CASADO">CASADO</option>
                                                                            <option value="VIÚVO">VIÚVO</option>
                                                                            <option value="DIVORCIADO">DIVORCIADO</option>
                                                                            <option value="SEPARADO JUDICIALMENTE">SEPARADO JUDICIALMENTE</option>
                                                                            <option value="COMPANHEIRO">COMPANHEIRO</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Parentesco:</span>
                                                                </td>

                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="parentescod4" id="parentescod4"  onchange="exibeF('filho4', this)">
                                                                            <option value=""> </option>
                                                                            <option value="COMPANHEIRO(A)">COMPANHEIRO(A)</option>
                                                                            <option value="CÔNJUGE">CÔNJUGE</option>
                                                                            <option value="ENTEADO(A)">ENTEADO(A)</option>
                                                                            <option value="FILHO(A)">FILHO(A)</option>
                                                                            <option value="GENITORES">GENITORES</option>
                                                                            <option value="INDICADO(A">INDICADO(A)</option>
                                                                            <option value="IRMÃO(A)">IRMÃO(A)</option>
                                                                        </select>
                                                                    </span>
                                                                    <div id="filho4" style="margin-top: 10px;display:none;">
                                                                        <span class="style25">Declara seu filho como beneficiário indicado quando maior de 21 anos  <img src="images/interrogacao.png" width="15" height="15" border="0" style="margin-bottom:-2px;" title="De acordo com o regulamento do Plano SEBRAEPREV,  o filho maior de 21 anos de idade não é
    beneficiário dependente. O filho maior de 21 anos somente terá direito ao benefício de
    pensão por morte na falta de beneficiários dependentes, e se estiver indicado."/>&nbsp;&nbsp;&nbsp;&nbsp;</span>

                                                                        <span class="style25">
                                                                            <input name="tipo_f4" id="tipo_f4" type="radio" value="sim" />
                                                                            <span class="style20">Sim </span>
                                                                            <input name="tipo_f4" id="tipo_f4" type="radio" value="nao" />
                                                                            <span class="style20">Não</span>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Sexo:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="sexod4" id="sexod4">
                                                                            <option value=""> </option>
                                                                            <option value="M">Masculino</option>
                                                                            <option value="F">Feminino</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Inv&aacute;lido:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="invalidod4" id="invalidod4">
                                                                            <option value=""></option>
                                                                            <option value="S">Sim</option>
                                                                            <option value="N">N&atilde;o</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Endere&ccedil;o:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="enderecod4" id="enderecod4" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Bairro:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="bairrod4" id="bairrod4" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Cidade:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cidaded4" id="cidaded4" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CEP:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cepd4" id="cepd4" size="10" onkeyup="mascara(this, '#####-###');" onkeypress="return somenteNumeros(event,'');" maxlength="9"/>
                                                                        (xxxxx-xxx)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Telefone:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="telefoned4" id="telefoned4" size="10"/>
                                                                        (xx) xxxx-xxxx
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Escolaridade:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="escolaridaded4" id="escolaridaded4">
                                                                            <option value=""></option>
                                                                            <option value="Fundamental - Incompleto">Fundamental - Incompleto</option>
                                                                            <option value="Fundamental - Completo">Fundamental - Completo</option>
                                                                            <option value="M&eacute;dio - Incompleto">M&eacute;dio - Incompleto</option>
                                                                            <option value="M&eacute;dio - Completo">M&eacute;dio - Completo</option>
                                                                            <option value="T&eacute;cnico - Incompleto">T&eacute;cnico - Incompleto</option>
                                                                            <option value="T&eacute;cnico - Completo">T&eacute;cnico - Completo</option>
                                                                            <option value="Tecn&oacute;logo - Incompleto">Tecn&oacute;logo - Incompleto</option>
                                                                            <option value="Tecn&oacute;logo - Completo">Tecn&oacute;logo - Completo</option>
                                                                            <option value="Superior - Incompleto">Superior - Incompleto</option>
                                                                            <option value="Superior - Completo">Superior - Completo</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Incompleto">P&oacute;s-gradua&ccedil;&atilde;o - Incompleto</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Completo">P&oacute;s-gradua&ccedil;&atilde;o - Completo</option>
                                                                            <option value="Mestrado - Incompleto">Mestrado - Incompleto</option>
                                                                            <option value="Mestrado - Completo">Mestrado - Completo</option>
                                                                            <option value="Doutorado - Incompleto">Doutorado - Incompleto</option>
                                                                            <option value="Doutorado - Completo">Doutorado - Completo</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>

                                            <!--BENEFICIÁRIO 5-->
                                            <table width="100%" border="1" cellpadding="10" cellspacing="0" bordercolor="#003863" id="d5" style="display:none">
                                                <tr>
                                                    <td>
                                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                            <tr>
                                                                <td colspan="2" align="center" class="TituloCurtas">
                                                                    <span class="style25">(dados do 5 &ordm; Beneficiário) </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="40%" class="TituloCurtas">
                                                                    <span class="style25">Nome completo:</span>
                                                                </td>
                                                                <td width="60%">
                                                                    <span class="style25">
                                                                        <input name="nomed5" id="nomed5" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Data de nascimento: </span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <input name="datad5" id="datad5" onkeypress="return somenteNumeros(event,'');" onblur="validarData(this);" size="10" maxlength="10"/>
                                                                        (dd/mm/aaaa)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CPF:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cpfd5" id="cpfd5" size="12" maxlength="14" onblur="return check_cpf2(this)" onkeypress="return somenteNumeros(event,'');"/>
                                                                        (Se for menor de idade, n&atilde;o &eacute; necess&aacute;ria a obrigatoriedade do CPF)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">E-mail:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="emaild5" id="emaild5" size="40" onblur="ValidaEmail(this)" />
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Estado Civil:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="civild5" id="civild5">
                                                                            <option value=""></option>
                                                                            <option value="SOLTEIRO">SOLTEIRO</option>
                                                                            <option value="CASADO">CASADO</option>
                                                                            <option value="VIÚVO">VIÚVO</option>
                                                                            <option value="DIVORCIADO">DIVORCIADO</option>
                                                                            <option value="SEPARADO JUDICIALMENTE">SEPARADO JUDICIALMENTE</option>
                                                                            <option value="COMPANHEIRO">COMPANHEIRO</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Parentesco:</span>
                                                                </td>

                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="parentescod5" id="parentescod5"  onchange="exibeF('filho5', this)">
                                                                            <option value=""> </option>
                                                                            <option value="COMPANHEIRO(A)">COMPANHEIRO(A)</option>
                                                                            <option value="CÔNJUGE">CÔNJUGE</option>
                                                                            <option value="ENTEADO(A)">ENTEADO(A)</option>
                                                                            <option value="FILHO(A)">FILHO(A)</option>
                                                                            <option value="GENITORES">GENITORES</option>
                                                                            <option value="INDICADO(A">INDICADO(A)</option>
                                                                            <option value="IRMÃO(A)">IRMÃO(A)</option>
                                                                        </select>
                                                                    </span>
                                                                    <div id="filho5" style="margin-top: 10px;display:none;">
                                                                        <span class="style25">Declara seu filho como beneficiário indicado quando maior de 21 anos  <img src="images/interrogacao.png" width="15" height="15" border="0" style="margin-bottom:-2px;" title="De acordo com o regulamento do Plano SEBRAEPREV,  o filho maior de 21 anos de idade não é
    beneficiário dependente. O filho maior de 21 anos somente terá direito ao benefício de
    pensão por morte na falta de beneficiários dependentes, e se estiver indicado."/>&nbsp;&nbsp;&nbsp;&nbsp;</span>

                                                                        <span class="style25">
                                                                            <input name="tipo_f5" id="tipo_f5" type="radio" value="sim" />
                                                                            <span class="style20">Sim </span>
                                                                            <input name="tipo_f5" id="tipo_f5" type="radio" value="nao" />
                                                                            <span class="style20">Não</span>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Sexo:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="sexod5" id="sexod5">
                                                                            <option value=""> </option>
                                                                            <option value="M">Masculino</option>
                                                                            <option value="F">Feminino</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Inv&aacute;lido:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="invalidod5" id="invalidod5">
                                                                            <option value=""></option>
                                                                            <option value="S">Sim</option>
                                                                            <option value="N">N&atilde;o</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Endere&ccedil;o:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="enderecod5" id="enderecod5" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Bairro:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="bairrod5" id="bairrod5" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Cidade:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cidaded5" id="cidaded5" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CEP:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cepd5" id="cepd5" size="10" onkeyup="mascara(this, '#####-###');" onkeypress="return somenteNumeros(event,'');" maxlength="9"/>
                                                                        (xxxxx-xxx)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Telefone:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="telefoned5" id="telefoned5" size="10"/>
                                                                        (xx) xxxx-xxxx
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Escolaridade:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="escolaridaded5" id="escolaridaded5">
                                                                            <option value=""></option>
                                                                            <option value="Fundamental - Incompleto">Fundamental - Incompleto</option>
                                                                            <option value="Fundamental - Completo">Fundamental - Completo</option>
                                                                            <option value="M&eacute;dio - Incompleto">M&eacute;dio - Incompleto</option>
                                                                            <option value="M&eacute;dio - Completo">M&eacute;dio - Completo</option>
                                                                            <option value="T&eacute;cnico - Incompleto">T&eacute;cnico - Incompleto</option>
                                                                            <option value="T&eacute;cnico - Completo">T&eacute;cnico - Completo</option>
                                                                            <option value="Tecn&oacute;logo - Incompleto">Tecn&oacute;logo - Incompleto</option>
                                                                            <option value="Tecn&oacute;logo - Completo">Tecn&oacute;logo - Completo</option>
                                                                            <option value="Superior - Incompleto">Superior - Incompleto</option>
                                                                            <option value="Superior - Completo">Superior - Completo</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Incompleto">P&oacute;s-gradua&ccedil;&atilde;o - Incompleto</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Completo">P&oacute;s-gradua&ccedil;&atilde;o - Completo</option>
                                                                            <option value="Mestrado - Incompleto">Mestrado - Incompleto</option>
                                                                            <option value="Mestrado - Completo">Mestrado - Completo</option>
                                                                            <option value="Doutorado - Incompleto">Doutorado - Incompleto</option>
                                                                            <option value="Doutorado - Completo">Doutorado - Completo</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>

                                            <!--BENEFICIÁRIO 6-->
                                            <table width="100%" border="1" cellpadding="10" cellspacing="0" bordercolor="#003863" id="d6" style="display:none">
                                                <tr>
                                                    <td>
                                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                            <tr>
                                                                <td colspan="2" align="center" class="TituloCurtas">
                                                                    <span class="style25">(dados do 6 &ordm; Beneficiário) </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="40%" class="TituloCurtas">
                                                                    <span class="style25">Nome completo:</span>
                                                                </td>
                                                                <td width="60%">
                                                                    <span class="style25">
                                                                        <input name="nomed6" id="nomed6" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Data de nascimento: </span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <input name="datad6" id="datad6" onkeypress="return somenteNumeros(event,'');" onblur="validarData(this);" size="10" maxlength="10"/>
                                                                        (dd/mm/aaaa)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CPF:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cpfd6" id="cpfd6" size="12" maxlength="14" onblur="return check_cpf2(this)" onkeypress="return somenteNumeros(event,'');"/>
                                                                        (Se for menor de idade, n&atilde;o &eacute; necess&aacute;ria a obrigatoriedade do CPF)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">E-mail:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="emaild6" id="emaild6" size="40" onblur="ValidaEmail(this)"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Estado Civil:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="civild6" id="civild6">
                                                                            <option value=""></option>
                                                                            <option value="SOLTEIRO">SOLTEIRO</option>
                                                                            <option value="CASADO">CASADO</option>
                                                                            <option value="VIÚVO">VIÚVO</option>
                                                                            <option value="DIVORCIADO">DIVORCIADO</option>
                                                                            <option value="SEPARADO JUDICIALMENTE">SEPARADO JUDICIALMENTE</option>
                                                                            <option value="COMPANHEIRO">COMPANHEIRO</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Parentesco:</span>
                                                                </td>

                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="parentescod6" id="parentescod6"  onchange="exibeF('filho6', this)">
                                                                            <option value=""> </option>
                                                                            <option value="COMPANHEIRO(A)">COMPANHEIRO(A)</option>
                                                                            <option value="CÔNJUGE">CÔNJUGE</option>
                                                                            <option value="ENTEADO(A)">ENTEADO(A)</option>
                                                                            <option value="FILHO(A)">FILHO(A)</option>
                                                                            <option value="GENITORES">GENITORES</option>
                                                                            <option value="INDICADO(A">INDICADO(A)</option>
                                                                            <option value="IRMÃO(A)">IRMÃO(A)</option>
                                                                        </select>
                                                                    </span>
                                                                    <div id="filho6" style="margin-top: 10px;display:none;">
                                                                        <span class="style25">Declara seu filho como beneficiário indicado quando maior de 21 anos  <img src="images/interrogacao.png" width="15" height="15" border="0" style="margin-bottom:-2px;" title="De acordo com o regulamento do Plano SEBRAEPREV,  o filho maior de 21 anos de idade não é
    beneficiário dependente. O filho maior de 21 anos somente terá direito ao benefício de
    pensão por morte na falta de beneficiários dependentes, e se estiver indicado."/>&nbsp;&nbsp;&nbsp;&nbsp;</span>

                                                                        <span class="style25">
                                                                            <input name="tipo_f6" id="tipo_f6" type="radio" value="sim" />
                                                                            <span class="style20">Sim </span>
                                                                            <input name="tipo_f6" id="tipo_f6" type="radio" value="nao" />
                                                                            <span class="style20">Não</span>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Sexo:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="sexod6" id="sexod6">
                                                                            <option value=""> </option>
                                                                            <option value="M">Masculino</option>
                                                                            <option value="F">Feminino</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Inv&aacute;lido:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="invalidod6" id="invalidod6">
                                                                            <option value=""></option>
                                                                            <option value="S">Sim</option>
                                                                            <option value="N">N&atilde;o</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Endere&ccedil;o:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="enderecod6" id="enderecod6" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Bairro:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="bairrod6" id="bairrod6" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Cidade:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cidaded6" id="cidaded6" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CEP:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cepd6" id="cepd6" size="10" onkeyup="mascara(this, '#####-###');" onkeypress="return somenteNumeros(event,'');" maxlength="9"/>
                                                                        (xxxxx-xxx)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Telefone:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="telefoned6" id="telefoned6" size="10"/>
                                                                        (xx) xxxx-xxxx
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Escolaridade:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="escolaridaded6" id="escolaridaded66">
                                                                            <option value=""></option>
                                                                            <option value="Fundamental - Incompleto">Fundamental - Incompleto</option>
                                                                            <option value="Fundamental - Completo">Fundamental - Completo</option>
                                                                            <option value="M&eacute;dio - Incompleto">M&eacute;dio - Incompleto</option>
                                                                            <option value="M&eacute;dio - Completo">M&eacute;dio - Completo</option>
                                                                            <option value="T&eacute;cnico - Incompleto">T&eacute;cnico - Incompleto</option>
                                                                            <option value="T&eacute;cnico - Completo">T&eacute;cnico - Completo</option>
                                                                            <option value="Tecn&oacute;logo - Incompleto">Tecn&oacute;logo - Incompleto</option>
                                                                            <option value="Tecn&oacute;logo - Completo">Tecn&oacute;logo - Completo</option>
                                                                            <option value="Superior - Incompleto">Superior - Incompleto</option>
                                                                            <option value="Superior - Completo">Superior - Completo</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Incompleto">P&oacute;s-gradua&ccedil;&atilde;o - Incompleto</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Completo">P&oacute;s-gradua&ccedil;&atilde;o - Completo</option>
                                                                            <option value="Mestrado - Incompleto">Mestrado - Incompleto</option>
                                                                            <option value="Mestrado - Completo">Mestrado - Completo</option>
                                                                            <option value="Doutorado - Incompleto">Doutorado - Incompleto</option>
                                                                            <option value="Doutorado - Completo">Doutorado - Completo</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>

                                            <!--BENEFICIÁRIO 7-->
                                            <table width="100%" border="1" cellpadding="10" cellspacing="0" bordercolor="#003863" id="d7" style="display:none">
                                                <tr>
                                                    <td>
                                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                            <tr>
                                                                <td colspan="2" align="center" class="TituloCurtas">
                                                                    <span class="style25">(dados do 7 &ordm; Beneficiário) </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="40%" class="TituloCurtas">
                                                                    <span class="style25">Nome completo:</span>
                                                                </td>
                                                                <td width="60%">
                                                                    <span class="style25">
                                                                        <input name="nomed7" id="nomed7" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Data de nascimento: </span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <input name="datad7" id="datad7" onkeypress="return somenteNumeros(event,'');" onblur="validarData(this);" size="10" maxlength="10"/>
                                                                        (dd/mm/aaaa)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CPF:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cpfd7" id="cpfd7" size="12" maxlength="14" onblur="return check_cpf2(this)" onkeypress="return somenteNumeros(event,'');"/>
                                                                        (Se for menor de idade, n&atilde;o &eacute; necess&aacute;ria a obrigatoriedade do CPF)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">E-mail:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="emaild7" id="emaild7" size="40" onblur="ValidaEmail(this)"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Estado Civil:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="civild7" id="civild7">
                                                                            <option value=""></option>
                                                                            <option value="SOLTEIRO">SOLTEIRO</option>
                                                                            <option value="CASADO">CASADO</option>
                                                                            <option value="VIÚVO">VIÚVO</option>
                                                                            <option value="DIVORCIADO">DIVORCIADO</option>
                                                                            <option value="SEPARADO JUDICIALMENTE">SEPARADO JUDICIALMENTE</option>
                                                                            <option value="COMPANHEIRO">COMPANHEIRO</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Parentesco:</span>
                                                                </td>

                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="parentescod7" id="parentescod7"  onchange="exibeF('filho7', this)">
                                                                            <option value=""> </option>
                                                                            <option value="COMPANHEIRO(A)">COMPANHEIRO(A)</option>
                                                                            <option value="CÔNJUGE">CÔNJUGE</option>
                                                                            <option value="ENTEADO(A)">ENTEADO(A)</option>
                                                                            <option value="FILHO(A)">FILHO(A)</option>
                                                                            <option value="GENITORES">GENITORES</option>
                                                                            <option value="INDICADO(A">INDICADO(A)</option>
                                                                            <option value="IRMÃO(A)">IRMÃO(A)</option>
                                                                        </select>
                                                                    </span>
                                                                    <div id="filho7" style="margin-top: 10px;display:none;">
                                                                        <span class="style25">Declara seu filho como beneficiário indicado quando maior de 21 anos  <img src="images/interrogacao.png" width="15" height="15" border="0" style="margin-bottom:-2px;" title="De acordo com o regulamento do Plano SEBRAEPREV,  o filho maior de 21 anos de idade não é
    beneficiário dependente. O filho maior de 21 anos somente terá direito ao benefício de
    pensão por morte na falta de beneficiários dependentes, e se estiver indicado."/>&nbsp;&nbsp;&nbsp;&nbsp;</span>

                                                                        <span class="style25">
                                                                            <input name="tipo_f7" id="tipo_f7" type="radio" value="sim" />
                                                                            <span class="style20">Sim </span>
                                                                            <input name="tipo_f7" id="tipo_f7" type="radio" value="nao" />
                                                                            <span class="style20">Não</span>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Sexo:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="sexod7" id="sexod7">
                                                                            <option value=""> </option>
                                                                            <option value="M">Masculino</option>
                                                                            <option value="F">Feminino</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Inv&aacute;lido:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="invalidod7" id="invalidod7">
                                                                            <option value=""></option>
                                                                            <option value="S">Sim</option>
                                                                            <option value="N">N&atilde;o</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Endere&ccedil;o:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="enderecod7" id="enderecod7" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Bairro:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="bairrod7" id="bairrod7" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Cidade:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cidaded7" id="cidaded7" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CEP:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cepd7" id="cepd7" size="10" onkeyup="mascara(this, '#####-###');" onkeypress="return somenteNumeros(event,'');" maxlength="9"/>
                                                                        (xxxxx-xxx)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Telefone:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="telefoned7" id="telefoned7" size="10"/>
                                                                        (xx) xxxx-xxxx
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Escolaridade:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="escolaridaded7" id="escolaridaded7">
                                                                            <option value=""></option>
                                                                            <option value="Fundamental - Incompleto">Fundamental - Incompleto</option>
                                                                            <option value="Fundamental - Completo">Fundamental - Completo</option>
                                                                            <option value="M&eacute;dio - Incompleto">M&eacute;dio - Incompleto</option>
                                                                            <option value="M&eacute;dio - Completo">M&eacute;dio - Completo</option>
                                                                            <option value="T&eacute;cnico - Incompleto">T&eacute;cnico - Incompleto</option>
                                                                            <option value="T&eacute;cnico - Completo">T&eacute;cnico - Completo</option>
                                                                            <option value="Tecn&oacute;logo - Incompleto">Tecn&oacute;logo - Incompleto</option>
                                                                            <option value="Tecn&oacute;logo - Completo">Tecn&oacute;logo - Completo</option>
                                                                            <option value="Superior - Incompleto">Superior - Incompleto</option>
                                                                            <option value="Superior - Completo">Superior - Completo</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Incompleto">P&oacute;s-gradua&ccedil;&atilde;o - Incompleto</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Completo">P&oacute;s-gradua&ccedil;&atilde;o - Completo</option>
                                                                            <option value="Mestrado - Incompleto">Mestrado - Incompleto</option>
                                                                            <option value="Mestrado - Completo">Mestrado - Completo</option>
                                                                            <option value="Doutorado - Incompleto">Doutorado - Incompleto</option>
                                                                            <option value="Doutorado - Completo">Doutorado - Completo</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>

                                            <!--BENEFICIÁRIO 8-->
                                            <table width="100%" border="1" cellpadding="10" cellspacing="0" bordercolor="#003863" id="d8" style="display:none">
                                                <tr>
                                                    <td>
                                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                            <tr>
                                                                <td colspan="2" align="center" class="TituloCurtas">
                                                                    <span class="style25">(dados do 8 &ordm; Beneficiário) </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="40%" class="TituloCurtas">
                                                                    <span class="style25">Nome completo:</span>
                                                                </td>
                                                                <td width="60%">
                                                                    <span class="style25">
                                                                        <input name="nomed8" id="nomed8" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Data de nascimento: </span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <input name="datad8" id="datad8" onkeypress="return somenteNumeros(event,'');" onblur="validarData(this);" size="10" maxlength="10"/>
                                                                        (dd/mm/aaaa)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CPF:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cpfd8" id="cpfd8" size="12"  maxlength="14" onblur="return check_cpf2(this)" onkeypress="return somenteNumeros(event,'');"/>
                                                                        (Se for menor de idade, n&atilde;o &eacute; necess&aacute;ria a obrigatoriedade do CPF)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">E-mail:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="emaild8" id="emaild8" size="40" onblur="ValidaEmail(this)"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Estado Civil:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="civild8" id="civild8">
                                                                            <option value=""></option>
                                                                            <option value="SOLTEIRO">SOLTEIRO</option>
                                                                            <option value="CASADO">CASADO</option>
                                                                            <option value="VIÚVO">VIÚVO</option>
                                                                            <option value="DIVORCIADO">DIVORCIADO</option>
                                                                            <option value="SEPARADO JUDICIALMENTE">SEPARADO JUDICIALMENTE</option>
                                                                            <option value="COMPANHEIRO">COMPANHEIRO</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Parentesco:</span>
                                                                </td>

                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="parentescod8" id="parentescod8"  onchange="exibeF('filho8', this)">
                                                                            <option value=""> </option>
                                                                            <option value="COMPANHEIRO(A)">COMPANHEIRO(A)</option>
                                                                            <option value="CÔNJUGE">CÔNJUGE</option>
                                                                            <option value="ENTEADO(A)">ENTEADO(A)</option>
                                                                            <option value="FILHO(A)">FILHO(A)</option>
                                                                            <option value="GENITORES">GENITORES</option>
                                                                            <option value="INDICADO(A">INDICADO(A)</option>
                                                                            <option value="IRMÃO(A)">IRMÃO(A)</option>
                                                                        </select>
                                                                    </span>
                                                                    <div id="filho8" style="margin-top: 10px;display:none;">
                                                                        <span class="style25">Declara seu filho como beneficiário indicado quando maior de 21 anos  <img src="images/interrogacao.png" width="15" height="15" border="0" style="margin-bottom:-2px;" title="De acordo com o regulamento do Plano SEBRAEPREV,  o filho maior de 21 anos de idade não é
    beneficiário dependente. O filho maior de 21 anos somente terá direito ao benefício de
    pensão por morte na falta de beneficiários dependentes, e se estiver indicado."/>&nbsp;&nbsp;&nbsp;&nbsp;</span>

                                                                        <span class="style25">
                                                                            <input name="tipo_f8" id="tipo_f8" type="radio" value="sim" />
                                                                            <span class="style20">Sim </span>
                                                                            <input name="tipo_f8" id="tipo_f8" type="radio" value="nao" />
                                                                            <span class="style20">Não</span>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Sexo:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="sexod8" id="sexod8">
                                                                            <option value=""> </option>
                                                                            <option value="M">Masculino</option>
                                                                            <option value="F">Feminino</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Inv&aacute;lido:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="invalidod8" id="invalidod8">
                                                                            <option value=""></option>
                                                                            <option value="S">Sim</option>
                                                                            <option value="N">N&atilde;o</option>
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Endere&ccedil;o:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="enderecod8" id="enderecod8" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Bairro:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="bairrod8" id="bairrod8" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Cidade:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cidaded8" id="cidaded8" size="40"/>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">CEP:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="cepd8" id="cepd8" size="10" onkeyup="mascara(this, '#####-###');" onkeypress="return somenteNumeros(event,'');" maxlength="9"/>
                                                                        (xxxxx-xxx)
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Telefone:</span>
                                                                </td>
                                                                <td >
                                                                    <span class="style25">
                                                                        <input name="telefoned8" id="telefoned8" size="10"/>
                                                                        (xx) xxxx-xxxx
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="TituloCurtas">
                                                                    <span class="style25">Escolaridade:</span>
                                                                </td>
                                                                <td>
                                                                    <span class="style25">
                                                                        <select name="escolaridaded8" id="escolaridaded8">
                                                                            <option value=""></option>
                                                                            <option value="Fundamental - Incompleto">Fundamental - Incompleto</option>
                                                                            <option value="Fundamental - Completo">Fundamental - Completo</option>
                                                                            <option value="M&eacute;dio - Incompleto">M&eacute;dio - Incompleto</option>
                                                                            <option value="M&eacute;dio - Completo">M&eacute;dio - Completo</option>
                                                                            <option value="T&eacute;cnico - Incompleto">T&eacute;cnico - Incompleto</option>
                                                                            <option value="T&eacute;cnico - Completo">T&eacute;cnico - Completo</option>
                                                                            <option value="Tecn&oacute;logo - Incompleto">Tecn&oacute;logo - Incompleto</option>
                                                                            <option value="Tecn&oacute;logo - Completo">Tecn&oacute;logo - Completo</option>
                                                                            <option value="Superior - Incompleto">Superior - Incompleto</option>
                                                                            <option value="Superior - Completo">Superior - Completo</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Incompleto">P&oacute;s-gradua&ccedil;&atilde;o - Incompleto</option>
                                                                            <option value="P&oacute;s-gradua&ccedil;&atilde;o - Completo">P&oacute;s-gradua&ccedil;&atilde;o - Completo</option>
                                                                            <option value="Mestrado - Incompleto">Mestrado - Incompleto</option>
                                                                            <option value="Mestrado - Completo">Mestrado - Completo</option>
                                                                            <option value="Doutorado - Incompleto">Doutorado - Incompleto</option>
                                                                            <option value="Doutorado - Completo">Doutorado - Completo</option>
                                                                            <!-- <option value="fmi">Fundamental - Incompleto</option> -->
                                                                            <!-- <option value="fmc">Fundamental - Completo</option> -->
                                                                            <!-- <option value="mdi">M&eacute;dio - Incompleto</option> -->
                                                                            <!-- <option value="mdc">M&eacute;dio - Completo</option> -->
                                                                            <!-- <option value="tci">T&eacute;cnico - Incompleto</option> -->
                                                                            <!-- <option value="tcc">T&eacute;cnico - Completo</option> -->
                                                                            <!-- <option value="tli">Tecn&oacute;logo - Incompleto</option> -->
                                                                            <!-- <option value="tlf">Tecn&oacute;logo - Completo</option> -->
                                                                            <!-- <option value="spi">Superior - Incompleto</option> -->
                                                                            <!-- <option value="spc">Superior - Completo</option> -->
                                                                            <!-- <option value="pgi">P&oacute;s-gradua&ccedil;&atilde;o - Incompleto</option> -->
                                                                            <!-- <option value="pgc">P&oacute;s-gradua&ccedil;&atilde;o - Completo</option> -->
                                                                            <!-- <option value="mti">Mestrado - Incompleto</option> -->
                                                                            <!-- <option value="mtc">Mestrado - Completo</option> -->
                                                                            <!-- <option value="dti">Doutorado - Incompleto</option> -->
                                                                            <!-- <option value="dtc">Doutorado - Completo</option> -->
                                                                        </select>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </section>
                        </td>
                    </tr>
                    <!--                    INSTRUÇÕES PARA ENCAMINHAR JUNTO AO REQUERIMENTO-->
                    <!-- <tr>
                        <td colspan="5" class="style20">
                            <div id="normal_antecipada" style="display:none;color: red">
                                <strong>Encaminhar junto com o Requerimento de Benefício:</strong>
                                <ul>
                                    <li>Cópia da identidade do Participante</li>
                                    <li>Cópia da rescisão contratual</li>
                                    <li>Comprovante bancário</li>
                                </ul>
                            </div>
                            <div id="invalidez" style="display:none;color: red">
                                <strong>Encaminhar junto com o Requerimento de Benefício:</strong>
                                <ul>
                                    <li>Cópia da identidade do Participante</li>
                                    <li>Cópia autenticada da Carta de Concessão do INSS</li>
                                    <li>Declaração de cessação do auxílio doença (emitido pelo Patrocinador)</li>
                                    <li>Comprovante bancário</li>
                                </ul>
                            </div>
                            <div id="morte" style="display:none;color: red">
                                <strong>Encaminhar junto com o Requerimento de Benefício:</strong>
                                <ul>
                                    <li>Cópia da certidão de óbito do Participante</li>
                                    <li>Cópia da identidade do Participante</li>
                                    <li>Cópia da identidade / certidão de nascimento (se menor) dos requerentes</li>
                                    <li>Cópia da rescisão contratual</li>
                                    <li>Certidão de casamento, se for o caso</li>
                                    <li>Comprovante bancário</li>
                                </ul>
                            </div>
                        </td>
                    </tr> -->
                    <!--                    DADOS DO BENEFÍCIO-->
                    <tr>
                        <td colspan="5" class="style20">Forma de recebimento do Benef&iacute;cio:</td>
                    </tr>
                    <!--                    PERGUNTA 1: CHECKBOX-->
                    <tr>
                        <td colspan="5" class="style20">
                            <p>
                                <input name="xim" type="checkbox" id="xim" value="xim" onclick="disable()"/>
                                Receber
                                <select name="porct" id="porct" disabled="true">
                                    <option value=""> --</option>
                                    <option value="1%"> 1%</option>
                                    <option value="2%"> 2%</option>
                                    <option value="3%"> 3%</option>
                                    <option value="4%"> 4%</option>
                                    <option value="5%"> 5%</option>
                                    <option value="6%"> 6%</option>
                                    <option value="7%"> 7%</option>
                                    <option value="8%"> 8%</option>
                                    <option value="9%"> 9%</option>
                                    <option value="10%"> 10%</option>
                                    <option value="11%"> 11%</option>
                                    <option value="12%"> 12%</option>
                                    <option value="13%"> 13%</option>
                                    <option value="14%"> 14%</option>
                                    <option value="15%"> 15%</option>
                                    <option value="16%"> 16%</option>
                                    <option value="17%"> 17%</option>
                                    <option value="18%"> 18%</option>
                                    <option value="19%"> 19%</option>
                                    <option value="20%"> 20%</option>
                                    <option value="21%"> 21%</option>
                                    <option value="22%"> 22%</option>
                                    <option value="23%"> 23%</option>
                                    <option value="24%"> 24%</option>
                                    <option value="25%"> 25%</option>
                                </select>
                                do saldo de conta total em parcela &uacute;nica e o restante conforme
                                assinalado a seguir:
                                <br/>
                            </p>
                            <div class='alert porct' style='color:red;'/>
                        </td>
                    </tr>
                    <!--                    PERGUNTA 2 -->
                    <tr>
                        <td colspan="5" align="left">
                            <span class="style20">
                                <input name="rendaMensal" id="rendaMensal1" type="radio" value="rendaM1"
                                    onclick="exibe3('rendaMensalx'), habilitaDesabilitaCombo(this), habilitaDesabilitaCombo2(this);"/>
                                Renda Mensal em n&uacute;mero constante de quotas por um per&iacute;odo de
                            </span>
                            <span class="style20">
                                <select name="rendaM1ano" id="rendaM1ano">
                                    <option value="0"> -- </option>
                                    <option value="5 anos"> 5 anos </option>
                                    <option value="6 anos"> 6 anos </option>
                                    <option value="7 anos"> 7 anos </option>
                                    <option value="8 anos"> 8 anos </option>
                                    <option value="9 anos"> 9 anos </option>
                                    <option value="10 anos"> 10 anos </option>
                                    <option value="11 anos"> 11 anos </option>
                                    <option value="12 anos"> 12 anos </option>
                                    <option value="13 anos"> 13 anos </option>
                                    <option value="14 anos"> 14 anos </option>
                                    <option value="15 anos"> 15 anos </option>
                                    <option value="16 anos"> 16 anos </option>
                                    <option value="17 anos"> 17 anos </option>
                                    <option value="18 anos"> 18 anos </option>
                                    <option value="19 anos"> 19 anos </option>
                                    <option value="20 anos"> 20 anos </option>
                                </select>
                                (no m&iacute;nimo 5 anos e no m&aacute;ximo 20 anos).
                                <div class="alert rendaM1ano" style="color:red;position:relative; left:55%;"></div>
                            </span>
                        </td>
                    </tr>
                    <!--                    PERGUNTA 2 -->
                    <tr>
                    <td colspan="5" align="left">
                        <span class="style20">
                            <input name="rendaMensal" type="radio" id="rendaMensal2" value="rendaM2" onclick="exibe3('rendaMensalx'), habilitaDesabilitaCombo(this), habilitaDesabilitaCombo2(this);"/>
                            Renda Mensal correspondente à aplicação de um percentual de
                        </span>
                        <span class="style20">
                            <input title="rendaM2pc" name="rendaM2pc" id="rendaM2pc" type="number" min="0.10" max="2.00" step="0.01">
                            %
                            <strong id="psobs">
                                <strong id="psobs2"></strong>
                            </strong>
                            (mínimo de 0,1% e máximo de 2%).
                            <br/>
                            <div class="alert rendaM2pc" style="color:red;position:relative; left:55%;"></div>
                        </span>
                        <div id="rendaM2x" style="display:none; margin-left:40px;">
                            <span class="style20">
                                <input name="tipo_m2x" id="tipo_2C" type="radio" value="com" />
                                Renda expressa em valor monetário fixo, calculada anualmente no mês de junho.
                                <br>
                                <input name="tipo_m2x" id="tipo_2S" type="radio" value="sem" />
                                Valor mensalmente ajustado de acordo com o percentual escolhido pelo Participante aplicado sobre o saldo remanescente de sua Reserva Individual de Participante.
                            </span>
                        </div>
                        <span class="style20"><div class="alert tipo_m2x" style="color:red;margin-left:40px;"/></span>
                    </td>
                </tr>
                    <!--                    PERGUNTA 4 -->
                    <tr>
                    <td colspan="5" align="left">
                        <span class="style20" style="margin-bottom:40px;">
                            <input name="rendaMensal" type="radio" id="rendaUni" value="pUnica" onclick="exibe3('rendaMensalx'), habilitaDesabilitaCombo(this), habilitaDesabilitaCombo2(this), habilitaDesabilitaCombo3(this);"/>
                            Parcela única.
                            <div class='alert rendaUni' style='color:red'></div>
                        </span>
                    </td>
                </tr>


                    <tr>
                        <td colspan="5" align="left">
                            <span class="style20"><div class='alert rendaMensal' style='color:red'></div></span>
                        </td>
                    </tr>
                    <!--                    Termo de opção por perfil de investimento-->
                    <tr>
                        <td colspan="5" class="style20" style="background:#C0DFEF; padding-left:30px;"><br/><strong>Termo
                            de opção por perfil de investimento</strong>
                            <br/>
                            <br/>
                            <span class="style20" style="margin-bottom:40px;">
                                <input name="perfilInvestimento" type="radio" value="conservador">&nbsp;CONSERVADOR<br>
                                <input name="perfilInvestimento" type="radio" value="moderado">&nbsp;SEBRAEPREV (MODERADO)
                                <div class="alert perfilInvestimento" style="color:red;"></div>
                            </span>
                            <br/>
                            <br/>
                            <div align="justify" class="TextosCurtas" style="width:625px;">

                                DECLARAÇÃO DE RESPONSABILIDADE:<br>
                                Declaro que minha opção foi feita de forma livre, isenta e consciente, tendo
                                sido precedida da disponibilização de todas as informações sobre o Perfil de
                                Investimento escolhido, bem como do esclarecimento de todas as dúvidas por
                                mim apresentadas perante o SEBRAE PREVIDÊNCIA  Instituto SEBRAE de
                                Seguridade Social, de forma que assumo integral e exclusiva responsabilidade
                                pelos riscos envolvidos na aplicação dos recursos alocados na Reserva
                                Individual de Participante, de acordo com o Perfil de Investimento ora
                                escolhido.<br>
                                <br>

                                ADVERTÊNCIAS:
                                <br>
                                É vedada a adoção do Perfil Arrojado para a Reserva Individual de
                                Participante após a concessão de Benefício de Prestação Continuada ao
                                Participante ou aos seus Beneficiários, conforme o caso.<br/><br/>

                                Quando da concessão do Benefício de Pensão por Morte, não havendo consenso
                                entre os Beneficiários do Participante falecido, em atividade ou já na
                                condição de Assistido, a respeito da opção pelo perfil de investimentos,
                                será adotado necessariamente o Perfil Conservador.

                                Não há garantia de rentabilidade em qualquer dos Perfis de Investimento
                                oferecidos, sendo possível a verificação de rentabilidade negativa em
                                determinado período, havendo maior probabilidade de perdas financeiras nos
                                Perfis de Investimento com maior alocação no segmento de renda variável.<br><br>

                                A maior rentabilidade obtida por determinado Perfil de Investimento em
                                período anterior à esta opção não leva à certeza de boa rentabilidade
                                futura.<br><br>

                                A escolha de determinado Perfil de Investimento resultará em rentabilidade
                                diversa daquela decorrente da opção por outro Perfil de Investimento, o que
                                terá consequência direta no valor do próprio Benefício assegurado pelo Plano
                                SEBRAEPREV.

                            </div>
                            <br/>


                        </td>

                    </tr>
                    <!--                    DECLARAÇÃO DE DEPENDENTES PARA FINS DE IMPOSTO DE RENDA-->
                    <tr>
                        <td colspan="5" align="left" class="style20">
                            <table width="100%" id="dependentesX"
                                   style="padding-left:30px; padding-right: 30px;padding-bottom: 15px; border:2px solid #09F;">
                                <tr>
                                    <td height="65" colspan="5" align="center">
                <span class="style19"><br/>
                    DECLARA&Ccedil;&Atilde;O DE DEPENDENTES PARA FINS DE IMPOSTO DE RENDA<br/>
                    <br/>
                </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="left" style="padding-left:30px;">
                                        <input name="noDep" type="checkbox" value="declaOP" id="noDep"/>
                                        <span class="style20">N&Atilde;O tenho dependentes para fins de IMPOSTO DE RENDA.</span>
                                        <br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="24" colspan="5" class="style20" style="padding-left:30px;">
                                        <p>Escolha o n&uacute;mero de seus dependentes e informe os seus dados.<br/>
                                            <span class="ttx">&nbsp<em>Obs.: Não havendo nenhum dependente, marcar a opção acima.</em></span>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="232" class="tituloCurtas" style="padding-left:30px;">
                                        <div align="right" class="TituloCurtas">
                    <span class="style20">
                        <strong>Dependente(s) para fins de IR:</strong>
                    </span>
                                        </div>
                                    </td>
                                    <td width="425" colspan="3" class="tituloCurtas"><br/>
                                        <select name="dependentes2" id="dependentes2"
                                                onchange="Dependentes2(this.value);">
                                            <option value="0">--</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                        <br/>
                                        <br/>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="5">
                                        <div class="alert dep" style="color:red;"/>
                                    </td>
                                </tr>

                                <tr id="linha2" style="display:none;">
                                    <td colspan="4" class="tituloCurtas">
                                        <table width="100%" border="1" cellpadding="0" cellspacing="0"
                                               bordercolor="#003863">
                                            <tr>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="2"
                                                           cellpadding="2">
                                                        <tr>
                                                            <td colspan="2" align="center"
                                                                class="TituloCurtas"><span class="style25">(dados do 1&ordm; dependente) </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="28%" class="TituloCurtas"><span
                                                                    class="style25">Nome completo:</span>
                                                            </td>
                                                            <td width="72%">
                        <span class="style25">
                            <input name="nomec2" id="nomec2" size="40"/>
                        </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="TituloCurtas">
                                                                <span class="style25">Data de nascimento: </span>
                                                            </td>
                                                            <td>
                        <span class="style25">
                            <input name="datac2" id="datac2"

                                   onkeypress="return somenteNumeros(event,'');"
                                   onblur="validarData(this);" size="10"
                                   maxlength="10"/>
                            (dd/mm/aaaa)
                        </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="TituloCurtas"><span class="style25">Sexo:</span>
                                                            </td>
                                                            <td>
                        <span class="style25">
                            <select name="sexoc2" id="sexoc2">
                                <option value=""> </option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="style25">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="style25">
                                                                <strong>Escolha o código do
                                                                    dependente:</strong>
                                                                Passe o mouse sobre <img
                                                                    src="images/interrogacao.png"
                                                                    width="15" height="15" border="0"/>
                                                                para mais informa&ccedil;&otilde;es.
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td colspan="2" class="style25">

                                                                <input type="radio" name="coD1" value="A"/>A
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Cônjuge ou companheiro(a);"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD1" value="B"/>B<img
                                                                    src="images/interrogacao.png"
                                                                    title="Filho (a) ou enteado (a) até 21 anos completos;"
                                                                    width="15" height="15" border="0"
                                                                    style="margin-bottom:-2px;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD1" value="C"/>C
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Filho (a) ou enteado (a) universitário (a) cursando escola técnica de segundo grau, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD1" value="D"/>D
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, do qual o contribuinte detém a guarda judicial, até 21 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD1" value="E"/>E
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, universitário (a) ou cursando escola técnica de segundo grau, do qual o contribuinte detém a guarda judicial, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD1" value="F"/>F
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pais, avós e bisavós que recebam rendimentos, tributáveis, até 1.903,98 mensais;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD1" value="G"/>G
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Menor pobre, até completar 21 anos, que o contribuinte crie e eduque e do qual detenha guarda judicial;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD1" value="H"/>H
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pessoa absolutamente incapaz, da qual o contribuinte seja tutor ou curador;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD1" value="I"/>I<img
                                                                    src="images/interrogacao.png"
                                                                    width="15" height="15" border="0"
                                                                    style="margin-bottom:-2px;"
                                                                    title="Filho (a), enteado (a), irmão (ã), neto (a), ou bisneto (a), em qualquer idade, quando incapacitado (a) física e/ou mentalmente para o trabalho."/>&nbsp;&nbsp;

                                                            </td>

                                                        </tr>

                                                    </table>

                                                    <br/></td>

                                            </tr>

                                        </table>

                                        <table width="100%" border="1" cellpadding="0" cellspacing="0"
                                               bordercolor="#003863" id="c2" style="display:none;">

                                            <tr>

                                                <td>
                                                    <table width="100%" border="0" cellspacing="2"
                                                           cellpadding="2">

                                                        <tr>

                                                            <td colspan="2" align="center"
                                                                class="TituloCurtas"><span class="style25">(dados do 2 &ordm; dependente) </span>
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td width="40%" class="TituloCurtas"><span
                                                                    class="style25">Nome completo:</span>
                                                            </td>

                                                            <td width="60%"><span class="style25">

                <input name="nomec3" id="nomec3" size="40"/>

            </span></td>

                                                        </tr>

                                                        <tr>

                                                            <td class="TituloCurtas"><span class="style25">Data de nascimento: </span>
                                                            </td>

                                                            <td><span class="style25">

                <input name="datac3" id="datac3"
                       onkeypress="return somenteNumeros(event,'');" onblur="validarData(this);" size="10"
                       maxlength="10"/>

            (dd/mm/aaaa)</span></td>

                                                        </tr>

                                                        <tr>

                                                            <td class="TituloCurtas"><span class="style25">Sexo:</span>
                                                            </td>

                                                            <td><span class="style25">

                <select name="sexoc3" id="sexoc3">

                  <option value=""> </option>

                  <option value="M">Masculino</option>

                  <option value="F">Feminino</option>

              </select>

          </span></td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="style25">
                                                                <strong>Escolha o código do dependente:</strong>
                                                                Passe o mouse sobre <img src="images/interrogacao.png"
                                                                                         width="15" height="15"
                                                                                         border="0"/>para mais informa&ccedil;&otilde;es.
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td colspan="2" class="style25">

                                                                <input type="radio" name="coD2" value="A"/>A
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Cônjuge ou companheiro(a);"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD2" value="B"/>B
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Filho (a) ou enteado (a) até 21 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD2" value="C"/>C
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Filho (a) ou enteado (a) universitário (a) cursando escola técnica de segundo grau, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD2" value="D"/>D
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, do qual o contribuinte detém a guarda judicial, até 21 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD2" value="E"/>E
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, universitário (a) ou cursando escola técnica de segundo grau, do qual o contribuinte detém a guarda judicial, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD2" value="F"/>F
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pais, avós e bisavós que recebam rendimentos, tributáveis, até 1.637,11 mensais;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD2" value="G"/>G
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Menor pobre, até completar 21 anos, que o contribuinte crie e eduque e do qual detenha guarda judicial;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD2" value="H"/>H
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pessoa absolutamente incapaz, da qual o contribuinte seja tutor ou curador;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD2" value="I"/>I<img
                                                                    src="images/interrogacao.png"
                                                                    width="15" height="15" border="0"
                                                                    style="margin-bottom:-2px;"
                                                                    title="Filho (a), enteado (a), irmão (ã), neto (a), ou bisneto (a), em qualquer idade, quando incapacitado (a) física e/ou mentalmente para o trabalho."/>&nbsp;&nbsp;

                                                            </td>

                                                        </tr>

                                                    </table>
                                                </td>

                                            </tr>

                                        </table>

                                        <table width="100%" border="1" cellpadding="0" cellspacing="0"
                                               bordercolor="#003863" id="c3" style="display:none;">

                                            <tr>

                                                <td>
                                                    <table width="100%" border="0" cellspacing="2"
                                                           cellpadding="2">

                                                        <tr>

                                                            <td colspan="2" align="center"
                                                                class="TituloCurtas"><span class="style25">(dados do 3 &ordm; dependente) </span>
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td width="40%" class="TituloCurtas"><span
                                                                    class="style25">Nome completo:</span>
                                                            </td>

                                                            <td width="60%"><span class="style25">

            <input name="nomec4" id="nomec4" size="40"/>

        </span></td>

                                                        </tr>

                                                        <tr>

                                                            <td class="TituloCurtas"><span class="style25">Data de nascimento: </span>
                                                            </td>

                                                            <td><span class="style25">

            <input name="datac4" id="datac4"
                   onkeypress="return somenteNumeros(event,'');" onblur="validarData(this);" size="10"
                   maxlength="10"/>

        (dd/mm/aaaa)</span></td>

                                                        </tr>

                                                        <tr>

                                                            <td class="TituloCurtas"><span class="style25">Sexo:</span>
                                                            </td>

                                                            <td><span class="style25">

            <select name="sexoc4" id="sexoc4">

              <option value=""> </option>

              <option value="M">Masculino</option>

              <option value="F">Feminino</option>

          </select>

      </span></td>

                                                        </tr>

                                                        <tr>

                                                            <td colspan="2" class="style25">

                                                                <strong>Escolha o código do
                                                                    dependente:</strong>
                                                                Passe o mouse sobre <img
                                                                    src="images/interrogacao.png"
                                                                    width="15" height="15" border="0"/>
                                                                para mais informa&ccedil;&otilde;es.
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td colspan="2" class="style25">

                                                                <input type="radio" name="coD3" value="A"/>A
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Cônjuge ou companheiro(a);"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD3" value="B"/>B
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Filho (a) ou enteado (a) até 21 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD3" value="C"/>C
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Filho (a) ou enteado (a) universitário (a) cursando escola técnica de segundo grau, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD3" value="D"/>D
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, do qual o contribuinte detém a guarda judicial, até 21 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD3" value="E"/>E
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, universitário (a) ou cursando escola técnica de segundo grau, do qual o contribuinte detém a guarda judicial, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD3" value="F"/>F
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pais, avós e bisavós que recebam rendimentos, tributáveis, até 1.637,11 mensais;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD3" value="G"/>G
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Menor pobre, até completar 21 anos, que o contribuinte crie e eduque e do qual detenha guarda judicial;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD3" value="H"/>H
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pessoa absolutamente incapaz, da qual o contribuinte seja tutor ou curador;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD3" value="I"/>I<img
                                                                    src="images/interrogacao.png"
                                                                    width="15" height="15" border="0"
                                                                    style="margin-bottom:-2px;"
                                                                    title="Filho (a), enteado (a), irmão (ã), neto (a), ou bisneto (a), em qualquer idade, quando incapacitado (a) física e/ou mentalmente para o trabalho."/>&nbsp;&nbsp;

                                                            </td>

                                                        </tr>

                                                    </table>
                                                </td>

                                            </tr>

                                        </table>

                                        <table width="100%" border="1" cellpadding="0" cellspacing="0"
                                               bordercolor="#003863" id="c4" style="display:none;">

                                            <tr>

                                                <td>
                                                    <table width="100%" border="0" cellspacing="2"
                                                           cellpadding="2">

                                                        <tr>

                                                            <td colspan="2" align="center"
                                                                class="TituloCurtas"><span class="style25">(dados do 4 &ordm; dependente) </span>
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td width="40%" class="TituloCurtas"><span
                                                                    class="style25">Nome completo:</span>
                                                            </td>

                                                            <td width="60%"><span class="style25">

            <input name="nomec5" id="nomec5" size="40"/>

        </span></td>

                                                        </tr>

                                                        <tr>

                                                            <td class="TituloCurtas"><span class="style25">Data de nascimento: </span>
                                                            </td>

                                                            <td><span class="style25">

            <input name="datac5" id="datac5"
                   onkeypress="return somenteNumeros(event,'');" onblur="validarData(this);" size="10"
                   maxlength="10"/>

        (dd/mm/aaaa)</span></td>

                                                        </tr>

                                                        <tr>

                                                            <td class="TituloCurtas"><span class="style25">Sexo:</span>
                                                            </td>

                                                            <td><span class="style25">

            <select name="sexoc5" id="sexoc5">

              <option value=""> </option>

              <option value="M">Masculino</option>

              <option value="F">Feminino</option>

          </select>

      </span></td>

                                                        </tr>

                                                        <tr>
                                                            <td colspan="2" class="style25">
                                                                <strong>Escolha o código do dependente:</strong>Passe o
                                                                mouse sobre <img src="images/interrogacao.png"
                                                                                 width="15" height="15" border="0"/>para
                                                                mais informa&ccedil;&otilde;es.
                                                            </td>
                                                        </tr>

                                                        <tr>

                                                            <td colspan="2" class="style25">

                                                                <input type="radio" name="coD4" value="A"/>A
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Cônjuge ou companheiro(a);"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD4" value="B"/>B
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Filho (a) ou enteado (a) até 21 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD4" value="C"/>C
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Filho (a) ou enteado (a) universitário (a) cursando escola técnica de segundo grau, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD4" value="D"/>D
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, do qual o contribuinte detém a guarda judicial, até 21 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD4" value="E"/>E
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, universitário (a) ou cursando escola técnica de segundo grau, do qual o contribuinte detém a guarda judicial, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD4" value="F"/>F
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pais, avós e bisavós que recebam rendimentos, tributáveis, até 1.903,98 mensais;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD4" value="G"/>G
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Menor pobre, até completar 21 anos, que o contribuinte crie e eduque e do qual detenha guarda judicial;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD4" value="H"/>H
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pessoa absolutamente incapaz, da qual o contribuinte seja tutor ou curador;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD4" value="I"/>I<img
                                                                    src="images/interrogacao.png"
                                                                    width="15" height="15" border="0"
                                                                    style="margin-bottom:-2px;"
                                                                    title="Filho (a), enteado (a), irmão (ã), neto (a), ou bisneto (a), em qualquer idade, quando incapacitado (a) física e/ou mentalmente para o trabalho."/>&nbsp;&nbsp;

                                                            </td>

                                                        </tr>

                                                    </table>
                                                </td>

                                            </tr>

                                        </table>

                                        <table width="100%" border="1" cellpadding="0" cellspacing="0"
                                               bordercolor="#003863" id="c5" style="display:none;">

                                            <tr>

                                                <td>
                                                    <table width="100%" border="0" cellspacing="2"
                                                           cellpadding="2">

                                                        <tr>

                                                            <td colspan="2" align="center"
                                                                class="TituloCurtas"><span class="style25">(dados do 5 &ordm; dependente) </span>
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td width="40%" class="TituloCurtas"><span
                                                                    class="style25">Nome completo:</span>
                                                            </td>

                                                            <td width="60%"><span class="style25">

            <input name="nomec6" id="nomec6" size="40"/>

        </span></td>

                                                        </tr>

                                                        <tr>

                                                            <td class="TituloCurtas"><span class="style25">Data de nascimento: </span>
                                                            </td>

                                                            <td><span class="style25">

            <input name="datac6" id="datac6"
                   onkeypress="return somenteNumeros(event,'');" onblur="validarData(this);" size="11"
                   maxlength="10"/>

        (dd/mm/aaaa)</span></td>

                                                        </tr>

                                                        <tr>

                                                            <td class="TituloCurtas"><span class="style25">Sexo:</span>
                                                            </td>

                                                            <td><span class="style25">

            <select name="sexoc6" id="sexoc6">

              <option value=""> </option>

              <option value="M">Masculino</option>

              <option value="F">Feminino</option>

          </select>

      </span></td>

                                                        </tr>

                                                        <tr>

                                                            <td colspan="2" class="style25">
                                                                <strong>Escolha o código do dependente:</strong>Passe o
                                                                mouse sobre <img src="images/interrogacao.png"
                                                                                 width="15" height="15" border="0"/>para
                                                                mais informa&ccedil;&otilde;es.
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td colspan="2" class="style25">

                                                                <input type="radio" name="coD5" value="A"/>A
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Cônjuge ou companheiro(a);"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD5" value="B"/>B
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Filho (a) ou enteado (a) até 21 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD5" value="C"/>C
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Filho (a) ou enteado (a) universitário (a) cursando escola técnica de segundo grau, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD5" value="D"/>D
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, do qual o contribuinte detém a guarda judicial, até 21 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD5" value="E"/>E
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, universitário (a) ou cursando escola técnica de segundo grau, do qual o contribuinte detém a guarda judicial, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD5" value="F"/>F
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pais, avós e bisavós que recebam rendimentos, tributáveis, até 1.637,11 mensais;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD5" value="G"/>G
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Menor pobre, até completar 21 anos, que o contribuinte crie e eduque e do qual detenha guarda judicial;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD5" value="H"/>H
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pessoa absolutamente incapaz, da qual o contribuinte seja tutor ou curador;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD5" value="I"/>I<img
                                                                    src="images/interrogacao.png"
                                                                    width="15" height="15" border="0"
                                                                    style="margin-bottom:-2px;"
                                                                    title="Filho (a), enteado (a), irmão (ã), neto (a), ou bisneto (a), em qualquer idade, quando incapacitado (a) física e/ou mentalmente para o trabalho."/>&nbsp;&nbsp;

                                                            </td>

                                                        </tr>

                                                    </table>
                                                </td>

                                            </tr>

                                        </table>

                                        <table width="100%" border="1" cellpadding="0" cellspacing="0"
                                               bordercolor="#003863" id="c6" style="display:none;">

                                            <tr>

                                                <td>
                                                    <table width="100%" border="0" cellspacing="2"
                                                           cellpadding="2">

                                                        <tr>


                                                            <td colspan="2" align="center"
                                                                class="TituloCurtas"><span class="style25">(dados do 6 &ordm; dependente) </span>
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td width="40%" class="TituloCurtas"><span
                                                                    class="style25">Nome completo:</span>
                                                            </td>

                                                            <td width="60%"><span class="style25">

            <input name="nomec7" id="nomec7" size="40"/>

        </span></td>

                                                        </tr>

                                                        <tr>

                                                            <td class="TituloCurtas"><span class="style25">Data de nascimento: </span>
                                                            </td>

                                                            <td><span class="style25">

            <input name="datac7" id="datac7"
                   onkeypress="return somenteNumeros(event,'');" onblur="validarData(this);" size="10"
                   maxlength="10"/>

        (dd/mm/aaaa)</span></td>

                                                        </tr>

                                                        <tr>

                                                            <td class="TituloCurtas"><span class="style25">Sexo:</span>
                                                            </td>

                                                            <td><span class="style25">

            <select name="sexoc7" id="sexoc7">

              <option value=""> </option>

              <option value="M">Masculino</option>

              <option value="F">Feminino</option>

          </select>

      </span></td>

                                                        </tr>

                                                        <tr>

                                                            <td colspan="2" class="style25">

                                                                <strong>Escolha o código do
                                                                    dependente:</strong>
                                                                Passe o mouse sobre <img
                                                                    src="images/interrogacao.png"
                                                                    width="15" height="15" border="0"/>
                                                                para mais informa&ccedil;&otilde;es.
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td colspan="2" class="style25">

                                                                <input type="radio" name="coD6" value="A"/>A
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Cônjuge ou companheiro(a);"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD6" value="B"/>B
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Filho (a) ou enteado (a) até 21 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD6" value="C"/>C
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Filho (a) ou enteado (a) universitário (a) cursando escola técnica de segundo grau, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD6" value="D"/>D
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, do qual o contribuinte detém a guarda judicial, até 21 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD6" value="E"/>E
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, universitário (a) ou cursando escola técnica de segundo grau, do qual o contribuinte detém a guarda judicial, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD6" value="F"/>F
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pais, avós e bisavós que recebam rendimentos, tributáveis, até 1.903,98 mensais;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD6" value="G"/>G
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Menor pobre, até completar 21 anos, que o contribuinte crie e eduque e do qual detenha guarda judicial;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD6" value="H"/>H
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pessoa absolutamente incapaz, da qual o contribuinte seja tutor ou curador;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD6" value="I"/>I<img
                                                                    src="images/interrogacao.png"
                                                                    width="15" height="15" border="0"
                                                                    style="margin-bottom:-2px;"
                                                                    title="Filho (a), enteado (a), irmão (ã), neto (a), ou bisneto (a), em qualquer idade, quando incapacitado (a) física e/ou mentalmente para o trabalho."/>&nbsp;&nbsp;

                                                            </td>

                                                        </tr>

                                                    </table>
                                                </td>

                                            </tr>

                                        </table>

                                        <table width="100%" border="1" cellpadding="0" cellspacing="0"
                                               bordercolor="#003863" id="c7" style="display:none;">

                                            <tr>

                                                <td>
                                                    <table width="100%" border="0" cellspacing="2"
                                                           cellpadding="2">

                                                        <tr>

                                                            <td colspan="2" align="center"
                                                                class="TituloCurtas"><span class="style25">(dados do 7 &ordm; dependente) </span>
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td width="40%" class="TituloCurtas"><span
                                                                    class="style25">Nome completo:</span>
                                                            </td>

                                                            <td width="60%"><span class="style25">

            <input name="nomec8" id="nomec8" size="40"/>

        </span></td>

                                                        </tr>

                                                        <tr>

                                                            <td class="TituloCurtas"><span class="style25">Data de nascimento: </span>
                                                            </td>

                                                            <td><span class="style25">

            <input name="datac8" id="datac8"
                   onkeypress="return somenteNumeros(event,'');" onblur="validarData(this);" size="10"
                   maxlength="10"/>

        (dd/mm/aaaa)</span></td>

                                                        </tr>

                                                        <tr>

                                                            <td class="TituloCurtas"><span class="style25">Sexo:</span>
                                                            </td>

                                                            <td><span class="style25">

            <select name="sexoc8" id="sexoc8">

              <option value=""> </option>

              <option value="M">Masculino</option>

              <option value="F">Feminino</option>

          </select>

      </span></td>

                                                        </tr>

                                                        <tr>

                                                            <td colspan="2" class="style25">
                                                                <strong>Escolha o código do dependente:</strong> Passe o
                                                                mouse sobre <img src="images/interrogacao.png"
                                                                                 width="15" height="15" border="0"/>para
                                                                mais informa&ccedil;&otilde;es.
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td colspan="2" class="style25">

                                                                <input type="radio" name="coD7" value="A"/>A
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Cônjuge ou companheiro(a);"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD7" value="B"/>B
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Filho (a) ou enteado (a) até 21 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD7" value="C"/>C
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Filho (a) ou enteado (a) universitário (a) cursando escola técnica de segundo grau, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD7" value="D"/>D
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, do qual o contribuinte detém a guarda judicial, até 21 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD7" value="E"/>E
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, universitário (a) ou cursando escola técnica de segundo grau, do qual o contribuinte detém a guarda judicial, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD7" value="F"/>F
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pais, avós e bisavós que recebam rendimentos, tributáveis, até 1.637,11 mensais;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD7" value="G"/>G
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Menor pobre, até completar 21 anos, que o contribuinte crie e eduque e do qual detenha guarda judicial;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD7" value="H"/>H
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pessoa absolutamente incapaz, da qual o contribuinte seja tutor ou curador;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD7" value="I"/>I<img
                                                                    src="images/interrogacao.png"
                                                                    width="15" height="15" border="0"
                                                                    style="margin-bottom:-2px;"
                                                                    title="Filho (a), enteado (a), irmão (ã), neto (a), ou bisneto (a), em qualquer idade, quando incapacitado (a) física e/ou mentalmente para o trabalho."/>&nbsp;&nbsp;

                                                            </td>

                                                        </tr>

                                                    </table>
                                                </td>

                                            </tr>

                                        </table>

                                        <table width="100%" border="1" cellpadding="0" cellspacing="0"
                                               bordercolor="#003863" id="c8" style="display:none;">

                                            <tr>

                                                <td>
                                                    <table width="100%" border="0" cellspacing="2"
                                                           cellpadding="2">

                                                        <tr>

                                                            <td colspan="2" align="center"
                                                                class="TituloCurtas"><span class="style25">(dados do 8 &ordm; dependente) </span>
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td width="40%" class="TituloCurtas"><span
                                                                    class="style25">Nome completo:</span>
                                                            </td>

                                                            <td width="60%"><span class="style25">

            <input name="nomec9" id="nomec9" size="40"/>

        </span></td>

                                                        </tr>

                                                        <tr>

                                                            <td class="TituloCurtas"><span class="style25">Data de nascimento: </span>
                                                            </td>

                                                            <td><span class="style25">

            <input name="datac9" id="datac9"
                   onkeypress="return somenteNumeros(event,'');" onblur="validarData(this);" size="10"
                   maxlength="10"/>

        (dd/mm/aaaa)</span></td>

                                                        </tr>

                                                        <tr>

                                                            <td class="TituloCurtas"><span class="style25">Sexo:</span>
                                                            </td>

                                                            <td><span class="style25">

            <select name="sexoc9" id="sexoc9">

              <option value=""> </option>

              <option value="M">Masculino</option>

              <option value="F">Feminino</option>

          </select>

      </span></td>

                                                        </tr>

                                                        <tr>
                                                            <td colspan="2" class="style25">
                                                                <strong>Escolha o código do dependente:</strong>Passe o
                                                                mouse sobre <img src="images/interrogacao.png"
                                                                                 width="15" height="15" border="0"/>para
                                                                mais informa&ccedil;&otilde;es.
                                                            </td>
                                                        </tr>

                                                        <tr>

                                                            <td colspan="2" class="style25">

                                                                <input type="radio" name="coD8" value="A"/>A
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Cônjuge ou companheiro(a);"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD8" value="B"/>B
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Filho (a) ou enteado (a) até 21 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD8" value="C"/>C
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Filho (a) ou enteado (a) universitário (a) cursando escola técnica de segundo grau, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD8" value="D"/>D
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, do qual o contribuinte detém a guarda judicial, até 21 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD8" value="E"/>E
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Irmão (ã), neto (a), ou bisneto (a) sem arrimo dos pais, universitário (a) ou cursando escola técnica de segundo grau, do qual o contribuinte detém a guarda judicial, até 24 anos completos;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD8" value="F"/>F
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pais, avós e bisavós que recebam rendimentos, tributáveis, até 1.637,11 mensais;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD8" value="G"/>G
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Menor pobre, até completar 21 anos, que o contribuinte crie e eduque e do qual detenha guarda judicial;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD8" value="H"/>H
                                                                <img src="images/interrogacao.png"
                                                                     width="15" height="15" border="0"
                                                                     style="margin-bottom:-2px;"
                                                                     title="Pessoa absolutamente incapaz, da qual o contribuinte seja tutor ou curador;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="radio" name="coD8" value="I"/>I<img
                                                                    src="images/interrogacao.png"
                                                                    width="15" height="15" border="0"
                                                                    style="margin-bottom:-2px;"
                                                                    title="Filho (a), enteado (a), irmão (ã), neto (a), ou bisneto (a), em qualquer idade, quando incapacitado (a) física e/ou mentalmente para o trabalho."/>&nbsp;&nbsp;

                                                            </td>

                                                        </tr>

                                                    </table>
                                                </td>

                                            </tr>

                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>

                    </tr>
                    <!--                    DECLARAÇÃO-->
                    <tr>
                        <td colspan="5" align="center" class="style20"
                            style="padding-left:30px; padding-right:30px; background:#EEE;"><br/>
                            <p align="justify">Declarações Gerais</p>
                            <p align="justify" style="">Declaro, sob as penas da lei, que as informações aqui prestadas são verdadeiras, não cabendo ao SEBRAE Previdência - Instituto SEBRAE de Seguridade Social  qualquer responsabilidade perante a fiscalização. Comprometo-me a informar prontamente ao SEBRAE Previdência, por escrito, qualquer alteração nos dados acima declarados.<br><br>
 Declaro, também, ter ciência de que o Plano SEBRAEPREV é classificado na modalidade de Contribuição Definida, nos termos previstos nas normas em vigor, e que nesta modalidade não há benefícios vitalícios. Uma vez iniciados os pagamentos de quaisquer dos Benefícios de Prestação Continuada, os mesmos serão devidos até a data em que não houver saldo mínimo suficiente para a continuidade de seu pagamento.</p>
<p align="justify" style="color: red">PRAZO DE PAGAMENTO: Os pagamentos relativos aos benefícios serão realizados até o 5º (quinto) dia útil do mês subsequente ao Mês de Competência de Benefício (MCB). Entende-se como Mês de Competência de Benefício (MCB) o mês subsequente ao da data do recebimento do requerimento efetivamente protocolado no SEBRAE PREVIDÊNCIA (Artigos 60 e 66 do Regulamento do Plano SEBRAEPREV).</p>
<p align="justify" style="">O pagamento da concessão do benefício no prazo regulamentar, está condicionada ao recebimento do requerimento no SEBRAE PREVIDÊNCIA adequadamente preenchido, assinado e com os respectivos anexos.<br><br>
Comprovante bancário: Qualquer documento ou imagem do cartão, de origem da instituição financeira que contenha os dados bancários. ATENÇÃO: não encaminhar imagem do código de segurança no verso do Cartão.  Ex de comprovante bancário: cabeçalho do extrato da conta, imagem do cartão que contenha agência e conta ou print do cabeçalho do aplicativo bancário.</p>
                            <p style="color: red">
                                A Carta de Concessão de Benefício será enviada para o e-mail cadastrado nesse requerimento</p>
                            <br/>
                            <input style="margin-bottom: 20px; border: 3px solid; border-radius: 5px;  border-color: #09F;" type="submit" id="s" name="Enviar"
                                   value="CLIQUE AQUI PARA ENVIAR O REQUERIMENTO DE BENEFÍCIO"/>
                        </td>
                    </tr>
                    <!--                    RODAPÉ-->
                    <tr>
                        <td colspan="5" class="style20" align="justify" style="padding-left:30px; padding-right:30px;">
                            <br/>
                            <br/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
                    <script src="validaForm.js"></script>
                    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"8061491a4fcf36c9","version":"2023.8.0","r":1,"token":"cbfa9ca0dc1942a2a558ae8225356c52","si":100}' crossorigin="anonymous"></script>
                    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#residencial').mask('(00)00000-0000')
                            $('#celular').mask('(00)00000-0000')
                            $('#comercial').mask('(00)00000-0000')
                            $('#outros').mask('(00)00000-0000')
                            $('#txtCep').mask('00000-000')
                        });
                    </script>
    </form>
</body>
</html>
