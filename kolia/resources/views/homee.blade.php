@extends('master1')
@section('content')
    <!-- Start Header -->
    <div class="header" id="header">
        <div class="container">
          <a href="#" class="logo">
              <img src="">
              Read Zone
            </a>
          <ul class="main-nav">
            <li><a href="homee">Home</a></li>
            <li><a href="books">Books</a></li>
            <li><a href="section">Sections</a></li>
            <li>
                <a href="#">Other Links</a>
                <!-- Start Megamenu-->
                <div class="mega-menu">
                    <div class="image">
                        <img src="photo/megamenu.png" alt="">
                    </div>
                    <ul class="links">
                        <li>
                            <a href="#books"><i class="fa-solid fa-book-open"></i> Top Books</a>
                        </li>
                        <li>
                            <a href="#events"><i class="far fa-calendar-alt fa-fw"></i> Events</a>
                        </li>
                    </ul>
                    <ul class="links">
                        <li>
                            <a href="#comment"><i class="far fa-comments fa-fw"></i> Comments</a>
                        </li>
                        <li>
                            <a href="#team"><i class="far fa-user fa-fw"></i> Team Members</a>
                        </li>



                </div>
                <!-- End Megamenu-->
            </li>

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                  <!--  @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif-->
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                @csrf
                            </form>
                    </li>
                @endguest
            </ul>
        </ul>

        </div>
    </div>
    <!--End Header-->
    <!--Start Landing-->
    <div class="landing">
        <div class="container">
            <div class="text">
                <h1>Welcome, To Read Zone</h1>
                <p>Read Zone is the best website library, It is expand your horizons & There is  where you find any book you are looking for.</p>
            </div>
            <div class="image">
                <img src="{{URL::asset('assets/img/digital_book2.png')}}" alt="">
            </div>
        </div>

    </div>
    <!--End Landing-->

    <!-- Start Books-->
    <div class="books" id="books">
        <h2 class="main-title" id="booksate">Top Books</h2>
        <div class="container">
            <div class="box">
                <img src="photo/book1.jpeg" alt="not found">
                <div class="content">
                    <h3>Test Title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="info">
                    <a href="#">Download</a>
                    <i class="fa-solid fa-download"></i>
                </div>
            </div>
            <div class="box">
                <img src="photo/book2.jpeg" alt="not found">
                <div class="content">
                    <h3>Test Title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="info">
                    <a href="#">Download</a>
                    <i class="fa-solid fa-download"></i>
                </div>
            </div>
            <div class="box">
                <img src="photo/book3.jpeg" alt="not found">
                <div class="content">
                    <h3>Test Title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="info">
                    <a href="#">Download</a>
                    <i class="fa-solid fa-download"></i>
                </div>
            </div>
            <div class="box">
                <img src="photo/book4.jpeg" alt="not found">
                <div class="content">
                    <h3>Test Title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="info">
                    <a href="#">Download</a>
                    <i class="fa-solid fa-download"></i>
                </div>
            </div>
            <div class="box">
                <img src="photo/book9.jpeg" alt="not found">
                <div class="content">
                    <h3>Test Title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="info">
                    <a href="#">Download</a>
                    <i class="fa-solid fa-download"></i>
                </div>
            </div>
            <div class="box">
                <img src="photo/book6.jpeg" alt="not found">
                <div class="content">
                    <h3>Test Title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="info">
                    <a href="#">Download</a>
                    <i class="fa-solid fa-download"></i>
                </div>
            </div>
            <div class="box">
                <img src="photo/book7.jpeg" alt="not found">
                <div class="content">
                    <h3>Test Title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="info">
                    <a href="#">Download</a>
                    <i class="fa-solid fa-download"></i>
                </div>
            </div>
            <div class="box">
                <img src="photo/book8.jpeg" alt="not found">
                <div class="content">
                    <h3>Test Title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="info">
                    <a href="#">Download</a>
                    <i class="fa-solid fa-download"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- End Books-->
    <div class="spikes"></div>
    <!--Start Events-->
    <div class="events" id="events">
        <div class="dots dots-up " ></div>
        <div class="dots dots-down"></div>
        <h2 class="main-title">Events</h2>
        <div class="container">
            <img src="{{URL::asset('assets/img/events.png')}}">
            <div class="info">
                <div class="time">
                    <div class="unit">
                        <span class="days"></span>
                        <span>Days</span>
                    </div>
                    <div class="unit">
                        <span class="hours"></span>
                        <span>Hours</span>
                    </div>
                    <div class="unit">
                        <span class="minutes"></span>
                        <span>Minutes</span>
                    </div>
                    <div class="unit">
                        <span class="seconds"></span>
                        <span>Seconds</span>
                    </div>
                </div>
                <h2 class="title">Book Fair</h2>
                <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis accusantium eligendi suscipit animi beatae esse, itaque sequi similique doloribus neque minima commodi explicabo et laboriosam incidunt in dolorum amet mollitia.</p>
            </div>
        </div>
    </div>
    <!--End Events-->
    <!--Start Comments-->
    <div class="comment" id="comment">

        <div class="form">
            <div class="content">
                <h2>Leave A Comment</h2>
                <form action="">
                    <input type="text" class="input" placeholder="User Name" name="username">
                    <input type="text" class="input" placeholder="Your Email" name="email">
                    <textarea class="input" placeholder="Tell us your comment about our site" name="message"></textarea>
                    <input type="submit" value="Send">
                </form>
            </div>
        </div>
    </div>
    <!--End Comments-->
    <div class="spikes"></div>
    <!-- Start members -->
    <div class="team" id="team">
        <div class="dots dots-up "></div>
        <div class="dots dots-down"></div>
        <h2 class="main-title">Team Memberes</h2>
        <div class="container">
            <div class="box">
                <img src="photo/member1.jpeg" alt="omar" />
                <h3>Omar Mohamed</h3>
                <span class="title">Full Stack Developer</span>
                <div class="rate">
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est natus
                quaerat ducimus
            </p>
            </div>
            <div class="box">
                <img src="photo/member2.jpeg" alt="Gemy" />
                <h3>Mahmoud Gamal</h3>
                <span class="title">Full Stack Developer</span>
                <div class="rate">
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="far fa-star"></i>
                </div>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est natus
                quaerat ducimus
                </p>
            </div>
            <div class="box">
                <img src="photo/member3.jpeg" alt="Ibrahim" />
                <h3>Mohamed Ibrahim</h3>
                <span class="title">Full Stack Developer</span>
                <div class="rate">
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="far fa-star"></i>
                </div>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est natus
                quaerat ducimus
                </p>
            </div>
            <div class="box">
                <img src="photo/member4.jpeg" alt="Samir" />
                <h3>Ahmed Samir</h3>
                <span class="title">Full Stack Developer</span>
                <div class="rate">
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="far fa-star"></i>
                </div>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est natus
                quaerat ducimus
                </p>
            </div>
            <div class="box">
                <img src="photo/member5.jpeg" alt="tamer" />
                <h3>Mohamed Tamer</h3>
                <span class="title">Full Stack Developer</span>
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est natus
                quaerat ducimus
            </p>

            </div>
        </div>
        <div class="go">
            <div class="up">
                <a href="#header" class="go-up">
                    <i class="fas fa-angle-double-up fa-2x"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- End members -->
    <!--Start Footer-->
    <div class="footer" id="footer">
        <div class="container">
                <div class="box">
                    <h3>Read Zone</h3>
                    <ul class="social">
                        <li>
                            <a href="#" class="facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                    <p class="text">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium,
                        aperiam nemo sit quos dignissimos debitis veritatis suscipit nesciunt repellat ipsum placeat error libero et delectus aliquam, sequi culpa quo dicta.
                    </p>
                </div>
                <div class="box">
                    <div class="line">
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        <div class="info">Egypt, Cairo</div>
                    </div>
                    <div class="line">
                        <i class="fas fa-clock fa-fw"></i>
                        <div class="info">Business Hours: 24 hours</div>
                    </div>
                    <div class="line">
                        <i class="fas fa-phone-volume fa-fw"></i>
                        <div class="info">
                            <span>+201554867467</span> <br>
                            <span>+201000800357</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection

    <!--End Footer-->


