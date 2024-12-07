@extends('Frontend.layouts.front_end')
@section('content')
    <!--login form-->
    <div class="container mt-3">
        <div class="box">

          <div class="card">
            <div class="card-header">
                <h1>welcome to my website {{ Auth::user()->name }}</h1>

            </div>
        </div>
        </div>
      </div>
@endsection
