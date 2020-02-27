@extends ('layout.master')

@section('content')
    <h1>Home Page</h1>
    <br>
    <ul>
    <li><a href="#" class="signup">Register</a></li>
    <li><a href="#" class="login">Login</a></li>
    <li><a href="/users">Users</a></li>
    </ul>

    <div id="login" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <br>
                    <h2>Authenticate || <a href="#" class="signup" data-dismiss="modal">Signup</a></h2>
                    <hr>
                    <form method="POST"  onsubmit="return validate_login()" action="/try">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username" onkeyup="check_username();" name="username">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        @include('layout.error')
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="signup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <br>
                    <h2>Registration form || <a href="#" class="login" data-dismiss="modal">Login</a></h2>
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
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // add a new post
        $(document).on('click', '.login', function() {
            $('#login').modal('show');
        });
        $(document).on('click', '.signup', function() {
            $('#signup').modal('show');
        });
    </script>
@endsection