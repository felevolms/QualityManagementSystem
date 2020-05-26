@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>{{$document->title}}</h1>
        </div>

        <div class="row justify-content-center mb-3">
            <a class="btn btn-primary" href="/documents/{{$document->id}}/edit">Dodaj nową wersję dokumentu</a>
            <a class="btn btn-danger ml-2" href="#" data-toggle="modal" data-target="#deleteDoc">Usuń ten dokument</a>
            @include('offcanvas.delete', ['modalId' => 'deleteDoc', 'objectId' => $document->id, 'name' => $document->title])
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($document->versions as $version)
                    <div class="card">
                        <div class="card-header">
                            <p class="d-inline-block m-0 align-middle">
                                <a href="/document-versions/{{$version->id}}">
                                    {{$document->title}} - wersja {{$version->version}} (kliknij, aby pobrać)
                                </a>
                            </p>

{{--                            <a class="btn btn-sm btn-danger ml-2 d-inline-block float-right" href="#"--}}
{{--                               data-toggle="modal" data-target="#deleteVersion">Usuń tę wersję</a>--}}
{{--                            @include('offcanvas.delete', [--}}
{{--                                'modalId' => 'deleteVersion',--}}
{{--                                'objectId' => $version->id,--}}
{{--                                'name' => 'wersję ' . $version->version . ' dokumentu ' . $document->title--}}
{{--                            ])--}}
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
