<x-home-master>
@section('content')
<div class="container w-75 frame">
  
  <h2 class="text-center mt-2">{{$recipe->name}}</h2>
  <p class="text-center mb-5">{{$recipe->info}}</p>

  <!-- Recipe info and image -->
  <div class="row recipe-info ">
    <div class="col-6 recipe-info__left  border rounded bg-light">
      <h4 class="text-center mt-2">Information</h4>
      
      <div class="row">
        <div class="col-8">
          <ul class="">
            <li class="">Preparation time:</li>
            <li class="">Cooking time:</li>
            <li class="">Servings:</li>
            <li class="">Category:</li>
            <li class="">Difficulty:</li>
          </ul>
        </div>
        <div class="col-4">
          <ul>
            <li>{{$recipe->prep_time}} mins</li>
            <li>{{$recipe->cooking_time}} mins</li>
            <li>{{$recipe->servings}} plates</li>
            <li>{{$recipe->category->name}}</li>
            <li>{{$recipe->difficulty->name}}</li>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="col-6">
      <img class="img-fluid rounded mx-auto d-block" src="https://i.picsum.photos/id/568/300/200.jpg?hmac=7dQ8yzes8nypL9lwIUoEZWNLHd9SgcpCbs8fZ07JT8U" alt="">
    </div>
  </div>
  <!-- ./Recipe info and image -->
  
  <hr>

  <div class="row">
    <div class="col-6">
      <div class="ingredients">
        <h4>Ingredients</h3>
        <ul>
          @foreach(explode(',', $recipe->ingredients) as $ingredient)
          <li>
            {{$ingredient}}
          </li>
        @endforeach
        </ul>
      </div>
    </div>
    <div class="col-6">
      <h4>Tools</h4>
      <ul>
        @foreach(explode(',', $recipe->tools) as $tool)
        <li> {{!empty($tool) ? $tool : 'No special tools required!'}}</li>
      @endforeach
      </ul>
    </div>
  </div>

  <hr>

  <div class="row">
    <div class="col-6">
      <h4>Cooking Istructions</h4>
      <ol>
        @foreach(explode(',', $recipe->cook_instructions) as $cook_inst)
        <li> {{$cook_inst}}</li>
      @endforeach
      </ol>
    </div>

    <div class="col-6">
      <h4>Preparaion Steps</h4>
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
    
    <div class="col-4">
      <small>Created by: {{$recipe->user->first_name}} {{$recipe->user->last_name}}</small>
    </div>

    <div class="col-4">
      <ul class="recipe__social__list">
        <li><small>0 </small><i class="fa-regular fa-thumbs-up text-secondary recipe__social__icon like"></i></li>
                        <li><small>0 </small><i class="fa-regular fa-thumbs-down text-secondary recipe__social__icon dislike"></i></li>
                        <li><small>14 </small><i class="fa-regular fa-comment text-secondary recipe__social__icon"></i></li>
                        <li><i class="fa-regular fa-heart text-secondary recipe__social__icon fav"></i></li>
      </ul>      
    </div>
    <div class="col-4 text-end">
      <small>Last Updated: {{$recipe->updated_at}}</small>
    </div>
    
  </div>
</div>
@endsection
</x-home-master>