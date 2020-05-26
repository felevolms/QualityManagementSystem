@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($document->versions as $version)
                    <div class="card">
                        <a href="{{$version->url}}">
                            <div class="card-header">
                                {{$document->title}} - version {{$version->$version}} (click to download)
                            </div>
                        </a>
                        <div class="card-body">
                            Created at {{$version->created_at}}
                            <br>
                            Modified at {{$version->updated_at}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
