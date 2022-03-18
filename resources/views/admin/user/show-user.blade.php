<x-admin-master>
  @section('content')
    <div class="container">
      <h1 class="text-center">User Profile</h1>
     
      <div class="row">
        <div class="col-sm-12 col-md-5">
          <h4 class="text-center">Profile of {{$user->full_name}}</h4>
          <table class="table table-sm table-borderless">
            <tr>
              <th scope="row">ID</th>
              <td class="text-right">{{$user->id}}</td>
            </tr>
            <tr>
              <th scope="row">First Name</th>
              <td class="text-right">{{$user->first_name}}</td>
            </tr>
            <tr>
              <th scope="row">Last Name</th>
              <td class="text-right">{{$user->last_name}}</td>
            </tr>
            <tr>
              <th scope="row">Email</th>
              <td class="text-right">{{$user->email}}</td>
            </tr>            
            <tr>
              <th scope="row">Role</th>
              <td class="text-right">
                @foreach ($user->roles as $role)
                  
                    {{$role->name}}, 
                 
                @endforeach
              </td>
            </tr>            
            <tr>
              <th scope="row">Registered</th>
              <td class="text-right">{{$user->created_at}}</td>
            </tr><tr>
              <th scope="row">Last Updated</th>
              <td class="text-right">{{$user->updated_at}}</td>
            </tr>
            
             
            
          </table>
        </div>
        <div class="col-sm-12 col-md-2"></div>
        <div class="col-sm-12 col-md-5">
          <h4 class="text-center">Update User Profile</h4>

          <form action="" method="POST">
            <div class="mb-3">
              <label class="form-label" for="first_name">First Name</label>
            <input class="form-control form-control-sm" type="text" name="first_name" value={{$user->first_name}}>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email address</label>
              <input type="email" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
          </form>
        </div>
      </div>
      <hr>

      @if(auth()->user()->userHasRole('Admin'))
        <div class="row mt-3">
          <div class="col-sm-12">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">Manage Roles</h6>
              </div>
      
              <div class="card-body">
                <div class="table-responsive">
                  @if (!empty($roles))
                  <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                      <tr>
                        <th>Options</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Attach</th>
                        <th>Detach</th>
                      </tr>
                    </thead>
      
                    <tfoot class="text-center">
                      <tr>
                        <th>Options</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Attach</th>
                        <th>Detach</th>
                      </tr>
                    </tfoot>
      
                    <tbody>
                      @foreach ($roles as $role)
                        <tr class="text-center">
                          <td><input type="checkbox"
                                    name=""
                                    @foreach ($user->roles as $user_role)
                                        @if($user_role->slug == $role->slug)
                                            checked
                                        @endif
                                    @endforeach
                          ></td>
                          <td>{{$role->id}}</td>
                          <td>{{$role->name}}</td>
                          <td>{{$role->slug}}</td>
                          <td>
                            {{-- Attaching a role for the user --}}
                            <form action="{{route('user.role.attach', $user)}}" method="POST">
                              @csrf
                              @method('PUT')
                              <input type="hidden" name="role" value="{{$role->id}}">
                              <button type="submit"
                                      class="btn btn-success"
                                      @if($user->roles->contains($role))
                                        disabled
                                      @endif
                                      >Attach
                              </button>
                            </form>
                          </td>

                          <td>
                            {{-- Detaching a role for the user --}}
                            <form action="{{route('user.role.detach', $user)}}" method="POST">
                              @csrf
                              @method('PUT')
                              <input type="hidden" name="role" value="{{$role->id}}">
                              <button type="submit"
                                      class="btn btn-outline-danger"
                                      @if(!$user->roles->contains($role))
                                        disabled
                                      @endif
                                      >Detach
                              </button>
                            </form>
                          </td>
                          
                        </tr>
                      @endforeach
                    </tbody>
      
                  </table>
                  @else
                      <div class="alert alert-info text-center"><h5>No Roles found in the database.</h5></div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  @endsection
</x-admin-master>