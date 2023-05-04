<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CompanyRepository
{
    public function updateOrCreate(array $data, Company $company = null): Company
    {
        if (!$company) {
            $company = Company::create($data);

        } else {
            $company->update($data);
        }

        // Process images
        if (isset($data['image'])) {
            if (!$company->images()->exists()) {
                $company->images()->create([
                    'path' => $data['image']->store('images', 'public')
                ]);
            } else {
                $company->images()->update([
                    'path' => $data['image']->store('images', 'public')
                ]);
            }
        }

        return $company;
    }
}
