@extends('layouts.app')
@section('title','Employe Create')
@section('content')
 <div class="row mt-5">
   <div class="col-sm-8 offset-sm-2">
     <form action="{{route('employes.store')}}" method = "post" enctype="multipart/form-data">
       @csrf
       <div class="form-group">
         <label for="name">Nname:</label>
         <input type="text" name = "name" id = "name" class="form-control" required>
       </div>
       <div class="form-group">
         <label for="email">Email:</label>
         <input type="email" name = "email" id = "email" class="form-control" required>
       </div>
       <div class="form-group">
         <label for="phone">Phone:</label>
         <input type="phone" name = "phone" id = "phone" class="form-control" required>
       </div>
       <div class="form-group">
         <label for="salary">Salary:</label>
         <input type="text" name = "salary" id = "salary" class="form-control" required>
       </div>
         <input type="hidden" name = "company_id" id = "company_id" class="form-control" value="{{$company_id}}" required>
         <input type="hidden" name = "position_id" id = "position_id" class="form-control" value="1" required>


       <button type = "submit" class = "btn btn-success">Submit</button>
     </form>
   </div>
 </div>
@endsection