<header id="header">
    <div id="navwrap">
        <!-- Navigation -->
        <nav class="transparent-white navbar navbar-transparent navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="{{ route('index') }}">
                        <span class="hidden-xs"><img src="{{ asset('images/annam-logo.png') }}"></span>
                        <span class="font-white visible-xs"><img src="{{ asset('images/annam-logo.png') }}"></span>
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav" id="top-nav">
                        <li class="active">
                            <a href="{{ url('menu' )}}">Menu</a>
                        </li>
                        <li>
                            <a href="#">How it Works</a>
                        </li>
                        <li>
                            <a href="{{ url('login') }}">Login/Register</a>
                        </li>
                        <li class="cart-menu">
                            <a href="cart" class="cart-display"><span class="add-cart">0</span><img src="images/cart.png"></a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    </div>
    <!-- /.navwrap -->
</header>
