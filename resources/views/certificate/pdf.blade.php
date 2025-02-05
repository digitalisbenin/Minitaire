{{--  <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        .certificate {
            border: 10px solid #318ce7;
            padding: 20px;
            width: 100%;
            margin: auto;
        }
        h1 {
            color: #318ce7;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <h1>Certificat de réussite</h1>
        <p>Ceci certifie que l'apprenants :</p>
        <h2>{{ $user->name }}</h2>
        <p>a complété avec succès le chapitre</p>
        <h3>{{ $chapter->titre }}</h3>
        <p>avec une note de <strong>{{ $certificate->note }}/100</strong></p>
        <p>Félicitations !</p>
    </div>
</body>
</html>  --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Great+Vibes&family=Merriweather&display=swap" rel="stylesheet">

    <title>Certificat de fin de module</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f8f8;
        }
        .certificate {
            width: 600px;
            height: 500px;
            background: white;
            border: 10px solid gold;
            padding: 40px;
            text-align: center;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        .certificate h1 {
            font-size: 36px;
            font-weight: bold;
            letter-spacing: 2px;
        }
        .certificate h2 {
            font-size: 24px;
            font-weight: normal;
            color: #555;
        }
        .certificate .name {
            font-size: 32px;
            font-weight: bold;
            color: gold;
            margin: 20px 0;
            font-family: 'Georgia', serif;
        }
        .certificate p {
            font-size: 18px;
            color: #333;
        }
        .signature {
            margin-top: 40px;
            font-weight: bold;
        }
        .signature span {
            display: block;
            font-size: 14px;
            color: #555;
        }
        .seal {
            position: absolute;
            top: 30px;
            left: 30px;
            width: 80px;
            height: 80px;
            background: gold;
            border-radius: 50%;
            text-align: center;
            line-height: 80px;
            font-size: 30px;
            color: black;
            font-weight: bold;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }
        .certificate h1 {
            font-family: 'Playfair Display', serif;
        }

        .certificate h2 {
            font-family: 'Merriweather', serif;
        }

        .certificate .name {
            font-family: 'Great Vibes', cursive;
        }
        .certificate h1 {
            font-family: 'Playfair Display', serif;
        }

        .certificate h2 {
            font-family: 'Merriweather', serif;
        }

        .certificate .name {
            font-family: 'Great Vibes', cursive;
        }

    </style>
</head>
<body>

<div class="certificate">
    <div class="seal"></div>
    <h1>CERTIFICATE</h1>
    <h2>DE FIN DE FORMATION </h2>
    <p>Ce certificat est fièrement présenté à</p>
    <div class="name">{{ $user->name }} {{ $user->prenom }} </div>
    <p>Pour a complété avec succès la formation</p>
    <h3>{{ $chapter->titre }}</h3>

    <p>avec une note de <strong>{{ $certificate->note }}/100</strong></p>
    <p>Félicitations !</p>

    <div class="signature">
        <p>{{$chapter->user->name}} {{$chapter->user->prenom}} </p>
        <span>Formateur</span>
    </div>
</div>

</body>
</html>
