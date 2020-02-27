@extends('layout.master')

@section('content')
    <h1>Users</h1>
    <ul>
    <li><a href="#" class="signup">Create User</a></li>
    </ul>
    @foreach($users as $user)
        @include('users')
    @endforeach

    <!-- Trying from here -->

    <div id="signup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <br>
                    <h2>Registration form</h2>
                    <hr>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username" onkeyup="validate_username()" name="username" required>
                            <p class="errorContent text-center alert alert-danger" style="display: none"></p>
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
                            <button type="submit" class="btn btn-primary add" data-dismiss="modal" disabled='disabled'>Submit</button>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).on('click', '.signup', function() {
            $('#signup').modal('show');
        });
        // $(document).keyup(function(){
        //     alert('d');
        // });
        $(document).on('click', '.add', function() {
                $.ajax({
                    type: 'POST',
                    url: 'posts',
                    async: false,
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'username': $('#username').val(),
                        'email': $('#email').val(),
                        'password': $('#password').val()
                    },
                    success: function (data) {
                        window.location.replace('/users');
                    }
                });
        });
    </script>

@endsection
