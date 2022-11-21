<?php

namespace App\Http\Controllers;

use App\Traits\Image;
use App\Models\GameProject;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreGameProjectRequest;
use App\Http\Requests\UpdateGameProjectRequest;
use App\Models\GameSection;

class GameProjectController extends Controller
{
    use Image;

    public function index()
    {
        $game_projects = GameProject::with('sections')->latest()->paginate(10);
        return view('gameproject.index', compact('game_projects'));
    }

    public function create()
    {
        return view('gameproject.create');
    }

    public function store(StoreGameProjectRequest $request)
    {
        DB::beginTransaction();
        try {
            $image = $this->upload($request->file('thumbnail'),'games');
            GameProject::create([
                'title' => $request->validated('title'),
                'thumbnail' => $image
            ]);
            DB::commit();

            return redirect()->route('game-project.index')->with('success','Game Project Has Created');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('game-project.index')->with('error',$th);
        }
    }

    public function show(GameProject $gameProject)
    {
        $game_sections = GameSection::where('game_project_id',$gameProject->id)->orderBy('part','asc')->paginate(10);
        return view('gameproject.section.index', compact('game_sections'));
    }

    public function edit(GameProject $gameProject)
    {
        return view('gameproject.edit', compact('gameProject'));
    }

    public function update(UpdateGameProjectRequest $request, GameProject $gameProject)
    {
        DB::beginTransaction();
        try {
            if($request->hasFile('thumbnail')){
                $this->remove($gameProject->thumbnail,'games');
                $image = $this->upload($request->file('thumbnail'),'games');

                $gameProject->update([
                    'title' => $request->validated('title'),
                    'thumbnail' => $image
                ]);
            }

            $gameProject->update([
                'title' => $request->validated('title')
            ]);

            DB::commit();
            return redirect()->route('game-project.index')->with('success','Game Project Has Updated');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('game-project.index')->with('error',$th);
        }
    }

    public function destroy(GameProject $gameProject)
    {
        DB::beginTransaction();
        try {
            $this->remove($gameProject->thumbnail,'games');
            $gameProject->delete();
            DB::commit();
            return redirect()->route('game-project.index')->with('success','Game Project Has Deleted');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('game-project.index')->with('error',$th);
        }
    }
}
