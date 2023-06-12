<div class="card  mb-3" style="max-width: 18rem;">
    <div class="card-header ">

        <a class="nav-link" href="#"> {{$property->title}}</a>
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$property->adress}}</h5>
        <p class="card-text">{{$property->descreption}}</p>
        <li><small>Nombre de pieces : {{$property->rooms}}</small></li>
        <li><small>Nombre de pieces a coucher : {{$property->bedrooms}}</small></li>
        <strong class="text-primary">prix : {{number_format($property->price,thousands_separator:' ' )}}$</strong>
    </div>
</div>
