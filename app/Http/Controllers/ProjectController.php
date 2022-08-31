<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function index() : JsonResponse
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    public function store(Request $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->save();

        return response()->json($project);
    }

    public function show($id)
    {
        $project = Project::find($id);
        return response()->json($project);
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->save();

        return response()->json($project);
    }

    public function destroy($id)
    {
        Project::destroy($id);

        return response()->json(['message' => 'Deleted']);
    }
}
