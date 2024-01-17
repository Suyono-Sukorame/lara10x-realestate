@extends('admin.admin_dashboard')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">

        <div class="row profile-body">
            <!-- left wrapper start -->
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Property Type</h6>

                            <form method="POST" action="{{ route('store.type') }}" class="forms-sample">
                                @csrf

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Type Name</label>
                                    <input type="type_name" name="type_name"
                                        class="form-control @error('type_name') is-invalid @enderror">
                                    @error('type_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Type Icon</label>
                                    <input type="type_icon" name="type_icon"
                                        class="form-control @error('type_icon') is-invalid @enderror">
                                    @error('type_icon')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>



                                <button type="submit" class="btn btn-primary me-2">Save Chages</button>

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
