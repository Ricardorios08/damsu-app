UPDATE `w1361849_onco`.`tr_ventas_detalle` SET `recibido_coir` = '0';
UPDATE `w1361849_onco`.`tr_ventas_detalle` SET recibido_farmacia = '0';
UPDATE `w1361849_onco`.`tr_ventas_detalle` SET recibido_servicio = '0';
UPDATE `w1361849_onco`.`tr_ventas_detalle` SET estado = 'FACTURADO';
UPDATE `w1361849_onco`.`tr_ventas_detalle` SET indicado_coir = '0';
UPDATE `w1361849_onco`.`tr_ventas_detalle` SET preparado_coir = '0';

UPDATE `w1361849_onco`.`tr_ventas_detalle` SET fecha_recibido = '';
UPDATE `w1361849_onco`.`tr_ventas_detalle` SET fecha_indicado = '';
UPDATE `w1361849_onco`.`tr_ventas_detalle` SET fecha_preparado = '';
UPDATE `w1361849_onco`.`tr_ventas_detalle` SET fecha_farmacia = '';

UPDATE `w1361849_onco`.`tr_ventas_detalle` SET fecha_servicio = '';
UPDATE `w1361849_onco`.`tr_ventas_detalle` SET fecha_servicio = '';
UPDATE `w1361849_onco`.`tr_ventas_detalle` SET aplicado_servicio = '0';

 

