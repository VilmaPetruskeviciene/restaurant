@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Patiekalas</h2>
                </div>
                <div class="card-body">
                    <div class="truck-show">
                        <div class="line"><small>Pavadinimas: </small><h5>{{$patiekalas->title}}</h5></div>
                        <div class="line"><small>Kaina: </small><h5>{{$patiekalas->price}}</h5></div>
                        <div class="line"><small>Restoranas: </small><h5>{{$patiekalas->getRestoranas->title}}</h5></div>
                        @if($patiekalas->photo)
                            <div class="img">
                                <img src="{{$patiekalas->photo}}">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
