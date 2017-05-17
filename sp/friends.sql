select 
    vfelhasznalo.*,
    vismeros.tipus
from 
    vismeros 
    inner join vfelhasznalo on vismeros.ismeros_id = vfelhasznalo.felhasznalo_id
where 
    vismeros.felhasznalo_id = :userid