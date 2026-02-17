<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function show($id)
    {
        $partner    = Partner::with(['products' =>  function($query){
            $query->where('is_active', true);
        }])->findOrFail($id);

        $allPartners = Partner::where('id', '!=', $id)
                            ->where('is_active', true)
                            ->select('id', 'name', 'logo_path')
                            ->get();

        return  view('partner.show', compact('partner', 'allPartners'));
    }
}
