@extends('layout')
@section('content')
    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        <div class="flex lg:justify-center text-black-50 font-bold lg:col-start-2">
            Q2 Report
        </div>
    </header>
    <div
        class="flex items-start   rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
    >
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2  border ">Acc Head Id</th>
                <th class="px-4 py-2 border">G. Lvl1</th>
                <th class="px-4 py-2 border">G. Lvl2</th>
                <th class="px-4 py-2 border">G. Lvl3</th>
                <th class="px-4 py-2 border">Acc Head</th>
                <th class="px-4 py-2 border">Total</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($reportData))
                @foreach($reportData as $report)
                    <tr>
                        <td  class="px-4 py-2 border">{{$report['acc_head_id'] ?? ''}}</td>
                        <td  class="px-4 py-2 border">{{$report['lvl1'] ?? ''}}</td>
                        <td  class="px-4 py-2 border">{{$report['lvl2'] ?? ''}}</td>
                        <td  class="px-4 py-2 border">{{$report['lvl3'] ?? ''}}</td>
                        <td  class="px-4 py-2 border">{{$report['acc_head'] ?? ''}}</td>
                        <td  class="px-4 py-2 border" >{{$report['total'] ?? ''}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>



@endsection




