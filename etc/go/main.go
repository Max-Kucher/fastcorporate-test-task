package main

import (
    "fmt"
    "bufio"
    "os"
)

func main() {
    // Выводим сообщение в консоль
    fmt.Println("Привет! Введите что-нибудь и нажмите Enter:")

    // Создаем новый сканер для ввода с консоли
    scanner := bufio.NewScanner(os.Stdin)

    // Читаем ввод пользователя
    if scanner.Scan() {
        input := scanner.Text()
        fmt.Printf("Вы ввели: %s\n", input)
    }

    // Проверяем, есть ли ошибки при сканировании
    if err := scanner.Err(); err != nil {
        fmt.Fprintln(os.Stderr, "Ошибка чтения ввода:", err)
    }
}
