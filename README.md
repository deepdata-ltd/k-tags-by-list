# k-tags-by-list

Segédfelület a [K-Monitor Adatbázishoz](https://adatbazis.k-monitor.hu). Egy név listához (szervezetek vagy személyek) lekérdezi az egyes nevekhez tartozó címke URL-eket.



## Telepítés

1. Nevezd át a `config.php.example` fájlt `config.php`-re
2. Szerkeszd a `config.php`-t úgy, hogy a helyes MySQL kapcsolódási paramétereket tartalmazza
3. Állíts be egy webszervert PHP interpreterrel, hogy kiszolgálja ezt a mappát

A `dummy.sql` fájl egy példa adatbázis sémát és néhány példa rekordot tartalmaz, amelyen tesztelhető a tool.



## Használat

Az input mezőbe kell a neveket illeszteni, soronként egyet. Ha esetleg idézőjelben vannak, nem probléma, illetve a kis-/nagybetűk sincsenek megkülönböztetve.

Ki kell választani, hogy szervezetek között, vagy személyek között keressen a program.

Az egyetlen gomb megnyomására a rendszer minden egyes input névhez lekérdezi a címke URL-t az adatbázisból.

Az eredmény az output mezőben jelenik meg. Minden input név szerepelni fog itt, függetlenül attól, hogy van-e találat. A címke URL-t a megfelelő névhez tabulátor elválasztó után fűzi hozzá a program, így TSV formátumot kapunk, ami egy-az-egyben bemásolható pl. Excel-be.



## Továbbfejlesztési ötletek

* Felület tuningolása (design, AJAX)
* Cégnév egyezőség vizsgálat flexibilisebbé tétele
