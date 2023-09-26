<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\EditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::query()->where('id', '!=', Auth::user()->name)->orderBy('id')->paginate();
        return \view('admin.users.index', ['usersList' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $request->flash();

        if($request->password1 === $request->password2){
            $data = $request->only(['name', 'email', 'is_admin']);
            $data['password'] = $request->password1;
            $user = new User($data);
        }else{
            return back()->with('error', 'Пароль в поле "Введите пароль" и в поле "Повторите пароль" несовподает');
        }

        if($user->save()){
            return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно добавлен');
        }
        return back()->with('error', 'Неполучилось добавить пользователя');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return \view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, User $user)
    {
        $data = $request->only(['name', 'email', 'is_admin']);

        if($request->password1 !== null && $request->password1 === $request->password2){
            $data['password'] = $request->password1;
        }

        $user = $user->fill($data);

        if($user->save()){
            return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно отредактирован.');
        }
        return back()->with('error', 'Неполучилось изменить данные пользователя');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно удален');
        }
        return back()->with('error', 'Неполучилось удалить пользователя');
    }

    public function changeRights(Request $request, User $user)
    {
//        dd(Auth::user()->id);
        if(Auth::user()->id === $user->id){
            return back()->with('error', 'Нельзя изменить свой статус');
        }


        $rights = $request->rights;

        if($rights === 'in_user'){
            $user->is_admin = false;
        }elseif($rights === 'in_admin'){
            $user->is_admin = true;
        }

        if($user->save()){
            return redirect()->route('admin.users.index')->with('success', 'Права пользователя успешно изменены.');
        }
        return back()->with('error', 'Неполучилось изменить права пользователя');
    }
}
