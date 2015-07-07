<body>

	<div style="width:100%; border:1px solid #0097a8; ">
		<div style="padding-left:5%">
			<a href="<?=base_url(); ?>" style="text-decoration:none; color:#000; font-size: 20px;font-family: Courgette">
				<img src='<?=base_url() ?>assets/images/agenda_logo.png' style="width:40px;display:inline" />
				<span style="padding-left:10px;position: absolute;top: 14px;">A<span style="color: #0097a8;" >gg</span>endar</span>
			</a>
		</div>
	<br>
	<hr style="width:90%">
	<div style="width:80%;line-height: 25px;">
		<h1 style="text-align:center;font-size:18px">Olá, Bem vindo ao Aggendar</h1>
		
		<p style="padding-left:20%">
			Obrigado por seu cadastro em nosso sistema. <br>
			Agora você pode organizar o agendamento de seus serviços, salas de reuniões entre outros.<br>
			Seus clientes podem reservar online em sua página personalizada:
			<fieldset style="width:60%; margin: 0 auto;"><legend>Dados Cadastrais</legend>
				Login: <?=$LOGIN; ?> <br>
				Email: <?= $EMAIL; ?> <br>
				Senha: <?=$senha_curta?>****** <br><small>Caso não lembre da senha, entre na página de login e clique em 'esqueci minha senha'</small>
			</fieldset>
			<br>
			</p>
			<p style="padding-left:20%">
			Alguns passos devem ser tomados para a utilização do sistema:
			<ol style="padding-left:30%">
			<li>Ative seu cadastro <a href="<?=base_url() ?>home/ativacao_conta/<?=$emailLoginHash?>">clicando aqui</a></li>
			<li>Após a ativação realize o <a href="<?=base_url() ?>home/login"> login </a> e preencha as informações referentes a sua empresa e/ou serviços oferecidos</li>
			<li>Adcione os funcionários ou salas de disponiveis e a agenda correspondente</li>
			<li>Divulgue para seus clientes</li>
			</ol>

	</p>
	Com os melhores cumprimentos, <br>
	<span style='font-size:23px; font-weight:bold'>Aggendar </span>
	<p style="border-top: 1px solid;">Para quaisquer dúvida ou sugestão entre em contato enviando um ticket ou reportando um erro através de sua área administrativa</p>
	<br>
	<small>Mensagem enviada em  : <?php echo date('Y-m-d H:i:s')?> </small>
	</div>
	</div>
</body>