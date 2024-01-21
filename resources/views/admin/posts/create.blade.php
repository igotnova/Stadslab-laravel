<x-layout>

    <x-setting heading="publish new post">
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title" />
                <x-form.input name="slug" />
                <x-form.input name="thumbnail" type="file" />
                <x-form.textarea name="excerpt" />
                <x-form.textarea name="body" />


                <x-form.field>
                    <x-form.label name="category" />

                        <select name="category_id" id="category_id">
                            @php
                            $categories = \App\Models\Category::all();
                            @endphp
                            @foreach ($categories as $category )
                            <option value="{{$category->id}}" {{old('category_id')==$category->id? 'selected': ''
                                }}>{{$category->name}}</option>
                            @endforeach
                            <x-form.error name="category" />
                        </select>
                </x-form.field>

                <x-form.button>submit</x-form.submit-buton>

            </form>
    </x-setting>


</x-layout>
