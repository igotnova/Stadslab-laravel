<x-layout>

    <x-setting heading="manage posts">


        <div class="alm arq">
            <div class="gx ua">
                <div class="arh cez dde">
                    <div class="bxo cbf">
                        <div class="bzv">
                            <h1 class="avx awf awo axu">Posts</h1>
                            <p class="lb avz axs">A list of all posts</p>
                        </div>
                    </div>
                    <div class="lm ma">
                        <div class="gc gl adi but ctb">
                            <div class="">
                                <table class="min-w-full">
                                    <tbody class="divide-y">
                                        @foreach ( $posts as $post )
                                        <tr>
                                            <td class="adm asb atm aub avz awd axu cgf"> <a href="/posts/{{$post->slug}}">{{$post->title}}</a></td>
                                            <td class="adm are asb avz axq">{{$post->title}}
                                            <td class="adm are asb avz axq">
                                            <input data-id="{{$post->id}}" class="toggle-class" type="checkbox"
                                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                data-on="Active" data-off="InActive" {{ $post->active ? 'checked' : ''
                                            }}></td>
                                            <td class="ab adm asb atl aud avl avz awd cgm">
                                                <a href="/admin/posts/{{$post->id}}/edit" class="ayg blh">Edit</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </x-setting>


</x-layout>
