<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">

	<title>{{ $article->title }} hatter.top</title>

	<!-- Primary Meta Tags -->
	<meta name="keywords" content="{{ $keywords }}">
	<meta name="description" content="{{ $article->body }}">

	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://hatter.top">
	<meta property="og:title" content="{{ $keywords }}">
	<meta property="og:description" content="{{ $article->body }}">

	<!-- Twitter -->
	<meta property="twitter:url" content="https://hatter.top">
	<meta property="twitter:title" content="{{ $keywords }}">
	<meta property="twitter:description" content="{{ $article->body }}">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net" />
	<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

	<!-- Styles -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma-rtl.min.css" />
	<style>
		.body {
			white-space: pre-wrap;
		}
	</style>
</head>

<body>
	<section class="hero is-primary">
		<div class="hero-body">
			<div class="container is-max-desktop">
				<p class="title">
					Russell Notes
				</p>
				<div class="subtitle">
					<span class="tag">php</span>
					<span class="tag">mysql</span>
					<span class="tag">react</span>
					<span class="tag">linux</span>
					<span class="tag">mac</span>
					@foreach($tags as $tag)
					<span class="tag">{{ $tag->name }}</span>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<div class="tabs is-centered">
		<ul>
			@foreach($articles as $chapter)
			@if($chapter->udid == $article->udid)
			<li class="is-active">
				@else
			<li>
				@endif
				<a href="{{ route('article', ['udid'=>$chapter->udid]) }}">{{$chapter->title}}</a>
			</li>
			@endforeach
		</ul>
	</div>
	<div class="container is-max-widescreen">
		<section class="section">
			<h1 class="title">{{ $article->title }}</h1>
			<h2 class="subtitle">
				{{ $article->created_at }}
			</h2>
			<p class="content is-large body">{!! $article->body !!}</p>
			<div class="tags are-medium">
				@foreach($article->tags as $tag)
				<span class="tag">{{ $tag->name }}</span>
				@endforeach
			</div>
		</section>
		<footer class="footer">
			<div class="content has-text-centered">
				<p>
					<a href="https://hatter.top">&copy; {{date('Y')}} hatter.top </a>
				</p>
			</div>
		</footer>
	</div>
</body>

</html>