@extends('template.main')

@section('container')
<form action="/tes" method="POST">
    @csrf
<div class="page-header">
    <h3 class="page-title"> Add Job Safety Analysis </h3>
    <div >
        <a href="/job-safety-analysis" class="btn btn-gradient-danger btn-icon-text btn-md">Cancel</a>
        <button type="submit" class="btn btn-gradient-primary btn-icon-text btn-md">Save</button>
    </div>
</div>
<div class="row">
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
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value=""> Vest Jacket </label>
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
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Lain"> Lain - Lain (Other) </label>
                            <input type="text" class="form-control" name="cb_ppe[]" id="cb_ppe[]" value=""/>
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
            <button type="button" class="btn btn-gradient-primary btn-icon-text btn-sm" data-toggle="modal" data-target="#modalAar">
                <i class="mdi mdi-plus-box btn-icon-prepend"></i> Add </button>

            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="aar">
                    <thead>
                      <tr>
                        <th> Action </th>
                        <th> Date </th>
                        <th> Sequence Of Job Steps </th>
                        <th> Potensial Hazard & Risk </th>
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
          <form class="add_aar" id="add_aar" name="add_aar">
            @csrf
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
                <input type="date" class="form-control" id="pic" name="pic" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="close">Close</button>
          <button type="submit" id="save-aar" class="btn btn-primary">Save</button>
        </div>
      </form>
      </div>
    </div>
</div>




@endsection

@push('script')
{{-- <script>
    let notesStorage = localStorage.getItem("notes")
    ? JSON.parse(localStorage.getItem("notes"))
    : [];
    $('#add_aar').submit(function(e) {
        e.preventDefault();
        const date = document.getElementById("date").value;
        const sequence_of_job_step = document.getElementById("sequence_of_job_step").value;
        const potential_hazard = document.getElementById("potential_hazard").value;
        const reduce_potential = document.getElementById("reduce_potential").value;
        const pic = document.getElementById("pic").value;
        const myBlogs = {
        date : date,
        sequence_of_job_step : sequence_of_job_step,
        potential_hazard: potential_hazard,
        reduce_potential: reduce_potential,
        pic: pic
        };
        notesStorage.push(myBlogs);
        localStorage.setItem("notes", JSON.stringify(notesStorage));
        
})

</script> --}}
@endpush