@extends('app')
@section('content')

<div class="container w-25 border p-4">

<form  method="POST" class="" action="{{route('tareas')}}">
@csrf
@if (session('success'))
<h6 class="alert alert-success">{{session('success')}}</h6>
  
@endif
@error('title')

<h6 class="alert alert-danger">{{$message}}</h6>  
@enderror
  <div class="mb-3">
    <label for="title" class="form-label">Titulo de la tareas</label>
    <input type="text" class="form-control" id="" name="title">
    
  </div>
  
 <select name="categoria_id" class="form-select">
  @foreach($categoria as $categori)
  <option value="{{$categori->id}}">{{$categori->nombre}}</option>
  
  @endforeach
  </select>
 <br>
  
  <button type="submit" class="btn btn-primary">crear tarea</button>
</form>



<div>
<br>
@foreach ( $tareas as $tarea )

<div class="row py-1">
  <div class="col-md-9 d-flex align-items-center">
  <a href="{{route('tarea-edit',['id'=>$tarea->id])}}">{{$tarea->title}}</a>
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
</div>
</div>
@endsection