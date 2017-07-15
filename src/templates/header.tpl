<!DOCTYPE html>
<html lang="{$language}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@jens1o" />
    <meta name="twitter:title" content="Jens Hausdorf" />
    <meta name="twitter:description" content="Go to jens1o's website" />
    <meta name="twitter:image" content="https://www.gravatar.com/avatar/8b464a8b587c833f435541619d605f40?s=200" />
    <title>Jens Hausdorf</title>
    <link rel="stylesheet" href="assets/css/master.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link type="text/plain" rel="author" href="https://jens-hausdorf.de/humans.txt" />
</head>
<body>
    <!-- Actually, all browsers who not support css grids do not support es2017 syntax, so it's true in any case. -->

    <p class="msg">Hi! I'm sorry, but <strong>your browser is not modern</strong> and does not provide awesome techniques which are required by this page. I recommend you to <a rel="nofollow noopener noreferrer" href="https://www.mozilla.org/firefox/">switch to a modern browser</a>.</p>

    <div class="grid{if $useGridLayout} threeColumns{/if}">
        <header>
            <h3>{randomGreeting|escape}</h3>
            <pre>{$statusCode}</pre>
        </header>

        <article>