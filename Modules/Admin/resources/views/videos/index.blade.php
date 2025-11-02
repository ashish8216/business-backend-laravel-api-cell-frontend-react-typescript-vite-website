@extends('admin::home')
@section('app.name', 'Videos')
@push('meta')
@endpush
@section('content')



    @include('admin::includes/link')




    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    @if (session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <!-- /.card -->
                    <div class="card card-primary"><!-- panel panel-primary Starts -->
                        <div class="card-header"><!-- panel-heading Starts -->

                            <h3 class="card-title"><!-- panel-title Starts -->

                                <i class="nav-icon fas fa-video"></i> @yield('app.name')

                            </h3><!-- panel-title Ends -->

                        </div><!-- panel-heading Ends -->

                        <div class="card-body"><!-- panel-body Starts -->
                            <a href="{{ route('videos.create') }}" style="color:#ffffff;"> <button
                                    class="btn btn-primary"><i class="fa fa-plus"> </i></button></a>
                            <hr>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>video</th>
                                        <th>Title</th>
                                        <th>Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($videos as $blog)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                {!! $blog->video !!}
                                            </td>

                                            <td>{{ $blog->title }}</td>



                                            <td>
                                                <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#confirm-delete{{ $blog->id }}"><i class="fa fa-trash">
                                                    </i></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="confirm-delete{{ $blog->id }}"
                                                    role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete..</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('videos.destroy', $blog->id) }}"
                                                                    method="post">
                                                                    @csrf @method('DELETE')
                                                                    <button class="btn btn-danger">Yes</button>
                                                                </form>
                                                                <button class="btn btn-primary"
                                                                    data-dismiss="modal">No</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>video</th>
                                        <th>Title</th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "ordering": true,
                "info": true,
                "paging": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
