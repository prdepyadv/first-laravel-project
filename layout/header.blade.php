<div class="jumbotron text-center" style="margin-bottom:0">
    <h1>My Page</h1>
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-collapse">
    <a class="navbar-brand" href="/">
        {{ Auth::check() ? \auth()->user()->name : "Nav" }}</a>
    <a class="navbar-brand ml-auto" href="/logout">{{ Auth::check() ? "logout" : "Nav" }}</a>
</nav>
