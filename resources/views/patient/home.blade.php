

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                      Welcome Patient!
                     {{ Auth::user()->name    }}
                      </br>
                      Email:    {{ Auth::user()->email   }}

                      </br>

                    Welcome please book your appointment <a href="{{route('user.visits.index')}}">here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
