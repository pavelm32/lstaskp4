<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', ['user' => \Auth::user()]);
    }

    public function edit()
    {
        return view('admin.dashboard.edit', ['user' => \Auth::user()]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);

        $email = $request->get('email');

        $user = \Auth::user();
        $user->notify_email = $email;
        $user->save();

        return redirect(route('admin.index'));
    }

}

