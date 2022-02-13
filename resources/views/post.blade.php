@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post</div>
                <div class="card-body">
                    <form method="POST" action="/news">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Title</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="title" value="{{ old('title') }}" required  autofocus>                              
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="description" required >                              
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Source</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="source" required >                                
                            </div>
                        </div>                      
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Tag') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="number" class="form-control" name="tag_id[]" required >                                
                            </div>
                        </div>                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
