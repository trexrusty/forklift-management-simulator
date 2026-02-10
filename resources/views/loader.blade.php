<!DOCTYPE html>
<html>
    <head>
        <title>Loader</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        @vite('resources/js/app.js')
        <h1>Loader</h1>
        @foreach ($saves as $save)
            <div>
                <a href="{{ route('selectSave', $save->id) }}">{{ $save->name }}</a>
            </div>
        @endforeach 
        {{ Session::get('save_id') }}
    </body>
</html>