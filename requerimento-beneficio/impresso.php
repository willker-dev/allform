

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REQUERIMENTO BENEFICIO </title>
<!-- <script type="application/javascript" src="./jquery321.min.js"></script> -->
<script
			  src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
			  integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
			  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.js" integrity="sha512-sn/GHTj+FCxK5wam7k9w4gPPm6zss4Zwl/X9wgrvGMFbnedR8lTUSLdsolDRBRzsX6N+YgG6OWyvn9qaFVXH9w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script type="text/javascript">
  

var getJson;
var arquivoPDF;
var data = new Date;

function gerarPDF() {
  getJson = JSON.parse(localStorage.getItem('myJson'));

  // Capturar a primeira página como imagem
  html2canvas(document.getElementById("pagina1")).then(function (canvas1) {
    var img1 = canvas1.toDataURL("image/png");
    
    // Criar um novo documento PDF
    var doc = new jsPDF('p', 'pt', 'a4');
    
    // Adicionar a primeira imagem à primeira página
    doc.addImage(img1, 'JPEG', 20, 20, 700, 700);
    
    // Adicionar uma nova página (segunda página)
    doc.addPage();
    
    html2canvas(document.getElementById("pagina2")).then(function (canvas2) {
      var img2 = canvas2.toDataURL("image/png");
      
      // Adicionar a segunda imagem à segunda página
      doc.addImage(img2, 'JPEG', 20, 20, 700, 700);
      
      // Gere uma representação base64 do PDF diretamente
      arquivoPDF = doc.output('datauristring').split(',')[1]; // Obtém os dados após a vírgula
      
      // Atualize o objeto getJson com o PDF em formato base64
      getJson.arquivoTermo = arquivoPDF;
      doc.save();
      
      var delayInMilliseconds = 3000; // 3 segundos
      setTimeout(function() {
        enviarAPI(); // Envie para a API após gerar o PDF
      }, delayInMilliseconds);
    });
  });
}

    

function base64ToJson(base64String) {
  const json = Buffer.from(base64String, "base64").toString();
  return JSON.parse(json);
}


function enviarAPI(){
      
      getJson.nomeTermo = "Termo de Benefício";
      getJson.tipoOpcao = 5;
      getJson.nomePatrocinadora = "SEBRAEPREV";
      getJson.emailPatrocinadora = "";
			getJson.nomeParticipante = "<?php echo $_POST['participante']; ?>";
			getJson.cpf = "<?php echo $_POST['cpf']; ?>";
      getJson.nomeResponsavel = "Benefício";
      getJson.emailResponsavel = "beneficio@sebraeprev.com.br";
      getJson.residenteExterior = "<?php echo $_POST['opcaore']; ?>";
      getJson.nNif = "<?php echo $_POST['nif']; ?>";
      getJson.dataSaida = "<?php echo $_POST['dataSaida']; ?>";

      getJson.arquivoTermo = btoa(arquivoPDF);

      getJson.arquivoTermo = arquivoPDF;

      var arquivoEnviar = getJson;

      fetch('https://fusionhmg.sebraeprevidencia.com.br/fusion/services/termo-opcao-beneficio/novo', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(arquivoEnviar)
          })
          .then(response => response.json())
          .then(data => {
            console.log('retorno', data);
            window.confirm("Recebemos seu formulario, após a validação, você receberá por e-mail um link para assinatura eletrônica.");
          })
          .catch(error => {
            console.log('error', error);
          });
        }

    window.onload = (event) => {
          gerarPDF();
      };
      
      console.log(getJson);

    </script>
<style>
	body { font-family:"Arial"; margin-top:0; }
	.style1 {
		font-size: 14px;
		font-weight: bold;
	}
	.style3 {font-size: 11px}
	.style9 {
		font-size: 12px;
		font-weight: bold;
	}
	.style10 {font-size: 9px}
	.style16 {
		font-size: 7px;
		font-weight: bold;
	}
	.style19 {
		font-size: 18px;
		color: #666666;
	}
</style>
</head>

<body id="geraPDF">
<tbody>

<?php for ($i = 0; $i < 1; $i++){ ?>

<section id="pagina1">
  <table width="800" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="3">
        <div align="center" class="style1">
          <table width="750" height="73" border="0">
            <tr>
              <td width="744" height="69"><img src="images/logotopo.png" width="225" height="77" align="left" /></td>
              <td width="46"><a target="_self" href="javaScript:window.print()"><img src="impressora.png" alt="Imprimir" width="40" height="40" border="0" style='border: 0px; padding: 1px' /></a>&nbsp;</td>
            </tr>
          </table>
          <p>REQUERIMENTO DE BENEFÍCIO </p>
          <p>&nbsp;</p>
        </div>
      </td>
    </tr>
    <tr>
      <td width="227" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">
        &nbsp;<span class="style9">1.</span>
        <span class="style3">CNPB<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>20.040.028-83&nbsp;</strong></span>
        <span class="style3"><br /></span>
      </td>
      <td width="573" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">
        &nbsp;<span class="style9">2.</span>
        <span class="style3">Empresa Patrocinadora:<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $_POST['emp_pat']; ?></strong></span>
      </td>
    </tr>
  </table>
  <br />
  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="315" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">3.</span> <span class="style3">Nome completo do(a) participante: (Sem abrevia&ccedil;&otilde;es) <br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['participante']; ?></span></td>


    </tr>
  </table>
  <br />
  <table width="800" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="315" valign="top" class="style3" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">
            &nbsp;<span class="style9">4.</span> &nbsp;<span class="style3">Nome Completo do Requerente:<br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
            if (isset($_POST['mesmo']) && $_POST['mesmo'] == "mesmo") {
                echo $_POST['participante'];
            } else {
                echo $_POST['requerente'];
            }
            ?>
        </td>
    </tr>

  </table>
  <br />
  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="140" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">5.</span> <span class="style3">Data de Nascimento: <br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['dataNascimentoP']; ?></span></td>
      <td width="119" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">6.</span> <span class="style3">CPF:<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['cpf']; ?></span></td>
    <td width="127" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">7.</span> <span class="style3">Sexo: (&nbsp;
      <?php if ($_POST['sexo'] == "m") { echo "M"; }else{ echo "F"; }?>
      &nbsp;) <br />
      </span><span class="style10">&nbsp;M - Masculino
      &nbsp;F - Feminino </span></td>
    <td width="100" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">8.</span> <span class="style3">Identidade:<br />
      &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['identidade']; ?></span></td>
    <td width="137" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">9.</span> <span class="style3">Org&atilde;o Expedidor UF:
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['orgaoExp']; ?></span></td>
    </tr>
  </table>
  <br />
  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td width="193" height="33" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">
        &nbsp;<span class="style9">10.</span>
        <span class="style3">Parentesco:</span><br />
        <span class="style3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo isset($_POST['parentesco']) ? $_POST['parentesco'] : 'Nenhum parentesco informado'; ?></span>
    </td>

      <td width="607" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">11.</span> <span class="style3">E-mail:<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['email']; ?></span></td>
    </tr>
  </table>
  <br />
  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td  valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">12.</span> <span class="style3">Endere&ccedil;o Completo (logadouro, complemento) :<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['endCompleto']; ?></span></td>

    </tr>
  </table>
  <br />
  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="214" height="33" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">13.</span> <span class="style3">Bairro:<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['bairro']; ?></span></td>
      <td width="297" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">14.</span> <span class="style3">Cidade:<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['cidade']; ?></span></td>
      <td width="180" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">15.</span> <span class="style3">CEP:</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $_POST['cep']; ?></span><br />
      </td>
      <td width="107" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">16</span> <span class="style3">UF:<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['uf']; ?></span></td>
    </tr>
  </table>
  <br />
  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="182" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">17.</span> <span class="style3">Telefone(s) para Contato:<br />
    &nbsp;(DDD) - Residencial:<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['Tresidencial']; ?></span></td>
      <td width="189" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style3"><br />
        &nbsp;(DDD) - Comercial:<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['Tcomercial']; ?></span></td>
      <td width="225" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<br />
      <span class="style3">&nbsp;(DDD) - Celular:</span><span class="style10"><br/>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="style3"><?php echo $_POST['Tcelular']; ?></span> </td>
      <td width="204" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<br />
        <span class="style3">&nbsp;(DDD) - Outros: <br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['Toutros']; ?></span></td>
    </tr>
  </table>
  <script>
  console.log('JVYYXRE');
  console.log('23,9,12,12,11,5,18');
</script>
  <br />
  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="6" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;"><span class="style9">&nbsp;18.</span> <span class="style3">Beneficiário(s) (Pessoa que irá receber o benefício de pens&atilde;o por morte no caso de falecimento do Participante)</span><br/>
        <br/>
        <table width="688" border="0" style="margin-left:5px; border:solid 1px;">
          <tr class="style3">
        <td width="222" align="center" bgcolor="#EBEBEB">Beneficiário(s) </td>
        <td width="112" align="center" bgcolor="#EBEBEB">Grau de<br />Parentesco</td>
        <td width="151" align="center" bgcolor="#EBEBEB">Data de<br />Nascimento</td>
        <td width="73" align="center" bgcolor="#EBEBEB">Sexo<br />(M ou F)</td>
        <td width="222" align="center" bgcolor="#EBEBEB">E-mail</td>
        <td width="112" align="center" bgcolor="#EBEBEB">Estado Civil</td>
        <td width="106" align="center" bgcolor="#EBEBEB">Inv&aacute;lido<br />(S ou N)</td>
        <td width="151" align="center" bgcolor="#EBEBEB">CPF</td>
        <td width="222" align="center" bgcolor="#EBEBEB">Endere&ccedil;o</td>
        <td width="151" align="center" bgcolor="#EBEBEB">Bairro</td>
        <td width="151" align="center" bgcolor="#EBEBEB">Cidade</td>
        <td width="112" align="center" bgcolor="#EBEBEB">CEP</td>
        <td width="112" align="center" bgcolor="#EBEBEB">Telefone</td>
        <td width="151" align="center" bgcolor="#EBEBEB">Escolaridade</td>
          </tr>

          <tr>
            <td><span class="style3"><?php echo $_POST['nomed1']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['parentescod1']; ?><?php if($_POST['parentescod1']=="FILHO(A)"){ echo "<br><b> Declara ".$_POST['tipo_f1']."</b>";} ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['datad1']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['sexod1']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['emaild1']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['civild1']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['invalidod1']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cpfd1']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['enderecod1']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['bairrod1']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cidaded1']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cepd1']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['telefoned1']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['escolaridaded1']; ?></span></td>
          </tr>
          <tr>
            <td><span class="style3"><?php echo $_POST['nomed2']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['parentescod2']; ?><?php if($_POST['parentescod2']=="FILHO(A)"){ echo "<br><b> Declara ".$_POST['tipo_f2']."</b>";} ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['datad2']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['sexod2']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['emaild2']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['civild2']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['invalidod2']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cpfd2']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['enderecod2']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['bairrod2']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cidaded2']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cepd2']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['telefoned2']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['escolaridaded2']; ?></span></td>
          </tr>
          <tr>
            <td><span class="style3"><?php echo $_POST['nomed3']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['parentescod3']; ?><?php if($_POST['parentescod3']=="FILHO(A)"){ echo "<br><b> Declara ".$_POST['tipo_f3']."</b>";} ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['datad3']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['sexod3']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['emaild3']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['civild3']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['invalidod3']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cpfd3']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['enderecod3']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['bairrod3']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cidaded3']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cepd3']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['telefoned3']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['escolaridaded3']; ?></span></td>
          </tr>
          <tr>
            <td><span class="style3"><?php echo $_POST['nomed4']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['parentescod4']; ?><?php if($_POST['parentescod4']=="FILHO(A)"){ echo "<br><b> Declara ".$_POST['tipo_f4']."</b>";} ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['datad4']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['sexod4']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['emaild4']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['civild4']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['invalidod4']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cpfd4']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['enderecod4']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['bairrod4']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cidaded4']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cepd4']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['telefoned4']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['escolaridaded4']; ?></span></td>
          </tr>
          <tr>
            <td><span class="style3"><?php echo $_POST['nomed5']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['parentescod5']; ?><?php if($_POST['parentescod5']=="FILHO(A)"){ echo "<br><b> Declara ".$_POST['tipo_f5']."</b>";} ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['datad5']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['sexod5']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['emaild5']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['civild5']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['invalidod5']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cpfd5']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['enderecod5']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['bairrod5']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cidaded5']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cepd5']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['telefoned5']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['escolaridaded5']; ?></span></td>
          </tr>
          <tr>
            <td><span class="style3"><?php echo $_POST['nomed6']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['parentescod6']; ?><?php if($_POST['parentescod6']=="FILHO(A)"){ echo "<br><b> Declara ".$_POST['tipo_f6']."</b>";} ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['datad6']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['sexod6']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['emaild6']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['civild6']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['invalidod6']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cpfd6']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['enderecod6']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['bairrod6']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cidaded6']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cepd6']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['telefoned6']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['escolaridaded6']; ?></span></td>
          </tr>
          <tr>
            <td><span class="style3"><?php echo $_POST['nomed7']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['parentescod7']; ?><?php if($_POST['parentescod7']=="FILHO(A)"){ echo "<br><b> Declara ".$_POST['tipo_f7']."</b>";} ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['datad7']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['sexod7']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['emaild7']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['civild7']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['invalidod7']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cpfd7']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['enderecod7']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['bairrod7']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cidaded7']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cepd7']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['telefoned7']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['escolaridaded7']; ?></span></td>
          </tr>
          <tr>
            <td><span class="style3"><?php echo $_POST['nomed8']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['parentescod8']; ?><?php if($_POST['parentescod8']=="FILHO(A)"){ echo "<br><b> Declara ".$_POST['tipo_f8']."</b>";} ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['datad8']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['sexod8']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['emaild8']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['civild8']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['invalidod8']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cpfd8']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['enderecod8']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['bairrod8']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cidaded8']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['cepd8']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['telefoned8']; ?></span></td>
            <td align="center"><span class="style3"><?php echo $_POST['escolaridaded8']; ?></span></td>
          </tr>
      </table>
      <br /></td>
    </tr>
  </table>
  <br />
  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td valign="top" class="style3" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;
        <span class="style9">19. Requerimento do Benef&iacute;cio:</span>
        <br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Nos termos do Regulamento do Plano de Benef&iacute;cios SEBRAEPREV, venho requerer o benef&iacute;cio de:<br />
        <br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[ <?php if (isset($_POST['tipoAposentadoria']) && $_POST['tipoAposentadoria'] == "1") { echo "X"; } ?> ] - Aposentadoria Normal
        &nbsp;&nbsp;&nbsp;&nbsp;[ <?php if (isset($_POST['tipoAposentadoria']) && $_POST['tipoAposentadoria'] == "2") { echo "X"; } ?> ] - Aposentadoria Antecipada
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[ <?php if (isset($_POST['tipoAposentadoria']) && $_POST['tipoAposentadoria'] == "4") { echo "X"; } ?> ] - Pens&atilde;o por Morte
        &nbsp;&nbsp; &nbsp;&nbsp;[ <?php if (isset($_POST['tipoAposentadoria']) && $_POST['tipoAposentadoria'] == "3") { echo "X"; } ?> ] - Aposentadoria por Invalidez&nbsp;&nbsp;
        <br /><br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Encaminhar junto com o Requerimento de Benefício:</strong>&nbsp;
          <?php
          if (isset($_POST['tipoAposentadoria'])) {
            switch ($_POST['tipoAposentadoria']) {
              case "normal":
                echo "Cópia da identidade do Participante, Cópia da rescisão contratual e comprovante bancário.";
                break;
              case "antecipada":
                echo "Cópia da identidade do Participante e Cópia da rescisão contratual e comprovante bancário.";
                break;
              case "invalidez":
                echo "Cópia da identidade do Participante, Cópia autenticada da Carta de Concessão do INSS e Declaração de cessação do auxílio doença (emitido pelo Patrocinador) e comprovante bancário.";
                break;
              case "morte":
                echo "Cópia da certidão de óbito do Participante, Cópia da identidade do Participante, Cópia da identidade / certidão de nascimento (se menor) dos requerentes, Cópia da rescisão contratual e Certidão de casamento, se for o caso, e comprovante bancário.";
                break;
            }
          }
          ?>

        <p>
          <span class="style9"> &nbsp;&nbsp;20.</span>
          <span class="style9">Forma de recebimento  do Benef&iacute;cio: </span>
          &nbsp;<br />
          <br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[ <?php if ($_POST['xim'] == "xim") { echo "X"; } ?> ] - Receber
          <strong><?php if ($_POST['xim'] == "xim") {  echo $_POST['porct']; }?></strong> da Reserva Individual de Participante (máximo de 25%) em parcela única  e o restante conforme assinalado a seguir:
        </p>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[ <?php  echo ($_POST['rendaMensal'] == "rendaM1") ? "X" : ""; ?> ] - Renda mensal, em número constante de quotas, por um período de
        <strong><?php  echo ($_POST['rendaMensal'] == "rendaM1") ? $_POST['rendaM1ano'] : ""; ?></strong> (no mínimo 5 anos e no máximo 20 anos).
        <br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[ <?php echo ($_POST['rendaMensal'] == "rendaM2") ? "X" : ""; ?> ] - Renda mensal correspondente à aplicação de um percentual de
        <strong><?php echo ($_POST['rendaMensal'] == "rendaM2") ? $_POST['rendaM2pc'] : ""; ?></strong> (mínimo de 0,1% e máximo de 2%).
        <br>
        <?php
        if ($_POST['rendaMensal'] == "rendaM2"){
        ?>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php
if (isset($_POST['tipo_m2x'])) {
    if ($_POST['tipo_m2x'] == "com") {
        echo "[X] - Renda expressa em valor monetário fixo, calculada anualmente no mês de junho.";
    } else {
        echo "[ ] - Renda expressa em valor monetário fixo, calculada anualmente no mês de junho.";
    }
} else {
    echo "[ ] - Renda expressa em valor monetário fixo, calculada anualmente no mês de junho.";
}
?>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[
<?php
if (isset($_POST['tipo_m2x'])) {
    if ($_POST['tipo_m2x'] == "sem") {
        echo "X] - Valor mensalmente ajustado de acordo com o percentual escolhido pelo Participante aplicado sobre o saldo remanescente de sua Reserva Individual de Participante.";
    } else {
        echo " ] - Valor mensalmente ajustado de acordo com o percentual escolhido pelo Participante aplicado sobre o saldo remanescente de sua Reserva Individual de Participante.";
    }
} else {
    echo " ] - Valor mensalmente ajustado de acordo com o percentual escolhido pelo Participante aplicado sobre o saldo remanescente de sua Reserva Individual de Participante.";
}
?>
<br>

        <?php if ($_POST['rendaMensal'] == "pUnica") { ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[X] - Parcela Única.
            <strong><?php echo isset($_POST['rendaUni']) ? $_POST['rendaUni'] : ''; ?></strong>
        <?php } ?>

        <?php
        }
        ?>
        <p>
          <span class="style9">
          &nbsp;&nbsp;21.</span>
          <span class="style9">Dados banc&aacute;rios para o pagamento do benef&iacute;cio:</span>
          <span class="style16">&nbsp;</span>
        </p>
        <table width="701" height="60" border="1" align="center" bordercolor="#666666" bgcolor="#F8F8F8" style="border:none;">
          <tr>
            <td width="372"><strong>&nbsp;Banco: (N&ordm; e    Nome) </strong><span class="style10">(Preferencialmente Banco do Brasil</span> )</td>
            <td width="72"><strong>&nbsp;Ag&ecirc;ncia n&ordm;:</strong></td>
            <td width="115"><strong>&nbsp;N&ordm; Conta</strong></td>
            <td width="114"><strong>Tipo de Conta</strong></td>
          </tr>
          <tr>
            <td><?php echo $_POST['banco']; ?></td>
            <td><?php echo $_POST['agencia']; ?></td>
            <td><?php echo $_POST['conta']; ?></td>
            <td>
              &nbsp;[ <?php if($_POST['tconta'] == "pp") { echo "X"; } ?> ] - Poupan&ccedil;a<br />
              &nbsp;[ <?php if($_POST['tconta'] == "cc") { echo "X"; } ?> ]&nbsp;- Conta Corrente<strong></strong>
            </td>
          </tr>
          <?php
$opcao = "Nao"; // Valor padrão para a primeira pergunta
$opcao3 = "Nao"; // Valor padrão para a segunda pergunta
$factanif = ""; // Inicializa o NIF como vazio
$opcaore = "Nao"; // Valor padrão para a terceira pergunta

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se a opção "Você é uma pessoa Politicamente Exposta?" foi selecionada
    if (isset($_POST["opcao"])) {
        $opcao = $_POST["opcao"];
    }

    // Verifica se a opção "Você é reportável a FATCA?" foi selecionada
    if (isset($_POST["opcao3"])) {
        $opcao3 = $_POST["opcao3"];
        // Verifica se o campo NIF foi preenchido
        if (isset($_POST["nif"])) {
            $factanif = $_POST["nif"];
        }
    }

    // Verifica se a opção "Você é residente no exterior?" foi selecionada
    if (isset($_POST["opcaore"])) {
        $opcaore = $_POST["opcaore"];
    }
}
?>

<!-- Em seguida, exibe as informações no formato desejado na tabela HTML -->
<tr>
  <td colspan="3">Você é uma pessoa Politicamente Exposta?</td>
  <td><?php echo $opcao; ?></td>
</tr>
<tr>
  <td colspan="3">Você é reportável a FATCA?</td>
  <td><?php echo $opcao3; ?></td>
</tr>
<tr>
  <td colspan="3">NIF: <?php echo $factanif; ?></td>
</tr>
<tr>
  <td colspan="3">Você é residente no exterior?</td>
  <td><?php echo $opcaore; ?></td>
</tr>


        </table>
        <br /><!-- -->
      </td>
    </tr>
  </table>
</section>
<br />
<br /><br/><br/><br /><br/><br /><br/><br /><br/><br /><br/><br/><br /><br/><br /><br/>
<section id="pagina2">
  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td valign="top" class="style3" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp; <span class="style9">TERMO DE OP&Ccedil;&Atilde;O POR PERFIL DE INVESTIMENTO</span><br /><br />

  <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">

    <tr>
      <td width="28%" height="31" class="style55">
    [ <?php if ($_POST['perfilInvestimento'] == "conservador") { echo "X";}  ?> ]
      CONSERVADOR
      </td>
      <td width="40%">
      [ <?php  if ($_POST['perfilInvestimento'] == "moderado") { echo "X";} ?> ]
      SEBRAEPREV (MODERADO)

      </td>
      <td width="32%">
      <!-- Arrojado -->

      </td>
    </tr>
    <tr>
      <td colspan="3" class="style55" style="text-align:justify">
      <br />
      DECLARAÇÃO DE RESPONSABILIDADE:<br>
  <br>

  Declaro que minha opção foi feita de forma livre, isenta e consciente, tendo sido precedida da disponibilização de todas as informações sobre o Perfil de Investimento escolhido, bem como do esclarecimento de todas as dúvidas por mim apresentadas perante o SEBRAE PREVIDÊNCIA  Instituto SEBRAE de Seguridade Social, de forma que assumo integral e exclusiva responsabilidade pelos riscos envolvidos na aplicação dos recursos alocados na Reserva Individual de  Participante, de acordo com o Perfil de Investimento ora escolhido.<br />
  <br>
  <br>
  ADVERTÊNCIAS:<br />
  <p>&Eacute;  vedada a ado&ccedil;&atilde;o do Perfil Arrojado para a Reserva Individual de Participante  ap&oacute;s a concess&atilde;o de Benef&iacute;cio de Presta&ccedil;&atilde;o Continuada ao Participante ou aos  seus Benefici&aacute;rios, conforme o caso.</p>
  <p>Quando  da concess&atilde;o do Benef&iacute;cio de Pens&atilde;o por Morte, n&atilde;o havendo consenso entre os  Benefici&aacute;rios do Participante falecido, em atividade ou j&aacute; na condi&ccedil;&atilde;o de  Assistido, a respeito da op&ccedil;&atilde;o pelo perfil de investimentos, ser&aacute; adotado  necessariamente o Perfil Conservador. </p>

  Não há garantia de rentabilidade em qualquer dos Perfis de Investimento oferecidos, sendo possível a verificação de rentabilidade negativa em determinado período, havendo maior probabilidade de perdas financeiras nos Perfis de Investimento com maior alocação no segmento de renda variável.<br>
  <br>

  A maior rentabilidade obtida por determinado Perfil de Investimento em período anterior à esta opção não leva à certeza de boa rentabilidade futura.<br>
  <br>

  A escolha de determinado Perfil de Investimento resultará em rentabilidade diversa daquela decorrente da opção por outro Perfil de Investimento, o que terá consequência direta no valor do próprio Benefício assegurado pelo Plano SEBRAEPREV.<br>



      </td>
      </tr>
    <tr>
      <td colspan="3"><br />
  <br />
  <br />
  <div align="center">________________________________________________<br>

                              <span class="style57">Assinatura do requerente<br />
  <br />
  É necessário reconhecer firma neste documento</span> </div>
      </td>
      </tr>
  </table>
  </td>
    </tr>
  </table>
  <div style="page-break-before:always;"></div>
  <table width="800" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="4" align="center" class="style1"><p>DECLARAÇÃO DE DEPENDENTES PARA FINS DE IMPOSTO DE RENDA</p></td>
    </tr>

  </table>
  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr></tr>
  </table>
  <br />
  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">
            &nbsp; <span class="style3">Em obediência à legislação do Imposto de Renda, venho pela presente informar que tenho como encargos da família, as pessoas abaixo relacionadas:<br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <table width="692" border="0" style="margin-left:20px; border:solid 1px;">
                <tr class="style3">
                    <td width="301" align="center" bgcolor="#EBEBEB">Dependente (s) Nome Completo:</td>
                    <td width="125" align="center" bgcolor="#EBEBEB">Data de Nascimento:</td>
                    <td width="89" align="center" bgcolor="#EBEBEB">Sexo:<br />
                      (M ou F)</td>
                    <td width="157" align="center" bgcolor="#EBEBEB">Código de Dependência:</td>
                </tr>
                <?php
                $hasDependents = false;

                for ($i = 2; $i <= 9; $i++) {
                    if (!empty($_POST['nomec' . $i]) && !empty($_POST['datac' . $i]) && !empty($_POST['sexoc' . $i]) && !empty($_POST['coD' . ($i - 1)])) {
                        $hasDependents = true;
                        break; // Se encontrou pelo menos um dependente, sair do loop.
                    }
                }

                if (!$hasDependents) {
                ?>
                    <tr>
                        <td valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">
                            <span class="style9">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>[ X ]</strong>&nbsp;&nbsp; NÃO TENHO DEPENDENTES PARA FINS DE IMPOSTO RENDA.<br /> </span>
                        </td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <?php } else { ?>
                    <?php for ($i = 2; $i <= 9; $i++) { ?>
                        <?php if (!empty($_POST['nomec' . $i]) && !empty($_POST['datac' . $i]) && !empty($_POST['sexoc' . $i]) && !empty($_POST['coD' . ($i - 1)])) { ?>
                            <tr>
                                <td><span class="style3"><?php echo $_POST['nomec' . $i]; ?></span></td>
                                <td align="center"><span class="style3"><?php echo $_POST['datac' . $i]; ?></span></td>
                                <td align="center"><span class="style3"><?php echo $_POST['sexoc' . $i]; ?></span></td>
                                <td align="center"><span class="style3"><?php echo $_POST['coD' . ($i - 1)]; ?></span></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </table>
    <br />
</td>

    </tr>
  </table>
  <br />
  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td valign="top" class="style3" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp; <span class="style9">Declara&ccedil;ões Gerais:</span>
        <p align="justify">Declaro, sob as penas da lei, que as informações aqui prestadas são verdadeiras, não cabendo ao SEBRAE Previdência - Instituto SEBRAE de Seguridade Social  qualquer responsabilidade perante a fiscalização. Comprometo-me a informar prontamente ao SEBRAE Previdência, por escrito, qualquer alteração nos dados acima declarados.<br><br>
  Declaro, também, ter ciência de que o Plano SEBRAEPREV é classificado na modalidade de Contribuição Definida, nos termos previstos nas normas em vigor, e que nesta modalidade não há benefícios vitalícios. Uma vez iniciados os pagamentos de quaisquer dos Benefícios de Prestação Continuada, os mesmos serão devidos até a data em que não houver saldo mínimo suficiente para a continuidade de seu pagamento.<br><br>
  <p align="justify" style="color: red">PRAZO DE PAGAMENTO: Os pagamentos relativos aos benefícios serão realizados até o 5º (quinto) dia útil do mês subsequente ao Mês de Competência de Benefício (MCB). Entende-se como Mês de Competência de Benefício (MCB) o mês subsequente ao da data do recebimento do requerimento efetivamente protocolado no SEBRAE PREVIDÊNCIA (Artigos 60 e 66 do Regulamento do Plano SEBRAEPREV).</p>
  <p align="justify" style="">O pagamento da concessão do benefício no prazo regulamentar, está condicionada ao recebimento do requerimento no SEBRAE PREVIDÊNCIA adequadamente preenchido, assinado e com os respectivos anexos.<br><br>
  Comprovante bancário: Qualquer documento ou imagem do cartão, de origem da instituição financeira que contenha os dados bancários. ATENÇÃO: não encaminhar imagem do código de segurança no verso do Cartão.  Ex de comprovante bancário: cabeçalho do extrato da conta, foto da frente do cartão.</p>
        <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bras&iacute;lia ,&nbsp;
          <?php $data = date("d / m / Y"); echo "$data."; ?>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;___________________________________________________<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;                &nbsp;        &nbsp;&nbsp;&nbsp;      &nbsp;Assinatura do requerente<br /><br />

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&Eacute; necess&aacute;rio reconhecer firma neste documento)
          <br />
      </p></td>
    </tr>
  </table>
  <br />

  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">&nbsp;</span><span class="style9">Manifesta&ccedil;&atilde;o Patrocinadora: </span><span class="style3"><br />
        <br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Atestamos o [ &nbsp;&nbsp;] <strong>afastamento</strong> [ &nbsp;&nbsp;] <strong>desligamento</strong> do funcion&aacute;rio supracitado em ______ / ______ / __________. <br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Motivo do afastamento ou desligamento:<br />
        <br />
        ____________________________________________________________________________________________________________________________________</span><span class="style3"><br />
      </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3">Local e Data:</span></strong> <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3">Carimbo e Assinatura: </span></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</td>
    </tr>
  </table>
  <br />
  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">&nbsp;</span><span class="style9">Reservado &agrave; diretoria de Seguridade do SEBRAE PREVID&Ecirc;NCIA: </span><span class="style3"><br />
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="36%" height="30" valign="bottom" class="style3">Data de recebimento dos documentos:</td>
            <td width="64%" valign="bottom" class="style3">______/_____________/_______</td>
          </tr>
          <tr>
            <td height="30" valign="bottom" class="style3">Data de In&iacute;cio do Benef&iacute;cio - DIB</td>
            <td height="30" valign="bottom" class="style3">______/_____________/_______</td>
          </tr>
          <tr>
            <td height="30" valign="bottom" class="style3">Indeferimento / Motivo:</td>
            <td height="30" valign="bottom" class="style3">________________________________________________________</td>
          </tr>
          <tr>
            <td height="30" valign="bottom" class="style3">&nbsp;</td>
            <td height="30" valign="bottom" class="style3">&nbsp;</td>
          </tr>
          <tr>
            <td height="46" valign="middle" class="style3">Local e Data: _____/_____/_____</td>
            <td height="46" align="center" valign="bottom" class="style3">______________________________<br />
            Assinatura e Carimbo</td>
          </tr>
        </table>
        <br />
      </td>
    </tr>
  </table>
</section>
<? if ($i < 2) { ?>
<!-- <div style="page-break-before:always;"></div> -->
<? } ?>
<?php } ?>
</tbody>
</body>
</html>
