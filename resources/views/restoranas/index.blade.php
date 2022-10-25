@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Restoranai</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($restoranas as $rest)
                        <li class="list-group-item">
                            <div class="categories-list">
                                <div class="content">
                                    <h2>{{$rest->title}}</h2>
                                    <small>[{{$rest->patiekalai()->count()}}]</small>

                                </div>
                                <div class="buttons">
                                    <a href="{{route('r_show', $rest)}}" class="btn btn-info">Rodyti</a>
                                    @if(Auth::user()->role >= 10)
                                    <a href="{{route('r_edit', $rest)}}" class="btn btn-success">Koreguoti</a>
                                    <form action="{{route('r_delete', $rest)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Ištrinti</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">Nėra restoranų.</li>
                        @endforelse
                    </ul>
                </div>
                <div class="me-3 mx-3">
                    {{-- {{ $categories->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
