<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use PDF;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.member.index');
    }

    public function data()
    {
        $member = Member::orderBy('member_code', 'asc')->get();
        
        return datatables()
            ->of($member)
            ->addIndexColumn()
            ->addColumn('checkbox', function ($member) {
                return '<input type="checkbox" name="member_id[]" value="'. $member->member_id .'" >';
            })
            ->addColumn('member_code', function ($member) {
                return '<span class="badge badge-success">'. $member->member_code .'</span>';
            })
            ->addColumn('aksi', function ($member) {
                return '<button type="button" onclick="editForm(`'. route('member.update', $member->member_id) .'`)" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i>
                    </button>
                    <button type="button" onclick="deleteData(`'. route('member.destroy', $member->member_id) .'`)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                ';
            })
            ->rawColumns(['aksi', 'member_code', 'checkbox'])
            ->make(true);
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
        $member = Member::latest()->first() ?? new Member();
        $member_code = (int) $member->member_code + 1;

        $member = new Member();
        $member->member_code = tambah_0_first($member_code, 5); 
        $member->name = $request->name;
        $member->phone_number = $request->phone_number;
        $member->address = $request->address;
        $member->save();

        return response()->json('Data Berhasil Disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);

        return response()->json($member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Member::find($id)->update($request->all());
        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();

        return response(null, 204);
    }

    public function printMember(Request $request)
    {
        $datamember = collect(array());
        foreach ($request->member_id as $id) {
            $member = Member::find($id);
            $datamember[] = $member;
        }
        $datamember = $datamember->chunk(2); //chunk = memecah array

        $no  = 1;
        $pdf = PDF::loadView('pages.member.print', compact('datamember', 'no'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('member.pdf');
    }
}
