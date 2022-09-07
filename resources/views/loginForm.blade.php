@yield('title', 'login-form')
@section('content')
    @parent
    <form action="{{route('login')}}" method="post">
        @csrf
        <label for="username">username: </label>
        <input type="text" id="username" name="username">

        <label for="password">password: </label>
        <input type="password" name="password" id="password">

        <input type="submit" name="submit" id="submit" value="login">
    </form>
@endsection
