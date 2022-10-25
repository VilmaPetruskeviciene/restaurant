@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Restoranas</h2>
                </div>
                <div class="card-body">
                    <div class="category">
                        <h5>{{$restoranas->title}}</h5>
                    </div>
                    <ul class="list-group">
                        @forelse($restoranas->patiekalai as $pat)
                        <li class="list-group-item">
                            <div class="movies-list">
                                <div class="content">
                                    <h2><span>Pavadinimas: </span>{{$pat->title}} </h2>
                                    <h4><span>Kaina: </span>{{$pat->price}}</h4>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">Nėra patiekalų.</li>
                        @endforelse
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
