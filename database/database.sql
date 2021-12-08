/* banco de dados do sistema*/
CREATE DATABASE music_box;

use music_box;

CREATE TABLE usuario (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    art_name VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE profile_img (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    img_dir TEXT NOT NULL,
    id_user INTEGER NOT NULL,
    FOREIGN KEY(id_user) REFERENCES usuario(id)
);