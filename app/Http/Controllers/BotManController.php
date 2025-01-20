<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {
            $response = $this->getAIResponse($message);
            $botman->reply($response);
        });

        $botman->listen();
    }

    private function getAIResponse($message)
    {
        // Logika AI untuk memproses pesan dan memberikan rekomendasi produk
        // Misalnya, mengintegrasikan API AI seperti Dialogflow atau OpenAI
        return "Ini adalah rekomendasi produk berdasarkan pesan Anda: $message";
    }
}