<?php
// Fixed URL: visitors cannot make the server request arbitrary network resources.
$url = 'https://httpbin.org/get';
$context = stream_context_create(['http' => [
    'method' => 'HEAD', 'timeout' => 10, 'follow_location' => 0,
    'ignore_errors' => true, 'header' => "User-Agent: FeedbackFormLab/1.0\r\n",
]]);
$headers = @get_headers($url, false, $context);
$success = $headers !== false;
$output = $success ? implode("\n", $headers) :
    'Не удалось получить HTTP-заголовки. Проверьте соединение сервера с интернетом и параметр allow_url_fopen в PHP.';
?>
<!DOCTYPE html>
<html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>HTTP-заголовки — Feedback form</title><link rel="stylesheet" href="assets/style.css"></head><body><a class="skip" href="#main">Перейти к содержимому</a>
<header class="header"><a href="index.php" class="brand" aria-label="Московский Политех — форма обратной связи"><img src="assets/mospolytech-logo.svg" alt="Московский Политех" width="190" height="65"></a><div class="work-title">Feedback form</div><span class="course">Основы серверной<br>веб-разработки</span></header><main id="main" class="headers-layout"><div class="heading"><span class="eyebrow">Ответ сервера</span><h1>HTTP-заголовки</h1><p>Результат работы PHP-функции <code>get_headers()</code>.</p></div><section class="card"><div class="endpoint"><span>HEAD</span><code>https://httpbin.org/get</code></div><?php if (!$success): ?><p role="alert" class="error">Сервер временно недоступен.</p><?php endif; ?><label for="headers">Заголовки HTTP-ответа</label><textarea id="headers" class="headers-output" rows="15" readonly spellcheck="false"><?= htmlspecialchars($output, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></textarea><div class="actions"><a class="button primary" href="headers.php">Обновить заголовки</a><a class="button secondary" href="index.php">Вернуться к форме</a></div></section></main><footer>Задание для самостоятельной работы «Feedback form»</footer></body></html>
