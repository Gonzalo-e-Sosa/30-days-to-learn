<x-layout>
    <x-slot:heading>
        {{$job['title']}}
    </x-slot:heading>

    <h2>{{$job['company']}}</h2>

    <p>{{$job['description']}}</p>

    <p>{{$job['location']}}</p>

    <p>{{$job['salary']}}</p>
</x-layout>