<?php
    $conn = new mysqli('wgh23', 'cessgilo', '88B1M8gob@Kl@Q', 'cessgilo_registered') or die("Failed to coonect to Mysqli". $conn->connect_error);
    // $conn = new mysqli('localhost', 'root', '', 'registered') or die("Failed to connect to Mysqli". $conn->connect_error);
    ?>
    <?php $results = $conn->query('SELECT * From registered'); ?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BLW Church Zone - Registered users</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/png" />


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css" rel="stylesheet"/>

</head>
<body>
    <div class="container">
    <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <h3>Total Registered - <?php echo $results->num_rows ?> </h3>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row">
            <div class="col-sm-12">

                <table class="table table-responsive w-auto">
                    <thead>
                        <tr>
                            
                            <th scope="col">Full Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Coming</th>
                            <th scope="col">Heard From</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($results->fetch_all(MYSQLI_ASSOC) as $result): ?>
                            <?php extract($result) ?>
                            <tr>
                                <td><?= ucwords(strtolower($full_name)) ?></td>
                                <td><?= $phone_number ?></td>
                                <td><?= ucwords(strtolower($address)) ?></td>
                                <td><?= ucwords($coming) ?></td>
                                <td><?= $heard_from ?></td>
                                <td><a href="delete.php?id=<?= $id ?>" class="btn btn-success">Delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>