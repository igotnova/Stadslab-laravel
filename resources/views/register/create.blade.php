<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-grey-300 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form action="/register" method="POST" class="mt-10">
                @csrf
                <div>

                    <label for="name" class="block mbn-2 uppercase font-bold text-xs text-gray-70">
                        name
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror

                    <label for="username" class="block mbn-2 uppercase font-bold text-xs text-gray-70">
                        username
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="username" id="username"
                        value="{{ old('username') }}" required>
                    @error('username')
                        <p>{{ $message }}</p>
                    @enderror
                    <label for="email" class="block mbn-2 uppercase font-bold text-xs text-gray-70">
                        email
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror

                    <label for="password" class="block mbn-2 uppercase font-bold text-xs text-gray-70">
                        password
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password"
                        required>
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>




                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white roundend py-2">
                        submit
                    </button>

                </div>

                {{-- check for and show all errors --}}
                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif



            </form>

        </main>

    </section>

</x-layout>
