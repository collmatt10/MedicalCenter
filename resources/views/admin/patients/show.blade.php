@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
            Patient: {{ $patient->name   }}
        </div>
       <div class="card-body">
          <table class="table table-hover">
            <tbody>
              <tr>
                <td>Name</td>
                  <td>{{ $patient->user->name }}</td>
              </tr>
              <tr>
                <td>Email</td>
                  <td>{{ $patient->user->email }}</td>
              </tr>
              <tr>
                <td>Postal Address</td>
                  <td>{{ $patient->user->postal_address }}</td>
              </tr>
              <tr>
                <td>Phone Number</td>
                  <td>{{$patient->user->phonenumber }}</td>
              </tr>
              <tr>
                <td>Start Date</td>
                  <td>{{ $patient->insurance }}</td>
              </tr>
              <tr>
                <td>Policy Number</td>
                  <td>{{ $patient->policyNum }}</td>
              </tr>
            </tbody>

          </table>

          <a href="{{route ('admin.patients.index') }}" class="btn btn-default">Back</a>
          <a href="{{route ('admin.patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
          <form style="display:inline-block" method="POST" action="{{ route ('admin.patients.destroy', $patient->id)   }}">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token()  }}">
            <button type="submit" class="form-control btn btn-danger">Delete</a>
          </form>

       </div>
      </div>
     </div>
    </div>
   </div>
@endsection
