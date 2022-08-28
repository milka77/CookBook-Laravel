<x-home-master>

  @section('content')
  <div class="container">
      <div class="row justify-content-center">
        <h1 class="text-center">Newsfeed</h1>
        
        <div class="mt-4">
          <div class="row justify-content-center w-75 mx-auto">
            @foreach ($my_news as $news)
            <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
              <div class="card news__card">
                <div class="card-header">
  
                  <h5 class="card-title mb-0">{{ Str::ucfirst($news->title) }}</h5>
                </div>
                <div class="card-body">
                  <p class="card-text news__info">{{ Str::ucfirst($news->body) }}</p>
                  <hr class="mb-0">
                  <div class="d-flex flex-row justify-content-between">
                    <small class="d-flex align-items-end">Created at: {{ $news->created_at }}</small>
                    <small class="d-flex align-items-end">Created by: {{ $news->user->full_name }}</small>
                  </div>
                  
                </div>
              </div>
            </div>
            @endforeach
            
          </div>
        </div>

        <div class="d-flex justify-content-center">
          <a class="btn btn-outline-danger" href="{{ route('home') }}">Back</a>
        </div>
      </div>
  </div>
  @endsection  
  </x-home-master>