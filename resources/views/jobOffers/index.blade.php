<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Job Offers') }}
                </h2>
                @if (Auth::check())
                <x-nav-link :href="route('jobOffers.create')" class="ml-custom add_intern">
                    {{ __('Add an offer') }}
                </x-nav-link>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="containers">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="flex flex-col items-center justify-center">
                @foreach ($jobOffers as $jobOffer)
                    <div class="rounded overflow-hidden shadow-lg p-6 bg-white w-full sm:w-3/4 md:w-1/2 lg:w-1/3 xl:w-1/4 mb-4 mx-auto">
                        <div>
                            <h2 class="font-bold text-xl mb-2">{{$jobOffer->title}}</h2>
                            <p class="text-gray-700 text-base">{{ strlen($jobOffer->description) > 250 ? substr($jobOffer->description, 0, 250) . '...' : $jobOffer->description }}</p>
                        </div>
                        <div class="mt-4">
                            <a href="{{route('jobOffers.show', $jobOffer->id)}}" class="text-blue-500 hover:text-blue-700">Read more</a>
                        </div>
                        @if (Auth::check())
                        <div class="mt-4 justify-end">
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

<link rel="stylesheet" href="{{asset('/css/index.css')}}">
