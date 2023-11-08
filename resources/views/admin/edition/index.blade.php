@extends('layouts.app')

@section('content')

<form action="{{ route('admin.editions.index') }}" method="GET">
    <div class="card bg-dark text-white">
        <div class="card-header">
            Filtros
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="form-group">
                        <span> Pesquisar por Jogador</span>
                       
                    </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="form-group">
                        <span> Pesquisar por Numero da partida</span>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="form-group">
                        <span> Tipo de partida</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" class="btn btn-success" value="Filtrar Edições">
        </div>
    </div>
</form>

<div class='col-12 mt-3'>
    <a href="{{ route('admin.editions.create') }}" class='btn btn-lg btn-primary'> Criar Edição </a>
</div>

<div class="card mt-3">
    <div class="card-body">
        @if(count($editions) > 0 )
        <table class="table table-striped w-100">
            <thead>
                <tr>
                    <th style="width: 30%"> # </th>
                    <th class="text-center"> NOME </th>
                    <th class="text-center"> STATUS </th>
                    <th class="text-center"> OPÇÕES </th>
                </tr>
            </thead>

            <tbody>
                @foreach($editions as $edition)
                <tr>
                    <td style="width: 30%"> {{ $edition->id }}</td>
                    <td class="text-center"> {{ $edition->name }} </td>
                        <div class="btn-group">
                            <a href="{{ route('admin.editions.edit', $edition->id) }}" class="btn btn-primary"> Editar </a>
                            <a href="{{ route('admin.editions.form_result', $edition->id) }}" class="btn btn-success"> Resultados </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else 
            <div class='alert alert-danger'> Nenhuma edição planejada </div>
        @endif
    </div>

    <div class="card-footer">
        {{ $editions->appends(request()->query())->links() }}
    </div>
</div>


@endsection