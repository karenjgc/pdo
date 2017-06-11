<?php
session_start();
?>

    <form action="#" method="POST">
        Usuario:<input type="text" name="nombre">
        Pass:<input type="password" name="pass">
        <input type="submit" value="Entrar">
    </form>


<?php
if (isset($_POST['nombre'])) {
    include "pdo.php";
    try {
        $query = $pdo->prepare("select * from usuarios where nombre=:nombre 
                                                                 and telefono=:pass");
        $query->bindParam(":nombre", $_POST['nombre']);
        $query->bindParam(":pass", $_POST['pass']);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result != null) {
            $_SESSION['usuario'] = $result['id'];
            echo json_encode(array("Status" => "Ok"));

        } else {
            echo json_encode(array("Status" => "Error"));
        }

    } catch (PDOException $e) {
        echo $e;
    }
}