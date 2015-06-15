<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- 
        Boxer Template
        http://www.templatemo.com/preview/templatemo_446_boxer
        -->
        <meta charset="utf-8">
        <title>Aggenda.com - serviço de agendamento online</title>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="">
        <meta name="description" content="">

        <!-- animate css -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.min.css">
        <!-- bootstrap css -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
        <!-- font-awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
        <!-- google font -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,800' rel='stylesheet' type='text/css'>

        <!-- custom css -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/templatemo-style.css">
        <script src="<?= base_url() ?>assets/js/jquery.js"></script>
        <script>
            $("document").ready(function(){
               
            })
        </script>
    </head>
    <body>
        <!-- start preloader -->
        <div class="preloader">
            <div class="sk-spinner sk-spinner-rotating-plane"></div>
        </div>
        <!-- end preloader -->
        <!-- start navigation -->
        <nav class="navbar navbar-default navbar-fixed-top templatemo-nav" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand" style='color:#000; font-family: puvisa'>
                        <img src='<?= base_url()?>assets/images/agenda_logo.png' class="" alt="logo" style="height: 50px;display: inline">
                        A<span style='color:#0097a8'>gg</span>enda.com
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right text-uppercase">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#feature">Sobre</a></li>
                        <li><a href="#pricing">Planos</a></li>
                        <li><a href="#download">Download</a></li>
                        <li><a href="#contact">Contato</a></li>
                        <li><a href="<?= base_url()?>page.html" onclick="window.location='<?= base_url()?>page.html'">Serviços</a></li>
                        <li><a href="admin/login.html" onclick="window.location='<?= base_url()?>admin/login.html'">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navigation -->
        <!-- start home -->
        <section id="home">
            <div class="overlay" style="padding-top: 0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-12 wow fadeIn" data-wow-delay="0.3s">
                            <h1 class="text-upper">Sistema de agendamento online</h1>
                            <p class="tm-white">Agora você pode criar sua agenda online, onde seus clientes possam acessar e marcar horário de forma simples e eficaz <br></p>
                            <a href="saibaMais" class="btn btn-default">Saiba Mais</a><br>

                            <h2>Facilidade e Agilidade</h2>
                        </div>
                    </div>
                </div>
                <div class="jumbotron" style="padding: 0;margin: 0;background: rgba(255,255,255,0.3)">
                    <div class="row">
                        
                            <div class="col-md-4 col-md-offset-0">
                                <h3>Crie sua conta free</h3>
                                <fieldset>
                                    <form class="first_cadastro" action="<?=base_url()?>home/cadastrar" method="POST">
                                        <div class="col-xs-12">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="login"><i class="fa fa-user fa-lg"></i></span>
                                            <input type="text" class="form-control" name="login" placeholder="Login" aria-describedby="login" required="" value="<?php echo set_value('login'); ?>">
                                            <?php echo form_error('login', '<div class="alert-danger">', '</div>'); ?>
                                        </div>
                                        <br>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="email"><i class="fa fa-envelope-o fa-lg"></i></span>
                                            <input type="email" class="form-control" name="email" placeholder="email" aria-describedby="email" required="" value="<?php echo set_value('email'); ?>">
                                            <?php echo form_error('email', '<div class="alert-danger">', '</div>'); ?>
                                        </div>
                                        </div>
                                        
                                        <div class="col-xs-8">
                                            <br>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="senha"><i class="fa fa-lock fa-lg"></i></span>
                                            <input type="password" class="form-control" name="senha" placeholder="Senha" aria-describedby="senha" required="">
                                            <?php echo form_error('senha', '<div class="alert-danger">', '</div>'); ?>
                                            
                                        </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <br>
                                            <input type="submit" class="btn btn-lg btn-default" value="cadastrar">
                                        </div>
                                    </form>
                                    <div class="clearfix"><br></div>
                                   
                                </fieldset>
                                 <?php //  validation_errors('<div class="alert alert-danger ">', '</div>');?>
                            </div>
                            <div class="col-md-8">
                                <img src="<?= base_url() ?>assets/images/software-img.png" class="img-responsive" alt="home img">
                            </div>

                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end home -->
        <!-- start divider -->
        <section id="divider">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
                        <i class="fa fa-laptop"></i>
                        <h3 class="text-uppercase">FIDELIZE SEUS CLIENTES</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. </p>
                    </div>
                    <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
                        <i class="fa fa-twitter"></i>
                        <h3 class="text-uppercase">REDUZA AS FALTAS</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. </p>
                    </div>
                    <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
                        <i class="fa fa-font"></i>
                        <h3 class="text-uppercase">ADMINISTRE SEU HORÁRIO</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end divider -->

        <!-- start feature -->
        <section id="feature">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
                        <h2 class="text-uppercase">Our Software Features</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <p><span><i class="fa fa-mobile"></i></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <p><i class="fa fa-code"></i>Quis autem velis reprehenderit et quis voluptate velit esse quam.</p>
                    </div>
                    <div class="col-md-6 wow fadeInRight" data-wow-delay="0.6s">
                        <img src="<?= base_url() ?>assets/images/software-img.png" class="img-responsive" alt="feature img">
                    </div>
                </div>
            </div>
        </section>
        <!-- end feature -->

        <!-- start feature1 -->
        <section id="feature1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <img src="<?= base_url() ?>assets/images/software-img.png" class="img-responsive" alt="feature img">
                    </div>
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <h2 class="text-uppercase">More of Your Software</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <p><span><i class="fa fa-mobile"></i></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <p><i class="fa fa-code"></i>Quis autem velis reprehenderit et quis voluptate velit esse quam.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end feature1 -->

        <!-- start pricing -->
        <section id="pricing">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow bounceIn">
                        <h2 class="text-uppercase">Nossos Planos</h2>
                    </div>
                    <div class="col-md-3 wow fadeIn" data-wow-delay="0.6s">
                        <div class="pricing text-uppercase">
                            <div class="pricing-title">
                                <h4>Plano Free</h4>
                                <p>R$ 0,00</p>
                                <small class="text-lowercase">Permanente</small>
                            </div>
                            <ul>
                                <li>50 Agendamentos</li>
                                <li>2 Serviços</li>
                                <li>Lembrete por Email</li>
                                <li>Lifetime Support</li>
                            </ul>
                            <button class="btn btn-primary text-uppercase">Contratar</button>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeIn" data-wow-delay="0.6s">
                        <div class="pricing text-uppercase">
                            <div class="pricing-title" style="background:#cd7f32">
                                <h4>Plano Bronse</h4>
                                <p>R$ 15,00</p>
                                <small class="text-lowercase">Mensal</small>
                            </div>
                            <ul>
                                <li>2 GB Space</li>
                                <li>200 GB Bandwidth</li>
                                <li>20 More Themes</li>
                                <li>Lifetime Support</li>
                            </ul>
                            <button class="btn btn-primary text-uppercase">Contratar</button>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeIn" data-wow-delay="0.6s">
                        <div class="pricing active text-uppercase" >
                            <div class="pricing-title"  style="background:#c0c0c0;color:#000">
                                <h4>Plano Silver</h4>
                                <p>$20</p>
                                <small class="text-lowercase">Semestral</small>
                            </div>
                            <ul>
                                <li>5 GB space</li>
                                <li>500 GB Bandwidth</li>
                                <li>50 More Themes</li>
                                <li>Lifetime Support</li>
                            </ul>
                            <button class="btn btn-primary text-uppercase">Contratar</button>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeIn" data-wow-delay="0.6s">
                        <div class="pricing text-uppercase">
                            <div class="pricing-title" style="background:#ffd700;color:#000">
                                <h4>Plano Gold</h4>
                                <p>$30</p>
                                <small class="text-lowercase">Anual</small>
                            </div>
                            <ul>
                                <li>10 GB space</li>
                                <li>1,000 GB bandwidth</li>
                                <li>100 more themes</li>
                                <li>Lifetime Support</li>
                            </ul>
                            <button class="btn btn-primary text-uppercase">Contratar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end pricing -->

        <!-- start download -->
        <section id="download">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
                        <h2 class="text-uppercase">Download Our Software</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. </p>
                        <button class="btn btn-primary text-uppercase"><i class="fa fa-download"></i> Download</button>
                    </div>
                    <div class="col-md-6 wow fadeInRight" data-wow-delay="0.6s">
                        <img src="<?= base_url() ?>assets/images/software-img.png" class="img-responsive" alt="feature img">
                    </div>
                </div>
            </div>
        </section>
        <!-- end download -->

        <!-- start contact -->
        <section id="contact">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                            <h2 class="text-uppercase">Contact Us</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. </p>
                            <address>
                                <p><i class="fa fa-map-marker"></i>1234 Street Name, City Name, United States</p>
                                <p><i class="fa fa-phone"></i> 0992 234234 / 0234 234234</p>
                                <p><i class="fa fa-envelope-o"></i> hello@yoursite.com</p>
                            </address>
                        </div>
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="contact-form">
                                <form action="#" method="post">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" placeholder="Message" rows="4"></textarea>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="submit" class="form-control text-uppercase" value="Send">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end contact -->

        <!-- start footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <p>Copyright © <?= date('Y') ?> Aggenda.com</p>
                    <p class="footer">Página carregada em <strong>{elapsed_time}</strong> segundos. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
                </div>
            </div>
        </footer>
        <!-- end footer -->
        
        <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/js/wow.min.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.singlePageNav.min.js"></script>
        <script src="<?= base_url() ?>assets/js/custom.js"></script>
        
    </body>
</html>

