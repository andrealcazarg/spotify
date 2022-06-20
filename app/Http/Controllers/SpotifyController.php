<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class SpotifyController extends Controller
{

    private $clientId;
    private $clientSecret;
    private $redirectUri = 'http://192.168.33.10:8000/playlist';

    public function __construct(){
        $this->clientId = config('spotify.clientId');
        $this->clientSecret = config('spotify.clientSecret');
    }

    public function login()
    {

        $scopes = 'user-read-private user-read-email';
        return redirect(
            'https://accounts.spotify.com/authorize' .
            '?response_type=code' .
            '&client_id=' . $this->clientId .
            ($scopes ? '&scope=' . urlencode($scopes) : '') .
            '&redirect_uri=' . urlencode($this->redirectUri)

        );
    }

    public function getToken()
    {
        if(Session::get('token')==null)
        {
            $code = $_GET['code'];

            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret)
            ])->asForm()
                ->post('https://accounts.spotify.com/api/token', [
                    'code' => trim($code),
                    'redirect_uri' => $this->redirectUri,
                    'grant_type' => 'authorization_code',
                ]);

            return $response->json()['access_token'];
        }

    }
//Obtiene el perfil (Fijarse en la URL)

    public function getUser() {
        if(Session::get('token')==null)
        {
            $token = $this->getToken();
            Session::put('token',$token);
        }

        $profile = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('token')])
            ->get('https://api.spotify.com/v1/me');

        return view('profile')->with(['profile' => $profile->json()]);
    }
    public function getUserSongs() {
        if(Session::get('token')==null)
        {
            $token = $this->getToken();
            Session::put('token',$token);
        }

        $playlist= Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('token')])
            ->get('https://api.spotify.com/v1/me/playlists');

        return view('playlist')->with(['playlist' => $playlist->json()]);
    }

    public function getPlaylistSong() {
        if(Session::get('token')==null)
        {
            $token = $this->getToken();
            Session::put('token',$token);
        }
        $idPlaylist=$_GET['idPlaylist'];
        $song= Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('token')])
            ->get('https://api.spotify.com/v1/playlists/'.$idPlaylist.'/tracks');

        return view('playlistsong')->with(['playlistsong' => $song->json()]);
    }

    public function postPlaylistSong() {
        if(Session::get('token')==null)
        {
            $token = $this->getToken();
            Session::put('token',$token);
        }
        $idPlaylist=$_GET['idPlaylist'];
        $song= Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('token')])
            ->post('https://api.spotify.com/v1/playlists/'.$idPlaylist.'/tracks?uris=spotify%3Atrack%3A30pCOQE19RvNmHq78Svlkm');

        return view('addsong')->with(['addsong' => $song->json()]);
    }

}
