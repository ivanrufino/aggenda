<style>
    .inicial{font-size: 30px;color: #0097A8;text-decoration: none                                                                                                                                                                                           }
    .link_inicial{background-color: #0097A8;text-decoration: none !important;}
</style>
<div id="left" class="" >
    <div class="media user-media well-small">
        <a class="user-link link_inicial " href="{base_url}/admin/config">
            <span class='inicial media-object img-thumbnail user-img'> <?=$iniciais;?></span>
            <!--<img class="media-object img-thumbnail user-img" alt="User Picture" src="<?= base_url() ?>assets/images/template_associado/user.gif" />-->
        </a>
        <br />
        <div class="media-body">
            <h3 class="media-heading"> <?= $associado['NOME_RESPONSAVEL'] ?> </h3>
            <!--                    <ul class="list-unstyled user-info">                        
                                    <li> <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online </li>                       
                                </ul>-->
        </div>
        <br />
    </div>
    <?php  $local_atual = $this->router->method; ?>
    <ul id="menu" class="collapse">                
        <li class=" <?= ativar('painel',$local_atual); ?>"><a href="{base_url}admin/painel.html" ><i class="icon-table"></i> Painel</a></li>

        <li class=" <?= ativar('index',$local_atual); ?>"><a href="{base_url}admin/calendario"><i class="icon-calendar"></i> Calendário</a></li>
        <li class="<?= ativar('clientes',$local_atual); ?>"><a href="{base_url}admin/clientes"><i class="icon-user"></i> Clientes &nbsp; <span class="label label-default">{num_cliente}</span></a></li>
        
        <!--<li class="<?= ativar('servico',$local_atual); ?>"><a href="{base_url}admin/servico"><i class="icon-user"></i> Serviços &nbsp; <span class="label label-default">10</span></a></li>-->
        <li class="panel <?= ativar('servico',$local_atual); ?>">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-serv">
                <i class="icon-pencil"></i> Todos os Serviços

                <span class="pull-right">
                    <i class="icon-angle-left"></i>
                </span>
                &nbsp; <span class="label label-success">{num_servico}</span>&nbsp;
            </a>
            <ul class="collapse" id="form-serv">
                <?php foreach ($servicos as $servico) { ?>
                    <li class=""><a href="{base_url}admin/servico/<?=$servico['CODIGO']?>"><i class="icon-angle-right"></i> <?=$servico['NOME'] ?></a></li>
                <?php } ?>
                
<!--                <li class=""><a href="forms_general.html"><i class="icon-angle-right"></i> General </a></li>
                <li class=""><a href="forms_advance.html"><i class="icon-angle-right"></i> Advance </a></li>
                <li class=""><a href="forms_validation.html"><i class="icon-angle-right"></i> Validation </a></li>
                <li class=""><a href="forms_fileupload.html"><i class="icon-angle-right"></i> FileUpload </a></li>
                <li class=""><a href="forms_editors.html"><i class="icon-angle-right"></i> WYSIWYG / Editor </a></li>-->
            </ul>
        </li>
        <?php if ($associado['TIPO_SEGMENTO']=='1'): ?>
        <li class="panel <?= ativar('funcionario',$local_atual); ?>">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-func">
                <i class="icon-pencil"></i> Todos os funcionários

                <span class="pull-right">
                    <i class="icon-angle-left"></i>
                </span>
                &nbsp; <span class="label label-success">{num_func_sala}</span>&nbsp;
            </a>
            <ul class="collapse" id="form-func">
                <?php foreach ($func_salas as $func_sala) { 
                   // die(print_r($associado));
                   
                    ?>
                    <li class=""><a href="{base_url}admin/funcionario/<?=$func_sala['CODIGO']?>"><i class="icon-angle-right"></i> <?=$func_sala['NOME'] ?></a></li>
                <?php } ?>
<!--                <li class=""><a href="forms_general.html"><i class="icon-angle-right"></i> General </a></li>
                <li class=""><a href="forms_advance.html"><i class="icon-angle-right"></i> Advance </a></li>
                <li class=""><a href="forms_validation.html"><i class="icon-angle-right"></i> Validation </a></li>
                <li class=""><a href="forms_fileupload.html"><i class="icon-angle-right"></i> FileUpload </a></li>
                <li class=""><a href="forms_editors.html"><i class="icon-angle-right"></i> WYSIWYG / Editor </a></li>-->
            </ul>
        </li>
        
        <?php else : ?>
        <li class="panel <?= ativar('funcionario',$local_atual); ?>">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-loc">
                <i class="icon-pencil"></i> Todos os Locais

                <span class="pull-right">
                    <i class="icon-angle-left"></i>
                </span>
                &nbsp; <span class="label label-success">{num_func_sala}</span>&nbsp;
            </a>
            <ul class="collapse" id="form-loc">
                <?php foreach ($func_salas as $func_sala) { 
                   // die(print_r($associado));
                   
                    ?>
                    <li class=""><a href="{base_url}admin/local/<?=$func_sala['CODIGO']?>"><i class="icon-angle-right"></i> <?=$func_sala['NOME'] ?></a></li>
                <?php } ?>
<!--                <li class=""><a href="forms_general.html"><i class="icon-angle-right"></i> General </a></li>
                <li class=""><a href="forms_advance.html"><i class="icon-angle-right"></i> Advance </a></li>
                <li class=""><a href="forms_validation.html"><i class="icon-angle-right"></i> Validation </a></li>
                <li class=""><a href="forms_fileupload.html"><i class="icon-angle-right"></i> FileUpload </a></li>
                <li class=""><a href="forms_editors.html"><i class="icon-angle-right"></i> WYSIWYG / Editor </a></li>-->
            </ul>
        </li>
        
        <?php endif ?>
<!--  
        <li class="panel ">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                <i class="icon-tasks"> </i> UI Elements     

                <span class="pull-right">
                    <i class="icon-angle-left"></i>
                </span>
                &nbsp; <span class="label label-default">10</span>&nbsp;
            </a>
            <ul class="collapse" id="component-nav">

                <li class=""><a href="button.html"><i class="icon-angle-right"></i> Buttons </a></li>
                <li class=""><a href="icon.html"><i class="icon-angle-right"></i> Icons </a></li>
                <li class=""><a href="progress.html"><i class="icon-angle-right"></i> Progress </a></li>
                <li class=""><a href="tabs_panels.html"><i class="icon-angle-right"></i> Tabs & Panels </a></li>
                <li class=""><a href="notifications.html"><i class="icon-angle-right"></i> Notification </a></li>
                <li class=""><a href="more_notifications.html"><i class="icon-angle-right"></i> More Notification </a></li>
                <li class=""><a href="modals.html"><i class="icon-angle-right"></i> Modals </a></li>
                <li class=""><a href="wizard.html"><i class="icon-angle-right"></i> Wizard </a></li>
                <li class=""><a href="sliders.html"><i class="icon-angle-right"></i> Sliders </a></li>
                <li class=""><a href="typography.html"><i class="icon-angle-right"></i> Typography </a></li>
            </ul>
        </li>
      
        <li class="panel ">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                <i class="icon-pencil"></i> Forms

                <span class="pull-right">
                    <i class="icon-angle-left"></i>
                </span>
                &nbsp; <span class="label label-success">5</span>&nbsp;
            </a>
            <ul class="collapse" id="form-nav">
                <li class=""><a href="forms_general.html"><i class="icon-angle-right"></i> General </a></li>
                <li class=""><a href="forms_advance.html"><i class="icon-angle-right"></i> Advance </a></li>
                <li class=""><a href="forms_validation.html"><i class="icon-angle-right"></i> Validation </a></li>
                <li class=""><a href="forms_fileupload.html"><i class="icon-angle-right"></i> FileUpload </a></li>
                <li class=""><a href="forms_editors.html"><i class="icon-angle-right"></i> WYSIWYG / Editor </a></li>
            </ul>
        </li>

        <li class="panel">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
                <i class="icon-table"></i> Pages

                <span class="pull-right">
                    <i class="icon-angle-left"></i>
                </span>
                &nbsp; <span class="label label-info">6</span>&nbsp;
            </a>
            <ul class="collapse" id="pagesr-nav">
                <li><a href="pages_calendar.html"><i class="icon-angle-right"></i> Calendar </a></li>
                <li><a href="pages_timeline.html"><i class="icon-angle-right"></i> Timeline </a></li>
                <li><a href="pages_social.html"><i class="icon-angle-right"></i> Social </a></li>
                <li><a href="pages_pricing.html"><i class="icon-angle-right"></i> Pricing </a></li>
                <li><a href="pages_offline.html"><i class="icon-angle-right"></i> Offline </a></li>
                <li><a href="pages_uc.html"><i class="icon-angle-right"></i> Under Construction </a></li>
            </ul>
        </li>
        <li class="panel">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav">
                <i class="icon-bar-chart"></i> Charts

                <span class="pull-right">
                    <i class="icon-angle-left"></i>
                </span>
                &nbsp; <span class="label label-danger">4</span>&nbsp;
            </a>
            <ul class="collapse" id="chart-nav">



                <li><a href="charts_line.html"><i class="icon-angle-right"></i> Line Charts </a></li>
                <li><a href="charts_bar.html"><i class="icon-angle-right"></i> Bar Charts</a></li>
                <li><a href="charts_pie.html"><i class="icon-angle-right"></i> Pie Charts </a></li>
                <li><a href="charts_other.html"><i class="icon-angle-right"></i> other Charts </a></li>
            </ul>
        </li>

        <li class="panel">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                <i class=" icon-sitemap"></i> 3 Level Menu

                <span class="pull-right">
                    <i class="icon-angle-left"></i>
                </span>
            </a>
            <ul class="collapse" id="DDL-nav">
                <li>
                    <a href="#" data-parent="#DDL-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL1-nav">
                        <i class="icon-sitemap"></i>&nbsp; Demo Link 1

                        <span class="pull-right" style="margin-right: 20px;">
                            <i class="icon-angle-left"></i>
                        </span>


                    </a>
                    <ul class="collapse" id="DDL1-nav">
                        <li>
                            <a href="#"><i class="icon-angle-right"></i> Demo Link 1 </a>

                        </li>
                        <li>
                            <a href="#"><i class="icon-angle-right"></i> Demo Link 2 </a></li>
                        <li>
                            <a href="#"><i class="icon-angle-right"></i> Demo Link 3 </a></li>

                    </ul>

                </li>
                <li><a href="#"><i class="icon-angle-right"></i> Demo Link 2 </a></li>
                <li><a href="#"><i class="icon-angle-right"></i> Demo Link 3 </a></li>
                <li><a href="#"><i class="icon-angle-right"></i> Demo Link 4 </a></li>
            </ul>
        </li>
        <li class="panel">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4-nav">
                <i class=" icon-folder-open-alt"></i> 4 Level Menu

                <span class="pull-right">
                    <i class="icon-angle-left"></i>
                </span>
            </a>
            <ul class="collapse" id="DDL4-nav">
                <li>
                    <a href="#" data-parent="DDL4-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4_1-nav">
                        <i class="icon-sitemap"></i>&nbsp; Demo Link 1

                        <span class="pull-right" style="margin-right: 20px;">
                            <i class="icon-angle-left"></i>
                        </span>


                    </a>
                    <ul class="collapse" id="DDL4_1-nav">
                        <li>

                            <a href="#" data-parent="#DDL4_1-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4_2-nav">
                                <i class="icon-sitemap"></i>&nbsp; Demo Link 1

                                <span class="pull-right" style="margin-right: 20px;">
                                    <i class="icon-angle-left"></i>
                                </span>
                            </a>
                            <ul class="collapse" id="DDL4_2-nav">



                                <li><a href="#"><i class="icon-angle-right"></i> Demo Link 1 </a></li>
                                <li><a href="#"><i class="icon-angle-right"></i> Demo Link 2 </a></li>
                            </ul>



                        </li>
                        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 2 </a></li>
                        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 3 </a></li>
                    </ul>

                </li>
                <li><a href="#"><i class="icon-angle-right"></i> Demo Link 2 </a></li>
                <li><a href="#"><i class="icon-angle-right"></i> Demo Link 3 </a></li>
                <li><a href="#"><i class="icon-angle-right"></i> Demo Link 4 </a></li>
            </ul>
        </li>
        <li class="panel">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#error-nav">
                <i class="icon-warning-sign"></i> Error Pages

                <span class="pull-right">
                    <i class="icon-angle-left"></i>
                </span>
                &nbsp; <span class="label label-warning">5</span>&nbsp;
            </a>
            <ul class="collapse" id="error-nav">
                <li><a href="errors_403.html"><i class="icon-angle-right"></i> Error 403  </a></li>
                <li><a href="errors_404.html"><i class="icon-angle-right"></i> Error 404  </a></li>
                <li><a href="errors_405.html"><i class="icon-angle-right"></i> Error 405  </a></li>
                <li><a href="errors_500.html"><i class="icon-angle-right"></i> Error 500  </a></li>
                <li><a href="errors_503.html"><i class="icon-angle-right"></i> Error 503  </a></li>
            </ul>
        </li>

        
        <li><a href="tables.html"><i class="icon-table"></i> Data Tables </a></li>
        <li><a href="maps.html"><i class="icon-map-marker"></i> Maps </a></li>

        <li><a href="grid.html"><i class="icon-columns"></i> Grid </a></li>
        <li class="panel">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav">
                <i class="icon-check-empty"></i> Blank Pages

                <span class="pull-right">
                    <i class="icon-angle-left"></i>
                </span>
                &nbsp; <span class="label label-success">2</span>&nbsp;
            </a>
            <ul class="collapse" id="blank-nav">

                <li><a href="blank.html"><i class="icon-angle-right"></i> Blank Page One  </a></li>
                <li><a href="blank2.html"><i class="icon-angle-right"></i> Blank Page Two  </a></li>
            </ul>
        </li>
        <li><a href="login.html"><i class="icon-signin"></i> Login Page </a></li>
        -->
    </ul>

</div>
<?php

function ativar($local,$local_atual){
    return  $local_atual==$local? "active":"" ;   
    
}
?>