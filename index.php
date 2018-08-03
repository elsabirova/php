<?
/*
 * 1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения.
      Затем написать скрипт, который работает по следующему принципу:
        - если $a и $b положительные, вывести их разность;
        - если $а и $b отрицательные, вывести их произведение;
        - если $а и $b разных знаков, вывести их сумму;
 */
$a = mt_rand(-100, 100);
$b = mt_rand(-100, 100);

if ($a >= 0 AND $b >= 0) {
    $operation = 'a - b';
    $result = $a - $b;
} elseif ($a < 0 AND $b < 0) {
    $operation = 'a * b';
    $result = $a * $b;
} else {
    $operation = 'a + b';
    $result = $a + $b;
}

echo "a = {$a}, b = {$b}, {$operation} = {$result} <br>";

/*
 * 2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch
 * организовать вывод чисел от $a до 15.
 */

$a = mt_rand(0, 15);
switch ($a) {
    case 0:
        echo '0 ';
    case 1:
        echo '1 ';
    case 2:
        echo '2 ';
    case 3:
        echo '3 ';
    case 4:
        echo '4 ';
    case 5:
        echo '5 ';
    case 6:
        echo '6 ';
    case 7:
        echo '7 ';
    case 8:
        echo '8 ';
    case 9:
        echo '9 ';
    case 10:
        echo '10 ';
    case 11:
        echo '11 ';
    case 12:
        echo '12 ';
    case 13:
        echo '13 ';
    case 14:
        echo '14 ';
    case 15:
        echo '15 <br>';
}

/*
 * 2*. Реализовать задание 2 через рекурсию
 */
function printNumbers($number) {
    $result = $number;
    if ($result < 15)
        $result .= ' ' . printNumbers($number + 1);
    return $result;
}

echo printNumbers($a) . ' <br>';

/*
 * 3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
 * Обязательно использовать оператор return.
 */
function add($a, $b) {
    return $a + $b;
}

function subtract($a, $b) {
    return $a - $b;
}

function multiply($a, $b) {
    return $a * $b;
}

function divide($a, $b) {
    if ($b === 0)
        $result = 'Division by zero';
    else
        $result = $a / $b;
    return $result;
}

/*
 * 4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
 * где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
 * В зависимости от переданного значения операции выполнить одну из арифметических
 * операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
 */
$a = rand(1, 20);
$b = rand(1, 20);
function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case '+':
            $result = add($arg1, $arg2);
            break;
        case '-':
            $result = subtract($arg1, $arg2);
            break;
        case '*':
            $result = multiply($arg1, $arg2);
            break;
        case '/':
            $result = divide($arg1, $arg2);
            break;
        default:
            $result = '';
    }
    return $result;
}

echo "$a + $b = " . mathOperation($a, $b, '+') . '<br>';
echo "$a - $b = " . mathOperation($a, $b, '-') . '<br>';
echo "$a * $b = " . mathOperation($a, $b, '*') . '<br>';
echo "$a / $b = " . mathOperation($a, $b, '/') . '<br>';

/*
 * 6. *С помощью рекурсии организовать функцию возведения числа в степень.
 * Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
 */

function power($val, $pow) {
    if ($pow === 0)
        $result = 1;
    elseif ($pow === 1)
        $result = $val;
    else
        $result = $val * power($val, $pow - 1);

    return $result;
}

echo power(5, 4) . '<br>';

/*
 * 7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
        22 часа 15 минут
        21 час 43 минуты
 */

/*
 * Функция склоняет любое существительное, в соответствии с числом
 */
function declensionWord($number, $words) {
    if ($number % 10 === 1 && $number % 100 !== 11)
        $result = $words[0];
    elseif (($number % 10 === 2 && $number % 100 !== 12) ||
        ($number % 10 === 3 && $number % 100 !== 13) ||
        ($number % 10 === 4 && $number % 100 !== 14))
        $result = $words[1];
    else
        $result = $words[2];

    return $result;
}

/*
 * Функция вычисляет текущее время
 */
function calculationTime() {
    date_default_timezone_set("Europe/Madrid");
    $hours = (int)date('G');
    $minutes = (int)date('i');

    $result = $hours . ' ' . declensionWord($hours, ['час', 'часа', 'часов']);
    if ($minutes)
        $result .= ' ' . $minutes . ' ' . declensionWord($minutes, ['минута', 'минуты', 'минут']);
    return $result;
}

echo calculationTime() . '<br>';

/*
 * 5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, вывести текущий год в
 * подвале при помощи встроенных функций PHP. Шаблон должен читаться из файла tpl, в нем не должно
 * быть ни строчки php-кода. Весь код в index.php.
 */
date_default_timezone_set("Europe/Madrid");
define("IMG_PATH", "/img/");

$site = file_get_contents("/templates/main.tpl", true);
$header = file_get_contents("/templates/header.tpl", true);
$content = file_get_contents("/templates/content.tpl", true);
$footer = file_get_contents("/templates/footer.tpl", true);

$title = "Главная страница - страница обо мне";
$h1 = "Информация обо мне";
$article = "Краткая биография обо мне
           Родился в 1985 году в городе Москва. Закончил в 2008 году МАИ.
           На данный момент работаю ведущим инженером в крупной авиакомпании.
           Поскольку я люблю авиацию, то хотел бы поделиться несколькими интересными 
           фотографиями на эту тему";
$image_name = "clock.jpg";
$img = "<img src='" . IMG_PATH . $image_name . "' alt='clock' width='300' height='300'>";
$time = 'Время: ' . calculationTime();
$year = date('Y');

$header = str_replace("{{TITLE}}", $title, $header);
$content = str_replace("{{ABOUT}}", $h1, $content);
$content = str_replace("{{ARTICLE}}", $article, $content);
$content = str_replace("{{IMG}}", $img, $content);
$content = str_replace("{{TIME}}", $time, $content);
$footer = str_replace("{{YEAR}}", $year, $footer);

$site = str_replace("{{HEADER}}", $header, $site);
$site = str_replace("{{CONTENT}}", $content, $site);
$site = str_replace("{{FOOTER}}", $footer, $site);

echo $site;
?>

