<?php

namespace ITF\Http\Controllers;

use ITF\Main;
use ITF\KnowAbout;
use ITF\KnowService;
use ITF\EduOther;
use Illuminate\Http\Request;

class MainController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $main = new Main();
        $main->state = $request->state;
        $main->education = $request->education;
        $main->know_itf = $request->know;
        $main->know_itf_others = $request->others;
        $main->know_services = $request->serve;
        $main->benefitted = $request->benefit;
        $main->how_benefit = $request->benefiter;

        $main->save();

        if($request->education == 'Others'){
            $about = new EduOther();
            $about->main_id = $main->id;
            $about->item = $request->other_edu;
            $about->save();
        }

        if($request->others){
            $about = new KnowAbout();
            $about->main_id = $main->id;
            $about->item = 'Others';
            $about->save();
        }

        if($request->input('about')){
            foreach($request->input('about') as $ab){
                $about = new KnowAbout();
                $about->main_id = $main->id;
                $about->item = $ab;

                $about->save();

            }
        }

        if($request->input('services')){
            foreach($request->input('services') as $serve){
                $service = new KnowService();
                $service->main_id = $main->id;
                $service->item = $serve;

                $service->save();
            }
        }


        return redirect()->to('thanks');
    }

}
