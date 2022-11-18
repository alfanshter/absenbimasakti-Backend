<tr>
    <th class="tg-pht7">No</th>
    <th class="tg-pht7">Ref ID</th>
    <th class="tg-pht7">Date</th>
    <th class="tg-pht7">Departmen</th>
    <th class="tg-pht7">Position</th>
    <th class="tg-pht7">Project Location</th>
    <th class="tg-pht7">Completed Address</th>
    <th class="tg-pht7">User Created</th>
    <th class="tg-pht7">Created Date</th>
    <th class="tg-pht7">Status</th>
</tr>
@foreach($data as $data)
<tr>
    <td class="tg-pht7">{{$loop->iteration}}</td>
    <td class="tg-pht7">{{$data->ref_id}}</td>
    <td class="tg-pht7">{{$data->date}}</td>
    <td class="tg-pht7">{{$data->department}}</td>
    <td class="tg-pht7">{{$data->position}}</td>
    <td class="tg-pht7">{{$data->project_location}}</td>
    <td class="tg-pht7">{{$data->completed_addres}}</td>
    <td class="tg-pht7">{{$data->user_created}}</td>
    <td class="tg-pht7">{{$data->created_at}}</td>
    <td class="tg-pht7">{{$data->status}}</td>
</tr>