<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Music Search</title>
</head>
<body>
    <h1>Search Music on Spotify</h1>
    <form action="{{ route('spotify.search') }}" method="get">
        <input type="text" name="query" placeholder="Search for music" required>
        <button type="submit">Search</button>
    </form>

    @if(isset($data['tracks']['items']) && count($data['tracks']['items']) > 0)
        <h2>Results:</h2>
        <ul>
            @foreach($data['tracks']['items'] as $track)
                <li>
                    <strong>{{ $track['name'] }}</strong> by 
                    @foreach($track['artists'] as $artist)
                        <span>{{ $artist['name'] }}</span>
                    @endforeach
                    <br>
                    <audio controls>
                        <source src="{{ $track['preview_url'] }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </li>
            @endforeach
        </ul>
    @else
        <p>No results found.</p>
    @endif
</body>
</html>
