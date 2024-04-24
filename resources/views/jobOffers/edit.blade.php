<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit a job offer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('jobOffers.update', $jobOffer->id) }}" method="post" class="flex flex-col">
                        @csrf
                        @method('PATCH')
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{$jobOffer->title}}">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" value="{{$jobOffer->location}}">
                        <label for="contract">Contract</label>
                        <input type="text" name="contract" id="contract" value="{{$jobOffer->contract}}">
                        <label for="start">Start</label>
                        <input type="date" name="start" id="start" value="{{$jobOffer->start}}">
                        <label for="end">End</label>
                        <input type="date" name="end" id="end" value="{{$jobOffer->end}}">
                        <label for="description">Description</label>
                        <textarea name="description" id="description">{{$jobOffer->description}}</textarea>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{$jobOffer->email}}">
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
