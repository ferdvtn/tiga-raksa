<?php

namespace App\Http\Controllers;

use App\Exports\MembersExport;
use App\Member;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $members = Member::getReports();

        return view('home', compact('members'));
    }

    /**
     * 
     * Load the view detail
     * 
     */
    public function detail($rmRepId)
    {
        $member = Member::getDetail($rmRepId);

        return view('detail', compact('member'));
    }

    /**
     * 
     * Load the form view
     * 
     */
    public function form($rmRepId = '')
    {
        $member = Member::find($rmRepId);
        $managers = Member::getManagerOptions();

        return view('form', compact('managers', 'member'));
    }

    /**
     * 
     * Insert to db
     * 
     */
    public function insert(Request $request)
    {
        $validateData = $request->validate([
            'rm_branch_id' => 'required|max:4',
            'rm_rep_id' => 'required|max:10|unique:members,rm_rep_id',
            'rm_name' => 'required|max:255',
            'rm_current_position' => 'required|max:4',
            'rm_manager_id' => 'max:10',
        ]);

        $member = new Member;
        $member->rm_branch_id = $validateData['rm_branch_id'];
        $member->rm_rep_id = $validateData['rm_rep_id'];
        $member->rm_name = $validateData['rm_name'];
        $member->rm_current_position = $validateData['rm_current_position'];
        $member->rm_manager_id = $validateData['rm_manager_id'] ?? $validateData['rm_rep_id'];
        $member->save();

        return redirect('home');
    }

    /**
     * 
     * Update data db
     * 
     */
    public function update(Request $request)
    {
        $validateData = $request->validate([
            'rm_branch_id' => 'required|max:4',
            'rm_rep_id' => 'required|max:10|unique:members,rm_rep_id,' . $request->_id . ',rm_rep_id',
            'rm_name' => 'required|max:255',
            'rm_current_position' => 'required|max:4',
            'rm_manager_id' => 'max:10',
        ]);

        $member = Member::find($request->_id);
        $member->rm_branch_id = $validateData['rm_branch_id'];
        $member->rm_rep_id = $validateData['rm_rep_id'];
        $member->rm_name = $validateData['rm_name'];
        $member->rm_current_position = $validateData['rm_current_position'];
        $member->rm_manager_id = $validateData['rm_manager_id'] ?? $validateData['rm_rep_id'];
        $member->save();

        return redirect('home');
    }

    /**
     * 
     * Delete data db
     * 
     */
    public function delete(Request $request)
    {
        $member = Member::find($request->_id);
        $member->delete();

        return redirect('home');
    }

    /**
     * 
     * Export list to excel file
     * 
     */
    public function export()
    {
        return Excel::download(new MembersExport, 'members.xlsx');
    }
}
