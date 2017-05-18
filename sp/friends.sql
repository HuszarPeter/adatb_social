select 
    vfelhasznalo.*,
    vismeros.tipus,
    vismeros.CEL_FELHASZNALO_ID
from 
    vismeros 
    inner join vfelhasznalo on vismeros.ismeros_id = vfelhasznalo.felhasznalo_id
where 
    vismeros.felhasznalo_id = :userid
ORDER BY
    TIPUS, vfelhasznalo.NEV