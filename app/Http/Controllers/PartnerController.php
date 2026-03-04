<?php

namespace App\Http\Controllers;

use App\Models\Partner;

class PartnerController extends Controller
{
    public function show($id)
    {
        $partner    = Partner::with(['products' =>  function($query){
            $query->where('is_active', true);
        }])->findOrFail($id);

        $partner->products->each(function($product) {
            $product->has_glare_reduction = collect($product->specifications)
                ->contains(fn($spec) => !empty($spec['glare_reduction']) && $spec['glare_reduction'] > 0);
        });

        $allPartners = Partner::where('id', '!=', $id)
                            ->where('is_active', true)
                            ->select('id', 'name', 'logo_path')
                            ->get();

        return  view('partner.show', compact('partner', 'allPartners'));
    }
}
