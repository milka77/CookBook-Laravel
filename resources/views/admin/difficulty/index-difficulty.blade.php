<x-admin-master>

  @section('content')
      <div class="container w-50">
        <h2 class="text-center">Difficulties</h2>

        <div>
          <table class="table">
            <thead class="thead-light border">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($difficulties as $difficulty)
                <tr class="border-bottom">
                  <td><?= $difficulty->id;?></td>
                  <td><?= $difficulty->name;?></td>
                  <td><a class="btn btn-success" href="{{route('difficulty.edit', $difficulty->id)}}">Update</a></td>
                  <td>
                    <form action="{{route('difficulty.destroy', $difficulty->id)}}" method="POST">
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
              <a href="{{route('difficulty.create')}}" class="btn btn-success">Add Difficulty</a>
              <a href="{{route('admin.index')}}" class="btn btn-outline-danger">Back</a>
            </div>
          </div>
        </div>       
      </div>


  @endsection

</x-home-master>