select
csoport.csoport_id,
csoport.NEV,
csoport.LEIRAS,
count(csoport_tag.CSOPORT_TAG_ID) as cnt
from csoport
inner join csoport_tag on csoport_tag.CSOPORT_ID = csoport.CSOPORT_ID
where csoport.CSOPORT_ID in (select csoport_id from CSOPORT_TAG where tag_felhasznalo_id = :userid)
group by csoport.csoport_id, csoport.nev, csoport.LEIRAS
