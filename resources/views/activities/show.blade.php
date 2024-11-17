@extends('layouts.core.base')

@section('content')
<h6 class="text-xl font-bold mb-4">SHOW</h6>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
            <table class="table no-wrap">
                        <tbody>

                        <tr>
                            <td class="text-gray">Activity Name: </td>
                            <td>
                                {{ $activity->activity_name }}
                            </td>
                        </tr>
    
                        <tr>
                            <td class="text-gray">Duration: </td>
                            <td>{{ $activity->duration }}</td>
                        </tr>
                        
                        <tr>
                            <td class="text-gray">Amount: </td>
                            <td>{{ $activity->amount }}</td>
                        </tr>
                        
                        <tr>
                            <td class="text-gray">Created At</td>
                            <td>{{ $activity->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="text-gray">Updated At</td>
                            <td>{{ $activity->updated_at }}</td>
                        </tr>

                        </tbody>
                    </table>
        
        </div>
    </div>
</div>
@endsection
