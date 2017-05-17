SELECT 
    KULDO_FELHASZNALO_ID,
    K,
    SZOVEG,
    LETREHOZVA
FROM 
    vuzenetfolyam
WHERE
    vuzenetfolyam.KULDO_FELHASZNALO_ID = :userid OR  vuzenetfolyam.CIMZETT_FELHASZNALO_ID = :userid
ORDER BY
    LETREHOZVA, UZENET_ID