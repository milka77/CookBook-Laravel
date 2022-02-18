<x-admin-master>

  @section('content')
      <div class="container w-50">
        <h2 class="text-center">Add New Difficulty</h2>

        <form action="{{ route('difficulty.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name">

          <div>
            @error('name')
              <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        </div>

        <div class="mb-3 d-flex">
          <div class="mx-auto">
            <input class="btn btn-primary" type="submit" value="Add Difficulty">
            <a href="{{route('difficulty.index')}}" class="btn btn-outline-danger">Cancel</a>
          </div>
        </div>
        
        </form>
      </div>


  @endsection

</x-admin-master>