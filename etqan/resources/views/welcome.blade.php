@extends('layouts.app')
@section('title', 'موقع الإتقان الخشبي')
@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-body row">
                    <div class="col pt-5">
                        <h1>لم يعد الشتاء بعيدا بعد الان

                        </h1><br><br>
                        <button id="slider-btn" type="button" class="btn btn-primary btn-lg">تسوق الان</button>
                    </div>
                    <div class="col align-self-center">
                        <img class="img-fluid" src="{{ asset('assets/images/slider-image.png') }}" />
                    </div>
                </div>
                <svg class="bd-placeholder-img bd-placeholder-img-lg w-100" width="800" height="500"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="30%" height="100%" fill="#01343F"></rect>
                    <rect x="35%" width="65%" height="100%" fill="#01343F"></rect>
                    <image xlink:href="{{ asset('assets/images/group17.png') }}" height="40%" x="98.2%"
                        y="30%" />
                    <image xlink:href="{{ asset('assets/images/group18.png') }}" height="40%" y="30%" />
                </svg>
            </div>
            <div class="carousel-item">
                <div class="carousel-body row">
                    <div class="col pt-5">
                        <h1>صنع اثاثك علي مزاجك

                        </h1><br><br>
                        <button id="slider-btn" type="button" class="btn btn-primary btn-lg">تسوق الان</button>
                    </div>
                    <div class="col align-self-center">
                        <img class="img-fluid" src="{{ asset('assets/images/slider-image.png') }}" />
                    </div>
                </div>
                <svg class="bd-placeholder-img bd-placeholder-img-lg w-100" width="800" height="500"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="30%" height="100%" fill="#01343F"></rect>
                    <rect x="35%" width="65%" height="100%" fill="#01343F"></rect>
                    <image xlink:href="{{ asset('assets/images/group17.png') }}" height="40%" x="98.2%"
                        y="30%" />
                    <image xlink:href="{{ asset('assets/images/group18.png') }}" height="40%" y="30%" />
                </svg>
            </div>
            <div class="carousel-item">
                <div class="carousel-body row">
                    <div class="col pt-5">
                        <h1>لم يعد الشتاء بعيدا بعد الان</h1><br><br>
                        <button id="slider-btn" type="button" class="btn btn-primary btn-lg">تسوق الان</button>
                    </div>
                    <div class="col align-self-center">
                        <img class="img-fluid" src="{{ asset('assets/images/slider-image.png') }}" />
                    </div>
                </div>
                <svg class="bd-placeholder-img bd-placeholder-img-lg w-100" width="800" height="500"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="30%" height="100%" fill="#01343F"></rect>
                    <rect x="35%" width="65%" height="100%" fill="#01343F"></rect>
                    <image xlink:href="{{ asset('assets/images/group17.png') }}" height="40%" x="98.2%"
                        y="30%" />
                    <image xlink:href="{{ asset('assets/images/group18.png') }}" height="40%" y="30%" />
                </svg>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="py-5 text-card1" style="background-color: #8F7554;">
        <h3>التصنيفات</h3><br>
        <div class="container mt-4">
            <div class="row justify-content-center gx-5">
                <div class="col-auto mb-3">
                    <div class="card1 align-items-center justify-content-center" style="width: 233px; height: 233px;">
                        <img src="{{ asset('assets/images/bathroom1.svg') }}" />
                    </div><br>
                    <h4>تجهيزات الحمام</h4>
                </div>
                <div class="col-auto mb-3">
                    <div class="card1 align-items-center justify-content-center" style="width: 233px; height: 233px;">
                        <img src="{{ asset('assets/images/decorative-textile1.svg') }}" />
                    </div><br>
                    <h4>منسوجات</h4>
                </div>
                <div class="col-auto mb-3">
                    <div class="card1 align-items-center justify-content-center" style="width: 233px; height: 233px;">
                        <img src="{{ asset('assets/images/television1.svg') }}" />
                    </div><br>
                    <h4>التخزين والتنظيم</h4>
                </div>
                <div class="col-auto mb-3">
                    <div class="card1 align-items-center justify-content-center" style="width: 233px; height: 233px;">
                        <img src="{{ asset('assets/images/icon1.svg') }}" />
                    </div><br>
                    <h4>غرفة المعيشة</h4>
                </div>
                <div class="col-auto mb-3">
                    <div class="card1 align-items-center justify-content-center" style="width: 233px; height: 233px;">
                        <img src="{{ asset('assets/images/furniture3.svg') }}" />
                    </div><br>
                    <h4>غرف الطعام</h4>
                </div>
                <div class="col-auto mb-3">
                    <div class="card1 align-items-center justify-content-center" style="width: 233px; height: 233px;">
                        <img src="{{ asset('assets/images/fast-delivery1.svg') }}" />
                    </div><br>
                    <h4>توصيل سريع</h4>
                </div>
                <div class="col-auto mb-3">
                    <div class="card1 align-items-center justify-content-center" style="width: 233px; height: 233px;">
                        <img src="{{ asset('assets/images/furniture1.svg') }}" />
                    </div><br>
                    <h4>ديكور المنزل</h4>
                </div>
                <div class="col-auto mb-3">
                    <div class="card1 align-items-center justify-content-center" style="width: 233px; height: 233px;">
                        <img src="{{ asset('assets/images/bedroom1.svg') }}" />
                    </div><br>
                    <h4>غرف النوم</h4>
                </div>
            </div>

        </div>
    </div>

    <div class="py-5" style="background-color: #01343F;">
        <h3 class="white-center">العروض المميزة</h3><br><br>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row w-85 mrl-auto">

                        <div class="col mb-3">
                            <div class="card border-0">
                                <img class="img-fluid" alt="100%x280" src="{{ asset('assets/images/img1.jpg') }}">
                                <div class="card-body">
                                    <div class="mycard-title">كونسول بقاعدة أكريليك</div>
                                    <div class="w-60">
                                        <div class="row">
                                            <div class="col mycard-offer">
                                                1180رس
                                            </div>
                                            <div class="col mycard-price">
                                                950رس
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <a id="mycard-btn" href="#" class="btn btn-primary">اضافة للسلة</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col mb-3">
                            <div class="card border-0">
                                <img class="img-fluid" alt="100%x280" src="{{ asset('assets/images/img4.jpg') }}">
                                <div class="card-body">
                                    <div class="mycard-title">عربة ضيافة بطابع الارفف (توص...</div>
                                    <div class="w-60">
                                        <div class="row">
                                            <div class="col mycard-offer">
                                                1180رس
                                            </div>
                                            <div class="col mycard-price">
                                                950رس
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <a id="mycard-btn" href="#" class="btn btn-primary">اضافة للسلة</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col mb-3">
                            <div class="card border-0">
                                <img class="img-fluid" alt="100%x280" src="{{ asset('assets/images/img3.jpg') }}">
                                <div class="card-body">
                                    <div class="mycard-title">عربة ضيافة بطابع الارفف المدرج</div>
                                    <div class="w-60">
                                        <div class="row">
                                            <div class="col mycard-offer">
                                                1180رس
                                            </div>
                                            <div class="col mycard-price">
                                                950رس
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <a id="mycard-btn" href="#" class="btn btn-primary">اضافة للسلة</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col mb-3">
                            <div class="card border-0">
                                <img class="img-fluid" alt="100%x280" src="{{ asset('assets/images/img2.jpg') }}">
                                <div class="card-body">
                                    <div class="mycard-title">عربة ضيافة + درج سحب لون شفاف</div>
                                    <div class="w-60">
                                        <div class="row">
                                            <div class="col mycard-offer">
                                                1180رس
                                            </div>
                                            <div class="col mycard-price">
                                                950رس
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <a id="mycard-btn" href="#" class="btn btn-primary">اضافة للسلة</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container mt-3 ps-4">
            <a class="float-start text-light" href="#">المزيد</a>
        </div>
    </div>

    <div class="py-5 text-center">
        <h3>جديدنا</h3><br>
        <div class="row w-90 mrl-auto justify-content-center">
            <div class="col-auto mb-3">
                <div class="card wcard border-0">
                    <img class="img-fluid" alt="100%x280" src="{{ asset('assets/images/pngwing7.png') }}">
                    <div class="card-body">
                        <div class="mycard-title">كونسول بقاعدة أكريليك</div>
                        <div class="w-60">
                            <div class="row">
                                <div class="col mycard-offer">
                                    1180رس
                                </div>
                                <div class="col mycard-price">
                                    950رس
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a id="mycard-btn" href="#" class="btn btn-primary">اضافة للسلة</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-auto mb-3">
                <div class="card wcard border-0">
                    <img class="img-fluid" alt="100%x280" src="{{ asset('assets/images/pngwing9.png') }}">
                    <div class="card-body">
                        <div class="mycard-title">كونسول بقاعدة أكريليك</div>
                        <div class="w-60">
                            <div class="row">
                                <div class="col mycard-offer">
                                    1180رس
                                </div>
                                <div class="col mycard-price">
                                    950رس
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a id="mycard-btn" href="#" class="btn btn-primary">اضافة للسلة</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-auto mb-3">
                <div class="card wcard border-0">
                    <img class="img-fluid" alt="100%x280" src="{{ asset('assets/images/pngwing7.png') }}">
                    <div class="card-body">
                        <div class="mycard-title">كونسول بقاعدة أكريليك</div>
                        <div class="w-60">
                            <div class="row">
                                <div class="col mycard-offer">
                                    1180رس
                                </div>
                                <div class="col mycard-price">
                                    950رس
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a id="mycard-btn" href="#" class="btn btn-primary">اضافة للسلة</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto mb-3">
                <div class="card wcard border-0">
                    <img class="img-fluid" alt="100%x280" src="{{ asset('assets/images/pngwing7.png') }}">
                    <div class="card-body">
                        <div class="mycard-title">كونسول بقاعدة أكريليك</div>
                        <div class="w-60">
                            <div class="row">
                                <div class="col mycard-offer">
                                    1180رس
                                </div>
                                <div class="col mycard-price">
                                    950رس
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a id="mycard-btn" href="#" class="btn btn-primary">اضافة للسلة</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-3 ps-4">
            <a class="float-start link-dark" href="#">المزيد</a>
        </div>
    </div>
@endsection
