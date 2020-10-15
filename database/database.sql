

DROP  database if EXISTS tecshop;
CREATE database tecshop;
use tecshop;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE brands(
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  brand varchar(20) UNIQUE KEY NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Estructura de tabla para la tabla `document_types`
--

CREATE TABLE document_types (
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  document varchar(20) UNIQUE KEY NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Estructura de tabla para la tabla `workstations`
--

CREATE TABLE workstations (
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  work varchar(20) UNIQUE KEY NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);


CREATE TABLE voucher_types (
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  type varchar(20) UNIQUE KEY NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Estructura de tabla para la tabla `product_categories`
--

CREATE TABLE product_categories (
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  category varchar(20) UNIQUE KEY NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);


--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE clients (
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(20) NOT NULL,
  lastname varchar(20) NOT NULL,
  document_type_id int(10) NOT NULL,
  number_document varchar(20) NOT NULL,
  telephone varchar(20) NOT NULL,
  address varchar(100) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  --
  -- 	FOREIGN KEYS
  --
  FOREIGN KEY (document_type_id) REFERENCES document_types(id)
);


--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE employees (
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(45)  NOT NULL,
  lastname varchar(35)  NOT NULL,
  document_type_id int(10) NOT NULL,
  number_document varchar(20) UNIQUE KEY NOT NULL,
  date_birth date NOT NULL,
  email varchar(30) UNIQUE KEY NOT NULL,
  telephone varchar(20) NOT NULL,
  address varchar(100)  NOT NULL,
  workstation_id int(10) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  --
  -- 	FOREIGN KEYS
  --
  FOREIGN KEY (document_type_id) REFERENCES document_types (id),
  FOREIGN KEY (workstation_id) REFERENCES workstations (id)

);


--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE users (
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(20) UNIQUE KEY NOT NULL,
  password varchar(100) NOT NULL,
  employee_id int(10) UNIQUE KEY NOT NULL,
  remember_token varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  --
  -- 	FOREIGN KEYS
  --
  FOREIGN KEY (employee_id) REFERENCES employees(id)
);

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE products (
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255)  NOT NULL,
  description varchar(255)  NOT NULL,
  product_categories_id int(10) NOT NULL,
  brand_id int(10)  NOT NULL,
  stock int(10)  DEFAULT 100,
  unit_price double(8,2) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  --
  -- 	FOREIGN KEYS
  --
  FOREIGN KEY (brand_id) REFERENCES brands (id),
  FOREIGN KEY (product_categories_id) REFERENCES product_categories (id)
) ;

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE sales (
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  code varchar(10) NOT NULL,
  date date NOT NULL,
  client_id int(10)  NOT NULL,
  user_id int(10)  NOT NULL,
  voucher_type_id int(10)  NOT NULL,
  total int(11) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  --
  -- 	FOREIGN KEYS
  --
  FOREIGN KEY (client_id) REFERENCES clients (id),
  FOREIGN KEY (user_id) REFERENCES users (id),
  FOREIGN KEY (voucher_type_id) REFERENCES voucher_types (id)
) ;


--
-- Estructura de tabla para la tabla `sale_products`
--
CREATE TABLE sale_details (
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  sale_id int(10)  NOT NULL,
  product_id int(10)  NOT NULL,
  quantity int(11) NOT NULL,
  amount double(8,2) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  --
  -- 	FOREIGN KEYS
  --
  FOREIGN KEY (product_id) REFERENCES products(id),
  FOREIGN KEY (sale_id) REFERENCES sales (id)
) ;

CREATE PROCEDURE monthly_sales (IN `iduser` INT) 
SELECT MONTHNAME(date) AS month, COUNT(*) AS quantity FROM sales WHERE sales.user_id = iduser GROUP BY(MONTH(date)); 


CREATE PROCEDURE total_monthly_sales () 
SELECT MONTHNAME(date) AS month, COUNT(*) AS quantity FROM sales GROUP BY(MONTH(date));

ALTER TABLE clients DROP FOREIGN KEY clients_ibfk_1;
ALTER TABLE clients ADD CONSTRAINT clients_ibfk_1 FOREIGN KEY (document_type_id) REFERENCES document_types(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE employees DROP FOREIGN KEY employees_ibfk_1; 
ALTER TABLE employees ADD CONSTRAINT employees_ibfk_1 FOREIGN KEY (document_type_id) REFERENCES document_types(id) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE employees DROP FOREIGN KEY employees_ibfk_2; 
ALTER TABLE employees ADD CONSTRAINT employees_ibfk_2 FOREIGN KEY (workstation_id) REFERENCES workstations(id) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE products DROP FOREIGN KEY products_ibfk_1; 
ALTER TABLE products ADD CONSTRAINT products_ibfk_1 FOREIGN KEY (brand_id) REFERENCES brands(id) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE products DROP FOREIGN KEY products_ibfk_2; 
ALTER TABLE products ADD CONSTRAINT products_ibfk_2 FOREIGN KEY (product_categories_id) REFERENCES product_categories(id) ON DELETE CASCADE ON UPDATE CASCADE; 

ALTER TABLE sales DROP FOREIGN KEY sales_ibfk_1; 
ALTER TABLE sales ADD CONSTRAINT sales_ibfk_1 FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE sales DROP FOREIGN KEY sales_ibfk_2; 
ALTER TABLE sales ADD CONSTRAINT sales_ibfk_2 FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE sales DROP FOREIGN KEY sales_ibfk_3;
ALTER TABLE sales ADD CONSTRAINT sales_ibfk_3 FOREIGN KEY (voucher_type_id) REFERENCES voucher_types(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE sale_details DROP FOREIGN KEY sale_details_ibfk_1; 
ALTER TABLE sale_details ADD CONSTRAINT sale_details_ibfk_1 FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE sale_details DROP FOREIGN KEY sale_details_ibfk_2;
ALTER TABLE sale_details ADD CONSTRAINT sale_details_ibfk_2 FOREIGN KEY (sale_id) REFERENCES sales(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE users DROP FOREIGN KEY users_ibfk_1; 
ALTER TABLE users ADD CONSTRAINT users_ibfk_1 FOREIGN KEY (employee_id) REFERENCES employees(id) ON DELETE CASCADE ON UPDATE CASCADE; 

