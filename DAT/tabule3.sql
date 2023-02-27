DROP TABLE IF EXISTS flight;
CREATE TABLE IF NOT EXISTS flight (
  id int UNSIGNED NOT NULL AUTO_INCREMENT,
  code varchar(10) NOT NULL,
  destination varchar(30) NOT NULL,
  from_dttm timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  to_dttm timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  gate_code varchar(3) NOT NULL,
  status ENUM('OK', 'CANCELED', 'DELAYED') NOT NULL DEFAULT 'OK',
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
INSERT INTO flight (id, code, destination, from_dttm, to_dttm, gate_code, status) VALUES
(1, 'OK 1234', 'USA', '2023-04-11 10:11', '2023-04-11 12:00', 'G2', 'OK'),
(2, 'OK 3214', 'USA', '2023-04-12 08:13', '2023-04-11 08:50', 'G2', 'OK'),
(3, 'HY 4578', 'USA', '2023-04-11 12:00', '2023-04-11 14:13', 'G1', 'OK'),
(4, 'LH 4571', 'USA', '2023-04-19 10:00', '2023-04-11 11:20', 'G3', 'OK'),
(5, 'OK 232', 'USA', '2023-04-20 08:20', '2023-04-20 12:00', 'G1', 'CANCELED'),
(7, 'OK 321', 'USA', '2023-04-21 10:00', '2023-04-21 11:00', 'G1', 'OK'),
(8, 'LH 4571', 'USA', '2023-04-18 10:00', '2023-04-18 11:20', 'G3', 'DELAYED'),
(9, 'OK 232', 'USA', '2023-0a4-27 08:20', '2023-04-27 12:00', 'G1', 'OK'),
(10, 'LH 4571', 'USA', '2023-04-18 10:00', '2023-04-18 11:20', 'G3', 'OK'),
(11, 'LH 4571', 'USA', '2023-04-18 10:00', '2023-04-18 11:20', 'G3', 'OK');
