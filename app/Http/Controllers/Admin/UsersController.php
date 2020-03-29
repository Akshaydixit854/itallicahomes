<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use JavaScript;

class UsersController extends Controller
{


    public function __construct() {
        $this->middleware('role:admin|superadmin');
    }
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_roles =[];

        $users = User::all();

      if(auth()->user()->hasRole('admin')){
        $admin_roles = Role::where('name', 'NOT LIKE', '%admin%')->pluck('name')->toArray();
      /*  dd($admin_roles);*/
        return view('admin.users.index', compact('users','admin_roles'));        
        }else {

        return view('admin.users.index', compact('users'));

        }
        /*dd($admin_roles->toArray());*/
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       if(auth()->user()->hasRole('admin')){
        $roles = Role::where('name', 'NOT LIKE', '%admin%')->get()->pluck('name', 'name');
        } else {
            $roles = Role::get()->pluck('name', 'name');
        }

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* dump($request->name);*/
        $user = User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>bcrypt($request->password),
                    'status' => 'Active',
                    ]);
       /* dd($user);*/
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect()->route('users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->hasRole('admin')){
        $roles = Role::where('name', 'NOT LIKE', '%admin%')->get()->pluck('name', 'name');
        } else {
            $roles = Role::get()->pluck('name', 'name');
        }

        $user = User::findOrFail($id);

        $selectedRoles = $user->roles()->pluck('name');

        JavaScript::put([
            'role' => $selectedRoles
        ]);

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect()->route('users.index');
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*dd(123);*/
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
