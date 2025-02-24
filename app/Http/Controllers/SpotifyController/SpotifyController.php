<?php

namespace App\Http\Controllers\SpotifyController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{
    // Hàm lấy Access Token từ Spotify
    private function getAccessToken()
    {
        $client_id = env('SPOTIFY_CLIENT_ID'); // Lấy từ file .env
        $client_secret = env('SPOTIFY_CLIENT_SECRET'); // Lấy từ file .env

        $response = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
            'client_id' => $client_id,
            'client_secret' => $client_secret,
        ]);

        return $response->json()['access_token'];
    }

    // Hàm tìm kiếm bài hát từ Spotify
    public function search(Request $request)
    {
        $query = $request->input('query', ''); // Từ khóa tìm kiếm
        $access_token = $this->getAccessToken();

        // Gửi yêu cầu đến API Spotify
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $access_token
        ])->get('https://api.spotify.com/v1/search', [
            'q' => $query,
            'type' => 'track',
            'limit' => 10
        ]);

        $data = $response->json();

        // Trả về kết quả cho view
        return view('Client.search.search', compact('data'));
    }
}
