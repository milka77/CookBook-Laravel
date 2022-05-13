<x-home-master>

  @section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 text-center">
        
        <h2 class="my-4">Welcome {{ auth()->user() ? auth()->user()->first_name . ',' : '' }} To My CookBook.</h2>

        <p class="w-75 mx-auto mb-4">
          I created this online cookbook for all the food enthusiasts to search and share with others the tastiest
          recipes you know. Feel free to discover all our recipes. You can search for our existing recipes, update,
          delete them (please use the delete function with common sense! :) ) and of course, you can add new recipes to
          our collection.
        </p>

      </div>

      <div class="mt-4">
        <div class="row justify-content-center">
          @foreach ($recipiesSample as $recipe)
          <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
            <div class="card recipe__card">
              @if(str_contains($recipe->file_path, '.jpg') || str_contains($recipe->file_path, '.png'))
              <img class="card-img-top recipe__image" src="{{$recipe->file_path}}" alt="">
              @else
              <img class="card-img-top recipe__image" src="{{ asset('storage/images/site-images/placeholder-image.jpg') }}" alt="">
              @endif
              {{-- <img
                src="https://i.picsum.photos/id/400/300/200.jpg?hmac=XggVZVWD6dX5cm-sPm1-MUjPZFsIPdj-2CeB8brj4jQ"
                class="card-img-top" alt="..."> --}}
              <div class="card-body">
                <h5 class="card-title">{{ $recipe->name }}</h5>
                <p class="card-text recipe__info">{{ Str::limit($recipe->info, 100,'...') }}</p>
                <div class="d-grid">
                  <a href="{{route('recipe.show', $recipe->id)}}" class="btn btn-block btn-outline-dark border">Show
                    Recipe</a>
                </div>
                <div class="mt-2 mb-0 d-flex">
                  <ul class="recipe__social__list mx-auto">
                    <li><small>0 </small><i
                        class="fa-regular fa-thumbs-up text-secondary recipe__social__icon like"></i></li>
                    <li><small>0 </small><i
                        class="fa-regular fa-thumbs-down text-secondary recipe__social__icon dislike"></i></li>
                    <li><small>14 </small><i class="fa-regular fa-comment text-secondary recipe__social__icon"></i></li>
                    <li><i class="fa-regular fa-heart text-secondary recipe__social__icon fav"></i></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          @endforeach

          <div class="text-center mt-4">
            <span>Currently we have <strong>{{ $recipies->total() }} recipies</strong> in our collection.</span>
          </div>
          {{-- ALL RECIPIES LINK --}}
          <div class="d-flex justify-content-center mt-3">
            <a class="btn btn-dark" href="{{ route('recipe.index') }}">Check out all of our recipies</a>
          </div>
          {{-- ./ ALL RECIPIES LINK --}}

        </div>
      </div>
    </div>
  </div>
  @endsection

</x-home-master>