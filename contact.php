<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты - Простой сайт</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Контакты</h1>
        <nav>
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="about.php">О нас</a></li>
                <li><a href="contact.php">Контакты</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="content">
            <h2>Связаться с нами</h2>
            <p>Если у вас есть вопросы или предложения, вы можете связаться с нами, заполнив форму ниже. Мы обязательно ответим вам в ближайшее время.</p>
            <form action="" method="post">
                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Электронная почта:</label>
                <input type="email" id="email" name="email" required>
                <input type="submit" value="Отправить">
            </form>
        </section>
        <?php
        // Параметры подключения к базе данных
        $servername = "localhost";
        $username = "root"; // Замените на ваше имя пользователя БД
        $password = ""; // Замените на ваш пароль БД
        $dbname = "simple_site_db";

        // Создание подключения
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Проверка подключения
        if ($conn->connect_error) {
            die("Ошибка подключения: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);

            // SQL-запрос для вставки данных
            $sql = "INSERT INTO contacts (name, email) VALUES ('$name', '$email')";

            if ($conn->query($sql) === TRUE) {
                echo "Спасибо, $name. Мы свяжемся с вами по адресу $email в ближайшее время.";
            } else {
                echo "Ошибка: " . $sql . "<br>" . $conn->error;
            }
        }

        // Закрытие подключения
        $conn->close();
        ?>
    </main>
    <footer>
        <p>&copy; 2024 Простой сайт</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
