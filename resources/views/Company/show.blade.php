@extends('layouts.app')
@section('title','Company Show')
@section('content')
<div class="container">
<div class="row">
   <table class="table">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Logo</th>
          <th>Web site</th>
          <th>Address</th>
          <th>Edit Company</th>
          <th>Delete Company</th>
        </tr>
        <tr class = "text-center">
            <td>{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td>
              @if ($company->logo)
                <img src="{{url('/storage/${$company->logo}')}}" alt="Company logo" height="50" width="50">
                @else
                <img src="{{url('/storage/logo1.png')}}" alt="Default logo" height="50" width="50">
               @endif
            </td>
            
            <td>{{ $company->website }}</td>
            <td>{{ $company->adress }}</td>
            <td><a href="{{route('companies.edit', $company->id)}}" class = "btn btn-info">Edit</a></td>
            <td>
              <form id="destroy-form" action="{{ route('companies.destroy', $company->id)}}" method="POST" >
                  @method('DELETE')
                  @csrf
                  <input type="submit" class="btn btn-danger" value="Delete">
              </form>
            </td>
          </tr>
</div>

<div class="row">
  <a href="{{route('employe.create.company_id', $company->id)}}" class = "btn btn-info">Create Employe</a>
</div>

<div class="container">
  @foreach($companyComments as $comment)
<div class="row comment">
  <p>{{$comment-body}}</p>
</div>
@endforeach
</div>

  <div class="row">
    <div class="col-sm-12">
      <table class="table">
        <caption>List of Company Employes</caption>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Position</th>
          <th>Phone</th>
          <th>Salary</th>

        </tr> 
        @foreach($companyEmployes as $employe)
          <tr class = "text-center">
            <td>{{ $employe->id }}</td>
            <td>{{ $employe->name }}</td>
            <td>{{ $employe->email }}</td>
            <td>{{$companyPositions->where('id', $employe->position_id)}}</td>
            <td>{{ $employe->phone }}</td>
            <td>{{ $employe->salary }}</td>
            <td><a href="{{route('employes.edit', $employe->id)}}" class = "btn btn-info">Edit</a></td>
            <td>
              <form id="destroy-form" action="{{ route('employes.destroy', $employe->id)}}" method="POST" >
                  @method('DELETE')
                  @csrf
                  <input type="submit" class="btn btn-danger" value="Delete">
              </form>
            </td>
          </tr>
        @endforeach
      </table>
</div>
</div>
  

</div>


@endsection


