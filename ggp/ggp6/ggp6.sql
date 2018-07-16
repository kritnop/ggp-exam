CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(6) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`customer_id`)
) DEFAULT CHARSET=utf8;
INSERT INTO `customer` (`customer_id`, `name`) VALUES
  ('1', 'Obama'),
  ('2', 'Thumb'),
  ('3', 'Prayuth'),
  ('4', 'Kim jong un');

CREATE TABLE IF NOT EXISTS `sale_order_item` (
  `item_id` int(6) unsigned NOT NULL,
  `order_id` int(6) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_amout` decimal(8,2) NOT NULL,
  PRIMARY KEY (`item_id`)
) DEFAULT CHARSET=utf8;
INSERT INTO `sale_order_item` (`item_id`,`order_id`, `name`,`total_amout`) VALUES
  ('1201', '10001', 'flyers', '2410.00'),
  ('1202', '10001', 'flyers', '2410.00'),
  ('1203', '10001', 'leafets', '5100.00'),
  ('1204', '10003', 'sticker', '1175.00'),
  ('1205', '10003', 'leafets', '2306.00'),
  ('1206', '10003', 'flyers', '1056.00'),
  ('1207', '10003', 'flyers', '2565.00'),
  ('1208', '10004', 'sticker', '4100.00');

CREATE TABLE IF NOT EXISTS `sale_order` (
  `order_id` int(6) unsigned NOT NULL,
  `customer_id` int(6) unsigned NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`order_id`,`customer_id`)
) DEFAULT CHARSET=utf8;
INSERT INTO `sale_order` (`order_id`,`customer_id`, `created_at`) VALUES
  ('10001', '1', '2017-01-27'),
  ('10002', '1', '2017-02-10'),
  ('10003', '3', '2017-02-20'),
  ('10004', '4', '2017-03-31');

SELECT c.customer_id AS customer_id, c.name AS name, COALESCE(SUM(s_o_i.total_amout),0) AS sum_total_amount
FROM `sale_order` s_o
    RIGHT JOIN `customer` c ON c.customer_id = s_o.customer_id
    LEFT JOIN `sale_order_item` s_o_i ON s_o_i.order_id = s_o.order_id  
GROUP BY s_o.customer_id
ORDER BY sum_total_amount DESC;

#see SQL Fiddle here http://sqlfiddle.com/#!9/6faedf/3/0