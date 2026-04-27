<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Return a list of all projects (for React frontend).
     * Supports optional filtering by tech stack.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Project::latest();

        // Filter by tech stack if provided
        if ($request->has('tech') && $request->tech !== 'all') {
            $tech = $request->tech;
            $query->whereJsonContains('tech_stack', $tech);
        }

        $projects = $query->get()->map(function (Project $project) {
            return [
                'id' => $project->id,
                'title' => $project->title,
                'slug' => $project->slug,
                'description' => $project->description,
                'image_url' => $project->image_path
                    ? asset('storage/' . $project->image_path)
                    : null,
                'tech_stack' => $project->tech_stack ?? [],
                'repository_link' => $project->repository_link,
                'created_at' => $project->created_at->toDateString(),
            ];
        });

        // Collect unique tech stacks for filter options
        $allTechs = Project::whereNotNull('tech_stack')
            ->pluck('tech_stack')
            ->flatten()
            ->unique()
            ->values();

        return response()->json([
            'projects' => $projects,
            'techs' => $allTechs,
        ]);
    }

    /**
     * Return a single project by slug.
     */
    public function show(Project $project): JsonResponse
    {
        return response()->json([
            'id' => $project->id,
            'title' => $project->title,
            'slug' => $project->slug,
            'description' => $project->description,
            'image_url' => $project->image_path
                ? asset('storage/' . $project->image_path)
                : null,
            'tech_stack' => $project->tech_stack ?? [],
            'repository_link' => $project->repository_link,
            'created_at' => $project->created_at->toDateString(),
        ]);
    }
}
