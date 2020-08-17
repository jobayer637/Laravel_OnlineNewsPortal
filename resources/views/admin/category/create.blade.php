@extends('layouts.backend.app')

@section('title', 'Tags')

@push('css')

@endpush

@section('content')

    <div class="container-fluid">

        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            CREATE NEW CATEGORY
                            <small>category/create</small>
                        </h2>

                    </div>
                    <div class="body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                    <strong>Opps Sorry!</strong> {{$error}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endforeach
                        @endif
                        <form method="post" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="category_name" id="category" class="form-control">
                                    <label class="form-label">Enter Category Name</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <input type="file" name="image">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SAVE</button>
                            <a href="{{route('admin.category.index')}}" class="btn btn-warning m-t-15 waves-effect">BACK</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertical Layout | With Floating Label -->

    </div>

@endsection


@push('js')

@endpush
