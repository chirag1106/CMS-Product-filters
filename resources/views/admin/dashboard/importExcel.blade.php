@extends('app')
@section('title', 'Import Product List')
@section('import-excel')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 mx-auto my-5">
                <div class="card">
                    <div class="card-header bgsize-primary-4 white card-header">
                        <h4 class="card-title mb-0">Import Products Excel Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('upload') }}" method="post" enctype="multipart/form-data" class='excel-form'>
                            @csrf
                            <fieldset>
                                <label>Select File to Upload
                                    <small class="warning text-muted">
                                        {{ __('Please upload only Excel (.csv) files') }}
                                    </small>
                                </label>

                                <div class="input-group">
                                    <input type="file" required class="form-control" name="uploaded_file"
                                        id="uploaded_file" accept=".csv">
                                    <div class="input-group-append" id="button-addon2">
                                        <button class="btn btn-primary submit_btn" type="submit">
                                            Upload
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group" id="process" style="display:none;">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar"
                                            aria-valuemin="0" aria-valuemax="100">

                                        </div>
                                    </div>
                                </div>
                                <p class="text-right mb-0">
                                    <small class="text-danger" id="file-error">

                                    </small>
                                </p>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
