<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el titulo de la portada">
    </div>

    @if($welcomes->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Titulo</td>
                    <td>Subtitulo</td>
                    <td colspan="2"></td>
                </tr>
                </thead>
                @foreach($welcomes as $welcome)
                    <tr>
                        <td>{{$welcome->id}}</td>
                        <td>{{$welcome->titulo}}</td>
                        <td>{{$welcome->sudtitulo}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.welcomes.edit', $welcome)}}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.welcomes.destroy', $welcome)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tbody>

                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$welcomes->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningun registro</strong>
        </div>

    @endif
</div>
