@extends('admin.layout')
@section('title','Edition')
@section('content')
    <div class="d-flex justify-content-between align-item-center mt-3">
        <h3>Nouveau Bien</h3>
        <a href="{{route('admin.option.index')}}" class="btn btn-primary">Liste des Biens</a>
    </div>
    <div class="mt-5">
        <form class="vstack gap-2 needs-validation" action="{{route('admin.option.update',$option)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <label for="name" class="form-label">Nom</label>
                    <input id="name" name="name" class="form-control @error('name') is-invalid @enderror " type="text" placeholder="Entrer le nom" value="{{old('name',$option->name)}}">
                    @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>


            </div>






            <div class="row">
                <div class="col-md-4 ">
                    <button type="submit" class="btn btn-primary">Enregitrer</button>
                </div>
            </div>


        </form>
    </div>
@endsection

