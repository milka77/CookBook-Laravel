<x-admin-master>
  @section('content')
    <div class="container">
      <h1 class="text-center mb-3">Edit News - Admin Panel</h1>    
            
      <div class="d-flex flex-row justify-content-center">
        <form action="{{ route( 'news.update', $news->id ) }}" method="post" class="w-50">
          @csrf
          @method('PATCH')
  
          <div class="form-group">
            <label for="title">News title <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="title" id="title" value="{{ $news->title }}" required>
          </div>
          
          <div class="form-group">
            <label for="body">News body <span class="text-danger">*</span></label>
            <textarea class="form-control" name="body" id="body" rows="7">{{ $news->body }}</textarea>
          </div>

          <div class="d-flex justify-content-center">
            <a class="btn btn-outline-danger mr-2" href="{{ route('news.admin') }}">Cancel</a>
            <button class="btn btn-success" type="submit">Update News</button>
          </div>
        </form>
      </div>
      
    </div>
  @endsection
</x-admin-master>