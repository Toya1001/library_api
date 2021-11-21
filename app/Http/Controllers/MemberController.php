<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Member::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:members,email',
            'street_address' => 'required',
            'apt_no' => 'required',
            'town' => 'required',
            'parish' => 'required',
            'contact_no' => 'required'
        ]);

        return Member::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Member::findOrFail($id);
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
        //
        $member = Member::findOrFail($id);
        $member->update($request->all());
        return $member;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::find($id)->delete();
        return "Member Removed";
    }


    /**
     * Search for a specified member from database.
     *
     * @param mixed $person
     * @return \Illuminate\Http\Response
     */
    public function search($person)
    {
        $member = Member::where('name', 'like', '%'.$person.'%')
        ->orWhere('email', 'like', '%'.$person.'%')
        ->orWhere('street_address', 'like', '%'.$person.'%')
        ->orWhere('town', 'like', '%' . $person .'%')
        ->get();

        return $member;
    }
}
 