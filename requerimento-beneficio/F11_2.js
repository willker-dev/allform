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

function exibe(id) {
    if (document.getElementById(id).style.display === "none") {
        document.getElementById(id).style.display = "inline";
    }

    else {
        document.getElementById(id).style.display = "none";
    }
}

function exibe2(id) {

    if (document.getElementById(id).style.display === "inline") {
        document.getElementById(id).style.display = "none";
    }

}

function exibe3(id) {

    if (document.getElementById(id).style.display === "inline") {
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
    console.log(opc);
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

}

function ckmesmo() {

    if (document.getElementById("mesmo").checked === true) {
        document.getElementById("requerente").disabled = true;
        document.getElementById("parentesco").disabled = true;
        document.getElementById("requerente").value = document.getElementById("nomePatrocinadora2").value;
        document.getElementById("parentesco").value = "----------";
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

$(function () {

    $('#cpf').mask('000.000.000-00');

    $("[name^='data']").mask('00/00/0000');


    var i = 1;
    while (i <= 8) {
        $("#nomed" + i).parent().append("<div style='color:red' class='alert nomed" + i + "'></div>");
        $("#datad" + i).parent().append("<div style='color:red' class='alert datad" + i + "'></div>");
        $("#parentescod" + i).parent().append("<div style='color:red' class='alert parentescod" + i + "'></div>");
        $("#sexod" + i).parent().append("<div style='color:red' class=' alert sexod" + i + "'></div>");
        $("#invalidod" + i).parent().append("<div style='color:red' class='alert invalidod" + i + "'></div>");
        $("#nomec" + (i + 1)).parent().append("<div style='color:red' class='alert nomec" + i + "'></div>");
        $("#datac" + (i + 1)).parent().append("<div style='color:red' class='alert datac" + i + "'></div>");
        $("#sexoc" + (i + 1)).parent().append("<div style='color:red' class='alert sexoc" + i + "'></div>");
        $("#coD" + (i + 1)).parent().append("<div style='color:red' class='alert coD" + i + "'></div>");
        i++;
    }

    // Define ação do botão enviar

    $(":input").bind("blur", function (ev) {
        var id = ev.target.name;
        if (id !== 'cpf' && id !== '') {
            $("[name="+id+"]").siblings(".alert.active").html('');
        }
    });

    $("#s").bind("click", function (ev) {
        var tel = 0;
        i = 1;

        // Limpar todos os alertas!
        var alert_selector = $('.alert');
        alert_selector.html('');
        alert_selector.removeClass("active");

        while (i <= 8) {

            // Nome
            var nomed = $("#nomed" + i);
            var nomed_alert = $(".nomed" + i);
            if ((nomed.val() === "") && (nomed.is(":visible") === true)) {
                nomed_alert.html("Campo obrigatório.");
                nomed_alert.addClass('active');
                ev.preventDefault();
            }

            // Data
            var datad = $("#datad" + i);
            var datad_alert = $(".datad" + i);
            if ((datad.val() === "") && (datad.is(":visible") === true)) {
                datad_alert.html("Campo obrigatório.");
                datad_alert.addClass('active');
                ev.preventDefault();
            }

            //Parentesco
            var parentescod = $("#parentescod" + i);
            var parentescod_alert = $(".parentescod" + i);
            parentescod_alert.html("");
            if ((parentescod.val() === "") && (parentescod.is(":visible") === true)) {
                parentescod_alert.html("Campo obrigatório.");
                parentescod_alert.addClass("active");
                ev.preventDefault();
            }

            //Sexo
            var sexod = $("#sexod" + i);
            var sexod_alert = $(".sexod" + i);
            sexod_alert.html("");
            if ((sexod.val() === "") && (sexod.is(":visible") === true)) {
                sexod_alert.html("Campo obrigatório.");
                sexod_alert.addClass('active');
                ev.preventDefault();
            }

            //Invalidez
            var invalidod = $("#invalidod" + i);
            var invalidod_alert = $(".invalidod" + i);
            sexod_alert.html("");
            if ((invalidod.val() === "") && (invalidod.is(":visible") === true)) {
                invalidod_alert.html("Campo obrigatório.");
                invalidod_alert.addClass('active');
                ev.preventDefault();
            }
            i++;
        }


        // verifica se pelo menos um telefone está preechido

        $("input:text:not(:hidden)").each(function () {
            var el = $(this);
            var id = el.attr("id");
            var parent = $("." + id);
            parent.html('');

            if (id !== "Tresidencial" && id !== "Tcomercial" && id !== "Tcelular" && id !== "Toutros") {
                if (el.val() === "") {
                    parent.html("Campo precisa ser preenchido!");
                    parent.addClass('active');
                    ev.preventDefault();
                }
            } else {
                if (el.val() !== "") {
                    tel++;
                }
            }

        });

        var tel_fields = $('.tels');
        tel_fields.html("");
        if (tel === 0) {
            tel_fields.html("Precisa informar pelo menos um número de telefone");
            tel_fields.addClass('active');
            ev.preventDefault();
        }

        var uf = $(".uf");
        uf.html("");
        if ($("select[name=uf]").val() === "--") {
            uf.html("Selecione uma opção.");
            uf.addClass('active');
            ev.preventDefault();
        }

        var banco = $(".banco")
        banco.html("");
        if ($("select[name=banco]").val() === "") {
            banco.html("Selecione uma opção.");
            banco.addClass('active');
            ev.preventDefault();
        }

        $(".rendaM1ano").html("");
        if ($("#rendaMensal1").is(":checked")) {
            if ($('#rendaM1ano').val() === '0' && $("#rendaM1ano").is(':enabled')) {
                $(".rendaM1ano").html("Escolha um dos campos acima.");
                $(".rendaM1ano").addClass('active');
                ev.preventDefault();
            }
        }

        $(".rendaM2pc").html("");
        if ($("#rendaMensal2").is(":checked")) {
            if ($('#rendaM2pc').val() === '0' && $("#rendaM2pc").is(':enabled')) {
                $(".rendaM2pc").html("Escolha um dos campos acima.");
                $(".rendaM2pc").addClass('active');
                ev.preventDefault();
            }
        }

        $(".rendaMensal").html("");
        if (!$("#rendaMensal1").is(":checked") && !$("#rendaMensal2").is(":checked") && !$("#rendaM3").is(":checked")) {
            $(".rendaMensal").html("Escolha um dos campos acima.");
            $(".rendaMensal").addClass('active');
            ev.preventDefault();
        } else if ($("#rendaM3").is(":checked")) {
            $(".tipo_r").html("");
            $("#rendaMensalx").show();
            if ($("input:radio[name=tipo_r]").is(":visible")) {
                if (($("input:radio[name=tipo_r]").is(":checked") === false)) {
                    $(".tipo_r").html("Escolha uma das opções acima.");
                    $(".tipo_r").addClass('active');
                    ev.preventDefault();
                }
            }
        }

        $(".dependentes").html("");
        if ($("select[name=dependentes]").val() === "") {
            $(".dependentes").html("Selecione uma opção.");
            $(".dependentes").addClass('active');
            ev.preventDefault();
        }

        $(".sexo").html("");
        var isChecked = $("input:radio[name=sexo]:checked").val();

        if (!isChecked) {
            $(".sexo").html("Campo precisa ser escolhido!");
            $(".sexo").addClass('active');
            ev.preventDefault();

        }

        if ($('#agencia').val().length < 5 && $("#agencia").val() !== "") {
            $(".agencia").html("Informe o número da sua agência com o dígito verificador");
            $(".agencia").addClass('active');
            ev.preventDefault();
        }

        $(".tconta").html("");
        var tconta = $("input:radio[name=tconta]:checked").val();
        //$(".tconta").html("");
        if (!tconta) {
            $(".tconta").html("Campo precisa ser escolhido!");
            $(".tconta").addClass('active');
            ev.preventDefault();
        }

        $(".tipoAposentadoria").html("");
        var tipoAposentadoria = $("input:radio[name=tipoAposentadoria]:checked").val();
        //$(".tconta").html("");
        if (!tipoAposentadoria) {
            $(".tipoAposentadoria").html("<br/>Escolha uma opção acima.");
            $(".tipoAposentadoria").addClass('active');
            ev.preventDefault();
        }

        $(".perfilInvestimento").html("");
        var perfilInvestimento = $("input:radio[name=perfilInvestimento]:checked").val();

        if (!perfilInvestimento) {
            $(".perfilInvestimento").html("Escolha uma opção acima.");
            $(".perfilInvestimento").addClass('active');
            ev.preventDefault();
        }

        if ($("#declaOP").prop("checked") === false) {
            if ($("#dependentes2").val() === "--") {
                ev.preventDefault();
            }
            else {

            }
        }


        $(".dep").html("");
        if ($("#dependentes2").val() === "--" && !$("input:checkbox[name=noDep]").is(":checked")) {
            $(".dep").html("Escolha uma das opções acima.");
            $(".dep").addClass('active');
            ev.preventDefault();
        }

        if ($('.alert.active').length > 0) {
            // Animação de correr a tela até o .alert
            $('html, body').stop().animate({
                scrollTop: $('.alert.active').first().parent().offset().top
            }, 500);
        }
    });

});

function check_cpf2(numcpf) {


    var cpf_alert = $(".cpf");
    cpf_alert.html("");

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

            cpf_alert.html("");
            cpf_alert.removeClass('active');
            return true;

        }

        cpf_alert.addClass('active');
        cpf_alert.html("Número do CPF inválido.");
        //console.log('cpf inválido!');
        return false;
    }
}

function mostraDocs(pItem) {
    document.getElementById('normal_antecipada').style.display = 'none';
    document.getElementById('invalidez').style.display = 'none';
    document.getElementById('morte').style.display = 'none';
    switch (pItem) {
        case "normal":
            document.getElementById('normal_antecipada').style.display = '';
            break;

        case "antecipada":
            document.getElementById('normal_antecipada').style.display = '';
            break;

        case "invalidez":
            document.getElementById('invalidez').style.display = '';
            break;

        case "morte":
            document.getElementById('morte').style.display = '';
            break;
    }

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

var d = document.form1;

if(d.rendaMensal !== 'rendaM2') {
    document.getElementById("rendaM2pc").disabled = true;
    document.getElementById("rendaM2pc").value = "0";
}