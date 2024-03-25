<?php

declare(strict_types=1);

/**
 * Проверяет, является ли число простым.
 *
 * @param int $number Число для проверки.
 * @return bool Возвращает true, если число простое, в противном случае - false.
 */
function isPrime(int $number): bool {
    if ($number <= 1) return false;
    if ($number <= 3) return true;
    if ($number % 2 === 0 || $number % 3 === 0) return false;
    $i = 5;
    while ($i * $i <= $number) {
        if ($number % $i === 0 || $number % ($i + 2) === 0) return false;
        $i += 6;
    }
    return true;
}

/**
 * Находит ближайшие простые числа к заданному числу.
 *
 * @param int $number Заданное число.
 * @return array Массив, содержащий ближайшее меньшее и ближайшее большее простые числа.
 */
function findPrimes(int $number): array {
    $smallerPrime = null;
    $largerPrime = null;
    for ($i = $number - 1; $i >= 2; $i--) {
        if (isPrime($i)) {
            $smallerPrime = $i;
            break;
        }
    }
    for ($i = $number + 1; $i <= 1000000; $i++) {
        if (isPrime($i)) {
            $largerPrime = $i;
            break;
        }
    }
    return [$smallerPrime, $largerPrime];
}

// Проверяем, был ли передан параметр "number" через GET-запрос
if (isset($_GET['number'])) {
    // Преобразуем значение "number" в целое число или устанавливаем значение по умолчанию равным 0
    $number = isset($_GET['number']) ? (int)$_GET['number'] : 0;
    
    // Проверяем, находится ли число в диапазоне от 0 до 1 000 000
    if ($number < 0 || $number > 1000000) {
        echo 'Пожалуйста, введите число от 0 до 1 000 000.';
    } else {
        // Проверяем, является ли число простым
        if (isPrime($number)) {
            echo $number . ' - простое число.';
        } else {
            // Если число не является простым, находим ближайшие простые числа
            $primes = findPrimes($number);
            echo $number . ' - не является простым числом.<br>';
            echo 'Первое простое число меньше: <span class="prime-info">' . ($primes[0] ?? 'нет') . '</span><br>';
            echo 'Первое простое число больше: <span class="prime-info">' . ($primes[1] ?? 'нет') . '</span>';
        }
    }
}
?>