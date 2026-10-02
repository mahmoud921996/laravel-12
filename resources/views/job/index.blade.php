<div>
    <h1>My name is {{ $name }}</h1>

    @foreach ($jobs as $job)
        <div>
            <h2>{{ $job['title'] }}</h2>
            <p>{{ $job['salary'] }}</p>
        </div>
    @endforeach
</div>