CREATE TABLE IF NOT EXISTS ecopontos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO ecopontos (nome, categoria, bairro) VALUES
('Ecoponto Central', 'Eletrônicos', 'Centro'),
('Ecoponto Sul', 'Plástico e Metal', 'Jardim América'),
('Estação Recicla', 'Papel e Papelão', 'Vila Nova');