<?php

namespace App\Http\Controllers;

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
        $companies = Company::paginate();

        return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        if (\request()->user()->cannot('create')) {
            abort(403);
        } else {
            return view('companies.create', ['company' => new Company()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->cannot('create')) {
            abort(403);
        } else {
            $data = $request->validate(Company::validationRules());

            $company = $this->companyRepository->updateOrCreate($data);

            return redirect(route('companies.show', ['company' => $company]))->with('message', trans('app.successfully_created'));
        }
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
        if (\request()->user()->cannot('update', $company)) {
            abort(403);
        } else {
            return view('companies.edit', ['company' => $company]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company): RedirectResponse
    {
        if ($request->user()->cannot('update', $company)) {
            abort(403);
        } else {
            $data = $request->validate(Company::validationRules());

            $this->companyRepository->updateOrCreate($data, $company);

            return redirect(route('companies.edit', ['company' => $company]))->with('message', trans('app.successfully_updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): RedirectResponse
    {
        if (\request()->user()->cannot('delete', $company)) {
            abort(403);
        } else {

            $company->delete();

            return redirect(route('home'))->with('message', trans('app.successfully_deleted'));
        }
    }
}
