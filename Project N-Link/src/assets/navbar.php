<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <style>
    /*----------------------------
-----Nav Bar css Start--------
----------------------------*/

    .navbar {
        background: linear-gradient(to right, #4eb120, #182044);
        /* Adjust colors */
        padding-left: 20px;
        /* Add space on the left */
        padding-right: 20px;
        /* Add space on the right */
    }

    .navbar-toggler {
        border-color: white;
        /* Makes the border white */
    }

    .navbar-toggler-icon {
        background-color: white;
        /* Changes the toggler button to white */
    }

    .nav_logo {
        height: 65px;
        width: 150px;
        border-radius: 5%;
        margin-right: 20px;
    }

    .navbar-nav .nav-link {
        font-weight: bold;
        font-size: larger;
        color: white !important;
        transition: 0.3s;
    }

    .nav-link:hover {
        text-decoration: underline;
        color: #0f1e66 !important;
    }

    /*----------------------------
-----Nav Bar css Ends--------=
----------------------------*/
    </style>

</head>

<body>


    <!-- navbar start-->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://www.nsbm.ac.lk/">
                <img src="../images/NSBM Logo 2.png" alt="NSBM Logo" class="nav_logo" />
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#scroll-btn">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="scroll-btn">
                <ul class="d-flex navbar-nav navbar-nav-scroll justify-content-between me-auto my-2 my-lg-0"
                    style="--bs-scroll-height: 100px; width: 80%">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Timetable</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Anouncements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Appointments</a>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            See more
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!--<button class="btn btn-lg btn-success" type="submit">LogOut</button> -->
                <button class="btn btn-lg btn-success" onclick="window.location.href='../login_signup/logout.php'">LogOut</button>
            </div>
        </div>
    </nav>

    <!--navbar end-->

    <!--java scripts-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>

</body>

</html>