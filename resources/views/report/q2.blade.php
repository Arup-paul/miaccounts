<div class="container">
    <h1 class="text-center">Q2</h1>

    <table class="table-auto"  >
        <thead>
        <tr>
            <th width="10%" >Acc Head Id</th>
            <th  width="20%" >G. Lvl1</th>
            <th  width="20%" >G. Lvl2</th>
            <th width="20%" >G. Lvl3</th>
            <th width="20%" >Acc Head</th>
            <th width="10%" >Total </th>
        </tr>
        </thead>
        <tbody>
       @if(isset($reportData))
           @foreach($reportData as $report)
            <tr>
                <td width="10%" >{{$report['acc_head_id'] ?? ''}}</td>
                <td width="20%">{{$report['lvl1'] ?? ''}}</td>
                <td width="20%">{{$report['lvl2'] ?? ''}}</td>
                <td width="20%">{{$report['lvl3'] ?? ''}}</td>
                <td width="20%">{{$report['acc_head'] ?? ''}}</td>
                <td width="10%" >{{$report['total'] ?? ''}}</td>
            </tr>
           @endforeach
       @endif
        </tbody>
    </table>
</div>
