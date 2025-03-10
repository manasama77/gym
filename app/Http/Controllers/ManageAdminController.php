<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManageAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Manage Admin';
        $keyword = $request->keyword ?? null;

        $admins = User::where(function ($query) use ($keyword) {
            $query
                ->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%');
        })
            ->whereHas('roles', function ($query) {
                $query->where('name', '!=', 'user');
            })
            ->paginate(5)
            ->withQueryString();

        return view('pages.manage_admin.main', compact('title', 'keyword', 'admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Admin';
        return view('pages.manage_admin.form', compact('title'));
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $title = 'Edit Admin';
        return view('pages.manage_admin.form_edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('manage-admin')->with('success', 'Admin berhasil dihapus');
    }
}
