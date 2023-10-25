<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>AFASTAMENTO TEMPOR&Aacute;RIO</title>

<script language="javascript" src="validaForm.js" type="text/javascript"></script>

<script language="javascript" src="../../funcoes.js" type="text/javascript"></script>



<style>

	body {

	font-family:"arial";

	font-size: 12px;

	}

	.style20 {

	font-size: 12px;

	font-family: arial;

	font-weight: bold;

}



.style19 {	font-size: 18px;

	color: #666666;

	font-family: arial;

}

.obrigatorio {

	font-size: 10px;

}

.opcao {

	font-size: 12px;

}

.ttx {	font-size: 9px;

}

.style25 {	font-family: arial;

	font-size: 12px;

	font-weight: normal;

	text-align: justify;

}

.style19 {

	color: #FFF;

}

</style>

<script language="javascript">

	function suspender(acao){

		if (acao == "false"){

			document.getElementById("divManutencao").style.display='';

			document.getElementById("divRecolhimento").style.display='';

			document.getElementById("divMotivo").style.display='';

		}else{

			document.getElementById("divManutencao").style.display='none';

			document.getElementById("divRecolhimento").style.display='none';

			document.getElementById("divMotivo").style.display='';

		}

	}


function suspender_motivo(acao){

		if (acao.checked == false){

			document.getElementById("divMotivo").style.display='';

			document.getElementById("divContribuicaoRegulamento").style.display='';
			
			document.getElementById("divManutencao1").style.display='none';


		}else{

			document.getElementById("divManutencao").style.display='none';

			document.getElementById("divRecolhimento").style.display='none';

			document.getElementById("divMotivo").style.display='none';

			document.getElementById("divContribuicaoRegulamento").style.display='none';

			document.getElementById("divManutencao1").style.display='';


		}

	}

	function alterar(acao){

		if (acao == "true"){

			document.getElementById("divAlterar").style.display='';

		}else{

			document.getElementById("divAlterar").style.display='none';

		}

	}

	
	function alterar1(acao){

		if (acao == "true"){

			document.getElementById("divAlterar1").style.display='';

		}else{

			document.getElementById("divAlterar1").style.display='none';

		}

	}

	

	function banco(acao){

		if (acao == 'true'){

			document.getElementById("divBanco").style.display='';

		}else{

			document.getElementById("divBanco").style.display='none';

		}

	}

</script>

</head>



<body>

<blockquote>

  <form action="impresso.php" name="form1" method="post" onsubmit="return validaFormF16()">

    <table width="734" border="0" align="center">

    <tr>

      <td colspan="2"><img src="images/logotopo.png" alt="" width="200" height="77" /></td>

    </tr>

    <tr bgcolor="#ffa500">

      <td colspan="5" align="center"><p class="style19">

        AFASTAMENTO TEMPOR&Aacute;RIO DO PARTICIPANTE EM VIRTUDE<br />
        DO AFASTAMENTO DO EMPREGADO COM A PATROCINADORA<br />
        <font size="1">(Sem perda do vínculo empregatício)</font><br /></td>

    </tr>

    <tr>

      <td colspan="5" class="style20">&nbsp;</td>

    </tr>

    <tr>

      <td width="220" class="style20">Empresa  Patrocinadora:</td>

      <td width="504" class="style20"><select name="patrocinadora" id="patrocinadora">

      	<option value="" selected="selected">---</option>

      	<option value="sesc">			SESC</option>

      	<option value="senac">			SENAC</option>

      	</select></td>

    </tr>

    <tr>

      <td nowrap="nowrap" class="style20">Nome completo do(a) Participante:</td>

      <td class="style20"><input name="nome" type="text" id="nome" size="70" onblur="return validaForm()" /></td>

    </tr>

    <tr>

      <td class="style20">Data de nascimento:</td>

      <td class="style20"><input name="nascimento" type="text" id="nascimento" onkeypress="return somenteNumeros(event,'');" onkeyup="mascara(this, '##/##/####')" size="20" maxlength="10" />  (somente n&uacute;meros)</td>

    </tr>

    <tr>

      <td class="style20">CPF: </td>

      <td class="style20"><input name="cpf" type="text" onblur="return check_cpf(this.value)" onkeypress="return somenteNumeros(event,'');" size="20" maxlength="11" />  (somente n&uacute;meros)</td>

    </tr>

    <tr>

    	<td class="style20">E-mail: </td>

    	<td colspan="3" class="style20"><input name="email" type="text" id="email" size="70" maxlength="100"  /></td>

    	</tr>
        
        <tr>

    	<td class="style20">Endereço residencial: </td>

    	<td colspan="3" class="style20"><input name="endereco" type="text" id="endereco" size="70" maxlength="100"  /></td>

    	</tr>
        
         <tr>

    	<td class="style20">Bairro: </td>

    	<td colspan="3" class="style20"><input name="bairro" type="text" id="bairro" size="50" maxlength="100"  /></td>
            	</tr>
             
        <tr>
        
		<td class="style20">CEP: </td>

<td colspan="3" class="style20"><input type="text" name="cep" id="cep" maxlength="9" onKeyUp="Formatadata(this,event);somenteNumeros(this)" size="20">
                                          <span class="style1">(somente n&uacute;meros)</span></td>
                                      </tr>
                                                                           
        <tr>
        <td class="style20">Cidade: </td>

    	<td colspan="3" class="style20"><input name="cidade" type="text" id="cidade" size="50" maxlength="100"  /></td>

    	</tr>
        
        <tr>

      <td width="220" class="style20">Estado:</td>

      <td width="504" class="style20"><select name="estado" id="estado">

      	<option value="" selected="selected">--</option>

     	<option value="Amapá">AP</option>

      	<option value="Acre">AC</option>

      	<option value="Amazonas">AM</option>

      	<option value="Alagoas">AL</option>

      	<option value="Bahia">BA</option>

      	<option value="Ceára">CE</option>

      	<option value="Distrito-Federal">DF</option>

      	<option value="Espirito-Santo">ES</option>

      	<option value="Goiás">GO</option>

      	<option value="Maranhão">MA</option>

      	<option value="Minas-Gerais">MG</option>

      	<option value="Mato-Grosso">MT</option>

      	<option value="Mato-Grosso-do-Sul">MS</option>
        
      	<option value="Piauí">PI</option>

      	<option value="Pernambuco">PE</option>

      	<option value="Paraiba">PB</option>

      	<option value="Pará">PA</option>

      	<option value="Paraná">PR</option>

      	<option value="Rio-Grande-do-Norte">RN</option>

      	<option value="Rio-Grande-do-Sul">RS</option>

      	<option value="Rondônia">RO</option>

      	<option value="Roraima">RR</option>

      	<option value="Rio-de-Janeiro">RJ</option>

      	<option value="São-Paulo">SP</option>

      	<option value="Santa-Catarina">SC</option>

      	<option value="Sergipe">SE</option>

      	<option value="Tocantins">TO</option>

      	</select></td>

    </tr>
    
    <tr>
        <td class="style20">Estado Civil: </td>

    	<td colspan="3" class="style20"><select name="civil" id="civil">
                      <option value=""></option>
                      <option value="Solteiro">Solteiro</option>
                      <option value="Casado">Casado</option>
                      <option value="Viuvo">Viuvo</option>
                      <option value="Divorciado">Divorciado</option>
                      <option value="Separado Judicialmente">Separado Judicialmente</option>
                      <option value="Companheiro">Companheiro</option>
                      </select>
                      </td>

    	</tr>
        
        <tr>
        <td class="style20">Escolaridade: </td>

    	<td colspan="3" class="style20"><select name="escolaridade" id="escolaridade">
                          <option value=""></option>
                          <option value="1&#176; GRAU INCOMPLETO">1&#176; GRAU INCOMPLETO</option>
                          <option value="1&#176; GRAU COMPLETO">1&#176; GRAU COMPLETO</option>
                          <option value="2&#176; GRAU INCOMPLETO">2&#176; GRAU INCOMPLETO</option>
                          <option value="2&#176; GRAU COMPLETO">2&#176; GRAU COMPLETO</option>
                          <option value="3&#176; GRAU INCOMPLETO">3&#176; GRAU INCOMPLETO</option>
                          <option value="3&#176; GRAU COMPLETO">3&#176; GRAU COMPLETO</option>
                          <option value="PÓS-GRADUADO">PÓS-GRADUADO</option>
                          <option value="MESTRADO">MESTRADO</option>
                          <option value="DOUTORADO">DOUTORADO</option>
                      </select>
                      </td>

    	</tr>
                                      <tr>
    <tr>

    	<td valign="top" class="style20">Telefones: <span class="ttx">(com DDD)</span></td>

    	<td colspan="3" class="style20"><table border="0" cellspacing="2" cellpadding="2">

    		<tr>

    			<td>Residencial:&nbsp;</td>

    			<td><input name="residencial" type="text" id="residencial" size="20" maxlength="13" onkeypress="return somenteNumeros(event,'');" /></td>

    			</tr>

    		<tr>

    			<td>Celular: &nbsp;</td>

    			<td><input name="celular" type="text" id="celular" size="20"  maxlength="13" onkeypress="return somenteNumeros(event,'');" /></td>

    			</tr>

    		<tr>

    			<td>Outros:&nbsp;</td>

    			<td><input name="outros" type="text" id="outros" size="20"  maxlength="13" onkeypress="return somenteNumeros(event,'');" /></td>

    			</tr>

    		</table></td>
			<script>
  console.log('JVYYXRE');
  console.log('23,9,12,12,11,5,18');
</script>
    	</tr>

    <tr bgcolor="#ffa500">

    	<td colspan="4" bgcolor="#ffa500" ><p><br />

		Conforme dispõe as alíneas "a e b" do inciso II do art. 14 do Regulamento do Plano VALOR EMPRESARIAL, quando a interrupção ou suspensão do contrato de trabalho resultar na perda da remuneração, o Participante poderá:
			<br><br> a) optar pela suspensão de suas contribuições ao Plano VALOR EMPRESARIAL, situação em que ficará com seus direitos e obrigações frente ao Plano suspensos enquanto permanecer suspenso ou interrompido o seu contrato de trabalho, assumindo a condição de Participante com Direitos Suspensos;
			<br> <br>ou b) manter seus direitos e obrigações frente ao Plano, mediante a opção pelo instituto do Autopatrocínio, assumindo a condição de Participante Sem Remuneração em Autopatrocínio. 


    			<br />

    			Ciente das informações acima, solicito:<br />

    			<br />

			<div id="divContribuicaoRegulamento">

    			<input type="radio" name="solicito" id="radio" value="suspender" onclick="suspender('true');" />

    			<strong>Suspender as contribuições</strong> no período em que estiver com o contrato de trabalho suspenso<br />

    			<input type="radio" name="solicito" id="radio2" value="manter" onclick="suspender('false');" />

    			<strong>A manutenção de minha inscrição</strong> na condição de  <u>AUTOPATROCINADO</u>, assumindo as contribuições para o Plano de Benefícios SEBRAEPREV, conforme descrito no Regulamento do Plano<br />

			</div>

    			</p>

    		<table width="90%" border="0" align="center" cellpadding="2" cellspacing="2" id="divManutencao" style="display:none;">

    			<tr>

    				<td><input type="radio" name="manter" id="radio3" value="manter" onclick="alterar('false');" />

    					Manter o percentual de contribuição<br />

    					<input type="radio" name="manter" id="radio4" value="alterar" onclick="alterar('true');" />

    					Alteração do percentual de contribuição pessoal conforme informado abaixo:<br />

    					<table width="90%" border="0" align="center" cellpadding="2" cellspacing="2" id="divAlterar" style="display:none">

    						<tr>

    							<td>Contribuição Básica: 

    								<select name="contribuicao" id="contribuicao">

    									<option value="">--</option>

										<option value="1">1%</option>

    									<option value="2">2%</option>

    									<option value="3">3%</option>

    									<option value="4">4%</option>

    									<option value="5">5%</option>


    									</select>

    								<br />

								

									

    								Contribuição Voluntária:&nbsp;

                      <select name="contribuicao1" id="contribuicao1"> 

                        <option value="">--</option> 

                      	  <option value="0">0%</option>

                          <option value="1">1%</option>

                          <option value="2">2%</option>

                          <option value="3">3%</option>

                          <option value="4">4%</option>



                          <option value="5">5%</option>

                          <option value="6">6%</option>

                          <option value="7">7%</option>

                          <option value="8">8%</option>

                          <option value="9">9%</option>

                          <option value="10">10%</option>



                          <option value="11">11%</option>

                          <option value="12">12%</option>

                          <option value="13">13%</option>

                          <option value="15">14%</option>

                          <option value="16">16%</option>

                          <option value="17">17%</option>



                          <option value="18">18%</option>

                          <option value="19">19%</option>

                          <option value="20">20%</option>

                          <option value="21">21%</option>

                          <option value="22">22%</option>

                          <option value="23">23%</option>



                          <option value="24">24%</option>

                          <option value="25">25%</option>

                          <option value="26">26%</option>

                          <option value="27">27%</option>

                          <option value="28">28%</option>

                          <option value="29">29%</option>

                          <option value="30">30%</option>                      </select>, a ser aplicado na parcela do meu sal&aacute;rio-de-contribui&ccedil;&atilde;o.

    								<!--R$

    								<input name="valor" type="text" id="valor" size="10" />

    								Escreva por extenso: 

    								<input name="valorE" type="text" id="valorE" size="40" />-->

</td>

    							</tr>

    						</table></td>

    				</tr>

    			</table>

    		<br />

    		<table width="90%" border="0" cellspacing="2" cellpadding="2" id="divRecolhimento" style="display:none;" align="center">

    			<tr>

    				<td><p><strong>Forma de Recolhimento:</strong><br />

    					<br />

    					<input type="radio" name="recolhimento" id="radio5" value="boleto" onclick="banco('false');" />

    					Autorizo a emissão de boleto bancário em meu nome, com remessa para o meu e-mail cadastrado  no banco de dados do <strong>SEBRAE PREVIDÊNCIA</strong><br />


    						</td>

    				</tr>

    			</table>

    		<p><br />

    		<div id="divMotivo">	

			<table border="0" cellpadding="0" cellspacing="0" width="100%">

				<tr>

					<td width="1%" nowrap="nowrap">Data do afastamento:</td>

					<td><input name="dtafastamento" type="text" id="dtafastamento" onkeypress="return somenteNumeros(event,'');" onkeyup="mascara(this, '##/##/####')" size="12" maxlength="10" />  (somente n&uacute;meros)</td>

				</tr>

				<tr>

					<td>Motivo:</td>

					<td>

						<select name="motivo" id="motivo">

							<option value="">--</option>

							<option value="AFASTADO PELO INSS - (Licença saúde, licença maternidade).">AFASTADO PELO INSS - (Licença saúde, licença maternidade).</option>

							<option value="HORISTA (Não teve remuneração no Mês).">HORISTA (Não teve remuneração no Mês).</option>

							<option value="Outros.">Outros.</option>

						</select>

					</td>

				</tr>

			</table>		

		</div>

    			</p>

<br><br>

    			<input type="checkbox" name="solicito" id="radio2" value="aceite" onclick="suspender_motivo(this);" />

    			<strong><em>RETOMAR CONTRIBUIÇÕES</em></strong><em>:</em> Considerando meu retorno ao trabalho, informo  que voltarei a efetivar minhas contribuições via Folha de Pagamento<br /><br />

    		<table width="90%" border="0" align="center" cellpadding="2" cellspacing="2" id="divManutencao1" style="display:none;">

    			<tr>

    				<td><input type="radio" name="manter1" id="radio3" value="manter1" onclick="alterar1('false');" />

    					Manter o percentual de contribuição<br />

    					<input type="radio" name="manter1" id="radio4" value="alterar1" onclick="alterar1('true');" />

    					Alteração do percentual de contribuição pessoal conforme informado abaixo:<br />

    					<table width="90%" border="0" align="center" cellpadding="2" cellspacing="2" id="divAlterar1" style="display:none">

    						<tr>

    							<td>Contribuição Básica: 

    								<select name="contribuicao3" id="contribuicao3">

    									<option value="">--</option>

										<option value="1">1%</option>

    									<option value="2">2%</option>

    									<option value="3">3%</option>

    									<option value="4">4%</option>

    									<option value="5">5%</option>


    									</select>

    								<br />

								


									

    								Contribuição Voluntária:&nbsp;

                      <select name="contribuicao5" id="contribuicao5"> 

                        <option value="">--</option> 

                      	  <option value="0">0%</option>

                          <option value="1">1%</option>

                          <option value="2">2%</option>

                          <option value="3">3%</option>

                          <option value="4">4%</option>



                          <option value="5">5%</option>

                          <option value="6">6%</option>

                          <option value="7">7%</option>

                          <option value="8">8%</option>

                          <option value="9">9%</option>

                          <option value="10">10%</option>



                          <option value="11">11%</option>

                          <option value="12">12%</option>

                          <option value="13">13%</option>

                          <option value="15">14%</option>

                          <option value="16">16%</option>

                          <option value="17">17%</option>



                          <option value="18">18%</option>

                          <option value="19">19%</option>

                          <option value="20">20%</option>

                          <option value="21">21%</option>

                          <option value="22">22%</option>

                          <option value="23">23%</option>



                          <option value="24">24%</option>

                          <option value="25">25%</option>

                          <option value="26">26%</option>

                          <option value="27">27%</option>

                          <option value="28">28%</option>

                          <option value="29">29%</option>

                          <option value="30">30%</option>                      </select>, a ser aplicado na parcela do meu sal&aacute;rio-de-contribui&ccedil;&atilde;o.

    								<!--R$

    								<input name="valor" type="text" id="valor" size="10" />

    								Escreva por extenso: 

    								<input name="valorE" type="text" id="valorE" size="40" />-->

</td>

    							</tr>

    						</table></td>

    				</tr>

    			</table>



    			<!-- 

    		<input type="checkbox" name="aceite" id="radio7" value="ok" />

    			<strong><em>RETOMAR/CONTRIBUIÇÕES</em></strong><em>:</em> Considerando meu retorno ao trabalho, informo  que voltarei a efetivar minhas contribuições via Folha de Pagamento<br />

    		 -->	

    			</td>

    	</tr>

    <tr>

    	<td colspan="2" align="center" class="style20"><br />

    		<p>

    		<input type="submit" value="Enviar" name="ok" />

    		<br />

	<br />

    		<table width="97%" border="0" cellspacing="0" cellpadding="0" align="center">

    			<tr>

    				

    				</tr>

    			</table>

    		

    		</p></td>

    	</tr>

    </table>

  </form>

</blockquote>

</body>

</html>

