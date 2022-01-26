/* banco de dados do sistema*/
CREATE DATABASE music_box;

use music_box;

CREATE TABLE usuario (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    art_name VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    profile_img_dir TEXT NOT NULL,
    bio TEXT(5000),
    website VARCHAR(2048),
    localization VARCHAR(255)
);

CREATE TABLE playlist (
    code_name VARCHAR(255) NOT NULL PRIMARY KEY,
    visibility BOOLEAN NOT NULL,
    favorite BOOLEAN NOT NULL,
    title VARCHAR(255) NOT NULL,
    owner_id INT NOT NULL,
    FOREIGN KEY(owner_id) REFERENCES usuario(id)
);

CREATE TABLE album (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    single BOOLEAN NOT NULL,
    about TEXT(5000),
    owner_id INT NOT NULL,
    cover_dir TEXT NOT NULL,
    playlist_code_name VARCHAR(255),
    FOREIGN KEY(owner_id) REFERENCES usuario(id),
    FOREIGN KEY(playlist_code_name) REFERENCES playlist(code_name)
);

CREATE TABLE song (
    code_name VARCHAR(255) NOT NULL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    file_dir TEXT NOT NULL,
    link_youtube VARCHAR(2048),
    link_spotify VARCHAR(2048),
    single BOOLEAN NOT NULL,
    visibility BOOLEAN NOT NULL,
    about TEXT(5000),
    genre VARCHAR(255) NOT NULL,
    sub_genre VARCHAR(255),
    song_key VARCHAR (3),
    type VARCHAR (255),
    autor_id INTEGER NOT NULL,
    album_id INTEGER NOT NULL,
    FOREIGN KEY(autor_id) REFERENCES usuario(id),
    FOREIGN KEY(album_id) REFERENCES album(id)
);

CREATE TABLE playlist_songs (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    playlist_id VARCHAR(255) NOT NULL,
    song_id VARCHAR(255) NOT NULL,
    FOREIGN KEY(playlist_id) REFERENCES playlist(code_name),
    FOREIGN KEY(song_id) REFERENCES song(code_name)
);