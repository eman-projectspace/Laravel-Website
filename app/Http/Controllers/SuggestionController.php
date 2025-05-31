<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'message' => 'required|string',
        ]);

        Suggestion::create($request->all());

        return back()->with('success', 'Thank you for your suggestion!');
    }
    public function index()
{
    $suggestions = \App\Models\Suggestion::latest()->get(); // fetch all suggestions
    return view('admin.suggestions', compact('suggestions'));
}

}
