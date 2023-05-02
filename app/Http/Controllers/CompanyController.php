<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{
    protected CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $companies = Company::query()
            ->paginate();
        return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('companies.create', ['company' => auth()->user()->company]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(Company::validationRules());

        $company = $this->companyRepository->updateOrCreate($data, $request);

        return redirect(route('companies.show', ['company' => $company->load(['images', 'user'])]))->with('message', trans('app.successfully_created'));
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
        $data = $request->validate(Company::validationRules());

        $this->companyRepository->updateOrCreate($data, $request, $company);

        return redirect(route('companies.show', ['company' => $company->load(['images', 'user'])]))->with('message', trans('app.succesfully_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();

        return redirect(route('users.edit', ['user' => auth()->user()]))->with('message', trans('app.successfully_deleted'));
    }
}
