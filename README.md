# Public Holiday Inspector

Ist eine Modul mit dem es möglich ist ein Datum auf folgende Kriterien zu überprüfen:

    * Werktag
    * Wochenende
    * Feiertag/Bankfeiertag
    * letzter Tag im Monat
    
Aktuell werden nur folgende Länder unterstützt:

    * Deutschland
    * Österreich
    
    
Zusätzliche Features:

    * den letzten Tag des Monats zurück geben
    * prüfen ob es der letzte Tag des Monats ist
    
    
Folgende Services sind enthalten:
---------------------------------

    Feiertags Rechner
    -------------------
    * Überprüfen eines Datum was es für ein Tag dieser ist
        * Dazu verwendet man den PublicHolidayCalculatorService und übergibt diesem ein Datum
        * das Ergebnis ist dan ein String mit folgendem Wording Arbeitstag, Wochenende oder der Feiertagsname
    
    Datums Service
    --------------
    * Vier Funktionen für ein Datum
        * den Folgetag ermitteln
        * prüfen ob es der letzte Tag im Monat ist
        * den letzten Tag des Monats ermitteln anhand eines Datums
        * wieviel Tage es noch bis zum letzte Tag im Monat sind
        
    Letzten Tag des Monats ermitteln
    --------------------------------
    * prüft ein Datum ob es der letzte Tag in dem Monat ist
   