<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('companies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate
        $formFields = $request->validate(Company::validationRules());

        // Neu erstellte Company mit authentifizierten User verbinden
        $formFields['user_id'] = auth()->id();

        // Neue Company in Datenbank speichern
        $company = Company::create($formFields);

        return redirect('companies.show', ['company' => $company])->with('message', 'Unternehmen erstellt');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company): View
    {
        return view('companies.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company): View
    {
        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company): RedirectResponse
    {
        //  ??? Autorisierung des authentifizierten Users zur Bearbeitung der Company erfolgt über Policy nehm ich an

        // Validation
        $formFields = $request->validate(Company::validationRules());

        // Datenbankeintrag updaten
        $company->update($formFields);

        return redirect('companies.show', ['company' => $company])->with('message', 'Änderungen erfolgreich');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): RedirectResponse
    {
        //  ??? Autorisierung des authentifizierten Users zur Bearbeitung der Company erfolgt über Policy nehm ich an

        // Datenbankeintrag löschen
        $company->delete();

        return redirect('/')->with('message', 'Unternehmen gelöscht');
    }
}
