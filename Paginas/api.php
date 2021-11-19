<?php
$devoler = array();
if(isset($_REQUEST['id'])) {
    $conn = new mysqli("localhost", "root", "", "cpus_alvarrius");
    $sql = "SELECT * FROM productos where id_producto = $_REQUEST[id]";
    $result = $conn->query($sql);
    
    while($listaproductos = $result->fetch_assoc()) {
    $devoler[] = $listaproductos;
    };
}else{
    $conn = new mysqli("localhost", "root", "", "cpus_alvarrius");
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);

    while($listaproductos = $result->fetch_assoc()) {
        $devoler[] = $listaproductos;
    };
};

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($devoler);
?>





