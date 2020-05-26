@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-3">
            <h1>Nowa wersja dokumentu {{$document->title}}</h1>
        </div>

        <form method="post" action="/documents/{{$document->id}}" enctype="multipart/form-data" class="justify-content-center">
            @method('PUT')
            @csrf

            <div class="form-group">
                <div class="input-group input-file" data-name="document">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary btn-choose" type="button">Wybierz</button>
                    </span>
                    <input type="text" class="form-control" placeholder='Wybierz plik...'/>
                    <span class="input-group-btn">
                        <button class="btn btn-danger btn-reset" type="button">Wyczyść</button>
                    </span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Zapisz</button>
        </form>
    </div>
@endsection
