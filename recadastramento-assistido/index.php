<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>TERMO DE OPÇÃO </title>

  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


  <script language="javascript" src="validaForm.js" type="text/javascript"></script>

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
    $(function(){
          $('#percentual').mask('0.9');
          
    });
  </script>

<script language="javascript">
        function Dependentes(valor){
            var habilitar = "";
            switch (valor){
            case "1": habilitar = "linha"; break;
            case "2": habilitar = "linha,d2"; break;
            case "3": habilitar = "linha,d2,d3"; break;
            case "4": habilitar = "linha,d2,d3,d4"; break;
            case "5": habilitar = "linha,d2,d3,d4,d5"; break;
            case "6": habilitar = "linha,d2,d3,d4,d5,d6"; break;
            case "7": habilitar = "linha,d2,d3,d4,d5,d6,d7"; break;
            case "8": habilitar = "linha,d2,d3,d4,d5,d6,d7,d8"; break;
        }
        var padrao = "linha,d2,d3,d4,d5,d6,d7,d8";
        padrao = padrao.split(",");
        for (i = 0; i < padrao.length; i++){
            document.getElementById(padrao[i]).style.display='none';
            if (habilitar != ""){
                habilitar = habilitar.split(",");
                for (i = 0; i < habilitar.length; i++)
                    document.getElementById(habilitar[i]).style.display='';
                }
            }
        }
    </script>
<script>
  // Função para adicionar campos de dependente
  function adicionarCamposDependente() {
    // Obtém o valor selecionado no menu suspenso
    var numDependentes = document.getElementById("renda").value;

    // Obtém o elemento onde você deseja adicionar os campos
    var container = document.getElementById("camposDependentes");

    // Limpa o conteúdo atual do container
    container.innerHTML = "";

    // Cria e adiciona campos para cada dependente selecionado
    for (var i = 0; i < numDependentes; i++) {
      var dependenteDiv = document.createElement("div");
      dependenteDiv.className = "dependente";

      // Adiciona campos para nome, data de nascimento, sexo e CPF
      dependenteDiv.innerHTML = `
          <h3>Dependente ${i + 1}</h3>
          <label for="nome${i}">Nome:</label>
          <input type="text" id="nome${i}" name="nome${i}" required size="35"><br>
          <label for="dataNascimento${i}">Data de Nascimento:</label>
          <input type="date" id="dataNascimento${i}" name="dataNascimento${i}" required size="20"><br>
          <label for="sexo${i}">Sexo:</label>
          <select name="sexo${i}" id="sexo${i}">
            <option value="empty">---</option>
            <option value="Feminino">Feminino</option>
            <option value="Masculino">Masculino</option>
          </select><br>
          <label for="cpf${i}">CPF:</label>
          <input type="text" id="cpf${i}" name="cpf${i}" required><br>
      `;

      // Adiciona a linha preta
      var hr = document.createElement("hr");
      container.appendChild(dependenteDiv);
      container.appendChild(hr);
    }
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

              RECADASTRAMENTO<br />
               DE ASSISTIDOS

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

        <tr>
          <td class="style20">Data de Nascimento:</td>
          <td>&nbsp;</td>
          <td class="style20"><input type="date" name="data_nasc" id="data_nasc"></td>
        </tr>

        <tr>

          <td class="style20">CPF: </td>

          <td>&nbsp;</td>

          <td class="style20"><input type="text" name="cpf" maxlength="11" onblur="return check_cpf(this.value)" onkeypress="return somenteNumeros(event,'');" /> (somente n&uacute;meros)</td>

        </tr>
  <script>
  console.log('JVYYXRE');
  console.log('23,9,12,12,11,5,18');
</script>
        <tr>
          <td class="style20">Sexo:</td>
          <td>&nbsp;</td>
          <td>
            <select name="sexo" id="sexo">
              <option value="empty">---</option>
              <option value="Feminino">Feminino</option>
							<option value="Masculino">Masculino</option>
            </select>

          </td>
        </tr>

        <tr>
          <td class="style20">Estado Civil:</td>
          <td>&nbsp;</td>
          <td>
            <select name="civil" id="civil">
              <option value="empty">---</option>
              <option value="Solteiro">Solteiro(a)</option>
							<option value="Casado">Casado(a)</option>
              <option value="Viuvo">Viúvo(a)</option>
              <option value="Divorciado">Divorciado(a)</option>
              <option value="Separado">Separado Judicialmente</option>
              <option value="Companheiro">Companheiro(a)</option>
            </select>

          </td>
        </tr>

        <tr>
          <td class="style20">Nome completo do conjuguê:</td>
          <td>&nbsp;</td>
          <td class="style20"><input type="text" id="conjugue" name="conjugue" size="35"></td>
        </tr>

        <tr>

          <td colspan="2" class="style20">E-mail: </td>

          <td colspan="3" class="style20"><input name="email" type="text" id="email" /></td>

        </tr>

        <tr>

          <td colspan="2" class="style20">Bairro:</td>

          <td colspan="3" class="style20"><input name="txtBairro" type="text" id="bairro" /></td>

          </tr>

          <tr>

          <td colspan="2" class="style20">Cidade:</td>

          <td colspan="3" class="style20"><input name="txtCidade" type="text" id="cidade" /></td>

          </tr>

          <tr>

          <td colspan="2" class="style20">CEP:</td>

          <td colspan="3" class="style20"><input name="txtCep" type="text" id="cep" maxlength="9" onkeyup="Formatadata(this,event)" /></td>

          </tr>

          <tr>

          <td colspan="2" class="style20">Telefones: <span class="ttx">(com DDD)</span></td>

          <td colspan="3" class="style20">Residencial:&nbsp;

            <input name="residencial" type="text" id="residencial" maxlength="13" onkeypress="return somenteNumeros(event,'');" />
          </td>

          </tr>

          <tr>

          <td colspan="2" class="style20">&nbsp;</td>

          <td colspan="3" class="style20">Celular: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input name="celular" maxlength="13" type="text" id="celular" onkeypress="return somenteNumeros(event,'');" />
          </td>

          </tr>
        <tr colspan="5" bgcolor="#ECFBFF" class="style20">
            <td class="style20">Dependente(s) para fins de Imposto de Renda:</td>
            <td>&nbsp;</td>
            <td>
                <select name="renda" id="renda" class="style20" onchange="adicionarCamposDependente()">
                    <option value="empty">---</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </td>
        </tr>
        <tr>
          <td colspan="5" bgcolor="#ECFBFF">
              <div id="camposDependentes" class="style20"></div>
          </td>
      </tr>


        <tr>

          <td colspan="3" align="center" class="style20">
            <p>

            <table width="90%" height="50px" border="0" cellspacing="0" cellpadding="0" align="center">

              <tr>

                <td class="style25">
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>Declaro estar ciente que pelo presente termo, de recadastramento de assistidos pelo plano do SebraePrev.</strong><br />

                  <br />


              </tr>



            </table>

            <br />
            <br />

            <input type="submit" value="Enviar Formulário" name="ok" />



            </p>
          </td>

        </tr>

      </table>

    </form>

  </blockquote>

</body>

</html>