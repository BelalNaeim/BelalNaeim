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
            <a href="">
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

        <li>
            <a href="uploadpage">
                <i class="bi bi-upload"></i>
                <span class="links_name">upload</span>
            </a>
            <span class="tooltip">upload</span>
        </li>
    </ul>

</div>
<!-- End Sidebar-->
<!--Start Content-->
<div class="home_content">
    <!-- start searchbar -->
    <div class="header">
        <div class="container">
            <a href="homee" class="logo">
                <img src="">
                Read Zone</a>
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
            @foreach ($data as $data)
            @if($data->category_id == '3')
            <div class="box">
                <img src="{{asset('../storage/app/public/storage/'.$data->photo)}}">
                <div class="content">
                    <h3>{{$data->name}}</h3>
                    <p>{{$data->description}}</p>
                </div>
                <div class="info">
                    <a href="{{url('/download',$data->file)}}"><i class="fa-solid fa-download"></i></a>
                    <a href="#">
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </a>
                    <a href="{{url('/view',$data->id)}}"><i class="bi bi-eye"></i></a>
                </div>
            </div>
            @endif
            @endforeach
            <div class="box">
                <img src="photo/book7.jpeg" alt="not found">
                <div class="content">
                    <h3>Text Title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="info">
                    <a href="#"><i class="fa-solid fa-download"></i></a>
                    <a href="#">
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </a>
                    <a href="#"><i class="bi bi-eye"></i></a>
                </div>
            </div>
            <div class="box">
                <img src="photo/book8.jpeg" alt="not found">
                <div class="content">
                    <h3>Will</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="info">
                    <a href="#"><i class="fa-solid fa-download"></i></a>
                    <a href="#">
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </a>
                    <a href="#"><i class="bi bi-eye"></i></a>
                </div>

            </div>


        </div>
    </div>
    <!-- End Card-->
</div>
@endsection
