<?php
    // $conn = new mysqli('wgh23', 'cessgilo', '88B1M8gob@Kl@Q', 'cessgilo_registered') or die("Failed to coonect to Mysqli". $conn->connect_error);
    $conn = new mysqli('localhost', 'root', '', 'registered') or die("Failed to connect to Mysqli". $conn->connect_error);
    

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $full_name = $conn->real_escape_string($_POST['full_name']);
        $phone_number = $conn->real_escape_string($_POST['phone_number']);
        $address = $conn->real_escape_string($_POST['address']);
        $coming = $conn->real_escape_string($_POST['coming']);
        $heard_from = $conn->real_escape_string($_POST['heard_from']);


        
        if (!empty($full_name) && !empty($phone_number) && !empty($address) && !empty($coming) && !empty($heard_from) ) {
        // check if user is registered
            if ( count(explode(" ", trim($_POST['full_name']))) < 2) {
                echo json_encode(['msg' => "Please use your Full Name", 'msgClass' => 'error']);
                die();
            }
            $sql = "SELECT id from `registered` WHERE `full_name` = ? OR `phone_number` = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $full_name, $phone_number);
            $stmt->execute();
            $stmt->bind_result($id);
            $stmt->fetch();

            if (!$id) {
                $sql = "INSERT INTO `registered` ( `full_name`, `phone_number`, `address`, `coming`, `heard_from`) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sssss', $full_name, $phone_number, $address, $coming, $heard_from);
                if ($stmt->execute()) {
                    echo json_encode(['msg' => "User successfully Registered", 'msgClass' => 'success']);
                }

            } else {
                echo json_encode(["msg" => "User already registered", "msgClass" => "error"]);
            }

        } else {
            echo json_encode(['msg' => "Please fill in all fields", 'msgClass' => 'error']);
        }

    }

    
    
    ?>
    