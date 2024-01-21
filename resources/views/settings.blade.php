<x-layout>
{{-- @dump($user->name) --}}
    <x-setting :heading="'Edit post: ' . $user->name">
            <form method="POST" action="/settings/update">
                @csrf
                @method('PATCH')

                <x-form.input name="name" :value="old('name',$user->name)"/>

                <x-form.input name="username" :value="old('username',$user->username)"/>

                <x-form.input name="email" :value="old('email',$user->email)"/>


                <x-form.button>update</x-form.submit-buton>

            </form>
    </x-setting>


</x-layout>
