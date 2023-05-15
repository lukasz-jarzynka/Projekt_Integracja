## Projekt Integracji Systemów

Projekt Integracji Systemów jest przykładem implementacji aplikacji webowej, która pobiera dane z zewnętrznego API, przetwarza je i wyświetla na stronie internetowej. Wykorzystuje framework Symfony oraz bazę danych PostgreSQL.

# Technologie
- PHP 8.1
- Symfony 6.2
- PostgreSQL
- HTML/CSS
- JavaScript
- Docker

# Realizacja

Projekt został zrealizowany w oparciu o architekturę MVC (Model-View-Controller). 
Wykorzystano framework Symfony do budowy aplikacji webowej oraz Doctrine ORM do zarządzania danymi w bazie danych. 
Interfejs użytkownika został stworzony przy użyciu szablonów Twig oraz biblioteki Bootstrap. 
Dane są pobierane z zewnętrznego API za pomocą biblioteki GuzzleHTTP. 
Projekt wykorzystuje również system migracji danych do zarządzania strukturą bazy danych.

# Uruchamianie projektu

1. Uruchom Dockera
2. Wykonaj polecenie  `docker compose build`
2. Wykonaj polecenie  `docker compose up -d`
3. Wykonaj polecenie  `docker compose exec app make init_project`

Serwer jest uruchomiony pod adresem http://localhost:8080/
