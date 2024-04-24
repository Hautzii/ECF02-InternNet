<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JobOfferController extends Controller
{
    public function index(): View {
        $jobOffers = JobOffer::all();
        return view('jobOffers.index', compact('jobOffers'));
    }

    public function show(string $id): View {
        $jobOffer = JobOffer::find($id);
        return view('jobOffers.show', compact('jobOffer'));
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'title' => 'required|string',
            'location' => 'required|string',
            'contract' => 'required|string',
            'description' => 'required|string',
            'start' => 'required|date',
            'email' => 'required|email',
        ]);

        $jobOffer = new JobOffer([
            'title' => $request->input('title'),
            'location' => $request->input('location'),
            'contract' => $request->input('contract'),
            'description' => $request->input('description'),
            'start' => $request->start,
            'end' => $request->end,
            'email' => $request->input('email'),
        ]);

        $jobOffer->user_id = auth()->id();
        $jobOffer->save();

        return redirect()->route('jobOffers.index');
    }

    public function create(): View {
        return view('jobOffers.create');
    }

    public function edit(string $id): View {
        $jobOffer = JobOffer::find($id);
        return view('jobOffers.edit', compact('jobOffer'));
    }

    public function update(Request $request, string $id): RedirectResponse {
        $request->validate([
            'title' => 'required|string',
            'location' => 'required|string',
            'contract' => 'required|string',
            'description' => 'required|string',
            'start' => 'required|date',
        ]);

        $jobOffer = JobOffer::find($id);

        $jobOffer->update([
            'title' => $request->input('title'),
            'location' => $request->input('location'),
            'contract' => $request->input('contract'),
            'description' => $request->input('description'),
            'start' => $request->start,
            'end' => $request->end,
            'email' => $request->input('email')
        ]);

        return redirect()->route('jobOffers.index');
    }

    public function destroy(string $id): RedirectResponse {
        $jobOffer = JobOffer::find($id);
        $jobOffer->delete();
        return redirect()->route('jobOffers.index');
    }
}
