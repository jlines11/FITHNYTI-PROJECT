<?php
require_once '../../controller/evenementc.php';
session_start();
$evenetc=new Evenementc();
$listesevenement=$evenetc->afficherevenement();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
    <script src='https://code.jquery.com/jquery-3.6.4.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
    <script src='fullcalendar-6.1.10/dist/index.global.js'></script>

    <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 1200px;
            margin: 0 auto;
        }

    </style>
</head>
<body>

<div id='calendar'></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'multiMonthYear,dayGridMonth,timeGridWeek'
            },
            initialView: 'multiMonthYear',
            initialDate: '2023-01-12',
            editable: true,
            selectable: true,
            dayMaxEvents: true,
            events: [
                <?php foreach ($listesevenement as $event) { ?>
                {
                    title: '<?= $event['titre']; ?>',
                    start: '<?= $event['date']; ?>',
                    url: 'ajouterparticipation.php?event=<?= $event['idevent']; ?>'
                },
                <?php } ?>
            ]
        });

        calendar.render();
    });
</script>

</body>
</html>
