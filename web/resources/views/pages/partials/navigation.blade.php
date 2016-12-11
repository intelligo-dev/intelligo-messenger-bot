
<nav id="tf-menu">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">iHelp</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if (!$signedIn)
                    <li><a href="{{ url('/') }}" class="page-scroll">Нүүр</a></li>
                    <li><a href="{{ route('jobs.index') }}" class="page-scroll">Ажил</a></li>
                    <li><a href="{{ url('/login') }}" class="page-scroll">Ажил нэмэх</a></li>
                    <li><a href="{{ url('/login') }}" class="page-scroll">Нэвтрэх</a></li>
                    <li><a href="{{ url('/register') }}" class="page-scroll">Бүртгүүлэх</a></li>
                @else
                    <li><a href="{{ url('/') }}" class="page-scroll">Нүүр</a></li>
                    <li><a href="{{ route('jobs.index') }}" class="page-scroll">Ажил</a></li>
                    <li><a href="{{ route('jobs.create') }}" class="page-scroll">Ажил нэмэх</a></li>
                    <li><a href="{{ route('profile.index', $user->username) }}" class="page-scroll">{{ $user->username }}</a></li>
                    <li><a href="{{ url('/logout') }}" class="page-scroll"><i class="fa fa-btn fa-sign-out"></i>Гарах</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
        
    </div><!-- /.container-fluid -->
</nav>
