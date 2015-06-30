<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datepicker/css/datepicker.css" />
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />
<script src="<?= base_url() ?>assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
<script>
    $("document").ready(function () {
       $('#start').datepicker({
        format: 'yyyy-mm-dd'
            }).on('changeDate', function (ev) {                
                $(this).datepicker('hide');
            });
        $('.timepicker-24').timepicker({
        minuteStep: 5,
        showSeconds: false,
        showMeridian: false
    });
    
        carregaFunc_sala($("#servico option:selected" ).val());
        $("#servico").change(function(){
            carregaFunc_sala($(this).val()); //alert($(this).val())
        })
        function carregaFunc_sala(cod_servico){
            $(".loading").show();
            $("#func_sala").load("<?=base_url()?>evento/getFuncSalas/"+cod_servico,
            function(){
                $(".loading").hide(500);
            }
                    ) //html("<option>algo selecionado"+cod_servico+"</option>")
        }
    })
</script>
<div class="col-md-12">
     
    <div class='row'>
    <div class='col-md-10 '>
        <div class="input-group input-prepend" >
            <span class="input-group-addon add-on">Serviços</span>
            <select class="form-control"  id="servico">
                <?php 
                foreach ($servicos as $servico) {
                    echo "<option value='{$servico['CODIGO']}' data-text-color='{$servico['TEXTCOLOR']}' data-border-color='{$servico['BORDERCOLOR']}' data-background-color='{$servico['BACKGROUNDCOLOR']}' >{$servico['NOME']}</option>";
                }
                ?>
                <??>
                
            </select>
            <!--<input class="form-control" type="text" value=""  id="servico"/>-->
            

        </div>
    </div>
        
    </div>
    <br>
    <div class='row'>
    <div class='col-md-10 '>
        <div class="input-group input-prepend" >
            <span class="input-group-addon add-on">Agenda de:</span>
            <select class="form-control"  id="func_sala" name="cod_funcionario_sala">
                <option value="0">
                    Selecione um serviço
                </option>
            </select>
            <!--<input class="form-control" type="text" value=""  id="servico"/>-->
            

        </div>
    </div>
    </div>
    <br>
     <div class='row'>
    <div class='col-md-10 '>
        <div class="input-group input-prepend" >
            <span class="input-group-addon add-on">Agendar para:</span>
            <select class="form-control"  id="func_sala" name="cliente">
                <option value="1">Ivan</option>
                <option value="1">Tiago</option>
                
            </select>
            <!--<input class="form-control" type="text" value=""  id="servico"/>-->
            

        </div>
    </div>
    </div>
    <br>
    <div class='row'>
    <div class="col-md-4">
        <div class="input-group input-append  " id="dataStart" data-date="2015-06-27"
             data-date-format="yyyy-mm-dd">
            <input class="form-control" type="text" value="2015-06-27"  name="dataStart" id="start" />
            <span class="input-group-addon "><i class="icon-calendar"></i></span>

        </div>
        
    </div>
<div class="col-md-4">
        <div class="input-group input-append  " id="dataEnd" data-date="2015-06-27"
             data-date-format="yyyy-mm-dd">
            <input class="form-control" type="text" value="2015-06-27"  name="dataEnd" id="end" />
            <span class="input-group-addon "><i class="icon-calendar"></i></span>

        </div>
        
    </div>  
    </div>
    <br>
    <div class='row'>
    <div class="col-md-6">
        <div class="input-group bootstrap-timepicker">
            <input class="timepicker-24 form-control" type="text"  name="timeStart" id="timeStart"/>
            <span class="input-group-addon add-on"><i class="icon-time"></i>&nbsp;Inicio</span>
        </div>
    </div>
<!--    <div class="col-md-6">
        <div class="input-group input-append date dataAgendamento" id="dataStart" data-date="27-06-2015"
             data-date-format="dd-mm-yyyy">
            <input class="form-control" type="text" value="27-06-2015" readonly="" id="end"/>
            <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>

        </div>
        
    </div>-->
    <div class="col-md-6">
        <div class="input-group bootstrap-timepicker">
            <input class="timepicker-24 form-control" type="text"  name="timeEnd" id="timeEnd"/>
            <span class="input-group-addon add-on"><i class="icon-time"></i>&nbsp; Fim</span>
        </div>
    </div>
    <div class="col-md-6 ">
        <div class="input-group ">
            <input class="form-control" type="text"  value='' name="allday" id="allday"  readonly=""/>
            <span class="input-group-addon add-on"><i class="icon-time"></i>&nbsp;</span>
        </div>
    </div>
</div>
    
</div>
<div class='clearfix'> <span class="loading">Carregando...</span></div>
<div class="alert msg"></div>