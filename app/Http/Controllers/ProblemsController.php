<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProblemsController extends Controller
{
    public function index()
    {
        return Inertia::render('Problem/Index', [
            'problems' => Problem::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Problem/Create');
    }

    public function store(Request $request)
    {
        Problem::create($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]));

        return redirect()->route('problems.index');
    }

    public function edit(Problem $problem)
    {
        return Inertia::render('Problem/Edit', ['problem' => $problem]);
    }

    public function update(Request $request, Problem $problem)
    {
        $problem->update($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]));

        return redirect()->route('problems.index');
    }

    public function destroy(Problem $problem)
    {
        $problem->delete();
        return redirect()->back();
    }
}
