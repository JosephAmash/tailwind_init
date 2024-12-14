<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anmeldung</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            display: flex;
            flex-direction: column; /* Изменяем направление на колонку */
            justify-content: center; /* Центрируем по горизонтали */
            align-items: center; /* Центрируем по вертикали */
            height: 100vh;
            margin: 0;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
            text-align: center; /* Центрируем заголовок */
            margin-top: 20px; /* Убираем верхний отступ для заголовка */
        }

        form {
            background: #e0e0e0; /* Серый цвет фона формы */
            border-radius: 8px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            padding: 20px; /* Уменьшенное значение для меньшего контейнера */
            width: 100%;
            max-width: 300px; /* Уменьшенная ширина контейнера */
            margin: 0 auto; /* Центрируем форму */
            display: flex;
            flex-direction: column;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        input {
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        button {
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background: #0056b3;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);

            .home-button {
            margin-top: 20px; /* Отступ сверху для кнопки "Домой" */
            padding: 10px;
            background: #28a745; /* Цвет кнопки "Домой" */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease, transform 0.2s ease;
            text-decoration: none; /* Убираем подчеркивание */
            display: inline-block; /* Чтобы кнопка выглядела правильно */
        }

        .home-button:hover {
            background: #218838; /* Цвет при наведении */
            transform: translateY(-2px);
        }

        .home-button:active {
            transform: translateY(0);
        }



        }
    </style>
</head>
<body>
    <h1>Anmelden</h1>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div>
            <label for="email">E-Mail:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Passwort:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Anmelden</button>
    </form>

</body>
</html>
