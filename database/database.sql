/* banco de dados do sistema*/
CREATE DATABASE music_box;

use music_box;

CREATE TABLE usuario (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    art_name VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    bio TEXT(255),
    website VARCHAR(2048),
    localization VARCHAR(255)
);

CREATE TABLE profile_img (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    img_dir TEXT NOT NULL,
    id_user INTEGER NOT NULL,
    FOREIGN KEY(id_user) REFERENCES usuario(id)
);

CREATE TABLE playlist (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL
);

CREATE TABLE album (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    single BOOLEAN NOT NULL,
    playlist_id INTEGER NOT NULL,
    FOREIGN KEY(playlist_id) REFERENCES playlist(id)
);

CREATE TABLE song (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    file_dir TEXT NOT NULL,
    link_youtube VARCHAR(2048),
    link_spotify VARCHAR(2048),
    autor_id INTEGER NOT NULL,
    album_id INTEGER NOT NULL,
    FOREIGN KEY(autor_id) REFERENCES usuario(id),
    FOREIGN KEY(album_id) REFERENCES album(id)
);

CREATE TABLE cover (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    img_dir TEXT NOT NULL,
    album_id INTEGER NOT NULL,
    FOREIGN KEY(album_id) REFERENCES album(id)
);

CREATE TABLE playlist_songs (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    playlist_id INTEGER NOT NULL,
    song_id INTEGER NOT NULL,
    FOREIGN KEY(playlist_id) REFERENCES playlist(id),
    FOREIGN KEY(song_id) REFERENCES song(id)
);