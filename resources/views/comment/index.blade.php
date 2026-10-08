<h2>Comments </h2>
@foreach ($comments as $comment){
  <h1>{{ $comment->author}}</h1>
  <p>{{ $comment->content }}</p>
  <p>{{ $comment->post }}</p>
  }

@endforeach