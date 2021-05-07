SELECT

p.id as id_empreendimento,
p.`code` as codigo_proprio_empreendimento,
p.`name` as empreendimento,
a.type as tipo_empreendimento,
CONCAT( "https://cdn.appfacilita.com/",f.path ) AS imagem_implantacao


FROM  products as p

INNER JOIN availability as a on a.id = p.availability_id
LEFT JOIN files as f on f.id = a.file_id

ORDER BY p.id asc
