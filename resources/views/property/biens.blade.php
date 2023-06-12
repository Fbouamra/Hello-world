@extends('base')
@section('title','Liste des biens')
@section('content')
    <div class="container bg-light mt-5 text-center" id="base_header">
        <h2>Nos derniers Biens</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A animi autem exercitationem fugiat reiciendis? Assumenda autem culpa fugit, impedit, incidunt iusto nobis, nostrum nulla possimus quae reprehenderit totam voluptates voluptatibus.</p>
    </div>
    <div class="container">
       <table class="table">
           <thead class="thead-dark">
           <tr>
               <td>Title</td>
               <td>adress</td>
               <td>surface</td>
               <td>rooms</td>
               <td>price</td>
               <td>options</td>
           </tr>
           </thead>
           <tbody>
           @foreach($properties as $property)
               <tr>
                   <td>{{$property->title}}</td>
                   <td>{{$property->adress}}</td>
                   <td>{{$property->surface}}</td>
                   <td>{{$property->rooms}}</td>
                   <td><strong>{{number_format($property->price,thousands_separator: ' ')}}</strong></td>
                   <td>
                       @foreach($property->options as $option)
                          <span class="badge badge-primary"> {{$option->name}}</span>
                       @endforeach
                   </td>
               </tr>
           @endforeach
           </tbody>
       </table>
        {{$properties->links('pagination::bootstrap-4')}}
    </div>

@endsection
