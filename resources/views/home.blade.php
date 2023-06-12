@extends('base')
@section('title','Biens')
@section('content')
<div class="container bg-light mt-5 text-center" id="base_header">
    <h2>Bien venu</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A animi autem exercitationem fugiat reiciendis? Assumenda autem culpa fugit, impedit, incidunt iusto nobis, nostrum nulla possimus quae reprehenderit totam voluptates voluptatibus.</p>
</div>
    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">

            @foreach($properties as $property)
                <div class="col">
                    @include('property.cadproperty')
                </div>
            @endforeach

        </div>
    </div>

@endsection
