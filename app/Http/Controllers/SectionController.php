<?php

namespace App\Http\Controllers;

use App\Traits\Part;
use App\Models\GameProject;
use App\Models\GameSection;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreGameSectionRequest;
use App\Http\Requests\UpdateGameSectionRequest;

class SectionController extends Controller
{
    use Part;

    public function create()
    {
        $game_projects = GameProject::notFinish()->get();
        return view('gameproject.section.create',compact('game_projects'));
    }

    public function store(StoreGameSectionRequest $request)
    {
        DB::beginTransaction();
        try {
            GameSection::create([
                'game_project_id'   => $request->validated('game_project_id'),
                'part'              => $this->gameSection($request->validated('game_project_id')),
                'title'             => $request->validated('title')
            ]);
            DB::commit();
            return redirect()->route('game-project.show', $request->validated('game_project_id'))->with('success','Game Section Has Been Created');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('game-project.show', $request->validated('game_project_id'))->with('error',$th);
        }
    }

    public function show(GameSection $gameSection)
    {
        //
    }

    public function edit(GameSection $gameSection)
    {
        $game_projects = GameProject::notFinish()->get();
        return view('gameproject.section.edit',compact(['game_projects','gameSection']));
    }

    public function update(UpdateGameSectionRequest $request, GameSection $gameSection)
    {
        DB::beginTransaction();
        try {
            $gameSection->update([
                'game_project_id'   => $request->validated('game_project_id'),
                'part'              => $request->validated('part'),
                'title'             => $request->validated('title')
            ]);
            DB::commit();
            return redirect()->route('game-project.show', $request->validated('game_project_id'))->with('success','Game Section Has Been Updated');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('game-project.show', $request->validated('game_project_id'))->with('error',$th);
        }
    }

    public function destroy(GameSection $gameSection)
    {
        DB::beginTransaction();
        try {
            $gameSection->delete();
            DB::commit();
            return redirect()->back()->with('success','Game Section Has Been Deleted');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error',$th);
        }
    }
}
