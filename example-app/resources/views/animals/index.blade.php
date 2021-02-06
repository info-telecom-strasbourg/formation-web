<!-- Welcome page -->
@extends('layouts.master')

@section('title', 'Les poti-animaux')

@section('page-title', 'Les poti-animaux')

@section('content')
    <!-- Ajouter un animal -->
    <div class="text-center my-3">
        <a href="{{ route('poti-animals.create') }}" class="btn btn-primary big-btn" role="button">Ajouter un animal</a>
    </div>

    <!-- Liste des poti-animaux -->
    <div class="listing mt-5">
        @foreach ($potiAnimals as $potiAnimal)
            <div class="card animal-card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $potiAnimal->name }}</h5>
                    <div class="listing">
                        <a href="{{ route('poti-animals.show', [$potiAnimal->id]) }}" class="btn btn-success small-btn m-1" data-toggle="modal"
                            data-target="#modal-poti-chat">Voir plus</a>
                        <a href="{{ route('poti-animals.edit', [$potiAnimal->id]) }}" class="btn btn-warning small-btn m-1" role="button">Modifier</a>
                        <a href="{{ route('poti-animals.destroy', [$potiAnimal->id]) }}" class="btn btn-danger small-btn m-1">Supprimer</a>
                        <button class="btn btn-primary small-btn m-1 btn-toggle">Masquer</button>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection