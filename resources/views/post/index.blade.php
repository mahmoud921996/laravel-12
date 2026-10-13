<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Blog</title>

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 40px 20px;
      font-family: Arial, sans-serif;
      background: #f3f4f6;
      color: #1f2937;
    }

    .container {
      max-width: 900px;
      margin: 0 auto;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
      margin-bottom: 28px;
    }

    h1 {
      margin: 0 0 8px;
      font-size: 30px;
    }

    .subtitle {
      margin: 0;
      color: #6b7280;
      font-size: 14px;
    }

    .btn {
      display: inline-block;
      padding: 10px 16px;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      text-align: center;
      cursor: pointer;
      transition: background 0.2s, transform 0.2s;
    }

    .btn:hover {
      transform: translateY(-1px);
    }

    .btn-create {
      background: #4f46e5;
      color: white;
      white-space: nowrap;
    }

    .btn-create:hover {
      background: #4338ca;
    }

    .success-message {
      margin-bottom: 24px;
      padding: 14px 18px;
      border: 1px solid #a7f3d0;
      border-radius: 8px;
      background: #d1fae5;
      color: #065f46;
    }

    .posts {
      display: grid;
      gap: 20px;
    }

    .post-card {
      padding: 24px;
      border: 1px solid #e5e7eb;
      border-radius: 14px;
      background: white;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
    }

    .post-title {
      margin: 0 0 14px;
      font-size: 22px;
      overflow-wrap: anywhere;
    }

    .post-body {
      margin: 0 0 20px;
      color: #4b5563;
      font-size: 15px;
      line-height: 1.7;
      overflow-wrap: anywhere;
      white-space: pre-wrap;
    }

    .post-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
      padding-top: 16px;
      border-top: 1px solid #f3f4f6;
    }

    .post-author {
      color: #6b7280;
      font-size: 13px;
    }

    .post-author strong {
      color: #374151;
    }

    .post-actions {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .btn-edit {
      background: #e0e7ff;
      color: #3730a3;
    }

    .btn-edit:hover {
      background: #c7d2fe;
    }

    .btn-delete {
      background: #fee2e2;
      color: #991b1b;
    }

    .btn-delete:hover {
      background: #fecaca;
    }

    .empty-state {
      padding: 50px 20px;
      border: 1px dashed #d1d5db;
      border-radius: 14px;
      background: white;
      color: #6b7280;
      text-align: center;
    }

    .pagination {
      margin-top: 28px;
    }

    @media (max-width: 520px) {
      body {
        padding: 24px 12px;
      }

      .header {
        align-items: flex-start;
        flex-direction: column;
      }

      .post-card {
        padding: 18px;
      }

      .post-footer {
        align-items: flex-start;
        flex-direction: column;
      }

      .post-actions {
        width: 100%;
      }

      .post-actions .btn {
        flex: 1;
      }
    }
  </style>
</head>

<body>
  <main class="container">

    <header class="header">
      <div>
        <h1>My Blog</h1>
        <p class="subtitle">Manage your posts in one place.</p>
      </div>

      <a href="{{ route('blog.create') }}" class="btn btn-create">
        + Create Post
      </a>
    </header>

    @if (session('success'))
      <div class="success-message">
        {{ session('success') }}
      </div>
    @endif

    @if ($posts->count())
      <div class="posts">
        @foreach ($posts as $post)
          <article class="post-card">
            <h2 class="post-title">
              {{ $post->title }}
            </h2>

            <p class="post-body">{{ $post->body }}</p>

            <div class="post-footer">
              <div class="post-author">
                By <strong>{{ $post->author }}</strong>

                <span>
                  · {{ $post->published ? 'Published' : 'Draft' }}
                </span>
              </div>

              <div class="post-actions">
                <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-edit">
                  Edit
                </a>

                <form action="/blog/{{ $post->id }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this post?')">
                  @csrf
                  @method('DELETE')

                  <button type="submit" class="btn btn-delete">
                    Delete
                  </button>
                </form>
              </div>
            </div>
          </article>
        @endforeach
      </div>

      <div class="pagination">
        {{ $posts->links() }}
      </div>
    @else
      <div class="empty-state">
        <h2>No posts yet</h2>
        <p>Create your first post to get started.</p>
      </div>
    @endif

  </main>
</body>

</html>