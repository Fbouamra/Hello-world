@extends('base')
@section('title','Liste des biens')
@section('content')
    <div class="container bg-light mt-5 my-2">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="" method="GET">
            <div class="row">
                <div class="col-auto">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" value="{{ request('title') }}">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" class="form-control" value="{{ request('price') }}">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-group">
                        <label for="surface">Surface:</label>
                        <input type="number" name="surface" class="form-control" value="{{ request('surface') }}">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-group">
                        <label for="rooms">Rooms:</label>
                        <input type="number" name="rooms" class="form-control" value="{{ request('rooms') }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Apply Filters</button>
        </form>

    </div>
    <div class="container">
      <div class="row justify-content-around">
          @foreach($properties as $property)
              <div class="col-3">
                  @include('property.cadproperty')
              </div>

          @endforeach
      </div>

{{$properties->links(\Illuminate\Pagination\Paginator::useBootstrap())}}
    </div>
@endsection
