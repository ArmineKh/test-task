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
            <td> 
              @if ($company->logo)
                <img src="{{url('/storage/'.$company->logo)}}" alt="Company logo" height="50" width="50">
                @else
                <img src="{{url('/storage/logo1.png')}}" alt="Default logo" height="50" width="50">
               @endif
            <td>{{ $company->website }}</td>
            <td>{{ $company->adress }}</td>
            <td><a href="{{route('companies.show',  $company->id)}}" class = "btn btn-info">Show details</a></td>
            <td><a href="{{route('add.comment',  $company->id)}}" class = "btn btn-info">Add coments</a></td>
          </tr>
        @endforeach
      </table>
    </div>
    {{$companyes->links()}}
  </div>
@endsection