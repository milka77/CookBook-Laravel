<x-admin-master>
  @section('content')
  <div class="container">
    <h1 class="text-center">Edit recipe</h1>
    <h4 class="text-center">{{ $recipe->name }}</h4>
    <h6 class="text-center">Recipe author: {{ $recipe->user->full_name }}</h6>

    <div class="col-8 mx-auto">
      <form action="{{ route('recipe.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <!-- Name input field -->
        <div class="mb-2">
          <label class="form-label" for="name">Recipe name: <i class="fa-light fa-asterisk text-danger"></i></label>
          <input class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name"
            value="{{ $recipe->name }}">

          <!-- Displaying the error if exists -->
          <div>
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <!-- ./Displaying the error if exists -->
        </div>
        <!-- ./Name input field -->

        <!-- Short info field -->
        <div class="mb-2">
          <label class="form-label" for="info">Short information about the recipe: <i
              class="fa-light fa-asterisk text-danger"></i></label>
          <input class="form-control {{$errors->has('info') ? 'is-invalid' : ''}}" type="text" name="info"
            value="{{ $recipe->info }}">

          <!-- Displaying the error if exists -->
          <div>
            @error('info')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <!-- ./Displaying the error if exists -->
        </div>
        <!-- ./Short info field -->
        <hr>

        <div class="row">
          <!-- Preparation time field -->
          <div class="col-sm-12 col-md-4">
            <div class="mb-2">
              <label class="form-label" for="prep_time">Preparation Time <small>(mins)</small>: <i
                  class="fa-light fa-asterisk text-danger"></i></label>
              <input class="form-control {{$errors->has('prep_time') ? 'is-invalid' : ''}}" type="number"
                name="prep_time" value="{{ $recipe->prep_time }}">

              <!-- Displaying the error if exists -->
              <div>
                @error('prep_time')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <!-- ./Displaying the error if exists -->
            </div>
          </div>
          <!-- ./Preparation time field -->

          <!-- Cooking time field -->
          <div class="col-sm-12 col-md-4">
            <div class="mb-2">
              <label class="form-label" for="cooking_time">Cooking Time: <small>(mins)</small>: <i
                  class="fa-light fa-asterisk text-danger"></i></label>
              <input class="form-control {{$errors->has('cooking_time') ? 'is-invalid' : ''}}" type="number"
                name="cooking_time" value="{{ $recipe->cooking_time }}">

              <!-- Displaying the error if exists -->
              <div>
                @error('cooking_time')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <!-- ./Displaying the error if exists -->
            </div>
          </div>
          <!-- ./Cooking time field -->

          <!-- Servings Size field -->
          <div class="col-sm-12 col-md-4">
            <div class="mb-2">
              <label class="form-label" for="servings">Serving size: <i
                  class="fa-light fa-asterisk text-danger"></i></label>
              <input class="form-control {{$errors->has('servings') ? 'is-invalid' : ''}}" type="number" name="servings"
                value="{{ $recipe->servings }}">

              <!-- Displaying the error if exists -->
              <div>
                @error('servings')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <!-- ./Displaying the error if exists -->
            </div>
          </div>
          <!-- ./Servings Size field -->
        </div>

        <div class="row">
          <!-- Category selector field -->
          <div class="col-sm-12 col-md-6">
            <div class="mb-2">
              <label class="form-label" for="category">Dietary category: <i
                  class="fa-light fa-asterisk text-danger"></i></label>
              <select class="form-select {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category">
                <option disabled selected>Choose a category</option>
                @foreach ($categories as $category )
                <option value="{{ $category->id }}" {{ $recipe->category->id === $category->id ? 'selected' : '' }}>{{
                  $category->name }}</option>
                @endforeach
              </select>


              <!-- Displaying the error if exists -->
              <div>
                @error('category')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <!-- ./Displaying the error if exists -->
            </div>
          </div>
          <!-- ./Category selector field -->

          <!-- Difficulty selector field -->
          <div class="col-sm-12 col-md-6">
            <div class="mb-2">
              <label class="form-label" for="difficulty">Recipe Difficulty: <i
                  class="fa-light fa-asterisk text-danger"></i></label>
              <select class="form-select {{$errors->has('difficulty') ? 'is-invalid' : ''}}" name="difficulty">
                <option disabled selected>Choose difficulty</option>
                @foreach ($difficulties as $difficulty)
                <option value="{{ $difficulty->id }}" {{ $recipe->difficulty->id === $difficulty->id ? 'selected' : ''
                  }}>{{ $difficulty->name }}</option>
                @endforeach
              </select>

              <!-- Displaying the error if exists -->
              <div>
                @error('difficulty')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <!-- ./Displaying the error if exists -->
            </div>
          </div>
          <!-- ./Difficulty selector field -->
        </div>

        <hr>

        <!-- Ingredients text field -->
        <div class="mb-2">
          <label class="form-label" for="ingredients">Ingredients: <small>(Please seperate the ingredients with a coma
              ",")</small> <i class="fa-light fa-asterisk text-danger"></i></label>
          <textarea class="form-control {{$errors->has('ingredients') ? 'is-invalid' : ''}}" name="ingredients" rows="3"
            placeholder="Enter your ingredients. 
  For example: 1 lemon, 2 tsp sugar, 3 eggs">{{ $recipe->ingredients }}</textarea>

          <!-- Displaying the error if exists -->
          <div>
            @error('ingredients')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <!-- ./Displaying the error if exists -->
        </div>
        <!-- ./Ingredients text field -->

        <!-- Preparation text field -->
        <div class="mb-2">
          <label class="form-label" for="preparations">Preparation Instructions <small><strong>(Please seperate the
                preparation steps with a coma ","</strong> optional):</small></label>
          <textarea class="form-control" name="preparations" rows="3"
            placeholder="Enter preparation instructions">{{ $recipe->prep_instructions }}</textarea>

          <!-- Displaying the error if exists -->
          <div>
            @error('preparations')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <!-- ./Displaying the error if exists -->
        </div>
        <!-- ./Preparation text field -->

        <!-- Cooking instructions field -->
        <div class="mb-2">
          <label class="form-label" for="cook_instructions">Cooking Instructions: <small><strong>(Please seperate the
                cooking instructions steps with a coma ","):</strong></small> <i
              class="fa-light fa-asterisk text-danger"></i></label>
          <textarea class="form-control {{$errors->has('cook_instructions') ? 'is-invalid' : ''}}"
            name="cook_instructions" rows="3"
            placeholder="Enter cooking instructions">{{ $recipe->cook_instructions }}</textarea>

          <!-- Displaying the error if exists -->
          <div>
            @error('cook_instructions')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <!-- ./Displaying the error if exists -->
        </div>
        <!-- ./Cooking instructions field -->

        <!-- Required tools field -->
        <div class="mb-2">
          <label class="form-label" for="tools">Required tools <small><strong>(Please seperate the tools with a coma
                ","</strong> optional):</small></label>
          <textarea class="form-control {{$errors->has('tools') ? 'is-invalid' : ''}}" name="tools" rows="3"
            placeholder="Enter tools required for the recipe">{{ $recipe->tools }}</textarea>

          <!-- Displaying the error if exists -->
          <div>
            @error('tools')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <!-- ./Displaying the error if exists -->
        </div>
        <!-- ./Required tools field -->

        <hr>
        <!-- Image field -->
        <div class="mb-2">
          <div class="row">
            <p>Current image:</p>
            <div class="col-sm-12 col-md-6">
              <img class="img-fluid" src="{{ $recipe->file_path }}" alt="{{ $recipe->file_path }}">
            </div>
            <div class="col-sm-12 col-md-6 form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" name="img_remove"> Remove the current image
            </div>
          </div>
          
          
        </div>
        <div class="mb-4">
          <label class="form-label" for="file_path">You can upload a picture for your recipe
            <small>(optional)</small>:</label>
          <input class="form-control" type="file" name="file_path">
        </div>
        <!-- ./Image field -->

        <!-- Submit and cancel buttons -->
        <div class="d-flex mb-4">
          <div class="mx-auto">
            <a href="{{ route('admin.allrecipies') }}" class="btn btn-outline-danger mr-2">Cancel</a>
            <button class="btn btn-success" type="submit" name="submit">Update</button>
          </div>
        </div>
        <!-- ./Submit and cancel buttons -->
      </form>
    </div>
  </div>
  @endsection
</x-admin-master>