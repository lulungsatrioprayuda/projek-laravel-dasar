@extends('layouts.master')
@section('title', 'Halaman Add')
@section('subtitle', 'Add')
@section('content')
        <div class="section-body">
            <h2 class="section-title">Add</h2>
            <p class="section-lead">
                Ini halaman untuk menambah data
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a href="/crud" class="btn btn-icon icon-left btn-dark mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
                
                    <div class="card">
                        <div class="card-header">
                        <h4>HTML5 Form Basic</h4>
                        </div>
                        <div class="card-body">
                        <div class="alert alert-info">
                            <b>Note!</b> Not all browsers support HTML5 type input.
                        </div>
                        <div class="form-group">
                            <label>Text</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Select</label>
                            <select class="form-control">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Multiple</label>
                            <select class="form-control" multiple="" data-height="100%" style="height: 100%;">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Textarea</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="d-block">Checkbox</label>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Checkbox 1
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="defaultCheck3">
                            <label class="form-check-label" for="defaultCheck3">
                                Checkbox 2
                            </label>
                            </div>
                        </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection