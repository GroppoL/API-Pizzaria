CREATE TABLE pizzas (
    idPizza INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    ingredientes VARCHAR(255) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL
);
 
INSERT INTO pizzas (nome, ingredientes, valor) VALUES
('Calabresa', 'Mussarela, calabresa fatiada e cebola', 45.50),
('Mussarela', 'Mussarela e molho de tomate', 40.00),
('Frango com Catupiry', 'Frango desfiado, catupiry e mussarela', 52.90),
('Portuguesa', 'Mussarela, presunto, ovo, ervilha, cebola e calabresa', 62.90),
('Moda do Juca', 'Mussarela, peito de peru, palmito, alho poró e alcaparras', 72.50);
 
SELECT * FROM pizzas


CREATE TABLE bebidas (
    idBebida INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    qtdLitros VARCHAR(50) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL
);
INSERT INTO bebidas (nome, tipo, qtdLitros, valor) VALUES
('Pepsi black', 'zero','500ml', 3.50),
('Schweppes', 'tradicional','550ml', 4.00),
('Coca-cola', 'zero','2L', 8.00),
('Sukita sabor laranja', 'tradicional', '2,5L', 7.50),
('Guarana antartica', 'zero', '2L',7.50 );
SELECT * FROM bebidas