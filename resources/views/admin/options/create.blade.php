@extends('admin.layout')
@section('title','Liste options')
@section('content')
    <div class="d-flex justify-content-between align-item-center mt-3">
        <h3>Nouvelle option</h3>
        <a href="{{route('admin.option.index')}}" class="btn btn-primary">Liste des Options</a>
    </div>
    <div class="mt-5">
        <form class="vstack gap-2" action="{{route('admin.option.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="option" class="form-label">Nom</label>
                    <input id="name" name="name" class="form-control" type="text" placeholder="Entrer le nom" value="{{old('name')}}">
                    @error('name')
                    <div class="alert alert-warning" role="alert">
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

