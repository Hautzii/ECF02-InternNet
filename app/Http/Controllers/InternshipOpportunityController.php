<?php

namespace App\Http\Controllers;

use App\Models\InternshipOpportunity;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InternshipOpportunityController extends Controller
{
    public function index(): View {
        $jobOffers = InternshipOpportunity::all();
        return view('jobOffers.index', compact('jobOffers'));
    }

    public function show(string $id): View {
        $jobOffer = InternshipOpportunity::find($id);
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

        InternshipOpportunity::create([
            'title' => $request->input('title'),
            'location' => $request->input('location'),
            'contract' => $request->input('contract'),
            'description' => $request->input('description'),
            'start' => $request->start,
            'end' => $request->end,
            'email' => $request->input('email'),
            // 'company_id' => auth()->user()->company->id,
            // 'user_id' => auth()->id(),
        ]);

        return redirect()->route('jobOffers.index');
    }

    public function create(): View {
        return view('jobOffers.create');
    }

    public function edit(string $id): View {
        $jobOffer = InternshipOpportunity::find($id);
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

        $jobOffer = InternshipOpportunity::find($id);

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
        $jobOffer = InternshipOpportunity::find($id);
        $jobOffer->delete();
        return redirect()->route('jobOffers.index');
    }
}
