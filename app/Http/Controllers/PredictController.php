<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PredictController extends Controller
{
    /**
     * Handle image prediction.
     */
    public function predictImage(Request $request)
    {
        // Validate the uploaded image
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        // Optionally, store or process the image here
        // $path = $request->file('image')->store('public/predictions');

        // Simulate a prediction result
        $results = ['Positive', 'Negative', 'Inconclusive'];
        $result = $results[array_rand($results)];

        // Redirect back with a flash message containing the result
        return redirect()->back()->with('result', $result);
    }

    /**
     * Handle manual input prediction.
     */
    public function predictManual(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name'    => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'age'     => 'required|integer|min:0',
            'smokes'  => 'required|in:yes,no',
            'areaq'   => 'required|string|max:255',
            'alkhol'  => 'required|string|max:255',
        ]);

        // Simulate a prediction result
        $results = ['Low Risk', 'Moderate Risk', 'High Risk'];
        $result = $results[array_rand($results)];

        // Redirect back with a flash message containing the result
        return redirect()->back()->with('result', $result);
    }
}
