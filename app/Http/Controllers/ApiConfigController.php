<?php

namespace App\Http\Controllers;

use App\Models\ApiConfig;
use Illuminate\Http\Request;

class ApiConfigController extends Controller
{
    /**
     * Display a listing of API configurations.
     */
    public function index()
    {
        $apiConfigs = ApiConfig::orderBy('created_at', 'desc')->get();
        return view('admin.api-configs.index', compact('apiConfigs'));
    }

    /**
     * Show the form for creating a new API configuration.
     */
    public function create()
    {
        return view('admin.api-configs.create');
    }

    /**
     * Store a newly created API configuration in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'endpoint'    => 'required|url',
            'description' => 'nullable|string',
        ]);

        ApiConfig::create($data);

        return redirect()->route('admin.api-configs.index')
            ->with('success', 'API configuration created successfully.');
    }

    /**
     * Show the form for editing the specified API configuration.
     */
    public function edit($id)
    {
        $apiConfig = ApiConfig::findOrFail($id);
        return view('admin.api-configs.edit', compact('apiConfig'));
    }

    /**
     * Update the specified API configuration in storage.
     */
    public function update(Request $request, $id)
    {
        $apiConfig = ApiConfig::findOrFail($id);

        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'endpoint'    => 'required|url',
            'description' => 'nullable|string',
        ]);

        $apiConfig->update($data);

        return redirect()->route('admin.api-configs.index')
            ->with('success', 'API configuration updated successfully.');
    }

    /**
     * Remove the specified API configuration from storage.
     */
    public function destroy($id)
    {
        $apiConfig = ApiConfig::findOrFail($id);
        $apiConfig->delete();

        return redirect()->route('admin.api-configs.index')
            ->with('success', 'API configuration deleted successfully.');
    }
}
