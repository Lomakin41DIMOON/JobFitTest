<!DOCTYPE html>
<html lang=ru dir="ltr">

<head>
    <?php
    require  'components/head.php'
    ?>
    <title>JobFitTest - Тестирование</title>
</head>

<body>
    <header>
        <?php require  'components/header.php' ?>
    </header>

    <?php require  'components/nav.php'; ?>

    <main>
        <div class="container">
            <div class="question">
                <h1 class="green">Вопрос №</h1>
                <h4 class="green">Текст вопрос</h4>
                <div class="answer_list">
                    <div class="answer_block">
                        <div class="answer">
                            <input type="radio" name="options" id="1">
                            <label class="radio-container" for="option1"></label>
                            <span class="radio-label">Ответ</span>
                        </div>
                        <div class="answer">
                            <input type="radio" name="options" id="1">
                            <label class="radio-container" for="option1"></label>
                            <span class="radio-label">Ответ</span>
                        </div>
                        <div class="answer">
                            <input type="radio" name="options" id="1">
                            <label class="radio-container" for="option1"></label>
                            <span class="radio-label">Ответ</span>
                        </div>
                        <div class="answer">
                            <input type="radio" name="options" id="1">
                            <label class="radio-container" for="option1"></label>
                            <span class="radio-label">Ответ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require  'components/footer.php' ?>
</body>

</html>