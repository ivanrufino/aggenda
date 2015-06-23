<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>Aggenda.com | Login </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="<?=  base_url()?>assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?=  base_url()?>assets/css/template_associado/login.css" />
    <link rel="stylesheet" href="<?=  base_url()?>assets/plugins/magic/magic.css" />
    <link href='http://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style>
        a.logo span{color: #0097a8}
    </style>
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">
        <!--<img src="<?=  base_url()?>assets/images/template_associado/logo.png" id="logoimg" alt=" Logo" />-->
        <a href="#" class=" logo" style='color:#000; font-family: Courgette;font-size: 30px'>
            <img src='<?= base_url()?>assets/images/agenda_logo.png' class="" alt="logo" style="height: 75px;display: inline">
            <?=$nome_site?>                        
        </a>
        
    </div>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="<?=  base_url();?>home/acessar" method="POST" class="form-signin">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                   Digite seu E-mail e Senha
                </p>
                <input type="text" placeholder="E-mail ou Login" name="login" class="form-control" />
                <input type="password" placeholder="Senha" name="senha" class="form-control" />
                <button class="btn text-muted text-center btn-success" type="submit">Acessar</button>
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="home/recupera_senha" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Digite seu email</p>
                <input type="email"  required="required" placeholder="E-mail"  class="form-control" />
                <br />
                <button class="btn text-muted text-center btn-danger" type="submit">Recuperar senha</button>
            </form>
        </div>
<!--        <div id="signup" class="tab-pane">
            <form action="index.html" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Please Fill Details To Register</p>
                 <input type="text" placeholder="First Name" class="form-control" />
                 <input type="text" placeholder="Last Name" class="form-control" />
                <input type="text" placeholder="Username" class="form-control" />
                <input type="email" placeholder="Your E-mail" class="form-control" />
                <input type="password" placeholder="password" class="form-control" />
                <input type="password" placeholder="Re type password" class="form-control" />
                <button class="btn text-muted text-center btn-success" type="submit">Register</button>
            </form>
        </div>-->
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Esqueci minha senha</a></li>
            <!--<li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>-->
        </ul>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="<?=  base_url()?>assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="<?=  base_url()?>assets/plugins/bootstrap/js/bootstrap.js"></script>
   <script src="<?=  base_url()?>assets/js/template_associado/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
