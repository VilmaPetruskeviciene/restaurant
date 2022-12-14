@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Patiekalai</h2>
                    <form action="{{route('home')}}" method="get">
                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <select name="rest" class="form-select mt-1">
                                        <option value="0">All</option>
                                        @foreach($restoranas as $restor)
                                        <option value="{{$restor->id}}" @if($rest==$restor->id) selected @endif>{{$restor->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-5">
                                    <select name="sort" class="form-select mt-1">
                                        <option value="0">All</option>
                                        @foreach($sortSelect as $option)
                                        <option value="{{$option[0]}}" @if($sort==$option[0]) selected @endif>{{$option[1]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="input-group-text mt-1">Filter</button>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-5 mt-1">
                                        <div class="input-group mb-3">
                                            <input type="text" name="s" class="form-control" value="{{$s}}">
                                            <button type="submit" class="input-group-text">Search</button>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <a href="{{route('home')}}" class="btn btn-secondary m-1">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <ul class="list-group">
            @forelse($patiekalas as $pat)
            <li class="list-group-item">
                <div class="movies-list list-group">
                    <div class="content">
                        <h2><span>Pavadinimas: </span>{{$pat->title}}</h2>
                    </div>
                    <div class="content">
                        <h4><span>Kaina: </span>{{$pat->price}}</h4>
                        <h5>
                            <span>Restoranas: </span>
                            <a href="{{route('r_show', $pat->getRestoranas->id)}}">
                                {{$pat->getRestoranas->title}}
                            </a>
                        </h5>
                        @if($pat->getPhotos()->count())
                        <h5><a href="{{$pat->lastImageUrl()}}" target="_BLANK">Nuotraukos: {{$pat->getPhotos()->count()}}</a></h5>
                        @endif
                        <h4><span>??vertinimas: </span>{{$pat->rating ?? 'ne??vertintas'}}</h4>
                    </div>
                    <div class="buttons">
                        <form action="{{route('rate', $pat)}}" method="post">
                            <select name="rate">
                                @foreach(range(1, 10) as $value)
                                <option value="{{$value}}">{{$value}}</option>
                                @endforeach
                            </select>
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-info">??vertinti</button>
                        </form>
                    </div>
                </div>
            </li>
            @empty
            <li class="list-group-item">N??ra patiekal??.</li>
            @endforelse
        </ul>
    </div>
    <div class="me-3 mx-3">
        {{--{{ $movie->links() }}--}}
    </div>
</div>
</div>
</div>
</div>
@endsection
