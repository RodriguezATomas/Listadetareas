<!doctype html>
<html lang="en">

    <body>
        <?php
        include("../../../../conexion.php");

        $tareasTeoria=$_GET['Tareas_TDLC'];
        $consignasTeoria=$_GET['Consignas_TDLC'];

        $sql="INSERT INTO TeoriaDLC (Tareas_TDLC, Consignas_TDLC) VALUES ('".$tareasTeoria."','".$consignasTeoria."')";
        $resultado=mysqli_query($conn, $sql) or die ($sql . mysqli_error($conn));
        
        ?>
    </body>
    <script type="text/javascript">
    alert("Se agrego una nueva tarea");
    location.replace("indexTDLC.php");
    </script>
</html>
