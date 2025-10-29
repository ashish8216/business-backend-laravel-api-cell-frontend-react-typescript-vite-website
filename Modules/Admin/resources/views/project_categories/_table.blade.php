 <table id="example1" class="table table-bordered table-striped">
     <thead>
         <tr>
             <th>S.N.</th>
             <th>Name</th>
             <th>Slug</th>
             <th>Action</th>


         </tr>
     </thead>
     <tbody>
         @php
             $i = 1;
         @endphp
         @foreach ($project_categories as $data)
             <tr>
                 <td>{{ $i++ }}</td>

                 <td>{{ $data->name }}</td>
                 <td>{{ $data->slug }}</td>

                 <td>

                     <button class="btn btn-warning" onclick="edit{{ $data->id }}()"><i class="fa fa-pencil-alt"> </i>
                     </button>


                     <script type="text/javascript">
                         function edit{{ $data->id }}() {
                             window.open('{{ route('project_categories.edit', $data->id) }}', '_self');
                         };
                     </script>


                 </td>
             </tr>
         @endforeach
     </tbody>
     <tfoot>
         <tr>
             <th>S.N.</th>

             <th>Name</th>
             <th>Slug</th>

             <th>Action</th>

         </tr>
     </tfoot>
 </table>
