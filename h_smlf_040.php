Spustenie algoritmu hľadania prostých implikantov Vami zvolených funkcií. Najskôr sa všetky nedefinované "x" body
dodefinujú na hodnotu 1. Následne sa všetky jednotkové body funkcie prepíšu do vektorového tvaru. Napr. bod funkcie
určený elementárnym súčinom x1 !x2 !x3 x4 by sa prepísal do tvaru 1001. Tento vektor obsahuje dve jednotky. Je totiž
potrebné roztriediť vektory podľa počtu jednotiek do skupín. Skupiny nakoniec zoradíme podľa počtu jednotiek, ktoré
obsahujú. Robí sa to tak preto, aby sme nemuseli porovnávať každý vektor s každým. Keď sú zoradené v skupinách, stačí
porovnávať len vektory jednej skupiny s každým vektorom susednej skupiny. Môžeme tak spraviť preto, lebo susedné vektory
sú práve tie, ktoré sa líšia práve v jednej "cifre", teda sa líšia o jednu jednotku (prípadne nulu). Na mieste, v ktorom
sa vektory líšia, napíšeme znak "x" (nemýliť si s nedefinovaným bodom). Vznikne tak nový vektor do nového súpisu, tento
sa nazýva <b>neúplný vektor</b>. Tie vektory, z ktorých tento vznikol, označíme symbolom "*" a nebudeme ich ďalej
uvažovať.
<br>
Takto pokračujeme porovnávaním roztriedených vektorov v druhom súpise, treťom súpise atď. dokým sa dá vytvoriť nejaký
súpis. Treba si ale uvedomiť, že pri neúplných vektoroch musia mať vektory na rovnakých miestach aj symboly "x", aby
mohol vzniknúť nový vektor.
<br>
Napokon množinu prostých implikantov funkcie tvoria všetky hviezdičkou neoznačené vektory.
<br>
Ďalej pokračujte stlačením tlačidla <b>šípky</b>.
