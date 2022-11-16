
<table>
    <thead>
    <tr>
        <th class="tg-pht7">Group</th>
        <th class="tg-pht7">Date</th>
        <th class="tg-pht7">Check In</th>
        <th class="tg-pht7">Picture In</th>
        <th class="tg-pht7">Check Out</th>
        <th class="tg-pht7">Picture Out</th>
    </tr>
    </thead>
    <tbody>
        @foreach($attendence as $data)
        <tr>
                <td class="tg-pht7">{{$data->nama_grup}}</td>
                <td class="tg-pht7">{{$data->date}}</td>
                <td class="tg-pht7">{{$data->check_in}}</td>
                <td class="tg-pht7">{{$data->picture_in}}</td>
                <td class="tg-pht7">{{$data->check_out}}</td>
                <td class="tg-pht7">{{$data->picture_out}}</td>
        </tr>
    @endforeach
    </tbody>
</table>