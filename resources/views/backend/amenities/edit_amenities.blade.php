@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">

        <div class="row profile-body">
            <!-- left wrapper start -->
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Edit Amenities</h6>

                            <form method="POST" action="{{ route('update.amenitie') }}" class="forms-sample">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="id" value="{{ $amenities->id }}">

                                <div class="form-group mb-3">
                                    <label for="amenities_name" class="form-label">Amenities Name</label>
                                    <input type="text" name="amenities_name" class="form-control"
                                        value="{{ $amenities->amenities_name }}">
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Update Changes</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->

            <!-- right wrapper end -->
        </div>
    </div>
@endsection
