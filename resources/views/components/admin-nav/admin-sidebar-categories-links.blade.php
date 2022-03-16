<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMyRecipies" aria-expanded="true" aria-controls="collapseMyRecipies">
    <i class="fas fa-fw fa-cog"></i>
    <span>My Recipies</span>
  </a>
  <div id="collapseMyRecipies" class="collapse" aria-labelledby="headingMyRecipies" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Recipies<h6>
      <a class="collapse-item" href="{{route('user.myrecipies')}}">Show My Recipies</a>
      <a class="collapse-item" href="{{route('recipe.create')}}">Add New</a>
    </div>
  </div>
</li>


<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-receipt"></i>
    <span>Recipe Settings</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Recipies</h6>
      <a class="collapse-item" href="{{route('admin.allrecipies')}}">Show All</a>
      <hr>
      <h6 class="collapse-header">Recipe Categories:</h6>
      <a class="collapse-item" href="{{route('cat.index')}}">Show All</a>
      <a class="collapse-item" href="{{route('cat.create')}}">Add New</a>
      <hr>
      <h6 class="collapse-header">Recipe Difficulties:</h6>
      <a class="collapse-item" href="{{route('difficulty.index')}}">Show All</a>
      <a class="collapse-item" href="{{route('difficulty.create')}}">Add New</a>
    </div>
  </div>
</li>
    
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
    <i class="fas fa-users"></i>
    <span>User Settings</span>
  </a>
  <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Users</h6>
      <a class="collapse-item" href="#">Show All User</a>
      <hr>
      <h6 class="collapse-header">Roles</h6>
      <a class="collapse-item" href="{{ route('role.index') }}">Show Roles</a>
      <a class="collapse-item" href="{{ route('role.create') }}">Add New Role</a>

    </div>
  </div>
</li>