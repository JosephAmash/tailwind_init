<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel DB-MySql Simpl App</title>
</head>


<style>

     /* Grundlegendes Reset und Basis-Styling */
{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

body{
    background-color: #ffd2d2;
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    padding: 20px;
}

    /* Container für zentrierten Inhalt */

.container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

 /* Überschriften */
h1 {
    color: #333;
    text-align: center;
    margin-bottom: 30px;
    font-size: 3.5em;
}

h2 {
    color: #444;
    margin: 20px 0;
    font-size: 1.5em;
}

     /* Formular-Styling */

 .form-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #b89b9b;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #4a90e2;
            box-shadow: 0 0 5px rgba(74,144,226,0.3);
        }

        button {
            background-color: #fc7d83;
            color: rgb(0, 0, 0);
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #357abd;
        }

/* Nachrichten-Container (für spätere Datenbank-Einträge) */

.messages-container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 8px 10px rgba(0,0,0,0.1);
}

.message {
    padding: 15px;
    border-bottom: 1px solid #eee;
    margin-bottom: 10px;
}

.message:last-child {
            border-bottom: none;
        }

.message-content {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

 .message-meta {
            font-size: 14px;
            color: #666;
        }

/* Erfolgs- und Fehlermeldungen */
 .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

.alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

.alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

 /* Responsive Design */
        @media (max-width: 600px) {
.container {
                padding: 10px;
            }

            h1 {
                font-size: 1.5em;
            }

.form-container,
.messages-container {
    padding: 15px;
           }
   }


   .button-container {
    display: flex; /* Используем flexbox для расположения кнопок */
    justify-content: center; /* Центрируем кнопки по горизонтали */
    margin-bottom: 30px; /* Нижний отступ */
}

.registration-button,
.login-button {
    padding: 10px 20px; /* Отступы внутри кнопок */
    background-color: #007bff; /* Синий цвет фона */
    color: white; /* Цвет текста */
    text-decoration: none; /* Убираем подчеркивание */
    border-radius: 5px; /* Закругление углов */
    transition: background-color 0.3s, transform 0.2s; /* Плавный переход фона и эффект при наведении */
    cursor: pointer; /* Указываем курсор в виде руки при наведении */
    margin: 0 10px; /* Отступы между кнопками */
    border: none; /* Убираем рамку */
}

.registration-button:hover,
.login-button:hover {
    background-color: #0056b3; /* Цвет фона при наведении */
    transform: translateY(-2px); /* Легкий подъем кнопки при наведении */
}

.registration-button:active,
.login-button:active {
    transform: translateY(1px); /* Уменьшение при нажатии */
}



</style>

<body>


    <div class="container">
        <h1>Laravel Hello World</h1>

        <div class="button-container">
          <a href="{{ route('register') }}" class="registration-button">Registrierung</a>
            <a href="{{ route('login') }}" class="login-button">Anmeldung</a>
        </div>


        <!-- Erfolgs-/Fehlermeldungen -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif



        <!-- Formular -->
        <div class="form-container">
        <form action="/submit" method="POST">
        @csrf


        <div class="form-group">
            <label for="message">Nachricht:</label>
            <input type="text"
                    id="message"
                    name="message"
                    required>
        </div>


         <div class="form-group">
            <label for="autor"> Autor (optional):</label>
            <input type="text"
                    id="author"
                    name="author">
        </div>

        <div class="form-group">
            <button type="submit">Speichern</button>
        </div>
        </form>

        <!-- Nachricht -->

       <div class="messages-container">
            <h2>Nachrichten</h2>
                    @forelse ($messages as $message)
                    <div class="message">
                    <p class="message-content">{{ $message->message }}</p>
                    <p class="message-meta">Von: {{ $message->author ?? 'Unbekannt' }} | {{ $message->created_at->format('d.m.Y H:i') }}</p>
                    </div>
                    @empty
                    <p>Keine Nachrichten gefunden.</p> <!-- Hier wird angezeigt, dass keine Nachrichten vorhanden sind -->
                    @endforelse
                </div>

            </div>

        </body>

</html>
