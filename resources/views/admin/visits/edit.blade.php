@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
        Edit Appointment
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
        <form method="POST" action="{{route('admin.visits.update', $visit->id)}}" >
        <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{csrf_token()}}">


          <div class="form-group">
            <label for ="doctor">Doctor </label>
            <select name="user_id">
             @foreach ($doctors as $doctor)
              <option value = "{{ $doctor->id }}" {{ (old('doctor_id') == $doctor->id) ? "selected " : "" }} >
                {{ $doctor->user->name   }}
              </option>
            @endforeach
            </select>

          <div class="form-group">
            <label for ="author">Description </label>
            <input type="text" class="form-control" id="author" name="author" value="{{old('author', $visit->author)}}"/>
          </div>

          <div class="form-group">
            <label for ="patient">Patient </label>
            <select name="user_id">
             @foreach ($patients as $patient)
              <option value = "{{ $patient->id }}" {{ (old('patient_id') == $patient->id) ? "selected " : "" }} >
                {{ $patient->user->name   }}
              </option>
            @endforeach
            </select>

          <div class="form-group"cost
            <label for ="time">Time </labeltime
            <input type="text" class="form-control" id="time" name="time" value="{{old('time', $visit->time)}}"/>
          </div>

          <div class="form-group"cost
            <label for ="isbn">Date </label>
            <input type="text" class="form-control" id="cost" name="cost" value="{{old('cost', $visit->cost)}}"/>
          </div>

          <div class="form-group">
            <label for ="cost">Cost </label>
            <input type="text" class="form-control" id="cost" name="cost" value="{{old('cost', $visit->cost)}}"/>
          </div>

          <a href="{{route ('admin.visits.index')}}" class="btn btn-link">Cancel</a>
          <button type="submit" class="btn btn-primary float-right">Submit</button>


        </form>
      </div>

    </div>

  </div>

</div>
</div>

@endsection
