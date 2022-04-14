<x-admin-master>
  @section('content')
  <div class="container">
    <h2 class="text-center my-4">List of {{ auth()->user()->first_name }}'s recipies - Admin Panel</h2>

    @if(auth()->user()->userHasRole('admin'))
    <div class="container">
      <h2 class="text-center mb-4">List of all recipies</h2>
      <div class="d-flex">
        <div class="mx-auto">{!! $recipies->links() !!}</div>
      </div>
      <div class="mb-3">
        <table class="table table-sm table-hover mx-auto">
          <thead class="">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th class="text-center">Category</th>
              <th class="text-center">User</th>
              <th class="text-center">Created at</th>
              <th class="text-center">Controls</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($recipies as $recipe)
              <tr class="border-bottom">
                <td>{{ $recipe->id }}</td>
                <td>{{ $recipe->name }}</td>
                <td class="text-center">{{ $recipe->category->name }}</td>
                <td class="text-center">{{ $recipe->user->full_name }}</td>
                <td class="text-center">{{ $recipe->created_at }}</td>
                <td class="w-25 text-center">
                  <div class="d-flex justify-content-center gap-1">
                    <a class="btn btn-primary" href="{{ route('recipe.show', $recipe->id) }}">Show</a>
                    <a class="btn btn-success" href="#">Update</a>
                    <form action="#" method="POST">
                      @csrf
                      @method('DELETE')
                      <input class="btn btn-outline-danger" type="submit" value="Delete">
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
            
          </tbody>
          
        </table>
      </div>       
        
      <div class="mb-3 d-flex">
        <div class="mx-auto">
          <a href="{{ route('recipe.create') }}" class="btn btn-success">Add recipe</a>
          <a href="{{ route('admin.index') }}" class="btn btn-outline-danger">Back</a>
        </div>
      </div>
    </div>
    @else
    <div>
      @if(!empty($myrecipies))
        <table class="table table-sm">
          <thead class="thead-light border">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($myrecipies as $recipe)
              <tr class="border-bottom">
                <td>{{ $recipe->id }}</td>
                <td>{{ $recipe->name }}</td>
                <td><a class="btn btn-success" href="#">Update</a></td>
                <td>
                  <form action="{{ route('recipe.destroy', $recipe->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-outline-danger" type="submit" value="Delete">
                  </form>
                </td>
              </tr>
            @endforeach
            
          </tbody>
        </table>
      @else
        <h3 class="text-center mb-4">No records found for user ({{ auth()->user()->first_name }}) in our database.</h3>
      @endif
      
      <div class="mb-3 d-flex">
        <div class="mx-auto">
          <a href="{{ route('recipe.create') }}" class="btn btn-success">Add recipe</a>
          <a href="{{ route('admin.index') }}" class="btn btn-outline-danger">Back</a>
        </div>
      </div>
    </div>
    @endif

  </div>
  @endsection
</x-admin-master>