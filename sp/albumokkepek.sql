select * from
(
select
  kep.kep_id,
  album.*
from
  kep
  left join album on album.album_id = kep.album_id
where
  kep.tulajdonos_id = :userid
--order by
--  kep.album_id, kep.feltoltve

union

select 
  null as kep_id,
  album.*
from
  album
where
  not exists (select * from kep where kep.album_id = album.album_id)
  and album.TUALJDONOS_ID = :userid
)
order by
  album_id