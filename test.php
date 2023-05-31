<!DOCTYPE html>
<html lang=ru dir="ltr">

<head>
    <?php require  'components/head.php'?>
    <title>JobFitTest - Тестирование</title>
</head>
<body>
    <?php require 'components/header.php';
    require 'components/nav.php';?>
    <main>
        <div class="container">
            <div class="question">
                <h1 class="green">Вопрос №1</h1>
                <h4 class="green">Текст для вопроса</h4>
                <div class="answer_list">
                    <div class="answer">1</div>
                    <div class="answer">2</div>
                    <div class="answer">3</div>
                    <div class="answer">4</div>
                </div>
            </div>
            <div class="question">
                <h1 class="green">Вопрос №2</h1>
                <h4 class="green">Текст для вопроса</h4>
                <div class="answer_list">
                    <div class="answer">1</div>
                    <div class="answer">2</div>
                    <div class="answer">3</div>
                    <div class="answer">4</div>
                </div>
            </div>

            <button id="bnt_back" onclick="bnt_back()" data-id="0">< Предыдущий вопрос</button>
            <button id="bnt_next" onclick="bnt_next()">Следующий вопрос ></button>

            <script>
                $(".question").eq(0).addClass('visible_test');

                function bnt_next() {
                    var id = $("#bnt_back").data("id");
                    var max_id = $(".question").length - 1;
                    if (id >= max_id) require;
                    $(".question").removeClass("visible_test");
                    $(".question").eq(id + 1).addClass('visible_test');
                    $("#bnt_back").data("id", id + 1);
                }

                function bnt_back() {
                    var id = $("#bnt_back").data("id");
                    if (id <= 0) require;
                    $(".question").removeClass("visible_test");
                    $(".question").eq(id - 1).addClass('visible_test');
                    $("#bnt_back").data("id", id - 1);
                }
            </script>
        </div>
    </main>
    <?php require 'components/footer.php'?>
</body>
</html>