<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Zone</title>
    <link rel="stylesheet" href="css/books.css">
    <!-- Boxicons link-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!--Font Awesome-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;500&family=Cairo:wght@300;400;700&family=Roboto:wght@300;400;700&display=swap"
        rel="stylesheet">
</head>
<style>
    /*Start Global Rules*/
   /*Start Global Rules*/

/*Start Global Rules*/

:root {
    --main-color:#2196F3;
    --main-color-alt:#1787e0;
    --main-transition: all 0.5s ease;
    --main-padding-top: 100px;
    --main-padding-bottom: 100px;
    --section-background: #ececec;
    --section-background-alt: rgb(245, 245, 245);
    --main-border-radius: 12px;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: /*'poppins'*/ 'Cairo', sans-serif;
}

html{
    scroll-behavior: smooth;
}

body {
    position: relative;
    min-height: 100vh;
    width: 100%;
    font-family: 'Cairo', sans-serif;

}


a{
    text-decoration: none;
}

ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.container {
    padding-left: 15px;
    padding-right: 15px;
    margin-left: auto;
    margin-right: auto;
}

.main-title {
    text-transform: uppercase;
    margin: 0 auto 80px;
    border: 2px solid black;
    padding: 10px 20px;
    font-size: 30px;
    width: fit-content;
    position: relative;
    z-index: 1;
    transition: var(--main-transition);
}
.main-title::before,
.main-title::after {
    content: "";
    width: 12px;
    height: 12px;
    background-color: var(--main-color);
    position: absolute;
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);

}

.main-title::before {
    left: -30px;
}
.main-title::after {
    right: -30px;
}
.main-title:hover::before {
    z-index: -1;
    animation: left-move 0.5s linear forwards;
}
.main-title:hover::after {
    z-index: -1;
    animation: right-move 0.5s linear forwards;
}
.main-title:hover {
    color: white;
    border: 2px solid white;
    transition-delay: 0.5s;
}

::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background-color: #f6f6f6;
}

::-webkit-scrollbar-thumb {
    border-radius: 12px;
    background-color: var(--main-color-alt);
}

::-webkit-scrollbar-thumb:hover {
    background-color: var(--main-color);
}

/*End Global Rules*/

/* Start Sidebar*/
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 78px;
    background-color: var(--section-background);
    padding: 6px 14px;
    transition: var(--main-transition);
}

.sidebar.active {
    width: 240px;
}

.sidebar .logo_content .logo {
    color: /*var(--main-color)*/black;
    display: flex;
    height: 50px;
    width: 100%;
    align-items: center;
    opacity: 0;
    pointer-events: none;
    transition: var(--main-transition);
}

.sidebar.active .logo_content .logo {
    opacity: 1;
}

.sidebar .logo_content .logo i {
    font-size: 28px;
    margin-right: 5px;
}

.sidebar .logo_content .logo .logo_name {
    font-size: 20px;
    font-weight: bold;
}

.sidebar #btn {
    position: absolute;
    color: black;
    left: 50%;
    top: 6px;
    font-size: 20px;
    height: 50px;
    width: 50px;
    text-align: center;
    line-height: 50px;
    transform: translateX(-50%);
}

.sidebar.active #btn {
    left: 90%;

}

.sidebar ul {
    margin-top: 20px;
}

.sidebar ul li {
    position: relative;
    height: 50px;
    width: 100%;
    margin: 0 5px;
    list-style: none;
    line-height: 50px;
}

.sidebar ul li .tooltip {
    position: absolute;
    bottom: 140px;
    left: 45px /*122px*/;
    top: 0;
    height: 35px;
    width: 110px;
    box-shadow: 0 5px 10px rgb(0, 0, 0, 0.2);
    transform: translate(-50%, -50%);
    border-radius: 6px;
    line-height: 35px;
    text-align: center;
    transition: 0s;
    opacity: 0;
    pointer-events: none;
    display: block;
    z-index: 99;
}

.sidebar.active ul li .tooltip {
    display: none;
}

.sidebar ul li:hover .tooltip {
    top: 100%;
    opacity: 1;
    transition: var(--main-transition);
}

.sidebar ul li a {
    color: black;
    display: flex;
    align-items: center;
    text-decoration: none;
    white-space: nowrap;
    border-radius: var(--main-border-radius);
    transition: var(--main-transition);
}

.sidebar ul li a:hover {
    background: whitesmoke;
    color: var(--main-color-alt);
}

.sidebar ul li i {
    height: 50px;
    min-width: 50px;
    border-radius: var(--main-border-radius);
    line-height: 50px;
    text-align: center;
}

.sidebar .links_name {
    opacity: 0;
    pointer-events: none;
}

.sidebar.active .links_name {
    opacity: 1;
    pointer-events: auto;
    transition: var(--main-transition);
}

.sidebar .profile_content {
    position: absolute;
    color: black;
    bottom: 0;
    left: 0;
    width: 100%;
}

.sidebar .profile_content .profile {
    position: relative;
    padding: 10px 6px;
    height: 60px;
    background: #d8d2d2;
    transition: var(--main-transition);
}

.sidebar.active .profile_content .profile {
    background: var(--section-background-alt);
}

.profile_content .profile .profile_detalis {
    display: flex;
    align-items: center;
    opacity: 0;
    pointer-events: none;
    white-space: nowrap;
}

.sidebar.active .profile .profile_detalis {
    opacity: 1;
    pointer-events: auto;
}

.profile .profile_detalis img {
    height: 45px;
    width: 45px;
    border-radius: var(--main-border-radius);
    object-fit: cover;
}

.profile .profile_detalis .name {
    margin-left: 10px;
    font-size: 20px;
    font-weight: 400;
}

.profile #log_out {
    color: black;
    position: absolute;
    left: 50%;
    bottom: 5px;
    transform: translateX(-50%);
    min-width: 50px;
    line-height: 50px;
    font-size: 20px;
    border-radius: var(--main-border-radius);
    text-align: center;
    background: var(--section-background-alt );
}

.sidebar.active .profile #log_out {
    left: 88%;
    transition: var(--main-transition);
}

.sidebar.active .profile a #log_out {
    background: none;
}

/*End Sidebar*/
/* Start Content */
.home_content {
    position: absolute;
    height: 100%;
    width: calc(100% - 75px);
    left: 75px;
    transition: var(--main-transition);

}

.home_content .text {
    font-size: 25px;
    font-weight: 500;
    color: #1d1b31;
    margin: 12px;
}

.sidebar.active ~ .home_content {
    width: calc(100% - 240px);
    left: 240px;
    transition: var(--main-transition);
}

/* start search bar */
.header {
    background-color: #ececec;
    position: relative;
    -webkit-box-shadow: 0 0 10px #DDD;
    -moz-box-shadow: 0 0 10px #DDD;
    box-shadow: 0 0 10px #DDD;
}

.header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    position: relative;
}

.header .logo {
    color: var(--main-color);
    font-size: 26px;
    font-weight: bold;
    height: 72px;
    display: flex;
    justify-content: center;
    align-items: center;
}

@media (max-width: 767px) {
    .header .logo{
        width: 100%;
        height: 50px;
    }
}

.header .main-nav {
    display: flex;
}

@media (max-width: 767px) {
    .header .main-nav {
        margin: auto;
    }
}



.main-nav li {
    margin-left: -1150px;
}

.main-nav li i {
    position: absolute;
    z-index: 99;
    color: black;
    font-size: 22px;
    margin-top: 22px;
    margin-left: 8px;

}


.main-nav li .input {
    height: 50px;
    width: 550px;
    border: none;
    margin: 8px 0 ;
    border-radius: var(--main-border-radius);
    outline: none;
    background-color: var(--section-background-alt);
    padding-left: 50px;
    font-size: 18px;
    color: black;
}
/* End search bar */

/* Start Card */
.books {
    padding-top: 30px ;
    padding-bottom: var(--main-padding-bottom) ;
    position: relative;
    margin-left: 30px;
}

.books .container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 40px;
}

.books .box {
    box-shadow: 0 2px 15px rgb(0 0 0 / 10%);
    background-color: white;
    border-radius: 16px;
    overflow: hidden;
    transition: transform var(--main-transition), box-shadow var(--main-transition);
}

.books .box:hover {
    transform: translateY(-10px);
    box-shadow: 0 2px 15px rgb(0 0 0 / 20%);
}

.books .box img {
    height: 58%;
    width: 100%;
    max-width: 100%;
}

.books .box .content {
    padding: 20px;
}

.books .box .content h3 {
    margin: 0;
}

.books .box .content p {
    margin: 10px 0 0;
    line-height: 1.5;
    color: #777;
}

.books .box .info {
    padding: 20px;
    border-top: 1px solid #E6E6E7;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.books .box .info a {
    color: var(--main-color);
    font-weight: bold;
}

.books .box .info .fa-download {
    color: var(--main-color);
}

.books .box .info .filled {
    color: #ffc107;
}
.books .box .info .bi-eye {
    color: var(--main-color);
}
.books .box .info .bi-eye:hover {
    color: blue;
}

.books .box:hover .info .fa-download {
    animation: moving-arrow 0.6s linear infinite;
}
/* End Card */

/* End Content */

/*Start Animation*/

@keyframes moving-arrow {
    50% {
        transform: translateY(-5px);

    }
    100% {
        transform: translateY(5px);
    }
}
/*End Animation*/
   </style>
   </head>
</html>
   <body>
    @yield('content')
   <script src="{{URL::asset('assets/js/script.js')}}"></script>
</body>
</html>
