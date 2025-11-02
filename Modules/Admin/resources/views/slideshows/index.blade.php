@extends('admin::home')
 @section('app.name','Slideshows')
@push('meta')

@endpush
@section('content')



    @include("admin::includes/link")




    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
            <!-- /.card -->
<div class="card card-primary" ><!-- panel panel-primary Starts -->
<div class="card-header" ><!-- panel-heading Starts -->

<h3 class="card-title" ><!-- panel-title Starts -->

 <i class="nav-icon fas fa-image"></i> @yield('app.name')

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="card-body" ><!-- panel-body Starts -->

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                 <tr>
<th>S.N.</th>
<th>Image</th>
<th>Title</th>
<th>Action</th>


</tr>
                  </thead>
                  <tbody>
 @php
  $i=1;
  @endphp
@foreach ($slideshows as $slideshow)
<tr>
    <td>{{$i++}}</td>
    <td><div style="height:50px;display: flex;width: 100%;">
        <img src="{{$slideshow->content['image']}}"  style="height: auto;margin: 0 auto; max-height: 100%;max-width: 100%;width: auto;">
        </div>
</td>
    <td>{{$slideshow->content['title']}}</td>

  <td><button class="btn btn-warning" onclick="edit{{$slideshow->id}}()"><i class="fa fa-pencil-alt"> </i></button>
<script type="text/javascript">function edit{{$slideshow->id}}(){ window.open('{{ route('slideshows.edit',$slideshow->id) }}', '_self'); };</script>

</td>
</tr>
@endforeach
</tbody>
                  <tfoot>
                 <tr>
<th>S.N.</th>
<th>Image</th>
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
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@push('scripts')
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,"ordering": true,
      "info": true,"paging": true,
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
