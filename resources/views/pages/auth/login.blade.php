<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
        <h1>LOGIN</h1>
        <form action="/login" method="POST">
            @csrf
            <table>
                @if (session('message'))
                    <div style="color:red;">
                        {{ session('message') }}
                    </div>
                @endif
                <tr></tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="text" name="email" placeholder="email" value="{{ old('email') }}" required></td>
                    <td>
                        @error('email')
                            <span style="color:red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" name="password" placeholder="password" required></td>
                    @error('password')
                        <span style="color:red;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </tr>
            </table>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </body>
</html>