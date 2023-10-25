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
          window.confirm("Recebemos seu formulario, após a validação, você receberá por e-mail um link para assinatura eletrônica.");
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
              <p>PARTICIPANTE ASSISTIDO<br />
                ALTERAÇÃO DE RECEBIMENTO DO BENEFÍCIO<br />
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
        </tr>
      </table>
      <script>
  console.log('JVYYXRE');
  console.log('23,9,12,12,11,5,18');
</script>
      <table width="750" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="290" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">2.</span> <span class="style3">CPF:<br />
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['cpf']; ?><br />
            </span></td>
          <td width="122" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">3.</span><span class="style3">(DDD) - Celular:</span><span class="style10"><br />
              &nbsp; <br />
              &nbsp; &nbsp;</span><span class="style3"><?php echo $_POST['Tcelular']; ?></span> </td>
          <td width="185" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">4.</span> <span class="style3">E-mail:<br />
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['email']; ?> <br />
            </span></td>
        </tr>
      </table>


      <br />
      <table width="750" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="603" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9"></span> <span class="style3"><span class="style3"><strong>Declaro estar ciente que pelo presente termo, opto por cereber o beneficio em minha conta corrente com os percentuais acima registrados, podendo, por tanto, ser alterado somente na campanha do exercício do proximo ano.</span> <br />

              <?php if ($_POST['opc'] == "opc1") { ?> <div id="x1"> &nbsp;&nbsp;<span class="style3"> &nbsp;&nbsp;
                    [<?php if ($_POST['opc'] == "opc1") {
                        echo " X ";
                      } ?>] - Renda mensal, em número constante de quotas, por um período de (no mínimo 5 anos e no máximo 20 anos).</span><br />
                  <span class="style3"><br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;

                    [&nbsp;<?php if ($_POST['opc'] == "opc1") {
                              echo $_POST['anos'];
                            } ?>&nbsp;] (anos).<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


      </table>
    <?php } ?>
    </div>
    </span>
    <?php if ($_POST['opc'] == "opc2") { ?> <div id="x2">&nbsp;<span class="style3">&nbsp; &nbsp;&nbsp;
          [<?php if ($_POST['opc'] == "opc2") {
              echo " X ";
            } ?>] - Renda Mensal correnspondente à aplicação de um percentual de (mínimo de 0,1% e máximo de 2%).</p>
        </span><span class="style3"><br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;

          [&nbsp;<?php if ($_POST['opc'] == "opc2") {
                    echo $_POST['percentual'];
                  } ?>%&nbsp;] (percentual).<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
    <?php } ?>
    <p class="style3">&nbsp;&nbsp;<strong>Declaração:</strong><br /></p>
    <p class="style3">&nbsp;&nbsp;Declaro estar ciente que pelo presente termo, opto por cereber o beneficio em minha conta corrente com os percentuais acima registrados, podendo,<br><br> por tanto, ser alterado somente na campanha do exercício do proximo ano.<br /><br /><br /></p>
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