<table>
    <thead>
        <tr>
            <th class="tg-pht7">No</th>
            <th class="tg-pht7">Ref ID</th>
            <th class="tg-pht7">Job Title</th>
            <th class="tg-pht7">Team Work</th>
            <th class="tg-pht7">Work Location</th>
            <th class="tg-pht7">User Created</th>
            <th class="tg-pht7">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $data)
        <tr>
            <td class="tg-0pky">{{$loop->iteration}}</td>
            <td class="tg-pht7">{{$data->ref_id}}</td>
            <td class="tg-pht7">{{$data->job_title}}</td>
            <td class="tg-pht7">{{$data->team_work}}</td>
            <td class="tg-pht7">{{$data->work_location}}</td>
            <td class="tg-pht7">{{$data->user_created}}</td>
            <td class="tg-pht7">{{$data->status}}</td>
        </tr>
        @endforeach
    </tbody>
</table>