<?php

namespace App\Repositories;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyRepository
{
    public function updateOrCreate(array $data, Request $request, Company $company = null): Company
    {
        if (!$company) {
            $company = auth()->user()->company()->create($data);
        } else {
            $company->update($data);
        }

        // Process images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') ?? [] as $image) {
                $company->images()->create([
                    'path' => Str::after($image->store('public/images'), 'public/')
                ]);
            }
        }

        return $company;
    }
}
