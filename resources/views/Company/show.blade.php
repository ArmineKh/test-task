@extends('layouts.app')
@section('title','Company Index')
@section('content')

<div class="row">
   <table class="table">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Logo</th>
          <th>Web site</th>
          <th>Address</th>

        </tr>
        <tr class = "text-center">
            <td>{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td> Logo
              <!-- <img src="{{$company->logo}}" alt="Company logo" height="50" width="50"> -->
            </td>
            
            <td>{{ $company->website }}</td>
            <td>{{ $company->adress }}</td>
          </tr>
</div>

  <div class="row">
    <div class="col-sm-12">
      <table class="table">
        <caption>List of Company Employes</caption>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Surname</th>
          <th>Email</th>
          <th>Position</th>
          <th>Phone</th>
          <th>Salary</th>

        </tr> 
        @foreach($employe as $company->employes())
          <tr class = "text-center">
            <td>{{ $employe->id }}</td>
            <td>{{ $employe->name }}</td>
            <td>{{ $employe->surname }}</td>
            <td>{{ $employe->email }}</td>
           
            
            <td>{{ $employe->position()->name }}</td>
            <td>{{ $employe->salary }}</td>
            <td><a href="{{url('company/{$company->id}/edit')}}" class = "btn btn-info">Edit</a></td>
            <td>
              <form id="destroy-form" action="{{ url('company/{$company->id}') }}" method="POST" >
                  @method('DELETE')
                  @csrf
                  <input type="submit" class="btn btn-danger" value="Delete">
              </form>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
    {{$companyes->links()}}
  </div>
@endsection