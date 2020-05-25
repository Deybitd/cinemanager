<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

class EtaquillaController extends Controller
{

    public function index()
    {   
        $etaquillas = User::etaquillas()->paginate(5);
        return view('etaquillas.index', compact('etaquillas'));
    }

    public function create()
    {
        return view('etaquillas.create');
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
                'role' => 'taquilla',
                'password' => bcrypt($request->input('password'))
            ]
    );
        $notification = 'El Empleado de Taquilla se ah Registrado Correctamente';
        return redirect('/etaquillas')->with(compact('notification'));
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
    public function edit(User $etaquilla)
    {
        return view('etaquillas.edit',compact('etaquilla'));
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
        $user = USER::etaquillas()->findOrFail($id);

        $data = $request->only('name', 'email', 'dni', 'address', 'phone');
        $password = $request->input('password');
        if ($password)
        $data['password'] = bcrypt($password);        
        $user->fill($data);
        $user->save();
        $notification = 'La informacion del Empleado de Dulceria se ha actualizado correctamente';
        return redirect('/etaquillas')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $etaquilla)
    {
        $etaquillaName = $etaquilla->name;
        $etaquilla->delete();
        $notification = "el Paciente $etaquillaName se ha eliminado correctamente";
        return redirect('/etaquillas')->with(compact('notification'));
    }
}
