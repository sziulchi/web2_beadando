<header id="header">
	<h1><a href="/">F1</a></h1>
	<nav id="nav">
		<ul>
@if (Auth::check())

			<li><a href="/">Főoldal</a></li>
			<li><a href="/data">Adatbázis</a></li>
			<li><a href="/contact">Kapcsolat</a></li>
			<li><a href="/msg">Üzenetek</a></li>
			<li><a href="/diagram">Diagram</a></li>
	

	@if (Auth::User()->role==1)

			<li><a href="/crud">CRUD</a></li>

    @endif

			<li>
				<form method="post" action="/logout">
					@csrf
					<input type="submit" value="Kijelentkezés">
				</form>
			</li>
@else

			<li><a href="/">Főoldal</a></li>
			<li><a href="/data">Adatbázis</a></li>
			<li><a href="/contact">Kapcsolat</a></li>
			<li><a href="/diagram">Diagram</a></li>
			<li><a href="/login">Bejelentkezés</a></li>
			<li><a href="/register">Regisztráció</a></li>

@endif

		</ul>
	</nav>
</header>
