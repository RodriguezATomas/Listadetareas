<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Calendario de Eventos</title>
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <style>
   
    #calendar {
      max-width: 900px;
      margin: 0 auto;
    }
    a.volver {
      display: inline-block;
      margin-bottom: 20px;
      text-decoration: none;
      background: #007bff;
      color: white;
      padding: 10px 15px;
      border-radius: 6px;
    }
  </style>
</head>

<body>

    <ul class="nav justify-content-center bg-primary">
        <li class="nav-item"> <a class="nav-link text-white active" href="../index.php" aria-current="page">Inicio</a> </li>
        <li class="nav-item"> <a class="nav-link text-white" href="../Materias/indexMateria.php">Materias</a> </li>
        <li class="nav-item"> <a class="nav-link text-white" href="#">Calendario</a> </li>
        <li class="nav-item"> <a class="nav-link text-white" href="#">Cerrar Sesión</a> </li>
    </ul> 

    <br>
  <h2>Calendario de Eventos</h2>
  <div id="calendar"></div>

  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const calendarEl = document.getElementById('calendar');

      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        editable: true,
        locale: 'es',
        events: 'eventos.php?accion=listar',

        select: function (info) {
          const title = prompt('Título del evento:');
          if (title) {
            const datos = new FormData();
            datos.append('title', title);
            datos.append('start', info.startStr);
            datos.append('end', info.endStr);

            fetch('eventos.php?accion=agregar', {
              method: 'POST',
              body: datos
            }).then(() => {
              calendar.refetchEvents();
              alert('✅ Evento agregado');
            });
          }
        },

        eventClick: function (info) {
          if (confirm('¿Eliminar este evento?')) {
            const datos = new FormData();
            datos.append('id', info.event.id);
            fetch('eventos.php?accion=eliminar', {
              method: 'POST',
              body: datos
            }).then(() => {
              calendar.refetchEvents();
              alert('🗑️ Evento eliminado');
            });
          }
        }
      });

      calendar.render();
    });
  </script>
</body>
</html>
