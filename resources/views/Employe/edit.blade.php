@extends('layouts.app')
@section('title','Edit Employe')
@section('content')
  <div class="row">
    <div class="col-sm-8 offset-sm-2">
      <form action="{{route('employes.update', $employe->id)}}" method = "POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name = "name" id = "name" class="form-control" required value = "{{$employe->name}}">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name = "email" id = "email" class="form-control" required value = "{{$employe->email}}">
        </div>
        <div class="form-group">
          <label for="phone">Phone:</label>
          <input type="text" name = "phone" id = "phone" class="form-control" required value = "{{$employe->phone}}">
        </div>
        <div class="form-group">
          <label for="position">Position:</label>
          <select id="position" name="position">
            <option value="{{$employe->position->id}}" selected>{{$employe->position->position_name}}</option>
            @foreach ($company->positions as $key )
            <option value="{{$key->id}}">{{$key->position_name}}</option>
              
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="salary">Salary:</label>
          <input type="text" name = "salary" id = "salary" class="form-control" required value = "{{$employe->salary}}">
        </div>
        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection