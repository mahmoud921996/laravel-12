<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Post</title>

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

    .form-container {
      max-width: 600px;
      margin: 0 auto;
      padding: 32px;
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.07);
    }

    h1 {
      margin: 0 0 8px;
      font-size: 28px;
    }

    .subtitle {
      margin-bottom: 28px;
      color: #6b7280;
      font-size: 14px;
    }

    .form-group {
      margin-bottom: 22px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-size: 14px;
      font-weight: 600;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid #d1d5db;
      border-radius: 8px;
      font: inherit;
      font-size: 14px;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
    }

    input[type="text"]:focus,
    textarea:focus {
      border-color: #6366f1;
      box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
    }

    textarea {
      min-height: 140px;
      resize: vertical;
    }

    .checkbox-group {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 26px;
    }

    .checkbox-group input {
      width: 17px;
      height: 17px;
      accent-color: #6366f1;
      cursor: pointer;
    }

    .checkbox-group label {
      margin: 0;
      cursor: pointer;
    }

    .buttons {
      display: flex;
      gap: 12px;
    }

    button,
    .cancel-button {
      display: inline-block;
      flex: 1;
      padding: 13px;
      border: none;
      border-radius: 8px;
      font-size: 15px;
      font-weight: 600;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      transition: background 0.2s, transform 0.2s;
    }

    button {
      background: #4f46e5;
      color: #ffffff;
    }

    button:hover {
      background: #4338ca;
      transform: translateY(-1px);
    }

    .cancel-button {
      background: #e5e7eb;
      color: #374151;
    }

    .cancel-button:hover {
      background: #d1d5db;
    }

    .errors {
      margin-bottom: 24px;
      padding: 14px 18px;
      border-radius: 8px;
      background: #fee2e2;
      color: #991b1b;
    }

    .errors ul {
      margin: 0;
      padding-left: 20px;
    }

    @media (max-width: 480px) {
      body {
        padding: 20px 12px;
      }

      .form-container {
        padding: 22px 18px;
      }

      .buttons {
        flex-direction: column;
      }
    }
  </style>
</head>

<body>
  <div class="form-container">
    <h1>Edit Post</h1>
    <p class="subtitle">Update your post details below.</p>

    @if ($errors->any())
      <div class="errors">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="/blog/{{ $post->id }}" method="POST">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" value="{{$post->id}}">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" placeholder="Enter post title"
          value="{{ old('title', $post->title) }}" required>
      </div>

      <div class="form-group">
        <label for="body">Body</label>
        <textarea id="body" name="body" placeholder="Write your post content..."
          required>{{ old('body', $post->body) }}</textarea>
      </div>

      <!-- <div class="form-group">
        <label for="author">Author</label>
        <input type="text" id="author" name="author" placeholder="Enter author name"
          value="{{ old('author', $post->author) }}" required>
      </div> -->

      <div class="checkbox-group">
        <input type="checkbox" id="published" name="published" value="1" @checked(old('published', $post->published))>
        <label for="published">Publish this post</label>
      </div>

      <div class="buttons">
        <button type="submit">Save Changes</button>
        <a href="/blog" class="cancel-button">
          Cancel
        </a>
      </div>
    </form>
  </div>
</body>

</html>