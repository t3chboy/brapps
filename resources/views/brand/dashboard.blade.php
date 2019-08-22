@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="col-md-4">
      <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document" id="movie_form_modal">
        <div class="modal-content">
            
            <div class="modal-body p-0">
                
                    
<div class="card bg-secondary shadow border-0">
    <div class="card-body px-lg-5 py-lg-5">
        <div class="text-center text-muted mb-4">
            <small>Add New Opportunity</small>
        </div>
        <div class="alert alert-warning fade show collapse" style="display:none;" id="error_alert" role="alert">
            <span class="alert-inner--icon"><i class="ni"></i></span>
            <button type="button" class="close" data-hide="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
                <span class="alert-inner--text" id="movie_form_error_msg"></span>
        </div>
        <div class="alert alert-success fade show collapse" style="display:none;" id="success_alert" role="alert">
            <span class="alert-inner--icon"><i class="ni"></i></span>
            <button type="button" class="close" data-hide="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
                <span class="alert-inner--text" id="movie_form_success_msg"></span>
        </div>
    </div>
</div>    
</div>      
</div>
</div>
</div>
</div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Movies/Series Records</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush" id="brand_datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Type</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Release Date</th>
                                    <th scope="col">Star cast</th>
                                    <th scope="col">More Details</th>
                                    <th scope="col">Meetings</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
    
<script type="text/javascript">
    var base_url = {!! json_encode(url('/')) !!}
</script>
@push('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src=" https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js "></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('argon') }}/js/brand.js"></script>
@endpush