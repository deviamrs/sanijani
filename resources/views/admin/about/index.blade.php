@section('title' , 'About -- Listing' )


@extends('layouts.app')

@section('content')

<div class="row">
    <!-- Datatables -->

    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">

                @if ($abouts->count() > 0)
                <div class="d-flex justify-content-end">
                    <a href="{{ route('about.create') }}" class="btn btn-primary"><i class="fas fa-pen"></i> Add
                        about</a>
                </div>
                @endif

            </div>


            @if ($abouts->count() > 0)
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover mb-5" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>Sr.No.</th>
                            <th>About Heading</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Action</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    {{-- <tfoot>
             <tr>
               <th>Name</th>
               <th>Category Count</th>
               <th>Action</th>    
               <th>Action</th>    
             </tr>
           </tfoot> --}}
                    <tbody>
                        @foreach ($abouts as $key=>$about)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                {{ $about->about_heading  }}
                            </td>
                            <td>
                                @if ($about->status)
                                <span class="btn btn-sm badge-success">Active</span>
                                @else
                                <span class="btn btn-sm badge-secondary">Not Active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('about.edit' , $about->id) }}"
                                    class="btn btn-primary btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal"
                                    data-target="#delted-modal-{{$key+1}}" @if ($about->id == 3)
                                    disabled
                                    @endif>
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Delete</span>
                                </button>
                                <div class="modal fade" id="delted-modal-{{$key+1}}" tabindex="-1" role="dialog"
                                    aria-labelledby="delted-modal-{{$key+1}}-Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="delted-modal-{{$key+1}}-Label">Are You Sure
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you Sure Want to Delete This SEction ,
                                                This Will Delete the Post Permanently , <br> <br> The Post Is <br>
                                                {{$about->about_heading}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-icon-split btn-sm"
                                                    data-dismiss="modal"><span class="icon text-white-50">
                                                        <i class="fas fa-times-circle"></i>
                                                    </span>
                                                    <span class="text">Close</span></button>
                                                <form action="{{ route('about.destroy' , $about->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-icon-split btn-sm"><span
                                                            class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span class="text">Delete</span></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $about->created_at->diffForHumans() }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else


            @include('includes.nodata', ['data' => "Sorry 0 about Found" , 'route_name' => 'about'])


            @endif
        </div>
    </div>
</div>




@endsection


@section('custom_JS')
<script src="{{asset('public/adminDesign/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/adminDesign/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>
@endsection