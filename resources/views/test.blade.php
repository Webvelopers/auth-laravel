<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Smooth Scroll</title>
    <!-- Style CSS -->
    <style>
        :root {
            --primary-color: #eb2f6f;
            --secundary-color: #282828;
            --third-color: #ffffff;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;
            position: relative;
            -webkit-font-smoothing: antialiased;
            overflow: hidden;
            font-family: "EB Garamond", serif;
        }

        h1 {
            font-size: 60px;
            color: #fff;
            margin-bottom: 10px;
            text-shadow: 0px 1px 1px #000;
        }

        p {
            color: #fff;
        }

        .navbar {
            position: fixed;
            bottom: 0;
            background: var(--third-color);
            width: 100vw;
            height: 40px;
            z-index: 100;
        }

        .nav-links {
            display: flex;
            justify-content: space-around;
            height: 40px;
            align-items: center;
        }

        a {
            text-decoration: none;
            color: #000;
            font-size: 16px;
            position: relative;
            height: 40px;
            width: 150px;
            flex-basis: 150px;
            flex-grow: 1;
            text-align: center;
            padding-top: 10px;
            box-sizing: border-box;
        }

        a:hover,
        a:active,
        a:focus {
            background: var(--primary-color);
        }

        .section {
            background: var(--secundary-color);
            position: relative;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .top-deco {
            width: 300px;
            height: 150px;
            background: #eb2f64;
            position: absolute;
            top: -10px;
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
            transform: rotate(180deg);
        }

        .section:nth-child(odd) {
            background: #eb2f64;
        }

        .section:nth-child(odd) .top-deco {
            background: #282828;
        }

        .section:nth-child(odd) h1 {
            color: #fff;
        }

        .section:nth-child(odd) p {
            color: rgba(255, 255, 255, 0.8);
        }

        .section:nth-child(odd) .icon {
            color: #fa96b5;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .logo {
            width: 120px;
            height: 120px;
            transform: rotate(180deg);
            margin: 20px auto;
            display: block;
        }

        .fa-smile {
            font-size: 60px;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav>
            <div class="navbar">
                <div class="nav-links" id="myDiv">
                    <a href="#s1">Home</a>
                    <a href="#s2">Blog</a>
                    <a href="#s3">About</a>
                    <a href="#s4">Contact</a>
                    <a href="#s5">Featured</a>
                </div>
            </div>
        </nav>
        <section class="section one" id="s1">
            <div class="top-deco deco-1">
                <img src="img/logo.png" class="logo">
            </div>
            <div class="center">
                <h1>Home</h1>
                <p>Quod est propositum pervenire meditation statu tranquillitatis, cum animus tuus adhuc est tranquillitas cumulateque ante perficere.</p>
            </div>
        </section>
        <section class="section two" id="s2">
            <div class="top-deco deco-2">
                <img src="img/logo.png" class="logo">
            </div>
            <div class="center">
                <h1>Blog</h1>
                <p>Quietem solitudinis amicos excolere pauca quam vulgus iocumque nutu sollicitatque notis clamor multitudinis.
                </p>
            </div>
        </section>
        <section class="section three" id="s3">
            <div class="top-deco deco-3">
                <span class="icon"><i class="fas fa-atom"></i></span>
            </div>
            <div class="center">
                <h1>About</h1>
                <p>Sa vie et sa mort ont parlé de son espérance inébranlable dans la providence de Dieu et de sa miséricorde envers tous ceux qui tournent leur cœur vers le ciel.
                </p>
            </div>
        </section>
        <section class="section four" id="s4">
            <div class="top-deco deco-4">
                <img src="img/logo.png" class="logo">
            </div>
            <div class="center">
                <h1>Contact</h1>
                <p>Ostenditur ex studio secuti sententiam veram per quam actus rationis speculando.</p>
            </div>
        </section>
        <section class="section five" id="s5">
            <div class="top-deco deco-5">
                <img src="img/logo.png" class="logo">
            </div>
            <div class="center">
                <h1>Featured</h1>
                <p>Altior est beatitudo per liberum homini data est gratia Dei; et datum est illis quorum tantum est cor tuum, et quasi praemium virtutum.</p>
            </div>
        </section>
    </div>
</body>

</html>