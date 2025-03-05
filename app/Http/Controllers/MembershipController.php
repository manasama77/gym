<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Http\Requests\StoreMembershipRequest;
use App\Http\Requests\UpdateMembershipRequest;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title   = 'Membership';
        $keyword = $request->keyword ?? null;

        $memberships = Membership::with('user')
            ->orderBy('expired_date', 'desc')
            ->whereHas('user', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%')
                    ->orWhere('no_whatsapp', 'like', '%' . $request->keyword . '%');
            })
            ->paginate(5)
            ->withQueryString();

        return view('pages.membership.main', compact('title', 'keyword', 'memberships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title   = 'Tambah Member';
        return view('pages.membership.form', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMembershipRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Membership $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Membership $membership)
    {
        $title = 'Edit Member';
        return view('pages.membership.form', compact('title', 'membership'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMembershipRequest $request, Membership $membership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Membership $membership)
    {
        $membership->user->delete();
        $membership->delete();
        return redirect()->route('membership')->with('success', 'Member berhasil dihapus');
    }
}
