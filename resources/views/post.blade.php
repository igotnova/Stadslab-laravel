<x-layout>
    <x-slot name="content">



    <article>
        <h1>{{$post->title}}</h1>
        <p>
            <a href="/authors/{{$post->author->username}}">by {{$post->author->name}} </a><br><br><a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>
        <div>{{$post->body}}</div>

    </article>
    <h5><a href="/">go back</a></h5>


</x-slot>
</x-layout>
