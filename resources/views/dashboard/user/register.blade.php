<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .Sign_in_link {
            font-weight: 500;
            color: #14b397;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <section class="text-center">

        <div class="p-5 bg-image" style="
        background-image: url('{{ url('cover.webp') }}');
        height: 300px;
        "></div>

        <div class="container">
            <div class="row justify-content-center align-items-center" style="height: 87vh;">
                <div class="card col-lg-6 mx-8 mx-md-4 shadow-5-strong" style="
                                                                        margin-top: -350px;
                                                                        background: hsla(0, 0%, 100%, 0.8);
                                                                        backdrop-filter: blur(30px);
                                                                        ">
                    <div class="card-body py-5 px-md-5">

                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-11">
                                <h2 class="fw-bold mb-5">Sign up now</h2>
                                <form action="{{route('user.create')}}" method="post"> 
                                    @csrf
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="firstname" name="firstname" class="form-control" />
                                                <label class="form-label" for="firstname">First name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="lastname" name="lastname" class="form-control" />
                                                <label class="form-label" for="lastname">Last name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" name="email" class="form-control" />
                                        <label class="form-label" for="email">Email address</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" name="password" class="form-control" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <!--Confirm Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="cpassword" name="cpassword" class="form-control" />
                                        <label class="form-label" for="cpassword">Confirm Password</label>
                                    </div>

                                    
                                    <!-- <div class="form-check d-flex justify-content-center mb-4">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                                        <label class="form-check-label" for="form2Example33">
                                            Subscribe to our newsletter
                                        </label>
                                    </div> -->

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block mb-4">
                                        Sign up
                                    </button>

                                    <p>
                                        Already have a account ?
                                        <a href="{{route('user.login')}}" class="Sign_in_link">Sign in</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>