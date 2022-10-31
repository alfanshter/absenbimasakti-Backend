@extends('template.main')

@section('container')
<form action="/update/job-safety-analysis" method="POST">
    @csrf
    <input type="hidden" id="kode" name="kode" value="{{ $job->kode }}">
<div class="page-header">
    <h3 class="page-title"> Edit Job Analysis</h3>
    <div >
        <a href="/job-safety-analysis" class="btn btn-gradient-danger btn-icon-text btn-md">Cancel</a>
        <button type="submit" name="save" id="save" class="btn btn-gradient-primary btn-icon-text btn-md">Save</button>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">After Action Review (AAR)</h6>
            <button type="button" class="btn btn-gradient-primary btn-icon-text btn-sm mb-2" data-toggle="modal" data-target="#modalAar"><i class="mdi mdi-plus-box btn-icon-prepend"></i> Add </button>
            <div class="table-responsive">
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
                    <tbody>
                        @foreach ($aar as $data )     
                       <tr>
                            <td>
                                <div class="btn-group">
                                    <form action="/delete/aar/{{$data->id}}" method="post">
                                      @csrf
                                      <button class="btn btn-gradient-danger btn-outline-secondary btn-sm " onclick="return confirm('Apakah anda menyetujui ?')" >
                                      <i class="mdi mdi-delete"></i>
                                      </button>
                                    </form>
                                    <button type="button" id='aarid' data-editid="{{ $data->id }}" data-editkode="{{ $data->kode }}" data-editdate ="{{ $data->date }}" data-editsequence_of_job_step = "{{ $data->sequence_of_job_step }}" data-editpotential_hazard="{{ $data->potential_hazard }}" data-editreduce_potential="{{ $data->reduce_potential }}" data-editpic={{ $data->pic }} class="btn btn-gradient-info btn-outline-secondary btn-sm" data-toggle="modal" data-target="#modalEditAar">
                                      <i class="mdi mdi-pencil-box"></i>
                                    </button>
                                    
                                </div>
                            </td>
                            <td>{{ $data->date }}</td>
                            <td>{{ $data->sequence_of_job_step }}</td>
                            <td>{{ $data->potential_hazard }}</td>
                            <td> {{ $data->reduce_potential }}</td>
                            <td>{{ $data->pic }}</td>
                       </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" id="id" name="id" value="{{ $job->id }}">
                        <div class="form-group">
                            <label>Ref ID</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ref_id" id="ref_id" value="{{ old('ref_id') ?? $job->ref_id }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Job Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="job_title" id="job_title" value="{{ $job->job_title }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Team Work</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="team_work" id="team_work" value="{{ $job->team_work }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Work Location</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="work_location" id="work_location" value="{{ $job->work_location }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Number of Personal Working</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="number" id="number" value="{{ $job->number_personal_working }}"/>
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
                                <input type="radio" class="form-check-input" name="cqfp" id="cqfp" value="yes" {{ $job->every_one_capable_to_work == "yes" ? 'checked' : '' }}> Yes </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cqfp" id="cqfp" value="no" {{ $job->every_one_capable_to_work == "no" ? 'checked' : '' }}> No </label>
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
                                <input type="radio" class="form-check-input" name="cqpt" id="cqpt" value="yes" {{ $job->potensi_tumpahan == "yes" ? 'checked' : '' }}> Yes </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cqpt" id="cqpt" value="no" {{ $job->potensi_tumpahan == "no" ? 'checked' : '' }}> No </label>
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
                                <input type="radio" class="form-check-input" name="cqwc" id="cqwc" value="yes" {{ $job->work_case == "yes" ? 'checked' : '' }}> Yes </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cqwc" id="cqwc" value="no" {{ $job->work_case == "no" ? 'checked' : '' }}> No </label>
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
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Helmet Safety" {{ in_array('Helmet Safety', $ppe) ? 'checked' : '' }}> Helmet Safety</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"name="cb_ppe[]" id="cb_ppe[]" value="Safety Shoes" {{ in_array('Safety Shoes', $ppe) ? 'checked' : '' }}>Safety Shoes </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Safety Glasses" {{ in_array('Safety Glasses', $ppe) ? 'checked' : '' }}>Safety Glasses </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Cotton Glove" {{ in_array('Cotton Glove', $ppe) ? 'checked' : '' }}> Cotton Glove </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Rubber Glove" {{ in_array('Rubber Glove', $ppe) ? 'checked' : '' }}> Rubber Glove </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Leather Glove" {{ in_array('Leather Glove', $ppe) ? 'checked' : '' }}> Leather Glove </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Vest Jacket" {{ in_array('Vest Jacket', $ppe) ? 'checked' : '' }}> Vest Jacket </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Safety Harness" {{ in_array('Safety Harness', $ppe) ? 'checked' : '' }}>Safety Harness </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"name="cb_ppe[]" id="cb_ppe[]" value="Half Face Shield" {{ in_array('Half Face Shield', $ppe) ? 'checked' : '' }}> Half Face Shield </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Google" {{ in_array('Google', $ppe) ? 'checked' : '' }}> Half Face Shield </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Dust Mask" {{ in_array('Dust Mask', $ppe) ? 'checked' : '' }}> Half Face Shield </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Chemical Respirator" {{ in_array('Chemical Respirator', $ppe) ? 'checked' : '' }}> Chemical Respirator </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Self Apparatus" {{ in_array('Self Apparatus', $ppe) ? 'checked' : '' }}> Self Apparatus </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Apron" {{ in_array('Apron', $ppe) ? 'checked' : '' }}> Apron </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Cover All / Tyvex / Tychem" {{ in_array('Cover All / Tyvex / Tychem', $ppe) ? 'checked' : '' }}> Cover All / Tyvex / Tychem </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"name="cb_ppe[]" id="cb_ppe[]" value="Eye shower" {{ in_array('Eye shower', $ppe) ? 'checked' : '' }}> Eye shower </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"name="cb_ppe[]" id="cb_ppe[]" value="APAR" {{ in_array('APAR', $ppe) ? 'checked' : '' }}> APAR (Fire Extinguisher) </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"name="cb_ppe[]" id="cb_ppe[]" value="Barricade Tape" {{ in_array('Barricade Tape', $ppe) ? 'checked' : '' }}> Barricade Tape / line </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Lock Out Tag Out" {{ in_array('Lock Out Tag Out', $ppe) ? 'checked' : '' }}> Lock Out Tag Out </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Ijin Kerja" {{ in_array('Ijin Kerja', $ppe) ? 'checked' : '' }}> Ijin Kerja (Pengelasan / Contined Space)? (Permit to Work to Work(hot work, confined spuces)) </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="cb_ppe[]" id="cb_ppe[]" value="Other"  {{ in_array('Other', $ppe) ? 'checked' : '' }}> Lain - Lain (Other) </label>
                        </div>
                    </div>
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
          <h5 class="modal-title" id="exampleModalLabel">Add AAR</h5>
        </div>
        <div class="modal-body">
          <form class="add_aar" id="add_aar" name="add_aar" action="/editadd-aar" method="POST">
            @csrf
            <input type="hidden" name="id" id="id" >
            <input type="hidden" name="kode" id="kode" value="{{ $job->kode }}">
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
<div class="modal fade" id="modalEditAar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit AAR</h5>
        </div>
        <div class="modal-body">
          <form class="edit_aar" id="edit_aar" name="edit_aar" action="/edit/update-aar" method="POST">
            @csrf
            <input type="hidden" name="editid" id="editid" >
            <input type="hidden" name="editkode" id="editkode">
            <div class="form-group">
              <label for="exampleInputName1">Date</label>
              <input type="date" class="form-control" id="editdate" name="editdate" required>
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">Sequence of Job Steps</label>
                <textarea class="form-control" id="editsequence_of_job_step" name="editsequence_of_job_step" rows="4"required></textarea>
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">Potential Hazard & Risk</label>
                <textarea class="form-control" id="editpotential_hazard" name="editpotential_hazard" rows="4"required></textarea>
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">How To Reduce Potential Hazard & Risk</label>
                <textarea class="form-control" id="editreduce_potential" name="editreduce_potential" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputName1">PIC</label>
                <input type="text" class="form-control" id="editpic" name="editpic" required>
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
    $(document).ready(function () {
    $('#aar').DataTable();
});

$('#modalEditAar').on('show.bs.modal', function (event) {
        // event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
        var button = $(event.relatedTarget)

        // data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing 
        var id         = button.data('editid')
        var kode         = button.data('editkode')
        var date    = button.data('editdate')
        var sequence_of_job_step        = button.data('editsequence_of_job_step')
        var potential_hazard        = button.data('editpotential_hazard')
        var reduce_potential        = button.data('editreduce_potential')
        var pic        = button.data('editpic')
        var modal = $(this)

        //variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
        modal.find('#editid').val(id)
        modal.find('#editkode').val(kode)
        modal.find('#editdate').val(date)
        modal.find('#editsequence_of_job_step').val(sequence_of_job_step)
        modal.find('#editpotential_hazard').val(potential_hazard)
        modal.find('#editreduce_potential').val(reduce_potential)
        modal.find('#editpic').val(pic)
    })
</script>
@endpush