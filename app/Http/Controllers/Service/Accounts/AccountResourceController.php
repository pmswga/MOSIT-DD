<?php

namespace App\Http\Controllers\Service\Accounts;

use App\Core\Config\ListDatabaseTable;
use App\Http\Controllers\Controller;
use App\AccountModel;
use App\Models\Main\Staff\EmployeeModel;
use App\Models\Service\Accounts\ListAccountTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index()
    {
        return view ('system.service.accounts.index', [
            'accounts' => AccountModel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function create()
    {
        $employees = DB::table(ListDatabaseTable::TABLE_ACCOUNTS. ' as a')
            ->select('a.idAccount', 'e.idEmployee', 'e.secondName', 'e.firstName', 'e.patronymic')
            ->rightJoin(ListDatabaseTable::TABLE_EMPLOYEES.' as e', 'e.idEmployee', '=', 'a.idEmployee')
            ->whereNull('a.idAccount')->get();

        return view('system.service.accounts.components.create', [
            'employees' => $employees,
            "accountTypes" => ListAccountTypeModel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->only(['accountType', 'employeeId', 'email', 'password']);

        #$validator = Validator::make($data, [
        #    'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
        #    'password' => ['required', 'string', 'min:8'],
        #]);

        #if (!$validator->fails()) {
            $user = new AccountModel();
            $user->idAccountType = $data['accountType'];
            $user->idEmployee = $data['employeeId'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();

            Session::flash('message', ['type' => 'success', 'message' => 'Аккаунт успешно добавлен']);
            return Redirect::route('accounts.create');
        #} else {
        #    return back();
        #}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccountModel  $user
     * @return \Illuminate\Http\Response
     */
    public function show(AccountModel $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccountModel  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountModel $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AccountModel  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountModel $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccountModel  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountModel $user)
    {
        //
    }
}
