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