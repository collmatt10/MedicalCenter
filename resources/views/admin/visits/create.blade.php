@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Add new Book
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
        <form method="POST" action="{{route('admin.visits.store')}}" >
        <input type="hidden" name="_token" value="{{csrf_token()}}">

          <div class="form-group">
            <label for ="doctor">Doctor </label>
            <input type="text" class="form-control" id="doctor" name="doctor" value="{{old('doctor')}}"/>
          </div>
          <div class="form-grodescriptionp">
            <label for ="description">Description </label>
            <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}"/>
          </div>
          <div class="form-group">
            <label for ="ppatienttient">Patient </label>
            <input type="text" class="form-control" id="patient" name="patient" value="{{old('patient')}}"/>
          </div>

          <div class="form-group">
            <label for ="date">Date </label>
            <input type="text" class="form-control" id="date" name="date" value="{{old('date')}}"/>
          </div>

          <div class="form-group">
            <label for ="time">Time </label>
            <input type="text" class="form-control" id="time" name="time" value="{{old('time')}}"/>
          </div>

          <div class="form-group">
            <label for ="cost">Cost </label>
            <input type="text" class="form-control" id="cost" name="cost" value="{{old('cost')}}"/>
          </divcost

          <a href="{{route ('admin.visits.index')}}" class="btn btn-link">Cancel</a>
          <button type="submit" class="btn btn-primary float-right">Submit</button>


        </form>
      </div>

    </div>

  </div>

</div>
</div>

@endsection
