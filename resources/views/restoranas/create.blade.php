@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>Naujas Restoranas</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('r_store')}}" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Pavadinimas</span>
                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Miestas</span>
                            <input type="text" name="town" class="form-control" value="{{old('town')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Adresas</span>
                            <input type="text" name="address" class="form-control" value="{{old('address')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Darbo laikas</span>
                            <input type="text" name="work_time" class="form-control" value="{{old('work_time')}}">
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-secondary mt-4">Sukurti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
