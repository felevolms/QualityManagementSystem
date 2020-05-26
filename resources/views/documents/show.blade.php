@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$document->title}}</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($document->versions as $version)
                    <div class="card">
                        <a href="/document-versions/{{$version->id}}">
                            <div class="card-header">
                                {{$document->title}} - wersja {{$version->$version}} (kliknij, aby pobrać)
                            </div>
                        </a>
                        <div class="card-body">
                            Utworzono: {{$version->created_at}}
                            <br>
                            Ostatnia modyfikacja: {{$version->updated_at}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
