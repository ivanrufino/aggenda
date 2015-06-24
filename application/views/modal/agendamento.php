<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datepicker/css/datepicker.css" />
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />
<script src="<?= base_url() ?>assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
<script>
    $("document").ready(function () {
        $('.dataAgendamento').datepicker({
        format: 'yyyy-mm-dd'
            });
        $('.timepicker-24').timepicker({
        minuteStep: 5,
        showSeconds: true,
        showMeridian: false
    });

    })
</script>
<div class="col-md-12">
    <div class="col-md-12">
        <div class="input-group input-append date dataAgendamento" id="dataStart" data-date="2015-06-27"
             data-date-format="yyyy-mm-dd">
            <input class="form-control" type="text" value="2015-06-27" readonly="" id="start"/>
            <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>

        </div>
        
    </div>


    <div class="col-md-6">
        <div class="input-group bootstrap-timepicker">
            <input class="timepicker-24 form-control" type="text"  id="timeStart"/>
            <span class="input-group-addon add-on"><i class="icon-time"></i></span>
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
            <input class="timepicker-24 form-control" type="text"  id="timeEnd"/>
            <span class="input-group-addon add-on"><i class="icon-time"></i></span>
        </div>
    </div>

</div>