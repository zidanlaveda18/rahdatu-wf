<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use GuzzleHttp\Client;

class BotManController extends Controller
{
    private $openaiClient;

    // Konstruktor untuk membuat instansi Guzzle HTTP Client
    public function __construct()
    {
        // Membuat client Guzzle untuk OpenAI
        $this->openaiClient = new Client();
    }

    // Fungsi utama untuk menangani percakapan
    public function handle()
    {
        $botman = app('botman');

        // Mendengarkan setiap pesan yang dikirimkan pengguna
        $botman->hears('{message}', function($botman, $message) {
            // Memanggil fungsi untuk mendapatkan respons dari OpenAI
            $response = $this->getAIResponseFromOpenAI($message);
            // Mengirimkan respons kembali ke pengguna
            $botman->reply($response);
        });

        // Mulai mendengarkan pesan
        $botman->listen();
    }

    // Fungsi untuk mendapatkan respons dari OpenAI API
    private function getAIResponseFromOpenAI($message)
    {
        try {
            // Melakukan permintaan ke OpenAI GPT-4 (atau GPT-3)
            $response = $this->openaiClient->post('https://api.openai.com/v1/completions', [
                'json' => [
                    'model' => 'gpt-4', // Anda bisa menggunakan "text-davinci-003" atau model lainnya
                    'prompt' => $message, // Mengirimkan pesan yang dikirim oleh pengguna
                    'max_tokens' => 150, // Maksimal token untuk respons
                    'temperature' => 0.7, // Variasi respons (semakin tinggi, semakin variatif)
                    'top_p' => 1.0, // Pengaturan puncak untuk sampling
                    'frequency_penalty' => 0.0,
                    'presence_penalty' => 0.0
                ],
                'headers' => [
                    'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'), // Menyertakan API Key Anda
                ]
            ]);

            // Mendapatkan respons dari API dan menguraikannya
            $body = json_decode($response->getBody()->getContents(), true);

            // Mengembalikan teks dari respons yang diterima
            return $body['choices'][0]['text'] ?? 'Maaf, saya tidak bisa memberikan respons saat ini.';
        } catch (\Exception $e) {
            // Menangani kesalahan jika terjadi masalah dengan permintaan API
            return 'Terjadi kesalahan saat memproses permintaan. Silakan coba lagi nanti.';
        }
    }
}
