<?php

    $conn = new mysqli('wgh23', 'cessgilo', '88B1M8gob@Kl@Q', 'cessgilo_registered') or die("Failed to connect to Mysqli". $conn->connect_error);

    $id = $conn->real_escape_string($_GET['id']);
    $sql = "DELETE FROM `registered` WHERE `registered`.`id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    header('location: ./file');

    ?>