$(document).ready( function () {
   $.ajaxSetup({
   headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
   });
   $('#user-group').DataTable({
   processing: true,
   serverSide: true,
   ajax: "{{ url('/user-group') }}",
   columns: [
   { data: 'nama_grup', name: 'nama_grup' },
   { data: 'user_created', name: 'user_created' },
   { data: 'updated_at', name: 'updated_at' },
   { data: 'user_update', name: 'user_update' },
   { data: 'created_at', name: 'created_at' },
   {data: 'action', name: 'action', orderable: false},
   ],
   order: [[0, 'desc']]
   });
   });