@extends('Frontend.layouts.front_end')

@section('content')
<div class="row">
  <div class="card-group carde">
    <div class="card" style="border-radius: 5%">
      <img src="{{ asset('Frontend/img/car one.jpeg') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">toyota supra</h5>
        <p class="text-start">This is a wider card with supporting text below as a natural</p>

        <button type="button" class="btn btn-light">all images</button>
        <div class="d-flex mt-2 button">

            <a t class="btn btn-light me-2"><i class="fa-solid fa-cart-shopping" style="color: #ffd700;"></i></a>
            <a href="" class="btn btn-sm">Buy Now</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
