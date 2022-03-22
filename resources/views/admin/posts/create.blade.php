<x-admin-master>
  @section('content')
     <h1>Create</h1>

     <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
      @csrf
      {{-- <input type="hidden" name="_method" value="PUT"> --}}
      <div class="form-group">
           <label for="title">Title</label>
              <input type="text"
                     name="title"
                     class="form-control"
                     id="title"
                     aria-describedby=""
                     placeholder="Enter title">
      </div>

      <div class="form-group">
        <label for="title">File</label>
           <input type="file"
                  name="post_image"
                  class="form-control-file"
                  id="post_image"
                  >
   </div>
   <div class="form-group">
    <label for="title">Body</label>
     <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
</div>

 <button type="submit" class="btn btn-primary">Submit</button>
     </form>
  @endsection

</x-admin-master>
