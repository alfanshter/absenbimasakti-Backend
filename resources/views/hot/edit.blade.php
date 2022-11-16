@extends('template.main')

@section('container')
<form action="/update/hot-work-premit" method="POST">
    @csrf
<div class="page-header">
    <h3 class="page-title"> Edit Hot Work Permit </h3>
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
                            <input type="hidden" id="id" name="id" value="{{ $hot->id }}">
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ref_id" id="ref_id" value="{{ $hot->ref_id }}" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Job</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="job" id="job" value="{{ $hot->job }}" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Attached with PTW No</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="attached_ptw_no" id="attached_ptw_no" value="{{ $hot->attached_ptw_no }}" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Contractor</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="contractor" id="contractor"value="{{ $hot->contractor }}" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="location" id="location"value="{{ $hot->location }}" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Brief Description of Work To Be Done</label>
                    <textarea class="form-control" id="brief_description" name="brief_description" rows="4" required>{{ $hot->brief_description }}</textarea>
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
                            <input type="radio" class="form-check-input" name="fire_exs" id="fire_exs" value="yes" required {{ $hot->fire_exs == "yes" ? 'checked' : '' }}> Yes </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="fire_exs" id="fire_exs" value="no" required {{ $hot->fire_exs == "no" ? 'checked' : '' }}> No </label>
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
                            <input type="radio" class="form-check-input" name="welding" id="welding" value="yes"required {{ $hot->welding == "yes" ? 'checked' : '' }}> Yes </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="welding" id="welding" value="no"required {{ $hot->welding == "no" ? 'checked' : '' }}> No </label>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-gradient-primary btn-icon-text btn-sm mb-2" data-toggle="modal" data-target="#modalequipment"><i class="mdi mdi-plus-box btn-icon-prepend"></i> Add </button>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="equipment">
                    <thead>
                      <tr>
                        <th> Action </th>
                        <th> Equipment </th>
                        <th> Inspection No </th>
                        <th> Inspected By </th>
                        <th> Inspection Date </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($equipment as $data )
                      <tr>
                        <td>
                          <div class="btn-group">
                            <form action="/delete/equipment/{{$data->id}}" method="post">
                              @csrf
                              <button class="btn btn-gradient-danger btn-outline-secondary btn-sm " onclick="return confirm('Apakah anda menyetujui ?')" >
                              <i class="mdi mdi-delete"></i>
                              </button>
                            </form>
                            <button type="button" id='equipmentid' data-editid ="{{ $data->id }}" data-editkode="{{ $data->kode }}" data-editequipment="{{ $data->equipment }}"
                              data-editinspectionno="{{ $data->inspection_no }}" data-editinspected="{{ $data->inspected_by }}" data-editinspectiondate="{{ $data->inspection_date }}"  class="btn btn-gradient-info btn-outline-secondary btn-sm" data-toggle="modal" data-target="#modalEditequipment">
                              <i class="mdi mdi-pencil-box"></i>
                            </button>
                        </div>
                        </td>
                        <td>{{ $data->equipment }}</td>
                        <td>{{ $data->inspection_no }}</td>
                        <td>{{ $data->inspected_by }}</td>
                        <td>{{ $data->inspection_date }}</td>
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
            <h6 class="card-title">Working Area Check & Clearance</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="">Flammable materials around, underneath. Already cleared, isolated ?</label>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="wacc_flammable" required id="wacc_flammable" value="yes"{{ $hot->wacc_flammable == "yes" ? 'checked' : '' }}> Yes </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="wacc_flammable" required id="wacc_flammable" value="no"{{ $hot->wacc_flammable == "no" ? 'checked' : '' }}> No </label>
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
                            <input type="radio" class="form-check-input" name="wacc_combustible" required id="wacc_combustible" value="yes"{{ $hot->wacc_combustible == "yes" ? 'checked' : '' }}> Yes </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="wacc_combustible" required id="wacc_combustible" value="no"{{ $hot->wacc_combustible == "no" ? 'checked' : '' }}> No </label>
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
                          <input type="radio" class="form-check-input" name="cpp_problem_health" required id="cpp_problem_health" value="yes"{{ $hot->cpp_problem_health == "yes" ? 'checked' : '' }}> Yes </label>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="cpp_problem_health" required id="cpp_problem_health" value="no"{{ $hot->cpp_problem_health == "no" ? 'checked' : '' }}> No </label>
                      </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="">Adequate PPEs. Eye protector, Face mask</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="cpp_adequote" required id="cpp_adequote" value="yes"{{ $hot->cpp_adequote == "yes" ? 'checked' : '' }}> Yes </label>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="cpp_adequote" required id="cpp_adequote" value="no"{{ $hot->cpp_adequote == "no" ? 'checked' : '' }}> No </label>
                      </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="">Understand site emergency response procedure</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="cpp_understand_site" required id="cpp_understand_site" value="yes"{{ $hot->cpp_understand_site == "yes" ? 'checked' : '' }}> Yes </label>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="cpp_understand_site" required id="cpp_understand_site" value="no"{{ $hot->cpp_understand_site == "no" ? 'checked' : '' }}> No </label>
                      </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="">Know how to use fire exstinguisher, water hose real</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="cpp_kextinguidsher" required id="cpp_kextinguidsher" value="yes"{{ $hot->cpp_kextinguidsher == "yes" ? 'checked' : '' }}> Yes </label>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="cpp_kextinguidsher" required id="cpp_kextinguidsher" value="no"{{ $hot->cpp_kextinguidsher == "no" ? 'checked' : '' }}> No </label>
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
                    <textarea class="form-control" id="other_precaution" required name="other_precaution" rows="4">{{ $hot->other_precaution }}</textarea>
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
                                <input type="datetime-local" class="form-control" required name="vp_form" id="vp_form" value="{{ $hot->vp_form }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Issuer</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required name="issuer" id="issuer" value="{{ $hot->issuer }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>To</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control" required name="vp_to" id="vp_to" value="{{ $hot->vp_to }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date & Time</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control" required name="vp_datetime" id="vp_datetime" value="{{ $hot->vp_datetime }}"/>
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
                              <input type="text" class="form-control" required name="c_acceptor" id="c_acceptor" value="{{ $hot->c_acceptor }}"/>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Date & Time</label>
                          <div class="col-sm-9">
                              <input type="datetime-local" required class="form-control" name="c_datetime" id="c_datetime" value="{{ $hot->c_datetime }}"/>
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
                  <textarea class="form-control" id="stop_working" required name="stop_working" rows="4">{{ $hot->stop_working }}</textarea>
              </div>
              <div class="form-group">
                <label for="">Stoped By</label>
                <input type="text" class="form-control" id="stoped_by" required name="stoped_by"  value="{{ $hot->stoped_by }}"/>
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
                              <input type="text" class="form-control" required name="h_acceptor" id="h_acceptor"  value="{{ $hot->h_acceptor }}"/>
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Issuer</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required name="h_issuer" id="h_issuer"  value="{{ $hot->h_issuer }}"/>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Date & Time</label>
                        <div class="col-sm-9">
                            <input type="datetime-local" class="form-control" required name="h_acceptor_datetime" id="h_acceptor_datetime"  value="{{ $hot->h_acceptor_datetime }}"/>
                        </div>
                      </div>

                      <div class="form-group">
                          <label>Date & Time</label>
                          <div class="col-sm-9">
                              <input type="datetime-local" class="form-control" required name="h_issuer_datetime" id="h_issuer_datetime"  value="{{ $hot->h_issuer_datetime }}"/>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Equipment Check</h5>
      </div>
      <div class="modal-body">
        <form class="add_equipment" id="add_equipment" name="add_equipment" action="/editadd-equipment" method="POST">
          @csrf
          <input type="hidden" name="id" id="id" >
          <input type="hidden" name="kode" id="kode" value="{{ $hot->kode }}">
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

<div class="modal fade" id="modalEditequipment" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Equipment Check</h5>
      </div>
      <div class="modal-body">
        <form class="add_equipment" id="add_equipment" name="add_equipment" action="/edit/update-equipment" method="POST">
          @csrf
          <input type="hidden" name="editid" id="editid" >
          <input type="hidden" name="editkode" id="editkode">
          <div class="form-group">
            <label for="exampleInputName1">Equipment</label>
            <input type="text" class="form-control" id="editequipment" name="editequipment" required />
          </div>
          <div class="form-group">
              <label for="exampleTextarea1">Inspection No</label>
              <input type="text" class="form-control" id="editinspection_no" name="editinspection_no" required />
          </div>
          <div class="form-group">
              <label for="exampleTextarea1">Inspected By</label>
              <input type="text" class="form-control" id="editinspected_by" name="editinspected_by" required />
          </div>
          <div class="form-group">
              <label for="exampleTextarea1">Inspection Date</label>
              <input type="date" class="form-control" id="editinspection_date" name="editinspection_date" required />
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
  $(document).ready(function () {
  $('#equipment').DataTable();
});

$('#modalEditequipment').on('show.bs.modal', function (event) {
        // event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
        var button = $(event.relatedTarget)

        // data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing 
        var id         = button.data('editid')
        var kode         = button.data('editkode')
        var equipment    = button.data('editequipment')
        var inspectionno        = button.data('editinspectionno')
        var editinspected_by        = button.data('editinspected')
        var editinspection_date        = button.data('editinspectiondate')
    
        var modal = $(this)

        //variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
        modal.find('#editid').val(id)
        modal.find('#editkode').val(kode)
        modal.find('#editequipment').val(equipment)
        modal.find('#editinspection_no').val(inspectionno)
        modal.find('#editinspected_by').val(editinspected_by)
        modal.find('#editinspection_date').val(editinspection_date)
    })
</script>
</script>
@endpush