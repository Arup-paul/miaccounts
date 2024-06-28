@extends('layout')

@section('content')
    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        <div class="flex lg:justify-center text-black-50 font-bold lg:col-start-2">
          Q1 Report
        </div>
    </header>
    <div
        class="flex items-start   rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
    >
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2  border ">Group</th>
                <th class="px-4 py-2 border">Group/Heads</th>
                <th class="px-4 py-2 border">Total Amount</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($reportData))
                @foreach($reportData as $report)
                    <tr>
                        <td class="px-4 py-2 border">{{$report['name'] ?? ''}}</td>
                        <td class="px-4 py-2 border"> </td>
                        <td class="px-4 py-2 border">{{$report['total_amount'] ?? ''}}</td>
                    </tr>
                    @if(isset($report['children']))
                        @foreach($report['children'] as $child)
                            <tr>
                                <td class="px-4 py-2 border"></td>
                                <td class="px-4 py-2 border">{{$child['name'] ?? ''}} </td>
                                <td class="px-4 py-2 border">{{$child['total_amount'] ?? ''}}</td>
                            </tr>
                            @if(isset($child['children']))
                                @foreach($child['children'] as $child1)
                                    <tr>
                                        <td class="px-4 py-2 border"></td>
                                        <td class="px-4 py-2 border">&nbsp;&nbsp; &nbsp; {{$child1['name'] ?? ''}} </td>
                                        <td class="px-4 py-2 border">{{$child1['total_amount'] ?? ''}}</td>
                                    </tr>
                                    @if(isset($child1['children']))
                                        @foreach($child1['children'] as $child2)
                                            <tr>
                                                <td class="px-4 py-2 border"></td>
                                                <td class="px-4 py-2 border">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$child2['name'] ?? ''}} </td>
                                                <td class="px-4 py-2 border">{{$child2['total_amount'] ?? ''}}</td>
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



@endsection
