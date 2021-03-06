@extends('layouts.main')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Univesités</h1>
    </div>
    <div class="row">
        <form action="{{ route('list.universite') }}" method="POST">
            @csrf
            @method('GET')
            <div class="form-row align-items-center m-3">
                <div class="col mx-3">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control bg-light border-2 small" placeholder="Rechercher...">
                        <select name="selector" id="" class="form-control">
                            <option value="name">Nom</option>
                            <option value="short_name">Nom court</option>
                            <option value="location">Localisation</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i> Rechercher
                            </button>
                        </div>
                    </div>
                </div>  
        </form>      
    </div>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">List des universités</h6>
                @if ((Auth()->user()->type_user == '3') || (Auth()->user()->type_user == '1'))
                    <a href="{{ route('create.universite') }}" class="btn btn-primary">Ajouter</a>
                @endif
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Nom court</th>
                                <th scope="col">Localisation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($universites as $universite)
                                <tr>
                                    <th>{{ $universite->id }}</th>
                                    <th>{{ $universite->name }}</th>
                                    <th>{{ $universite->short_name }}</th>
                                    <th>{{ $universite->location }}</th>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row">-</th>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>  
    </div>

@endsection