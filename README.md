# ModernTV - Film management
## Úkol: Webová aplikace pro správu filmů pomocí API

Vytvořit webovou aplikaci pomocí PHP Nette frameworku, která bude sloužit pro správu filmů pomocí REST API. 
Veškeré pojmenování a struktura databáze je plně ve vaší režii.
K výsledku práce prosím přiložte SQL soubor, kde bude definovaná struktura tabulky pro filmy.

## Požadavky:

### Základní funkce
- [x] **Přehled filmů**: Je možné zobrazit seznam všech filmů v knihovně pomocí API.
- [x] **Detail filmu**: je možné zobrazit detaily o konkrétním filmu, včerně názvu, autora, žánru a popisu.
- [x] **Vytvoření filmu**: Je možné přidat nový film do systému pomocí API.
- [x] **Editace filmu**: Je možné upravit existující film pomocí API.
- [x] **Smazání filmu**: Je možné smazat film pomocí API.

### Volitelné funkce
- [x] Endpoint pro získání všech filmů.
    - [x] Volitelná filtrace.
    - [x] Volitelné stránkování.
- [x] Docker: Vytvořte Dockerfile a docker-compose.yml pro jednoduchou správu vývojového prostředí.
- Statická analýza kódu: Využijte nástroje pro statickou analýzu kódu (např. PHPStan, CodeSniffer) k identifikaci potenciálních chyb a nedostatků ve vašem kódu.
    - [x] Phpstan
    - [x] CodeSniffer
    - [x] PHPUnit
- [x] Testování: Přidejte Unit testy, pokud je to možné a zvažte integrační testy pro práci s API.

### Návrh API konfigurace:

- [x] **Autorizace:** Token-based autorizace / Basic Auth (je to plně na vás)

**Endpointy:**
- [x] [GET] /api/v1/movies - Získání seznamu filmů.
- [x] [GET] /api/v1/movies/{id} - Získání detailu filmu.
- [x] [POST] /api/v1/movies - Vytvoření nového filmu.
- [x] [PUT] /api/v1/movies/{id} - Editace existujícího filmu.
- [x] [DELETE] /api/v1/movies/{id} - Smazání filmu.

# Zpracování

Docker - `docker compose up`

Docker image: `docker exec -it modern-tv-film-management-web-1 bash`

Web - [localhost:8081](http://localhost:8081/)
(Nette aplikace je umístěna v adresáři www)

Adminer - [localhost:8080](http://localhost:8080/)

# Postup spuštění prostředí

1. `docker compose up` 2x
2. `docker exec -it modern-tv-film-management-web-1 bash`
   ( pokud nefunguje `docker ps` a `docker exec -it <web_container_id> bash` )
4. `composer install` (nemám v prostředí zip extension, takže tohle nainstalovat normálně ze systému `cd www` a `composer install`)
5. `php bin/console migrations:migrate`
6. `php bin/console doctrine:fixtures:load`

- Volitelně můžete spustit `make phpstan`, `make phpunit`, `make cs`
- Volitelně naimportovat do postmana soubor `ModernTV.postman_collection.json` pro testování API