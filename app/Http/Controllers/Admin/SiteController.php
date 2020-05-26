<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Movie;
use App\Sala;
use App\Show;
use App\Site;
use Illuminate\Http\Request;
use Carbon\Carbon;


class SiteController extends Controller
{
    
   

    public function index()
    {
        // $movies = Movie::all()->paginate(5);
        $sites = Site::sites()->paginate(5);
    
        return view('sites.index',compact('sites'));
    }


    public function crear (Site $request,string $fila,string $asiento){
        
       

    }
  
    public static function  store(Site $request,string $fila,string $asiento)
    {
        //dd($request->all());// mostrar valores en pantalla
    

    }

    


    public function destroy(Show $show)
    {   $deletedShow = $show->nombre;
        $show->delete();
    }

}
