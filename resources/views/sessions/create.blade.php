<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-grey-300 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Login</h1>
<form action="/login" method="POST" class="mt-10">
            @csrf
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
            Login
        </button>

    </div>


</form>

        </main>
    </section>
</x-layout>
