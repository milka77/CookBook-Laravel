<x-home-master>
@section('content')
<div class="container recipe__frame frame">

  <h2 class="text-center mt-2">{{$recipe->name}}</h2>
  <p class="text-center mb-5">{{$recipe->info}}</p>

  <!-- Recipe info and image -->
  <div class="row recipe-info ">
    <div class="col-md-6 col-sm-12 recipe-info__left bg-light">
      <h4 class="mt-2 recipe__heading">Information</h4>
      
      <div class="row">
        <div class="col-12">
          <ul class="">
            <li>Preparation time: <span class="recipe-info__left__list-data">{{$recipe->prep_time}} mins</span></li>
            <li>Cooking time: <span class="recipe-info__left__list-data">{{$recipe->cooking_time}} mins</span></li>
            <li>Servings: <span class="recipe-info__left__list-data">{{$recipe->servings}} plates</span></li>
            <li>Category: <span class="recipe-info__left__list-data">{{$recipe->category->name}}</span></li>
            <li>Difficulty: <span class="recipe-info__left__list-data">{{$recipe->difficulty->name}}</span></li>
          </ul>
        </div>
        
      </div>
    </div>
    <div class="col-md-6  col-sm-12 recipe-info__right">
      @if ($recipe->file_path)
        <img class="img-fluid rounded mx-auto d-block " src="{{$recipe->file_path}}" alt="">        
      @else
        <img class="img-fluid rounded mx-auto d-block" src="https://i.picsum.photos/id/400/300/200.jpg?hmac=7dQ8yzes8nypL9lwIUoEZWNLHd9SgcpCbs8fZ07JT8U" alt="">
      @endif
    </div>
  </div>
  <!-- ./Recipe info and image -->
  
  <div class="row recipe__ingredients-wrap">
    <div class="col-md-6  col-sm-12">
      <div class="ingredients">
        <h4 class="recipe__heading">Ingredients</h3>
        <ul>
          @foreach(explode(',', $recipe->ingredients) as $ingredient)
          <li>
            {{$ingredient}}
          </li>
        @endforeach
        </ul>
      </div>
    </div>
    <div class="col-md-6  col-sm-12 recipe__tools">
      <h4 class="recipe__heading">Tools</h4>
      <ul>
        @foreach(explode(',', $recipe->tools) as $tool)
        <li> {{!empty($tool) ? $tool : 'No special tools required!'}}</li>
      @endforeach
      </ul>
    </div>
  </div>

  <div class="row recipe__instructions">
    <div class="col-md-6  col-sm-12">
      <h4 class="recipe__heading">Cooking Istructions</h4>
      <ol>
        @foreach(explode(',', $recipe->cook_instructions) as $cook_inst)
        <li> {{$cook_inst}}</li>
      @endforeach
      </ol>
    </div>

    <div class="col-md-6  col-sm-12 recipe__preparation">
      <h4 class="recipe__heading">Preparaion Steps</h4>
      <ol>
        @foreach(explode(',', $recipe->prep_instructions) as $preparation)
        <li>
          {{$preparation}}
        </li>
      @endforeach
      </ol>
    </div>
  </div>

  <div class="row recipe__footer">
    
    <div class="col-md-4 col-sm-12">
      <small>Created by: {{$recipe->user->first_name}} {{$recipe->user->last_name}}</small>
    </div>

    <div class="col-md-4 col-sm-12">
      <ul class="recipe__social__list">
        <li><small>0 </small><i class="fa-regular fa-thumbs-up text-secondary recipe__social__icon like"></i></li>
        <li><small>0 </small><i class="fa-regular fa-thumbs-down text-secondary recipe__social__icon dislike"></i></li>
        <li><small>14 </small><i class="fa-regular fa-comment text-secondary recipe__social__icon"></i></li>
        <li><i class="fa-regular fa-heart text-secondary recipe__social__icon fav"></i></li>
      </ul>      
    </div>
    <div class="col-md-4 col-sm-12 recipe__footer__updated">
      <small>Last Updated: {{$recipe->updated_at}}</small>
    </div>
    
  </div>
</div>
@endsection
</x-home-master>