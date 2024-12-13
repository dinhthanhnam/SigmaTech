@extends('layouts.app')
@section('content')
  <section class="product-page">
    <div class="container">
      <div aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('home.index') }}">
              <i class="fa fa-home"></i> Trang chủ
            </a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="">Tìm kiếm </a>
          </li>
        </ol>
      </div>
      <div class="product-collection-related-container">
      </div>

      <div class="product-collection-related-container">

        <div class="p-container bg-white">
          <div class="p-list-container d-flex flex-wrap">
            @foreach ($searchresults as $item)
              @include('partials.simple-p-item', ['product' => $item])
            @endforeach
          </div>
        </div>
      </div>
  </section>
@endsection