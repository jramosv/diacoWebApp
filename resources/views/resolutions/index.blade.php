@extends('layouts.app')

@section('body-class', 'profile-page')
@section('content')

<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Resoluciones</h2>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Fecha</th>
                    <th>Documento</th>
                    <th>Sucursal</th>
                    <th width="280px">Acciones</th>
                </tr>
                @foreach ($resolutions as $resolution)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $resolution->date }}</td>
                    <td>{{ $resolution->complain->document }}</td>
                    <td>{{ $resolution->complain->branch->name }}</td>
                    <td>
                        <form action="{{ route('resolutions.destroy',$resolution->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('resolutions.show',$resolution->complain_id) }}">Detalle</a>

                            <a class="btn btn-primary" href="{{ route('resolutions.edit',$resolution->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                  
                </tr>
                @endforeach
            </table>

            {!! $resolutions->links() !!}
        </div>
        @endsection

    </div>

</div>
</div>