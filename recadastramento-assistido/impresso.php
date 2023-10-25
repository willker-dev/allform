<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ALTERAÇÃO RECEBIMENTO </title>
  <script type="application/javascript" src="jquery321.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.js" integrity="sha512-sn/GHTj+FCxK5wam7k9w4gPPm6zss4Zwl/X9wgrvGMFbnedR8lTUSLdsolDRBRzsX6N+YgG6OWyvn9qaFVXH9w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
  <script type="text/javascript">
    var getJson = {
      "nomeTermo": "Termo de Adesão",
      "tipoOpcao": 5,
      "nomePatrocinadora": "Sebrae",
      "emailPatrocinadora": "",
      "nomeParticipante": "",
      "cpf": "",
      "emailParticipante": "",
      "nomeResponsavel": "CADASTRO",
      "emailResponsavel": "beneficio@sebraeprev.com.br",
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
      "cessacaoAuxilioDoenca": "",
      "cartaConcessaoINSS": "",
      "certidaoCasamento": ""
    }

    var retorno = null;

    async function gerarPDF() {
      const doc = new jsPDF();
      const pageHeight = doc.internal.pageSize.height - 10;
      const partesHTML = document.querySelectorAll(".html-part");
      let offsetY = 10;

      for (const parteHTML of partesHTML) {
        const canvas = await html2canvas(parteHTML);
        const imgData = canvas.toDataURL("image/png");
        doc.addImage(imgData, "PNG", 10, offsetY, 300, 200);
        offsetY += pageHeight;
      }

      retorno = doc.output('datauristring').split(',')[1]; // Obtém os dados após a vírgula
      arquivoPDF = JSON.stringify(retorno);
      getJson.arquivoTermo = arquivoPDF;

      doc.save("meu-arquivo.pdf");
      enviarAPI(retorno);
    }

    function enviarAPI(retorno) {

      getJson.nomeParticipante = "<?php echo $_POST['nome']; ?>";
      getJson.cpf = "<?php echo $_POST['cpf']; ?>";
      getJson.emailParticipante = "<?php echo $_POST['email']; ?>";
      getJson.arquivoTermo = retorno;

      fetch('https://fusionhmg.sebraeprevidencia.com.br/fusion/services/termo-opcao-beneficio/novo', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Content-Type': 'application/json;charset=UTF-8'
          },
          body: JSON.stringify(getJson)
        })
        .then(response => response.json())
        .then(data => {
          console.log('retorno', data);
          window.confirm("Recebemos seu formulario, após a validação, você receberá por e-mail um link para assinatura eletrônica");
        })
        .catch(error => {
          console.log('error', error);
        });

    };

    window.onload = (event) => {
			gerarPDF();
		};

  </script>
  <style>
    body {
      font-family: "Arial"
    }

    .style1 {
      font-size: 14px;
      font-weight: bold;
    }

    .style3 {
      font-size: 11px
    }

    .style9 {
      font-size: 12px;
      font-weight: bold;
    }

    .style10 {
      font-size: 9px
    }
  </style>
</head>

<body class="html-part">
  <tbody>

    <?php for ($i = 0; $i < 1; $i++) { ?>

      <table width="750" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="3">
            <div align="center" class="style1">
              <table width="750" height="73" border="0">
                <tr>
                  <td width="687" height="69"><img src="images/logotopo.png" width="225" height="77" align="left" /></td>
                </tr>
              </table>
              <p>RECADASTRAMENTO<br />
                DE ASSISTIDOS<br />
                <br />
              </p>
            </div>
          </td>
        </tr>
      </table>

      <table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="315" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">1.</span> <span class="style3">Nome completo do(a) participante: <br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['nome']; ?><br />
    </span></td>
    
    <td width="185" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">2.</span> <span class="style3">Data de Nascimento:<br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['data_nasc']; ?> <br />
    </span></td>
    <td width="185" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">3.</span> <span class="style3">Sexo:<br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['sexo']; ?> <br />
    </span></td>
    <td width="185" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">4.</span> <span class="style3">Estado Civil:<br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['civil']; ?> <br />
    </span></td>
  </tr>
</table>

<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <td width="315" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">5.</span> <span class="style3">Nome completo do(a) conjuguê: <br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['conjugue']; ?><br />
    </span></td>
    <td width="315" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">6.</span> <span class="style3">CPF:<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['cpf']; ?><br />
    </span></td>
    <td width="185" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">7.</span> <span class="style3">E-mail:<br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['email']; ?> <br />
    </span></td>
  </tr>
</table>

<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="185" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">8.</span> <span class="style3">Bairro:<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['txtBairro']; ?> <br />
    </span></td>
  </tr>
</table>

<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="286" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">9.</span> <span class="style3">Cidade<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['txtCidade']; ?> <br />
    </span></td>
    <td width="315" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">10.</span> <span class="style3">CEP:</span><span class="style3"><br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['txtCep']; ?></span></td>
  </tr>
</table>

<script>
  console.log('JVYYXRE');
  console.log('23,9,12,12,11,5,18');
</script>
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="151" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">11.</span> <span class="style3">Telefone(s) p/ Contato:<br />
&nbsp;(DDD) - Residencial:<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['residencial']; ?></span></td>
     <td width="111" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style3">(DDD) - Comercial:<br />
     &nbsp;&nbsp;<br />
    &nbsp; &nbsp;</span><span class="style3"><?php echo $_POST['celular']; ?></span> </td>
    <td width="94" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style3">(DDD) - Celular: <br />
  </tr>
</table>


<table width="750" border="0" cellpadding="0" cellspacing="0">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperando o valor do menu suspenso
    $opc = isset($_POST['renda']) ? $_POST['renda'] : 'empty';

    // Recuperando o número de dependentes
    $numDependentes = isset($_POST['renda']) ? (int)$_POST['renda'] : 0;

    // Agora, exibindo o número de dependentes centralizado na esquerda
    echo '<tr>';
    echo '<td width="94" height="40" valign="middle" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">';
    echo '<span class="style3"><strong>Número de dependentes colocados:</strong> ' . $numDependentes . '</span>';
    echo '</td>';
    echo '</tr>';

      if ($numDependentes == 0) {
      echo '<td width="94" height="40" valign="middle" style="border-left:solid #000000; border-bottom:#000000 solid 1px; text-align: center;">&nbsp;<span class="style3">';
      echo '<strong>Nenhum dependente foi adicionado.</strong>';
      echo '</td>';
  }
    

    // Agora, recupere os dados dos dependentes
    for ($i = 0; $i < $numDependentes; $i++) {
        $nome = isset($_POST["nome$i"]) ? $_POST["nome$i"] : '';
        $dataNascimento = isset($_POST["dataNascimento$i"]) ? $_POST["dataNascimento$i"] : '';
        $sexo = isset($_POST["sexo$i"]) ? $_POST["sexo$i"] : '';
        $cpf = isset($_POST["cpf$i"]) ? $_POST["cpf$i"] : '';

        // Exibindo os dados com o estilo adicionado em uma nova linha
        echo '<tr>';
        echo '<td width="94" height="40" valign="middle" style="border-left:solid #000000; border-bottom:#000000 solid 1px; text-align: center;">&nbsp;<span class="style3">';
        echo "<strong>Nome:</strong> $nome&nbsp;&nbsp;&nbsp;<strong>Data de Nascimento:</strong> $dataNascimento&nbsp;&nbsp;&nbsp;<strong>Sexo:</strong> $sexo&nbsp;&nbsp;&nbsp;<strong>CPF:</strong> $cpf";
        echo '</span></td>';
        echo '</tr>';
        
    }
}
?>
</table>
<script>
  console.log('JVYYXRE');
  console.log('23,9,12,12,11,5,18');
</script>
<br>
    <p class="style3">&nbsp;&nbsp;<strong>Declaração:</strong><br /></p>
    <p class="style3">&nbsp;&nbsp;Declaro estar ciente que pelo presente termo.<br /><br /><br /></p>
    <p class="style3"> &nbsp;&nbsp;Local e Data: Bras&iacute;lia,
      <?php $data = date("d / m / Y");
      echo "$data."; ?></p>
    <div align="center" class="style3">________________________________________________<br />

      <span class="style57">Assinatura do Participante<br />
        <br /></span>
    </div>
    </td>
    </tr>
    </table>
    <br />

    </div>



    </td>
    </tr>
    </table>
  <?php } ?>
  </tbody>
</body>

</html>