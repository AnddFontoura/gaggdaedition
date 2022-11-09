@extends('layouts.app')

@section('content')
<form action="{{ route('user_information.save') }}" method="POST">
    @csrf
    <div class="card mt-3">
        <div class="card-header">
            Meus dados
        </div>

        <div class="card-body">
            <div class="form-group"> 
                <span> CPF </span>
                <input type="text" class="form-control" name="cpf" value="@if(isset($userInformation)){{ $userInformation->cpf }}@else{{ old('cpf') }}@endif">
            </div>

            <div class="form-group"> 
                <span> Telefone </span>
                <input type="text" class="form-control" name="phone" value="@if(isset($userInformation)){{ $userInformation->phone }}@else{{ old('phone') }}@endif">
            </div>

            <div class="form-group"> 
                <span> Data de Nascimento </span>
                <input type="date" class="form-control" name="birthday" value="@if(isset($userInformation)){{ $userInformation->birthday }}@else{{ old('birthday') }}@endif">
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" class="btn btn-success" value="Atualizar meus dados"> 
        </div>
    </div>
</form>

@endsection