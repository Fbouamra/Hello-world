@php
    $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
@endphp
<nav class="navbar navbar-expand-lg navbar-dark  bd-navbar">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">GestImmo</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item ">
                <a class="nav-link {{ str_contains($currentRoute, 'biens') ? 'active' : '' }}" href="{{route('property.biens')}}">les derniers Biens </a>
            </li>
           <li class="nav-item">
                <a class="nav-link {{str_contains($currentRoute,'miniature') ? 'active' : ''}} " href="{{route('property.miniature')}}">Tout les biens</a>
            </li>

        </ul>

       <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>-->
    </div>
</nav>
