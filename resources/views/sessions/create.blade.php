<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-grey-300 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Login</h1>
            <form action="/login" method="POST" class="mt-10">
                @csrf
                <x-form.input name="email" />
                <x-form.input name="password" type="password"  />

                <x-form.button>login</x-form.submit-buton>

            </form>

        </main>
    </section>
</x-layout>
