@extends('app')
@section('content')

<div class="container w-25 border p-4 my-4">
<div  class="row mx auto">

<form  method="POST" class="" action="{{route('categorias')}}">
@csrf
@if (session('success'))
<h6 class="alert alert-success">{{session('success')}}</h6>
  
@endif
@error('nombre')

<h6 class="alert alert-danger">{{$message}}</h6>  
@enderror
  <div class="mb-3">
    <label for="nombre" class="form-label">nombre de la categoria</label>
    <input type="text" class="form-control" id="" name="nombre">
    
  </div>
  <div class="mb-3">
    <label for="color" class="form-label">color de la categoria</label>
    <input type="color" class="form-control" id="" name="color">
    
  </div>
 
  
  <button type="submit" class="btn btn-primary">crear nueva categoria</button>
  <br>
</form>
<br>
<div >
<br>
 @foreach ($categoria as $categoria)
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a class="d-flex align-items-center gap-2" href="{{ route('categoria_editar', ['id' => $categoria->id]) }}">
                        <span class="color-container" style="background-color: {{ $categoria->color }};height:10px;Width:10px;border-radius:2px"> </span> {{ $categoria->nombre }}
                    </a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{$categoria->id}}">Eliminar</button>
                    
                </div>
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="modal{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar categoría</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Al eliminar la categoría <strong>{{ $categoria->nombre }}</strong> se eliminan todas las tareas asignadas a la misma. 
                        ¿Está seguro que desea eliminar la categoría <strong>{{ $categoria->categoria }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, cancelar</button>
                        <form action="{{ route('categoria_delete', ['id' => $categoria->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-primary">Sí, eliminar categoía</button>
                        </form>
                        
                    </div>
                    </div>
                </div>
            </div>
            
        @endforeach
</div>
</div>
</div>
</div>


@endsection