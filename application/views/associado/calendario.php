<link href='{local}css/fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='{local}css/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='{local}js/moment.min.js'></script>
<!--<script src='../lib/jquery.min.js'></script>-->
<script src='{local}js/fullcalendar/fullcalendar.min.js'></script>
<script src='{local}js/fullcalendar/lang-all.js'></script>

<script>

    $(document).ready(function () {
        var timeDefault = "00:45:00";
        $('#calendar').fullCalendar({
            allDaySlot: <?= $horario['DIA_TODO'] ?>,
            forceEventDuration: true,
            defaultView: 'agendaWeek',
            minTime: "<?= $horario['HORA_INICIO'] ?>",
            maxTime: "<?= $horario['HORA_FIM'] ?>",
            //  scrollTime: '<?= date('H:m') ?>',
            snapDuration: "00:15:00",
            defaultTimedEventDuration: timeDefault,
            slotDuration: "00:15:00",
            //weekends: false,
            businessHours: {
                start: '<?= $horario['HORA_INICIO'] ?>', // a start time (10am in this example)
                end: '<?= $horario['HORA_FIM'] ?>', // an end time (6pm in this example)

                dow: <?= $horario['DIAS_DE_TRABALHO'] ?>,
                // days of week. an array of zero-based day of week integers (0=Sunday)
                // (Monday-Thursday in this example)
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            //defaultDate: '2015-06-16',
            lang: 'pt-br',
            selectable: true,
            selectHelper: true,
            select: function (start, end) {
                var dias=calculateDays(start,end);
                
                if(dias>= 1){                    
                    $('#createEvent').modal().find('#timeStart').parent().hide();
                    $('#createEvent').modal().find('#timeEnd').parent().hide();
                    $('#createEvent').modal().find('#allday').parent().show();
                    $('#createEvent').modal().find('#allday').val('Dia_Todo');
                }else{
                    $('#createEvent').modal().find('#timeStart').parent().show();
                    $('#createEvent').modal().find('#timeEnd').parent().show();
                    $('#createEvent').modal().find('#allday').parent().hide();
                    $('#createEvent').modal().find('#allday').val(' ');
                    
                }
                if(dias >= 2){                    
                    $('#createEvent').modal().find('#end').parent().show();
                }else{
                    $('#createEvent').modal().find('#end').parent().hide();
                }
                var dateStart = start.format("YYYY-MM-DD");
                var timeStart = start.format("HH:mm")
                var dateEnd = end.format("YYYY-MM-DD");
                var timeEnd = end.format("HH:mm")
                $('#createEvent').modal().find('#start').val(dateStart);
                $('#createEvent').modal().find('#timeStart').val(timeStart);
                $('#createEvent').modal().find('#end').val(dateEnd);
                $('#createEvent').modal().find('#timeEnd').val(timeEnd);

                /*
                 var title = prompt('Event Title:');
                 var eventData;
                 if (title) {
                 eventData = {
                 title: title,
                 start: start,
                 end: end
                 };
                 $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                 } */

                // $('#calendar').fullCalendar('unselect');
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            /*
             //            eventClick: function (calEvent, jsEvent, view) {
             //
             //            alert('Event: ' + calEvent.title);
             //                    alert('start' + calEvent.start);
             //                    console.log(calEvent);
             //                    // alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
             //                    alert('View: ' + view.name);
             //                    // change the border color just for fun
             //                    $(this).css('border-color', 'red');
             //            },
             //            events: [
             //                {
             //                    title: 'All Day Event',
             //                    start: '2015-02-01'
             //                },
             //                {
             //                    title: 'feriado',
             //                    start: '2015-06-07',
             //                    end: '2015-06-10',
             //                    rendering: 'background'
             //                },
             //                {
             //                    id: 999,
             //                    title: 'Repeating Event',
             //                    start: '2015-06-16T16:00:00',
             //                    end: '2015-06-16T16:45:00'
             //                },
             //                {
             //                    id: 999,
             //                    title: 'Repeating Event',
             //                    start: '2015-06-17T16:45:00',
             //                    end: '2015-06-17T17:30:00'
             //                },
             //                {
             //                    title: 'Conference',
             //                    start: '2015-02-11',
             //                    end: '2015-02-13'
             //                },
             //                {
             //                    title: 'Meeting',
             //                    start: '2015-02-12T10:30:00',
             //                    end: '2015-02-12T12:30:00'
             //                },
             //                {
             //                    title: 'Lunch',
             //                    start: '2015-02-12T12:00:00'
             //                },
             //                {
             //                    title: 'Meeting',
             //                    start: '2015-02-12T14:30:00'
             //                },
             //                {
             //                    title: 'Happy Hour',
             //                    start: '2015-02-12T17:30:00'
             //                },
             //                {
             //                    title: 'Dinner',
             //                    start: '2015-02-12T20:00:00'
             //                },
             //                {
             //                    title: 'Birthday Party',
             //                    start: '2015-02-13T07:00:00'
             //                },
             //                {
             //                    title: 'Click for Google',
             //                    url: 'http://google.com/',
             //                    start: '2015-02-28'
             //                },
             //            ], */
            eventSources: [
                // your event source
                {
                    url: '{base_url}evento/getEventos/serv/func.html', // use the `url` property
                    type: 'POST',
                    data: {
                        custom_param1: 'something',
                        custom_param2: 'somethingelse'
                    },
                    error: function () {
                        alert('Não há eventos registrados!');
                    },
                    //  color: 'yellow', // a non-ajax option
                    textColor: 'black' // a non-ajax option
                }

                // any other sources...

            ],
            eventRender: function (event, element) {
                element.click(function () {
                    //showModal();
                    $('#myModal').modal();
                })
            }

        });

        $("#saveEvent").click(function () {
            var modal = $('#createEvent')
            modal.find('#salvar').val('salvar');
            //  $('#createEvent').modal('hide');

            var options = {
               // target: '.msg', // target element(s) to be updated with server response 
                //  beforeSubmit:  showRequest,  // pre-submit callback 
                success: verificaRetorno, // post-submit callback 

                // other available options: 
                //url:       url         // override for form's 'action' attribute 
                //type:      type        // 'get' or 'post', override for form's 'method' attribute 
                dataType: 'json'       // 'xml', 'script', or 'json' (expected server response type) 
                        //clearForm: true        // clear all form fields after successful submit 
                        //resetForm: true        // reset the form after successful submit 

                        // $.ajax options can be used here too, for example: 
                        //timeout:   3000 
            };

            // bind form using 'ajaxForm' 
            $('#formAgendamento').ajaxSubmit(options);

        })
        //createEvent
        $('#createEvent').on('show.bs.modal', function (event) {
            $(this).find("#saveEvent").removeAttr('disabled');
            $(this).find(".msg").html('');
        })
        function verificaRetorno(data) {
            if (data.success) {
               criarEvento(data.evento);
                 $(".msg").html(data.msg)
                 console.log(data.evento)
                $('#createEvent').find("#saveEvent").attr('disabled', 'disabled');

            } else {
                $(".msg").html(data.erros)
            }

        }
        function criarEvento(evento) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var modal = $('#createEvent')
            //if (modal.find('#salvar').val() == 'salvar') {
//                var eventStart = modal.find('#start').val();// + "T" + modal.find('#timeStart').val();
//                var eventEnd = modal.find('#end').val() ;//+ "T" + modal.find('#timeEnd').val();
//                var eventTitle = modal.find('#start').val()
                var allday = $('#createEvent').modal().find('#allday').val();
                var backgroundColor = modal.find('#servico option:selected').data('backgroundColor');
                
                var eventData = {
                    title: evento.title,
                    start: evento.start, //"2015-06-25",
                    end: evento.end,
                    allday:evento.allday,
                    backgroundColor: backgroundColor,
                    textColor: '#000'
                };
                $('#calendar').fullCalendar('renderEvent', eventData, true);
            //}
        }
        function calculateDays(start,end) {
            var dateStart = new Date(start);
            var dateEnd = new Date(end);
            var days =  dateEnd -dateStart;
            console.log(days/86400000)
            return days/86400000;
        }
        ;
    });

</script>

<div id="content">
    <div class="inner" style="min-height:650px;padding-top: 20px" id='calendar'></div>
</div>


<!--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Criar um agendamento</h4>
            </div>
            <div class="modal-body">
                <form id="formAgendamento" method="POST" action="{base_url}evento/criarEvento">
                    {view_agendamento}
                    <input type="hidden" id="salvar" readonly="" disabled="">
                </form>
<!--               Inicio<input type="text" id="start" value='2015-06-25T10:30:00'><br>
 Fim<input type="text" id="end">-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="saveEvent">Salvar Alterações</button>
            </div>
        </div>
    </div>
</div>


