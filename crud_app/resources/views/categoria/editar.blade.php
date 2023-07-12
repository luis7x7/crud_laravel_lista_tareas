@extends('app')
@section('content')

<div class="container w-25 border p-4 my-4">
<div  class="row mx auto">

<form  method="POST" class="" action="{{route('categoria_update',['id'=>$categoria->id])}}">
@method('patch')
@csrf
@if (session('success'))
<h6 class="alert alert-success">{{session('success')}}</h6>
  
@endif
@error('nombre')

<h6 class="alert alert-danger">{{$message}}</h6>  
@enderror
  <div class="mb-3">
    <label for="nombre" class="form-label">nombre de la categoria</label>
    <input type="text" class="form-control" id="" name="nombre" value="{{$categoria->nombre}}">
    
  </div>
  <div class="mb-3">
    <label for="color" class="form-label">color de la categoria</label>
    <input type="color" class="form-control" id="" name="color" value="{{$categoria->color}}">
    
  </div>
  
  <button type="submit" class="btn btn-primary">actualizar  categoria</button>
  <br>
</form>
<br>
<div >
<br>
@if($categoria->tareas->count()>0)
@foreach($categoria->tareas as $tarea)
<div class="row py-1">
  <div class="col-md-9 d-flex align-items-center">
  <a href="{{route('tarea-update',['id'=>$tarea->id])}}">{{$tarea->title}}</a>
  </div>
    <div class="col-md-3 d-flex justify-content-end">
    <form  method="POST" class="" action="{{route('tarea-delete',['id'=>$tarea->id])}})}}">

    @method('DELETE')
    @csrf
    <button type="submit" class="btn  btn-danger btn-sm">eliminar</button>
    </form>
    </div>
</div>

@endforeach
@else
no se encuentra la tarea
@endif
</div>
</div>
</div>
</div>


@endsection