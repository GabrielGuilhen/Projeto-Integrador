CREATE TABLE IF NOT EXISTS `usuarios` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome_usuario` VARCHAR(50) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `senha` VARCHAR(255) NOT NULL,
    `perfil` VARCHAR(20) NOT NULL DEFAULT 'usuario',
    `criado_em` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `atletas` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `peso` VARCHAR(50),
  `altura` DECIMAL(3,2),
  `treinador` VARCHAR(255),
  `clube` VARCHAR(255),
  `foto_url` VARCHAR(500),
  `id_usuario` INT,
  FOREIGN KEY (`id_usuario`) REFERENCES `usuarios`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `empregos` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `cargo` VARCHAR(100),
    `salario` DECIMAL(10,2),
    `id_atleta` INT,
    FOREIGN KEY (`id_atleta`) REFERENCES `atletas`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `usuarios` (`nome_usuario`, `email`, `senha`, `perfil`)
VALUES ('admin', 'admin@email.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'admin');

INSERT INTO `atletas` (`nome`, `peso`, `altura`, `treinador`, `clube`, `foto_url`, `id_usuario`) VALUES
('Beatriz Souza', '+78kg', 1.78, 'Sarah Menezes', 'Esporte Clube Pinheiros', 'https://cbj.com.br/foto_beatriz_souza.jpg', 1),
('Willian Lima', '-66kg', 1.70, 'Antônio Carlos Pereira', 'Esporte Clube Pinheiros', 'https://cbj.com.br/foto_willian_lima.jpg', 1),
('Larissa Pimenta', '-52kg', 1.58, 'Sarah Menezes', 'Esporte Clube Pinheiros', 'https://cbj.com.br/foto_larissa_pimenta.jpg', 1),
('Guilherme Schimidt', '-81kg', 1.83, 'Antônio Carlos Pereira', 'Minas Tênis Clube', 'https://cbj.com.br/foto_guilherme_schimidt.jpg', 1),
('Mayra Aguiar', '-78kg', 1.78, 'Antônio Carlos Pereira', 'Sogipa', 'https://cbj.com.br/foto_mayra_aguiar.jpg', 1),
('Rafael Silva (Baby)', '+100kg', 2.03, 'Antônio Carlos Pereira', 'Esporte Clube Pinheiros', 'https://cbj.com.br/foto_rafael_silva.jpg', 1);
