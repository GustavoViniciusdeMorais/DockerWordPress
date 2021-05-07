SELECT
	au.id AS id_unidade,
	au.number AS numero_unidade,
	au.area AS area_unidade,
	au.block AS bloco_unidade,
	au.floor AS andar_unidade,
	au.situation AS situacao_unidade,
	au.availability_id AS id_disponibilidade,
	au.pos_x,
	au.pos_y,
	au.coord_x,
	au.coord_y,
	p.id AS id_empreendimento,
	p.name AS nome_empreendimento
FROM availability_units AS au
RIGHT JOIN products AS p ON au.availability_id = p.availability_id
WHERE au.availability_id IS NOT NULL