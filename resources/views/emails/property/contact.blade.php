<x-mail::message>
# {{$property->title}}

Une demande de contact pour le bien <a href="{{route('property.show',$property)}}">{{$property->title}}</a>
    -Surface: {{$property->surface}}
    -Prix : {{ number_format($property->price, 0, '.', ' ') }}
**Infos de l'intérésé :
    -Nom : {{$data['name']}}
    -Message : <p>{{$data['name']}}</p>


<br>
{{ config('app.name') }}
</x-mail::message>
