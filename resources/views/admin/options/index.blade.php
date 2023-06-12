@extends('admin.layout')
@section('title','Liste des options')
@section('content')


    <div class="d-flex justify-content-between align-items-center mt-5">
        <h1>Liste des Biens</h1>
        <a href="{{route('admin.option.create')}}" class="btn btn-primary">Ajouter une option</a>
    </div>
    <table class="table table-striped ">
        <thead>
        <tr>
            <th>Nom</th>
            <th>action</th>

        </tr>

        </thead>
        <tbody>
        @foreach($options as $option)
            <tr>
                <td>{{$option->name}}</td>


                <td class="d-flex justify-content-end">
                    <a href="{{route('admin.option.edit',$option)}}" class="btn btn-secondary">Edit</a>
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
                                    <h1>Voulez vous vraiment suprimer cette option ?</h1>
                                </div>
                                <form action="{{ route('admin.option.destroy', ['option' => $option]) }}" method="POST">
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
    {{$options->links('pagination::bootstrap-4')}}





@endsection
