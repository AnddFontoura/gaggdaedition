<?php

namespace App\Http\Controllers;

use App\Group;
use App\Matches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function index()
    {
        $userId = Auth::user()->id;
        $userInfo = Group::where('user_id', $userId)->first();
        $userInfoId = $userInfo->id ?? null;
        $groups = null;
        $groupMatches = null;
        $octavesMatches = null;
        $quarterMatches = null;
        $semiMatches = null;
        $finalMatches = null;

        if ($userInfo) {
            $groups = Group::where('group', $userInfo->group)
                ->orderBy('group', 'asc')
                ->orderBy('points', 'desc')
                ->orderBy('goals_conceded', 'desc')
                ->orderBy('yellow_card', 'desc')
                ->orderBy('red_card', 'desc')
                ->orderBy('group_position', 'asc')
                ->get();

            $groupMatches = Matches::where(function ($matches) use ($userInfoId) {
                $matches->where('challenger_1', '=', $userInfoId)
                    ->orWhere('challenger_2', '=', $userInfoId);
            })
                ->where('type', 'GROUP')
                ->get();


            $octavesMatches = Matches::where(function ($matches) use ($userInfoId) {
                $matches->where('challenger_1', '=', $userInfoId)
                    ->orWhere('challenger_2', '=', $userInfoId);
            })
                ->where('type', 'OCTAVES')
                ->get();

            $quarterMatches = Matches::where(function ($matches) use ($userInfoId) {
                $matches->where('challenger_1', '=', $userInfoId)
                    ->orWhere('challenger_2', '=', $userInfoId);
            })
                ->where('type', 'QUARTER')
                ->get();

            $semiMatches = Matches::where(function ($matches) use ($userInfoId) {
                $matches->where('challenger_1', '=', $userInfoId)
                    ->orWhere('challenger_2', '=', $userInfoId);
            })
                ->where('type', 'SEMI')
                ->get();

            $finalMatches = Matches::where(function ($matches) use ($userInfoId) {
                $matches->where('challenger_1', '=', $userInfoId)
                    ->orWhere('challenger_2', '=', $userInfoId);
            })
                ->where('type', 'FINAL')
                ->get();

        }

        return view('home', compact('userInfo', 'groups', 'groupMatches', 'octavesMatches', 'quarterMatches', 'semiMatches', 'finalMatches'));
    }
    
    public function dashboard()
    {
        $userId = Auth::user()->id;
        $userInfo = Group::where('user_id', $userId)->first();
        $userInfoId = $userInfo->id ?? null;
        $groups = null;
        $groupMatches = null;
        $octavesMatches = null;
        $quarterMatches = null;
        $semiMatches = null;
        $finalMatches = null;

        if ($userInfo) {
            $groups = Group::where('group', $userInfo->group)
                ->orderBy('group', 'asc')
                ->orderBy('points', 'desc')
                ->orderBy('goals_conceded', 'desc')
                ->orderBy('yellow_card', 'desc')
                ->orderBy('red_card', 'desc')
                ->orderBy('group_position', 'asc')
                ->get();

            $groupMatches = Matches::where(function ($matches) use ($userInfoId) {
                $matches->where('challenger_1', '=', $userInfoId)
                    ->orWhere('challenger_2', '=', $userInfoId);
            })
                ->where('type', 'GROUP')
                ->get();


            $octavesMatches = Matches::where(function ($matches) use ($userInfoId) {
                $matches->where('challenger_1', '=', $userInfoId)
                    ->orWhere('challenger_2', '=', $userInfoId);
            })
                ->where('type', 'OCTAVES')
                ->get();

            $quarterMatches = Matches::where(function ($matches) use ($userInfoId) {
                $matches->where('challenger_1', '=', $userInfoId)
                    ->orWhere('challenger_2', '=', $userInfoId);
            })
                ->where('type', 'QUARTER')
                ->get();

            $semiMatches = Matches::where(function ($matches) use ($userInfoId) {
                $matches->where('challenger_1', '=', $userInfoId)
                    ->orWhere('challenger_2', '=', $userInfoId);
            })
                ->where('type', 'SEMI')
                ->get();

            $finalMatches = Matches::where(function ($matches) use ($userInfoId) {
                $matches->where('challenger_1', '=', $userInfoId)
                    ->orWhere('challenger_2', '=', $userInfoId);
            })
                ->where('type', 'FINAL')
                ->get();

        }

        return view('home', compact('userInfo', 'groups', 'groupMatches', 'octavesMatches', 'quarterMatches', 'semiMatches', 'finalMatches'));
    }
}
