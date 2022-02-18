<x-admin-master>

  @section('content')
      <div class="container w-50">
        <h2 class="text-center">Edit Category</h2>

        <form action="{{ route('cat.update', $category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                 type="text"
                 name="name"
                 value="{{$category->name}}">

          <div>
            @error('name')
              <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        </div>

        <div class="bm-3 d-flex">
          <div class="mx-auto">
            <input class="btn btn-success" type="submit" value="Update Category">
            <a href="{{route('cat.index')}}" class="btn btn-outline-danger">Cancel</a>
          </div>
        </div>
        
        </form>
      </div>


  @endsection

</x-admin-master>