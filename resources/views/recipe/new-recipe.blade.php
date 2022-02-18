<x-home-master>

@section('content')

<div class="container">
  <h1 class="text-center">Add New recipe</h1>

  <div class="col-8 mx-auto">
    <form action="{{ route('recipe.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
     
      <!-- Name input field -->
      <div class="mb-2">
        <label class="form-label" for="name">Recipe name: <i class="fa-light fa-asterisk text-danger"></i></label>
        <input class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name">
        
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
        <label class="form-label" for="info">Short information about the recipe: <i class="fa-light fa-asterisk text-danger"></i></label>
        <input class="form-control {{$errors->has('info') ? 'is-invalid' : ''}}" type="text" name="info" >

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
            <label class="form-label" for="prep_time">Preparation Time <small>(mins)</small>: <i class="fa-light fa-asterisk text-danger"></i></label>
            <input class="form-control {{$errors->has('prep_time') ? 'is-invalid' : ''}}" type="number" name="prep_time" >

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
            <label class="form-label" for="cooking_time">Cooking Time: <small>(mins)</small>: <i class="fa-light fa-asterisk text-danger"></i></label>
            <input class="form-control {{$errors->has('cooking_time') ? 'is-invalid' : ''}}" type="number" name="cooking_time" >

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
            <label class="form-label" for="servings">Serving size: <i class="fa-light fa-asterisk text-danger"></i></label>
            <input class="form-control {{$errors->has('servings') ? 'is-invalid' : ''}}" type="number" name="servings" >

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
            <label class="form-label" for="category">Dietary category: <i class="fa-light fa-asterisk text-danger"></i></label>
            <select class="form-select {{$errors->has('category') ? 'is-invalid' : ''}}"  name="category" >
              <option disabled selected>Choose a category</option>
              @foreach ($categories as $category )
              <option value="<?php echo $category->id; ?>" ><?php echo $category->name; ?></option>  
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
            <label class="form-label" for="difficulty">Recipe Difficulty: <i class="fa-light fa-asterisk text-danger"></i></label>
            <select class="form-select {{$errors->has('difficulty') ? 'is-invalid' : ''}}"  name="difficulty" >
              <option disabled selected>Choose difficulty</option>
              @foreach ($difficulties as $difficulty)
                <option value="<?php echo $difficulty->id; ?>" ><?php echo $difficulty->name; ?></option>
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
        <label class="form-label" for="ingredients">Ingredients: <small>(Please seperate the ingredients with a coma ",")</small> <i class="fa-light fa-asterisk text-danger"></i></label>
        <textarea class="form-control {{$errors->has('ingredients') ? 'is-invalid' : ''}}" name="ingredients" rows="3" placeholder="Enter your ingredients. 
For example: 1 lemon, 2 tsp sugar, 3 eggs"></textarea>

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
        <label class="form-label" for="preparations">Preparation Instructions <small><strong>(Please seperate the preparation steps with a coma ","</strong> optional):</small></label>
        <textarea class="form-control" name="preparations" rows="3" placeholder="Enter preparation instructions"></textarea>

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
        <label class="form-label" for="cook_instructions">Cooking Instructions: <small><strong>(Please seperate the cooking instructions steps with a coma ","):</strong></small> <i class="fa-light fa-asterisk text-danger"></i></label>
        <textarea class="form-control {{$errors->has('cook_instructions') ? 'is-invalid' : ''}}" name="cook_instructions" rows="3" placeholder="Enter cooking instructions"></textarea>

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
        <label class="form-label" for="tools">Required tools <small><strong>(Please seperate the tools with a coma ","</strong> optional):</small></label>
        <textarea class="form-control {{$errors->has('tools') ? 'is-invalid' : ''}}" name="tools" rows="3" placeholder="Enter tools required for the recipe"></textarea>

        <!-- Displaying the error if exists -->  
        <div>
          @error('tools')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <!-- ./Displaying the error if exists -->
      </div>
      <!-- ./Required tools field -->

      <!-- Image field -->
      <div class="mb-2">
        <label class="form-label" for="file_path">You can upload a picture for your recipe <small>(optional)</small>:</label>
        <input class="form-control" type="file" name="file_path">
      </div>
      <!-- ./Image field -->
  
      <!-- Submit and cancel buttons -->
      <div class="d-flex">
        <div class="mx-auto">
          <a href="#" class="btn btn-outline-danger mr-2">Cancel</a>
          <button class="btn btn-success" type="submit" name="submit">Sumbit</button>
        </div>
      </div>
      <!-- ./Submit and cancel buttons -->
    </form>
  </div>
</div>

@endsection

</x-home-master>