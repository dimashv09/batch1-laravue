<?php

namespace App\Http\Controllers;

use App\Models\Member;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::with('transaction')->get();
        // return $members;
        return view('member.index');
    }

    public function api(Request $request)
    {
        if ($request->gender) {
            $members = Member::where('gender', $request->gender)->get();
        }else {
            $members = Member::all();
        }

        // $members = Member::all();
        $datatables = datatables()->of($members)->addIndexColumn();

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
        //
        $member = new Member();
        $this->validate($request,[
            'name'=>'required|max:50',
            'gender'=>'required|max:15',
            'phone_number'=>'required|max:15',
            'address' =>'required',
            'email'=>'required|max:50',
        ]);

        $member->name = $request->name;
        $member->gender = $request->gender;
        $member->phone_number = $request->phone_number;
        $member->address = $request->address;
        $member->email = $request->email;
        $member->save();

        return redirect('members');
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
        //
        
        $this->validate($request,[
            'name'=>'required|max:50',
            'gender'=>'required|max:15',
            'phone_number'=>'required|max:15',
            'address' =>'required',
            'email'=>'required|max:50',
        ]);

        // $member->name = $request->name;
        // $member->gender = $request->gender;
        // $member->phone_number = $request->phone_number;
        // $member->address = $request->address;
        // $member->email = $request->email;
        $member->update($request->all());

        return redirect('members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
        $member->delete();

        return redirect('members');
    }
}
