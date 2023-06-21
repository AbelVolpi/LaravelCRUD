create schema sales_manager;
use sales_manager;

CREATE TABLE products (
    product_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    product_category VARCHAR(255) NOT NULL,
    product_price DECIMAL(8, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE sales (
    sale_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    employee_id INT UNSIGNED NOT NULL,
    customer_id INT UNSIGNED NOT NULL,
    sale_date DATE NOT NULL,
    sale_value DECIMAL(10, 2) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (employee_id) REFERENCES employees(id),
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);

CREATE TABLE sales_products (
    sale_sale_id INT UNSIGNED,
    product_product_id INT UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	quantity INT DEFAULT 1,
    FOREIGN KEY (sale_id) REFERENCES sales(sale_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
    PRIMARY KEY (sale_id, product_id)
);

CREATE TABLE customers (
    customer_id INT UNSIGNED PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE employees (
    employee_id INT UNSIGNED PRIMARY KEY,
    employee_name VARCHAR(255) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

SELECT * FROM employees;
SELECT * FROM customers;
SELECT * FROM products;
SELECT * FROM sales_products;
SELECT * FROM sales;

INSERT INTO products (product_name, product_category, product_price)
VALUES
    ('Product A', 'Category A', 10.99),
    ('Product B', 'Category B', 15.99),
    ('Product C', 'Category A', 12.50),
    ('Product D', 'Category C', 8.75),
    ('Product E', 'Category B', 19.99);

INSERT INTO sales (employee_id, customer_id, sale_date, sale_value)
VALUES
    (1, 1, '2023-06-20', 50.00),
    (2, 2, '2023-06-21', 75.50),
    (3, 3, '2023-06-22', 30.25),
    (1, 2, '2023-06-23', 20.99),
    (2, 3, '2023-06-24', 15.00);

INSERT INTO sales_products (sale_sale_id, product_product_id, quantity)
VALUES
    (1,6, 2),
    (1, 3, 1),
    (2, 2, 3),
    (3, 4, 1),
    (4, 5, 2);

INSERT INTO customers (customer_id, customer_name)
VALUES
    (1, 'Customer A'),
    (2, 'Customer B'),
    (3, 'Customer C'),
    (4, 'Customer D'),
    (5, 'Customer E');
    
INSERT INTO employees (employee_id, employee_name)
VALUES
    (1, 'Employee A'),
    (2, 'Employee B'),
    (3, 'Employee C'),
    (4, 'Employee D'),
    (5, 'Employee E');
