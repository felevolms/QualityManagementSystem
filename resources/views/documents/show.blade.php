@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>{{$document->title}}</h1>
        </div>

        <div class="row justify-content-center mb-3">
            <a class="btn btn-primary" href="/documents/{{$document->id}}/edit">Dodaj nową wersję dokumentu</a>
            @can('delete document')
                <a class="btn btn-danger ml-2" href="#" data-toggle="modal" data-target="#deleteDoc">Usuń ten dokument</a>
                @include('offcanvas.delete', [
                    'modalId' => 'deleteDoc',
                    'name' => $document->title,
                    'action' => '/documents/' . $document->id
                ])
            @endcan
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($document->versions as $version)
                    <div class="card">
                        <div class="card-header">
                            <a href="/document-versions/{{$version->id}}">
                                <p class="document--title d-inline-block m-0 align-middle">
                                    {{$document->title}} - wersja {{$version->version}} (kliknij, aby pobrać)
                                </p>
                            </a>

                            @can('delete version')
                                <a class="btn btn-sm btn-danger ml-2 d-inline-block float-right" href="#"
                                   data-toggle="modal" data-target="#deleteVersion{{$version->version}}">Usuń tę wersję</a>
                                @include('offcanvas.delete', [
                                    'modalId' => 'deleteVersion' . $version->version,
                                    'name' => 'wersję ' . $version->version . ' dokumentu ' . $document->title,
                                    'action' => '/document-versions/' . $version->id
                                ])
                            @endcan
                        </div>

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
