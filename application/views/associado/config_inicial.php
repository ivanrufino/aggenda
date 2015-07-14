<!-- PAGE LEVEL STYLES -->
<link href="{base_url}assets/plugins/jquery-steps-master/demo/css/normalize.css" rel="stylesheet" />
<link href="{base_url}assets/plugins/jquery-steps-master/demo/css/wizardMain.css" rel="stylesheet" />
<link href="{base_url}assets/plugins/jquery-steps-master/demo/css/jquery.steps.css" rel="stylesheet" />    
<!-- END PAGE LEVEL  STYLES --> 
<!-- PAGE LEVEL SCRIPTS -->
<script src="{base_url}assets/plugins/jquery-steps-master/lib/jquery.cookie-1.3.1.js"></script>
<script src="{base_url}assets/plugins/jquery-steps-master/build/jquery.steps.js"></script>   

<!--END PAGE LEVEL SCRIPTS -->
<!--PAGE CONTENT -->

<div id="" class='col-md-10 col-md-offset-1'>

    <div class="inner" style="min-height:700px;">
        <div class="row">
            <div class="col-lg-12">


                <h2> Configurações Iniciais </h2>
                <p>Estes passos são para os ajustes iniciais de sua empresa, ao término já poderá criar seus agendamentos.</p>



            </div>
        </div>

        <hr />


        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <!--                        Vertical Wizard-->
                    </div>
                    <div class="panel-body">
                        <div id="wizardV" >
                            <h2> Empresa </h2>
                            <section>

                                <form role="form" id='configInicial' action="{base_url}admin/updateConfigInicial" method="POST">
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <label>Seu cadastro será de empresa ou pessoa física?</label>
                                            <select class="form-control" name="TIPO" id="tipo">
                                                <option value="J">Empresa</option>
                                                <option value="F">Pessoa Física</option>
                                            </select>
                                            <p class="help-block hide">Example block-level help text here.</p>
                                        </div>
                                    </div>
                                    <br><br>    <br><br>    
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Área de atuação</label>
                                            <select class="form-control">
                                                <?php foreach ($segmentos as $segmento) { ?>
                                                    <option value="<?= $segmento['CODIGO'] ?>"><?= $segmento['NOME'] ?></option>
                                                <?php } ?>



                                            </select>
                                            <p class="help-block hide">Example block-level help text here.</p>
                                        </div>
                                        <div class="col-md-6 outros" style="display: none" >
                                            <label>Segmento</label>
                                            <select class="form-control" >
                                                <option value="1">Serviços</option>
                                                <option value="2">Locação de salas, Quartos, etc </option>

                                            </select>
                                            <p class="help-block hide">Example block-level help text here.</p>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label><br>Quem será o responsável por manter a agenda</label>
                                        <div class="col-md-6">

                                            <label>Nome</label>
                                            <input class="form-control" id='nome_responsavel' name='nome_responsavel' placeholder="nome"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Sobrenome</label>
                                            <input class="form-control" id='sobrenome_responsavel' name='sobrenome_responsavel' placeholder="Sobrenome" />
                                        </div>
                                        <p class="help-block small ">&nbsp;</p>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label id="lbl_nome">Seu nome ou Razão social </label>
                                            <input class="form-control" name='NOME' id='nome' placeholder="Razão Social"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label id='lbl_cpf_cnpj'>CNPJ/CPF</label>
                                            <input class="form-control" nome='cpf_cnpj' id='cpf_cnpj' placeholder="CNJP ou CPF"/>
                                        </div>
                                        <p class="help-block small">Digite sua inscrição de acordo com a opção de pessoa física ou empresa.</p>
                                    </div>

                                    <!--                                    <div class="form-group">
                                                                            <div class="col-md-6">
                                                                                <label>Qual sua área de atuação</label>
                                                                                <select class="form-control">
                                                                                    <option>Salão de Beleza</option>
                                                                                    <option>Clinica Médica</option>
                                                                                    <option>Outros</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-6 hide">
                                                                                <label>Outros</label>
                                                                                <input class="form-control" />
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                            <p class="help-block hide">Example block-level help text here.</p>
                                                                        </div>-->




                                    <!--                                </form>-->

                            </section>

                            <h2> Dados do Sistema </h2>
                            <section>
                                <!--                                <form role="form">-->
                                <div class="form-group">
                                    <label> Como será sua URL </label>
                                    <div class="input-group">
                                        <div class="input-group-addon  alert-info" >www.aggenda.com/</div>
                                        <input type="text" class="form-control" id="url" name='url' placeholder="minha_empresa">
                                        <!--<div class="input-group-addon">.00</div>-->
                                    </div>
                                    <p class="help-block">Como seus clientes poderão te encontrar.</p>
                                </div>
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input class="form-control" name='telefone'/>
                                    <p class="help-block hide">Example block-level help text here.</p>
                                </div>

                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type='file' class="form-control" name='logo' />
                                    <p class="help-block">Escolha uma imagem *.jpg ou *.png com tamanho de 280px por 100px</p>
                                </div>


                            </section>

                            <h2>Endereço e Horarios</h2>
                            <section>
                                <!--                                <form role="form">-->

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label> Cep </label>
                                        <input class="form-control" />
                                        <p class="help-block hide">Example block-level help text here.</p>
                                    </div>
                                    <div class="col-md-8">
                                        <label> Endereço </label>
                                        <input class="form-control" placeholder="rua, avenida, número"/>
                                        <p class="help-block hide">Example block-level help text here.</p>
                                    </div>
                                    
                                </div>
                                <br><br><br>
                                <div class="form-group">
                                    <div class="col-md-8">
                                    <label> Cidade </label>
                                    <input class="form-control" />
                                    <p class="help-block hide">Example block-level help text here.</p>
                                </div>
                                    <div class="col-md-4">
                                    <label> Estado </label>
                                    <input class="form-control " />
                                    <p class="help-block hide">Example block-level help text here.</p>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="col-md-5">
                                <label>Dia/Horário de Funcionamento</label><br>
                                
                                <select id='DIA' multiple="multiple" class="form-control">
                                    <option value="0">Todos&nbsp;os&nbsp;Dias</option>
                                    <option value="1">Domingo</option>
                                    <option value="2">Segunda-feira</option>
                                    <option value="3">Terça-feira</option>
                                    <option value="4">Quarta-feira</option>
                                    <option value="5">Quinta-feira</option>
                                    <option value="6">Sexta-feira</option>
                                    <option value="7">Sábado</option>
                                    
                                </select>
                                </div>
                                <div class="col-md-3">
                                <label>De</label><br>
                                <input type="time" name='hora_inicio'  id='hora_inicio'  value="08:00" class="form-control">
                                </div>
                                <div class="col-md-3">
                                <label>Até</label><br>
                                <input type="time" name='hora_fim'  id='hora_fim'  value='18:00' class="form-control">
                                </div>
                                <div class="col-md-1">
                                <br>
                                <a href="#" class='btn btn-default add'> Adcionar </a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12" id='horarios' style="overflow: scroll;height: 194px;"></div>
                                <!--</form>-->
                            </section>
                            <h2>Serviços</h2>
                            <section>
                                <div class="servdiv col-md-12" >
                                    Exemplo, manicure, pediatra, aluguel de salas.<br>
                                OBS: Máximo de 5 serviços para conta free.
                                <!--                                <form role="form">-->
                                
                                <div class="form-group " style="width: 94%">
                                    <div class="col-md-3">
                                    <label> Serviço </label>
                                    <input class="form-control" placeholder="" name='servico[]'/>
                                    
                                </div>
                                <div class="col-md-3">
                                    <label> Valor </label>
                                    <input class="form-control" name='valor[]'/>
                                   
                                </div>
                                <div class="col-md-5">
                                    <label> OBS </label>
                                    <textarea class="form-control" name="obs[]"></textarea>
                                    
                                </div>
                                    <div class="col-md-1 actionServ"><label>&nbsp;</label>
                                        <a href='' class='addServ btn btn-default'>Adcionar</a>
                                    </div>
                                </div>
                                <br id='fim'>
                                </div>
                            </section>
                            <h2>Funcionário/ local </h2>


                            <section>
                                dica: se o agendamento é para serviços, cadastre seus funcionários<br>
                                se for para locação de espaços, cadastre esses locais, salas, quartos etc.
                                <!--                                <form role="form">-->

                                <div class="form-group">
                                    <label> Endereço </label>
                                    <input class="form-control" placeholder="rua, avenida, número"/>
                                    <p class="help-block hide">Example block-level help text here.</p>
                                </div>
                                <div class="form-group">
                                    <label> Cep </label>
                                    <input class="form-control" />
                                    <p class="help-block hide">Example block-level help text here.</p>
                                </div>
                                <div class="form-group">
                                    <label> Cidade </label>
                                    <input class="form-control" />
                                    <p class="help-block hide">Example block-level help text here.</p>
                                </div>
                                <div class="form-group">
                                    <label> Estado </label>
                                    <input class="form-control " />
                                    <p class="help-block hide">Example block-level help text here.</p>
                                </div>

                                <!--</form>-->
                            </section>
                            <!--                            <h2>Finalizar</h2>
                                                        <section>
                                                            <p style="text-align:justify;color:gray;  overflow: auto;height: 100%;">
                                                                <b> Agreement & Declaration</b> <br /><br />
                                                                Morbi ornare tellus at elit ultrices id dignissim lorem elementum. Sed eget nisl at justo condimentum dapibus. Fusce eros justo, 
                                                                pellentesque non euismod ac, rutrum sed quam. Ut non mi tortor. Vestibulum eleifend varius ullamcorper. Aliquam erat volutpat.
                                                                <br />  <br /> 
                                                                Donec diam massa, porta vel dictum sit amet, iaculis ac massa. Sed elementum dui commodo lectus sollicitudin in auctor mauris 
                                                                venenatis. Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris vehicula vulputate. Aliquam sed sem tortor. 
                                                                Quisque sed felis ut mauris feugiat iaculis nec ac lectus. Sed consequat vestibulum purus, imperdiet varius est pellentesque vitae. 
                                                                Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo tortor.
                                                                <br />
                                                                <b> Agreement & Declaration</b> <br /><br />
                                                                Morbi ornare tellus at elit ultrices id dignissim lorem elementum. Sed eget nisl at justo condimentum dapibus. Fusce eros justo, 
                                                                pellentesque non euismod ac, rutrum sed quam. Ut non mi tortor. Vestibulum eleifend varius ullamcorper. Aliquam erat volutpat.
                                                                <br />  <br /> 
                                                                Donec diam massa, porta vel dictum sit amet, iaculis ac massa. Sed elementum dui commodo lectus sollicitudin in auctor mauris 
                                                                venenatis. Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris vehicula vulputate. Aliquam sed sem tortor. 
                                                                Quisque sed felis ut mauris feugiat iaculis nec ac lectus. Sed consequat vestibulum purus, imperdiet varius est pellentesque vitae. 
                                                                Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo tortor.
                                                                <br />
                                                                
                                                                
                                                                <br>
                            
                                                            </p>
                                                            <input type="checkbox" id='termo'/><label for="termo"> Termos de uso</label>
                                                        </section>-->

                        </div>
                    </div>                    
                </div>




            </div>
        </div>
        <!--        <div class="row">
                    <div class="col-lg-9">
        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Horizontal Wizard
                            </div>
                            <div class="panel-body">
                                <div id="wizard" >
                                    <h2> Personal </h2>
                                    <section>
        
                                        <form role="form">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input class="form-control" />
                                                <p class="help-block">Example block-level help text here.</p>
                                            </div>
        
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input class="form-control" />
                                                <p class="help-block">Example block-level help text here.</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" />
                                                <p class="help-block">Example block-level help text here.</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Retype Email</label>
                                                <input class="form-control" />
                                                <p class="help-block">Example block-level help text here.</p>
                                            </div>
        
        
                                        </form>
        
                                    </section>
        
                                    <h2> Login </h2>
                                    <section>
                                        <form role="form">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input class="form-control" />
                                                <p class="help-block">Example block-level help text here.</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" />
                                                <p class="help-block">Example block-level help text here.</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Retype Password</label>
                                                <input class="form-control" />
                                                <p class="help-block">Example block-level help text here.</p>
                                            </div>
                                            <div class="form-group">
                                                <label> Security Code </label>
                                                <input class="form-control" />
                                                <p class="help-block">Example block-level help text here.</p>
                                            </div>
        
                                        </form>
                                    </section>
        
                                    <h2>Extras </h2>
                                    <section>
                                        <form role="form">
                                            <div class="form-group">
                                                <label> Occupation </label>
                                                <input class="form-control" />
                                                <p class="help-block">Example block-level help text here.</p>
                                            </div>
                                            <div class="form-group">
                                                <label> Qualification </label>
                                                <input class="form-control" />
                                                <p class="help-block">Example block-level help text here.</p>
                                            </div>
                                            <div class="form-group">
                                                <label> Age </label>
                                                <input class="form-control" />
                                                <p class="help-block">Example block-level help text here.</p>
                                            </div>
                                            <div class="form-group">
                                                <label> Notes </label>
                                                <input class="form-control" />
                                                <p class="help-block">Example block-level help text here.</p>
                                            </div>
        
                                        </form>
                                    </section>
        
                                    <h2>Agreement</h2>
                                    <section>
                                        <p style="text-align:justify;color:gray;">
                                            <b> Agreement & Declaration</b> <br /><br />
                                            Morbi ornare tellus at elit ultrices id dignissim lorem elementum. Sed eget nisl at justo condimentum dapibus. Fusce eros justo, 
                                            pellentesque non euismod ac, rutrum sed quam. Ut non mi tortor. Vestibulum eleifend varius ullamcorper. Aliquam erat volutpat.
                                            <br />  <br /> 
                                            Donec diam massa, porta vel dictum sit amet, iaculis ac massa. Sed elementum dui commodo lectus sollicitudin in auctor mauris 
                                            venenatis. Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris vehicula vulputate. Aliquam sed sem tortor. 
                                            Quisque sed felis ut mauris feugiat iaculis nec ac lectus. Sed consequat vestibulum purus, imperdiet varius est pellentesque vitae. 
                                            Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo tortor.
                                            <br />
        
        
                                        </p>
                                    </section>
                                </div>
        
                            </div>
                        </div>
        
        
        
        
                    </div>
        
                </div>-->

    </div>





</div>
<!--END PAGE CONTENT -->
<script src="{base_url}assets/js/template_associado/WizardInit.js"></script>
<script>
    $(document).ready(function () {
        $(".add").click(function(){ 
            var val="" ;
            var texto="" ;
            var hora_in=$("#hora_inicio").val();
            var hora_fim=$("#hora_fim").val();
            $('#DIA :selected').each(function(i, selected){ 
                texto =  $(selected).text()+'&nbsp;-----&nbsp;de&nbsp;'+hora_in+"&nbsp;até&nbsp;"+hora_fim;               
                val =  $(selected).val(); 
               $('<div class="input-group"><div class="input-group-addon  alert-info" ><a class="remove">X</a></div> <input type="text" name="dias_de_trabalho_texto[]" value='+texto+' readonly="readonly" class="disabled form-control" />\n\
                    <input type="hidden" name="dias_de_trabalho[]" value='+val+' readonly="readonly" class="disabled" />\n\
                    <input type="hidden" name="hora_inicio[]" value='+hora_in+' readonly="readonly" class="disabled" />\n\
                    <input type="hidden" name="hora_fim[]" value='+hora_fim+' readonly="readonly" class="disabled" />\n\
                    </div>')
                       .appendTo('#horarios')

              });
           
            
          
            return false;
        })
        var contServ=1;
        $(".addServ").click(function(){
            if(contServ < 5){
                var clone=$(this).parent().parent().clone();
                clone.find(".addServ").removeClass("addServ").html('Remover').addClass('removeServ').addClass('btn-danger');//.appendTo($(this).parent().parent());
                clone.find('input,textarea').val(' ');
                clone.insertBefore($('#fim'));
                contServ++;
                
            }else{
                alert('Para Configuração inicial há um limite de 5 Serviços\n Insira mais após o cadastro inicial')
            }
            return false;
            
        })
        $('body').delegate('.removeServ','click', function(){
           $(this).parent().parent().remove();
           contServ--;
           
           return false;
        })
        $("#horarios").delegate('.remove', 'click', function(){
                var seletor = $(this).parent().parent();
                $(seletor).remove();
            return false;
        })
        $("#tipo").change(function () {

            if ($(this).val() == 'F') {
                $("#lbl_nome").parent().hide();
                $("#lbl_cpf_cnpj").html('CPF');
                $("#cpf_cnpj").attr('placeholder', 'CPF');

            } else {
                $("#lbl_nome").parent().show();
                $("#lbl_nome").html('Razão Social');
                $("#lbl_cpf_cnpj").html('CNPJ');
                $("#cpf_cnpj").attr('placeholder', 'CNPJ');
            }
        })
        $("#tipo").change();
        $(".actions a[href$='#finish']").click(function () {
            $("#configInicial").submit();
        })
    })

</script>