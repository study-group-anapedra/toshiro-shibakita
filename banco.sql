CREATE TABLE IF NOT EXISTS dados (
    id SERIAL PRIMARY KEY,
    AlunoID VARCHAR(255),
    Nome VARCHAR(255),
    Sobrenome VARCHAR(255),
    Endereco VARCHAR(255),
    Cidade VARCHAR(255),
    Host VARCHAR(255)
);