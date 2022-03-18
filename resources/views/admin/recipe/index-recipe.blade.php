<x-admin-master>

  @section('content')
    
      

      <div class="container">
        <h2 class="text-center">List of all recipies</h2>
        <div class="d-flex">
          <div class="mx-auto">{!! $recipies->links() !!}</div>
        </div>
        <div>
          <table class="table">
            <thead class="thead-light border">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>User</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($recipies as $recipe)
                <tr class="border-bottom">
                  <td>{{$recipe->id}}</td>
                  <td>{{$recipe->name}}</td>
                  <td>{{$recipe->user->full_name}}</td>
                  <td><a class="btn btn-success" href="#">Update</a></td>
                  <td>
                    <form action="#" method="POST">
                      @csrf
                      @method('DELETE')
                      <input class="btn btn-outline-danger" type="submit" value="Delete">
                    </form>
                  </td>
                </tr>
              @endforeach
              
            </tbody>
            
          </table>
          
          <div class="mb-3 d-flex">
            <div class="mx-auto">
              <a href="{{route('recipe.create')}}" class="btn btn-success">Add recipe</a>
              <a href="{{route('admin.index')}}" class="btn btn-outline-danger">Back</a>
            </div>
          </div>
        </div>       
      </div>
      

  @endsection

</x-admin-master>