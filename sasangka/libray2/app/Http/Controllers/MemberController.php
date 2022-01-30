<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.member.index');
    }

    public function api(Request $request)
    {
        if ($request->gender) {
            $members = Member::where('gender', $request->gender)->get();
        } else {
            $members = Member::all();
        }

        $datatables = datatables()
            ->of($members)
            ->addColumn('date', function ($member) {
                return convertDate($member->created_at);
            })
            ->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $validator = $request->validate([
            'name' => 'required|min:3|max:32',
            'gender' => 'required|max:1',
            'phone_number' => 'required|unique:members|min:12|max:15',
            'address' => 'required',
            'email' => 'required|unique:members',
        ]);

        // Insert validated data into database
        Member::create($validator);

        return redirect('members')->with('success', 'New member data has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        // Validation Data
        $validator = $request->validate([
            'name' => 'required|min:3|max:32',
            'gender' => 'required|max:1',
            'phone_number' => "required|unique:members,phone_number,{$member->id}|min:12|max:15",
            'address' => 'required',
            'email' => "required|unique:members,email,{$member->id}",
        ]);

        // Insert validated data into database
        $member->update($validator);

        return redirect('members')->with('success', 'Member data has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        // Delete data with specific ID
        $member->delete();

        return redirect('members')->with('success', 'Member data has been Deleted');
    }
}