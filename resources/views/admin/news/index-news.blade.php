<x-admin-master>
  @section('content')
    <div class="container">
      <h1 class="text-center mb-3">News - Admin Panel</h1>    
            
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</td>
            <th>Title</td>
            <th>Body</td>
            <th>Author</th>
            <th>Created</th>
            <th>Functions</td>
          </tr>
        </thead>
        <tbody>
          @foreach($my_news as $news)
          
          <tr>
            <td>{{ $news->id }}</td>
            <td>{{ $news->title }}</td>
            <td>{{ $news->body }}</td>
            <td>{{ $news->user->full_name }}</td>
            <td>{{ $news->created_at }}</td>
            <td>
              <div class="d-flex flex-row">
                <a class="btn btn-success text-white mr-2" href="{{ route('news.edit', $news->id) }}">Edit</a>
                <form action="{{ route('news.destroy', $news->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input class="btn btn-outline-danger" type="submit" value="Delete">
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>Id</td>
            <th>Title</td>
            <th>Body</td>
            <th>Author</th>
            <th>Registered</td>
            <th>Functions</td>
          </tr>
        </tfoot>
      </table>

      <div class="row">
        <div class="col-4">
          Showing ({{ $my_news->firstItem() }} to {{ $my_news->lastItem() }}) of {{ $my_news->total() }} entries

        </div>
        <div class="col-8 pagination">
         
            {{ $my_news->links() }}
         
        </div>
      </div>
    </div>
  @endsection
</x-admin-master>