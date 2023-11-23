<!doctype html>

<html>

<body>

    <div>
        @foreach ($users as $user)
            <div>
                <header>{{ $user->name }}</header>
                <div>
                    <p class="mb2">id: {{ $user->id }}</p>
                    <p class="mb2">email: {{ $user->email }}</p>
                    <p class="mb2">details: {{ $user->remember_token }}</p>
                </div>
            </div>
        @endforeach

    </div>

</body>

</html>
