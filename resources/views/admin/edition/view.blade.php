@extends('layouts.app')

@section('content')

<div class='col-12 mt-3'>
    <a href="{{ route('admin.editions.create') }}" class='btn btn-lg btn-primary'> Listar Edição </a>
    <a href="{{ route('admin.editions.update', $edition->id) }}" class='btn btn-lg btn-warning'> Editar Edição </a>
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