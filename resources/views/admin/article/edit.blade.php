@extends('layouts.backend.app')

@section('title', 'Tags')

@push('css')
    <link href="{{asset('assests/backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush

@section('content')

    <div class="container-fluid">

        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <form method="post" action="{{route('admin.article.update',$article->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    TITLE AND IMAGE FIELD
                                    <small>article/create</small>
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

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="title" id="category" class="form-control"  value="{{$article->title}}">
                                        <label class="form-label">Enter Post Title</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <input type="file" name="image">
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="image_title" id="imageTitle" class="form-control" value="{{$article->image_title}}">
                                        <label class="form-label">Enter Image Title</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="checkbox" name="status" id="publish" {{$article==true?'checked':''}} class="filled-in" value="1">
                                    <label for="publish">Publish</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    SELECT CATEGORY AND TAG
                                </h2>

                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                        <p>
                                            <b>Select Categories</b>
                                        </p>
                                        <select name="category" class="form-control show-tick" data-live-search="true">
                                            @foreach($cat as $value)
                                                <option {{$value->id == $article->category_id?'selected':''}} value="{{$value->id}}">{{$value->category_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                        <p>
                                            <b>Select Tags</b>
                                        </p>
                                        <select name="tags[]" class="form-control show-tick" data-live-search="true" multiple>
                                            @foreach($tag as $value)
                                                @foreach($article->tags as $val)
                                                    <option {{$value->tag_name == $val->tag_name?'selected':''}} value="{{$value->id}}">{{$value->tag_name}}</option>
                                                @endforeach
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                                        <a href="{{route('admin.article.index')}}" class="btn btn-warning m-t-15 waves-effect">BACK</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    SUB TITLE FIELD
                                </h2>
                            </div>
                            <div class="body">
                            <textarea class="form-control" rows="5" name="subtitle">
                                {{$article->subtitle}}
                            </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    BODY FIELD
                                </h2>
                            </div>
                            <div class="body">
                            <textarea id="tinymce" name="body">
                                {{$article->body}}
                            </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Vertical Layout | With Floating Label -->

    </div>

@endsection


@push('js')
    <script src="{{asset('assests/backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('assests/backend/plugins/tinymce/tinymce.js')}}"></script>
    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('assests/backend/plugins/tinymce')}}';
        });
    </script>
@endpush
