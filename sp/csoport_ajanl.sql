select 
csoport.csoport_id,
csoport.NEV,
csoport.LEIRAS,
count(csoport_tag.CSOPORT_TAG_ID) as cnt
from 
    csoport 
    inner join csoport_tag on csoport_tag.CSOPORT_ID = csoport.CSOPORT_ID
where 
    not exists (select * from csoport_tag where csoport_tag.tag_felhasznalo_id = :userid and csoport_tag.csoport_id = csoport.csoport_id) and
    csoport.csoport_id in (
        select distinct
            csoport_tag.csoport_id
        from
            vismeros
            inner join csoport_tag on csoport_tag.tag_felhasznalo_id = vismeros.ismeros_id
        where 
            felhasznalo_id = :userid and tipus = 1
    )
group by csoport.csoport_id, csoport.nev, csoport.LEIRAS