<?php
/*
Obecné požadavky:
- implementujte zadání jak nejlépe umíte


Implementujte třídu Person (osoba).

Osoba má tyto informace:
- jedinečné číselné ID
- jméno
- příjmení
- pohlaví M/Z
- datum narození
Tyto informace lze z instance třídy získat, ale nelze je již měnit (možnost změny pohlaví a přejmenování neuvažujeme).

Operace:
- získání délky života osoby ve dnech

*/

class Osoba{
}

/*
Implementujte třídu Mankind (lidstvo), která pracuje s instancemi třídy Osoba.

Obecné požadavky:
- v jednom okamžiku může existovat pouze jedna instance třídy (marťané nejsou lidstvo...)
- s třídou musí být možné pracovat jako s polem (klíče jsou ID osob) a procházet ji foreach cyklem
lidstvo
Další požadované operace:
- načtení hodnot ze vstupního souboru (upřesnění níže)
- získání osoby dle ID
- získání procentuálního zastoupení mužů v lidstvu



Nacteni hodnoty ze vstupniho souboru

Vstupni soubor obsahuje seznam osob. Kazda osoba je na samostatnem
radku. Kazdy radek obsahuje ciselne id osoby, jmeno, prijmeni,
pohlavi (M/Z) a datum narozeni ve formatu dd.mm.yyyy. Oddelovač údajů
o osobě je střednik. Kódování souboru je UTF-8

Priklad:
123;Michal;Nový;M;01.11.1962
3457;Petra;Veverková;Z;13.4.1887

Predpokladany pocet osob v souboru je <= 1000.

Dále uveďte, jak byste řešili situaci, kdy soubor bude řádově větší
(např. stovky MB) a to jak z hlediska této metody, tak celé třídy.

*/

class Lidstvo{	
}