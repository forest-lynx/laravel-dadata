<?php

declare(strict_types=1);

namespace ForestLynx\DaData\Exceptions;

use Exception;

class DaDataException extends Exception
{
    public static function create(int $code): self
    {
        $message = match ($code) {
            400 => "Некоректный запрос (невалидный JSON или XML)",
            401 => "В запросе отсутствует API-ключ или секретный ключ. Или в запросе указан несуществующий ключ",
            403 => "Не подтверждена почта. Или недостаточно средств для обработки запроса, пополните баланс",
            405 => "Неправильный метод запроса",
            413 => "Слишком большая длина запроса или слишком много условий",
            429 => "Слишком много запросов в секунду или новых соединений в минуту",
            default => "Произошла внутренняя ошибка сервиса",
        };

        return new self($message, $code);
    }
}
