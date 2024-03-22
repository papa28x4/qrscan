<table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th> Featured Image </th>
        <th> Title </th>
        <th> Author </th>
        <th> Created On </th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
          <tr>
              <td class="py-1">
                  <img src="{{$post->featuredImage ?? 'backend/images/dummy.banner_dummy.PNG' }}" alt="image">
              </td>
              <td>{{$post->title}}</td>
              <td>{{$post->user->name}} {{$post->user->last_name}}</td>
              <td>{{ date('jS M, Y, g:i a', strtotime($post->created_on()))}}</td>
              <td class="d-flex align-items-center">
                  <a href="{{route('posts.show', $post->slug)}}" target="_blank">
                    <button class="btn btn-primary mr-2">View</button>
                    {{-- <i class="mdi mdi-eye menu-icon"></i> --}}
                </a>
                    {{-- <i class="fas fa-eye"></i> --}}
                  <a href="{{route('posts.edit', $post->slug)}}">
                    <button class="btn btn-warning mr-2">
                      Edit
                    </button>
                    {{-- <i class="mdi mdi-pencil"></i> --}}
                </a>
                  <button type="button" data-id={{$post->slug}} class="btn btn-danger remove" data-toggle="modal" data-target="#exampleModal">
                      Delete
                  </button>
                  {{-- <i class="mdi mdi-delete menu-icon"></i> --}}
              </td>
          </tr>
       @endforeach
    </tbody>
</table>

<div style="margin-right:60px;" class="row pt-4 pl-4 align-items-start justify-content-between">
<span class="result text-muted mt-2">{{ $posts->firstItem() }} - {{ $posts->lastItem() }} of {{ $posts->total() }} results</span>
{{ $posts->links() }}
</div>