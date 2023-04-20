<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('jobs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validation
        $formFields = $request->validate(Job::validationRules());

        // ??? Have to set Job->company_id = Company->id where Company->user_id = User->id of authenticated user
        $formFields['company_id'] = auth()->user()->company->id;

        // Persist new Model to Database
        Job::create($formFields);

        // ??? Zusätzliche Methode / View nötig, oder? Übersicht für alle Anzeigen DIESES users, nicht für ALLE Anzeigen
        return redirect('jobs.???')->with('message', 'Anzeige erstellt');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job): View
    {
        return view('jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job): View
    {
        return view('jobs.edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job): RedirectResponse
    {
        //  ??? Autorisierung des authentifizierten Users zur Bearbeitung des Jobs erfolgt über Policy nehm ich an

        // Validation
        $formFields = $request->validate(Job::validationRules());

        // Update database entry
        $job->update($formFields);

        return redirect('jobs.show', ['job' => $job])->with('message', 'Änderungen erfolgreich');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job): RedirectResponse
    {
        //  ??? Autorisierung des authentifizierten Users zur Bearbeitung des Jobs erfolgt über Policy nehm ich an

        // Remove from storage
        $job->delete();

        // ??? Zusätzliche Methode / View nötig, oder? Übersicht für alle Anzeigen DIESES users, nicht für ALLE anzeigen
        return redirect('jobs.???')->with('message', 'Anzeige gelöscht');
    }
}
