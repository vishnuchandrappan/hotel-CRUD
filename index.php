<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel | HOME</title>

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
                    <li class="nav-item active">
                        <a class="nav-link" href="./index.php"> <i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./new.php"> <i class="fa fa-plus"></i> New Item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./edit.php"> <i class="fa fa-edit"></i> Edit Item</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- navigation bar ends -->


        <!-- carousel start -->

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <!-- this should be added if more than 3 images are there -->
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.pexels.com/photos/2746998/pexels-photo-2746998.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://images.pexels.com/photos/1231023/pexels-photo-1231023.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://images.pexels.com/photos/1343504/pexels-photo-1343504.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="d-block w-100" alt="...">
                </div>

                <!--
                This should be reapeated  for each image
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
                -->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- carousel ends -->


        <!-- item list starts here -->

        <div class="card-deck">
            <?php
                $conn = new mysqli('localhost','dbuser','dbpassword','dbname');
                if ($conn->connect_error) {
                    ?>
                    <script type="text/javascript">
                        swal("Error", "Couldn't connect to Database", "error");
                    </script>
                    <?php
                }

                $sql = "SELECT id,name,cost FROM items";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <p class="card-text">Rs. <?php echo $row['cost']?></p>
                                <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                            </div>
                        </div>
                        <?php
                    }
                }
                else {
                    ?>
                    <h1 class="animated infinite pulse alert alert-danger">No Items Found &nbsp;&nbsp;<i class="fa fa-exclamation-triangle"></i></h1>
                    <?php
                }
            ?>
        </div>

        <!-- item list ends -->


    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="./master.js" charset="utf-8"></script>
</body>

</html>
