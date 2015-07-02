<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="pt-br"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="UTF-8" />
        <title>{titulo}</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="sistema de agenda online, marcação de horario" name="description" />
        <link rel="icon" type="image/png" href="{local}/agenda_logo.ico" />
        <meta content="Ivan Rufino Martins" name="author" />
        <!--[if IE]>
           <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
           <![endif]-->
        <!-- GLOBAL STYLES -->
        <link rel="stylesheet" href="{base_url}assets/plugins/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="{base_url}assets/css/template_associado/main.css" />
        <link rel="stylesheet" href="{base_url}assets/css/template_associado/theme.css" />
        <link rel="stylesheet" href="{base_url}assets/css/template_associado/MoneAdmin.css" />
        <link rel="stylesheet" href="{base_url}assets/plugins/Font-Awesome/css/font-awesome.css" />
        <link href='http://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>
        <script src="{base_url}assets/plugins/jquery-2.0.3.min.js"></script>
        <script src="{base_url}assets/js/jquery.js"></script>
        <!--    END GLOBAL STYLES 
       
            PAGE LEVEL STYLES 
           <link href="assets/css/layout2.css" rel="stylesheet" />
              <link href="assets/plugins/flot/examples/examples.css" rel="stylesheet" />
              <link rel="stylesheet" href="assets/plugins/timeline/timeline.css" />-->
        <!-- END PAGE LEVEL  STYLES -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        {css_list} 
        <style>
            a.logo{font-size: 25px}
            a.logo span{color: #0097a8;}
        </style>
    </head>

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class="padTop53 " >

        <!-- MAIN WRAPPER -->
        <div id="wrap" >


            <!-- HEADER SECTION -->
            <div id="top">

                <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                    <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                        <i class="icon-align-justify"></i>
                    </a>
                    <!-- LOGO SECTION -->
                    <header class="navbar-header">

                        <a href="#" class="navbar-brand logo" style='color:#000; font-family: Courgette'>
                            <img src='<?= base_url() ?>assets/images/agenda_logo.png' class="" alt="logo" style="height: 50px;display: inline">
                            {nome_site}
                        </a>
                    </header>
                    <!-- END LOGO SECTION -->
                    <ul class="nav navbar-top-links navbar-right">

                        <!-- MESSAGES SECTION -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="label label-success">2</span>    <i class="icon-envelope-alt"></i>&nbsp; <i class="icon-chevron-down"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>John Smith</strong>
                                            <span class="pull-right text-muted">
                                                <em>Today</em>
                                            </span>
                                        </div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing.
                                            <br />
                                            <span class="label label-primary">Important</span> 

                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>Raphel Jonson</strong>
                                            <span class="pull-right text-muted">
                                                <em>Yesterday</em>
                                            </span>
                                        </div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing.
                                            <br />
                                            <span class="label label-success"> Moderate </span> 
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>Chi Ley Suk</strong>
                                            <span class="pull-right text-muted">
                                                <em>26 Jan 2014</em>
                                            </span>
                                        </div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing.
                                            <br />
                                            <span class="label label-danger"> Low </span> 
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>Read All Messages</strong>
                                        <i class="icon-angle-right"></i>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <!--END MESSAGES SECTION -->

                        <!--TASK SECTION -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="label label-danger">5</span>   <i class="icon-tasks"></i>&nbsp; <i class="icon-chevron-down"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-tasks">
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong> Profile </strong>
                                                <span class="pull-right text-muted">40% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong> Pending Tasks </strong>
                                                <span class="pull-right text-muted">20% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong> Work Completed </strong>
                                                <span class="pull-right text-muted">60% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                    <span class="sr-only">60% Complete (warning)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong> Summary </strong>
                                                <span class="pull-right text-muted">80% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>See All Tasks</strong>
                                        <i class="icon-angle-right"></i>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <!--END TASK SECTION -->

                        <!--ALERTS SECTION -->
                        <li class="chat-panel dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="label label-info">8</span>   <i class="icon-comments"></i>&nbsp; <i class="icon-chevron-down"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-alerts">

                                <li>
                                    <a href="#">
                                        <div>
                                            <i class="icon-comment" ></i> New Comment
                                            <span class="pull-right text-muted small"> 4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <i class="icon-twitter info"></i> 3 New Follower
                                            <span class="pull-right text-muted small"> 9 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <i class="icon-envelope"></i> Message Sent
                                            <span class="pull-right text-muted small" > 20 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <i class="icon-tasks"></i> New Task
                                            <span class="pull-right text-muted small"> 1 Hour ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <i class="icon-upload"></i> Server Rebooted
                                            <span class="pull-right text-muted small"> 2 Hour ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>See All Alerts</strong>
                                        <i class="icon-angle-right"></i>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <!-- END ALERTS SECTION -->

                        <!--ADMIN SETTINGS SECTIONS -->

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                            </a>

                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#"><i class="icon-user"></i> User Profile </a>
                                </li>
                                <li><a href="#"><i class="icon-gear"></i> Settings </a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="{base_url}home/logout.html"><i class="icon-signout"></i> Sair </a>
                                </li>
                            </ul>

                        </li>
                        <!--END ADMIN SETTINGS -->
                    </ul>

                </nav>

            </div>
            <!-- END HEADER SECTION -->

            <!-- MENU SECTION -->

            {view_menu}
            <!--END MENU SECTION -->
            {view_conteudo}

            <!-- RIGHT STRIP  SECTION -->
            {view_lateralDireita}

            <!-- END RIGHT STRIP  SECTION -->
        </div>

        <!--END MAIN WRAPPER -->

        <!-- FOOTER -->
        <div id="footer">
            <p>&copy;  {nome_site} &nbsp;<?= date('Y') ?> &nbsp;|&nbsp; developer by: <a href="mailto:ivan.rufino.m@gmail?Subject=send_by_aggendar" >Ivan Rufino</a>&nbsp;|&nbsp;Versão Alfa  </p>
        </div>
        <!--END FOOTER -->

        {js_list}
    </body>

    <!-- END BODY -->
</html>
<!--
Só uma revisão:
3.2.1
3 = versão completa
2 = pequenas adições
1 = correções de segurança
-->