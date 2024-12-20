@section('content')

<div class="p-container custom-nav owl-carousel owl-theme">
  @foreach ($recommendedItems as $recommendeditem)
    @include('partials.userbased-recommended-p-item', ['recommendeditem' => $recommendeditem])
  @endforeach
</div>
@endsection

@push('scripts')
  <script>
    fetch(`/recommend?user_id={{ Auth::user()->id }}`)
        .then(response => response.json())
        .then(data => {
            console.log(data); // Xử lý dữ liệu recommendations ở đây
        })
        .catch(error => console.error(error));
  </script>
@endpush