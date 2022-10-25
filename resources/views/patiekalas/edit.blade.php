@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>Pakeisti patiekalą</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('p_update', $patiekalas)}}" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Pavadinimas</span>
                            <input type="text" name="title" class="form-control" value="{{old('title', $patiekalas->title)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Kaina</span>
                            <input type="text" name="price" class="form-control" value="{{old('price', $patiekalas->price)}}">
                        </div>
                        <div data-clone class="input-group mt-3">
                            <span class="input-group-text">Nuotrauka</span>
                            <input type="file" name="photo[]" multiple class="form-control">
                        </div>
                        <div class="img-small-ch mt-3">
                            @forelse($patiekalas->getPhotos as $photo)
                            <div class="img">
                                <label for="{{$photo->id}}-del-photo">x</label>
                                <input type="checkbox" value="{{$photo->id}}" id="{{$photo->id}}-del-photo" name="delete_photo[]">
                                <img src="{{$photo->url}}">
                            </div>
                            @empty
                            <h2>Dar nėra nuotraukų.</h2>
                            @endforelse
                        </div>
                        <select name="restoranas_id" class="form-select mt-3">
                            <option value="0">Pasirinkti restoraną</option>
                            @foreach($restoranas as $rest)
                            <option value="{{$rest->id}}" @if($rest->id == old('restoranas_id', $patiekalas->rest_id)) selected @endif>{{$rest->title}}</option>
                            @endforeach
                        </select>
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-secondary mt-4">Išsaugoti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
