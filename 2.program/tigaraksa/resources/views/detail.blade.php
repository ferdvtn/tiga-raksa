@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/my-style.css') }}">
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
            <img src="https://source.unsplash.com/350x500/?profile,people" class="img-loader">
        </div>
        <div class="col-md-4">
            <a href="{{ url('home') }}" class="btn btn-sm btn-primary mb-3">Back</a>
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <th class="table-info text-capitalize">rm branch id</th>
                        <td>{{ $member->rm_branch_id }}</td>
                    </tr>
                    <tr>
                        <th class="table-info text-capitalize">rm rep id</th>
                        <td>{{ $member->rm_rep_id }}</td>
                    </tr>
                    <tr>
                        <th class="table-info text-capitalize">rm name</th>
                        <td>{{ $member->rm_name }}</td>
                    </tr>
                    <tr>
                        <th class="table-info text-capitalize">rm current position</th>
                        <td>{{ $member->rm_current_position }}</td>
                    </tr>
                    <tr>
                        <th class="table-info text-capitalize">rm manager id</th>
                        <td>{{ $member->rm_manager_id }}</td>
                    </tr>
                    <tr>
                        <th class="table-info text-capitalize">rm_mst_gepd</th>
                        <td>{{ $member->rm_mst_gepd }}</td>
                    </tr>
                    <tr>
                        <th class="table-info text-capitalize">NamaGEPD</th>
                        <td>{{ $member->NamaGEPD }}</td>
                    </tr>
                    <tr>
                        <th class="table-info text-capitalize">rm_mst_epd</th>
                        <td>{{ $member->rm_mst_epd }}</td>
                    </tr>
                    <tr>
                        <th class="table-info text-capitalize">NamaEPD</th>
                        <td>{{ $member->NamaEPD }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
