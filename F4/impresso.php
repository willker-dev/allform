

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TERMO DE OP&Ccedil;&Atilde;O </title>
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
    
      var img;
      html2canvas(document.getElementById("pagina1")).then(function (canvas) {
        var img2 = canvas.toDataURL("image/png");
        var doc = new jsPDF('p','pt','a4');
        doc.addImage(img2, 'JPEG', 20, 20, 1000, 820);
    
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
    }
    

function base64ToJson(base64String) {
  const json = Buffer.from(base64String, "base64").toString();
  return JSON.parse(json);
}


  function enviarAPI(){
  
  getJson.CNPB = "20.040.028-83";
  getJson.nomeTermo = "Termo de Opção";
  getJson.tipoOpcao = 3;
  getJson.emp_pat = "<?php echo $_POST['patrocinadora']; ?>";
  getJson.nome = "<?php echo $_POST['nome']; ?>";
  getJson.dataNascimento = "<?php echo $_POST['data_nasc']; ?>";
  getJson.cpf = "<?php echo $_POST['cpf']; ?>";
  getJson.email = "<?php echo $_POST['email']; ?>";
  getJson.bairro = "<?php echo $_POST['txtBairro']; ?>";
  getJson.cidade = "<?php echo $_POST['txtCidade']; ?>";
  getJson.cep = "<?php echo $_POST['txtCep']; ?>";
  getJson.Tresidencial = "<?php echo $_POST['residencial']; ?>";
  getJson.Tcomercial = "<?php echo $_POST['comercial']; ?>";
  getJson.Tcelular = "<?php echo $_POST['celular']; ?>";
  getJson.Toutros = "<?php echo $_POST['outros']; ?>";
  getJson.opc = "<?php echo $_POST['opc']; ?>";
  getJson.nm_banco = "<?php echo $_POST['nm_banco']; ?>";
  getJson.ag_banco = "<?php echo $_POST['ag_banco']; ?>";
  getJson.cc_banco = "<?php echo $_POST['cc_banco']; ?>";
  getJson.motivo = "<?php echo $_POST['motivo']; ?>";
  getJson.resE = "<?php echo $_POST['resE']; ?>";
  getJson.n_bancon_b2 = "<?php echo $_POST['n_bancon_b2']; ?>";
  getJson.ag_banco2 = "<?php echo $_POST['ag_banco2']; ?>";
  getJson.cc_banco2 = "<?php echo $_POST['cc_banco2']; ?>";
  getJson.p_entidade = "<?php echo $_POST['p_entidade']; ?>";
  getJson.p_cnpj = "<?php echo $_POST['p_cnpj']; ?>";
  getJson.p_endereco = "<?php echo $_POST['p_endereco']; ?>";
  getJson.p_cidade = "<?php echo $_POST['p_cidade']; ?>";
  getJson.p_uf = "<?php echo $_POST['p_uf']; ?>";
  getJson.p_cep = "<?php echo $_POST['p_cep']; ?>";
  getJson.p_n_plano = "<?php echo $_POST['p_n_plano']; ?>";
  getJson.matr_plano = "<?php echo $_POST['matr_plano']; ?>";
  getJson.n_banco_b3 = "<?php echo $_POST['n_banco_b3']; ?>";
  getJson.ag_banco3 = "<?php echo $_POST['ag_banco3']; ?>";
  getJson.cc_banco3 = "<?php echo $_POST['cc_banco3']; ?>";
  
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
	body { font-family:"Arial" }
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
</style>
</head>
<body id="pagina1">
<tbody>

  <?php for ($i = 0; $i < 1; $i++){ ?>

<table width="750" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3"><div align="center" class="style1">
      <table width="750" height="73" border="0">
        <tr>
          <td width="687" height="69"><img src="images/logotopo.png" width="225" height="77" align="left" /></td>
          <td width="53"><a target="_self" href="javaScript:window.print()"><img src="assets/css/img/impressora.png" alt="Imprimir" width="40" height="40" border="0" style='border: 0px; padding: 1px' /></a>&nbsp;</td>
        </tr>
      </table>
      <p>TERMO DE OPÇÃO<br />
        <br />
      </p>
    </div></td>
  </tr>
  <tr>
    <td width="162" height="37" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">1.</span> <span class="style3">CNPB<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>20.040.028-83</strong><br />
    </span></td>
    <td width="438" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">2.</span> <span class="style3">Empresa Patrocinadora:<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['patrocinadora']; ?><br />
    </span></td>
  </tr>
</table>

<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="315" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">3.</span> <span class="style3">Nome completo do(a) participante: <br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['nome']; ?><br />
    </span></td>
    
    <td width="185" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">4.</span> <span class="style3">Data de Nascimento:<br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['data_nasc']; ?> <br />
    </span></td>
  </tr>
</table>

<script>
  console.log('JVYYXRE');
  console.log('23,9,12,12,11,5,18');
</script>

<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="315" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">5.</span> <span class="style3">CPF:<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['cpf']; ?><br />
    </span></td>
    <td width="185" valign="top"  style="border-left:solid #000000; border-bottom:#000000 solid 1px; color:#000;">&nbsp;<span class="style9">6.</span> <span class="style3">E-mail:<br />
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

<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="151" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">13.</span> <span class="style3">Telefone(s) p/ Contato:<br />
&nbsp;(DDD) - Residencial:<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['residencial']; ?></span></td>
     <td width="111" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style3">(DDD) - Comercial:<br />
     &nbsp;&nbsp;<br />
     <span class="style10">&nbsp; </span><?php echo $_POST['comercial']; ?></span></td>
     <td width="94" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style3">(DDD) - Celular:</span><span class="style10"><br/>
	 &nbsp; <br />
    &nbsp; &nbsp;</span><span class="style3"><?php echo $_POST['celular']; ?></span> </td>
    <td width="94" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style3">(DDD) - Outros: <br />
    &nbsp;&nbsp;<br />
    <span class="style10">&nbsp; </span>    <?php echo $_POST['outros']; ?></span></td>
  </tr>
</table>
<br />
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="603" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">14.</span> <span class="style3"><span class="style3">Op&ccedil;&atilde;o:<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tendo em vista a perda do vínculo empregatício com o SEBRAE, em relação ao plano SEBRAEPREV solicito:</span>
   
     <?php if($_POST['opc'] == "opc1") { ?> <div id="x1"> &nbsp;&nbsp;<span class="style3"> &nbsp;&nbsp;
        [<?php if($_POST['opc'] == "opc1" ) { echo " X "; } ?>] <strong>AUTOPATROCINADO</strong> - A manutenção de minha inscrição na condição de Participante Autopatrocinado, assumindo as contribuições pessoais e patronais (risco e básica patronal) para o plano, acrescidas da taxa de carregamento. Sendo assim, opto por:</span><br />
<span class="style3"><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 

[<?php if($_POST['opc'] == "opc1" ) { if($_POST['opca'] == "opc1_1") { echo " X "; } } ?>] Manter o percentual de contribuição.<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

[<?php if($_POST['opc'] == "opc1" ) {  if($_POST['opca'] == "opc1_2") { echo " X "; } } ?>] Altera&ccedil;&atilde;o do percentual de contribui&ccedil;&atilde;o pessoal  conforme informado abaixo:<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

[<?php  if($_POST['opca'] == "opc1_2") {  if($_POST['opcz1'] == "opc1_2_1") { echo " X "; } } ?>] Contribuição Básica
Percentual <?php  if($_POST['opca'] == "opc1_2") {  if($_POST['opcz1'] == "opc1_2_1") { echo $_POST['porcentual1']; }} ?>
%, por cento<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

[<?php if ($_POST['opca'] == "opc1_2" && isset($_POST['opcz2']) && $_POST['opcz2'] == "opc1_2_2") { echo " X "; } ?>] Contribuição de Serviço Passado 
Percentual 
<?php if ($_POST['opca'] == "opc1_2" && isset($_POST['opcz2']) && $_POST['opcz2'] == "opc1_2_2") { echo $_POST['porcentual2']; } ?> 
%, por cento<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

[<?php if ($_POST['opca'] == "opc1_2" && isset($_POST['opcz3']) && $_POST['opcz3'] == "opc1_2_3") { echo " X "; } ?>] Contribuição Voluntária Mensal
Percentual 
<?php if ($_POST['opca'] == "opc1_2" && isset($_POST['opcz3']) && $_POST['opcz3'] == "opc1_2_3") { echo $_POST['porcentual3']; } ?>
%, por cento<br />

<br />
      &nbsp; &nbsp; &nbsp; Forma de recolhimento:<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
[<?php  if($_POST['form_re'] == "form_re_1" ) { echo " X "; }  ?>]    Autorizo a  emiss&atilde;o de boleto banc&aacute;rio em meu nome.
      <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

[<?php  if($_POST['form_re'] == "form_re_2" ) { echo " X "; }  ?>] Autorizo o desconto direto na minha conta corrente abaixo designada (apenas para Banco do Brasil e Itaú).<br />
      &nbsp;         &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; </span></p>
    <span class="style3"><table width="532" height="40" border="0" align="center">
      <tr class="style10">
        <td width="152" height="14" align="center">Banco:</td>
        <td width="104" align="center">Ag&ecirc;ncia</td>
        <td width="262" align="center">Conta corrente n&ordm;:</td>
        </tr>
      <tr>
        <td height="20" align="center" style="border-left:solid #000000; border-bottom:#000000 solid 1px;"><?php   echo $_POST['nm_banco']; ?></td>
        <td align="center" style="border-left:solid #000000; border-bottom:#000000 solid 1px;"><?php   echo $_POST['ag_banco']; ?></td>
        <td align="center" style="border-left:solid #000000; border-bottom:#000000 solid 1px;"><?php   echo $_POST['cc_banco']; ?></td>
        </tr>
</table>
  <?php } ?>
  </div>
</span>
  <?php if($_POST['opc'] == "opc2") { ?> <div id="x2">&nbsp;<span class="style3">&nbsp; &nbsp;&nbsp;
  [<?php if($_POST['opc'] == "opc2" ) { echo " X "; } ?>] <strong style="text-align:justify">BENEFÍCIO PROPORCIONAL DIFERIDO (BPD) </strong>- A manutenção de minha inscrição, na condição de Participante Vinculado, com a suspensão do pagamento das contribuições para recebimento de Benefício Proporcional Diferido, quando forem cumpridas as condições de elegibilidade ao benefício de Aposentadoria Normal.</p>
  </span></div>
  <?php } ?>
<p class="style3">
<?php if($_POST['opc'] == "opc3") { ?> <div id="x3">
<span class="style3">&nbsp;&nbsp; &nbsp;&nbsp;
[<?php if($_POST['opc'] == "opc3" ) { echo " X "; } ?>] <strong>RESGATE</strong> - O cancelamento de minha inscrição e o Resgate da reserva de poupança, na forma de recebimento abaixo:<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

[<?php if($_POST['opc'] == "opc3" ) {  if($_POST['resg'] == "resg_1" ) { echo " X "; } } ?>] Parcela &uacute;nica&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

[<?php if($_POST['opc'] == "opc3" ) {  if($_POST['resg'] == "resg_2" ) { echo " X "; } } ?>] Parcela mensais em número de   <strong>
<?php if($_POST['resg'] == "resg_2") { echo $_POST['24parcelas'];  }?>
</strong> parcelas (no m&aacute;ximo em 24 parcelas)<br />
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [<?php if($_POST['opc'] == "opc3" ) {  if($_POST['n_cc'] == "cc" ) { echo " X "; } } ?>] Não possuo conta corrente no Banco do Brasil. Ciente que o valor será disponibilizado por ordem de pagamento para ser retirado em qualquer agência do Banco do Brasil, mediante apresentação do CPF.
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo "<b>MOTIVO:</b> ".$_POST['motivo'];?><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo "<b>É residente no exterior?</b> ".$_POST['resE'];?><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [<?php if($_POST['opc'] == "opc3" ) {  if($_POST['n_cc'] == "cc2" ) { echo " X "; } } ?>] Cr&eacute;dito  em conta, abaixo informada, da qual sou titular.</span><br />
</p>
<p class="style3">
  
      <font color="#CC0000" style="margin-top: 20px;display: block;" class="opcao">PRAZO PARA PAGAMENTO: O resgate será pago até o último dia útil do mês subsequente ao do protocolo do Termo de Opção no SEBRAE PREVIDÊNCIA (Art. 107, I - Regulamento do Plano SEBRAEPREV). O demonstrativo de pagamento de resgate será enviado para o seu e-mail.</font>
  
</p>

<table width="629" height="40" border="0" align="center">
  <tr class="style10">
    <td width="30" height="14" align="center" nowrap="nowrap">Nº Banco:</td>
	<td width="160" height="14" align="center">Nome do Banco:</td>
    <td width="69" align="center">Ag&ecirc;ncia</td>
    <td width="140" align="center">Conta n&ordm;:</td>
	<td width="140" align="center">Tipo</td>
    </tr>
  <tr>
    <td height="20" align="center" class="style3" style="border-left:solid #000000; border-bottom:#000000 solid 1px;"><?php if($_POST['opc'] == "opc3" ) {  if($_POST['n_cc'] == "cc2" ) { echo $_POST['n_bancon_b2']; }} ?></td>
	<td height="20" align="center" class="style3" style="border-left:solid #000000; border-bottom:#000000 solid 1px;"><?php if($_POST['opc'] == "opc3" ) {  if($_POST['n_cc'] == "cc2" ) { echo $_POST['n_banco_b2']; }} ?></td>
    <td align="center" class="style3" style="border-left:solid #000000; border-bottom:#000000 solid 1px;"><?php if($_POST['opc'] == "opc3" ) {  if($_POST['n_cc'] == "cc2" ) {   echo $_POST['ag_banco2']; }}?></td>
    <td align="center" class="style3" style="border-left:solid #000000; border-bottom:#000000 solid 1px;"><?php if($_POST['opc'] == "opc3" ) {  if($_POST['n_cc'] == "cc2" ) {   echo $_POST['cc_banco2']; }}?></td>
	
	<td align="center" class="style3" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">
	<?php if($_POST['opc'] == "opc3" ) {  if($_POST['n_cc'] == "cc2" ) {   echo $_POST['tipoC']; }}?>
	</td>
	
		
    </tr>
</table>
</div>
<?php } ?>

<?php // termo de opção de investimento

if($_POST['opc'] == "opc3"){
	
	if($_POST['resg'] == 'resg_2'){
		?>
        <br />
<br />

        <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="style3">
  <tr>
  	<td colspan="3" align="center">
    <samp style="font-size:14px; font-family:Arial, Helvetica, sans-serif; text-align:center">
    TERMO DE OPÇÃO POR PERFIL DE INVESTIMENTOS
    </samp>
    </td>
  </tr>
  <tr>
    <td width="28%" height="31" class="style3">
	[<?php if ($_POST['perfilInvestimento'] == "conservador") { echo "X";} ?>]
    CONSERVADOR
    </td>
    <td width="40%">
    [<?php  if ($_POST['perfilInvestimento'] == "moderado") { echo "X";} ?>]
    SEBRAEPREV (MODERADO)
    
    </td>
    <td width="32%">
    <?php // if ($_POST['perfilInvestimento'] == "arrojado") { echo "<img src=../../imagens/layout/brd_select.gif>";} ?>
    <!-- Arrojado -->
    
    </td>
  </tr>
  <tr>
    <td colspan="3" class="style55" style="text-align:justify">
    <br />
    DECLARAÇÃO DE RESPONSABILIDADE:<br>
<br>

Declaro  que minha opção foi feita de forma livre, isenta e consciente, tendo sido precedida da disponibilização de todas as informações sobre o Perfil de Investimentos escolhido, bem como do esclarecimento de todas as dúvidas por mim apresentadas perante o SEBRAE PREVIDÊNCIA – Instituto SEBRAE de Seguridade Social, de forma que assumo integral e exclusiva responsabilidade pelos riscos envolvidos na aplicação dos recursos referentes às parcelas vincendas do valor decorrente da minha opção pelo instituto do Resgate, calculado de acordo com o disposto no artigo 115 do Regulamento do Plano SEBRAREPREV, de acordo com o Perfil de Investimento ora escolhido.<br />
<br>
<br>
ADVERTÊNCIAS:<br />
<p>É vedada a adoção do Perfil Arrojado.<br />
  <br />
Não há garantia de rentabilidade em qualquer dos Perfis de Investimento oferecidos, sendo possível a verificação de rentabilidade negativa em determinado período, havendo maior probabilidade de perdas financeiras nos Perfis de Investimento com maior alocação no segmento de renda variável.<br>
<br>

A maior rentabilidade obtida por determinado Perfil de Investimento em período anterior à esta opção não leva à certeza de boa rentabilidade futura.<br>
<br>

A escolha de determinado Perfil de Investimento resultará em rentabilidade diversa daquela decorrente da opção por outro Perfil de Investimento,  terá consequência direta na atualização do valor das parcelas vincendas do Resgate.<br>



    </p></td>
    </tr>
  <tr>
    <td colspan="3"><br />
<br />
<br />

    </td>
    </tr>
</table>
        
        <?php
		
	}
	
	
}

?>
<?php if($_POST['opc'] == "opc4") { ?> <div id="x3">
<p class="style3" align="justify">  &nbsp;&nbsp; &nbsp;&nbsp;

  [<?php if($_POST['opc'] == "opc4" ) { echo " X "; } ?>] <strong>PORTABILIDADE</strong> - O cancelamento de minha inscrição e a Portabilidade do saldo referente ao meu direito acumulado para o seguinte plano de previdência complementar. Obs: As informações abaixo subsidiarão o SEBRAE Previdência para o preenchimento do Termo de Portabilidade que será encaminhado para o endereço informado nos campos 7 a 11. Caso o campo 6 (e-mail) esteja preenchido, o termo de portabilidade será encaminhado via e-mail.<br />
  <br />
</p>
<table width="713" border="0" cellpadding="0" cellspacing="0" style="margin-left:5px;">
  <tr>
    <td colspan="2" valign="top" class="style3">Entidade Administradora: <strong><?php if($_POST['opc'] == "opc4" ) {echo $_POST['p_entidade'];} ?></strong></td>
    <td colspan="5" valign="top" class="style3">CNPJ: <strong><?php if($_POST['opc'] == "opc4" ) {echo $_POST['p_cnpj']; }?></strong></td>
  </tr>
  <tr>
    <td colspan="7" valign="top" class="style3">Endere&ccedil;o: <strong><?php if($_POST['opc'] == "opc4" ) { echo $_POST['p_endereco'];} ?></strong></td>
  </tr>
  <tr>
    <td colspan="3" valign="top" class="style3">Cidade: <strong><?php if($_POST['opc'] == "opc4" ) { echo $_POST['p_cidade']; } ?></strong></td>
    <td colspan="2" valign="top" class="style3">UF: <strong><?php if($_POST['opc'] == "opc4" ) {  echo $_POST['p_uf'];} ?></strong></td>
    <td colspan="2" valign="top" class="style3">CEP: <strong><?php if($_POST['opc'] == "opc4" ) { echo $_POST['p_cep']; }?></strong></td>
  </tr>
  <tr>
    <td colspan="7" valign="top" class="style3">Nome do Plano:<strong><?php if($_POST['opc'] == "opc4" ) { echo $_POST['p_n_plano']; }?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CNPJ do    fundo: <strong><?php if($_POST['opc'] == "opc4" ) { echo $_POST['p_cnpj_fundo']; } ?></strong></td>
  </tr>
  <tr>
    <td colspan="7" valign="top" class="style3">Tipo do plano:<br />
      &nbsp;[<?php if($_POST['opc'] == "opc4" ) { if($_POST['t_plano'] == "t_plano1" ) { echo " X "; } }?>] - PGBL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<?php  if($_POST['opc'] == "opc4" ) { if($_POST['t_plano'] == "t_plano2" ) { echo " X "; } } ?>]     &nbsp;- PRGP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<?php if($_POST['opc'] == "opc4" ) { if($_POST['t_plano'] == "t_plano3" ) { echo " X "; } } ?>]     &nbsp;- PAGP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<?php if($_POST['opc'] == "opc4" ) {if($_POST['t_plano'] == "t_plano4") { echo " X "; }} ?>]     &nbsp;- FGB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[  <?php if($_POST['opc'] == "opc4" ) {if($_POST['t_plano'] == "t_plano5" ) { echo " X "; }} ?>]     &nbsp;- Plano Fechado &ndash; EFPC</td>
  </tr>
  <tr>
    <td width="223" valign="top" class="style3">Regime de tributa&ccedil;&atilde;o:<br />
      &nbsp;[<?php if($_POST['opc'] == "opc4" ) { if($_POST['regi'] == "regi1" ) { echo " X "; } } ?>]&nbsp;Progressiva&nbsp;&nbsp;  [<?php if($_POST['opc'] == "opc4" ) { if($_POST['regi'] == "regi2" ) { echo " X "; } }?>]&nbsp;Regressiva </td>
    <td colspan="4" valign="top"><span class="style3">Data de ades&atilde;o ao plano:</span><br />      <span class="style3"><strong><?php if($_POST['opc'] == "opc4" ) {echo $_POST['data_ad'];} ?></strong></span><br /></td>
    <td colspan="2" valign="top"><span class="style3">Matr&iacute;cula no plano:</span><br />
      <span class="style3"><strong><?php if($_POST['opc'] == "opc4" ) {echo $_POST['matr_plano'];} ?></strong></span><br /></td>
    </tr>
  <tr>
    <td width="223" valign="top" class="style3">N&ordm; do processo na SUSEP    (Aberta) ou SPC (Fechada):<strong> <?php if($_POST['opc'] == "opc4" ) {echo $_POST['n_susep']; } ?></strong></td>
    <td colspan="4" valign="top" class="style3">Banco da entidade (nome e n&ordm;):  &nbsp;  &nbsp;  &nbsp;<br />
        <strong><?php if($_POST['opc'] == "opc4" ) { echo $_POST['n_banco_b3'];} ?></strong><br />
    </td>
    <td width="100" valign="top"><span class="style3">Ag&ecirc;ncia    n&ordm;: <br />
    <strong>  <?php if($_POST['opc'] == "opc4" ) {echo $_POST['ag_banco3']; } ?></strong></span><br />
      <br /></td>
    <td width="103" valign="top" class="style3">&nbsp;N&deg; Conta: <br />
   <strong>   <?php if($_POST['opc'] == "opc4" ) { echo $_POST['cc_banco3']; } ?></strong><br />
      <br />
    </td>
  </tr>
  <tr>
    <td colspan="7">aaa</td>
  </tr>
</table>
</div> <?php }?>
<p class="style3">  &nbsp;&nbsp;Local e Data: Bras&iacute;lia,
  <?php $data = date("d / m / Y"); echo "$data."; ?></p>
  <div align="center" class="style3">________________________________________________<br/>

                            <span class="style57">Assinatura do Participante<br />
                            <br />

Anexar ao formulário: Cópia da rescisão contratual, comprovante bancário e cópia da identidade.</span> </div>
</td>
  </tr>
</table>
<br />
<table width="752" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="752" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">&nbsp;15.</span> <span class="style9">Manifesta&ccedil;&atilde;o da Patrocinadora:<br />
      <br />
    </span><span class="style3">No caso de Participante / Empregado com contrato de trabalho vigente, a assinatura poderá ser abonada pelo Empregador / Patrocinador ou ter sua firma da assinatura reconhecida em cartório.</span>
    <div align="left">
    	<table width="100%" border="0">
        	<tr>
            	<td width="37%" height="45" align="center" valign="bottom">
                	<span class="style3">________________________________</span>
                </td>
                <td width="63%">
                </td>
            </tr>
            <tr>
            	<td align="center" valign="top">
                	<span class="style3">Carimbo e Assinatura Patrocinador</span>
                </td>
            	<td>
                </td>
            </tr>
        </table>
        <br />
        <span class="style3">Participantes Autopatrocinados e Participantes em BPD (Benefício Proporcional Diferido), é necessário reconhecer firma do formulário impresso e encaminhar direto para o SEBRAE PREVIDENCIA junto com comprovante bancário, cópia da identidade autenticada e cópia da rescisão contratual.</span><br />
<br />


    </div> 
     
      </td>
  </tr>
</table>
<br />


<table width="752" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="752" valign="top" style="border-left:solid #000000; border-bottom:#000000 solid 1px;">&nbsp;<span class="style9">&nbsp;Reservado &agrave; Diretoria de seguridade do SEBRAE PREVID&Ecirc;NCIA.</span>
 <br />
<br />   
<div class="style3">
<span>Data de Recebimento dos documentos: ______/______/__________</span>
</div>
<br />
<div class="style3">
<span>Data de Pagamento do resgate: ______/______/__________</span>
</div>
<div class="style3" style="margin-top:10px;">
<span><strong>Indeferimento/Motivo</strong></span><br />
<br />
<br />
<br />
<br />
<br />

<div class="style3">
<table width="700" border="0" class="style3">
  <tr>
    <td width="111">Local e Data:</td>
    <td width="344">_________________, ____/____/_______</td>
    <td width="231" align="center">____________________________</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">Assinatura e carimbo</td>
  </tr>
</table>

</div>



    </td>
  </tr>
</table>
<?php } ?>
</tbody>
</body>
</html>
