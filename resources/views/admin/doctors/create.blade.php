@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Add new Doctor
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
        <form method="POST" action="{{route('admin.doctors.store')}}" >
        <input type="hidden" name="_token" value="{{csrf_token()}}">

          <div class="form-group">
            <label for ="name">Name </label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name, $user->name')}}"/>
          </div>
          <div class="form-group">
            <label for ="email">Email-Address </label>
            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}"/>
          </div>

          <div class="form-group">
              <label for="password" class="">{{ __('Password') }}</label>


                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

          </div>

          <div class="form-group ">
              <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>


                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>


          <div class="form-group">
            <label for ="postal_address">Postal address </label>
            <input type="text" class="form-control" id="postal_address" name="postal_address" value="{{old('postal_address')}}"/>
          </div>

          <div class="form-group">
            <label for ="phonenumber">Phone Number </label>
            <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{old('phonenumber')}}"/>
          </div>

          <div class="form-group">
            <label for ="start_date">Start Date </label>
            <input type="text" class="form-control" id="start_date" name="start_date" value="{{old('start_date')}}"/>
          </div>

          <a href="{{route ('admin.doctors.index')}}" class="btn btn-link">Cancel</a>
          <button type="submit" class="btn btn-primary float-right">Submit</button>


        </form>
      </div>

    </div>

  </div>

</div>
</div>

@endsection
