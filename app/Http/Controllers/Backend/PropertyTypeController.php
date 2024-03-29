<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Amenities;

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

    public function DeleteType($id)
    {
        try {
            PropertyType::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Property Type Deleted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } catch (\Exception $e) {
            // Tangkap kesalahan jika terjadi
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    ////  Aminities All Methods ////

    public function AllAmenitie()
    {
        // Ganti kode ini sesuai dengan logika bisnis Anda
        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_amenities', compact('amenities'));
    }
    public function AddAmenitie()
    {
        $amenities = Amenities::latest()->get();
        return view('backend.amenities.add_amenities', compact('amenities'));
    }

    public function StoreAmenitie(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'amenities_name' => 'required|unique:amenities|max:200',
        ]);

        Amenities::insert([
            'amenities_name' => $request->amenities_name,
        ]);

        $notification = [
            'message' => 'Amenities Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.amenitie')->with($notification);
    }
    public function EditAmenitie($id)
    {
        $amenities = Amenities::findOrFail($id);
        return view('backend.amenities.edit_amenities', compact('amenities'));
    }

    public function UpdateAmenitie(Request $request)
    {
        $validated = $request->validate([
            'amenities_name' => 'required|unique:amenities|max:200',
        ]);

        $amenity = Amenities::findOrFail($request->id);
        $amenity->update([
            'amenities_name' => $request->amenities_name,
        ]);

        $notification = [
            'message' => 'Amenities Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.amenitie')->with($notification);
    }

    public function DeleteAmenitie($id)
    {
        try {
            Amenities::findOrFail($id)->delete();
            $notification = [
                'message' => 'Amenities Deleted Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
