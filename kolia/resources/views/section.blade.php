@extends('master2')
@section('content')
<div class="sidebar">
    <div class="logo_content">
        <div class="logo">
            <i class="fa-solid fa-book-open"></i>
            <div class="logo_name">Read Zone</div>
        </div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav_list">

        <li>
            <a href="homee">
                <i class="bi bi-house"></i>
                <span class="links_name">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>

        <li>
            <a href="books">
                <i class='bx bx-book-alt' ></i>
                <span class="links_name">Books</span>
            </a>
            <span class="tooltip">Books</span>
        </li>
        <li>
            <a href="section">
                <i class="bi bi-collection"></i>
                <span class="links_name">Sections</span>
            </a>
            <span class="tooltip">Sections</span>
        </li>
   
    </ul>

    </div>
</div>
<!-- End Sidebar-->
<!--Start Content-->
<div class="home_content">
    <!-- start searchbar -->
    <div class="header">
        <div class="container">
            <a href="homee" class="logo">
                <img src="">
                Read Zone
            </a>
            <ul class="main-nav">
                <li>
                    <div class="icon">
                        <a href="#"><i class='bx bx-search' ></i></a>
                        <input type="text" class="input" placeholder="Search..">
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- end searchbar -->
    <!-- Start Card-->
    <div class="books" id="books">
        <div class="container">
            <div class="box">
                <img src="photo/novel.jpg" alt="not found">
                <div class="content">
                    <h3>Novels</h3>
                </div>
                <div class="info">
                    <a href="#">
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </a>
                    <a href="section1"><i class="bi bi-eye"></i></a>
                </div>
            </div>
            <div class="box">
                <img src="photo/history.jfif" alt="not found">
                <div class="content">
                    <h3>History</h3>
                </div>
                <div class="info">
                    <a href="#">
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </a>
                    <a href="section2"><i class=" bi bi-eye"></i></a>
                </div>
            </div>
            <div class="box">
                <img src="photo/human.jfif" alt="not found">
                <div class="content">
                    <h3>Human Development</h3>
                </div>
                <div class="info">
                    <a href="#">
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </a>
                    <a href="section3"><i class="bi bi-eye"></i></a>
                </div>
            </div>
            <div class="box">
                <img src="photo/Business.jpg" alt="not found">
                <div class="content">
                    <h3>Business Administration</h3>
                </div>
                <div class="info">
                    <a href="#">
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </a>
                    <a href="section4"><i class="bi bi-eye"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card-->
</div>
<!--End Content-->

@endsection
