@extends('template.main')

@section('container')
<form action="/internal-purchase-requestion" method="POST">
    @csrf
<div class="page-header">
    <h3 class="page-title"> Add Internal Purchase Requestion </h3>
    <div >
        <a href="/internal-purchase-requestion" class="btn btn-gradient-danger btn-icon-text btn-md">Cancel</a>
        <button type="submit" name="save" id="save" class="btn btn-gradient-primary btn-icon-text btn-md">Save</button>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ref ID</label>
                            <input type="hidden" name="kode" id="kode" value="{{ $kode }}">
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ref_id" id="ref_id" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Requestioned By</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="requestioned_by" id="requestioned_by"required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="date" id="date"required/>
                            </div>
                        </div>
                        <div class="form-group">
                          <label>Department</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" name="department" id="department"required/>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Position</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="position" id="position"required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Project Location</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="project_location" id="project_location"required/>
                            </div>
                        </div>
                        <div class="form-group">
                          <label>Completed Address</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" name="completed_address" id="completed_address"required/>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Detail Internal Purchase Requestion</h6>
          <a href="javascript:void(0)" class="btn btn-gradient-primary btn-icon-text btn-sm mb-2" onClick="add()">
              <i class="mdi mdi-plus-box btn-icon-prepend"></i> Add </a>

          <div class="table-responsive">
              <table class="table table-striped table-bordered" id="detail">
                  <thead>
                    <tr>
                      <th> Action </th>
                      <th> Quantity </th>
                      <th> Catalog </th>
                      <th> Description </th>
                      <th> Size </th>
                      <th> Unit Price </th>
                      <th> Amout </th>
                    </tr>
                  </thead>
                  <tbody></tbody>
              </table>
          </div>
        </div>
      </div>
  </div>

</div>
</form>

<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add</h5>
        </div>
        <div class="modal-body">
          <form class="add_detail" id="add_detail" name="add_detail" action="javascript:void(0)" method="POST">
            <input type="hidden" name="id" id="id" >
            <input type="hidden" name="kode" id="kode" value="{{ $kode }}">
            <div class="form-group">
              <label for="exampleInputName1">Quantity</label>
              <input type="number" class="form-control" id="quantity" name="quantity" required />
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">Catalog</label>
                <input type="text" class="form-control" id="catalog" name="catalog" required />
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">Description</label>
                <input type="text" class="form-control" id="description" name="description" required />
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">Size</label>
                <input type="text" class="form-control" id="size" name="size" required />
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Unit Price</label>
                <input type="text" class="form-control" id="unit_price" name="unit_price" required />
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" required />
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="close">Close</button>
          <button type="submit" id="save-detail" name="" class="btn btn-primary">Save</button>
        </div>
      </form>
      </div>
    </div>
</div>


@endsection

@push('script')
<script>
$(document).ready( function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $(document).ready(function() {
        var table = $('#detail').DataTable({
            // processing: true,
            serverSide: true,
            ajax: "{{ route('create-internal') }}",
            columns: [
                {data: 'action', name: 'action', orderable: false},
                    {data: 'quantity', name: 'quantity'},
                    {data: 'catalog', name: 'catalog'},
                    {data: 'description', name: 'description'},
                    {data: 'size', name: 'size'},
                    {data: 'unit_price', name: 'unit_price'},
                    {data: 'amount', name: 'amount'},
            ]
        });
    });
});


function add(){
    $('#add_detail').trigger("reset");
    $('#exampleModalLabel').html("Add detail");
    $('#modaldetail').modal('show');
    $('#id').val('');
}

  $("#close").click(function(){
    $("#modaldetail").modal('hide');
  });

  function editFunc(id){
    $.ajax({
      type:"POST",
      url: "{{ url('edit-detail') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#exampleModalLabel').html("Edit Detail Internal Purchase Requestion");
        $('#modaldetail').modal('show');
        $('#id').val(res.id);
        $('#date').val(res.date);
        $('#quantity').val(res.quantity);
        $('#catalog').val(res.catalog);
        $('#description').val(res.description);
        $('#size').val(res.size);
        $('#unit_price').val(res.unit_price);
        $('#amount').val(res.amount);
      }
    });
  }

  function deleteFunc(id){
    if (confirm("Delete Detail Internal Purchase Requestion?") == true) {
      var id = id;
      // ajax
      $.ajax({
        type:"POST",
        url: "{{ url('delete-detail') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
          var oTable = $('#detail').dataTable();
          oTable.fnDraw(false);
        }
      });
    }
  }

  $('#add_detail').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      type:'POST',
      url: "{{ url('add-detail')}}",
      data: formData,
      cache:false,
      contentType: false,
      processData: false,
      success: (data) => {
        $("#modaldetail").modal('hide');
        var oTable = $('#detail').dataTable();
        oTable.fnDraw(false);
        $("#save-detail").html('Submit');
        $("#save-detail"). attr("disabled", false);
        },
      error: function(data){
      console.log(data);
      }
    });
  });
</script>
@endpush