@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Lista dokumentów</h1>
        </div>

        <div class="row justify-content-center mb-3">
            <a class="btn btn-primary" href="/documents/create">Dodaj nowy dokument</a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($documents as $document)
                    <div class="card mb-2">
                        <div class="card-body">
                            <a href="/documents/{{$document->id}}" class="text-dark">
                                <p class="document--title mb-0">{{$document->title}}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
