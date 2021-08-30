<?php

namespace App\Http\Controllers;


use App\Models\About;
use App\Models\SecondSlider;
use App\Models\TeamMember;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function index()
    {




        $language = app()->getLocale();
        $team_members = TeamMember::withTranslation($language)->get();
        $about = About::query()->withTranslation($language)->firstOrFail();
        $vacancies = Vacancy::withTranslation($language)->get();
        $slider_url = SecondSlider::all();

        $url_storage = Storage::url('');
        return view('about',compact('about','team_members','vacancies','slider_url','url_storage'));
    }

}