<x-layout>
    @include('_posts-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())


        <x-post-featured-card :post="$posts[0]"/>

        @if ($posts->count()>1)
            <div class="lg:grid lg:grid-cols-3">
                @foreach ($posts->skip(1) as $post)

                    <x-post-card :post="$post"/>

                @endforeach

            </div>
        @endif
        @else
         <p>no posts jet!</p>
        @endif
    </main>


    {{-- @foreach ($posts as $post)
    <article>
        <a href="/posts/{{$post->id}}"><h1>{{$post->title}}</h1></a>
        <a href="/authors/{{$post->author->username}}">by {{$post->author->name}} </a>
        <div>{{$post->excerpt}}</div>
        <p>
            <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>
    </article>
    @endforeach --}}
</x-layout>
