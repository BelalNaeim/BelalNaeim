@extends('layout.master')

@section('main-content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Layout Light</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Color version</li>
                        <li class="breadcrumb-item active">Layout light</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Kick start your project development !</h4>
                    </div>
                    <div class="card-body">
                        <p>Getting start with your project custom requirements using a ready template which is quite
                            difficult and time taking process, Tivo Admin provides useful features to kick start your
                            project development with no efforts !</p>
                        <ul>
                            <li>
                                <p>Tivo Admin provides you getting start pages with different layouts, use the layout as per
                                    your custom requirements and just change the branding, menu & content.</p>
                            </li>
                            <li>
                                <p>Every components in Tivo Admin are decoupled, it means use only components you actually
                                    need! Remove unnecessary and extra code easily just by excluding the path to specific
                                    SCSS, JS file.</p>
                            </li>
                            <li>
                                <p class="mb-0">It use PUG as template engine to generate pages and whole template quickly
                                    using node js. Save your time for doing the common changes for each page (i.e menu,
                                    branding and footer) by generating template with pug.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>What is starter kit ?</h4>
                    </div>
                    <div class="card-body">
                        <p>Starter kit is a set of pages with different layouts, useful for your next project to start
                            development process from scratch with no time.</p>
                        <ul>
                            <li>
                                <p>Each layout includes basic components only.</p>
                            </li>
                            <li>
                                <p>Select your choice of layout from starter kit, customize it with optional changes like
                                    colors and branding, add required dependency only.</p>
                            </li>
                            <li>
                                <p class="mb-0">Using template engine to generate whole template quickly with your
                                    selected layout and other custom changes. </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>How to use starter kit ?</h4>
                    </div>
                    <div class="card-body">
                        <p><span class="f-w-600">HTML</span></p>
                        <p>If you know just HTML, select your choice of layout from starter kit folder, customize it with
                            optional changes like colors and branding, add required dependency only.</p>
                        <p><span class="f-w-600">PUG</span></p>
                        <p>To use PUG it required node.js and basic knowledge of using it. Using PUG as template engine to
                            generate whole template quickly with your selected layout and other custom changes. To getting
                            start with PUG usage & template generating process please refer template documentation.</p>
                        <div class="alert alert-primary inverse" role="alert"><i class="icon-info-alt"></i>
                            <h5>Tips!</h5>
                            <p class="mb-0">Hideable navbar option is available for fixed navbar with static navigation
                                only. Works in top and bottom positions, single and multiple navbars.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Simple Card</h4>
                    </div>
                    <div class="card-body">
                        <h6>HTML Ipsum Presents</h6>
                        <p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac
                            turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
                            Donec eu libero sit amet quam egestas
                            semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet
                            est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo
                                vitae</code>, ornare sit amet, wisi. Aenean
                            fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim
                            ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.
                        </p>
                        <h6>Header Level 2</h6>
                        <ol>
                            <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                            <li>Aliquam tincidunt mauris eu risus.</li>
                        </ol>
                        <div class="figure d-block">
                            <blockquote class="blockquote">
                                <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at
                                    felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec
                                    eleifend, libero at sagittis mollis, tellus est malesuada
                                    tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
                                </p>
                            </blockquote>
                        </div>
                        <h4>Header Level<span> 3</span></h4>
                        <ul>
                            <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                            <li>Aliquam tincidunt mauris eu risus.</li>
                        </ul>
                        <pre>#header h1 a {
display: block;
width: 300px;
height: 80px;
}</pre>
                        <dl>
                            <dt>Definition list</dt>
                            <dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat.</dd>
                            <dt>Lorem ipsum dolor sit amet</dt>
                            <dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat.</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>With Header</h4>
                    </div>
                    <div class="card-body">
                        <h5>Content title</h5>
                        <p class="mb-0">Add a heading to card with <code>.card-header</code> class</p>
                        <p class="mb-0">You may also include any &lt;h1&gt;-&lt;h6&gt; with a <code>.card-header </code> &
                            <code>.card-title</code> class to add heading.
                        </p>
                        <p class="mb-0">Jelly beans sugar plum cheesecake cookie oat cake soufflé. Tart lollipop carrot
                            cake sugar plum. Marshmallow wafer tiramisu jelly beans.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h4>With Header & No Border</h4>
                    </div>
                    <div class="card-body">
                        <h5>Content title</h5>
                        <p class="mb-0">Add a heading to card with <code>.card-header </code> class & without header
                            border<code>.border-bottom-0</code> class.</p>
                        <p class="mb-0">You may also include any &lt;h1&gt;-&lt;h6&gt; with a <code>.card-header </code> &
                            <code>.card-title</code> class to add heading.
                        </p>
                        <p class="mb-0">Gingerbread brownie sweet roll cheesecake chocolate cake jelly beans marzipan
                            gummies dessert. Jelly beans sugar plum cheesecake cookie oat cake soufflé.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
