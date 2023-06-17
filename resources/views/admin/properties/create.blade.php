@extends('admin.layout')
@section('title','Liste properties')
@section('content')
    <div class="d-flex justify-content-between align-item-center mt-3">
        <h3>Nouveau Bien</h3>
        <a href="{{route('admin.property.index')}}" class="btn btn-primary">Liste des Biens</a>
    </div>

    <div class="mt-5">
        <form class="vstack gap-2" action="{{route('admin.property.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="title" class="form-label">Nom</label>
                    <input id="title" name="title" class="form-control" type="text" placeholder="Entrer le nom" value="{{old('title')}}">
                    @error('title')
                    <div class="alert alert-warning" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="adress" class="form-label">Adresse</label>
                    <input id="adress" class="form-control" type="text" name="adress" placeholder="Entrer l'adresse" value="{{old('adress')}}">
                    @error('adress')
                    <div class="alert alert-warning" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="descreption" class="form-label">Descreption</label>
                   <textarea name="descreption" id="descreption" class="form-control" cols="3" placeholder="Entrer la description">
                        {{old('descreption')}}
                   </textarea>
                    @error('descreption')
                    <div class="alert alert-warning" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="surface" class="form-label">surface</label>
                    <input id="surface" class="form-control" type="number" name="surface" placeholder="m2">
                    @error('surface')
                    <div class="alert alert-warning" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="rooms" class="form-label">Chambres</label>
                    <input id="rooms" class="form-control" type="number" name="rooms">
                    @error('rooms')
                    <div class="alert alert-warning" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="bedrooms" class="form-label">BedRoms</label>
                    <input id="bedrooms" class="form-control" type="number" name="bedrooms">
                    @error('bedrooms')
                    <div class="alert alert-warning" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="floor" class="form-label">Etage</label>
                    <input id="floor" class="form-control" type="number" name="floor">
                    @error('floor')
                    <div class="alert alert-warning" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 ">
                    <label for="options" class="form-label">Options</label>
                    <select name="options[]" id="options" class="form-control" multiple>
                        @foreach($options as $id=>$name)
                            <option value="{{$id}}"{{(collect(old('options')))->contains($id) ? 'selected' : ''}}>{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-control-file">
                    <div class="form-group">
                        <label for="photo">Ajouter la photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" value="{{old('photo')}}">
                        @error('photo')
                        {{$message}}
                        @enderror
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 pt-2 pb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sold" name="sold" value="1" {{ old('sold') ? 'checked' : '' }}>
                        <label class="form-check-label" for="sold">Vendu?</label>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="price" class="form-label">Price</label>
                    <input id="price" class="form-control" type="number" name="price">
                    @error('price')
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




