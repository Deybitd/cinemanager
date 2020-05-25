<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

class EdulceriaController extends Controller
{

    public function index()
    {   
        $edulcerias = User::edulcerias()->paginate(5);
        return view('edulcerias.index', compact('edulcerias'));
    }

    public function create()
    {
        return view('edulcerias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'digits:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6'
        ];
        $this->validate($request, $rules);
        User::create(
            $request->only('name', 'email', 'dni', 'address', 'phone')
            + [
                'role' => 'dulceria',
                'password' => bcrypt($request->input('password'))
            ]
    );
        $notification = 'El Empleado de Dulceria se ah Registrado Correctamente';
        return redirect('/edulcerias')->with(compact('notification'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $edulceria)
    {
        return view('edulcerias.edit',compact('edulceria'));
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
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'digits:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6'
        ];
        $this->validate($request, $rules);
        $user = USER::edulcerias()->findOrFail($id);

        $data = $request->only('name', 'email', 'dni', 'address', 'phone');
        $password = $request->input('password');
        if ($password)
        $data['password'] = bcrypt($password);        
        $user->fill($data);
        $user->save();
        $notification = 'La informacion del Empleado de Dulceria se ha actualizado correctamente';
        return redirect('/edulcerias')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $edulceria)
    {
        $edulceriaName = $edulceria->name;
        $edulceria->delete();
        $notification = "el Paciente $edulceriaName se ha eliminado correctamente";
        return redirect('/edulcerias')->with(compact('notification'));
    }
}
