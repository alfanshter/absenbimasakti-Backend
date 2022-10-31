@extends('template.main')

@section('container')
<form action="/update/internal-purchase-requestion" method="POST">
    @csrf
<div class="page-header">
    <h3 class="page-title">Edit Internal Purchase Requestion </h3>
    <div >
        <a href="/job-safety-analysis" class="btn btn-gradient-danger btn-icon-text btn-md">Cancel</a>
        <button type="submit" name="save" id="save" class="btn btn-gradient-primary btn-icon-text btn-md">Save</button>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Detail Internal Purchase Requestion</h6>
            <button type="button" class="btn btn-gradient-primary btn-icon-text btn-sm mb-2" data-toggle="modal" data-target="#modalDetail"><i class="mdi mdi-plus-box btn-icon-prepend"></i> Add </button>
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
                        <th> Amount </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($detail as $data )
                      <tr>
                        <td>
                            <div class="btn-group">
                                <form action="/delete/detail/{{$data->id}}" method="post">
                                  @csrf
                                  <button class="btn btn-gradient-danger btn-outline-secondary btn-sm " onclick="return confirm('Apakah anda menyetujui ?')" >
                                  <i class="mdi mdi-delete"></i>
                                  </button>
                                </form>
                                <button type="button" id='detailid' data-editid="{{ $data->id }}" data-editkode="{{ $data->kode }}" data-editquantity = "{{ $data->quantity }}" data-editcatalog = "{{ $data->catalog }}" data-editdescription = "{{ $data->description }}" data-editsize = "{{ $data->size }}" data-editunit_price = "{{ $data->unit_price }}" data-editamount = "{{ $data->amount }}" class="btn btn-gradient-info btn-outline-secondary btn-sm" data-toggle="modal" data-target="#modalEditDetail">
                                  <i class="mdi mdi-pencil-box"></i>
                                </button>
                            </div>
                        </td>
                        <td>{{ $data->quantity }}</td>
                        <td>{{ $data->catalog }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->size }}</td>
                        <td>{{ $data->unit_price }}</td>
                        <td>{{ $data->amount }}</td>
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
                        <div class="form-group">
                            <label>Ref ID</label>
                            <input type="hidden" name="id" id="id" value="{{ $internal->id }}">
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required value="{{ $internal->ref_id }}" name="ref_id" id="ref_id"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Requestioned By</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required value="{{ $internal->requestioned_by }}" name="requestioned_by" id="requestioned_by"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" required value="{{ $internal->date }}" name="date" id="date"/>
                            </div>
                        </div>
                        <div class="form-group">
                          <label>Department</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" required value="{{ $internal->department }}" name="department" id="department"/>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Position</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required value="{{ $internal->position }}" name="position" id="position"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Project Location</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required value="{{ $internal->project_location }}" name="project_location" id="project_location"/>
                            </div>
                        </div>
                        <div class="form-group">
                          <label>Completed Address</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" required value="{{ $internal->completed_addres }}" name="completed_address" id="completed_address"/>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</form>

<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Detail Internal Purchase Requestion</h5>
        </div>
        <div class="modal-body">
          <form class="add_detail" id="add_detail" name="add_detail" action="/editadd-detail" method="POST">
            @csrf
            <input type="hidden" name="id" id="id" >
            <input type="hidden" name="kode" id="kode" value="{{ $internal->kode }}">
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

<div class="modal fade" id="modalEditDetail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Detail Internal Purchase Requestion</h5>
        </div>
        <div class="modal-body">
          <form class="add_detail" id="add_detail" name="add_detail" action="/edit/update-detail" method="POST">
            @csrf
            <input type="hidden" name="editid" id="editid" >
            <input type="hidden" name="editkode" id="editkode">
            <div class="form-group">
              <label for="exampleInputName1">Quantity</label>
              <input type="number" class="form-control" id="editquantity" name="editquantity" required />
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">Catalog</label>
                <input type="text" class="form-control" id="editcatalog" name="editcatalog" required />
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">Description</label>
                <input type="text" class="form-control" id="editdescription" name="editdescription" required />
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">Size</label>
                <input type="text" class="form-control" id="editsize" name="editsize" required />
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Unit Price</label>
                <input type="text" class="form-control" id="editunit_price" name="editunit_price" required />
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Amount</label>
                <input type="number" class="form-control" id="editamount" name="editamount" required />
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
  $(document).ready(function () {
  $('#detail').DataTable();
});

$('#modalEditDetail').on('show.bs.modal', function (event) {
        // event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
        var button = $(event.relatedTarget)

        // data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing 
        var id         = button.data('editid')
        var kode         = button.data('editkode')
        var quantity    = button.data('editquantity')
        var catalog        = button.data('editcatalog')
        var description        = button.data('editdescription')
        var size        = button.data('editsize')
        var unit_price        = button.data('editunit_price')
        var amount        = button.data('editamount')
        var modal = $(this)

        //variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
        modal.find('#editid').val(id)
        modal.find('#editkode').val(kode)
        modal.find('#editquantity').val(quantity)
        modal.find('#editcatalog').val(catalog)
        modal.find('#editdescription').val(description)
        modal.find('#editsize').val(size)
        modal.find('#editunit_price').val(unit_price)
        modal.find('#editamount').val(amount)
    })
</script>
@endpush