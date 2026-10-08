<h2>blog</h2>
@foreach ($posts as $post)
  <h1>{{ $post->title}}</h1>
  <p>{{ $post->body}}</p>
  <span>{{ $post->author }}</span>


@endforeach
{{ $posts->links() }}