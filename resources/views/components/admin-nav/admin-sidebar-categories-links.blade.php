<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Recipe Settings</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
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