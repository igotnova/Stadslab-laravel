<x-layout>

    <x-setting :heading="'Edit post: ' . $post->title">
            <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.input name="title" :value="old('title',$post->title)"/>
                <x-form.input name="slug" :value="old('slug',$post->slug)"/>
                <img src="{{ asset('storage/'. $post->thumbnail)}}" alt="" class="rounded-xl" width="100">
                <x-form.input name="thumbnail" type="file" :value="old('thumbnail',$post->thumbnail)"/>
                <x-form.textarea name="excerpt"  > {{old('excerpt', $post->excerpt)}}         </x-form.textarea>
                <x-form.textarea name="body" >    {{old('body', $post->body)}}       </x-form.textarea>


                <x-form.field>
                    <x-form.label name="category" />

                        <select name="category_id" id="category_id">
                            @php
                            $categories = \App\Models\Category::all();
                            @endphp
                            @foreach ($categories as $category )
                            <option
                            value="{{$category->id}}"
                            {{old('category_id', $post->category_id)==$category->id? 'selected': ''
                                }}>{{$category->name}}</option>
                            @endforeach
                            <x-form.error name="category" />
                        </select>
                </x-form.field>

                <x-form.button>update</x-form.submit-buton>

            </form>
    </x-setting>


</x-layout>
