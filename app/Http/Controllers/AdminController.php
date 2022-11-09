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
            if (isset($filter['filterPlayer']) && $filter['filterPlayer'] != 0) {
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
        $match = null;
        $groups = Group::get();

        if($matchId) {
            $match = Matches::where('id', $matchId)->first();
        }

        return view('admin.match.form', compact('match', 'groups'));
    }

    public function matchesUpdate(Request $request, int $matchId)
    {
        $this->validate($request, [
            'match_number' => 'required|integer',
        ]);

        $data = $request->except('_token');

        Matches::where('id', $matchId)->update($data);

        return redirect('admin/matches');
    }
}
