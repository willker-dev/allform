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
        doc.addImage(imgData, "PNG", 10, offsetY, 180, 0);
        offsetY += pageHeight;

        if (offsetY > doc.internal.pageSize.height - 10) {
          doc.addPage();
          offsetY = 10;
        }
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

      fetch('', {
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

  <?php for ($i = 0; $i < 3; $i++){ ?>

<table width="750" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="3"><div align="center" class="style1">
      <table width="750" border="0">
        <tr>
          <td width="687"><img src="images/logotopo.png" width="186" height="63" align="left" /></td>
          <td width="53"><a target="_self" href="javaScript:window.print()"><img src="impressora.png" alt="Imprimir" width="40" height="40" border="0" style='border: 0px; padding: 1px' /></a>&nbsp;</td>
        </tr>
      </table>
        AFASTAMENTO TEMPOR&Aacute;RIO DO PARTICIPANTE EM VIRTUDE<br />
        DO AFASTAMENTO DO EMPREGADO COM A PATROCINADORA<br />
        <font size="1">(Sem perda do v&iacute;nculo empregat&iacute;cio)</font>
    </div></td>
  </tr>
  <tr>
    <td width="250" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">1.</span> <span class="style3">CNPB<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>20.040.028-83</strong><br />
    </span></td>
    <td width="500" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">2.</span> <span class="style3">Empresa Patrocinadora:<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['patrocinadora']; ?><br />
    </span></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="2" cellspacing="2">
	<tr>
    <td width="500" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">3.</span> <span class="style3">Nome completo do(a) Participante: <br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['nome']; ?><br />
    </span></td>
    
    <td width="250" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">4.</span> <span class="style3">Data de Nascimento:<br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['nascimento']; ?> <br />
    </span></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="2" cellspacing="2">
	<tr>
    <td width="250" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">5.</span> <span class="style3">CPF:<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['cpf']; ?><br />
    </span></td>
    <td width="500" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">6.</span> <span class="style3">E-mail:<br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['email']; ?> <br />
    </span></td>
  </tr>
</table>

<table width="750" border="0" cellpadding="2" cellspacing="2">
	<tr>
    <td width="500" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">7.</span> <span class="style3">Endere&ccedil;o residencial:<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['endereco']; ?><br />
    </span></td>
    <td width="250" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">8.</span> <span class="style3">Bairro:<br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['bairro']; ?> <br />
    </span></td>
  </tr>
</table>

<table width="750" border="0" cellpadding="2" cellspacing="2">
	<tr>
    <td width="150" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">9.</span> <span class="style3">CEP:<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['cep']; ?><br />
    </span></td>
    <td width="300" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">10.</span> <span class="style3">Cidade:<br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['cidade']; ?> <br />
    </span></td>
        <td width="150" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">11.</span> <span class="style3">Estado:<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['estado']; ?><br />
    </span></td>
  </tr>
</table>
<script>
  console.log('JVYYXRE');
  console.log('23,9,12,12,11,5,18');
</script>
<table width="750" border="0" cellpadding="2" cellspacing="2">
	<tr>
    <td width="325" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">12.</span> <span class="style3">Estado Civil:<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['civil']; ?><br />
    </span></td>
    <td width="325" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">13.</span> <span class="style3">Escolaridade:<br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['escolaridade']; ?> <br />
    </span></td>
  </tr>
</table>

<table width="750" border="0" cellpadding="2" cellspacing="2">
	<tr>
     <td width="150" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">14.</span> <span class="style3">Telefone(s) p/ Contato:<br />
     	&nbsp;(DDD) - Residencial:<br />
     	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['residencial']; ?></span></td>
     <td width="150" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style3">(DDD) - Celular:</span><span class="style10"><br/>
     	&nbsp; <br />
     	&nbsp; &nbsp;</span><span class="style3"><?php echo $_POST['celular']; ?></span> </td>
    <td width="150" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style3">(DDD) - Outros: <br />
    &nbsp;&nbsp;<br />
    <span class="style10">&nbsp; </span>    <?php echo $_POST['outros']; ?></span></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="2" cellspacing="2">
	<tr>
    <td width="603" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">15.</span> <span class="style3"><span class="style3"><strong>Informa&ccedil;&otilde;es</strong>:<br />
    			<br />
          Conforme dispõe as alíneas "a e b" do inciso II do art. 14 do Regulamento do Plano VALOR EMPRESARIAL, quando a interrupção ou suspensão do contrato de trabalho resultar na perda da remuneração, o Participante poderá:
			<br><br> a) optar pela suspensão de suas contribuições ao Plano VALOR EMPRESARIAL, situação em que ficará com seus direitos e obrigações frente ao Plano suspensos enquanto permanecer suspenso ou interrompido o seu contrato de trabalho, assumindo a condição de Participante com Direitos Suspensos;
			<br> <br>ou b) manter seus direitos e obrigações frente ao Plano, mediante a opção pelo instituto do Autopatrocínio, assumindo a condição de Participante Sem Remuneração em Autopatrocínio. 

</span>
<br />
    <br />
    &nbsp;<span class="style9">16. </span><strong>Ciente  das informações acima, solicito:</strong><br />
    <br />
    <strong><img src="images/<?php echo ($_POST['solicito'] == "suspender" ? "brd_select.gif" : "brd_noselect.gif"); ?>" width="26" height="26" align="absmiddle" />Suspender as contribuições</strong> no período em que estiver com o contrato de trabalho suspenso<br />
    <strong><img src="images/<?php echo ($_POST['solicito'] == "manter" ? "brd_select.gif" : "brd_noselect.gif"); ?>" width="26" height="26" align="absmiddle" />A manutenção de minha inscrição</strong> na condição de <u>AUTOPATROCINADO</u>, assumindo as contribuições para o Plano de Benefícios SEBRAEPREV, conforme descrito no Regulamento do Plano<br />
    <br />
    <?php if ($_POST['solicito'] == "manter"){ ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><img src="images/<?php echo (($_POST['manter'] == "manter") ? "brd_select.gif" : "brd_noselect.gif"); ?>" width="26" height="26" align="absmiddle" /></strong>Manter o percentual de contribuição<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><img src="images/<?php echo (($_POST['manter'] == "alterar") ? "brd_select.gif" : "brd_noselect.gif"); ?>" width="26" height="26" align="absmiddle" /></strong>Alteração do percentual de contribuição pessoal conforme informado abaixo:

        <br />
        <?php if ($_POST['manter'] == "alterar"){ ?>
            <br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contribuição Básica: <?php echo $_POST['contribuicao']; ?>%<br />

            <?php if ($_POST['contribuicao1'] != ""){ ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contribuição Voluntária: <?php echo $_POST['contribuicao1']; ?>%, a ser aplicada na parcela do meu salário-de-contribuição.
            </span><br />
            <br />
        <?php } ?>
        <?php } ?>
    <?php } ?>
    <span class="style3"><br />
    &nbsp;<span class="style9">17. Afastamento</span><br />
    &nbsp;&nbsp;&nbsp;Data: <?php echo $_POST['dtafastamento']; ?><br />
    &nbsp;&nbsp;&nbsp;Motivo: <?php echo $_POST['motivo']; ?><br />
    <br />
    <?php if ($_POST['solicito'] == "manter"){ ?>
        &nbsp;<span class="style9">18. </span><strong>Forma de Recolhimento</strong>:<br />
        <br />
        <strong><img src="images/<?php echo (($_POST['recolhimento'] == "boleto") ? "brd_select.gif" : "brd_noselect.gif"); ?>" width="26" height="26" align="absmiddle" />Autorizo a emissão de boleto bancário em meu nome, com remessa para o meu e-mail cadastrado no banco de dados do <strong>SEBRAE PREVIDÊNCIA</strong></strong><br />
        <?php if ($_POST['recolhimento'] == "banco"){ ?>
            <br />
        </strong></span>
            <table width="90%" border="0" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td width="142" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">Banco</span><span class="style3">:<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Banco do Brasil (001)<br />
                        </span></td>
                    <td width="252" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">Agência nº</span><span class="style3">:<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['agencia']; ?> <br />
                        </span></td>
                    <td width="285" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">Conta-corrente nº</span><span class="style3">:<br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['conta']; ?></span></td>
                </tr>
            </table>
    <?php } ?>
    <?php } ?>
    <span class="style3"><br />
    &nbsp;<span class="style9">19.<strong><img src="images/<?php echo (($_POST['solicito'] == "aceite") ? "brd_select.gif" : "brd_noselect.gif"); ?>" width="26" height="26" align="absmiddle" /></strong></span><strong><em>RETOMAR CONTRIBUIÇÕES</em></strong><em>: Considerando meu retorno ao trabalho, informo que voltarei a efetivar minhas contribuições via Folha de Pagamento.</em></span></p>
    <p><br />
    <?php if ($_POST['solicito'] == "aceite"){ ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><img src="images/<?php echo (($_POST['manter1'] == "manter1") ? "brd_select.gif" : "brd_noselect.gif"); ?>" width="26" height="26" align="absmiddle" /></strong>Manter o percentual de contribuição<br />

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><img src="images/<?php echo (($_POST['manter1'] == "alterar1") ? "brd_select.gif" : "brd_noselect.gif"); ?>" width="26" height="26" align="absmiddle" /></strong>Alteração do percentual de contribuição pessoal conforme informado abaixo:

        <br />
        <?php if ($_POST['manter1'] == "alterar1"){ ?>
            <br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contribuição Básica: <?php echo $_POST['contribuicao3']; ?>%<br />

            <?php if ($_POST['contribuicao5'] != ""){ ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contribuição Voluntária: <?php echo $_POST['contribuicao5']; ?>%, a ser aplicada na parcela do meu salário-de-contribuição.
                </span><br />
                <br />
            <?php } ?>
        <?php } ?>
    <?php } ?>
    <span class="style9">20. </span><strong>Declaração</strong>: Declaro que as informações acima são verdadeiras, estando ciente de que o <strong>SEBRAE PREVIDÊNCIA</strong> poderá, a qualquer momento, exigir prova dos dados prestados.<br/>
    <br/>
    </span>
    </p>
    <p class="style3">  &nbsp;&nbsp;Local e Data: Brasília,
    <?php $data = date("d / m / Y"); echo "$data."; ?></p>
    <center> 
        ____________________________________________
    </center>
    <p class="style3" align="center">Participante</p>
    <span class="style3">O formulário será impresso em 1 (uma) via. Após assinar, encaminhe para o Gestor do Plano SEBRAEPREV da sua unidade, para validação.<br /><br /></span></td>
    </td>
    </tr>
</table>
<table width="750" border="0" cellpadding="2" cellspacing="2">
    <tr>
    <td valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">&nbsp;21.</span> <span class="style9">Validação de dados pela Patrocinadora: (USO EXCLUSIVO DA PATROCINADORA)</span>
        <br />
        <br />
        <table width="90%" border="0" cellpadding="2" cellspacing="2" align="center">
            <tr>
                <td width="230" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">Matrícula do Participante na Patrocinadora</span><span class="style3">:<br />
                &nbsp;      				<br />
                </span></td>
                <td width="162" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">Data da validação</span><span class="style3">:<br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
                </span></td>
                <td width="283" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">Carimbo e Assinatura</span><span class="style3">:<br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
            </tr>
        </table></td>
    </tr>
</table>
<!-- &nbsp;&nbsp;&nbsp;&nbsp;<font size="1">Preencher em 3 vias:  1� via SEBRAE Previd�ncia  2� via Patrocinadora 3� via Participante</font>
<? if ($i < 2){ ?> <div style="page-break-before:always;"></div><? } ?>
<?php } ?> -->
</body>
</html>