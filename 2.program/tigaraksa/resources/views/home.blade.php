@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (Auth::user()->role != 0)
                <a href="{{ url('form') }}" class="btn btn-sm btn-success">+ New</a>
            @endif
            <a href="{{ url('export') }}" class="btn btn-sm btn-success" style="background-color: green">x Export</a>
            <table class="table table-sm table-bordered table-striped table-hover mt-3 text-center">
                <thead>
                    <tr class="table-info">
                        <th>No</th>
                        <th>rm_mst_gepd</th>
                        <th>NamaGEPD</th>
                        <th>rm_mst_epd</th>
                        <th>NamaEPD</th>
                        <th>rm_branch_id</th>
                        <th>rm_name</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $member->rm_mst_gepd }}</td>
                            <td>{{ $member->NamaGEPD }}</td>
                            <td>{{ $member->rm_mst_epd }}</td>
                            <td>{{ $member->NamaEPD }}</td>
                            <td>{{ $member->rm_branch_id }}</td>
                            <td>
                                <a href="{{ 'member/' . $member->rm_mst_epc }}">{{ $member->rm_name }}</a>
                                @if (Auth::user()->role != 0)
                                    <div class="float-right">
                                        <a href="{{ url('form/' . $member->rm_mst_epc) }}" class="btn btn-sm btn-warning">U</a>
                                        <form action="{{ url('member') }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="_id" value="{{ $member->rm_mst_epc }}">
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="confirmDelete()">D</button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        $result = confirm('Data will be delete, are you sure ?');
        if ( ! $result) event.preventDefault();
    }
</script>
@endsection
