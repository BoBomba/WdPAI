![Logo](src/images/MpkGo_Icon.png)

# MpkGo

## Opis
MpkGo to aplikacja webowa służąca do zgłaszania i wyszukiwania incydentów w komunikacji miejskiej. Umożliwia użytkownikom zgłaszanie różnych zdarzeń, takich jak opóźnienia, awarie czy problemy w pojazdach komunikacji miejskiej, a także przeglądanie zgłoszonych incydentów na mapie.

## Spis Treści
- [Opis](#opis)
- [Rozpoczęcie](#rozpoczęcie)
- [Wymagania Wstępne](#wymagania-wstępne)
- [Instalacja](#instalacja)
- [Użycie](#użycie)
- [Współpraca](#współpraca)
- [Licencja](#licencja)

## Rozpoczęcie

### Wymagania Wstępne
Aby uruchomić aplikację MpkGo, potrzebujesz:
- Docker
- Edytora kodu (np. Visual Studio Code)
- Środowiska PHP
- Node.js (do obsługi JavaScript)

### Instalacja
Aby zainstalować MpkGo, wykonaj następujące kroki:
1. Sklonuj repozytorium:
```git clone https://example.com/MpkGo.git```
2. Przejdź do katalogu projektu i uruchom kontenery Dockera:
```cd MpkGo```
```docker-compose up -d```
3. Uruchom aplikację zgodnie z konfiguracją Dockera.
4. Pobierz token ze strony mapbox i dodaj go do kodu w miejscu 
```/public/js/mapTokens.js```

## Użycie
Po uruchomieniu aplikacji MpkGo, możesz zacząć zgłaszać incydenty w komunikacji miejskiej oraz wyszukiwać i przeglądać zgłoszenia na mapie. Aplikacja oferuje intuicyjny interfejs użytkownika, który umożliwia łatwą nawigację i obsługę.

## Współpraca
Zachęcamy do współtworzenia projektu MpkGo! Jeśli masz pomysły na nowe funkcje lub zauważyłeś błędy, skontaktuj się z nami lub utwórz issue w repozytorium GitHub. Wszelkie pull requesty są mile widziane.

## Licencja
```Copyright 2023 Damian Guca```

```Licencjonowane na licencji OpenSource.```