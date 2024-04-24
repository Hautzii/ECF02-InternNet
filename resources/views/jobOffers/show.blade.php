<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            More info
        </h2>
    </x-slot>

    <div class="containers">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <h2 class="mt-4">{{$jobOffer->title}}</h2>
                        <p class="mt-4">Start date : {{$jobOffer->start}} {{$jobOffer->end}}</p>
                        <p class="mt-4 description-full">{{$jobOffer->description}}</p>
                        <a href="mailto:{{$jobOffer->email}}" class="mt-4">Contact Us</a>
                    </div>
                    @if(auth()->user())
                    <div class="mt-2">
                        <form method="get" action="{{route('jobOffers.edit', $jobOffer->id)}}">
                            @csrf
                            <button type="submit">Edit</button>
                        </form>
                        <form method="post" action="{{route('jobOffers.destroy', $jobOffer->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                    @endif
                    <div class="mt-2">
                        <a href="{{route('jobOffers.index')}}">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<link rel="stylesheet" href="{{asset('/css/show.css')}}">
