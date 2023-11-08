@extends('layouts.app')

@section('content')

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
                        <input type='text' class='form-control' name='name'></input>
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
                        <textarea class='form-control' name='description'></textarea>
                    </div>
                </div>

                <div class="col-lg-4 col-lg-3 col-sm-12 mt-1">
                    <div class="form-group">
                        <span> Início das inscrições </span>
                        <input type='date' class='form-control' name='inscription_begins_at'></input>
                    </div>
                </div>

                <div class="col-lg-4 col-lg-3 col-sm-12 mt-1">
                    <div class="form-group">
                        <span> Fim das Inscrições </span>
                        <input type='date'class='form-control' name='inscription_ends_at'></input>
                    </div>
                </div>

                <div class="col-lg-4 col-lg-3 col-sm-12 mt-1">
                    <div class="form-group">
                        <span> Máximo de participantes </span>
                        <input type='number' class='form-control' name='description'></input>
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