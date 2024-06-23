@extends('master2')
@section('content')

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


        <iframe src="../assets/{{$data->file}}" height="700" width="1500"> </iframe>
    </div>
        @endsection
