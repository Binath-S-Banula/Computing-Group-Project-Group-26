<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    /* POPPINS FONT */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");


    /*----------------------------
------Footer css Start--------
----------------------------*/


    /* Global Reset - Limited to Avoid Issues */
    html,
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .footer {
        font-family: "poppins";
        background-color: #002147;
    }

    .f-container {
        max-width: 1450px;
        background-color: #002147;
        margin: auto;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
    }

    ul {
        list-style: none;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;
    }

    .footer-col {
        width: 30%;
        padding: 20px;
        box-sizing: border-box;
    }

    .footer-col h3 {
        color: white;
        margin-bottom: 30px;
        text-transform: capitalize;
        font-weight: 500;
        position: relative;
    }

    .footer-col h3::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -10px;
        background-color: #e91e63;
        height: 2px;
        width: 40%;
        /* Adjust width relative to text size */
        max-width: 100px;
        /* Ensures it doesn’t get too large */
    }

    .footer-col ul li:not(:last-child) {
        /*correcting line space between ul list*/
        margin-bottom: 10px;
    }

    .footer-col p {
        font-size: 15px;
        font-weight: 300;
        color: white;
        text-transform: capitalize;
        text-decoration: none;
        display: block;
    }

    .footer-col ul li {
        font-size: 15px;
        font-weight: 300;
        color: white;
        text-transform: capitalize;
        text-decoration: none;
        margin-left: -40px;
    }

    .footer-col ul li a {
        font-size: 15px;
        font-weight: 300;
        color: white;
        text-transform: capitalize;
        text-decoration: none;
        transition: 0.3s;
    }

    .footer-col ul li a:hover {
        color: darkgoldenrod;
        padding-left: 10px;
    }

    /* Social Media Icon Section */

    .f-socialm-icons {
        display: flex;
        justify-content: flex-start;
        gap: 20px;
    }

    .f-socialm-icons a {
        display: inline-block;
    }

    .f-socialm-icons img {
        width: 50px;
        height: 50px;
        transition: transform 0.3s ease;
    }

    .f-socialm-icons img:hover {
        transform: scale(1.3);
        /* Make icons slightly larger when hovered */
    }

    /*footer bootom section*/

    .footer-bottom {
        background-color: #001a39;
        height: 70px;
    }

    .row2 p {
        padding: 25px;
        text-align: center;
        color: white;
        font-size: 14px;
    }

    /* Mobile Responsive Footer */

    @media (max-width: 770px) {
        .f-container {
            justify-content: center;
        }

        .footer-col {
            width: 50%;
            margin-bottom: 20px;
            text-align: center;
        }

        .f-socialm-icons {
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
        }
    }

    @media (max-width: 570px) {
        .f-container {
            flex-direction: column;
            align-items: center;
        }

        .footer-col {
            width: 100%;
            text-align: center;
        }
    }

    /*----------------------------
  ------Footer css end--------
  --------------------------*/
    </style>

</head>

<body>

    <!--footer start-->

    <footer class="footer">
        <div class="f-container">
            <div class="row">

                <!--about us section start-->

                <div class="footer-col">
                    <h3>
                        N-Link <br />
                        <span>NSBM Green University.</span>
                    </h3>
                    <p>
                        Communication Platform for NSBM.<br />
                        NSBM Green University operates as a self-financed university and is
                        renowned for its world-class academic offerings.
                    </p>
                    <br>
                    <div class="f-socialm-icons">
                        <a href="#"><img src="../images/facebook.png" alt="Facebook" /></a>
                        <a href="#"><img src="../images/instagram.png" alt="Instagram" /></a>
                        <a href="#"><img src="../images/whatsapp.png" alt="WhatsApp" /></a>
                    </div>
                </div>

                <!--about us section end-->

                <!--featured list section start-->

                <div class="footer-col">
                    <h3>Featured List</h3>
                    <ul>
                        <li><a href="">Student dashboard</a></li>
                        <li><a href="#">Academic Dashboard</a></li>
                        <li><a href="#">Appointments</a></li>
                        <li><a href="#">Timetable</a></li>
                        <li><a href="#">Career Guidance Unit</a></li>
                        <li><a href="#">Medical Center</a></li>
                        <li><a href="#">Clubs & Societies</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">Admin Dashboard</a></li>
                    </ul>
                </div>

                <!--featured list section end-->

                <!--contact us section start-->

                <div class="footer-col">
                    <h3>Contact Us</h3>
                    <ul>
                        <li>Mahenwaththa, Pitipana, Homagama, Sri Lanka</li>
                        <li><a href="tel:+94115445000">+94 11 544 5000</a></li>
                        <li><a href="tel:+94712445000">+94 71 244 5000</a></li>
                        <li>
                            <a href="mailto:inquiries@nsbm.ac.lk">inquiries@nsbm.ac.lk</a>
                        </li>
                    </ul>
                </div>

                <!--contact us section end-->
            </div>
        </div>

        <div class="footer-bottom">
            <div class="row2">
                <p>
                    Copyright NSBM 2025. &nbsp; Designed and Developed by Group-75 NSBM
                </p>
            </div>
        </div>

    </footer>

    <!--footer end-->

</body>

</html>