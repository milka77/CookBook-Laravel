<x-home-master>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        
        <div class="mt-4">
          <div class="row justify-content-center">
            @foreach ($recipies as $recipe)
            <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
              <div class="card recipe-card" >
                {{-- <img src="https://i.picsum.photos/id/400/300/200.jpg?hmac=XggVZVWD6dX5cm-sPm1-MUjPZFsIPdj-2CeB8brj4jQ" class="card-img-top" alt="..."> --}}
                <img src="{{ $recipe->file_path }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $recipe->name }}</h5>
                  <p class="card-text">{{ Str::limit($recipe->info, 100) }}</p>
                  <div class="d-grid">
                    <a href="{{route('recipe.show', $recipe->id)}}" class="btn btn-block btn-light border">Show Recipe</a>
                  </div>
                  <div class="mt-2 mb-0 d-flex">
                    <ul class="recipe__social__list mx-auto">
                      <li><small>0 </small><i class="fa-regular fa-thumbs-up text-secondary recipe__social__icon like"></i></li>
                        <li><small>0 </small><i class="fa-regular fa-thumbs-down text-secondary recipe__social__icon dislike"></i></li>
                        <li><small>14 </small><i class="fa-regular fa-comment text-secondary recipe__social__icon"></i></li>
                        <li><i class="fa-regular fa-heart text-secondary recipe__social__icon fav"></i></li>
                    </ul>      
                  </div>
                </div>
              </div>
                  
            </div>
            @endforeach
  
            
  
            
          
          </div>
        </div>
    </div>
</div>
@endsection

</x-home-master>
