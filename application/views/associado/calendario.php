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
            hiddenDays: [3, 5, 0],
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
                var dias = calculateDays(start, end);

                if (dias >= 1) {
                    $('#createEvent').modal().find('#timeStart').parent().hide();
                    $('#createEvent').modal().find('#timeEnd').parent().hide();
                    $('#createEvent').modal().find('#allday').parent().show();
                    $('#createEvent').modal().find('#allday').val('Dia_Todo');
                } else {
                    $('#createEvent').modal().find('#timeStart').parent().show();
                    $('#createEvent').modal().find('#timeEnd').parent().show();
                    $('#createEvent').modal().find('#allday').parent().hide();
                    $('#createEvent').modal().find('#allday').val(' ');

                }
                if (dias >= 2) {
                    $('#createEvent').modal().find('#end').parent().show();
                } else {
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

            eventSources: [
                // your event source
                {
                    url: '{base_url}evento/getEventos/serv/func.html', // use the `url` property
                    type: 'POST',
                    data: {
                    },
                    error: function () {
                        alert('Não há eventos registrados!');
                    },
                    //  color: 'yellow', // a non-ajax option
                    textColor: 'black' // a non-ajax option
                }

                // any other sources...

            ],
            eventClick: function (calEvent, jsEvent, view) {
                console.log(calEvent)
                $('#calendar').fullCalendar('removeEvents', calEvent._id)

            },
            eventRender: function (event, element) {
                /*element.click(function () {
                 //                    alert(event.CODIGO)
                 //                    event.title = "CLICKED!";
                 event.id= event.CODIGO;
                 console.log(event.id);
                 //editar ou    
                 //$('#calendar').fullCalendar('updateEvent', event);
                 //remover
                 $('#calendar').fullCalendar('removeEvents', event.id);
                 //$('#myModal').modal();
                 //logo apos renderizar novamento
                 //  $('#calendar').fullCalendar( 'render' )
                 
                 })*/
            },
            eventDrop: function (event, delta, revertFunc) {
                //console.log(delta);
//                alert(event.title + " was dropped on " + event.start.format());
                if (!confirm("Are you sure about this change?")) {
                    revertFunc();
                }
            },
            eventResize: function (event, delta, revertFunc) {
                console.log(delta);
                alert(event.title + " end is now " + event.end.format());
                if (!confirm("is this okay?")) {
                    revertFunc();
                }
            }

        });

        $("#saveEvent").click(function () { //iniciar o salvamento de um evento
            var modal = $('#createEvent')
            modal.find('#salvar').val('salvar');
            var options = {
                success: verificaRetorno, // post-submit callback 
                dataType: 'json'       // 'xml', 'script', or 'json' (expected server response type) 
            };
            $('#formAgendamento').ajaxSubmit(options);
        })
        $('#createEvent').on('show.bs.modal', function (event) { //ativado quando o modal é fechado
            $(this).find("#saveEvent").removeAttr('disabled');
            $(this).find(".msg").html('');
        })

        function verificaRetorno(data) { //verifica retorno do submit do salvar
            if (data.success) {
                criarEvento(data.evento);
                $(".msg").html(data.msg)
                $('#createEvent').find("#saveEvent").attr('disabled', 'disabled');

            } else {
                $(".msg").html(data.erros)
            }

        }
        function criarEvento(evento) { // criar um evento no calendario
            var button = $(event.relatedTarget)
            var modal = $('#createEvent')
            var allday = $('#createEvent').modal().find('#allday').val();
            var backgroundColor = modal.find('#servico option:selected').data('backgroundColor');

            var eventData = {
                id: evento.CODIGO,
                title: evento.title,
                start: evento.start, //"2015-06-25",
                end: evento.end,
                allday: evento.allday,
                backgroundColor: backgroundColor,
                textColor: '#000'
            };
            $('#calendar').fullCalendar('renderEvent', eventData, true);
            //}
        }
        function calculateDays(start, end) {
            var dateStart = new Date(start);
            var dateEnd = new Date(end);
            var days = dateEnd - dateStart;
            console.log(days / 86400000);
            return days / 86400000;
        }
        
        function updateEvento(){
            
        }
    });

</script>

<div id="content" style="width: calc(100% - 222px)">
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


