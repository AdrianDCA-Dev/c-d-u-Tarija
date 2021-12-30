<x-app-layout>

    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
            @foreach($posts as $post)

                <article class="flex flex-col shadow my-4">
                    <!-- Article Image -->
                    <a href="#" class="hover:opacity-75">
                        <img src="@if($post->image) {{$post->image->url}} @else https://cdn.pixabay.com/photo/2021/08/25/20/42/field-6574455_960_720.jpg @endif">
                    </a>
                    <div class="bg-white flex flex-col justify-start p-6">
                        @if($post->category != null)
                            <a href="{{route('posts.category', $post->category)}}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$post->category->name}}</a>
                        @endif
                        <a href="{{route('posts.show', $post)}}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->name}}</a>
                        <div class="pb-2">
                            @foreach($post->tags as $tag)
                                <a href="{{route('posts.tag', $tag)}}" class="inline-block bg-green-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <p href="#" class="text-sm pb-2">
                            Por <a href="#" class="font-semibold hover:text-gray-800">{{$post->user->name}}</a>, Publicado {{ $post->created_at->diffForHumans() }}
                        </p>
                        <a href="#" class="pb-5">{!! $post->extract !!}</a>
                        <a href="{{route('posts.show', $post)}}" class="uppercase text-gray-800 hover:text-black">Sigue leyendo... <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

               {{-- <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif"
                         style="background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2021/08/25/20/42/field-6574455_960_720.jpg @endif">

                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                            <a href="{{route('posts.show', $post)}}">
                                {{$post->name}}
                            </a>
                        </h1>
                        <div class="py-1">
                            @foreach($post->tags as $tag)
                                <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">
                                    {{$tag->name}}
                                </a>
                            @endforeach
                        </div>
                    </div>

                </article>--}}
            @endforeach


            <!-- Pagination -->
            <div class="flex items-center py-8">

                    {{$posts->links()}}

            </div>

        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">About Us</p>
                <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
                <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Get to know us
                </a>
            </div>

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Instagram</p>
                <div class="grid grid-cols-3 gap-3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=4">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=5">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=6">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=7">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=8">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=9">
                </div>
                <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-instagram mr-2"></i> Follow @dgrzyb
                </a>
            </div>

        </aside>

    </div>
  {{--  <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif"
                         style="background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2021/08/25/20/42/field-6574455_960_720.jpg @endif">

                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                            <a href="{{route('posts.show', $post)}}">
                               {{$post->name}}
                            </a>
                        </h1>
                        <div class="py-1">
                            @foreach($post->tags as $tag)
                                <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">
                                    {{$tag->name}}
                                </a>
                            @endforeach
                        </div>
                    </div>

                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>--}}
</x-app-layout>
