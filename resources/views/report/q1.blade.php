<div class="container">
    <h1 class="text-center">Hierarchical Report</h1>

    <table class="table-auto"  >
        <thead>
        <tr>
            <th width="25%">Group</th>
            <th width="50%">Group/Heads</th>
            <th width="25%">Total Amount</th>
        </tr>
        </thead>
        <tbody>
       @if(isset($reportData))
           @foreach($reportData as $report)
            <tr>
                <td>{{$report['name'] ?? ''}}</td>
                <td> </td>
                <td>{{$report['total_amount'] ?? ''}}</td>
            </tr>
               @if(isset($report['children']))
                   @foreach($report['children'] as $child)
                       <tr>
                           <td></td>
                           <td>{{$child['name'] ?? ''}} </td>
                           <td>{{$child['total_amount'] ?? ''}}</td>
                       </tr>
                       @if(isset($child['children']))
                           @foreach($child['children'] as $child1)
                               <tr>
                                   <td></td>
                                   <td>&nbsp;&nbsp; &nbsp; {{$child1['name'] ?? ''}} </td>
                                   <td>{{$child1['total_amount'] ?? ''}}</td>
                               </tr>

                               @if(isset($child1['children']))
                                   @foreach($child1['children'] as $child2)
                                       <tr>
                                           <td></td>
                                           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$child2['name'] ?? ''}} </td>
                                           <td>{{$child2['total_amount'] ?? ''}}</td>
                                       </tr>
                                   @endforeach
                               @endif
                           @endforeach
                       @endif
                   @endforeach

               @endif
           @endforeach
       @endif
        </tbody>
    </table>
</div>
