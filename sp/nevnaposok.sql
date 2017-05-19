SELECT DISTINCT
    vfelhasznalo.*,
    CASE WHEN vfelhasznalo.NEVNAPHONAP = extract(month from sysdate) then 1 else 0 end as nevnap,
    extract(month FROM vfelhasznalo.SZULETETT) as szulhonap,
    extract(day from vfelhasznalo.SZULETETT) as szulnap
FROM 
    vismeros 
    inner join vfelhasznalo on vfelhasznalo.felhasznalo_id = vismeros.ismeros_id
WHERE 
    vismeros.felhasznalo_id = :userid and
    (vfelhasznalo.NEVNAPHONAP = extract(month FROM sysdate) or extract(month from vfelhasznalo.szuletett) = extract(month from sysdate))
 ORDER BY
    nev