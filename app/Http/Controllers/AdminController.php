<?php

namespace App\Http\Controllers;

use App\Group;
use App\Matches;
use App\MatchInfo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $matchPhase = [
        'GROUP' => 'Fase de Grupos',
        'OCTAVES' => 'Oitavas de Finais',
        'QUARTER' => 'Quartas de Finais',
        'SEMI' => 'Semi Finais',
        'FINAL' => 'Finais',
    ];

    public function matchesIndex(Request $request)
    {
        $filter = $request->except('_token');
        $matches = Matches::select();
        $matchPhases = $this->matchPhase;

        if ($filter) {
            if (isset($filter['filterPlayer']) && $filter['filterPlayer'] != 0) {
                $filterPlayer = $filter['filterPlayer'];
                $matches = $matches->where(function ($matches) use ($filterPlayer) {
                    $matches->where('challenger_1', '=', $filterPlayer)
                        ->orWhere('challenger_2', '=', $filterPlayer);
                });
            }

            if (isset($filter['matchPosition']) && $filter['matchPosition']) {
                $matches = $matches->where('match_number', $filter['matchPosition']);
            }

            if(isset($filter['type']) && $filter['type']) {
                $matches = $matches->where('type', $filter['type']);
            }
        }

        $groups = Group::get();
        $matches = $matches->orderBy('match_number', 'asc')->paginate(10);

        return view('admin.match.index', compact('matches', 'groups', 'matchPhases'));
    }

    public function newMatchForm(int $matchId = null)
    {
        $match = null;
        $groups = Group::get();
        $matchPhases = $this->matchPhase;

        if ($matchId) {
            $match = Matches::where('id', $matchId)->first();
        }

        return view('admin.match.new_form', compact('match', 'groups', 'matchPhases'));
    }

    public function matchesForm(int $matchId = null)
    {
        $match = null;
        $groups = Group::get();

        if ($matchId) {
            $match = Matches::where('id', $matchId)->first();
        }

        return view('admin.match.form', compact('match', 'groups'));
    }

    public function matchResultForm(int $matchId)
    {
        $match = Matches::where('id', $matchId)->first();
        $challenger1Info = MatchInfo::where('group_id', $match->challenger_1)
            ->where('match_id', $matchId)
            ->first();
        $challenger2Info = MatchInfo::where('group_id', $match->challenger_2)
            ->where('match_id', $matchId)
            ->first();

        return view('admin.match.result_form', compact('match', 'challenger2Info', 'challenger1Info'));
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

    public function newMatchSave(Request $request, int $matchId = null)
    {
        $this->validate($request, [
            'challenger_1' => 'required|integer',
            'challenger_2' => 'required|integer',
            'type' => 'required|in:GROUP,OCTAVES,QUARTER,SEMI,FINAL',
            'match_number' => 'required|integer'
        ]);

        $data = $request->except('_token');
        if ($matchId) {
            Matches::where('id', $matchId)->update($data);
        } else {
            Matches::create($data);
        }

        return redirect('admin/matches');
    }

    public function MatchResultSave(Request $request, int $matchId)
    {
        $this->validate($request, [
            'challenger1_goals_scored' => 'required|integer',
            'challenger1_yellow_card' => 'required|integer',
            'challenger1_red_card' => 'required|integer',
            'challenger2_goals_scored' => 'required|integer',
            'challenger2_yellow_card' => 'required|integer',
            'challenger2_red_card' => 'required|integer',
        ]);

        $data = $request->except('_token');
        $match = Matches::where('id', $matchId)->first();
        $match->challenger_1_score = $data['challenger1_goals_scored'];
        $match->challenger_2_score = $data['challenger2_goals_scored'];
        $match->save();

        $challengerIds = [
            1 => $match->challenger_1,
            2 => $match->challenger_2,
        ];

        foreach ($challengerIds as $key => $challengerId) {
            if ($key == 1) {
                $otherKey = 2;
            } else {
                $otherKey = 1;
            }

            $victory = 0;
            $draw = 0;
            $defeat = 0;
            $points = 0;

            if ($data['challenger' . $key . '_goals_scored'] > $data['challenger' . $otherKey . '_goals_scored']) {
                $victory = 1;
                $points = 3;
            }

            if ($data['challenger' . $key . '_goals_scored'] == $data['challenger' . $otherKey . '_goals_scored']) {
                $draw = 1;
                $points = 1;
            }

            if ($data['challenger' . $key . '_goals_scored'] < $data['challenger' . $otherKey . '_goals_scored']) {
                $defeat = 1;
            }

            $matchInfo = MatchInfo::where('match_id', $matchId)->where('group_id', $challengerId)->first();

            if (!$matchInfo) {
                MatchInfo::create([
                    'match_id' => $matchId,
                    'group_id' => $challengerIds[$key],
                    'victories' => $victory,
                    'drawns' => $draw,
                    'defeats' => $defeat,
                    'goals_scored' => $data['challenger' . $key . '_goals_scored'],
                    'goals_conceded' => $data['challenger' . $otherKey . '_goals_scored'],
                    'red_card' => $data['challenger' . $key . '_red_card'],
                    'yellow_card' => $data['challenger' . $key . '_yellow_card'],
                ]);
                
                $group = Group::where('id', $challengerIds[$key])->first();
                
                if($data['challenger' . $key . '_red_card']) {
                    $points -= 1;
                }

                if ($match->type == 'GROUP') {
                    $group->points += $points;
                    $group->matches += 1;
                    $group->victories += $victory;
                    $group->drawns += $draw;
                    $group->defeats += $defeat;
                    $group->goals_scored += $data['challenger' . $key . '_goals_scored'];
                    $group->goals_conceded += $data['challenger' . $otherKey . '_goals_scored'];
                    $group->red_card += $data['challenger' . $key . '_red_card'];
                    $group->yellow_card += $data['challenger' . $key . '_yellow_card'];
                    $group->save();
                }
                
            } else {
                MatchInfo::where('match_id', $matchId)
                    ->where('group_id', $challengerIds[$key])
                    ->update([
                        'victories' => $victory,
                        'drawns' => $draw,
                        'defeats' => $defeat,
                        'goals_scored' => $data['challenger' . $key . '_goals_scored'],
                        'goals_conceded' => $data['challenger' . $otherKey . '_goals_scored'],
                        'red_card' => $data['challenger' . $key . '_red_card'],
                        'yellow_card' => $data['challenger' . $key . '_yellow_card'],
                    ]);
            }
        }

        return redirect('admin/matches');
    }


}
