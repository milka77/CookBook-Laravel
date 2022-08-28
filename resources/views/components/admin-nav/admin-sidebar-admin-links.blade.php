@if (auth()->user()->userHasRole('Admin'))
  {{-- Recipe Admin links --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-receipt"></i>
      <span>Recipe Settings</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Recipe Categories:</h6>
        <a class="collapse-item" href="{{ route('cat.index') }}">Show All</a>
        <a class="collapse-item" href="{{ route('cat.create') }}">Add New</a>
        <hr>
        <h6 class="collapse-header">Recipe Difficulties:</h6>
        <a class="collapse-item" href="{{ route('difficulty.index') }}">Show All</a>
        <a class="collapse-item" href="{{ route('difficulty.create') }}">Add New</a>
      </div>
    </div>
  </li>
  {{-- End of Recipe Admin links --}}

  {{-- News Admin links --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNews" aria-expanded="true" aria-controls="collapseNews">
      <i class="far fa-newspaper"></i>
      <span>News Settings</span>
    </a>
    <div id="collapseNews" class="collapse" aria-labelledby="headingNews" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
      
        <h6 class="collapse-header">News</h6>
        <a class="collapse-item" href="{{ route('news.admin') }}">Show All News</a>
        <a class="collapse-item" href="{{ route('news.create') }}">Add News</a>
      
      </div>
    </div>
  </li>
  {{-- End Of News Admin links --}}

  {{-- User Admin links --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
      <i class="fas fa-users"></i>
      <span>User Settings</span>
    </a>
    <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
      
        <h6 class="collapse-header">Users</h6>
        <a class="collapse-item" href="{{ route('user.index') }}">Show All User</a>
      
      </div>
    </div>
  </li>
  {{-- End Of User Admin links --}}
      
  {{-- Role Admin Links --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRole" aria-expanded="true" aria-controls="collapseRole">
      <i class="fa-solid fa-user-gear"></i>
      <span>Role Settings</span>
    </a>
    <div id="collapseRole" class="collapse" aria-labelledby="headingRole" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        
        <h6 class="collapse-header">Roles</h6>
        <a class="collapse-item" href="{{ route('role.index') }}">Show Roles</a>
        <a class="collapse-item" href="{{ route('role.create') }}">Add New Role</a>

      </div>
    </div>
  </li>
  {{-- End Of Role Admin Links --}}
@endif