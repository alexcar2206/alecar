<?php



$servername = "localhost";
$username = "root";
$password = "";
$database = "alecar";



$dbc = mysqli_connect($servername, $username, $password);


if ($dbc = mysqli_connect('localhost', 'root')) {
    //echo 'conexión exitosa';

}else{
    echo 'fallo en la conexión';
}


//Seleccionamos la base de datos
if (mysqli_select_db($dbc,'alecar')) {
    //echo 'conexión a base de datos exitosa';
}else{
    echo 'fallo en la conexiona la base de datos';
}

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}




$parametro = $_POST['parametro'];

// Lógica condicional para determinar el tipo de respuesta
if ($parametro == 'MARCA') {

   // Obtener los datos de la tabla
    $sql = "SELECT Nombre FROM marcas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = array();

        // Recorrer los resultados y guardarlos en el array de respuesta
        while ($row = $result->fetch_assoc()) {
            $response[] = $row;
        }

    } else {
        echo "No se encontraron datos en la tabla.";
    }

} elseif ($parametro == 'MODELO') {

    // Obtener los datos de la tabla
    $sql = "SELECT Nombre FROM modelos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = array();

        // Recorrer los resultados y guardarlos en el array de respuesta
        while ($row = $result->fetch_assoc()) {
            $response[] = $row;
        }

    } else {
        echo "No se encontraron datos en la tabla.";
    }
    
} else {
    
    // En caso de que el parámetro no coincida con ninguno de los tipos esperados
    $response = array(
        'mensaje' => 'Error: Tipo no válido',
        'datos' => null
    );
}

// Devuelve la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);





// Cerrar la conexión
$conn->close();

?>

