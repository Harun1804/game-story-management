<?php

namespace App\Http\Controllers;

use App\Traits\Image;
use App\Models\GameProject;
use App\Http\Requests\StoreGameProjectRequest;
use App\Http\Requests\UpdateGameProjectRequest;

class GameProjectController extends Controller
{
    use Image;

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreGameProjectRequest $request)
    {
        //
    }

    public function show(GameProject $gameProject)
    {
        //
    }

    public function edit(GameProject $gameProject)
    {
        //
    }

    public function update(UpdateGameProjectRequest $request, GameProject $gameProject)
    {
        //
    }

    public function destroy(GameProject $gameProject)
    {
        //
    }
}
