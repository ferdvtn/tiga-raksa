@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ url('member') }}" method="POST">
                @method(empty($member) ? 'POST' : 'PUT')
                @csrf
                
                <button type="submit" class="btn btn-sm btn-success">+ Add</button>
                <a href="{{ url('home') }}" class="btn btn-sm btn-primary">Back</a>
            
                <div class="form-group mt-3">
                    <label for="rm_branch_id" class="text-uppercase font-weight-bold">rm branch id</label>
                    <input id="rm_branch_id" type="text" name="rm_branch_id" value="{{ old('rm_branch_id', ($member->rm_branch_id ?? '')) }}" class="form-control @error('rm_branch_id') is-invalid @enderror">
                    @error('rm_branch_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="rm_rep_id" class="text-uppercase font-weight-bold">rm rep id</label>
                    <input id="rm_rep_id" type="text" name="rm_rep_id" value="{{ old('rm_rep_id', ($member->rm_rep_id ?? '')) }}" class="form-control @error('rm_rep_id') is-invalid @enderror">
                    @error('rm_rep_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="rm_name" class="text-uppercase font-weight-bold">rm name</label>
                    <input id="rm_name" type="text" name="rm_name" value="{{ old('rm_name', ($member->rm_name ?? '')) }}" class="form-control @error('rm_name') is-invalid @enderror">
                    @error('rm_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="rm_current_position" class="text-uppercase font-weight-bold">rm current position</label>
                    <select name="rm_current_position" id="rm_current_position" class="form-control @error('rm_current_position') is-invalid @enderror">
                        <option value="">&#45;</option>
                        <option value="EPC" {{ old('rm_current_position', ($member->rm_current_position ?? '')) == 'EPC' ? 'selected' : '' }}>EPC</option>
                        <option value="EPD" {{ old('rm_current_position', ($member->rm_current_position ?? '')) == 'EPD' ? 'selected' : '' }}>EPD</option>
                        <option value="GEPD" {{ old('rm_current_position', ($member->rm_current_position ?? '')) == 'GEPD' ? 'selected' : '' }}>GEPD</option>
                    </select>
                    @error('rm_current_position')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <label for="rm_name" class="text-uppercase font-weight-bold">rm manager id</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rm_manager_id" id="own-self" value="" {{ old('rm_manager_id', ($member->rm_manager_id ?? '')) == '' ? 'checked' : '' }}>
                    <label class="form-check-label" for="own-self">
                        Own Self 
                    </label>
                </div>
                @foreach ($managers as $manager)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rm_manager_id" id="{{ $manager->rm_rep_id }}" value="{{ $manager->rm_rep_id }}" {{ old('rm_manager_id', ($member->rm_manager_id ?? '')) == $manager->rm_rep_id ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $manager->rm_rep_id }}">
                            {{ $manager->rm_current_position }} - {{ $manager->rm_name }} 
                        </label>
                    </div>
                @endforeach

                <input type="hidden" name="_id" value="{{ $member->rm_rep_id ?? '' }}">

            </form>
        </div>
    </div>
</div>
@endsection
