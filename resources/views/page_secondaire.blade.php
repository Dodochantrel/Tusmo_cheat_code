<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/page_secondaire.css">
</head>
<body>

    <form method="POST" action="{{ route('ajouter_lettre') }}">
        @csrf

        <input type="number" value="{{ $nombre_de_lettre }}" name="nombre_de_lettre"><br>

        <h2>Le mot</h2>
        <div class="mot">
            <input type="text" value='{{ $premiere_lettre }}' name="lettre[]">
            @for ($i = 1; $i < $nombre_de_lettre; $i++)
                <input type="text" name='lettre[]'>
            @endfor
        </div>

        <div class="lettre_incorrect">
            <h2>Lettre incorrect</h2>
            @for ($i = 0; $i < 18; $i++)
                <input type="text" name="lettre_incorrect[]" maxlength="1">
            @endfor
        </div>

        <h2>Les lettre correct mais mal placé</h2>
        <div class="mot">
            @for ($i = 0; $i < $nombre_de_lettre; $i++)
                <input type="text" name='lettre_correct_mal_place[]'>
            @endfor
        </div>
        <div class="mot">
            @for ($i = 0; $i < $nombre_de_lettre; $i++)
                <input type="text" name='lettre_correct_mal_place[]'>
            @endfor
        </div>
        <div class="mot">
            @for ($i = 0; $i < $nombre_de_lettre; $i++)
                <input type="text" name='lettre_correct_mal_place[]'>
            @endfor
        </div>
        <div class="mot">
            @for ($i = 0; $i < $nombre_de_lettre; $i++)
                <input type="text" name='lettre_correct_mal_place[]'>
            @endfor
        </div>
        <div class="mot">
            @for ($i = 0; $i < $nombre_de_lettre; $i++)
                <input type="text" name='lettre_correct_mal_place[]'>
            @endfor
        </div>
        <div class="mot">
            @for ($i = 0; $i < $nombre_de_lettre; $i++)
                <input type="text" name='lettre_correct_mal_place[]'>
            @endfor
        </div>

        <input type="submit" value="Chercher">
    </form>

    <section class="resultat">
        <h2>Resultat</h2>
        <div class="liste_des_mots">
            @foreach ($resultats as $resutat)
                <p>{{ $resutat->mots }}</p>
            @endforeach
        </div>
    </section>

</body>
</html>