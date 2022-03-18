<x-admin-master>
  @section('content')
    <div class="container">
      <h1 class="text-center mb-3">Users - Admin Panel</h1>    
            
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</td>
            <th>Name</td>
            <th>Email</td>
            <th>Role</th>
            <th>Registered</td>
            <th>Update</td>
            <th>Delete</td>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->full_name}}</td>
            <td>{{$user->email}}</td>
            <td>
              @foreach ($user->roles as $role )
                  {{$role->name}}
              @endforeach </td>
            <td>{{$user->created_at}}</td>
            <td>UPDATE</td>
            <td>DEL</td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>Id</td>
            <th>Name</td>
            <th>Email</td>
            <th>Role</th>
            <th>Registered</td>
            <th>Update</td>
            <th>Delete</td>
          </tr>
        </tfoot>
      </table>

      <div class="row">
        <div class="col-4">
          Showing ({{$users->firstItem()}} to {{$users->lastItem()}}) of {{$users->total()}} entries

        </div>
        <div class="col-8 pagination">
         
            {{$users->links()}}
         
        </div>
      </div>
    </div>
  @endsection
</x-admin-master>