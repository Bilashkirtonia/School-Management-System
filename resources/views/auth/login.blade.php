<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login here</title>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
    rel="stylesheet"
    />

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div style="width: 400px; margin-top:20px;" class="card bordered-2 p-5 m-auto mt-5">
                    <h2 class="text-center h3">login here</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <!-- Email input -->
                            <div class=" mb-4">
                                <div class="col-md-12">
                                    <label class="form-label" for="form2Example2">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <!-- Password input -->
                            <div class=" mb-4">
                                <div class="col-md-12">
                                    <label class="form-label" for="form2Example2">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                            <div class="col d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                <label class="form-check-label" for="form2Example31"> Remember me </label>
                                </div>
                            </div>
                        
                            <div class="col">
                                <!-- Simple link -->
                                <a href="#!">Forgot password?</a>
                            </div>
                            </div>
                        
                            <!-- Submit button -->
                            <button type="submit"  class="btn btn-primary btn-block mb-4">Sign in</button>
                        
                            
                        </form>

 
                </div>
            </div>
        </div>
    </div>
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
    ></script>  
</body>
</html>