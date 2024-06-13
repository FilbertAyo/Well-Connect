<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Chatgpt; 
use App\Models\RiskAssesment;
use Illuminate\Support\Facades\Auth;

class ChatGptController extends Controller
{

    public function ask(){
       // Check if the user is authenticated
       if (!Auth::check()) {
        return response()->json(['message' => 'User is not authenticated.'], 401);
    }

    // Get the authenticated user
    $user = Auth::user();

        // Fetch the user's risk assessment data
        $riskAssesment = RiskAssesment::where('email', $user->email)->first();

        if (!$riskAssesment) {
            return response()->json(['message' => 'No risk assessment data found for the user.'], 404);
        }

        // Compose the prompt using the risk assessment data
        $prompt = "Based on the following data, am I at risk of getting a non-communicable disease or do I already have one?\n";
        $prompt .= "Age: {$riskAssesment->age}\n";
        $prompt .= "Weight: {$riskAssesment->weight} Kg\n";
        $prompt .= "Height: {$riskAssesment->height} feet\n";
        $prompt .= "Blood Pressure: {$riskAssesment->pressure}\n";
        $prompt .= "Blood Sugar Level: {$riskAssesment->sugar}";

        // Get the response from ChatGPT
        $response = $this->askChatGpt($prompt);

        // Display the content on your display
        $messageContent = $response['choices'][0]['message']['content'];

        $userId = Auth::id();

         // Store the prompt and response in the database, updating if a record exists
         Chatgpt::updateOrCreate(
            ['user_id' => $userId], // Conditions to check for an existing record
            [
                'prompt' => $prompt,
                'response' => $messageContent,
            ]
        );

        return response()->json([$messageContent]);
    }


    public function askChatGpt($prompt){
        $apiKey = config('openai.api_key');
        $response = Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => "gpt-3.5-turbo",
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],
                'max_tokens' => 1000,
            ]);
            return $response->json(); // Convert the response to JSON
    }
}
