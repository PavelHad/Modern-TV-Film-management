# ModernTV - Film management
## Úkol: Webová aplikace pro správu filmů pomocí API

Vytvořit webovou aplikaci pomocí PHP Nette frameworku, která bude sloužit pro správu filmů pomocí REST API. 
Veškeré pojmenování a struktura databáze je plně ve vaší režii.
K výsledku práce prosím přiložte SQL soubor, kde bude definovaná struktura tabulky pro filmy.

## Požadavky:

### Základní funkce
- [ ] **Přehled filmů**: Je možné zobrazit seznam všech filmů v knihovně pomocí API.
- [ ] **Detail filmu**: je možné zobrazit detaily o konkrétním filmu, včerně názvu, autora, žánru a popisu.
- [ ] **Vytvoření filmu**: Je možné přidat nový film do systému pomocí API.
- [ ] **Editace filmu**: Je možné upravit existující film pomocí API.
- [ ] **Smazání filmu**: Je možné smazat film pomocí API.

### Volitelné funkce
- [ ] Endpoint pro získání všech filmů.
    - [ ] Volitelná filtrace.
    - [ ] Volitelné stránkování.
- [x] Docker: Vytvořte Dockerfile a docker-compose.yml pro jednoduchou správu vývojového prostředí.
- Statická analýza kódu: Využijte nástroje pro statickou analýzu kódu (např. PHPStan, CodeSniffer) k identifikaci potenciálních chyb a nedostatků ve vašem kódu.
    - [ ] Phpstan
    - [ ] CodeSniffer
- [ ] Testování: Přidejte Unit testy, pokud je to možné a zvažte integrační testy pro práci s API.

### Návrh API konfigurace:

- [ ] **Autorizace:** Token-based autorizace / Basic Auth (je to plně na vás)

**Endpointy:**
- [ ] [GET] /api/v1/movies - Získání seznamu filmů.
- [ ] [GET] /api/v1/movies/{id} - Získání detailu filmu.
- [ ] [POST] /api/v1/movies - Vytvoření nového filmu.
- [ ] [PUT] /api/v1/movies/{id} - Editace existujícího filmu.
- [ ] [DELETE] /api/v1/movies/{id} - Smazání filmu.

# Zpracování

Docker - `docker compose up`

Docker image: `docker exec -it modern-tv-film-management-web-1 bash`

Web - [localhost:8081](http://localhost:8081/)
(Nette aplikace je umístěna v adresáři www)

Adminer - [localhost:8080](http://localhost:8080/)
