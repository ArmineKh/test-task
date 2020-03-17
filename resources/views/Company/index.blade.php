@extends('layouts.app')
@section('title','Company Index')
@section('content')


  <div class="row">
    <div class="col-sm-12">
      <table class="table">
        <caption>List of companeis</caption>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Logo</th>
          <th>Web site</th>
          <th>Address</th>

        </tr>
        @foreach($companyes as $company)
          <tr class = "text-center">
            <td>{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td> Logo
              <!-- <img src="{{$company->logo}}" alt="Company logo" height="50" width="50"> -->
            </td>
            
            <td>{{ $company->website }}</td>
            <td>{{ $company->adress }}</td>
            <td><a href="{{url('companies.edit', ['id' => $company->id])}}" class = "btn btn-info">Edit</a></td>
            <td><a href="{{url('companies.show',  $company->id)}}" class = "btn btn-info">Show details</a></td>
            <td>
              <form id="destroy-form" action="{{ url('companies.destroy', ['id' => $company->id]) }}" method="POST" >
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