@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Nowy dokument</h1>
        </div>

        <form method="post" action="/documents" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nazwa dokumentu</label>
                <input class="form-control" type="text" id="title" name="title" placeholder="Nazwa dokumentu">
            </div>

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
