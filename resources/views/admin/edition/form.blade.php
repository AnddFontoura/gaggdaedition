@extends('layouts.app')

@section('content')

@php
    $editionName = isset($edition) ? $edition->name : null;
    $editionDescription = isset($edition) ? $edition->description : null;
    $editionInscriptionBegin = isset($edition) ? $edition->inscriptions_begins_at : null;
    $editioninscriptionEnd = isset($edition) ? $edition->inscriptions_ends_at : null;
    $editionParticipants = isset($edition) ? $edition->max_participants : null;
@endphp

<div class='col-12'>
    <a href="{{ route('admin.editions.index') }}" class='btn btn-lg btn-primary'> Listar Edições </a>
</div>

<form action="@if($edition){{ route('admin.editions.update', $edition->id) }}@else{{ route('admin.editions.save') }}@endif" method="POST">
    @csrf
    <div class="card mt-3">
        <div class="card-header">
            @if($edition) Editar @else Criar @endif Edição
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 mt-1">
                    <div class="form-group">
                        <span> Nome da Edição </span>
                        <input type='text' class='form-control' name='name' value='@if(isset($editionName)){{ $editionName }}@else{{ old("name") }}@endif'></input>
                    </div>
                </div>

                <div class="col-12 mt-1">
                    <div class="form-group">
                        <span> Banner da Edição </span>
                        <input type='file' class='form-control' name='banner'></input>
                    </div>
                </div>

                <div class="col-12 mt-1">
                    <div class="form-group">
                        <span> Descrição da Edição </span>
                        <textarea class='form-control' name='description'>@if(isset($editionDescription)){{ $editionDescription }}@else{{ old("description") }}@endif</textarea>
                    </div>
                </div>

                <div class="col-lg-4 col-lg-3 col-sm-12 mt-1">
                    <div class="form-group">
                        <span> Início das inscrições </span>
                        <input type='date' class='form-control' name='inscriptions_begins_at' value='@if(isset($editionInscriptionBegin)){{ $editionInscriptionBegin }}@else{{ old("inscriptions_begins_at") }}@endif'></input>
                    </div>
                </div>

                <div class="col-lg-4 col-lg-3 col-sm-12 mt-1">
                    <div class="form-group">
                        <span> Fim das Inscrições </span>
                        <input type='date'class='form-control' name='inscriptions_ends_at' value='@if(isset($editionInscriptionEnd)){{ $editionInscriptionEnd }}@else{{ old("inscriptions_ends_at") }}@endif'></input>
                    </div>
                </div>

                <div class="col-lg-4 col-lg-3 col-sm-12 mt-1">
                    <div class="form-group">
                        <span> Máximo de participantes </span>
                        <input type='number' class='form-control' name='max_participants' value='@if(isset($editionParticipants)){{ $editionParticipants }}@else{{ old("max_participants") }}@endif'></input>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" class="btn btn-success" value="@if($edition) Editar @else Criar @endif Edição">
        </div>
    </div>
</form>

@endsection