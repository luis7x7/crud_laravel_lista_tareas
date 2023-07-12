@extends('app')
@section('content')

<div class="container w-25 border p-4">

<form  method="POST" class="" action="{{route('categoria_update',['id'=>$tarea->id])}}">
@method('patch')
@csrf
@if (session('success'))
<h6 class="alert alert-success">{{session('success')}}</h6>
  
@endif
@error('title')

<h6 class="alert alert-danger">{{$message}}</h6>  
@enderror
  <div class="mb-3">
    <label for="title" class="form-label">Titulo de la tareas</label>
    <input type="text" class="form-control" id="" name="title" value="{{$tarea->title}}">
    
  </div>
 
  
  <button type="submit" class="btn btn-primary">actualizar tarea</button>
</form>

</div>
@endsection