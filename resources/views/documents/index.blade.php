@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($documents as $document)
                    <div class="card">
                        <a href="/documents/{{$document->id}}">
                            <div class="card-body">
                                {{$document->title}}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
