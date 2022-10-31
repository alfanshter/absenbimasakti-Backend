@extends('template.main')

@section('container')
<div class="page-header">
    <h3 class="page-title"> User Group & Access </h3>
    <a href="javascript:void(0)" class="btn btn-gradient-primary btn-icon-text btn-md" onClick="add()">
      <i class="mdi mdi-plus-box btn-icon-prepend"></i> Add </a>
</div>

<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
        @endif
        <div class="table-responsive">
          {{-- {{ $dataTable->table() }} --}}
        <table class="table table-striped table-bordered" id="user-group">
          <thead>
            <tr>
              <th> Action </th>
              <th> Group Name </th>
              <th> User Created </th>
              <th> Created Date </th>
              <th> User Updated </th>
              <th> Updated Date </th>
            </tr>
          </thead>
          <tbody></tbody>
          {{-- <tbody id="tbody">
            <tr>
                <td>1</td>
                <td class="py-1"> Herman Beck </td>
                <td>
                  </td>
                  <td> $ 77.99 </td>
                <td> May 15, 2015 </td>
                <td></td>
                <td>
                  <a class="btn btn-gradient-info btn-rounded btn-sm">
                    <i class="mdi mdi-pencil-box"></i>
                  </a>
                  <a class="btn btn-gradient-danger btn-rounded btn-sm">
                    <i class="mdi mdi-delete"></i>
                  </a>
                  </div>
                </td>
              </tr>
          </tbody> --}}
        </table>
      </div>
    </div>
</div>
  <!-- Modal -->
<div class="modal fade" id="modalGroup" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Group User</h5>
      </div>
      <div class="modal-body">
        <form class="add-group" id="add-group" name="add-group" action="javascript:void(0)" method="POST">
          <div class="form-group">
            <input type="hidden" name="id" id="id">
            <label for="exampleInputName1">Group Name</label>
            <input type="text" class="form-control" id="nama_grup" required name="nama_grup" placeholder="Group Name">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="close">Close</button>
        <button type="submit" id="btn-save" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection

@push('script')
{{-- <script src="{{ asset('/js/myjs.js') }}"></script> --}}
<script type="text/javascript">
  $(document).ready( function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $(document).ready(function() {
        var table = $('#user-group').DataTable({
            // processing: true,
            serverSide: true,
            ajax: "{{ route('user-group') }}",
            columns: [
                // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false},
                {data: 'nama_grup', name: 'nama_grup'},
                {data: 'user_created', name: 'user_created'},
                {data: 'created_at', name: 'created_at'},
                {data: 'user_update', name: 'user_updated'},
                {data: 'updated_at', name: 'updated_at'},
            ]
        });
    });
  });


  function add(){
    $('#add-group').trigger("reset");
    $('#exampleModalLabel').html("Add Group");
    $('#modalGroup').modal('show');
    $('#id').val('');
  }

  $("#close").click(function(){
    $("#modalGroup").modal('hide');
  });

  function editFunc(id){
    $.ajax({
      type:"POST",
      url: "{{ url('edit-group') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#exampleModalLabel').html("Edit Group Name");
        $('#modalGroup').modal('show');
        $('#id').val(res.id);
        $('#nama_grup').val(res.nama_grup);
      }
    });
  }

  function deleteFunc(id){
    if (confirm("Delete Group?") == true) {
      var id = id;
      // ajax
      $.ajax({
        type:"POST",
        url: "{{ url('delete-group') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
          var oTable = $('#user-group').dataTable();
          oTable.fnDraw(false);
        }
      });
    }
  }

  $('#add-group').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      type:'POST',
      url: "{{ url('user-group')}}",
      data: formData,
      cache:false,
      contentType: false,
      processData: false,
      success: (data) => {
        $("#modalGroup").modal('hide');
        var oTable = $('#user-group').dataTable();
        oTable.fnDraw(false);
        $("#btn-save").html('Submit');
        $("#btn-save"). attr("disabled", false);
        },
      error: function(data){
      console.log(data);
      }
    });
  });

</script>
@endpush