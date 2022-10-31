@extends('template.main')

@section('container')
<form action="/job-safety-analysis" method="POST">
    @csrf
<div class="page-header">
    <h3 class="page-title"> Add Job Safety Analysis</h3>
    <div >
        <a href="/job-safety-analysis" class="btn btn-gradient-danger btn-icon-text btn-md">Cancel</a>
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
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ref_id" id="ref_id" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Job Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="job_title" id="job_title" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Team Work</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="team_work" id="team_work" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Work Location</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="work_location" id="work_location" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Number of Personal Working</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="number" id="number" required/>
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
                <h6 class="card-title">Critical Question</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="">Every One Capable to Work</label>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cqfp" id="cqfp" value="yes" required> Yes </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cqfp" id="cqfp" value="no"required> No </label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="">Potensi Tumpahan / Gas Release Telah Dicegah ?</label>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cqpt" id="cqpt" value="yes" required> Yes </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cqpt" id="cqpt" value="no" required> No </label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="">Worst Case Discussed</label>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cqwc" id="cqwc" value="yes" required> Yes </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cqwc" id="cqwc" value="no" required> No </label>
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
            <div class="table-responsive">
                <table class="table">
                    <thead style="background: #DA8CFF">
                        <tr>
                            <th>Sequence Of Job Steps</th>
                            <th>Potential Hazard & Risk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3">Mempersiapkan peralatn listrik (Membawa tangga kerja)</td>
                            <td>
                                1. (H) Jari tangan mengenai bagian yang tajam dan tangga <br>
                                (R) Jari tangan Luka dan bisa infeksi
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2. (H) Tangga membentur properti lain <br>
                                (R) Properti rusak
                            </td>
                        </tr>
                        <tr>
                            <td>
                                3. (H) Tangan mengenai orang lain <br>
                                (R) Cidera pada orang lain
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="3">Mematikan listrik dari pusat MCB dengan cara naik tangga</td>
                            <td>
                                1. (H) Orang tersetrum <br>
                                (R) Pingsan / Fatality
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2. (H) Orang terjatuh <br>
                                (R) Nyeri pinggang / Patah tulang / pingsan /Fatality
                            </td>
                        </tr>
                        <tr>
                            <td>
                                3. (H) Tomobol pada pusat MCB bisa dinyalakan orang lain <br>
                                (R) Pekerja yang memperbaiki listrik bisa tersengat dan pingsan atau
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">PPE will be use / wear on this job</h6>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Helmet Safety" > Helmet Safety </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"name="cb_ppe[]" id="cb_ppe[]" value="Safety Shoes"> Safety Shoes </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Safety Glasses"> Safety Glasses </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Cotton Glove"> Cotton Glove </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Rubber Glove"> Rubber Glove </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Leather Glove"> Leather Glove </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Vest Jacket"> Vest Jacket </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Safety Harness"> Safety Harness </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"name="cb_ppe[]" id="cb_ppe[]" value="Half Face Shield"> Half Face Shield </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Half Face Shield"> Half Face Shield </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Half Face Shield"> Half Face Shield </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Chemical Respirator"> Chemical Respirator </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Self Apparatus"> Self Apparatus </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Apron"> Apron </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Cover All / Tyvex / Tychem"> Cover All / Tyvex / Tychem </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"name="cb_ppe[]" id="cb_ppe[]" value="Eye shower"> Eye shower </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"name="cb_ppe[]" id="cb_ppe[]" value="APAR"> APAR (Fire Extinguisher) </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"name="cb_ppe[]" id="cb_ppe[]" value="Barricade Tape"> Barricade Tape / Safety line </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Lock Out Tag Out"> Lock Out Tag Out </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Ijin Kerja"> Ijin Kerja (Pengelasan / Contined Space)? (Permit to Work to Work(hot work, confined spuces)) </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Other"> Lain - Lain (Other) </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">After Action Review (AAR)</h6>
            <a href="javascript:void(0)" class="btn btn-gradient-primary btn-icon-text btn-sm mb-2" onClick="add()">
                <i class="mdi mdi-plus-box btn-icon-prepend"></i> Add </a>

            <div class="table-responsive">
                <input type="hidden" name="kode" id="kode" value="{{ $kode }}">
                <table class="table table-striped table-bordered" id="aar">
                    <thead>
                      <tr>
                        <th> Action </th>
                        <th> Date </th>
                        <th> Sequence Of Job Steps </th>
                        <th> Potensial Hazard & Risk </th>
                        <th> Reduce Potential</th>
                        <th> PIC </th>
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

<div class="modal fade" id="modalAar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Group User</h5>
        </div>
        <div class="modal-body">
          <form class="add_aar" id="add_aar" name="add_aar" action="javascript:void(0)" method="POST">
            <input type="hidden" name="id" id="id" >
            <input type="hidden" name="kode" id="kode" value="{{ $kode }}">
            <div class="form-group">
              <label for="exampleInputName1">Date</label>
              <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">Sequence of Job Steps</label>
                <textarea class="form-control" id="sequence_of_job_step" name="sequence_of_job_step" rows="4"required></textarea>
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">Potential Hazard & Risk</label>
                <textarea class="form-control" id="potential_hazard" name="potential_hazard" rows="4"required></textarea>
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">How To Reduce Potential Hazard & Risk</label>
                <textarea class="form-control" id="reduce_potential" name="reduce_potential" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputName1">PIC</label>
                <input type="text" class="form-control" id="pic" name="pic" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="close">Close</button>
          <button type="submit" id="save-aar" name="" class="btn btn-primary">Save</button>
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
        var table = $('#aar').DataTable({
            // processing: true,
            serverSide: true,
            ajax: "{{ route('create-job') }}",
            columns: [
                {data: 'action', name: 'action', orderable: false},
                {data: 'date', name: 'date'},
                {data: 'sequence_of_job_step', name: 'sequence_of_job_step'},
                {data: 'potential_hazard', name: 'potential_hazard'},
                {data: 'reduce_potential', name: 'reduce_potential'},
                {data: 'pic', name: 'pic'},
            ]
        });
    });
});


function add(){
    $('#add_aar').trigger("reset");
    $('#exampleModalLabel').html("Add AAR");
    $('#modalAar').modal('show');
    $('#id').val('');
}

  $("#close").click(function(){
    $("#modalAar").modal('hide');
  });

  function editFunc(id){
    $.ajax({
      type:"POST",
      url: "{{ url('edit-aar') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#exampleModalLabel').html("Edit AAR");
        $('#modalAar').modal('show');
        $('#id').val(res.id);
        $('#date').val(res.date);
        $('#sequence_of_job_step').val(res.sequence_of_job_step);
        $('#potential_hazard').val(res.potential_hazard);
        $('#reduce_potential').val(res.reduce_potential);
        $('#pic').val(res.pic);
      }
    });
  }

  function deleteFunc(id){
    if (confirm("Delete AAR?") == true) {
      var id = id;
      // ajax
      $.ajax({
        type:"POST",
        url: "{{ url('delete-aar') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
          var oTable = $('#aar').dataTable();
          oTable.fnDraw(false);
        }
      });
    }
  }

  $('#add_aar').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      type:'POST',
      url: "{{ url('add-aar')}}",
      data: formData,
      cache:false,
      contentType: false,
      processData: false,
      success: (data) => {
        $("#modalAar").modal('hide');
        var oTable = $('#aar').dataTable();
        oTable.fnDraw(false);
        $("#save-aar").html('Submit');
        $("#save-aar"). attr("disabled", false);
        },
      error: function(data){
      console.log(data);
      }
    });
  });
</script>
@endpush