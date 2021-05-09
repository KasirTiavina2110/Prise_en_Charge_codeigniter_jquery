<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta code="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url('assets/login/img/vel-optic_f.ico'); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Toastr -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- CALENDAR -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    
  </head>
  <body>
  <nav>
    <ul>
        <li><a href="<?php echo base_url(); ?>MenuController/menu">Acceuil</a></li>

        <li>
            <a href="<?php echo base_url(); ?>AssureurController">Assureur</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>FactureController">Facture</a></li>
                
            </ul>
        </li>
        <li>
            <a href="">Calendrier</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>EvenementController">Evenement</a></li>
                
            </ul>
        </li>
        <li><a href="<?php echo base_url(); ?>ChartController">Chart</a></li>
    </ul>
</nav>
<style type="text/css">
.container{
  margin-top: 150px;
  margin-right: -700px;
  margin-left: 100px;
  max-width: 1000px;
}
</style>
        <div class="container">
            <div id="Calendar"></div>
        </div>
        <script>
    $(document).ready(function(){
        var Calendar = $('#Calendar').fullCalendar({
            editable:true,
            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            events:"<?php echo base_url(); ?>EvenementController/load",
            selectable:true,
            selectHelper:true,
            select:function(start, end, allDay)
            {
                var title = prompt("Ajouter un evenement");
                if(title)
                {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url:"<?php echo base_url(); ?>EvenementController/insert",
                        type:"POST",
                        data:{title:title, start:start, end:end},
                        success:function()
                        {
                            Calendar.fullCalendar('refetchEvents');
                            alert("Ajout effectué");
                        }
                    })
                }
            },
            editable:true,
            eventResize:function(event)
            {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

                var title = event.title;

                var id = event.id;

                $.ajax({
                    url:"<?php echo base_url(); ?>EvenementController/update",
                    type:"POST",
                    data:{title:title, start:start, end:end, id:id},
                    success:function()
                    {
                        Calendar.fullCalendar('refetchEvents');
                        alert("Evenement modifié");
                    }
                })
            },
            eventDrop:function(event)
            {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                alert(start);
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                alert(end);
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url:"<?php echo base_url(); ?>EvenementController/update",
                    type:"POST",
                    data:{title:title, start:start, end:end, id:id},
                    success:function()
                    {
                        Calendar.fullCalendar('refetchEvents');
                        alert("Event Updated");
                    }
                })
            },
            eventClick:function(event)
            {
                if(confirm("Voulez vous supprimez cet Evenement?"))
                {
                    var id = event.id;
                    $.ajax({
                        url:"<?php echo base_url(); ?>EvenementController/delete",
                        type:"POST",
                        data:{id:id},
                        success:function()
                        {
                            Calendar.fullCalendar('refetchEvents');
                            alert('Event supprimer');
                        }
                    })
                }
            }
        });
    });
             
    </script>
  </body>
</html>