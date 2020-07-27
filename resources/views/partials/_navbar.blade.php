<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class='nav-item'>
            <form action="{{ route('search') }}" method="get">

                <input type="text" name='search'>
                <button type="submit"> find</button>
            </form>
        </li>
        <li class="nav-item">
            <a class="nav-link"

               href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
               <i class="fas fa-sign-out-alt fs-l"
                  data-toggle="tooltip"
                  data-placement="right"
                  title="{{ __('Logout') }}"
               ></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
