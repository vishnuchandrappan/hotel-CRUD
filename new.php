<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel | ADD NEW</title>

    <!-- style sheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="./master.css">

    <!-- Fonts : fonts.google.com, font awesome -->
    <link href="https://fonts.googleapis.com/css?family=Delius|Londrina+Solid|Love+Ya+Like+A+Sister&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" charset="utf-8"></script>
</head>

<body class="bg-dark">

    <div class="container">

        <!-- navigation bar starts -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Name of the app</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse nav-menu" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php"> <i class="fa fa-home"></i> Home </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./new.php"> <i class="fa fa-plus"></i> New Item <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./edit.php"> <i class="fa fa-edit"></i> Edit Item</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- navigation bar ends -->


        <!-- add item starts here -->
        <div class="jumbotron">
            <h1 class="text-dark">Add New Item</h1> <hr>

            <form class="form-group" action="./new.php" method="post">
                <label>Name</label>
                <input type="text" name="name" required placeholder="Name.. " class="form-control">

                <label>Cost</label>
                <input type="text" name="cost" required placeholder="Amount.. " class="form-control">

                <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle"></i> Add</button>
            </form>
        </div>
        <!-- add item ends -->


        <!-- inserting into database -->

        <?php
            $conn = new mysqli('localhost','dbuser','dbpassword','dbname');
            if ($conn->connect_error) {
                ?>
                <script type="text/javascript">
                    swal("Error", "Couldn't connect to Database", "error");
                </script>
                <?php
            }
            if (isset($_POST['name'])) {
                $name = $_POST['name'];
                $cost = $_POST['cost'];

                $sql = "INSERT INTO items (name,cost) VALUES ('$name','$cost')";
                if($conn->query($sql) === TRUE){
                    ?>
                    <script type="text/javascript">
                        setTimeout(function() {
                            swal({
                                title: "Success",
                                text: "Item Added",
                                type: "success"
                            }, function() {
                                window.location.href = "./index.php";
                            });
                        }, 1000);
                    </script>
                    <?php
                }
                else {
                    ?>
                    <script type="text/javascript">
                        swal("Error !", "Could not add Item, Try again", "error");
                    </script>
                    <?php
                }
            }
        ?>


    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="./master.js" charset="utf-8"></script>
</body>

</html>
