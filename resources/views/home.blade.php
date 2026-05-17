<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    <x-slot:imen>
        lllll
    </x-slot:imen>
    <div class="card-brutalist">
        @foreach($chirps as $chirp)
        <div>{{$chirp['message']}}</div>         
        <h1>{{$chirp['author']}}</h1>
        <p>{{$chirp['time']}}</p>

       @endforeach
    </div>
</x-layout>