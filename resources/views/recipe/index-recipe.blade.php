<x-home-master>

  @section('content')
  <div class="container">
      <div class="row justify-content-center">
          <h1 class="text-center">Recipies</h1>
          
          <div class="mt-4">
            <div class="row justify-content-center">
              @foreach ($recipies as $recipe)
              <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                <div class="card recipe__card" >
                  @if(str_contains($recipe->file_path, '.jpg') || str_contains($recipe->file_path, '.png'))
                    <img class="card-img-top recipe__image" src="{{ $recipe->file_path }}" alt="">        
                  @else
                    <img class="card-img-top recipe__image" src="{{ asset('storage/images/site-images/placeholder-image.jpg') }}" alt="">
                  @endif
                  <div class="card-body">
                    <h5 class="card-title">{{ $recipe->name }}</h5>
                    <p class="card-text recipe__info">{{ Str::limit($recipe->info, 100,'...') }}</p>
                    <div class="d-grid">
                      <a href="{{route('recipe.show', $recipe->id)}}" class="btn btn-block btn-outline-dark border">Show Recipe</a>
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

              {{-- Pagination links --}}
              <div class="row">
                <div class="col-5">
                  Showing ({{ $recipies->firstItem() }} to {{ $recipies->lastItem() }}) of {{ $recipies->total() }} entries
                </div>

                <div class="col-7 d-flex justify-content-start">
                  {{ $recipies->links() }}
                </div>
              </div>
              {{-- End of Pagination links --}}
            </div>
          </div>
      </div>
  </div>
  @endsection  
  </x-home-master>