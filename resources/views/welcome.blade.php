@extends ('layout')

@section('contenido')

    <section class="posts container">
        @if (isset($title))
            <h3>{{$title}}</h3>
        @endif

        @foreach($posts as $post)

        <article class="post">
            @if($post->fotos->count() === 1)
                <figure><img class="img-responsive" src="{{$post->fotos->first()->url}}" alt=""></figure>
            @elseif($post->fotos->count() > 1)
                <div class="gallery-photos" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 464 }'>
                    @foreach($post->fotos->take(4) as $foto)
                        <figure class="grid-item grid-item--height2">
                            @if($loop->iteration === 4)
                                <div class="overlay">{{$post->fotos->count()}} Fotos</div>
                            @endif
                            <img src="{{url($foto->url)}}" alt="" class="img-responsive">
                        </figure>
                    @endforeach
                </div>
            @elseif($post->iframe)
                <div class="video">
                {!! $post->iframe !!}
                </div>
            @endif
            <div class="content-post">
                <header class="container-flex space-between">
                    <div class="date">
                        <span class="c-gray-1">{{$post->published_at->format('M d') }}</span>
                    </div>
                    <div class="post-category">
                        <span class="category text-capitalize"><a href="{{ route('categorias.show', $post->categoria) }}">{{$post->categoria->nombre}}</a></span>
                    </div>
                </header>
                <h1>{{$post->titulo}}</h1>
                <div class="divider"></div>
                <p>{{$post->extracto}}</p>
                <footer class="container-flex space-between">
                    <div class="read-more">
                        <a href="blog/{{ $post->url }}" class="text-uppercase c-green">Leer más...</a>
                    </div>
                    <div class="tags container-flex">
                        @foreach($post->tags as $tag)
                        <span class="tag c-gray-1 text-capitalize"><a href="{{ route('tags.show', $tag) }}">#{{ $tag->nombre }}</a></span>
                        @endforeach
                    </div>
                </footer>
            </div>
        </article>

        @endforeach

         {!! $posts->links('vendor.pagination.default') !!}

    </section><!-- fin del div.posts.container -->

    

@stop