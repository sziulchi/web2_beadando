@props(['landing' => false])
<!doctype html>
<html lang="hu">
  <header id="header" @class(['alt' => $landing])>
    <title>Alpha by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
  </head>
  <body class="{{ $landing ? 'landing ' : '' }}is-preload">
    <div id="page-wrapper">
		@include('header')

		{{ $slot }}
		

		<!-- Footer -->
			<footer id="footer">
				<ul class="copyright">
					<li>Boros Szilárd - TPJES5 | Kollár Máté - INEIN6</li>
				</ul>
			</footer>

		</div>

		<!-- Scripts -->
			<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
			<script src="{{ asset('assets/js/jquery.dropotron.min.js') }}"></script>
			<script src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
			<script src="{{ asset('assets/js/browser.min.js') }}"></script>
			<script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
			<script src="{{ asset('assets/js/util.js') }}"></script>
			<script src="{{ asset('assets/js/main.js') }}"></script>

  </body>
</html>