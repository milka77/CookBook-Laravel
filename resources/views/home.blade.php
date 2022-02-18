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
            <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
              <div class="card" >
                <img src="https://i.picsum.photos/id/400/300/200.jpg?hmac=XggVZVWD6dX5cm-sPm1-MUjPZFsIPdj-2CeB8brj4jQ" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$recipe->name}}</h5>
                  <p class="card-text">{{$recipe->info}}</p>
                  <div class="d-grid">
                    <a href="{{route('recipe.show', $recipe->id)}}" class="btn btn-block btn-light border">Show Recipe</a>
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
