@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Upcoming Appointment
 <a href="{{  route('doctor.visits.create') }}" class=" float-right btn btn-primary" >Add</a>
        </div>
       <div class="card-body">
         @if (count($visits) === 0)
         <p>There are no Appointments ! </p>
         @else
          <table id="table-visits" class="table table-hover">
            <thead>
              <th>Doctor</th>
              <th>Description</th>
              <th>Patient</th>
              <th>Time</th>
              <th>Date</th>
              <th>Cost</th>

            </thead>
            <tbody>
              @foreach ($visits as $visit)

              <tr data=id="{{$visit->id}}">
              <td>{{  $visit->Doctor->user->name  }}</td>
              <td>{{  $visit->description }}</td>
              <td>{{  $visit->Patient->user->name  }}</td>
              <td>{{  $visit->time  }}</td>
              <td>{{  $visit->date  }}</td>
              <td>{{  $visit->cost  }}</td>
              <td>
  <a href="{{route ('doctor.visits.show', $visit->id) }}" class="btn btn-primary">View</a>
  <a href="{{route ('doctor.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>

                </form>
            </tr>
              @endforeach
            </tbody>
          </table>
          @endif
       </div>
      </div>
     </div>
    </div>
   </div>
@endsection
