@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
        Edit Patient
        </div>
        <div class="card-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{route('admin.patients.update', $patient->id)}}" >
        <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <label for ="name">Name </label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name', $patient->user->name)}}"/>
          </div>

          <div class="form-group">
            <label for ="email">Email-Address </label>
            <input type="text" class="form-control" id="email" name="email" value="{{old('email', $patient->user->email)}}"/>
          </div>
          <div class="form-group">
            <label for ="password">Password </label>
            <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}"/>
          </div>
          <div class="form-group">
            <label for ="postal_address">Postal address </label>
            <input type="text" class="form-control" id="postal_address" name="postal_address" value="{{old('postal_address', $patient->user->postal_address)}}"/>
          </div>

          <div class="form-group">
            <label for ="phonenumber">Phone Number </label>
            <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{old('phonenumber', $patient->user->phonenumber)}}"/>
          </div>

          <div class="form-group">
            <label for ="insurance">Insurance Company </label>
            <input type="text" class="form-control" id="insurance" name="insurance" value="{{old('insurance',$patient->insurance)}}"/>
          </div>

          <div class="form-group">
            <label for ="policyNum">Policy Number </label>
            <input type="text" class="form-control" id="policyNum" name="policyNum" value="{{old('policyNum',$patient->policyNum)}}"/>
          </div>

          <a href="{{route ('admin.patients.index')}}" class="btn btn-link">Cancel</a>
          <button type="submit" class="btn btn-primary float-right">Submit</button>


        </form>
      </div>

    </div>

  </div>

</div>
</div>

@endsection
