@extends('layouts.backend.app')

@section('title', 'Tags')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{asset('assests/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <h2>
               <a class="btn btn-primary" href="{{route('admin.tag.create')}}">CREATE NEW TAG</a>
            </h2>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            SHOW ALL TAGS
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">

                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>S/L</th>
                                    <th>Tag Name</th>
                                    <th>Created at</th>
                                    <th>Update at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>S/L</th>
                                    <th>Tag Name</th>
                                    <th>Created at</th>
                                    <th>Update at</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($tags as $i=>$tag)
                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{{$tag->tag_name}}</td>
                                        <td>{{$tag->created_at}}</td>
                                        <td>{{$tag->updated_at}}</td>
                                        <td>
                                            <a href="{{route('admin.tag.edit',$tag->id)}}" class="btn btn-primary" style="float:left; margin-right: 5px; margin-bottom: 5px;">Edit</a>

                                            {{--<a class="btn btn-primary"--}}
                                               {{--onclick="document.getElementById('tagForm').submit();">--}}
                                                {{--Delete--}}
                                            {{--</a>--}}

                                            {{--<form id="tagForm" action="{{ route('admin.tag.destroy',$tag->id) }}" method="POST" style="display: none;">--}}
                                                {{--@csrf--}}
                                                {{--@method('DELETE')--}}
                                            {{--</form>--}}

                                            <form action="{{ route('admin.tag.destroy',$tag->id) }}" method="POST" style="float:left;">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure? You want to delete this tag?')" class="btn btn-primary">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>

@endsection

@push('js')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('assests/backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assests/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('assests/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assests/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assests/backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('assests/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('assests/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('assests/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assests/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <script src="{{asset('assests/backend/js/pages/tables/jquery-datatable.js')}}"></script>
@endpush
