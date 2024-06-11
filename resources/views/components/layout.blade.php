<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
    <title>30 days to learn | Laravel</title>
</head>

<body>
    @include('components.nav')
    <header>
        <div>
            <h1>{{$heading}}</h1>
        </div>
    </header>

    <main>
        {{$slot}}
    </main>

    <style>
        :root {
            --padding-inline: 4rem;
        }

        header {
            padding-inline: var(--padding-inline);
        }

        main {
            padding-inline: var(--padding-inline);
        }
    </style>
</body>

</html>