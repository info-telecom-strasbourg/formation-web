<!-- Welcome page -->
@extends('layouts.master')

@section('title', 'Modification d\'un animal')

@section('page-title', 'Modification d\'un animal')

@section('content')

    <!-- Formulaire d'ajout -->
    <form id="add-new-animal" class="form-size needs-validation" action="{{ route('poti-animals.update', [$potiAnimal->id]) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control has-validation" placeholder="Nom" pattern=".{5,}" required
                title="5 charactères au minimum" value="{{ $potiAnimal->name }}">
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group mb-3">
            <label>Type</label>
            <div class="d-flex align-items-center justify-content-between">
                <select name="types_id" id="selectType" class="custom-select mr-sm-2 has-validation" required>
					@foreach ($types as $type)
                    	<option value="{{ $type->id }}">{{ $type->name }} @if ($loop->index == $potiAnimal->types_id) selected @endif</option>                        
					@endforeach

                </select>
                <button id="add-animal-option" class="ml-2 btn btn-primary small-btn" data-toggle="modal" data-target="#modal-add-type">
                    +
                </button>
            </div>
            <div class="invalid-feedback"></div>
        </div>
        <div class="text-center my-3">
            <button type="submit" class="btn btn-success small-btn">Modifier</button>
        </div>
    </form>

    <div id="modal-add-type" class="modal fade" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modal-add-opt-title"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-add-opt-title">Ajoutez une option</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-size needs-validation">
                        <div class="form-group mb-3">
                            <label>Ajouter un type de poti-animal</label>
                            <input id="input-type" type="text" class="form-control has-validation" pattern=".{5,}" placeholder="Nom" required
                                title="5 charactères au minimum">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="text-center my-3">
                            <button type="submit" class="btn btn-success small-btn">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
