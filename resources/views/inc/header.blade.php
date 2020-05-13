<nav class="navbar navbar-expand-md navbar-light sticky-top bg-white">
    <a class="navbar-brand font-weight-normal te" href="/"><u>КнижнаяПолка</u></a>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link" href="/">Домой</a>
            </li>
            <li class="nav-item {{Request::is('books*')?'active':''}}">
                <a class="nav-link" href="/books">Книги</a>
            </li>
            <li class="nav-item {{Request::is('authors*')?'active':''}}">
                <a class="nav-link" href="/authors">Авторы</a>
            </li>
        </ul>
    </div>
</nav>
