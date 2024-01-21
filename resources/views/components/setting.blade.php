@props(['heading'])
<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-4 border-b">{{$heading}}</h1>
    <div class="flex">
        <aside class="w-48">
            <h4 class="border-b font-semibold mb-6">links</h4>
            <ul>
                {{-- <li>
                    <a href="/admin/dashboard"
                        class="{{ request()->is('admin/dashboard') ? 'text-blue-500': ''}}">dashboard</a>
                </li> --}}
                <li>
                    <a href="/admin/create" class="{{ request()->is('admin/create') ? 'text-blue-500': ''}}">create a
                        post</a>
                </li>
                <li>
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500': ''}}">show all
                        post</a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">
            {{$slot}}
        </main>
    </div>
</section>
