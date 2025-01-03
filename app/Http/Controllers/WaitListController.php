<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWaitListRequest;
use App\Http\Requests\UpdateWaitListRequest;
use App\Models\WaitList;

class WaitListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWaitListRequest $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date',
            'return_date' => 'required|date'
        ]);

        WaitList::create([
            'book_id' => $request->book_id,
            'user_id' => auth()->id(),
            'loan_date' => $request->loan_date,
            'return_date' => $request->return_date
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(WaitList $waitList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WaitList $waitList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWaitListRequest $request, WaitList $waitList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WaitList $waitList)
    {
        //
    }
}
