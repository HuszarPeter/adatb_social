select 
    distinct *
from
    vfelhasznalo 
where 
    felhasznalo_id in 
    (
        -- ismerettseg alapján
        select distinct
            vfelhasznalo.felhasznalo_id
        from 
            vismeros sajat
            inner join vismeros ismer on sajat.ismeros_id = ismer.felhasznalo_id
            inner join vfelhasznalo on vfelhasznalo.felhasznalo_id = ismer.ismeros_id
        where
            sajat.felhasznalo_id = :userid and sajat.tipus = 1
            and 
            ismer.ismeros_id <> sajat.felhasznalo_id and ismer.ismeros_id NOT IN (select vismeros.ismeros_id from vismeros where vismeros.FELHASZNALO_ID = sajat.felhasznalo_id)

        union

        -- iskola alapján
        select 
            distinct t2.felhasznalo_id
        from
            felhasznalo_iskola t1
            inner join felhasznalo_iskola t2 on t1.iskola_id = t2.iskola_id
        where
            t1.felhasznalo_id = :userid

        UNION

        -- munkahely alapján
        select
            distinct t2.felhasznalo_id
        from 
            felhasznalo_munkahely t1
            inner join felhasznalo_munkahely t2 on t1.munkahely_id = t2.munkahely_id
        where 
            t1.felhasznalo_id = :userid
    )
    and
        -- még nem ismerem
        felhasznalo_id not in (select ismeros_id from vismeros where felhasznalo_id = :userid )
    and 
        -- nem én vagyok
        felhasznalo_id <> :userid