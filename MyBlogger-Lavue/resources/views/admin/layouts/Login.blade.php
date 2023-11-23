<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <title>Login - Student Maoni App </title>
</head>
<style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* Horizontally center the content */
        justify-content: center;
        /* Vertically center the content */
        height: 100vh;
        /* Make the container full viewport height */
    }
</style>

<body>
    <div class="container d-flex justify-contents-center p-9">
        <div class="text-uppercase text-yellow">
            <h1 class="text-yellow">My Maoni App</h1>
        </div>
        <div class="card">
            <form action="/student" method="POST">
                @csrf
                <!-- Email input -->
                <div class="form-outline">
                    <input type="email" name="email" placeholder="EMAIL" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1"></label>
                </div>

                <!-- Password input -->
                <div class="form-outline ">
                    <input type="password" id="form2Example2" name="password" placeholder="PASSWORD"
                        class="form-control" />
                    <label class="form-label" for="form2Example2"></label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col ">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form2Example31"
                                checked />
                            <label class="form-check-label" for="form2Example31"> Remember me </label>
                        </div>
                    </div>

                    <div class="col">
                        <!-- Simple link -->
                        <a href="#!">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <div class="btn btn-submit d-flex justify-contents-center">
                    <button type="submit" class="btn badge btn-primary mb-4 text-uppercase">
                        <h5>Login</h5>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
