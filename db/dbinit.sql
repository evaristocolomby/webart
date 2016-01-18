CREATE DATABASE websalesdb;

USE websalesdb;

CREATE TABLE user (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
  name VARCHAR(200) NOT NULL,
  email VARCHAR(200) NOT NULL,
  CONSTRAINT user_pkey PRIMARY KEY (id),
  CONSTRAINT user_email_key UNIQUE (email));

 CREATE TABLE category (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
  name VARCHAR(200) NOT NULL,
  CONSTRAINT category_pkey PRIMARY KEY (id),
  CONSTRAINT category_name_key UNIQUE (name));

 CREATE TABLE ad (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
  id_category BIGINT UNSIGNED NOT NULL,
  id_user BIGINT UNSIGNED NOT NULL,
  description VARCHAR(3000) NOT NULL,
  title VARCHAR(200) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  url_image VARCHAR(200),
  date TIMESTAMP,
  CONSTRAINT ad_pkey PRIMARY KEY (id),
  FOREIGN KEY (id_category) REFERENCES category(id),
  FOREIGN KEY (id_user) REFERENCES user(id));


INSERT INTO user (name, email) VALUES ('John Mazor', 'john@email.com');
INSERT INTO user (name, email) VALUES ('Steve Feeney', 'steve@email.com');
INSERT INTO user (name, email) VALUES ('Rose McGarvey', 'rose@email.com');
INSERT INTO user (name, email) VALUES ('Richard Livingston', 'richard@email.com');
INSERT INTO user (name, email) VALUES ('Paul Ryans','paul@email.com');
INSERT INTO user (name, email) VALUES ('Antony Winters','antony@email.com');

INSERT INTO category (name) VALUES ('Tribal');
INSERT INTO category (name) VALUES ('General');
INSERT INTO category (name) VALUES ('Black and White');
INSERT INTO category (name) VALUES ('Skull');
INSERT INTO category (name) VALUES ('Nature');

INSERT INTO ad (id_category, id_user, description, title, price, url_image) VALUES ('4','1','Description for Skull Cherry. http://candys-killer.deviantart.com/art/Tatoo-Sketch-1-60105927','Skull Cherry', '40', './img/img1.jpg');
INSERT INTO ad (id_category, id_user, description, title, price, url_image) VALUES ('3','2','Description for Future Tatto. http://www.deviantart.com/art/future-tatoo-24157719','Future Tatto','40','./img/img2.jpg');
INSERT INTO ad (id_category, id_user, description, title, price, url_image) VALUES ('3','3','Description for Cross Tattoo. http://fullmetalschoettle.deviantart.com/art/cross-tatoo-53930169','Cross Tattoo','30','./img/img3.jpg');
INSERT INTO ad (id_category, id_user, description, title, price, url_image) VALUES ('5','4','Description for Moon. http://pepius.deviantart.com/art/Tatoo-design-15303159','Moon','25','./img/img5.jpg');
INSERT INTO ad (id_category, id_user, description, title, price, url_image) VALUES ('1','5','Description for Heart & Tribal http://ladyscorpio19.deviantart.com/art/next-tatoo-30371861','Heart & Tribal','30','./img/img4.jpg');
INSERT INTO ad (id_category, id_user, description, title, price, url_image) VALUES ('2','6','Description for The Eye http://www.deviantart.com/art/like-a-tatoo-22252274','The Eye','35','./img/img6.jpg');
