@extends('admin.layout')
@section('title','Liste properties')
@section('content')


    <div class="d-flex justify-content-between align-items-center mt-5">
        <h1>Liste des Biens</h1>
        <a href="{{route('admin.property.create')}}" class="btn btn-primary">Ajouter un Bien</a>
    </div>
    <table class="table table-striped ">
        <thead>
        <tr>
            <th>Title</th>
            <th>adress</th>
            <th>Surface</th>
            <th>rooms</th>
            <th>price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        </thead>
        <tbody>
        @foreach($properties as $property)
            <tr>
                <td>{{$property->title}}</td>
                <td>{{$property->adress}}</td>
                <td>{{$property->surface}}m2</td>
                <td>{{$property->rooms}}</td>
                <td>
                        @if($property->sold)
                            <span class="badge bg-sucess">Vendu</span>
                    @else
                    <span class="badge bg-secondary">Non Vendu</span>
                    @endif
                </td>
               <td> {{$property->sold}}</td>
                <td class="d-flex">
                    <a href="{{route('admin.property.edit',$property)}}" class="btn btn-secondary">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Supprimer
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h1>Voulez vous vraiment suprimer ce Bien ?</h1>
                                </div>
                                <form action="{{ route('admin.property.destroy', ['property' => $property]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Suprimer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$properties->links('pagination::bootstrap-4')}}





@endsection
