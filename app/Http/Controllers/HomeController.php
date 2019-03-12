<?php

namespace ITF\Http\Controllers;

use ITF\Main;
use ITF\KnowAbout;
use ITF\KnowService;
use ITF\EduOther;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state = DB::table('mains')
                 ->select('state', DB::raw('count(*) as total'))
                 ->groupBy('state')
                 ->get();
        $education = DB::table('mains')
                 ->select('education', DB::raw('count(*) as total'))
                 ->groupBy('education')
                 ->get();

        $know = DB::table('mains')
                 ->select('know_itf', DB::raw('count(*) as total'))
                 ->groupBy('know_itf')
                 ->get();

        $how_know = DB::table('know_abouts')
                 ->select('item', DB::raw('count(*) as total'))
                 ->groupBy('item')
                 ->get();

        $aware = DB::table('mains')
                 ->select('know_services', DB::raw('count(*) as total'))
                 ->groupBy('know_services')
                 ->get();

        $how_aware = DB::table('know_services')
                 ->select('item', DB::raw('count(*) as total'))
                 ->groupBy('item')
                 ->get();

        $benefit = DB::table('mains')
                 ->select('benefitted', DB::raw('count(*) as total'))
                 ->groupBy('benefitted')
                 ->get();

        return view('home')->with([
            'state'=> $state,
            'education' => $education,
            'knowledge' => $know,
            'how_know' => $how_know,
            'aware' => $aware,
            'how_aware' => $how_aware,
            'benefit' => $benefit,
             ]);
    }

    public function state()
    {
        // Get stats for state
        $state = DB::table('mains')
            ->select('state', DB::raw('count(*) as total'))
            ->groupBy('state')
            ->get();

            $save_state = [];
            $save_num = [];
        foreach($state as $s){
            $save_state[] = $s->state;
            $save_num[] = $s->total;
        }

        // Get stats for education
        $education = DB::table('mains')
                 ->select('education', DB::raw('count(*) as total'))
                 ->groupBy('education')
                 ->get();
        $edu_name = [];
        $edu_total = [];
        foreach($education as $s){
                 $edu_name[] = $s->education;
                 $edu_total[] = $s->total;
             }

        // Get stats for Knowledge from mains
        $know = DB::table('mains')
             ->select('know_itf', DB::raw('count(*) as total'))
             ->groupBy('know_itf')
             ->get();
        $know_name = [];
        $know_total = [];
        foreach($know as $s){
             $know_name[] = $s->know_itf;
             $know_total[] = $s->total;
         }

         // Get stats of How people know the ITF from
         $how_know = DB::table('know_abouts')
            ->select('item', DB::raw('count(*) as total'))
            ->groupBy('item')
            ->get();
        $about_name = [];
        $about_total = [];
        foreach($how_know as $s){
            $about_name[] = $s->item;
            $about_total[] = $s->total;
        }

        $aware = DB::table('mains')
            ->select('know_services', DB::raw('count(*) as total'))
            ->groupBy('know_services')
            ->get();
        $aware_name = [];
        $aware_total = [];
        foreach($aware as $s){
            $aware_name[] = $s->know_services;
            $aware_total[] = $s->total;
        }

        $how_aware = DB::table('know_services')
            ->select('item', DB::raw('count(*) as total'))
            ->groupBy('item')
            ->get();
        $how_aware_name = [];
        $how_aware_total = [];
        foreach($how_aware as $s){
            $how_aware_name[] = $s->item;
            $how_aware_total[] = $s->total;
        }

        $benefit = DB::table('mains')
                    ->select('benefitted', DB::raw('count(*) as total'))
                    ->groupBy('benefitted')
                    ->get();
        $benefit_name = [];
        $benefit_total = [];
        foreach($benefit as $s){
            $benefit_name[] = $s->benefitted;
            $benefit_total[] = $s->total;
        }




        $data = [
            "state" => $save_state,
            "total" => $save_num,
            "edu_name" => $edu_name,
            "edu_total" => $edu_total,
            "know_name" => $know_name,
            "know_total" => $know_total,
            "about_name" => $about_name,
            "about_total" => $about_total,
            "aware_name" => $aware_name,
            "aware_total" => $aware_total,
            "how_aware_name" => $how_aware_name,
            "how_aware_total" => $how_aware_total,
            "benefit_name" => $benefit_name,
            "benefit_total" => $benefit_total,
        ];

        return response()->json($data);
    }

    public function benefit(){
        $details = DB::table('mains')
                 ->whereNotNull('how_benefit')
                 ->get();
        $benefit = DB::table('mains')
                 ->select('benefitted', DB::raw('count(*) as total'))
                 ->groupBy('benefitted')
                 ->get();

        return view('benefit')->with([
            'benefit' => $benefit,
            'details' => $details,
             ]);
    }

    public function knowledge(){
        $know = DB::table('mains')
                 ->select('know_itf', DB::raw('count(*) as total'))
                 ->groupBy('know_itf')
                 ->get();

        $how_know = DB::table('know_abouts')
                 ->select('item', DB::raw('count(*) as total'))
                 ->groupBy('item')
                 ->get();

        $details = DB::table('mains')
                 ->whereNotNull('know_itf_others')
                 ->get();

        return view('knowledge')->with([
            'knowledge' => $know,
            'how_know' => $how_know,
            'details' => $details,
        ]);

	}
	
	public function education(){
        $details = EduOther::all();

		$education = DB::table('mains')
                 ->select('education', DB::raw('count(*) as total'))
                 ->groupBy('education')
                 ->get();

        return view('education')->with([
            'education' => $education,
            'details' => $details,
             ]);
    }


}
