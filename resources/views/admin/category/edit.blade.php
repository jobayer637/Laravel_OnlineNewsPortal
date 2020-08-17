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
                            UPDATE CATEGORY
                            <small>category/update</small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
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
                        <form method="post" action="{{route('admin.category.update',$category->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="category_name" id="category" class="form-control" value="{{$category->category_name}}">
                                    <label class="form-label">Enter Category Name</label>
                                </div>
                            </div>

                           <div class="row">
                               <div class="col-sm-6 col-md-6 col-xl-6">
                                   <div class="form-group form-float">
                                       <input type="file" name="image">
                                   </div>
                               </div>
                               <div class="col-sm-6 col-md-6 col-xl-6">
                                   <img class="img-responsive" src="http://localhost:8000/storage/category/{{$category->image}}" alt="image" height="140px" width="200px" style="float:right;">
                               </div>
                           </div>

                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
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
