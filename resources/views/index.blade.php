<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comparateur de mots</title>
    <link rel="stylesheet" href="nom-du-fichier-css">
</head>
<body>
    <form method="POST" action="{{ route('ajouter_premiere_lettre') }}">
        @csrf
        <input type="number" name="nombre_de_lettre" placeholder="Nombre de lettre" max="12" min="4" required>
        <input type="text" name="premiere_lettre" placeholder="Première lettre" maxleight="1" required>
        <input type="submit" value="Chercher">
    </form>
    
</body>
</html>