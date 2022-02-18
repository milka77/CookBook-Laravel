<x-admin-master>

  @section('content')
      <div class="container w-50">
        <h2 class="text-center">Categories</h2>

        <div>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $cat)
                <tr>
                  <td><?= $cat->id;?></td>
                  <td><?= $cat->name;?></td>
                  <td><a class="btn btn-success" href="{{route('cat.edit', $cat->id)}}">Update</a></td>
                  <td>
                    <form action="{{route('cat.destroy', $cat->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input class="btn btn-outline-danger" type="submit" value="Delete">
                    </form>
                  </td>
                </li>
            @endforeach
            </tbody>
          </table>

          <div class="mb-3 d-flex">
            <div class="mx-auto">
              <a href="{{route('cat.create')}}" class="btn btn-success">Add Category</a>
              <a href="{{route('home')}}" class="btn btn-outline-danger">Back</a>
            </div>
          </div>
        </div>

       
      </div>


  @endsection

</x-home-master>