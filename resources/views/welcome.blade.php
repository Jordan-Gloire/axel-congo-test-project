<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Accueil - Gestion Rendez-vous</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative min-h-screen bg-gray-900">

    <!-- Navbar fixe -->
    <nav class="bg-white bg-opacity-90 backdrop-blur-md fixed w-full top-0 left-0 shadow-md z-20">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-blue-700 hover:text-blue-800">
                Rendez-vousPro
            </a>
            <div class="space-x-6 text-gray-700 font-semibold">
                <a href="{{ url('/') }}" class="hover:text-blue-700 transition">Accueil</a>
                <a href="{{ route('appointments.index') }}" class="hover:text-blue-700 transition">Rendez-vous</a>
                <a href="{{ route('appointments.create') }}" class="hover:text-blue-700 transition">Nouveau RDV</a>
            </div>
        </div>
    </nav>

    <!-- Background image avec overlay noir transparent -->
    <div class="absolute inset-0">
        <img 
            src="{{ asset('images/top.jpg') }}"
            alt="Personne prenant des notes" 
            class="w-full h-full object-cover brightness-50"
        />
        <div class="absolute inset-0 bg-black opacity-50"></div>
    </div>

    <!-- Contenu centré -->
    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen px-6 text-center text-white pt-24">
        <h1 class="text-5xl md:text-6xl font-extrabold mb-6 drop-shadow-lg">
            Bienvenue dans votre gestionnaire de rendez-vous
        </h1>
        <p class="text-lg md:text-xl max-w-xl mb-10 drop-shadow-md">
            Gérez facilement vos rendez-vous, clients, et gagnez en productivité.
        </p>
        <a href="{{ route('appointments.index') }}" class="bg-blue-600 hover:bg-blue-700 px-8 py-4 rounded text-xl font-semibold drop-shadow-lg transition duration-300">
            Voir mes rendez-vous
        </a>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 py-6 mt-16 relative z-10">
        <div class="container mx-auto px-6 text-center">
            <p>© {{ date('Y') }} Rendez-vousPro. Tous droits réservés.</p>
            <p class="mt-2 text-sm">
                Créé avec ❤️ par GloireJordanDEV
            </p>
        </div>
    </footer>

</body>
</html>
