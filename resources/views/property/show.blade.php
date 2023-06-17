@extends('base')
@section('title','detail')
@section('content')
    <div class="container bg-light mt-5 text-center" id="base_header">
        <h2>{{$property->title}}</h2>
   </div>
    <div class="container">

        <div class="row">
            <div class="col-6">
                <h2>{{ number_format($property->price, 0, ',', ' ') }}</h2>
                <td>{{$property->adress}}</td>
                <td>{{$property->surface}}</td>
                <td>{{$property->rooms}}</td>
                <td><strong>{{number_format($property->price,thousands_separator: ' ')}}</strong></td>
                <td>
                    @foreach($property->options as $option)
                        <span class="badge badge-primary"> {{$option->name}}</span>
                    @endforeach
                </td>
            </div>
            <div class="col-6">

                <form action="{{route('property.contact',$property)}}"  method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name"  placeholder="Votre nom">
                        @error('name')
                        <div class="alert alert-warning" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="email">
                        @error('email')
                        <div class="alert alert-warning" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>


                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                </div>
                    @error('message')
                    <div class="alert alert-warning" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                <button class="btn btn-primary">Envoyer</button>
                </form>
            </div>

        </div>





    </div>

@endsection
