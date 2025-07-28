# ZeusWeb Widgets - Elementor Plugin

Ez a plugin két testreszabható Elementor widgetet tartalmaz:

1. **GYIK Widget** - Gyakran Ismételt Kérdések widget, amely hasonló a harmonika widgethez, de kiegészített funkciókkal
2. **Slider Widget** - Reszponzív kép slider widget

## Widgetek

### 🎯 GYIK Widget funkciók
- **Fehér keret**: A widget egy elegáns fehér kerettel rendelkezik
- **Kibontható tartalom**: A kérdések kattintásra kinyílnak, a keret automatikusan nő
- **Reszponzív elrendezés**: A kérdések egymás mellé helyezkednek el, amíg a konténer engedi
- **Testreszabható gombok**: Minden kérdéshez külön gomb helyezhető el

### 🎯 Slider Widget funkciók
- **Reszponzív kép slider**: Automatikus és manuális navigáció
- **Testreszabható navigáció**: Nyilak és pontok
- **Automatikus lejátszás**: Beállítható időzítés
- **Touch támogatás**: Mobil eszközökön is működik

## Telepítés

### 1. Fájlok feltöltése
1. Töltsd fel a plugin fájljait a WordPress `wp-content/plugins/zeusweb-widgets/` mappába
2. Vagy csomagold be a fájlokat ZIP formátumban és telepítsd a WordPress admin panelen keresztül

### 2. Plugin aktiválása
1. Menj a WordPress admin panelbe
2. Navigálj a **Beépülő modulok** > **Telepített beépülő modulok** menüpontra
3. Keresd meg a "ZeusWeb Widgets" beépülő modult
4. Kattints az **Aktiválás** gombra

### 3. Elementor ellenőrzése
- A plugin automatikusan ellenőrzi, hogy az Elementor telepítve van-e
- Ha nincs telepítve, figyelmeztetést fogsz kapni

## Használat

### 1. Widget hozzáadása
1. Nyisd meg az Elementor szerkesztőt
2. Keresd meg a "ZeusWeb" kategóriát a widgetek között
3. Húzd a kívánt widgetet a szerkesztőbe

### 2. GYIK Widget beállítása
1. A **Tartalom** fülön adj hozzá kérdéseket és válaszokat
2. Minden kérdéshez beállíthatod:
   - **Kérdés szövege**: A megjelenő kérdés
   - **Válasz tartalma**: A kinyíló válasz (WYSIWYG szerkesztő)
   - **Gomb megjelenítése**: Kapcsoló a gomb megjelenítéséhez
   - **Gomb szövege**: A gomb szövege
   - **Gomb link**: A gomb célhelye

### 3. Slider Widget beállítása
1. A **Tartalom** fülön adj hozzá képeket
2. Beállíthatod:
   - **Automatikus lejátszás**: Kapcsoló az automatikus lejátszáshoz
   - **Lejátszási sebesség**: Másodpercekben
   - **Navigáció megjelenítése**: Nyilak és pontok

## JavaScript API

### GYIK Widget API
```javascript
// Összes válasz bezárása
GYIKWidget.closeAll();

// Összes válasz megnyitása
GYIKWidget.openAll();

// Konkrét válasz megnyitása
GYIKWidget.openAnswer(widgetIndex, answerIndex);
```

## CSS osztályok

### GYIK Widget
- `.gyik-wrapper`: Fő konténer
- `.gyik-container`: Belső konténer
- `.gyik-item`: Egyes kérdés-válasz elemek
- `.gyik-question-wrapper`: Kérdés konténer
- `.gyik-question`: Kérdés elem
- `.gyik-toggle`: Nyitás/zárás ikon
- `.gyik-button-wrapper`: Gomb konténer
- `.gyik-button`: Gomb elem
- `.gyik-answer`: Válasz konténer
- `.gyik-answer-content`: Válasz tartalom

### Slider Widget
- `.zeusweb-slider`: Fő konténer
- `.slider-container`: Slider konténer
- `.slider-item`: Egyes slide elemek
- `.slider-nav`: Navigációs elemek

## Reszponzív breakpointok

- **Desktop**: 1025px felett
- **Tablet**: 769px - 1024px között
- **Mobil**: 768px alatt

## Hozzáférési funkciók

- **Billentyűzet navigáció**: Enter és Space billentyűkkel is működik
- **ARIA attribútumok**: Képernyőolvasók támogatása
- **Fókusz állapotok**: Vizuális visszajelzés a billentyűzet használatához

## Nyomtatási stílusok

A widgetek automatikusan optimalizált nyomtatási stílusokat tartalmaznak:
- Minden válasz megjelenik (GYIK)
- Gombok és toggle ikonok elrejtve
- Egyszerűsített elrendezés

## Hibaelhárítás

### Widget nem jelenik meg
1. Ellenőrizd, hogy az Elementor telepítve és aktiválva van-e
2. Ellenőrizd a böngésző konzolját JavaScript hibákért
3. Próbáld meg frissíteni az oldalt

### Stílusok nem működnek
1. Ellenőrizd, hogy a CSS fájlok betöltődtek-e
2. Töröld a böngésző gyorsítótárát
3. Ellenőrizd a WordPress gyorsítótár beállításait

### JavaScript hibák
1. Ellenőrizd, hogy a jQuery betöltődött-e
2. Nézd meg a böngésző konzolját
3. Ellenőrizd a fájl jogosultságokat

## Verzió információk

- **Verzió**: 1.0.0
- **Elementor verzió**: 3.0.0+
- **PHP verzió**: 7.0+
- **WordPress verzió**: 5.0+

## Licenc

Ez a plugin GPL v2 vagy újabb licenc alatt érhető el.

## Támogatás

Ha problémába ütközöl vagy kérdésed van, kérlek hozz létre egy issue-t a GitHub repository-ban.

## Közreműködés

A közreműködéseket szívesen fogadjuk! Kérlek:
1. Fork-old a repository-t
2. Hozz létre egy feature branch-et
3. Commit-old a változtatásaidat
4. Push-old a branch-et
5. Hozz létre egy Pull Request-et

---

**Fejlesztő**: ZeusWeb  
**Utolsó frissítés**: 2024. január 