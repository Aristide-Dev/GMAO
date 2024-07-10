<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MonthlyReport;
use Illuminate\Http\Request;

class MonthlyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $reports = MonthlyReport::where('validated', false)->get();
        $reports = MonthlyReport::orderby('id', 'desc')->get();
        return view('admin.reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function validateReport($id)
    {
        $report = MonthlyReport::find($id);
        $report->validated = true;
        $report->save();

        return redirect()->route('admin.reports.index')->with('success', 'Report validated successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MonthlyReport $monthlyReport)
    {
        return view('admin.reports.show', compact('monthlyReport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MonthlyReport $monthlyReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MonthlyReport $monthlyReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MonthlyReport $monthlyReport)
    {
        //
    }
}
