<!-- Welcome page -->
@extends('layouts.master')

@section('title', $potiAnimal->name)

@section('page-title', $potiAnimal->name)

@section('content')

    <!-- Détail poti-animal -->
    <div class="card animal-card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title text-center">{{ $potiAnimal->name }}</h5>
            <div class="listing">
                <a href="{{ route('poti-animals.edit', [$potiAnimal->id]) }}" class="btn btn-warning small-btn m-1"
                    role="button">Modifier</a>
                <form action="{{ route('poti-animals.destroy', [$potiAnimal->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger small-btn m-1" type="submit">Supprimer</button>
                </form>
                <button class="btn btn-primary small-btn m-1 btn-toggle">Masquer</button>
            </div>
        </div>
    </div>

@endsection
