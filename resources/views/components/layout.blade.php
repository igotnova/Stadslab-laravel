<!doctype html>

<title>Stadslab Rotterdam</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                  <h1>stadslab</h1>
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">

                @auth
                <x-dropdown>
                    <x-slot name="trigger">
                         <button class="text-xs font-bold uppercase"> welcome, {{auth()->user()->name}}</button>
                        </x-slot>
                        <x-dropdown-item href="/settings">settings</x-dropdown-item>
                        <x-dropdown-item href="/admin/posts">dashboard</x-dropdown-item>
                        <x-dropdown-item href="/admin/create">create post</x-dropdown-item>
                        <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">log out</x-dropdown-item>

                        <form action="/logout" method="post" class="hidden" id="logout-form">
                            @csrf
                        </form>

                </x-dropdown>


                @endauth

                @guest
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="ml-6 text-xs font-bold uppercase">Login</a>
                @endguest

                <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{$slot}}


        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">

            <h5 class="text-3xl">Stadslab rotterdam</h5>
            <p class="text-sm mt-3">een blog voor en door studenten</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">


                </div>
            </div>
        </footer>
    </section>
    <x-flash></x-flash>
</body>
