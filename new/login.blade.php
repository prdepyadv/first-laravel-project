@extends ('layout.master')



@section('content')
                    <br>
                    <h2>Authenticate || <a href="/create">Signup</a></h2>
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
@endsection
