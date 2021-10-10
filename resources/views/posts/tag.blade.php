<x-app-layout>
    <div class="">
        <h1 class="uppercase text-center text-3xl font-bold mb-3">Etiqueta: {{$tag->name}}</h1>

        @foreach($posts as $post)
            <x-card-post :post="$post"/>
        @endforeach

        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>

