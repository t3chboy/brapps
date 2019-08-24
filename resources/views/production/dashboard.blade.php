@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="col-md-4">
      <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-form">Add New Movie/Series</button>
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
        <form role="form" name="save_movie_form" id="save_movie_form">
            <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni"></i></span>
                    </div>
                    <select class="form-control custom-select" name="type">
                        <option value="" selected disabled>Select Type</option>
                        <option value="In_Film">In Film</option>
                        <option value="cobm">Cobranding with a Movie</option>
                        <option value="In_Series">In Series</option>
                        <option value="cobs">Cobranding with a Series</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni"></i></span>
                    </div>
                    <input class="form-control" name="title" placeholder="Title" type="text" value="abcd movie">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni"></i></span>
                    </div>
                    <input class="form-control" name="star_cast" placeholder="Key star cast" type="text" value="salman">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni"></i></span>
                    </div>
                    <input class="form-control" name="release_date" id="release_date" placeholder="Add Approx Release date" type="text" value="">
                </div>
            </div> 
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni"></i></span>
                    </div>
                      <textarea class="form-control form-control-alternative" rows="3" placeholder="Write Synopsis Here ..." name="synopsis">New salman movie</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni"></i></span>
                    </div>
                      <input class="form-control" name="trailer_link" placeholder="Teaser/Trailer Link" type="text" value="http://youtube.com">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-alternative">
                        <div class="custom-file">
                        <input type="file" class="custom-file-input"name="movie_image" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni"></i></span>
                    </div>
                      <input class="form-control" name="cost" placeholder="Association Cost" type="number" value="90000000.00">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" id="save_movie" class="btn btn-primary my-4">Save</button>
            </div>
        </form>
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
                        <table class="table align-items-center table-flush" id="production_datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Type</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Release Date</th>
                                    <th scope="col">Star cast</th>
                                    <th scope="col">View</th>
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

@include('common.movie_data_model')
    
<script type="text/javascript">
    var base_url = {!! json_encode(url('/')) !!}
</script>
@push('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src=" https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js "></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('argon') }}/js/production.js"></script>
@endpush