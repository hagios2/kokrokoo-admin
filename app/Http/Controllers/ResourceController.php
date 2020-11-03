<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\MediaType;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function mediaHouse(MediaType $mediaType)
    {
        $company = Company::query()->where('mediaType', $mediaType->id)->get();

        return $company;
    }
}
