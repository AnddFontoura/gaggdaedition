<?php

namespace App\Http\Controllers;

use App\Group;
use App\Matches;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function matchesIndex(Request $request)
    {
        $filter = $request->except('_token');
        $matches = Matches::select();

        if ($filter) {
            if (isset($filter['filterPlayer']) && $filter['filterPlayer'] !== 0) {
                $filterPlayer = $filter['filterPlayer'];
                $matches = $matches->where(function ($matches) use ($filterPlayer) {
                    $matches->where('challenger_1', '=', $filterPlayer)
                          ->orWhere('challenger_2', '=', $filterPlayer);
                });
            }

            if (isset($filter['matchPosition'])) {
                $matches = $matches->where('match_number', $filter['matchPosition']);
            }
        }

        $groups = Group::get();
        $matches = $matches->paginate(10);

        return view('admin.match.index', compact('matches','groups'));
    }

    public function matchesForm(int $matchId = null)
    {

    }
}
