SELECT 
    KULDO_FELHASZNALO_ID,
    K,
    SZOVEG,
    TO_CHAR(LETREHOZVA, 'YYYY-MM-DD HH24:MI:SS') as LETREHOZVA
FROM 
    vuzenetfolyam
WHERE
    (vuzenetfolyam.KULDO_FELHASZNALO_ID = :userid AND vuzenetfolyam.CIMZETT_FELHASZNALO_ID = :masik) 
    OR 
    (vuzenetfolyam.KULDO_FELHASZNALO_ID = :masik AND vuzenetfolyam.CIMZETT_FELHASZNALO_ID = :userid)
ORDER BY
    LETREHOZVA, UZENET_ID