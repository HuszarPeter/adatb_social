select
    vfelhasznalo.*
from
    csoport_tag
    inner join vfelhasznalo on vfelhasznalo.felhasznalo_id = csoport_tag.tag_felhasznalo_id
where
    csoport_tag.csoport_id = :csoportid