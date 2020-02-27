@extends ('layout.master')



@section('content')
                    <br>
                    <h2>Registration form || <a href="/try">Login</a></h2>
                    <hr>
                    <form method="POST" onsubmit="return validate_signup()" action="/users">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        @include('layout.error')
                    </form>
@endsection
