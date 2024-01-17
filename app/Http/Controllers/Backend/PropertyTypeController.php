<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use PhpParser\Builder\Property;

class PropertyTypeController extends Controller
{

    public function AllType()
    {
        // Ganti kode ini sesuai dengan logika bisnis Anda
        $types = PropertyType::latest()->get();
        return view('backend.type.all_type', compact('types'));
    }

    public function AddType()
    {
        return view('backend.type.add_type');
    }
    public function StoreType(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);
        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);
        $notification = array(
            'message' => 'Property Type Added Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.type')->with($notification);
    } // End Method

    public function EditType($id)
    {
        $types = PropertyType::findOrFail($id);
        return view('backend.type.edit_type', compact('types'));
    }

    public function UpdateType(Request $request)
    {
        $pid = $request->id;
        PropertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);
        $notification = array(
            'message' => 'Property Type Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.type')->with($notification);
    }
}
