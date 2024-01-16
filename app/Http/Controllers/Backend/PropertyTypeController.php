<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{

    public function AllType()
    {
        // Ganti kode ini sesuai dengan logika bisnis Anda
        $types = PropertyType::latest()->get();
        return view('backend.type.all_type', compact('types'));
    }
}
