<?php use App\Models\Company?>

@props(['company'])

<div class="bg-gray-50 border border-gray-200 rounded p-3">
    <div class="flex">
        <div>
            <h3 class="text-2xl">
                <a href="/companies/{{ $company->id }}">
                    {{ $company->name }}
                </a>
            </h3>
        </div>
    </div>
</div>
