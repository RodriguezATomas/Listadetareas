<html>
    <head>
        <title>Teoria de la Computacion</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <body>

    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="../../../../index.php" aria-current="page">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Materias</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Cerrar Sesión</a>
        </li>
    </ul>
    

        <h1>Teoria de la Computacion</h1>
        <h2>Lista de Tareas</h2>

        <?php include("../../../../conexion.php")?>

        <a name="" id="" class="btn btn-primary" href="../../indexCuarto.php" role="button">volver</a>
        <br><br>
        <a name="" id="" class="btn btn-primary" href="agregarTDLC.php" role="button">Agregar Tarea</a>

       <div class="table-responsive">
        <br>
       <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Tareas</th>
                    <th scope="col">Consginas</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php  
			    $sql="SELECT * FROM TeoriaDLC ";
			    $resultado=mysqli_query($conn, $sql) or die ($sql . mysqli_error($conn));
			    while ($teoria = mysqli_fetch_array($resultado)){ 
                    if ($teoria ['baja_socio'] == 0) {

                }?>

                <tr class="">
                            <td><?php echo $socios['Tareas_TDLC']; ?></td>
                            <td><?php echo $socios['Consignas_TDLC']; ?></td>
                            <td><input type="button" class="btn btn-primary" value="Modificar" onclick="location.replace('modificarTDLC.php?Tareas_TDLC=<? echo $tareasTDLC ['Tareas_TDLC'];?>');"></td>    
                </tr>
                <?php } ?>
            </tbody>
        </table>
       </div>

    </body>
</html>