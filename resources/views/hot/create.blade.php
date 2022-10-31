@extends('template.main')

@section('container')
<form action="/hot-work-premit" method="POST">
    @csrf
<div class="page-header">
    <h3 class="page-title"> Add Hot Work Permit </h3>
    <div >
      <a href="/hot-work-premit" class="btn btn-gradient-danger btn-icon-text btn-md">Cancel</a>
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
                            <input type="hidden" id="kode" name="kode" value="{{ $kode }}">
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ref_id" id="ref_id" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Job</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="job" id="job" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Attached with PTW No</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="attached_ptw_no" id="attached_ptw_no" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Contractor</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="contractor" id="contractor" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="location" id="location" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Brief Description of Work To Be Done</label>
                    <textarea class="form-control" id="brief_description" name="brief_description" rows="4" required></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Equipment Check</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="">Fire Exstinguisher, hydrant within 10m</label>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="fire_exs" id="fire_exs" value="yes" required> Yes </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="fire_exs" id="fire_exs" value="no" required> No </label>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="">Welding screening to protcr eyes of people near by and to prevent hot debris spouting out</label>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="welding" id="welding" value="yes"required> Yes </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="welding" id="welding" value="no"required> No </label>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0)" class="btn btn-gradient-primary btn-icon-text btn-sm mb-2" onClick="add()">
              <i class="mdi mdi-plus-box btn-icon-prepend"></i> Add </a>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="check-equipment">
                    <thead>
                      <tr>
                        <th> Action </th>
                        <th> Equipment </th>
                        <th> Inspection No </th>
                        <th> Inspected By </th>
                        <th> Inspection Date </th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
          </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Working Area Check & Clearance</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="">Flammable materials around, underneath. Already cleared, isolated ?</label>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="wacc_flammable" required id="wacc_flammable" value="yes"> Yes </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="wacc_flammable" required id="wacc_flammable" value="no"> No </label>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="">Combustible materials around, underneath. Already cleared, isolated ?</label>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="wacc_combustible" required id="wacc_combustible" value="yes"> Yes </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="wacc_combustible" required id="wacc_combustible" value="no"> No </label>
                        </div>
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
            <h6 class="card-title">Check Personel Participed</h6>
            <div class="row">
                <div class="form-group row">
                    <label class="">Does person who work feel unwell / problem with health check</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="cpp_problem_health" required id="cpp_problem_health" value="yes"> Yes </label>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="cpp_problem_health" required id="cpp_problem_health" value="no"> No </label>
                      </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="">Adequate PPEs. Eye protector, Face mask</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="cpp_adequote" required id="cpp_adequote" value="yes"> Yes </label>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="cpp_adequote" required id="cpp_adequote" value="no"> No </label>
                      </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="">Understand site emergency response procedure</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="cpp_understand_site" required id="cpp_understand_site" value="yes"> Yes </label>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="cpp_understand_site" required id="cpp_understand_site" value="no"> No </label>
                      </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="">Know how to use fire exstinguisher, water hose real</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="cpp_kextinguidsher" required id="cpp_kextinguidsher" value="yes"> Yes </label>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="cpp_kextinguidsher" required id="cpp_kextinguidsher" value="no"> No </label>
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
            <h6 class="card-title">Other Precaution</h6>
            <div class="row">
                <div class="form-group">
                    <textarea class="form-control" id="other_precaution" required name="other_precaution" rows="4"></textarea>
                </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Valid Period</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Form</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control" required name="vp_form" id="vp_form"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Issuer</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required name="issuer" id="issuer"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>To</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control" required name="vp_to" id="vp_to"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date & Time</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control" required name="vp_datetime" id="vp_datetime"/>
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
              <h6 class="card-title">Commitment</h6>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Acceptor</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" required name="c_acceptor" id="c_acceptor"/>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Date & Time</label>
                          <div class="col-sm-9">
                              <input type="datetime-local" required class="form-control" name="c_datetime" id="c_datetime"/>
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
          <h6 class="card-title">Stop Working (Specify Reason)</h6>
          <div class="row">
              <div class="form-group">
                  <textarea class="form-control" id="stop_working" required name="stop_working" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="">Stoped By</label>
                <input type="text" class="form-control" id="stoped_by" required name="stoped_by" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
          <div class="card-body">
              <h6 class="card-title">Handover</h6>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Acceptor</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" required name="h_acceptor" id="h_acceptor"/>
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Issuer</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required name="h_issuer" id="h_issuer"/>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Date & Time</label>
                        <div class="col-sm-9">
                            <input type="datetime-local" class="form-control" required name="h_acceptor_datetime" id="h_acceptor_datetime"/>
                        </div>
                      </div>

                      <div class="form-group">
                          <label>Date & Time</label>
                          <div class="col-sm-9">
                              <input type="datetime-local" class="form-control" required name="h_issuer_datetime" id="h_issuer_datetime"/>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>

</div>
</form>


<div class="modal fade" id="modalequipment" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
      </div>
      <div class="modal-body">
        <form class="add_equipment" id="add_equipment" name="add_equipment" action="javascript:void(0)" method="POST">
          <input type="hidden" name="id" id="id" >
          <input type="hidden" name="kode" id="kode" value="{{ $kode }}">
          <div class="form-group">
            <label for="exampleInputName1">Equipment</label>
            <input type="text" class="form-control" id="equipment" name="equipment" required />
          </div>
          <div class="form-group">
              <label for="exampleTextarea1">Inspection No</label>
              <input type="text" class="form-control" id="inspection_no" name="inspection_no" required />
          </div>
          <div class="form-group">
              <label for="exampleTextarea1">Inspected By</label>
              <input type="text" class="form-control" id="inspected_by" name="inspected_by" required />
          </div>
          <div class="form-group">
              <label for="exampleTextarea1">Inspection Date</label>
              <input type="date" class="form-control" id="inspection_date" name="inspection_date" required />
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="close">Close</button>
        <button type="submit" id="save-equipment" name="" class="btn btn-primary">Save</button>
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
      var table = $('#check-equipment').DataTable({
          // processing: true,
          serverSide: true,
          ajax: "{{ route('create-hot') }}",
          columns: [
              {data: 'action', name: 'action', orderable: false},
                  {data: 'equipment', name: 'equipment'},
                  {data: 'inspection_no', name: 'inspection_no'},
                  {data: 'inspected_by', name: 'inspected_by'},
                  {data: 'inspection_date', name: 'inspection_date'},
          ]
      });
  });
});


function add(){
  $('#add_equipment').trigger("reset");
  $('#exampleModalLabel').html("Add Equipment Check");
  $('#modalequipment').modal('show');
  $('#id').val('');
}

$("#close").click(function(){
  $("#modalequipment").modal('hide');
});

function editFunc(id){
  $.ajax({
    type:"POST",
    url: "{{ url('edit-equipment') }}",
    data: { id: id },
    dataType: 'json',
    success: function(res){
      $('#exampleModalLabel').html("Edit Equipment Check");
      $('#modalequipment').modal('show');
      $('#id').val(res.id);
      $('#equipment').val(res.equipment);
      $('#inspection_no').val(res.inspection_no);
      $('#inspected_by').val(res.inspected_by);
      $('#inspection_date').val(res.inspection_date);
    }
  });
}

function deleteFunc(id){
  if (confirm("Delete Equipment Check?") == true) {
    var id = id;
    // ajax
    $.ajax({
      type:"POST",
      url: "{{ url('delete-equipment') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        var oTable = $('#check-equipment').dataTable();
        oTable.fnDraw(false);
      }
    });
  }
}

$('#add_equipment').submit(function(e) {
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
    type:'POST',
    url: "{{ url('add-equipment')}}",
    data: formData,
    cache:false,
    contentType: false,
    processData: false,
    success: (data) => {
      $("#modalequipment").modal('hide');
      var oTable = $('#check-equipment').dataTable();
      oTable.fnDraw(false);
      $("#save-equipment").html('Submit');
      $("#save-equipment"). attr("disabled", false);
      },
    error: function(data){
    console.log(data);
    }
  });
});
</script>
@endpush