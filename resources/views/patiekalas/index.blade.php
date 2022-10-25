@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Patiekalai</h2>
                    <form action="{{route('p_index')}}" method="get">
                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                
                                            </div>
                                            <div class="col-6">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-9">
                                            <div class="input-group mb-3">
                                                {{--<input type="text" name="s" class="form-control" value="{{$s}}">--}}
                                                {{--<button type="submit" class="input-group-text">Search</button>--}}
                                            </div>
                                            </div>
                                            <div class="col-3">
                                                {{--<a href="{{route('p_index')}}" class="btn btn-secondary m-1">Reset</a>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                </div>
                                <div class="buttons">
                                    <a href="{{route('p_show', $pat)}}" class="btn btn-info">Rodyti</a>
                                    @if(Auth::user()->role >= 10)
                                    <a href="{{route('p_edit', $pat)}}" class="btn btn-success">Koreguoti</a>
                                    <form action="{{route('p_delete', $pat)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Ištrinti</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">Nėra patiekalų.</li>
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
