<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        /* overflow-y:hidden;
        overflow-x:hidden; */
        box-sizing: border-box;
    }

    body {
        background: #fcfcfc;
        font-family: sans-serif;
    }

    footer {
         position: sticky; 

        clear: both;
        height: 100px;
        margin-top: 152px;

        bottom: 0;
        left: 0;
        right: 0;
        background: #111;
        height:100px;
        /* height: auto; */
        width: 100vw;
        color: #fff;
    }

    .footer-content {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }
    .footer-content p {
        max-width: 500px;
        margin: 10px auto;
        line-height: 10px;
        font-size: 14px;
        color: #cacdd2;
    }

    .socials {
        list-style: none;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 1rem 0 3rem 0;
    }

    .socials li {
        margin: 0 10px;
    }

    .socials a {
        text-decoration: none;
        color: #fff;
        border: 1.1px solid white;
        padding: 5px;
        border-radius: 50%;
    }

    .socials a i {
        font-size: 1.1rem;
        width: 20px;
        transition: color .4s ease;
    }

    .socials a:hover i {
        color: aqua;
    }
    </style>
</head>

<body>
    <footer>
        <div class="footer-content">
            <!--add all information -->

            <p>Foolish Developer --- source code.</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
    </footer>

</body>

</html>