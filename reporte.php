<!DOCTYPE html>
<html>
<h1 style = "text-align:center">Estudiantes Matriculados</h1>
<?php



function suma()
{
       $x=10;
       $y=5;
       $x+=$y;
       //echo $x.' - '.$y;
}
suma();

    // $conection = mysqli_connect('localhost','root','','universidad');
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "universidad";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $sqlest = "
    select 
        id as num,
        p.identificacion as identificacion,
        p.apellidos,' ',p.nombres as nombre
    from 
        personas p
    ";

    // $valsqlest = mysqli_query($conection,$sqlest);
    $result = $conn->query($sqlest);

    
        echo "<table border = '1' align = 'center'>"; 
        echo "<tr>";
        echo "<td>NO.</td>";
        echo "<td>IDENTIFICACIÓN</td>";
        echo "<td>NOMBRE</td>";
        echo "</tr>";
    

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            // echo "No: " . $row["num"];
            echo "<tr>";
            echo "<td align = 'center'>".$row["num"]."</td>";
            echo "<td>".$row["identificacion"]."</td>";
            echo "<td>".$row["nombre"]."</td>";
            
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    
?>

<head>
    <title>ReporteMatriculados</title>
</head>
<!-- <body>
    
</body> -->
</html>