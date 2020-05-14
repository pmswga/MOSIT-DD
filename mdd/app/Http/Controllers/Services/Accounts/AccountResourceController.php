<?php

namespace App\Http\Controllers\Services\Accounts;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Symfony\Component\Console\Input\Input;

class AccountResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('systems.service.accounts.account_index', [
            'accounts' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('systems.service.accounts.account_add', [
            "staff" => \App\Models\Main\Employees\Employee::all(),
            "accountTypes" => \App\Models\Service\Accounts\AccountType::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['accountType', 'employeeId', 'email', 'password']);

        $validator = Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (!$validator->fails()) {
            $user = new User();
            $user->idAccountType = $data['accountType'];
            $user->idEmployee = $data['employeeId'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();

            Session::flash('message', 'Аккаунт успешно добавлен');
            return Redirect::route('accounts.create');
        } else {
            return Redirect::to('accounts.create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
