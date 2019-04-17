# k-tags-by-list

Segédfelület a [K-Monitor Adatbázishoz](https://adatbazis.k-monitor.hu). Egy céglistához lekérdezi az egyes cégekhez tartozó címke URL-eket.



## Telepítés

1. Nevezd át a `config.php.example` fájlt `config.php`-re
2. Szerkeszd a `config.php`-t úgy, hogy a helyes MySQL kapcsolódási paramétereket tartalmazza
3. Állíts be egy webszervert PHP interpreterrel, hogy kiszolgálja ezt a mappát

A `dummy.sql` fájl egy példa adatbázis sémát és néhány példa rekordot tartalmaz, amelyen tesztelhető a tool.



## Használat

Az input mezőbe kell a cégneveket illeszteni, soronként egyet. Ha esetleg idézőjelben vannak, nem probléma, illetve a kis-/nagybetűk sincsenek megkülönböztetve.

Az egyetlen gomb megnyomására a rendszer minden egyes input cégnévhez lekérdezi a címke URL-t az adatbázisból.

Az eredmény az output mezőben jelenik meg. Minden input cégnév szerepelni fog itt, függetlenül attól, hogy van-e találat. A címke URL-t a megfelelő cégnévhez tabulátor elválasztó után fűzi hozzá a program, így TSV formátumot kapunk, ami egy-az-egyben bemásolható pl. Excel-be.



## Továbbfejlesztési ötletek

* Felület tuningolása (design, AJAX)
* Kiterjesztés más (nem csak szervezet) címketípusokra
* Cégnév egyezőség vizsgálat flexibilisebbé tétele
