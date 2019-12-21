@extends ('layout')

@section ('content')
<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
            <div class="title">

              @foreach ($articles as $article)
                <h2>
                  <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
                </h2>
                <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
                {{ $article->body }}
              @endforeach
        </div>
      </div>
</div>
@endsection
