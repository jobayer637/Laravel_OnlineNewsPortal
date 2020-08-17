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
                           UPDATE TAG NAME
                            <small>{{$tag->tag_name}}</small>
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
                        <form method="post" action="{{route('admin.tag.update',$tag->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="tag_name" id="tag" class="form-control" value="{{$tag->tag_name}}">
                                    <label class="form-label">Update Tag Name</label>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                            <a href="{{route('admin.tag.index')}}" class="btn btn-warning m-t-15 waves-effect">BACK</a>
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
