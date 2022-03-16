<x-admin-master>

  @section('content')
  
  <div class="container">
      <h1 class="h3 mb-4 text-gray-800 text-center">Dashboard</h1>
      <hr>
      <div class="row">
        <div class="col-6">
          <h3 class="text-center">Users</h3>
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>NUMBER</tr>
              </tr>
              <tr>
                <td>All users</td>
                <td class="text-right">777</td>
              </tr>
            </thead>
          </table>
        </div>

        <!-- Right side -->
        <div class="col-6">
          <h3>Recipies</h3>
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>NUMBER</tr>
                </tr>
                <tr>
                  <td>All recipies</td>
                  <td class="text-right">777</td>
                </tr>
              </thead>
            </table>
          </div>
        </div>
        <!-- ./Right side -->
    </div>
  @endsection

</x-admin-master>