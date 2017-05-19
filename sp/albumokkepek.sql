select
  kep.kep_id,
  album.*
from
  kep
  left join album on album.album_id = kep.album_id
where
  kep.tulajdonos_id = :userid
order by
  kep.album_id, kep.feltoltve