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

                            <h6 class="card-title">Tambahkan Fasilitas</h6>

                            <form method="POST" action="{{ route('store.amenitie') }}" class="forms-sample">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="amenities_name" class="form-label">Nama Fasilitas</label>
                                    <input type="text" name="amenities_name" class="form-control"
                                        value="{{ old('amenities_name') }}">
                                    @error('amenities_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>

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
