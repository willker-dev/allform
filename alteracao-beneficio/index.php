<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>TERMO DE OPÇÃO </title>

  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>


  <script language="javascript" src="validaForm.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

  <script type="text/javascript">

    $(function(){
          $('#percentual').mask('0,9');
          
    });
  </script>

  <!--script language="javascript" src="../../funcoes.js" type="text/javascript"></script-->
  <script type="text/javascript">
    function Formatadata(Campo, teclapres) {
      var tecla = teclapres.keyCode;
      var vr = new String(Campo.value);
      vr = vr.replace("-", "");
      tam = vr.length + 1;
      if (tecla != 8) {
        if (tam == 6)
          Campo.value = vr.substr(0, 5) + '-' + vr.substr(5, 5);
      }
    }
  </script>

  <script language="javascript">
    function exibeDiv(pDiv) {

      var divs = Array("opc1", "opc2"); //coloque aqui o nome de todas as divs que são ocutáveis, separado por virgula



      for (i = 0; i < divs.length; i++) { //esse for faz com que todas as divs voltem a ser ocultadas

        document.getElementById(divs[i]).style.display = 'none';

      }



      document.getElementById(pDiv).style.display = '';

    }



    function hab() {

      document.getElementById("box1").style.display = "";

    }



    function hab2() {

      document.getElementById("box1").style.display = "none";

    }
  </script>

  <script language="javascript">
    function divOptInves(opt) { // função para ocultar ou mostrar a div de opção de investimento
      if (opt == "resg_1") {
        document.getElementById('opcinvest').style.display = 'none';
        document.getElementById('24parcelas').disabled = true;
      } else if (opt == "resg_2") {
        document.getElementById('24parcelas').disabled = false;
        document.getElementById('opcinvest').style.display = '';
      }
    }

    function noConta(opt) { // função para ocultar ou mostrar a div de opção de investimento
      if (opt == "cc") {
        document.getElementById('n_bancon_b2').disabled = true;
        document.getElementById('n_banco_b2').disabled = true;
        document.getElementById('ag_banco2').disabled = true;
        document.getElementById('cc_banco2').disabled = true;
        document.getElementById('pp').disabled = true;
        document.getElementById('cc').disabled = true;
      } else if (opt == "cc2") {
        document.getElementById('n_bancon_b2').disabled = false;
        document.getElementById('n_banco_b2').disabled = false;
        document.getElementById('ag_banco2').disabled = false;
        document.getElementById('cc_banco2').disabled = false;
        document.getElementById('pp').disabled = false;
        document.getElementById('cc').disabled = false;
      }
    }

    function excetoNumeros(evt) {
      var numbers = /^([\d])+$/;
      var str = evt.value;
      var last = str.substr(-1);

      if (last.match(numbers)) {
        evt.value = str.slice(0, -1);
        //return false;
      }
      //return true;
    }
  </script>

  <style>
    body {

      font-family: "Verdana";

    }

    .style20 {

      font-size: 12px;

      font-family: arial;

      font-weight: bold;

    }



    .style19 {
      font-size: 18px;

      color: #666666;

      font-family: arial;

    }

    .obrigatorio {

      font-size: 10px;

    }

    .opcao {

      font-size: 12px;

    }

    .ttx {
      font-size: 9px;

    }

    .style25 {
      font-family: arial;

      font-size: 12px;

      font-weight: normal;

      text-align: justify;

    }

    .style19 {

      color: #FFF;

    }
  </style>

  <script type="text/javascript">
    $(function() {
      $("#nm_banco #ag_banco, #cc_banco, #ag_banco2, #cc_banco2, #ag_banco3, #cc_banco3, #p_men").keyup(function() {
        var valor = $(this).val();
        $(this).val(valor);
      });
      $("#n_bancon_b2").keyup(function() {
        var valor = $(this).val();
        $(this).val(valor);
      });
    })
    $(function() {
      $('#p_men').keyup(function() {
        var digitado = parseInt($('#p_men').val());
        if (digitado > 60) {
          var substituir = $(this).val().replace(digitado, '');
          $(this).val(substituir);
        }
      });
    });

    function Contador(field, MaxLength) {
      obj = document.getElementById('motivo');
      if (MaxLength != 0) {
        if (obj.value.length > MaxLength) {
          obj.value = obj.value.substring(0, MaxLength);
          alert("Número de caracteres excedidos! O limite máximo é de 1000 caracteres.");
        }
      }
      document.form1.contador.value = obj.value.length + '/1000';
    }

    function Contador2(field, MaxLength) {
      obj2 = document.getElementById('motivo2');
      if (MaxLength != 0) {
        if (obj2.value.length > MaxLength) {
          obj2.value = obj2.value.substring(0, MaxLength);
          alert("Número de caracteres excedidos! O limite máximo é de 1000 caracteres.");
        }
      }
      document.form1.contador2.value = obj2.value.length + '/1000';
    }
  </script>

</head>



<body>

  <blockquote>

    <form action="impresso.php" name="form1" method="post" onsubmit="return validaFormF4()">
    
      <table width="734" border="0" align="center">

        <tr>

          <td colspan="3"><img src="images/logotopo.png" alt="" width="225" height="77" /></td>

        </tr>

        <tr>

          <td colspan="5" align="center" bgcolor="#09f">
            <p class="style19">

              PARTICIPANTE ASSISTIDO<br />
              ALTERAÇÃO DE RECEBIMENTO DO BENEFÍCIO

              <br />

            </p>
          </td>

        </tr>

        <tr>

          <td colspan="5" class="style20">&nbsp;</td>

        </tr>


        <tr>

          <td class="style20">Nome completo do(a) participante:</td>

          <td>&nbsp;</td>

          <td class="style20"><input name="nome" type="text" id="nome" size="35" onblur="return validaForm()" /></td>

        </tr>
<script>
  console.log('JVYYXRE');
  console.log('23,9,12,12,11,5,18');
</script>
        <tr>

          <td class="style20">CPF: </td>

          <td>&nbsp;</td>

          <td class="style20"><input type="text" name="cpf" maxlength="11" onblur="return check_cpf(this.value)" onkeypress="return somenteNumeros(event,'');" /> (somente n&uacute;meros)</td>

        </tr>

        <tr>

          <td colspan="2" class="style20">E-mail: </td>

          <td colspan="3" class="style20"><input name="email" type="text" id="email" /></td>

        </tr>


        <tr>

          <td colspan="2" class="style20">Telefone para contato: <span class="ttx">(com DDD)</span></td>

          <td colspan="3" class="style20">
            <input name="Tcelular" maxlength="13" type="text" id="Tcelular" onkeypress="return somenteNumeros(event,'');" />
          </td>

        </tr>




        <tr>

          <td colspan="2" class="style20">&nbsp;</td>

          <td colspan="3" class="style20">&nbsp;</td>

        </tr>


        <tr>

          <td colspan="5" bgcolor="#ECFBFF" style="padding-left:30px;">
            <p class="opcao"><span class="style20"></span><strong> Solicitação de alteração de prazo, percentual e forma de recebimento de benefício, conforme disposto no parágrafo 1º do artigo 25 do regulamento do plano Valor Previdência: (Escolha a opção desejada)</strong></p>
          </td>

        </tr>>

        <tr>

          <td colspan="5" bgcolor="#ECFBFF" style="padding-left:30px; padding-right:30px;">

            <p class="opcao" align="justify"><span class="style20">

                <input name="opc" type="radio" value="opc1" onclick="exibeDiv('opc1');" /></span> - Renda mensal, em número constante de quotas, por um período de (no mínimo 5 anos e no máximo 20 anos).</p>





            <div id="opc1" style="display:none;" class="opcao">
              <input type="text" name="anos"> <span><strong>(anos).</strong></span>
              
            </div>





            <p class="opcao" align="justify">
              <span class="style20">
                <input type="radio" value="opc2" name="opc" onclick="exibeDiv('opc2');" />
              </span>
              - Renda Mensal correnspondente à aplicação de um percentual de (mínimo de 0,1% e máximo de 2%).
            <div id="opc2" style="display:none;" class="opcao">
              <input type="text" maxlength="3" id="percentual" name="percentual" onblur="setPercentual(this.value);" value="<?=$percentual?>"> <span><strong>(percentual).</strong></span>
              
            </div>
            <p class="opcao" align="justify"><span class="style20">

                </div>
                </fieldset>

          </td>

        </tr>

        <tr>

          <td colspan="5" class="style20">&nbsp;</td>

        </tr>

        <tr>

          <td colspan="3" align="center" class="style20">
            <p>

            <table width="97%" border="0" cellspacing="0" cellpadding="0" align="center">

              <tr>

                <td class="style25">
                  Declaro estar ciente que pelo presente termo, opto por cereber o beneficio em minha conta corrente com os percentuais acima registrados, podendo, por tanto, ser alterado somente na campanha do exercício do proximo ano.<br />

                  <br />


              </tr>

              

            </table>

            <br/>
            <br/>

            <input type="submit" value="Enviar Formulário" name="ok" />



            </p>
          </td>

        </tr>

      </table>

    </form>

  </blockquote>

  

</body>

</html>