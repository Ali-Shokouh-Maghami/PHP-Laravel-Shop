@extends('layouts.auth')


@section('content')


    <form action="{{ route('auth.register') }}" method="post" class="form-signin">

        @include('partials.errors')

        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Please sign UP</h1>

        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

        <input type="password" name="password_confirmation" id="inputConfirmationPassword" class="form-control" placeholder="Confirm Password" required>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>

@endsection()
