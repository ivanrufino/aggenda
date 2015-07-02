<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Aggendar.com | Home</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
                <link rel="icon" type="image/png" href="{local}/agenda_logo.ico" />
		<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!--<link href="css/styles.css" rel="stylesheet">-->
                <link href='http://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>
                {css_list}
                
	</head>
	<body>
            <style>
                a.logo{
                color: #000;
                font-family: 'Courgette';
            }
            a.logo > span{
                color:#0097a8 ; 
            }
                <?php
                    if (!is_null($estilo)) {
                        echo " body {
                                    color:{$estilo['cor_letra']};
                                    background-color:{$estilo['cor_corpo']};
                                  }
                            a,a:hover,.highlight {
                                    color:{$estilo['cor']};  	
                                }
                                .highlight-bk,.navbar{
                                    background-color:{$estilo['cor']};  
                                }
                                h3.highlight,.navbar-nav > .open > a, .navbar-nav > .open > a:hover, .navbar-nav > .open > a:focus {
                                    border-color: {$estilo['cor']};
                                }
                                .navbar-nav > li:last-child > a,.navbar-nav > li > a{
                                    border-color: {$estilo['borda']};
                                }
                                ";
                    }
                ?>
            </style>  
<nav class="navbar navbar-static">
    <div class="container">
      <a class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
        <span class="glyphicon glyphicon-chevron-down"></span>
      </a>
      <div class="nav-collapse collase">
        <ul class="nav navbar-nav">  
          <li><a href="{base_url}">Home</a></li>
<!--          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>-->
        </ul>
        <ul class="nav navbar-right navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i></a>
            <ul class="dropdown-menu" style="padding:12px;">
                <form class="form-inline">
                   <div class="input-group">
                     <input type="text" class="form-control" placeholder="Search">
                     <div class="input-group-btn">
     			       <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                     </div>
                  </div>
                </form>
              </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-chevron-down"></i></a>
            <ul class="dropdown-menu">
              <li><a href="#">Acessar</a></li>
              <li><a href="#">Configurações</a></li>
              <li class="divider"></li>
              <li><a href="#">Sair</a></li>
             </ul>
          </li>  
        </ul>
      </div>		
    </div>
</nav><!-- /.navbar -->

<header class="masthead">
  <div class="container">
    <div class="row">
      <div class="col col-sm-6">
          <h1><a href="#" title="scroll down for your viewing pleasure" class="logo">
                   <img src='<?= base_url()?>assets/images/agenda_logo.png' class="" alt="logo" style="height: 50px;display: inline">
                  {nome_site}
              </a>
          <p class="lead">Sistema de agendamento online</p></h1>
      </div>
      <div class="col col-sm-6">
        <div class="well pull-right">
          <img src="//placehold.it/280x100/E7E7E7">        
        </div>
      </div>
    </div>
  </div>
  
  <div class="container">
	<div class="row">
      <div class="col col-sm-12">
        
        <div class="panel">
        <div class="panel-body">
         Procure serviços e marque horarios de forma rapida e simples  <span class="glyphicon glyphicon-heart-empty"></span>
        </div>
        </div>
        
      </div>
  	</div>
  </div>
</header>

<!-- Begin Body -->
<div class="container">
	<div class="row">
  			<div class="col col-sm-3">
              	<div id="sidebar">
      			<ul class="nav nav-stacked ">
                    <li><h3 class="highlight">Serviços <i class="glyphicon glyphicon-dashboard pull-right"></i></h3></li>
                  	<li><a href="salao_de_beleza" class='loadLink'>Salão de Beleza</a></li>
                        <li><a href="clinica_medica" class='loadLink'>Clínicas Médica</a></li>
                        <li><a href="dentista" class='loadLink'>Dentistas</a></li>
                    </ul>
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                Accordion
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse in">
                            <div class="accordion-inner">
                              <p>There is a lot to be said about RWD.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                    Accordion
                                </a>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse">
                                <div class="accordion-inner">
                                  <p>Use @media queries or utility classes to customize responsiveness.</p>
                                </div>
                            </div>
                        </div>
               	</div>
               </div>
      		</div>  
      		<div class="col col-sm-9">
              <div class="panel">
              <h1>The Top Stories from Around</h1>
              
              <div class="row">
              	<div class="col col-sm-8">
                  <img src="http://s.bootply.com/assets/example/bg_iphone.png" class="img-responsive">
                </div> 
        		<div class="col col-sm-4">
                  <img src="//placehold.it/400x180/FF3333/FFF" class="img-responsive">
                  <h4>Aside</h4>
                  <hr>
                  <img src="//placehold.it/400x180/FF3333/FFF" class="img-responsive">
                  <h4>Aside 2</h4>
              	</div>   
              </div>
        
              	<h2>Content</h2>
                Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores 
                eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
              
              
              	<h2>Content</h2>
                Rrem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores 
                eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
              	<br><br>
                <button class="btn btn-default">More</button>
                
                <hr>
              	
                <h2>Content</h2>
                <img src="//placehold.it/150x100/EEEEEE" class="img-responsive pull-right"> Farmhand ida quae ab illo inventore veritatis et quasi architecto beatae vitae 
                dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores 
                eos qui ratione voluptatem sequi nesciunt. I met him on the Internet. He's a French model. Qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
              	<br><br>
                <button class="btn btn-default">More</button>
                
                <hr>
                
                 <div class="row">
                  <div class="col col-sm-6">
                    <img src="/assets/example/bg_smartphones.jpg" class="img-responsive">
                    
                  </div> 
                  <div class="col col-sm-6">
                    <h1>There is still a lot to be said about the Responsive Web.</h1>
                  </div>   
                </div>
                
                <hr>
              
              	<h2>Responsive Text</h2>
      			Eeaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores 
                eos qui ratione voluptatem sequi nesciunt. Bootply is this awesomeness. Editor, prototype tool, adipisci velit, 
                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
              
                <hr>
                
              	<h2>Responsive Images</h2>
      			Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores 
                eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
              
                <hr>
                
              	<h2>Media Queries</h2>
      			Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores 
                eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
              
              
              	<h1><a href="#"><i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-chevron-down"></i></a></h1>
              
              	<hr>
              	<h4><a href="http://bootply.com/">Bootply</a></h4>
              	<hr>
             	</div>
      	</div> 
  	</div>
</div>



	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!--		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>-->
                {js_list}
                <script>
                    $("document").ready(function(){
                        $(".loadLink").click(function(){
                            var link = $(this).attr('href');
                            console.log(link);
                            return false;
                        })
                    })
                </script>
	</body>
</html>