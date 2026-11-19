
## Wordpress Plugin um abgeschlossene Projekte festzuhalten

### Eckpunkte für das Plugin (was brauche ich?)
- CPT für Done-Einträge mit Status und Erledingungsdatum
- Übersichtsseite, die alle Einträge eines Users nach Datum sortiert anzeigt
- Export Funktion nach Export-Vertrag der ursprünglichen Done-List
- Absicherung mit Wordpress Funktionen

### Ansatz
- Custom Post Type für Done-Einträge registrieren
    - Status (completed, cancelled) als custom taxonomy anfügen
    - Meta-Feld für Abschlussdatum anfügen
    - Alle Eingaben validieren (genau ein Status, Datum ist richtig formatiert, ...)
- Übersichtsseite mit eigener Template erstellen
    - Einträge mit Status und Datum anzeigen
    - Ausgaben escapen
    - Einträge filtern + sortieren
- json Export Funktion einbauen
- Absicherung prüfen, ausbauen, angreifen