select distinct
    sajat.felhasznalo_id en,
    ismer.ismeros_id kitismerhetek,
    vfelhasznalo.*
from 
    vismeros sajat
    inner join vismeros ismer on sajat.ismeros_id = ismer.felhasznalo_id
    inner join vfelhasznalo on vfelhasznalo.felhasznalo_id = ismer.ismeros_id
where
    sajat.felhasznalo_id = :userid and sajat.tipus = 1
    and 
    ismer.ismeros_id <> sajat.felhasznalo_id and ismer.ismeros_id NOT IN (select vismeros.ismeros_id from vismeros where vismeros.FELHASZNALO_ID = sajat.felhasznalo_id)
