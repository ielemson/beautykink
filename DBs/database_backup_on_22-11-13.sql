

CREATE TABLE `about_us_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_descriptions` text,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO admins (id, name, email, phone, photo, role_id, password, email_token, created_at, updated_at) VALUES ('1','Admin User','admin@gmail.com','+1 (949) 932-3298','uploads/profile/0.01995500 1643272041.png','0','$2y$10$7vq5w/93mFIQo01GHVM4WeawITmWAdIZNA.Oc2FMtI/lmLt1A8fTy','','2022-01-20 18:41:29','2022-05-14 09:53:07');

INSERT INTO admins (id, name, email, phone, photo, role_id, password, email_token, created_at, updated_at) VALUES ('3','John Doe','staff@email.com','+1 (286) 263-1971','uploads/profile/0.12809200 1648745169.jpg','3','$2y$10$x.DWi4zROEYBZGzIn30/H.V4AnwUNNe5YcJUYcFLE.pI3J3hS2X3y','','2022-03-31 12:23:56','2022-05-24 03:10:47');


CREATE TABLE `attribute_options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double DEFAULT '1',
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO attribute_options (id, attribute_id, name, image, price, keyword, created_at, updated_at) VALUES ('9','23','ok','','842','ok','2022-02-09 12:12:37','2022-02-09 12:12:37');

INSERT INTO attribute_options (id, attribute_id, name, image, price, keyword, created_at, updated_at) VALUES ('10','23','ok2','','100','','2022-02-09 12:12:52','2022-02-09 12:14:35');

INSERT INTO attribute_options (id, attribute_id, name, image, price, keyword, created_at, updated_at) VALUES ('16','3','Star Glow','1666404014.jpg','0','star-glow','2022-10-22 02:00:14','2022-10-22 02:00:14');

INSERT INTO attribute_options (id, attribute_id, name, image, price, keyword, created_at, updated_at) VALUES ('17','3','Sun Glow','1666404070.jpg','0','','2022-10-22 02:01:10','2022-10-22 02:01:10');

INSERT INTO attribute_options (id, attribute_id, name, image, price, keyword, created_at, updated_at) VALUES ('18','3','Fire Glow','1666404368.png','0','','2022-10-22 02:01:52','2022-10-22 02:06:08');

INSERT INTO attribute_options (id, attribute_id, name, image, price, keyword, created_at, updated_at) VALUES ('19','4','Rose Glow','1667767742.jpg','0','rose-glow','2022-11-06 20:49:02','2022-11-06 20:49:02');


CREATE TABLE `attributes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO attributes (id, item_id, name, keyword, created_at, updated_at) VALUES ('1','59','new','new','2022-10-04 01:28:01','2022-10-04 01:28:01');

INSERT INTO attributes (id, item_id, name, keyword, created_at, updated_at) VALUES ('2','60','test attribute','test-attribute','2022-10-13 13:18:07','2022-10-13 13:18:07');

INSERT INTO attributes (id, item_id, name, keyword, created_at, updated_at) VALUES ('3','58','Color','color','2022-10-21 12:01:57','2022-10-21 12:16:33');

INSERT INTO attributes (id, item_id, name, keyword, created_at, updated_at) VALUES ('4','61','Color','color','2022-10-21 16:10:48','2022-10-21 16:10:48');


CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `bcategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO bcategories (id, name, slug, status, created_at, updated_at) VALUES ('4','Beauty','Beauty','1','2022-03-30 03:36:17','2022-03-30 03:36:17');

INSERT INTO bcategories (id, name, slug, status, created_at, updated_at) VALUES ('5','Fashion','Fashion','1','2022-03-30 03:36:26','2022-03-30 03:36:26');


CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `is_popular` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `campaign_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` bigint(20) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `is_feature` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descriptions` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `is_feature` tinyint(4) DEFAULT '1',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO categories (id, name, slug, photo, meta_keywords, meta_descriptions, status, is_feature, description, serial, created_at, updated_at) VALUES ('5','Shop All','shop-all','uploads/categories/1666207136-slider.jpg','[{"value":"web"},{"value":"themes"},{"value":"templates"}]','Web Themes & Templates','1','1','','0','2022-01-24 14:18:22','2022-10-19 19:18:56');

INSERT INTO categories (id, name, slug, photo, meta_keywords, meta_descriptions, status, is_feature, description, serial, created_at, updated_at) VALUES ('16','Men Clothing','Men-Clothing','uploads/categories/0.98471800 1643271772.jpg','[{"value":"Men"},{"value":"Clothing"},{"value":"Men Clothing"}]','Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum','1','1','','1','2022-01-26 13:26:30','2022-04-02 12:18:37');

INSERT INTO categories (id, name, slug, photo, meta_keywords, meta_descriptions, status, is_feature, description, serial, created_at, updated_at) VALUES ('18','Sports & Entertainment','Sports---Entertainment','uploads/categories/0.63980600 1643271875.jpg','[{"value":"Sports"},{"value":"Entertainment"},{"value":"Sports & Entertainment"}]','Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
optio, eaque rerum! Provident similique accusantium nemo autem.','1','1','','0','2022-01-27 04:23:36','2022-01-27 04:24:35');

INSERT INTO categories (id, name, slug, photo, meta_keywords, meta_descriptions, status, is_feature, description, serial, created_at, updated_at) VALUES ('19','Women Clothing','Women-Clothing','uploads/categories/0.19990200 1644509233-1629616296pexels-juan-mendez-1536619.jpg','[{"value":"women"}]','Women Clothing','0','1','','0','2022-02-10 12:07:13','2022-09-23 21:45:04');

INSERT INTO categories (id, name, slug, photo, meta_keywords, meta_descriptions, status, is_feature, description, serial, created_at, updated_at) VALUES ('21','Home & Garden','Home-Garden','uploads/categories/0.30226800 1648916180-1629616234pexels-cup-of-couple-8015784.jpg','','','0','1','','6','2022-04-02 12:16:20','2022-09-23 21:44:51');

INSERT INTO categories (id, name, slug, photo, meta_keywords, meta_descriptions, status, is_feature, description, serial, created_at, updated_at) VALUES ('22','Beauty & Personal Care','Beauty-Personal-Care','uploads/categories/0.83144900 1648916259-1631023636ballll.jpg','','','0','1','','5','2022-04-02 12:17:39','2022-09-23 21:44:36');

INSERT INTO categories (id, name, slug, photo, meta_keywords, meta_descriptions, status, is_feature, description, serial, created_at, updated_at) VALUES ('23','Electronics','Electronics','uploads/categories/0.69238100 1648916294-1629616270computer.jpg','','','0','1','','1','2022-04-02 12:18:14','2022-09-23 21:44:29');


CREATE TABLE `child_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) NOT NULL,
  `subcategory_id` bigint(20) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO child_categories (id, name, slug, category_id, subcategory_id, status, created_at, updated_at) VALUES ('1','Highlighter','highlighter','5','1','1','2022-09-24 04:56:23','2022-09-24 05:12:24');

INSERT INTO child_categories (id, name, slug, category_id, subcategory_id, status, created_at, updated_at) VALUES ('2','Mascara','mascara','5','2','1','2022-09-24 04:57:57','2022-09-24 04:58:53');

INSERT INTO child_categories (id, name, slug, category_id, subcategory_id, status, created_at, updated_at) VALUES ('3','Blending Sponge','slending-sponge','5','3','1','2022-09-24 05:13:42','2022-09-24 05:13:42');


CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`),
  CONSTRAINT `FK` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=775 DEFAULT CHARSET=utf32 COMMENT='Local governments in Nigeria.';


INSERT INTO cities (id, state_id, name) VALUES ('1','1','Aba North');

INSERT INTO cities (id, state_id, name) VALUES ('2','1','Aba South');

INSERT INTO cities (id, state_id, name) VALUES ('3','1','Arochukwu');

INSERT INTO cities (id, state_id, name) VALUES ('4','1','Bende');

INSERT INTO cities (id, state_id, name) VALUES ('5','1','Ikwuano');

INSERT INTO cities (id, state_id, name) VALUES ('6','1','Isiala Ngwa North');

INSERT INTO cities (id, state_id, name) VALUES ('7','1','Isiala Ngwa South');

INSERT INTO cities (id, state_id, name) VALUES ('8','1','Isuikwuato');

INSERT INTO cities (id, state_id, name) VALUES ('9','1','Obi Ngwa');

INSERT INTO cities (id, state_id, name) VALUES ('10','1','Ohafia');

INSERT INTO cities (id, state_id, name) VALUES ('11','1','Osisioma');

INSERT INTO cities (id, state_id, name) VALUES ('12','1','Ugwunagbo');

INSERT INTO cities (id, state_id, name) VALUES ('13','1','Ukwa East');

INSERT INTO cities (id, state_id, name) VALUES ('14','1','Ukwa West');

INSERT INTO cities (id, state_id, name) VALUES ('15','1','Umuahia North');

INSERT INTO cities (id, state_id, name) VALUES ('16','1','Umuahia South');

INSERT INTO cities (id, state_id, name) VALUES ('17','1','Umu Nneochi');

INSERT INTO cities (id, state_id, name) VALUES ('18','2','Demsa');

INSERT INTO cities (id, state_id, name) VALUES ('19','2','Fufure');

INSERT INTO cities (id, state_id, name) VALUES ('20','2','Ganye');

INSERT INTO cities (id, state_id, name) VALUES ('21','2','Gayuk');

INSERT INTO cities (id, state_id, name) VALUES ('22','2','Gombi');

INSERT INTO cities (id, state_id, name) VALUES ('23','2','Grie');

INSERT INTO cities (id, state_id, name) VALUES ('24','2','Hong');

INSERT INTO cities (id, state_id, name) VALUES ('25','2','Jada');

INSERT INTO cities (id, state_id, name) VALUES ('26','2','Larmurde');

INSERT INTO cities (id, state_id, name) VALUES ('27','2','Madagali');

INSERT INTO cities (id, state_id, name) VALUES ('28','2','Maiha');

INSERT INTO cities (id, state_id, name) VALUES ('29','2','Mayo Belwa');

INSERT INTO cities (id, state_id, name) VALUES ('30','2','Michika');

INSERT INTO cities (id, state_id, name) VALUES ('31','2','Mubi North');

INSERT INTO cities (id, state_id, name) VALUES ('32','2','Mubi South');

INSERT INTO cities (id, state_id, name) VALUES ('33','2','Numan');

INSERT INTO cities (id, state_id, name) VALUES ('34','2','Shelleng');

INSERT INTO cities (id, state_id, name) VALUES ('35','2','Song');

INSERT INTO cities (id, state_id, name) VALUES ('36','2','Toungo');

INSERT INTO cities (id, state_id, name) VALUES ('37','2','Yola North');

INSERT INTO cities (id, state_id, name) VALUES ('38','2','Yola South');

INSERT INTO cities (id, state_id, name) VALUES ('39','3','Abak');

INSERT INTO cities (id, state_id, name) VALUES ('40','3','Eastern Obolo');

INSERT INTO cities (id, state_id, name) VALUES ('41','3','Eket');

INSERT INTO cities (id, state_id, name) VALUES ('42','3','Esit Eket');

INSERT INTO cities (id, state_id, name) VALUES ('43','3','Essien Udim');

INSERT INTO cities (id, state_id, name) VALUES ('44','3','Etim Ekpo');

INSERT INTO cities (id, state_id, name) VALUES ('45','3','Etinan');

INSERT INTO cities (id, state_id, name) VALUES ('46','3','Ibeno');

INSERT INTO cities (id, state_id, name) VALUES ('47','3','Ibesikpo Asutan');

INSERT INTO cities (id, state_id, name) VALUES ('48','3','Ibiono-Ibom');

INSERT INTO cities (id, state_id, name) VALUES ('49','3','Ika');

INSERT INTO cities (id, state_id, name) VALUES ('50','3','Ikono');

INSERT INTO cities (id, state_id, name) VALUES ('51','3','Ikot Abasi');

INSERT INTO cities (id, state_id, name) VALUES ('52','3','Ikot Ekpene');

INSERT INTO cities (id, state_id, name) VALUES ('53','3','Ini');

INSERT INTO cities (id, state_id, name) VALUES ('54','3','Itu');

INSERT INTO cities (id, state_id, name) VALUES ('55','3','Mbo');

INSERT INTO cities (id, state_id, name) VALUES ('56','3','Mkpat-Enin');

INSERT INTO cities (id, state_id, name) VALUES ('57','3','Nsit-Atai');

INSERT INTO cities (id, state_id, name) VALUES ('58','3','Nsit-Ibom');

INSERT INTO cities (id, state_id, name) VALUES ('59','3','Nsit-Ubium');

INSERT INTO cities (id, state_id, name) VALUES ('60','3','Obot Akara');

INSERT INTO cities (id, state_id, name) VALUES ('61','3','Okobo');

INSERT INTO cities (id, state_id, name) VALUES ('62','3','Onna');

INSERT INTO cities (id, state_id, name) VALUES ('63','3','Oron');

INSERT INTO cities (id, state_id, name) VALUES ('64','3','Oruk Anam');

INSERT INTO cities (id, state_id, name) VALUES ('65','3','Udung-Uko');

INSERT INTO cities (id, state_id, name) VALUES ('66','3','Ukanafun');

INSERT INTO cities (id, state_id, name) VALUES ('67','3','Uruan');

INSERT INTO cities (id, state_id, name) VALUES ('68','3','Urue-Offong/Oruko');

INSERT INTO cities (id, state_id, name) VALUES ('69','3','Uyo');

INSERT INTO cities (id, state_id, name) VALUES ('70','4','Aguata');

INSERT INTO cities (id, state_id, name) VALUES ('71','4','Anambra East');

INSERT INTO cities (id, state_id, name) VALUES ('72','4','Anambra West');

INSERT INTO cities (id, state_id, name) VALUES ('73','4','Anaocha');

INSERT INTO cities (id, state_id, name) VALUES ('74','4','Awka North');

INSERT INTO cities (id, state_id, name) VALUES ('75','4','Awka South');

INSERT INTO cities (id, state_id, name) VALUES ('76','4','Ayamelum');

INSERT INTO cities (id, state_id, name) VALUES ('77','4','Dunukofia');

INSERT INTO cities (id, state_id, name) VALUES ('78','4','Ekwusigo');

INSERT INTO cities (id, state_id, name) VALUES ('79','4','Idemili North');

INSERT INTO cities (id, state_id, name) VALUES ('80','4','Idemili South');

INSERT INTO cities (id, state_id, name) VALUES ('81','4','Ihiala');

INSERT INTO cities (id, state_id, name) VALUES ('82','4','Njikoka');

INSERT INTO cities (id, state_id, name) VALUES ('83','4','Nnewi North');

INSERT INTO cities (id, state_id, name) VALUES ('84','4','Nnewi South');

INSERT INTO cities (id, state_id, name) VALUES ('85','4','Ogbaru');

INSERT INTO cities (id, state_id, name) VALUES ('86','4','Onitsha North');

INSERT INTO cities (id, state_id, name) VALUES ('87','4','Onitsha South');

INSERT INTO cities (id, state_id, name) VALUES ('88','4','Orumba North');

INSERT INTO cities (id, state_id, name) VALUES ('89','4','Orumba South');

INSERT INTO cities (id, state_id, name) VALUES ('90','4','Oyi');

INSERT INTO cities (id, state_id, name) VALUES ('91','5','Alkaleri');

INSERT INTO cities (id, state_id, name) VALUES ('92','5','Bauchi');

INSERT INTO cities (id, state_id, name) VALUES ('93','5','Bogoro');

INSERT INTO cities (id, state_id, name) VALUES ('94','5','Damban');

INSERT INTO cities (id, state_id, name) VALUES ('95','5','Darazo');

INSERT INTO cities (id, state_id, name) VALUES ('96','5','Dass');

INSERT INTO cities (id, state_id, name) VALUES ('97','5','Gamawa');

INSERT INTO cities (id, state_id, name) VALUES ('98','5','Ganjuwa');

INSERT INTO cities (id, state_id, name) VALUES ('99','5','Giade');

INSERT INTO cities (id, state_id, name) VALUES ('100','5','Itas/Gadau');

INSERT INTO cities (id, state_id, name) VALUES ('101','5','Jama\'are');

INSERT INTO cities (id, state_id, name) VALUES ('102','5','Katagum');

INSERT INTO cities (id, state_id, name) VALUES ('103','5','Kirfi');

INSERT INTO cities (id, state_id, name) VALUES ('104','5','Misau');

INSERT INTO cities (id, state_id, name) VALUES ('105','5','Ningi');

INSERT INTO cities (id, state_id, name) VALUES ('106','5','Shira');

INSERT INTO cities (id, state_id, name) VALUES ('107','5','Tafawa Balewa');

INSERT INTO cities (id, state_id, name) VALUES ('108','5','Toro');

INSERT INTO cities (id, state_id, name) VALUES ('109','5','Warji');

INSERT INTO cities (id, state_id, name) VALUES ('110','5','Zaki');

INSERT INTO cities (id, state_id, name) VALUES ('111','6','Brass');

INSERT INTO cities (id, state_id, name) VALUES ('112','6','Ekeremor');

INSERT INTO cities (id, state_id, name) VALUES ('113','6','Kolokuma/Opokuma');

INSERT INTO cities (id, state_id, name) VALUES ('114','6','Nembe');

INSERT INTO cities (id, state_id, name) VALUES ('115','6','Ogbia');

INSERT INTO cities (id, state_id, name) VALUES ('116','6','Sagbama');

INSERT INTO cities (id, state_id, name) VALUES ('117','6','Southern Ijaw');

INSERT INTO cities (id, state_id, name) VALUES ('118','6','Yenagoa');

INSERT INTO cities (id, state_id, name) VALUES ('119','7','Agatu');

INSERT INTO cities (id, state_id, name) VALUES ('120','7','Apa');

INSERT INTO cities (id, state_id, name) VALUES ('121','7','Ado');

INSERT INTO cities (id, state_id, name) VALUES ('122','7','Buruku');

INSERT INTO cities (id, state_id, name) VALUES ('123','7','Gboko');

INSERT INTO cities (id, state_id, name) VALUES ('124','7','Guma');

INSERT INTO cities (id, state_id, name) VALUES ('125','7','Gwer East');

INSERT INTO cities (id, state_id, name) VALUES ('126','7','Gwer West');

INSERT INTO cities (id, state_id, name) VALUES ('127','7','Katsina-Ala');

INSERT INTO cities (id, state_id, name) VALUES ('128','7','Konshisha');

INSERT INTO cities (id, state_id, name) VALUES ('129','7','Kwande');

INSERT INTO cities (id, state_id, name) VALUES ('130','7','Logo');

INSERT INTO cities (id, state_id, name) VALUES ('131','7','Makurdi');

INSERT INTO cities (id, state_id, name) VALUES ('132','7','Obi');

INSERT INTO cities (id, state_id, name) VALUES ('133','7','Ogbadibo');

INSERT INTO cities (id, state_id, name) VALUES ('134','7','Ohimini');

INSERT INTO cities (id, state_id, name) VALUES ('135','7','Oju');

INSERT INTO cities (id, state_id, name) VALUES ('136','7','Okpokwu');

INSERT INTO cities (id, state_id, name) VALUES ('137','7','Oturkpo');

INSERT INTO cities (id, state_id, name) VALUES ('138','7','Tarka');

INSERT INTO cities (id, state_id, name) VALUES ('139','7','Ukum');

INSERT INTO cities (id, state_id, name) VALUES ('140','7','Ushongo');

INSERT INTO cities (id, state_id, name) VALUES ('141','7','Vandeikya');

INSERT INTO cities (id, state_id, name) VALUES ('142','8','Abadam');

INSERT INTO cities (id, state_id, name) VALUES ('143','8','Askira/Uba');

INSERT INTO cities (id, state_id, name) VALUES ('144','8','Bama');

INSERT INTO cities (id, state_id, name) VALUES ('145','8','Bayo');

INSERT INTO cities (id, state_id, name) VALUES ('146','8','Biu');

INSERT INTO cities (id, state_id, name) VALUES ('147','8','Chibok');

INSERT INTO cities (id, state_id, name) VALUES ('148','8','Damboa');

INSERT INTO cities (id, state_id, name) VALUES ('149','8','Dikwa');

INSERT INTO cities (id, state_id, name) VALUES ('150','8','Gubio');

INSERT INTO cities (id, state_id, name) VALUES ('151','8','Guzamala');

INSERT INTO cities (id, state_id, name) VALUES ('152','8','Gwoza');

INSERT INTO cities (id, state_id, name) VALUES ('153','8','Hawul');

INSERT INTO cities (id, state_id, name) VALUES ('154','8','Jere');

INSERT INTO cities (id, state_id, name) VALUES ('155','8','Kaga');

INSERT INTO cities (id, state_id, name) VALUES ('156','8','Kala/Balge');

INSERT INTO cities (id, state_id, name) VALUES ('157','8','Konduga');

INSERT INTO cities (id, state_id, name) VALUES ('158','8','Kukawa');

INSERT INTO cities (id, state_id, name) VALUES ('159','8','Kwaya Kusar');

INSERT INTO cities (id, state_id, name) VALUES ('160','8','Mafa');

INSERT INTO cities (id, state_id, name) VALUES ('161','8','Magumeri');

INSERT INTO cities (id, state_id, name) VALUES ('162','8','Maiduguri');

INSERT INTO cities (id, state_id, name) VALUES ('163','8','Marte');

INSERT INTO cities (id, state_id, name) VALUES ('164','8','Mobbar');

INSERT INTO cities (id, state_id, name) VALUES ('165','8','Monguno');

INSERT INTO cities (id, state_id, name) VALUES ('166','8','Ngala');

INSERT INTO cities (id, state_id, name) VALUES ('167','8','Nganzai');

INSERT INTO cities (id, state_id, name) VALUES ('168','8','Shani');

INSERT INTO cities (id, state_id, name) VALUES ('169','9','Abi');

INSERT INTO cities (id, state_id, name) VALUES ('170','9','Akamkpa');

INSERT INTO cities (id, state_id, name) VALUES ('171','9','Akpabuyo');

INSERT INTO cities (id, state_id, name) VALUES ('172','9','Bakassi');

INSERT INTO cities (id, state_id, name) VALUES ('173','9','Bekwarra');

INSERT INTO cities (id, state_id, name) VALUES ('174','9','Biase');

INSERT INTO cities (id, state_id, name) VALUES ('175','9','Boki');

INSERT INTO cities (id, state_id, name) VALUES ('176','9','Calabar Municipal');

INSERT INTO cities (id, state_id, name) VALUES ('177','9','Calabar South');

INSERT INTO cities (id, state_id, name) VALUES ('178','9','Etung');

INSERT INTO cities (id, state_id, name) VALUES ('179','9','Ikom');

INSERT INTO cities (id, state_id, name) VALUES ('180','9','Obanliku');

INSERT INTO cities (id, state_id, name) VALUES ('181','9','Obubra');

INSERT INTO cities (id, state_id, name) VALUES ('182','9','Obudu');

INSERT INTO cities (id, state_id, name) VALUES ('183','9','Odukpani');

INSERT INTO cities (id, state_id, name) VALUES ('184','9','Ogoja');

INSERT INTO cities (id, state_id, name) VALUES ('185','9','Yakuur');

INSERT INTO cities (id, state_id, name) VALUES ('186','9','Yala');

INSERT INTO cities (id, state_id, name) VALUES ('187','10','Aniocha North');

INSERT INTO cities (id, state_id, name) VALUES ('188','10','Aniocha South');

INSERT INTO cities (id, state_id, name) VALUES ('189','10','Bomadi');

INSERT INTO cities (id, state_id, name) VALUES ('190','10','Burutu');

INSERT INTO cities (id, state_id, name) VALUES ('191','10','Ethiope East');

INSERT INTO cities (id, state_id, name) VALUES ('192','10','Ethiope West');

INSERT INTO cities (id, state_id, name) VALUES ('193','10','Ika North East');

INSERT INTO cities (id, state_id, name) VALUES ('194','10','Ika South');

INSERT INTO cities (id, state_id, name) VALUES ('195','10','Isoko North');

INSERT INTO cities (id, state_id, name) VALUES ('196','10','Isoko South');

INSERT INTO cities (id, state_id, name) VALUES ('197','10','Ndokwa East');

INSERT INTO cities (id, state_id, name) VALUES ('198','10','Ndokwa West');

INSERT INTO cities (id, state_id, name) VALUES ('199','10','Okpe');

INSERT INTO cities (id, state_id, name) VALUES ('200','10','Oshimili North');

INSERT INTO cities (id, state_id, name) VALUES ('201','10','Oshimili South');

INSERT INTO cities (id, state_id, name) VALUES ('202','10','Patani');

INSERT INTO cities (id, state_id, name) VALUES ('203','10','Sapele, Delta');

INSERT INTO cities (id, state_id, name) VALUES ('204','10','Udu');

INSERT INTO cities (id, state_id, name) VALUES ('205','10','Ughelli North');

INSERT INTO cities (id, state_id, name) VALUES ('206','10','Ughelli South');

INSERT INTO cities (id, state_id, name) VALUES ('207','10','Ukwuani');

INSERT INTO cities (id, state_id, name) VALUES ('208','10','Uvwie');

INSERT INTO cities (id, state_id, name) VALUES ('209','10','Warri North');

INSERT INTO cities (id, state_id, name) VALUES ('210','10','Warri South');

INSERT INTO cities (id, state_id, name) VALUES ('211','10','Warri South West');

INSERT INTO cities (id, state_id, name) VALUES ('212','11','Abakaliki');

INSERT INTO cities (id, state_id, name) VALUES ('213','11','Afikpo North');

INSERT INTO cities (id, state_id, name) VALUES ('214','11','Afikpo South');

INSERT INTO cities (id, state_id, name) VALUES ('215','11','Ebonyi');

INSERT INTO cities (id, state_id, name) VALUES ('216','11','Ezza North');

INSERT INTO cities (id, state_id, name) VALUES ('217','11','Ezza South');

INSERT INTO cities (id, state_id, name) VALUES ('218','11','Ikwo');

INSERT INTO cities (id, state_id, name) VALUES ('219','11','Ishielu');

INSERT INTO cities (id, state_id, name) VALUES ('220','11','Ivo');

INSERT INTO cities (id, state_id, name) VALUES ('221','11','Izzi');

INSERT INTO cities (id, state_id, name) VALUES ('222','11','Ohaozara');

INSERT INTO cities (id, state_id, name) VALUES ('223','11','Ohaukwu');

INSERT INTO cities (id, state_id, name) VALUES ('224','11','Onicha');

INSERT INTO cities (id, state_id, name) VALUES ('225','12','Akoko-Edo');

INSERT INTO cities (id, state_id, name) VALUES ('226','12','Egor');

INSERT INTO cities (id, state_id, name) VALUES ('227','12','Esan Central');

INSERT INTO cities (id, state_id, name) VALUES ('228','12','Esan North-East');

INSERT INTO cities (id, state_id, name) VALUES ('229','12','Esan South-East');

INSERT INTO cities (id, state_id, name) VALUES ('230','12','Esan West');

INSERT INTO cities (id, state_id, name) VALUES ('231','12','Etsako Central');

INSERT INTO cities (id, state_id, name) VALUES ('232','12','Etsako East');

INSERT INTO cities (id, state_id, name) VALUES ('233','12','Etsako West');

INSERT INTO cities (id, state_id, name) VALUES ('234','12','Igueben');

INSERT INTO cities (id, state_id, name) VALUES ('235','12','Ikpoba Okha');

INSERT INTO cities (id, state_id, name) VALUES ('236','12','Orhionmwon');

INSERT INTO cities (id, state_id, name) VALUES ('237','12','Oredo');

INSERT INTO cities (id, state_id, name) VALUES ('238','12','Ovia North-East');

INSERT INTO cities (id, state_id, name) VALUES ('239','12','Ovia South-West');

INSERT INTO cities (id, state_id, name) VALUES ('240','12','Owan East');

INSERT INTO cities (id, state_id, name) VALUES ('241','12','Owan West');

INSERT INTO cities (id, state_id, name) VALUES ('242','12','Uhunmwonde');

INSERT INTO cities (id, state_id, name) VALUES ('243','13','Ado Ekiti');

INSERT INTO cities (id, state_id, name) VALUES ('244','13','Efon');

INSERT INTO cities (id, state_id, name) VALUES ('245','13','Ekiti East');

INSERT INTO cities (id, state_id, name) VALUES ('246','13','Ekiti South-West');

INSERT INTO cities (id, state_id, name) VALUES ('247','13','Ekiti West');

INSERT INTO cities (id, state_id, name) VALUES ('248','13','Emure');

INSERT INTO cities (id, state_id, name) VALUES ('249','13','Gbonyin');

INSERT INTO cities (id, state_id, name) VALUES ('250','13','Ido Osi');

INSERT INTO cities (id, state_id, name) VALUES ('251','13','Ijero');

INSERT INTO cities (id, state_id, name) VALUES ('252','13','Ikere');

INSERT INTO cities (id, state_id, name) VALUES ('253','13','Ikole');

INSERT INTO cities (id, state_id, name) VALUES ('254','13','Ilejemeje');

INSERT INTO cities (id, state_id, name) VALUES ('255','13','Irepodun/Ifelodun');

INSERT INTO cities (id, state_id, name) VALUES ('256','13','Ise/Orun');

INSERT INTO cities (id, state_id, name) VALUES ('257','13','Moba');

INSERT INTO cities (id, state_id, name) VALUES ('258','13','Oye');

INSERT INTO cities (id, state_id, name) VALUES ('259','14','Aninri');

INSERT INTO cities (id, state_id, name) VALUES ('260','14','Awgu');

INSERT INTO cities (id, state_id, name) VALUES ('261','14','Enugu East');

INSERT INTO cities (id, state_id, name) VALUES ('262','14','Enugu North');

INSERT INTO cities (id, state_id, name) VALUES ('263','14','Enugu South');

INSERT INTO cities (id, state_id, name) VALUES ('264','14','Ezeagu');

INSERT INTO cities (id, state_id, name) VALUES ('265','14','Igbo Etiti');

INSERT INTO cities (id, state_id, name) VALUES ('266','14','Igbo Eze North');

INSERT INTO cities (id, state_id, name) VALUES ('267','14','Igbo Eze South');

INSERT INTO cities (id, state_id, name) VALUES ('268','14','Isi Uzo');

INSERT INTO cities (id, state_id, name) VALUES ('269','14','Nkanu East');

INSERT INTO cities (id, state_id, name) VALUES ('270','14','Nkanu West');

INSERT INTO cities (id, state_id, name) VALUES ('271','14','Nsukka');

INSERT INTO cities (id, state_id, name) VALUES ('272','14','Oji River');

INSERT INTO cities (id, state_id, name) VALUES ('273','14','Udenu');

INSERT INTO cities (id, state_id, name) VALUES ('274','14','Udi');

INSERT INTO cities (id, state_id, name) VALUES ('275','14','Uzo Uwani');

INSERT INTO cities (id, state_id, name) VALUES ('276','15','Abaji');

INSERT INTO cities (id, state_id, name) VALUES ('277','15','Bwari');

INSERT INTO cities (id, state_id, name) VALUES ('278','15','Gwagwalada');

INSERT INTO cities (id, state_id, name) VALUES ('279','15','Kuje');

INSERT INTO cities (id, state_id, name) VALUES ('280','15','Kwali');

INSERT INTO cities (id, state_id, name) VALUES ('281','15','Municipal Area Council');

INSERT INTO cities (id, state_id, name) VALUES ('282','16','Akko');

INSERT INTO cities (id, state_id, name) VALUES ('283','16','Balanga');

INSERT INTO cities (id, state_id, name) VALUES ('284','16','Billiri');

INSERT INTO cities (id, state_id, name) VALUES ('285','16','Dukku');

INSERT INTO cities (id, state_id, name) VALUES ('286','16','Funakaye');

INSERT INTO cities (id, state_id, name) VALUES ('287','16','Gombe');

INSERT INTO cities (id, state_id, name) VALUES ('288','16','Kaltungo');

INSERT INTO cities (id, state_id, name) VALUES ('289','16','Kwami');

INSERT INTO cities (id, state_id, name) VALUES ('290','16','Nafada');

INSERT INTO cities (id, state_id, name) VALUES ('291','16','Shongom');

INSERT INTO cities (id, state_id, name) VALUES ('292','16','Yamaltu/Deba');

INSERT INTO cities (id, state_id, name) VALUES ('293','17','Aboh Mbaise');

INSERT INTO cities (id, state_id, name) VALUES ('294','17','Ahiazu Mbaise');

INSERT INTO cities (id, state_id, name) VALUES ('295','17','Ehime Mbano');

INSERT INTO cities (id, state_id, name) VALUES ('296','17','Ezinihitte');

INSERT INTO cities (id, state_id, name) VALUES ('297','17','Ideato North');

INSERT INTO cities (id, state_id, name) VALUES ('298','17','Ideato South');

INSERT INTO cities (id, state_id, name) VALUES ('299','17','Ihitte/Uboma');

INSERT INTO cities (id, state_id, name) VALUES ('300','17','Ikeduru');

INSERT INTO cities (id, state_id, name) VALUES ('301','17','Isiala Mbano');

INSERT INTO cities (id, state_id, name) VALUES ('302','17','Isu');

INSERT INTO cities (id, state_id, name) VALUES ('303','17','Mbaitoli');

INSERT INTO cities (id, state_id, name) VALUES ('304','17','Ngor Okpala');

INSERT INTO cities (id, state_id, name) VALUES ('305','17','Njaba');

INSERT INTO cities (id, state_id, name) VALUES ('306','17','Nkwerre');

INSERT INTO cities (id, state_id, name) VALUES ('307','17','Nwangele');

INSERT INTO cities (id, state_id, name) VALUES ('308','17','Obowo');

INSERT INTO cities (id, state_id, name) VALUES ('309','17','Oguta');

INSERT INTO cities (id, state_id, name) VALUES ('310','17','Ohaji/Egbema');

INSERT INTO cities (id, state_id, name) VALUES ('311','17','Okigwe');

INSERT INTO cities (id, state_id, name) VALUES ('312','17','Orlu');

INSERT INTO cities (id, state_id, name) VALUES ('313','17','Orsu');

INSERT INTO cities (id, state_id, name) VALUES ('314','17','Oru East');

INSERT INTO cities (id, state_id, name) VALUES ('315','17','Oru West');

INSERT INTO cities (id, state_id, name) VALUES ('316','17','Owerri Municipal');

INSERT INTO cities (id, state_id, name) VALUES ('317','17','Owerri North');

INSERT INTO cities (id, state_id, name) VALUES ('318','17','Owerri West');

INSERT INTO cities (id, state_id, name) VALUES ('319','17','Unuimo');

INSERT INTO cities (id, state_id, name) VALUES ('320','18','Auyo');

INSERT INTO cities (id, state_id, name) VALUES ('321','18','Babura');

INSERT INTO cities (id, state_id, name) VALUES ('322','18','Biriniwa');

INSERT INTO cities (id, state_id, name) VALUES ('323','18','Birnin Kudu');

INSERT INTO cities (id, state_id, name) VALUES ('324','18','Buji');

INSERT INTO cities (id, state_id, name) VALUES ('325','18','Dutse');

INSERT INTO cities (id, state_id, name) VALUES ('326','18','Gagarawa');

INSERT INTO cities (id, state_id, name) VALUES ('327','18','Garki');

INSERT INTO cities (id, state_id, name) VALUES ('328','18','Gumel');

INSERT INTO cities (id, state_id, name) VALUES ('329','18','Guri');

INSERT INTO cities (id, state_id, name) VALUES ('330','18','Gwaram');

INSERT INTO cities (id, state_id, name) VALUES ('331','18','Gwiwa');

INSERT INTO cities (id, state_id, name) VALUES ('332','18','Hadejia');

INSERT INTO cities (id, state_id, name) VALUES ('333','18','Jahun');

INSERT INTO cities (id, state_id, name) VALUES ('334','18','Kafin Hausa');

INSERT INTO cities (id, state_id, name) VALUES ('335','18','Kazaure');

INSERT INTO cities (id, state_id, name) VALUES ('336','18','Kiri Kasama');

INSERT INTO cities (id, state_id, name) VALUES ('337','18','Kiyawa');

INSERT INTO cities (id, state_id, name) VALUES ('338','18','Kaugama');

INSERT INTO cities (id, state_id, name) VALUES ('339','18','Maigatari');

INSERT INTO cities (id, state_id, name) VALUES ('340','18','Malam Madori');

INSERT INTO cities (id, state_id, name) VALUES ('341','18','Miga');

INSERT INTO cities (id, state_id, name) VALUES ('342','18','Ringim');

INSERT INTO cities (id, state_id, name) VALUES ('343','18','Roni');

INSERT INTO cities (id, state_id, name) VALUES ('344','18','Sule Tankarkar');

INSERT INTO cities (id, state_id, name) VALUES ('345','18','Taura');

INSERT INTO cities (id, state_id, name) VALUES ('346','18','Yankwashi');

INSERT INTO cities (id, state_id, name) VALUES ('347','19','Birnin Gwari');

INSERT INTO cities (id, state_id, name) VALUES ('348','19','Chikun');

INSERT INTO cities (id, state_id, name) VALUES ('349','19','Giwa');

INSERT INTO cities (id, state_id, name) VALUES ('350','19','Igabi');

INSERT INTO cities (id, state_id, name) VALUES ('351','19','Ikara');

INSERT INTO cities (id, state_id, name) VALUES ('352','19','Jaba');

INSERT INTO cities (id, state_id, name) VALUES ('353','19','Jema\'a');

INSERT INTO cities (id, state_id, name) VALUES ('354','19','Kachia');

INSERT INTO cities (id, state_id, name) VALUES ('355','19','Kaduna North');

INSERT INTO cities (id, state_id, name) VALUES ('356','19','Kaduna South');

INSERT INTO cities (id, state_id, name) VALUES ('357','19','Kagarko');

INSERT INTO cities (id, state_id, name) VALUES ('358','19','Kajuru');

INSERT INTO cities (id, state_id, name) VALUES ('359','19','Kaura');

INSERT INTO cities (id, state_id, name) VALUES ('360','19','Kauru');

INSERT INTO cities (id, state_id, name) VALUES ('361','19','Kubau');

INSERT INTO cities (id, state_id, name) VALUES ('362','19','Kudan');

INSERT INTO cities (id, state_id, name) VALUES ('363','19','Lere');

INSERT INTO cities (id, state_id, name) VALUES ('364','19','Makarfi');

INSERT INTO cities (id, state_id, name) VALUES ('365','19','Sabon Gari');

INSERT INTO cities (id, state_id, name) VALUES ('366','19','Sanga');

INSERT INTO cities (id, state_id, name) VALUES ('367','19','Soba');

INSERT INTO cities (id, state_id, name) VALUES ('368','19','Zangon Kataf');

INSERT INTO cities (id, state_id, name) VALUES ('369','19','Zaria');

INSERT INTO cities (id, state_id, name) VALUES ('370','20','Ajingi');

INSERT INTO cities (id, state_id, name) VALUES ('371','20','Albasu');

INSERT INTO cities (id, state_id, name) VALUES ('372','20','Bagwai');

INSERT INTO cities (id, state_id, name) VALUES ('373','20','Bebeji');

INSERT INTO cities (id, state_id, name) VALUES ('374','20','Bichi');

INSERT INTO cities (id, state_id, name) VALUES ('375','20','Bunkure');

INSERT INTO cities (id, state_id, name) VALUES ('376','20','Dala');

INSERT INTO cities (id, state_id, name) VALUES ('377','20','Dambatta');

INSERT INTO cities (id, state_id, name) VALUES ('378','20','Dawakin Kudu');

INSERT INTO cities (id, state_id, name) VALUES ('379','20','Dawakin Tofa');

INSERT INTO cities (id, state_id, name) VALUES ('380','20','Doguwa');

INSERT INTO cities (id, state_id, name) VALUES ('381','20','Fagge');

INSERT INTO cities (id, state_id, name) VALUES ('382','20','Gabasawa');

INSERT INTO cities (id, state_id, name) VALUES ('383','20','Garko');

INSERT INTO cities (id, state_id, name) VALUES ('384','20','Garun Mallam');

INSERT INTO cities (id, state_id, name) VALUES ('385','20','Gaya');

INSERT INTO cities (id, state_id, name) VALUES ('386','20','Gezawa');

INSERT INTO cities (id, state_id, name) VALUES ('387','20','Gwale');

INSERT INTO cities (id, state_id, name) VALUES ('388','20','Gwarzo');

INSERT INTO cities (id, state_id, name) VALUES ('389','20','Kabo');

INSERT INTO cities (id, state_id, name) VALUES ('390','20','Kano Municipal');

INSERT INTO cities (id, state_id, name) VALUES ('391','20','Karaye');

INSERT INTO cities (id, state_id, name) VALUES ('392','20','Kibiya');

INSERT INTO cities (id, state_id, name) VALUES ('393','20','Kiru');

INSERT INTO cities (id, state_id, name) VALUES ('394','20','Kumbotso');

INSERT INTO cities (id, state_id, name) VALUES ('395','20','Kunchi');

INSERT INTO cities (id, state_id, name) VALUES ('396','20','Kura');

INSERT INTO cities (id, state_id, name) VALUES ('397','20','Madobi');

INSERT INTO cities (id, state_id, name) VALUES ('398','20','Makoda');

INSERT INTO cities (id, state_id, name) VALUES ('399','20','Minjibir');

INSERT INTO cities (id, state_id, name) VALUES ('400','20','Nasarawa');

INSERT INTO cities (id, state_id, name) VALUES ('401','20','Rano');

INSERT INTO cities (id, state_id, name) VALUES ('402','20','Rimin Gado');

INSERT INTO cities (id, state_id, name) VALUES ('403','20','Rogo');

INSERT INTO cities (id, state_id, name) VALUES ('404','20','Shanono');

INSERT INTO cities (id, state_id, name) VALUES ('405','20','Sumaila');

INSERT INTO cities (id, state_id, name) VALUES ('406','20','Takai');

INSERT INTO cities (id, state_id, name) VALUES ('407','20','Tarauni');

INSERT INTO cities (id, state_id, name) VALUES ('408','20','Tofa');

INSERT INTO cities (id, state_id, name) VALUES ('409','20','Tsanyawa');

INSERT INTO cities (id, state_id, name) VALUES ('410','20','Tudun Wada');

INSERT INTO cities (id, state_id, name) VALUES ('411','20','Ungogo');

INSERT INTO cities (id, state_id, name) VALUES ('412','20','Warawa');

INSERT INTO cities (id, state_id, name) VALUES ('413','20','Wudil');

INSERT INTO cities (id, state_id, name) VALUES ('414','21','Bakori');

INSERT INTO cities (id, state_id, name) VALUES ('415','21','Batagarawa');

INSERT INTO cities (id, state_id, name) VALUES ('416','21','Batsari');

INSERT INTO cities (id, state_id, name) VALUES ('417','21','Baure');

INSERT INTO cities (id, state_id, name) VALUES ('418','21','Bindawa');

INSERT INTO cities (id, state_id, name) VALUES ('419','21','Charanchi');

INSERT INTO cities (id, state_id, name) VALUES ('420','21','Dandume');

INSERT INTO cities (id, state_id, name) VALUES ('421','21','Danja');

INSERT INTO cities (id, state_id, name) VALUES ('422','21','Dan Musa');

INSERT INTO cities (id, state_id, name) VALUES ('423','21','Daura');

INSERT INTO cities (id, state_id, name) VALUES ('424','21','Dutsi');

INSERT INTO cities (id, state_id, name) VALUES ('425','21','Dutsin Ma');

INSERT INTO cities (id, state_id, name) VALUES ('426','21','Faskari');

INSERT INTO cities (id, state_id, name) VALUES ('427','21','Funtua');

INSERT INTO cities (id, state_id, name) VALUES ('428','21','Ingawa');

INSERT INTO cities (id, state_id, name) VALUES ('429','21','Jibia');

INSERT INTO cities (id, state_id, name) VALUES ('430','21','Kafur');

INSERT INTO cities (id, state_id, name) VALUES ('431','21','Kaita');

INSERT INTO cities (id, state_id, name) VALUES ('432','21','Kankara');

INSERT INTO cities (id, state_id, name) VALUES ('433','21','Kankia');

INSERT INTO cities (id, state_id, name) VALUES ('434','21','Katsina');

INSERT INTO cities (id, state_id, name) VALUES ('435','21','Kurfi');

INSERT INTO cities (id, state_id, name) VALUES ('436','21','Kusada');

INSERT INTO cities (id, state_id, name) VALUES ('437','21','Mai\'Adua');

INSERT INTO cities (id, state_id, name) VALUES ('438','21','Malumfashi');

INSERT INTO cities (id, state_id, name) VALUES ('439','21','Mani');

INSERT INTO cities (id, state_id, name) VALUES ('440','21','Mashi');

INSERT INTO cities (id, state_id, name) VALUES ('441','21','Matazu');

INSERT INTO cities (id, state_id, name) VALUES ('442','21','Musawa');

INSERT INTO cities (id, state_id, name) VALUES ('443','21','Rimi');

INSERT INTO cities (id, state_id, name) VALUES ('444','21','Sabuwa');

INSERT INTO cities (id, state_id, name) VALUES ('445','21','Safana');

INSERT INTO cities (id, state_id, name) VALUES ('446','21','Sandamu');

INSERT INTO cities (id, state_id, name) VALUES ('447','21','Zango');

INSERT INTO cities (id, state_id, name) VALUES ('448','22','Aleiro');

INSERT INTO cities (id, state_id, name) VALUES ('449','22','Arewa Dandi');

INSERT INTO cities (id, state_id, name) VALUES ('450','22','Argungu');

INSERT INTO cities (id, state_id, name) VALUES ('451','22','Augie');

INSERT INTO cities (id, state_id, name) VALUES ('452','22','Bagudo');

INSERT INTO cities (id, state_id, name) VALUES ('453','22','Birnin Kebbi');

INSERT INTO cities (id, state_id, name) VALUES ('454','22','Bunza');

INSERT INTO cities (id, state_id, name) VALUES ('455','22','Dandi');

INSERT INTO cities (id, state_id, name) VALUES ('456','22','Fakai');

INSERT INTO cities (id, state_id, name) VALUES ('457','22','Gwandu');

INSERT INTO cities (id, state_id, name) VALUES ('458','22','Jega');

INSERT INTO cities (id, state_id, name) VALUES ('459','22','Kalgo');

INSERT INTO cities (id, state_id, name) VALUES ('460','22','Koko/Besse');

INSERT INTO cities (id, state_id, name) VALUES ('461','22','Maiyama');

INSERT INTO cities (id, state_id, name) VALUES ('462','22','Ngaski');

INSERT INTO cities (id, state_id, name) VALUES ('463','22','Sakaba');

INSERT INTO cities (id, state_id, name) VALUES ('464','22','Shanga');

INSERT INTO cities (id, state_id, name) VALUES ('465','22','Suru');

INSERT INTO cities (id, state_id, name) VALUES ('466','22','Wasagu/Danko');

INSERT INTO cities (id, state_id, name) VALUES ('467','22','Yauri');

INSERT INTO cities (id, state_id, name) VALUES ('468','22','Zuru');

INSERT INTO cities (id, state_id, name) VALUES ('469','23','Adavi');

INSERT INTO cities (id, state_id, name) VALUES ('470','23','Ajaokuta');

INSERT INTO cities (id, state_id, name) VALUES ('471','23','Ankpa');

INSERT INTO cities (id, state_id, name) VALUES ('472','23','Bassa');

INSERT INTO cities (id, state_id, name) VALUES ('473','23','Dekina');

INSERT INTO cities (id, state_id, name) VALUES ('474','23','Ibaji');

INSERT INTO cities (id, state_id, name) VALUES ('475','23','Idah');

INSERT INTO cities (id, state_id, name) VALUES ('476','23','Igalamela Odolu');

INSERT INTO cities (id, state_id, name) VALUES ('477','23','Ijumu');

INSERT INTO cities (id, state_id, name) VALUES ('478','23','Kabba/Bunu');

INSERT INTO cities (id, state_id, name) VALUES ('479','23','Kogi');

INSERT INTO cities (id, state_id, name) VALUES ('480','23','Lokoja');

INSERT INTO cities (id, state_id, name) VALUES ('481','23','Mopa Muro');

INSERT INTO cities (id, state_id, name) VALUES ('482','23','Ofu');

INSERT INTO cities (id, state_id, name) VALUES ('483','23','Ogori/Magongo');

INSERT INTO cities (id, state_id, name) VALUES ('484','23','Okehi');

INSERT INTO cities (id, state_id, name) VALUES ('485','23','Okene');

INSERT INTO cities (id, state_id, name) VALUES ('486','23','Olamaboro');

INSERT INTO cities (id, state_id, name) VALUES ('487','23','Omala');

INSERT INTO cities (id, state_id, name) VALUES ('488','23','Yagba East');

INSERT INTO cities (id, state_id, name) VALUES ('489','23','Yagba West');

INSERT INTO cities (id, state_id, name) VALUES ('490','24','Asa');

INSERT INTO cities (id, state_id, name) VALUES ('491','24','Baruten');

INSERT INTO cities (id, state_id, name) VALUES ('492','24','Edu');

INSERT INTO cities (id, state_id, name) VALUES ('493','24','Ekiti, Kwara State');

INSERT INTO cities (id, state_id, name) VALUES ('494','24','Ifelodun');

INSERT INTO cities (id, state_id, name) VALUES ('495','24','Ilorin East');

INSERT INTO cities (id, state_id, name) VALUES ('496','24','Ilorin South');

INSERT INTO cities (id, state_id, name) VALUES ('497','24','Ilorin West');

INSERT INTO cities (id, state_id, name) VALUES ('498','24','Irepodun');

INSERT INTO cities (id, state_id, name) VALUES ('499','24','Isin');

INSERT INTO cities (id, state_id, name) VALUES ('500','24','Kaiama');

INSERT INTO cities (id, state_id, name) VALUES ('501','24','Moro');

INSERT INTO cities (id, state_id, name) VALUES ('502','24','Offa');

INSERT INTO cities (id, state_id, name) VALUES ('503','24','Oke Ero');

INSERT INTO cities (id, state_id, name) VALUES ('504','24','Oyun');

INSERT INTO cities (id, state_id, name) VALUES ('505','24','Pategi');

INSERT INTO cities (id, state_id, name) VALUES ('506','25','Agege');

INSERT INTO cities (id, state_id, name) VALUES ('507','25','Ajeromi-Ifelodun');

INSERT INTO cities (id, state_id, name) VALUES ('508','25','Alimosho');

INSERT INTO cities (id, state_id, name) VALUES ('509','25','Amuwo-Odofin');

INSERT INTO cities (id, state_id, name) VALUES ('510','25','Apapa');

INSERT INTO cities (id, state_id, name) VALUES ('511','25','Badagry');

INSERT INTO cities (id, state_id, name) VALUES ('512','25','Epe');

INSERT INTO cities (id, state_id, name) VALUES ('513','25','Eti Osa');

INSERT INTO cities (id, state_id, name) VALUES ('514','25','Ibeju-Lekki');

INSERT INTO cities (id, state_id, name) VALUES ('515','25','Ifako-Ijaiye');

INSERT INTO cities (id, state_id, name) VALUES ('516','25','Ikeja');

INSERT INTO cities (id, state_id, name) VALUES ('517','25','Ikorodu');

INSERT INTO cities (id, state_id, name) VALUES ('518','25','Kosofe');

INSERT INTO cities (id, state_id, name) VALUES ('519','25','Lagos Island');

INSERT INTO cities (id, state_id, name) VALUES ('520','25','Lagos Mainland');

INSERT INTO cities (id, state_id, name) VALUES ('521','25','Mushin');

INSERT INTO cities (id, state_id, name) VALUES ('522','25','Ojo');

INSERT INTO cities (id, state_id, name) VALUES ('523','25','Oshodi-Isolo');

INSERT INTO cities (id, state_id, name) VALUES ('524','25','Shomolu');

INSERT INTO cities (id, state_id, name) VALUES ('525','25','Surulere, Lagos State');

INSERT INTO cities (id, state_id, name) VALUES ('526','26','Akwanga');

INSERT INTO cities (id, state_id, name) VALUES ('527','26','Awe');

INSERT INTO cities (id, state_id, name) VALUES ('528','26','Doma');

INSERT INTO cities (id, state_id, name) VALUES ('529','26','Karu');

INSERT INTO cities (id, state_id, name) VALUES ('530','26','Keana');

INSERT INTO cities (id, state_id, name) VALUES ('531','26','Keffi');

INSERT INTO cities (id, state_id, name) VALUES ('532','26','Kokona');

INSERT INTO cities (id, state_id, name) VALUES ('533','26','Lafia');

INSERT INTO cities (id, state_id, name) VALUES ('534','26','Nasarawa');

INSERT INTO cities (id, state_id, name) VALUES ('535','26','Nasarawa Egon');

INSERT INTO cities (id, state_id, name) VALUES ('536','26','Obi');

INSERT INTO cities (id, state_id, name) VALUES ('537','26','Toto');

INSERT INTO cities (id, state_id, name) VALUES ('538','26','Wamba');

INSERT INTO cities (id, state_id, name) VALUES ('539','27','Agaie');

INSERT INTO cities (id, state_id, name) VALUES ('540','27','Agwara');

INSERT INTO cities (id, state_id, name) VALUES ('541','27','Bida');

INSERT INTO cities (id, state_id, name) VALUES ('542','27','Borgu');

INSERT INTO cities (id, state_id, name) VALUES ('543','27','Bosso');

INSERT INTO cities (id, state_id, name) VALUES ('544','27','Chanchaga');

INSERT INTO cities (id, state_id, name) VALUES ('545','27','Edati');

INSERT INTO cities (id, state_id, name) VALUES ('546','27','Gbako');

INSERT INTO cities (id, state_id, name) VALUES ('547','27','Gurara');

INSERT INTO cities (id, state_id, name) VALUES ('548','27','Katcha');

INSERT INTO cities (id, state_id, name) VALUES ('549','27','Kontagora');

INSERT INTO cities (id, state_id, name) VALUES ('550','27','Lapai');

INSERT INTO cities (id, state_id, name) VALUES ('551','27','Lavun');

INSERT INTO cities (id, state_id, name) VALUES ('552','27','Magama');

INSERT INTO cities (id, state_id, name) VALUES ('553','27','Mariga');

INSERT INTO cities (id, state_id, name) VALUES ('554','27','Mashegu');

INSERT INTO cities (id, state_id, name) VALUES ('555','27','Mokwa');

INSERT INTO cities (id, state_id, name) VALUES ('556','27','Moya');

INSERT INTO cities (id, state_id, name) VALUES ('557','27','Paikoro');

INSERT INTO cities (id, state_id, name) VALUES ('558','27','Rafi');

INSERT INTO cities (id, state_id, name) VALUES ('559','27','Rijau');

INSERT INTO cities (id, state_id, name) VALUES ('560','27','Shiroro');

INSERT INTO cities (id, state_id, name) VALUES ('561','27','Suleja');

INSERT INTO cities (id, state_id, name) VALUES ('562','27','Tafa');

INSERT INTO cities (id, state_id, name) VALUES ('563','27','Wushishi');

INSERT INTO cities (id, state_id, name) VALUES ('564','28','Abeokuta North');

INSERT INTO cities (id, state_id, name) VALUES ('565','28','Abeokuta South');

INSERT INTO cities (id, state_id, name) VALUES ('566','28','Ado-Odo/Ota');

INSERT INTO cities (id, state_id, name) VALUES ('567','28','Egbado North');

INSERT INTO cities (id, state_id, name) VALUES ('568','28','Egbado South');

INSERT INTO cities (id, state_id, name) VALUES ('569','28','Ewekoro');

INSERT INTO cities (id, state_id, name) VALUES ('570','28','Ifo');

INSERT INTO cities (id, state_id, name) VALUES ('571','28','Ijebu East');

INSERT INTO cities (id, state_id, name) VALUES ('572','28','Ijebu North');

INSERT INTO cities (id, state_id, name) VALUES ('573','28','Ijebu North East');

INSERT INTO cities (id, state_id, name) VALUES ('574','28','Ijebu Ode');

INSERT INTO cities (id, state_id, name) VALUES ('575','28','Ikenne');

INSERT INTO cities (id, state_id, name) VALUES ('576','28','Imeko Afon');

INSERT INTO cities (id, state_id, name) VALUES ('577','28','Ipokia');

INSERT INTO cities (id, state_id, name) VALUES ('578','28','Obafemi Owode');

INSERT INTO cities (id, state_id, name) VALUES ('579','28','Odeda');

INSERT INTO cities (id, state_id, name) VALUES ('580','28','Odogbolu');

INSERT INTO cities (id, state_id, name) VALUES ('581','28','Ogun Waterside');

INSERT INTO cities (id, state_id, name) VALUES ('582','28','Remo North');

INSERT INTO cities (id, state_id, name) VALUES ('583','28','Shagamu');

INSERT INTO cities (id, state_id, name) VALUES ('584','29','Akoko North-East');

INSERT INTO cities (id, state_id, name) VALUES ('585','29','Akoko North-West');

INSERT INTO cities (id, state_id, name) VALUES ('586','29','Akoko South-West');

INSERT INTO cities (id, state_id, name) VALUES ('587','29','Akoko South-East');

INSERT INTO cities (id, state_id, name) VALUES ('588','29','Akure North');

INSERT INTO cities (id, state_id, name) VALUES ('589','29','Akure South');

INSERT INTO cities (id, state_id, name) VALUES ('590','29','Ese Odo');

INSERT INTO cities (id, state_id, name) VALUES ('591','29','Idanre');

INSERT INTO cities (id, state_id, name) VALUES ('592','29','Ifedore');

INSERT INTO cities (id, state_id, name) VALUES ('593','29','Ilaje');

INSERT INTO cities (id, state_id, name) VALUES ('594','29','Ile Oluji/Okeigbo');

INSERT INTO cities (id, state_id, name) VALUES ('595','29','Irele');

INSERT INTO cities (id, state_id, name) VALUES ('596','29','Odigbo');

INSERT INTO cities (id, state_id, name) VALUES ('597','29','Okitipupa');

INSERT INTO cities (id, state_id, name) VALUES ('598','29','Ondo East');

INSERT INTO cities (id, state_id, name) VALUES ('599','29','Ondo West');

INSERT INTO cities (id, state_id, name) VALUES ('600','29','Ose');

INSERT INTO cities (id, state_id, name) VALUES ('601','29','Owo');

INSERT INTO cities (id, state_id, name) VALUES ('602','30','Atakunmosa East');

INSERT INTO cities (id, state_id, name) VALUES ('603','30','Atakunmosa West');

INSERT INTO cities (id, state_id, name) VALUES ('604','30','Aiyedaade');

INSERT INTO cities (id, state_id, name) VALUES ('605','30','Aiyedire');

INSERT INTO cities (id, state_id, name) VALUES ('606','30','Boluwaduro');

INSERT INTO cities (id, state_id, name) VALUES ('607','30','Boripe');

INSERT INTO cities (id, state_id, name) VALUES ('608','30','Ede North');

INSERT INTO cities (id, state_id, name) VALUES ('609','30','Ede South');

INSERT INTO cities (id, state_id, name) VALUES ('610','30','Ife Central');

INSERT INTO cities (id, state_id, name) VALUES ('611','30','Ife East');

INSERT INTO cities (id, state_id, name) VALUES ('612','30','Ife North');

INSERT INTO cities (id, state_id, name) VALUES ('613','30','Ife South');

INSERT INTO cities (id, state_id, name) VALUES ('614','30','Egbedore');

INSERT INTO cities (id, state_id, name) VALUES ('615','30','Ejigbo');

INSERT INTO cities (id, state_id, name) VALUES ('616','30','Ifedayo');

INSERT INTO cities (id, state_id, name) VALUES ('617','30','Ifelodun');

INSERT INTO cities (id, state_id, name) VALUES ('618','30','Ila');

INSERT INTO cities (id, state_id, name) VALUES ('619','30','Ilesa East');

INSERT INTO cities (id, state_id, name) VALUES ('620','30','Ilesa West');

INSERT INTO cities (id, state_id, name) VALUES ('621','30','Irepodun');

INSERT INTO cities (id, state_id, name) VALUES ('622','30','Irewole');

INSERT INTO cities (id, state_id, name) VALUES ('623','30','Isokan');

INSERT INTO cities (id, state_id, name) VALUES ('624','30','Iwo');

INSERT INTO cities (id, state_id, name) VALUES ('625','30','Obokun');

INSERT INTO cities (id, state_id, name) VALUES ('626','30','Odo Otin');

INSERT INTO cities (id, state_id, name) VALUES ('627','30','Ola Oluwa');

INSERT INTO cities (id, state_id, name) VALUES ('628','30','Olorunda');

INSERT INTO cities (id, state_id, name) VALUES ('629','30','Oriade');

INSERT INTO cities (id, state_id, name) VALUES ('630','30','Orolu');

INSERT INTO cities (id, state_id, name) VALUES ('631','30','Osogbo');

INSERT INTO cities (id, state_id, name) VALUES ('632','31','Afijio');

INSERT INTO cities (id, state_id, name) VALUES ('633','31','Akinyele');

INSERT INTO cities (id, state_id, name) VALUES ('634','31','Atiba');

INSERT INTO cities (id, state_id, name) VALUES ('635','31','Atisbo');

INSERT INTO cities (id, state_id, name) VALUES ('636','31','Egbeda');

INSERT INTO cities (id, state_id, name) VALUES ('637','31','Ibadan North');

INSERT INTO cities (id, state_id, name) VALUES ('638','31','Ibadan North-East');

INSERT INTO cities (id, state_id, name) VALUES ('639','31','Ibadan North-West');

INSERT INTO cities (id, state_id, name) VALUES ('640','31','Ibadan South-East');

INSERT INTO cities (id, state_id, name) VALUES ('641','31','Ibadan South-West');

INSERT INTO cities (id, state_id, name) VALUES ('642','31','Ibarapa Central');

INSERT INTO cities (id, state_id, name) VALUES ('643','31','Ibarapa East');

INSERT INTO cities (id, state_id, name) VALUES ('644','31','Ibarapa North');

INSERT INTO cities (id, state_id, name) VALUES ('645','31','Ido');

INSERT INTO cities (id, state_id, name) VALUES ('646','31','Irepo');

INSERT INTO cities (id, state_id, name) VALUES ('647','31','Iseyin');

INSERT INTO cities (id, state_id, name) VALUES ('648','31','Itesiwaju');

INSERT INTO cities (id, state_id, name) VALUES ('649','31','Iwajowa');

INSERT INTO cities (id, state_id, name) VALUES ('650','31','Kajola');

INSERT INTO cities (id, state_id, name) VALUES ('651','31','Lagelu');

INSERT INTO cities (id, state_id, name) VALUES ('652','31','Ogbomosho North');

INSERT INTO cities (id, state_id, name) VALUES ('653','31','Ogbomosho South');

INSERT INTO cities (id, state_id, name) VALUES ('654','31','Ogo Oluwa');

INSERT INTO cities (id, state_id, name) VALUES ('655','31','Olorunsogo');

INSERT INTO cities (id, state_id, name) VALUES ('656','31','Oluyole');

INSERT INTO cities (id, state_id, name) VALUES ('657','31','Ona Ara');

INSERT INTO cities (id, state_id, name) VALUES ('658','31','Orelope');

INSERT INTO cities (id, state_id, name) VALUES ('659','31','Ori Ire');

INSERT INTO cities (id, state_id, name) VALUES ('660','31','Oyo');

INSERT INTO cities (id, state_id, name) VALUES ('661','31','Oyo East');

INSERT INTO cities (id, state_id, name) VALUES ('662','31','Saki East');

INSERT INTO cities (id, state_id, name) VALUES ('663','31','Saki West');

INSERT INTO cities (id, state_id, name) VALUES ('664','31','Surulere, Oyo State');

INSERT INTO cities (id, state_id, name) VALUES ('665','32','Bokkos');

INSERT INTO cities (id, state_id, name) VALUES ('666','32','Barkin Ladi');

INSERT INTO cities (id, state_id, name) VALUES ('667','32','Bassa');

INSERT INTO cities (id, state_id, name) VALUES ('668','32','Jos East');

INSERT INTO cities (id, state_id, name) VALUES ('669','32','Jos North');

INSERT INTO cities (id, state_id, name) VALUES ('670','32','Jos South');

INSERT INTO cities (id, state_id, name) VALUES ('671','32','Kanam');

INSERT INTO cities (id, state_id, name) VALUES ('672','32','Kanke');

INSERT INTO cities (id, state_id, name) VALUES ('673','32','Langtang South');

INSERT INTO cities (id, state_id, name) VALUES ('674','32','Langtang North');

INSERT INTO cities (id, state_id, name) VALUES ('675','32','Mangu');

INSERT INTO cities (id, state_id, name) VALUES ('676','32','Mikang');

INSERT INTO cities (id, state_id, name) VALUES ('677','32','Pankshin');

INSERT INTO cities (id, state_id, name) VALUES ('678','32','Qua\'an Pan');

INSERT INTO cities (id, state_id, name) VALUES ('679','32','Riyom');

INSERT INTO cities (id, state_id, name) VALUES ('680','32','Shendam');

INSERT INTO cities (id, state_id, name) VALUES ('681','32','Wase');

INSERT INTO cities (id, state_id, name) VALUES ('682','33','Abua/Odual');

INSERT INTO cities (id, state_id, name) VALUES ('683','33','Ahoada East');

INSERT INTO cities (id, state_id, name) VALUES ('684','33','Ahoada West');

INSERT INTO cities (id, state_id, name) VALUES ('685','33','Akuku-Toru');

INSERT INTO cities (id, state_id, name) VALUES ('686','33','Andoni');

INSERT INTO cities (id, state_id, name) VALUES ('687','33','Asari-Toru');

INSERT INTO cities (id, state_id, name) VALUES ('688','33','Bonny');

INSERT INTO cities (id, state_id, name) VALUES ('689','33','Degema');

INSERT INTO cities (id, state_id, name) VALUES ('690','33','Eleme');

INSERT INTO cities (id, state_id, name) VALUES ('691','33','Emuoha');

INSERT INTO cities (id, state_id, name) VALUES ('692','33','Etche');

INSERT INTO cities (id, state_id, name) VALUES ('693','33','Gokana');

INSERT INTO cities (id, state_id, name) VALUES ('694','33','Ikwerre');

INSERT INTO cities (id, state_id, name) VALUES ('695','33','Khana');

INSERT INTO cities (id, state_id, name) VALUES ('696','33','Obio/Akpor');

INSERT INTO cities (id, state_id, name) VALUES ('697','33','Ogba/Egbema/Ndoni');

INSERT INTO cities (id, state_id, name) VALUES ('698','33','Ogu/Bolo');

INSERT INTO cities (id, state_id, name) VALUES ('699','33','Okrika');

INSERT INTO cities (id, state_id, name) VALUES ('700','33','Omuma');

INSERT INTO cities (id, state_id, name) VALUES ('701','33','Opobo/Nkoro');

INSERT INTO cities (id, state_id, name) VALUES ('702','33','Oyigbo');

INSERT INTO cities (id, state_id, name) VALUES ('703','33','Port Harcourt');

INSERT INTO cities (id, state_id, name) VALUES ('704','33','Tai');

INSERT INTO cities (id, state_id, name) VALUES ('705','34','Binji');

INSERT INTO cities (id, state_id, name) VALUES ('706','34','Bodinga');

INSERT INTO cities (id, state_id, name) VALUES ('707','34','Dange Shuni');

INSERT INTO cities (id, state_id, name) VALUES ('708','34','Gada');

INSERT INTO cities (id, state_id, name) VALUES ('709','34','Goronyo');

INSERT INTO cities (id, state_id, name) VALUES ('710','34','Gudu');

INSERT INTO cities (id, state_id, name) VALUES ('711','34','Gwadabawa');

INSERT INTO cities (id, state_id, name) VALUES ('712','34','Illela');

INSERT INTO cities (id, state_id, name) VALUES ('713','34','Isa');

INSERT INTO cities (id, state_id, name) VALUES ('714','34','Kebbe');

INSERT INTO cities (id, state_id, name) VALUES ('715','34','Kware');

INSERT INTO cities (id, state_id, name) VALUES ('716','34','Rabah');

INSERT INTO cities (id, state_id, name) VALUES ('717','34','Sabon Birni');

INSERT INTO cities (id, state_id, name) VALUES ('718','34','Shagari');

INSERT INTO cities (id, state_id, name) VALUES ('719','34','Silame');

INSERT INTO cities (id, state_id, name) VALUES ('720','34','Sokoto North');

INSERT INTO cities (id, state_id, name) VALUES ('721','34','Sokoto South');

INSERT INTO cities (id, state_id, name) VALUES ('722','34','Tambuwal');

INSERT INTO cities (id, state_id, name) VALUES ('723','34','Tangaza');

INSERT INTO cities (id, state_id, name) VALUES ('724','34','Tureta');

INSERT INTO cities (id, state_id, name) VALUES ('725','34','Wamako');

INSERT INTO cities (id, state_id, name) VALUES ('726','34','Wurno');

INSERT INTO cities (id, state_id, name) VALUES ('727','34','Yabo');

INSERT INTO cities (id, state_id, name) VALUES ('728','35','Ardo Kola');

INSERT INTO cities (id, state_id, name) VALUES ('729','35','Bali');

INSERT INTO cities (id, state_id, name) VALUES ('730','35','Donga');

INSERT INTO cities (id, state_id, name) VALUES ('731','35','Gashaka');

INSERT INTO cities (id, state_id, name) VALUES ('732','35','Gassol');

INSERT INTO cities (id, state_id, name) VALUES ('733','35','Ibi');

INSERT INTO cities (id, state_id, name) VALUES ('734','35','Jalingo');

INSERT INTO cities (id, state_id, name) VALUES ('735','35','Karim Lamido');

INSERT INTO cities (id, state_id, name) VALUES ('736','35','Kumi');

INSERT INTO cities (id, state_id, name) VALUES ('737','35','Lau');

INSERT INTO cities (id, state_id, name) VALUES ('738','35','Sardauna');

INSERT INTO cities (id, state_id, name) VALUES ('739','35','Takum');

INSERT INTO cities (id, state_id, name) VALUES ('740','35','Ussa');

INSERT INTO cities (id, state_id, name) VALUES ('741','35','Wukari');

INSERT INTO cities (id, state_id, name) VALUES ('742','35','Yorro');

INSERT INTO cities (id, state_id, name) VALUES ('743','35','Zing');

INSERT INTO cities (id, state_id, name) VALUES ('744','36','Bade');

INSERT INTO cities (id, state_id, name) VALUES ('745','36','Bursari');

INSERT INTO cities (id, state_id, name) VALUES ('746','36','Damaturu');

INSERT INTO cities (id, state_id, name) VALUES ('747','36','Fika');

INSERT INTO cities (id, state_id, name) VALUES ('748','36','Fune');

INSERT INTO cities (id, state_id, name) VALUES ('749','36','Geidam');

INSERT INTO cities (id, state_id, name) VALUES ('750','36','Gujba');

INSERT INTO cities (id, state_id, name) VALUES ('751','36','Gulani');

INSERT INTO cities (id, state_id, name) VALUES ('752','36','Jakusko');

INSERT INTO cities (id, state_id, name) VALUES ('753','36','Karasuwa');

INSERT INTO cities (id, state_id, name) VALUES ('754','36','Machina');

INSERT INTO cities (id, state_id, name) VALUES ('755','36','Nangere');

INSERT INTO cities (id, state_id, name) VALUES ('756','36','Nguru');

INSERT INTO cities (id, state_id, name) VALUES ('757','36','Potiskum');

INSERT INTO cities (id, state_id, name) VALUES ('758','36','Tarmuwa');

INSERT INTO cities (id, state_id, name) VALUES ('759','36','Yunusari');

INSERT INTO cities (id, state_id, name) VALUES ('760','36','Yusufari');

INSERT INTO cities (id, state_id, name) VALUES ('761','37','Anka');

INSERT INTO cities (id, state_id, name) VALUES ('762','37','Bakura');

INSERT INTO cities (id, state_id, name) VALUES ('763','37','Birnin Magaji/Kiyaw');

INSERT INTO cities (id, state_id, name) VALUES ('764','37','Bukkuyum');

INSERT INTO cities (id, state_id, name) VALUES ('765','37','Bungudu');

INSERT INTO cities (id, state_id, name) VALUES ('766','37','Gummi');

INSERT INTO cities (id, state_id, name) VALUES ('767','37','Gusau');

INSERT INTO cities (id, state_id, name) VALUES ('768','37','Kaura Namoda');

INSERT INTO cities (id, state_id, name) VALUES ('769','37','Maradun');

INSERT INTO cities (id, state_id, name) VALUES ('770','37','Maru');

INSERT INTO cities (id, state_id, name) VALUES ('771','37','Shinkafi');

INSERT INTO cities (id, state_id, name) VALUES ('772','37','Talata Mafara');

INSERT INTO cities (id, state_id, name) VALUES ('773','37','Chafe');

INSERT INTO cities (id, state_id, name) VALUES ('774','37','Zurmi');


CREATE TABLE `currencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` double DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO currencies (id, name, sign, value, is_default, created_at, updated_at) VALUES ('1','NGN','₦','1','1','2022-01-22 09:52:01','2022-11-09 04:37:33');


CREATE TABLE `dymantic_instagram_basic_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dymantic_instagram_basic_profiles_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO dymantic_instagram_basic_profiles (id, username, created_at, updated_at) VALUES ('1','ielemson','2022-11-08 03:44:59','2022-11-08 03:44:59');


CREATE TABLE `dymantic_instagram_feed_tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(10) unsigned NOT NULL,
  `access_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `email_templates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `body` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO email_templates (id, type, subject, body, created_at, updated_at) VALUES ('1','Order','Your Have Successfully Placed The Order','<p>Hello {user_name},</p><p>Your Order Has Been Placed Successfully.</p><p>Your Order Number is {transaction_number}.</p>','2022-03-10 09:48:18','2022-03-10 05:07:04');

INSERT INTO email_templates (id, type, subject, body, created_at, updated_at) VALUES ('2','Registration','Welcome To MyCommerce','<p>Hello&nbsp; {user_name},</p><p>You have successfully registered to {website_title}, We wish you will have a wonderful experience using our service.</p><p>Thank You<br></p>','2022-03-10 09:48:24','2022-03-10 05:08:28');


CREATE TABLE `extra_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `is_t4_slider` tinyint(4) DEFAULT '1',
  `is_t4_featured_banner` tinyint(4) DEFAULT '1',
  `is_t4_specialpick` tinyint(4) DEFAULT '1',
  `is_t4_3_column_banner_first` tinyint(4) DEFAULT '1',
  `is_t4_flashdeal` tinyint(4) DEFAULT '1',
  `is_t4_3_column_banner_second` tinyint(4) DEFAULT '1',
  `is_t4_popular_category` tinyint(4) DEFAULT '1',
  `is_t4_2_column_banner` tinyint(4) DEFAULT '1',
  `is_t4_blog_section` tinyint(4) DEFAULT '1',
  `is_t4_brand_section` tinyint(4) DEFAULT '1',
  `is_t4_service_section` tinyint(4) DEFAULT '1',
  `is_t3_slider` tinyint(4) DEFAULT '1',
  `is_t3_service_section` tinyint(4) DEFAULT '1',
  `is_t3_3_column_banner_first` tinyint(4) DEFAULT '1',
  `is_t3_popular_category` tinyint(4) DEFAULT '1',
  `is_t3_flashdeal` tinyint(4) DEFAULT '1',
  `is_t3_3_column_banner_second` tinyint(4) DEFAULT '1',
  `is_t3_pecialpick` tinyint(4) DEFAULT '1',
  `is_t3_brand_section` tinyint(4) DEFAULT '1',
  `is_t3_2_column_banner` tinyint(4) DEFAULT '1',
  `is_t3_blog_section` tinyint(4) DEFAULT '1',
  `is_t2_slider` tinyint(4) DEFAULT '1',
  `is_t2_service_section` tinyint(4) DEFAULT '1',
  `is_t2_3_column_banner_first` tinyint(4) DEFAULT '1',
  `is_t2_flashdeal` tinyint(4) DEFAULT '1',
  `is_t2_new_product` tinyint(4) DEFAULT '1',
  `is_t2_3_column_banner_second` tinyint(4) DEFAULT '1',
  `is_t2_featured_product` tinyint(4) DEFAULT '1',
  `is_t2_bestseller_product` tinyint(4) DEFAULT '1',
  `is_t2_toprated_product` tinyint(4) DEFAULT '1',
  `is_t2_2_column_banner` tinyint(4) DEFAULT '1',
  `is_t2_blog_section` tinyint(4) DEFAULT '1',
  `is_t2_brand_section` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO extra_settings (id, is_t4_slider, is_t4_featured_banner, is_t4_specialpick, is_t4_3_column_banner_first, is_t4_flashdeal, is_t4_3_column_banner_second, is_t4_popular_category, is_t4_2_column_banner, is_t4_blog_section, is_t4_brand_section, is_t4_service_section, is_t3_slider, is_t3_service_section, is_t3_3_column_banner_first, is_t3_popular_category, is_t3_flashdeal, is_t3_3_column_banner_second, is_t3_pecialpick, is_t3_brand_section, is_t3_2_column_banner, is_t3_blog_section, is_t2_slider, is_t2_service_section, is_t2_3_column_banner_first, is_t2_flashdeal, is_t2_new_product, is_t2_3_column_banner_second, is_t2_featured_product, is_t2_bestseller_product, is_t2_toprated_product, is_t2_2_column_banner, is_t2_blog_section, is_t2_brand_section, created_at, updated_at) VALUES ('1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','1','1','1','0','0','0','1','1','0','0','0','2022-11-13 06:49:37','2022-11-06 21:13:20');


CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descriptions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO faqs (id, category_id, title, details, meta_keywords, meta_descriptions, created_at, updated_at) VALUES ('2','4','Where can I get some?','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.','','','2022-03-28 12:59:52','2022-03-28 13:02:28');

INSERT INTO faqs (id, category_id, title, details, meta_keywords, meta_descriptions, created_at, updated_at) VALUES ('4','4','How to offer best offers?','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','','','2022-05-24 08:36:27','2022-05-24 08:36:27');


CREATE TABLE `fcategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descriptions` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO fcategories (id, name, text, slug, meta_keywords, meta_descriptions, status, created_at, updated_at) VALUES ('4','Offer Information !','But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born','Offer-Information','','','1','2022-03-28 12:21:40','2022-03-28 12:22:47');


CREATE TABLE `galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` bigint(20) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO galleries (id, item_id, photo, created_at, updated_at) VALUES ('5','58','uploads/items/gallery/1664263042-slider.jpg','2022-11-13 06:59:37','2022-11-13 06:31:37');

INSERT INTO galleries (id, item_id, photo, created_at, updated_at) VALUES ('6','58','uploads/items/gallery/1664263054-slider.jpg','2022-11-13 07:11:37','2022-11-13 06:44:37');

INSERT INTO galleries (id, item_id, photo, created_at, updated_at) VALUES ('7','58','uploads/items/gallery/1664263064-slider.jpg','2022-11-13 06:26:37','2022-11-13 06:24:37');

INSERT INTO galleries (id, item_id, photo, created_at, updated_at) VALUES ('8','60','uploads/items/gallery/1664845090-slider.jpg','2022-11-13 06:34:37','2022-11-13 06:59:37');

INSERT INTO galleries (id, item_id, photo, created_at, updated_at) VALUES ('9','60','uploads/items/gallery/1664845102-slider.jpg','2022-11-13 07:07:37','2022-11-13 06:24:37');


CREATE TABLE `home_customizes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `banner_first` text COLLATE utf8mb4_unicode_ci,
  `banner_secend` text COLLATE utf8mb4_unicode_ci,
  `banner_third` text COLLATE utf8mb4_unicode_ci,
  `popular_category` text COLLATE utf8mb4_unicode_ci,
  `two_column_category` text COLLATE utf8mb4_unicode_ci,
  `feature_category` text COLLATE utf8mb4_unicode_ci,
  `home_page4` text COLLATE utf8mb4_unicode_ci,
  `home_4_popular_category` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO home_customizes (id, banner_first, banner_secend, banner_third, popular_category, two_column_category, feature_category, home_page4, home_4_popular_category, created_at, updated_at) VALUES ('1','{"firsturl1":"#","firsturl2":"#","firsturl3":"#","img1":"uploads\/banners\/1663999551-slider.png","img2":"uploads\/banners\/1663999551-slider.png","img3":"uploads\/banners\/1663999551-slider.png"}','{"url1":"#","url2":"#","url3":"#","img1":"uploads\/banners\/1663999632-slider.png","img2":"uploads\/banners\/1663999632-slider.png","img3":"uploads\/banners\/1663999632-slider.png"}','{"url1":"#","url2":"#","img1":"uploads\/banners\/0.99235300 1646412313-1634141357b1.jpg","img2":"uploads\/banners\/0.99565500 1646412313-1634141357b2.jpg"}','{"popular_title":"Popular Categories","category_id1":"19","subcategory_id1":"38","childcategory_id1":null,"category_id2":"16","subcategory_id2":null,"childcategory_id2":null,"category_id3":"23","subcategory_id3":null,"childcategory_id3":null,"category_id4":"22","subcategory_id4":null,"childcategory_id4":null}','{"category_id1":"5","subcategory_id1":null,"childcategory_id1":null,"category_id2":"22","subcategory_id2":null,"childcategory_id2":null}','{"feature_title":"Featured Categories","category_id1":"19","subcategory_id1":null,"childcategory_id1":null,"category_id2":"5","subcategory_id2":null,"childcategory_id2":null,"category_id3":"23","subcategory_id3":null,"childcategory_id3":null,"category_id4":"22","subcategory_id4":null,"childcategory_id4":null}','{"label1":"FORMAL","url1":"#","label2":"LIMITEN EDITION","url2":"#","label3":"WOMEN\'S COLLECTION","url3":"#","label4":"SMART CASUALS","url4":"#","label5":"POLO","url5":"#","img1":"uploads\/banners\/0.65720400 1646413315-16342181791.jpg","img2":"uploads\/banners\/0.66024000 1646413315-16342181792.jpg","img3":"uploads\/banners\/0.66390400 1646413315-16342181793.jpeg","img4":"uploads\/banners\/0.66614300 1646413315-16342181794.jpg","img5":"uploads\/banners\/0.66841100 1646413315-16342181795.jpg"}','["5","19"]','2022-11-13 06:35:37','2022-09-24 06:07:12');


CREATE TABLE `items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) DEFAULT '0',
  `subcategory_id` bigint(20) DEFAULT '0',
  `childcategory_id` bigint(20) DEFAULT '0',
  `tax_id` bigint(20) DEFAULT '3',
  `brand_id` bigint(20) DEFAULT '0',
  `name` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `video` text COLLATE utf8mb4_unicode_ci,
  `short_details` text COLLATE utf8mb4_unicode_ci,
  `specification_name` text COLLATE utf8mb4_unicode_ci,
  `specification_description` text COLLATE utf8mb4_unicode_ci,
  `is_specification` tinyint(4) DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `discount_price` double DEFAULT '0',
  `previous_price` double DEFAULT '0',
  `stock` int(11) DEFAULT '0',
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `is_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'new',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'normal',
  `file` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci,
  `file_type` enum('file','link') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_name` text COLLATE utf8mb4_unicode_ci,
  `license_key` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO items (id, category_id, subcategory_id, childcategory_id, tax_id, brand_id, name, slug, sku, tags, video, short_details, specification_name, specification_description, is_specification, details, photo, discount_price, previous_price, stock, meta_keywords, meta_description, status, is_type, date, item_type, file, link, file_type, license_name, license_key, thumbnail, created_at, updated_at) VALUES ('58','5','3','3','3','0','Beautykink Color Shades','beautykink-color-shades','xHUXyQbjAE','','','Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque itaque animi, ad explicabo hic iure excepturi earum dicta laudantium aspernatur laboriosam quaerat sapiente exercitationem ratione nisi porro tempora quam? Et!','[null]','[null]','1','<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque itaque animi, ad explicabo hic iure excepturi earum dicta laudantium aspernatur laboriosam quaerat sapiente exercitationem ratione nisi porro tempora quam? Et!<br></p>','uploads/items/1664000561-all swatch1-1000x800.jpg','1200','0','10','','','1','feature','','normal','','','file','','','uploads/items/thumbnails/1664000560.jpg','2022-09-24 06:22:41','2022-10-13 15:53:04');

INSERT INTO items (id, category_id, subcategory_id, childcategory_id, tax_id, brand_id, name, slug, sku, tags, video, short_details, specification_name, specification_description, is_specification, details, photo, discount_price, previous_price, stock, meta_keywords, meta_description, status, is_type, date, item_type, file, link, file_type, license_name, license_key, thumbnail, created_at, updated_at) VALUES ('59','5','3','3','3','0','Make-up','make-up','Yif2lRKLci','','','Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur, nostrum inventore iusto, voluptatem corporis nulla ipsa ad cupiditate rem debitis quibusdam ea veritatis est praesentium temporibus soluta mollitia quas. Explicabo!','','','0','<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur, nostrum inventore iusto, voluptatem corporis nulla ipsa ad cupiditate rem debitis quibusdam ea veritatis est praesentium temporibus soluta mollitia quas. Explicabo!<br></p>','uploads/items/1664006289-makeup.jpg','20000','0','10','','','1','new','','normal','','','file','','','uploads/items/thumbnails/1664006288.jpg','2022-09-24 07:58:09','2022-10-13 13:20:04');

INSERT INTO items (id, category_id, subcategory_id, childcategory_id, tax_id, brand_id, name, slug, sku, tags, video, short_details, specification_name, specification_description, is_specification, details, photo, discount_price, previous_price, stock, meta_keywords, meta_description, status, is_type, date, item_type, file, link, file_type, license_name, license_key, thumbnail, created_at, updated_at) VALUES ('60','5','3','3','3','0','Hairliner','hairliner','ghLr4jj86i','mytag','https://www.youtube.com/watch?v=gMEeT-flDvM','','','','0','<p>Obviously this isn\'t ideal, but when I move it to my controller it only outputs what I think is the first row it gets over and over. That is, when I call {{ $priorityicon }} it\'s just the same result for every row.<br></p>','uploads/items/1664845049-OMOSALEWA  BEAUTYKINK.jpg','20000','0','10','','','1','flash_deal','12/16/2022','normal','','','file','','','uploads/items/thumbnails/1664845048.jpg','2022-10-04 00:57:29','2022-10-25 06:38:08');

INSERT INTO items (id, category_id, subcategory_id, childcategory_id, tax_id, brand_id, name, slug, sku, tags, video, short_details, specification_name, specification_description, is_specification, details, photo, discount_price, previous_price, stock, meta_keywords, meta_description, status, is_type, date, item_type, file, link, file_type, license_name, license_key, thumbnail, created_at, updated_at) VALUES ('61','5','2','2','3','0','Glow Getta','glow-getta','NSGMk4OLH6','glow,getta','','','','','0','<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio voluptatibus doloremque quidem, voluptate consequuntur maiores harum adipisci et, incidunt, fugiat magnam eos placeat dolores animi ut exercitationem dolore nisi suscipit.<br></p>','uploads/items/1665675514-new-glowgetta.jpg','3000','4000','0','glow getta','','1','top','','normal','','','file','','','uploads/items/thumbnails/1665675514.jpg','2022-10-13 15:38:34','2022-11-06 20:58:50');


CREATE TABLE `languages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT '0',
  `rtl` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO languages (id, language, file, name, is_default, rtl, created_at, updated_at) VALUES ('1','English','1648457103XXPzmqXc.json','1648457103cZeVcLFv','1','0','2022-03-25 08:56:11','2022-05-27 06:29:24');

INSERT INTO languages (id, language, file, name, is_default, rtl, created_at, updated_at) VALUES ('2','Arabic','1648457089QtUcz12L.json','16484570894XvyHzr3','0','1','2022-03-25 08:56:11','2022-05-27 06:29:23');


CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO migrations (id, migration, batch) VALUES ('1','2014_10_12_000000_create_users_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('2','2014_10_12_100000_create_password_resets_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('3','2019_08_19_000000_create_failed_jobs_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('4','2019_12_14_000001_create_personal_access_tokens_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('5','2022_01_20_074556_create_admins_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('6','2022_01_20_075003_create_items_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('7','2022_01_20_080630_create_settings_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('8','2022_01_20_081128_create_attributes_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('9','2022_01_20_081300_create_attribute_options_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('10','2022_01_20_081422_create_banners_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('11','2022_01_20_082655_create_bcategories_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('12','2022_01_20_082736_create_brands_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('13','2022_01_20_082927_create_campaign_items_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('14','2022_01_20_083207_create_categories_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('15','2022_01_20_083312_create_child_categories_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('16','2022_01_20_083403_create_countries_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('17','2022_01_20_083434_create_currencies_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('18','2022_01_20_083520_create_email_templates_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('19','2022_01_20_083551_create_faqs_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('20','2022_01_20_083656_create_fcategories_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('21','2022_01_20_083752_create_galleries_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('22','2022_01_20_083850_create_home_customizes_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('23','2022_01_20_083930_create_languages_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('24','2022_01_20_084019_create_messages_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('25','2022_01_20_084110_create_notifications_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('26','2022_01_20_084145_create_orders_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('27','2022_01_20_084238_create_pages_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('28','2022_01_20_084320_create_payment_settings_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('29','2022_01_20_084350_create_posts_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('30','2022_01_20_084509_create_promo_codes_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('31','2022_01_20_084549_create_reviews_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('32','2022_01_20_084617_create_roles_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('33','2022_01_20_084648_create_services_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('34','2022_01_20_084719_create_shipping_services_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('35','2022_01_20_084750_create_sliders_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('36','2022_01_20_084828_create_socials_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('37','2022_01_20_084900_create_subcategories_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('38','2022_01_20_084941_create_subscribers_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('39','2022_01_20_085002_create_taxes_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('40','2022_01_20_085030_create_tickets_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('41','2022_01_20_085112_create_track_orders_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('42','2022_01_20_085141_create_transactions_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('43','2022_01_20_085220_create_wishlists_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('44','2022_01_20_085601_create_extra_settings_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('45','2022_01_20_085707_create_sitemaps_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('47','2022_05_17_071147_create_social_providers_table','2');

INSERT INTO migrations (id, migration, batch) VALUES ('48','2022_10_18_175904_create_shoppingcart_table','3');

INSERT INTO migrations (id, migration, batch) VALUES ('49','2022_10_23_043510_create_visits_table','4');

INSERT INTO migrations (id, migration, batch) VALUES ('50','2022_10_24_032844_create_restock_reminders_table','4');

INSERT INTO migrations (id, migration, batch) VALUES ('51','2022_10_29_141825_create_testimonials_table','5');

INSERT INTO migrations (id, migration, batch) VALUES ('52','2022_11_08_032301_create_instagram_basic_profile_table','6');

INSERT INTO migrations (id, migration, batch) VALUES ('53','2022_11_08_032448_create_instagram_feed_token_table','7');


CREATE TABLE `notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO notifications (id, order_id, user_id, is_read, created_at, updated_at) VALUES ('7','5','0','0','2022-10-29 13:26:40','2022-10-29 13:26:40');

INSERT INTO notifications (id, order_id, user_id, is_read, created_at, updated_at) VALUES ('8','6','0','0','2022-10-29 13:28:40','2022-10-29 13:28:40');

INSERT INTO notifications (id, order_id, user_id, is_read, created_at, updated_at) VALUES ('17','5','0','0','2022-11-03 02:31:23','2022-11-03 02:31:23');


CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci,
  `currency_sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` text COLLATE utf8mb4_unicode_ci,
  `shipping` text COLLATE utf8mb4_unicode_ci,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txnid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` double NOT NULL DEFAULT '0',
  `charge_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_info` text COLLATE utf8mb4_unicode_ci,
  `billing_info` text COLLATE utf8mb4_unicode_ci,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO orders (id, user_id, cart, currency_sign, currency_value, discount, shipping, payment_method, txnid, tax, charge_id, transaction_number, order_status, shipping_info, billing_info, payment_status, created_at, updated_at) VALUES ('5','9','[{"id":60,"name":"Hairliner","price":20000,"main_price":20000,"attribute_price":0,"attribute_name":"","attribute_color":"","qty":"1","photo":"uploads\/items\/1664845049-OMOSALEWA  BEAUTYKINK.jpg","slug":"hairliner"},{"id":59,"name":"Make-up","price":20000,"main_price":20000,"attribute_price":0,"attribute_name":"","attribute_color":"","qty":"1","photo":"uploads\/items\/1664006289-makeup.jpg","slug":"make-up"},{"id":58,"name":"Beautykink Color Shades","price":1200,"main_price":1200,"attribute_price":0,"attribute_name":"","attribute_color":"","qty":"1","photo":"uploads\/items\/1664000561-all swatch1-1000x800.jpg","slug":"beautykink-color-shades"}]','₦','1','{"discount":20600,"code":{"id":3,"title":"Black Friday","code_name":"blackfriday","no_of_times":1,"discount":50,"status":1,"type":"percentage","created_at":"2022-10-23T15:43:16.000000Z","updated_at":"2022-11-03T02:29:57.000000Z"}}','{"id":1,"title":"Lagos-Ikorodu","price":6500,"status":1,"created_at":"2022-11-02T18:41:54.000000Z","updated_at":"2022-11-03T02:06:44.000000Z","state_id":25,"city_id":517}','Bank Transfer','','0','','goUzidXDxt','Pending','{"_token":"ISha507RmRX0XBqg6g3yVPVXm6pMga12tSAATy70","ship_first_name":"Esther","ship_last_name":"Ogechi","ship_email":"ielemson@gmail.com","ship_phone":"+1 (467) 799-6513","ship_address1":"chnager way Abuja","ship_address2":null,"ship_zip":"38127","ship_state":"25","shipping_service":"1"}','{"_token":"ISha507RmRX0XBqg6g3yVPVXm6pMga12tSAATy70","bill_first_name":"Leonard","bill_last_name":"Benson","bill_email":"elemson014@yahoo.com","bill_phone":"+1 (467) 799-6513","bill_address1":"2702 Scarlet Sunset","bill_address2":null,"bill_zip":"77478","bill_country":"25","shipping_service":"1"}','Unpaid','2022-11-03 02:31:23','2022-11-03 02:31:23');


CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descriptions` text COLLATE utf8mb4_unicode_ci,
  `pos` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO pages (id, title, slug, details, meta_keywords, meta_descriptions, pos, created_at, updated_at) VALUES ('2','How It Works','How-It-Works','<p style="text-align: justify;"><span style="color: rgb(0, 0, 0); font-size: 1rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!</span><br></p>','[{"value":"how"},{"value":"it"},{"value":"works"}]','','1','2022-03-30 14:14:06','2022-10-19 19:27:51');

INSERT INTO pages (id, title, slug, details, meta_keywords, meta_descriptions, pos, created_at, updated_at) VALUES ('3','Return Policy','Return-Policy','<div style="text-align: justify;"><span style="color: rgb(80, 80, 80); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!</span></div>','[{"value":"return"},{"value":"policy"}]','','1','2022-03-30 14:20:44','2022-10-19 19:29:01');

INSERT INTO pages (id, title, slug, details, meta_keywords, meta_descriptions, pos, created_at, updated_at) VALUES ('4','Terms And Services','terms-and-services','<p style="text-align: justify; "><span style="color: rgb(80, 80, 80); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!</span><br></p>','[{"value":"how"},{"value":"it"},{"value":"works"}]','how it works','1','2022-04-15 00:41:59','2022-10-19 19:28:49');

INSERT INTO pages (id, title, slug, details, meta_keywords, meta_descriptions, pos, created_at, updated_at) VALUES ('5','Privacy Policy','privacy-policy','<p style="text-align: justify; "><span style="color: rgb(80, 80, 80); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!</span><br></p>','','','1','2022-05-27 03:29:17','2022-10-19 19:28:02');

INSERT INTO pages (id, title, slug, details, meta_keywords, meta_descriptions, pos, created_at, updated_at) VALUES ('6','About Us','about-us','<p style="text-align: justify; ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!<br></p>','','','1','2022-05-27 03:29:45','2022-11-03 03:06:20');

INSERT INTO pages (id, title, slug, details, meta_keywords, meta_descriptions, pos, created_at, updated_at) VALUES ('7','announcement','announcement','<h3 style="line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 22px; letter-spacing: 1px; text-align: -webkit-center; font-family: arial !important;"><span style="font-weight: 700;">Where We Deliver</span></h3><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;">BeautyKink delivers throughout the 36 states in Nigeria. Based on your location within the country there will be a delivery charge incurred.</p><hr size="2" width="100%" style="margin-top: 20px; margin-bottom: 20px; border-top-color: rgb(238, 238, 238); color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;"><h3 style="line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 22px; letter-spacing: 1px; text-align: -webkit-center; font-family: arial !important;"><span style="font-weight: 700;">Delivery Methods</span></h3><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;">Please view the table below to see rates applicable to your area</p><table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0" width="711" style="border-spacing: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; width: 533.55pt; margin-left: -40.6pt; border: none;"><thead><tr><td valign="bottom" style="padding: 6pt; border-top: none; border-left: 1pt solid rgb(221, 221, 221); border-bottom: 1.5pt solid rgb(221, 221, 221); border-right: 1pt solid rgb(221, 221, 221); background: rgb(245, 193, 187);"><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 13.5pt; margin-left: 0px; line-height: normal;"><span style="font-weight: 700;"><span style="font-size: 10pt; font-family: Arial, sans-serif;">LOCATION<o:p></o:p></span></span></p></td><td valign="bottom" style="padding: 6pt; border-top: none; border-left: none; border-bottom: 1.5pt solid rgb(221, 221, 221); border-right: 1pt solid rgb(221, 221, 221); background: rgb(245, 193, 187);"><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 13.5pt; margin-left: 0px; line-height: normal;"><span style="font-weight: 700;"><span style="font-size: 10pt; font-family: Arial, sans-serif;">RATE<o:p></o:p></span></span></p></td><td width="0" style="padding: 0px; border: none;"><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px;">&nbsp;</p></td></tr></thead><tbody><tr style="height: 18.25pt;"><td rowspan="3" style="padding: 6pt; border-right: 1pt solid rgb(221, 221, 221); border-bottom: 1pt solid rgb(221, 221, 221); border-left: 1pt solid rgb(221, 221, 221); border-image: initial; border-top: none; height: 18.25pt;"><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 6.75pt; margin-left: 0px; line-height: normal;"><span style="font-size: 10pt; font-family: Arial, sans-serif;">TIER 1<o:p></o:p></span></p><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 6.75pt; margin-left: 0px; line-height: normal;"><span style="font-size: 10pt; font-family: Arial, sans-serif;">LAGOS<o:p></o:p></span></p></td><td rowspan="3" style="padding: 6pt; border-top: none; border-left: none; border-bottom: 1pt solid rgb(221, 221, 221); border-right: 1pt solid rgb(221, 221, 221); height: 18.25pt;"><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 0.0001pt; margin-left: 0px; line-height: normal;"><span style="font-size: 10pt; font-family: Arial, sans-serif;">1000<o:p></o:p></span></p></td><td width="0" height="24" style="padding: 0px; height: 18.25pt; border: none;"></td></tr><tr style="height: 11.5pt;"><td width="0" height="15" style="padding: 0px; height: 11.5pt; border: none;"></td></tr><tr style="height: 11.5pt;"><td width="0" height="15" style="padding: 0px; height: 11.5pt; border: none;"></td></tr><tr><td style="padding: 6pt; border-right: 1pt solid rgb(221, 221, 221); border-bottom: 1pt solid rgb(221, 221, 221); border-left: 1pt solid rgb(221, 221, 221); border-image: initial; border-top: none;"><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 6.75pt; margin-left: 0px; line-height: normal;"><span style="font-size: 10pt; font-family: Arial, sans-serif;">TIER 2<o:p></o:p></span></p><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 6.75pt; margin-left: 0px; line-height: normal;"><span style="font-size: 10pt; font-family: Arial, sans-serif;">WEST<o:p></o:p></span></p><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 6.75pt; margin-left: 0px; line-height: normal;"><span style="font-size: 10pt; font-family: Arial, sans-serif;">&nbsp;<o:p></o:p></span></p></td><td style="padding: 6pt; border-top: none; border-left: none; border-bottom: 1pt solid rgb(221, 221, 221); border-right: 1pt solid rgb(221, 221, 221);"><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 0.0001pt; margin-left: 0px; line-height: normal;"><span style="font-size: 10pt; font-family: Arial, sans-serif;">2000<o:p></o:p></span></p></td><td width="0" style="padding: 0px; border: none;"><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px;">&nbsp;</p></td></tr><tr><td style="padding: 6pt; border-right: 1pt solid rgb(221, 221, 221); border-bottom: 1pt solid rgb(221, 221, 221); border-left: 1pt solid rgb(221, 221, 221); border-image: initial; border-top: none;"><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 6.75pt; margin-left: 0px; line-height: normal;"><span style="font-size: 10pt; font-family: Arial, sans-serif;">TIER 3<o:p></o:p></span></p><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 6.75pt; margin-left: 0px; line-height: normal;"><span style="font-size: 10pt; font-family: Arial, sans-serif;">NORTH/SOUTH</span></p><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 6.75pt; margin-left: 0px; line-height: normal;"><span style="font-size: 10pt; font-family: Arial, sans-serif;"><br></span></p><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 6.75pt; margin-left: 0px; line-height: normal;"><span style="font-size: 10pt; font-family: Arial, sans-serif;">TIER 4<o:p></o:p></span></p><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 6.75pt; margin-left: 0px; line-height: normal;"><span style="font-size: 10pt; font-family: Arial, sans-serif;">CENTRAL /ABUJA</span></p><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 6.75pt; margin-left: 0px; line-height: normal;"><span style="font-size: 10pt; font-family: Arial, sans-serif;"><o:p></o:p></span></p></td><td style="padding: 6pt; border-top: none; border-left: none; border-bottom: 1pt solid rgb(221, 221, 221); border-right: 1pt solid rgb(221, 221, 221);"><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 0.0001pt; margin-left: 0px; line-height: normal;"><font face="Arial, sans-serif"><span style="font-size: 13.3333px;">2800</span></font></p><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 0.0001pt; margin-left: 0px; line-height: normal;"><font face="Arial, sans-serif"><span style="font-size: 13.3333px;"><br></span></font></p><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 0.0001pt; margin-left: 0px; line-height: normal;"><font face="Arial, sans-serif"><span style="font-size: 13.3333px;"><br></span></font></p><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 0.0001pt; margin-left: 0px; line-height: normal;"><font face="Arial, sans-serif"><span style="font-size: 13.3333px;"><br></span></font></p><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 0.0001pt; margin-left: 0px; line-height: normal;"><font face="Arial, sans-serif"><span style="font-size: 13.3333px;">2000/2500</span></font></p></td><td width="0" style="padding: 0px; border: none;"><p class="MsoNormal" style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px;">&nbsp;</p></td></tr></tbody></table><p><span style="color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;">OUTSKIRTS AREAS ATTRACT ADDITIONAL CHARGES</span></p><hr size="2" width="100%" style="margin-top: 20px; margin-bottom: 20px; border-top-color: rgb(238, 238, 238); color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;"><hr size="2" width="100%" style="margin-top: 20px; margin-bottom: 20px; border-top-color: rgb(238, 238, 238); color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;"><h3 style="line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 22px; letter-spacing: 1px; text-align: -webkit-center; font-family: arial !important;"><span style="font-weight: 700;">Free Delivery</span></h3><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;">We offer free delivery for our customers nationwide.</p><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;">TIER 1:&nbsp; Free Delivery on Orders over N20,000</p><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;">OTHER TIERS:&nbsp; Free Delivery on Orders over N35,000</p><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;"><span style="font-weight: 700;"><br></span></p><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;"><span style="font-weight: 700;">Our Shipping Partners are:</span></p><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;"><span style="font-weight: 700;"><br></span></p><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;"><img src="http://www.africa-ontherise.com/wp-content/uploads/2014/08/DHL_Express.jpg" style="border: 0px; width: 200px;">&nbsp;<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJcAAABKCAMAAACB4Ta6AAAAt1BMVEX///9NFIz/ZgD/WQA/AIXQx97/0MA/C5DLUknh2+r/1MI6AIPOxN3/XAD/5Nr/YQC1qstGAIn/9PD/nHv/+vb/cTBKDItVKZD/ayXz8Pb/YROQfLP9+/5fOZb/1cf/6eD/SwDDudX/xK//ooD/tJf14d8hAHkwAInJQzlRIY5mR5qvosicjbuXhbijlL/a0uV5XKWKdLD/hk//eD9+Zaj/jmH/rI7/vKb/lXJuT57/i2jo5e7ty8r+LQxtAAADl0lEQVRoge2YfVPiMBDGg6S900DbVKgUitjCqYgUEEE97vt/rivNbmhDoVQZZ+4mzx+Qprvjj7w82UiIlpaWlpaWlpaWltZ/Lf9yX6fkBRD7y1LlnoWrwagiNj4l7/I+DX54bCq6M8/CZdCaIq9/EhdLg3/8vFBUv9VcmquAywPxL3Kded2Pb0Djp89wdVD2eceLhb7UJ7i6LRfVOi9Xo1qeynUWmH+Jy1Be+I3J8zR2ZmqvM3Eawfdx0dhogNLuj+R84pwnH8+BDL6ci1OLLchG4boqEKa1TOgwT197cj9ShkpG5Yl50s84CyF2yjj2cUPZj3XUXdTB5gvkLfHVuvp4ZUQuOc91sDgNfc2EehBR5KuuDc3me5q3guf68HSsAq6xXxODxSmjosWcJLK3/wsO+L3VxPZ2gNbw1FxVwCrimouxoK+hMemLNvMJTNx2XhH3EBe5rePDG3mDtv1SDnOUq8Z3Y0SIgOQLcgMstGfM4jE/ykUiBLPXMIl2u1q9KLk4Ch4X4n0ghok1YLhoahw+UkouGyXqwpEEw6+KZSxy8XkPBLM4mRlbzT52OzPtFmlgX5LLvka9W2nAEMFgcVnVsPZ9dQZ/kUNZncOq3WNe38tx7fvqqpnBql787J1DTtG2Q3kfmPfMS7jI0t5hRVWx9rkm/AgX72FeXMrVastJHFXGKuDCgykv4JqSfNgRLneJXHYFnz/IFYoOGjo5iV5P1ozTsvFqvWTm8e3rXLDTmBI3BufHovFGWfctKQjIr/vcAhtE0aAyFxFcaAgkSEXAPvir6A0Vn7hoo7pi66k+kdmQ6+GttS6b2n0uNDDx74Cwlhb9FEHoNMhkHbx3qL56YUsDM9fR+29zVLJF97mgsvJovAk2MRV3pDkaVnJKLXp96SUl55DdfofptDto+EsyGgxWpOQUL6ijY3TWpBYD02Ab6bfbE2vntQfO7TucPpfg8rc7O66XrkVKjvGi+n6uWmtaGcYs23Wk/iIDWU5sJw/91V5KLstaf2K8thVg9vTxoLRYZHDpgh/kcru5peZ2AAwKMHMYWe6wbH017kXxfJ+7D01qkozTGzw6Y8qRdLoReQ+PdUV3URtb4FqDJnZcp8+ja9Mclh0BfiguG2H+NuvHT0n5l9T8fO5k7h0Lvr14sH4o8/6Yqq6wIa3Bku/E2ndvzVL/OqhgYzhOONsoP8OYPE9mQXGKlpaWlpaWlpaWlta36S8pL1ZBlXfsMwAAAABJRU5ErkJggg==" style="border: 0px;"></p><hr size="2" width="100%" style="margin-top: 20px; margin-bottom: 20px; border-top-color: rgb(238, 238, 238); color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;"><h3 style="line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 22px; letter-spacing: 1px; text-align: -webkit-center; font-family: arial !important;"><span style="font-weight: 700;">Estimated Delivery Time</span></h3><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;">Items bought are delivered within 1-3 working days within Lagos and up to 2-5 working days outside Lagos. *excluding public holidays and weekends* (These are estimates as delivery could be earlier. If delivery will be later than the stated time, you will be notified before confirming the order).</p><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;">With every order, you will receive an email containing the details of the order placed by you, verifying your mode of payment and delivery address. Once we ship the item(s), you will receive another email confirming the shipping details, and shipping tracking number.</p><hr size="2" width="100%" style="margin-top: 20px; margin-bottom: 20px; border-top-color: rgb(238, 238, 238); color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;"><h3 style="line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 22px; letter-spacing: 1px; text-align: -webkit-center; font-family: arial !important;"><span style="font-weight: 700;">Payment Methods</span></h3><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;"><img alt="" src="http://beautykink.com/image/data/BT.jpg" style="border: 0px; width: 200px;">​<img alt="" src="http://beautykink.com/image/data/payment-gateways-cashenvoy.jpg" style="border: 0px; width: 450px;"></p><hr size="2" width="100%" style="margin-top: 20px; margin-bottom: 20px; border-top-color: rgb(238, 238, 238); color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;"><h3 style="line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 22px; letter-spacing: 1px; text-align: -webkit-center; font-family: arial !important;"><span style="font-weight: 700;">Online Payment (Debit Card)</span></h3><h3 style="line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 22px; letter-spacing: 1px; text-align: -webkit-center; font-family: arial !important;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJcAAABBCAMAAADrJsZ5AAAAllBMVEX////8vRj8ugDc3d/8vABhZXL8vBHp6uzNz9Lv8PFMUmIAAB3j5Obz9PX8uAD//fZ9gIr/9+MACytvdH8WITf+6bj9yEj+7MTT1di9v8QAACAAES6qrbMOGzMAACRGTV6anqQjLED+8dP+1nv9wy7+5q/90Gf+242Hi5MwOEqSlZ1UWmcAABf9zV/9y1X+35s6QlIAACnL3LaZAAAEaklEQVRoge2X22KiMBCGQ4AISoIcBFKCglAVbZG+/8vtJPGArbu92V16wX9RQhrh45/JDCA0adKkSZMmTZo0aXwFq3393r3vt2ODDBWcE4sxZmGG2X5smJuCmjCGd6sgCM4WsYKxebT8GmNsnH19lhD8MyK5MjCx9hcq5Dc/xK8aE5zcHVphkoxIc5WfYIPt/PtEQ9jraDRBeh002MDnwX/AvWYMIq3kUgt8wLKG9rwyY8ysrzFTjnXYILt0e8vz1DJGrV6+QSzIqT0zDAI1wmr2gcaCLTBYZjoXIeRF/xTIFJzK49bCNQoACxtJItHwLkArRkgz2AKoj5ZKB4pM+/FCnKuDe/grWIK7s9KTozPGQQ1RfAcOf9VBrSA7ODUeStec3h/oE5co1WE2/xtYHuflwRVq3OGuAbtW+j9pQwCKNI8VdT77jss9Pb+To+zkjloqjTA55+pqPJN/qZjpZdyVc1QI4FIuBJgYkF2dusx2b0g9VIyvXHSpWSB2y7bd9AfE22qzka56dt9G8hbeESZtc/0CYMeXBUAcFj2ibR6GeQ6/F28f8qJLmERZG4ZhATY5nnAipP1Cr1ihGHXdWQzLDUAMVj9yuQ9c7kYNZ9IjcUQUeMw5lYesAmecAu6YRaVtIq8ogKGqCniEPp4jbx23fRyvS8TDApymRXxCZhhXpzZeA085Q/SSsbJBSzBIemUc62QsH8HmPFOiT7jK+xjubaoQ2ZJQ7YRT3CNzXcUtyvIclnqAbFYwSfsYriLykKOoiD1EYSVFrhDCud41VYYpEdZAogUWMfAQbH7Zj7NvuLJL8rUuMj+UxyLPzTKvqtArc2kjFYcDt+MYglvkGdpIwiqOzMwsiw/zMXvQOyaESMesTvelAE6HdfVPcRxy8T5SgufP9AZ1IVynvLTzo13AkiwM1+E6roDLLYrDLMwFmoVVsVgs1vniM9eWJUljkW41rPcGW925HvP+91yRZ0p5d+tOcVvlYFZbhZA/4I9DPeUXWhb9sqhclWNCDAN4UwJB2+Fhcdhj3QmectFeDZ35Zy6vv627cvGwgkQyIZQ5he0otwGwSi6ZdnI/IDuu4EFm5f0md3t8aEl4WEyhiuHdb7iQrbbySfmlC72riaKjgjzcuWihNmMbx3JiE1dHYedVoa0EJ+UjfMSVfYrfnrQMK1Utybq/QsjqcXuj2Ay4JAxtl1xsuBpWpZAbO7J5Cds1mgu+rLI7F1q+vEHeHBcLuSorwpe3jb1uld8va91snTb8WIfzr36h/R7pbn0rqD5k2G1PDhKS6jEXUJXVEEp0pmdU3TGFPtLrb6jOm2sflcuoqvzAI65XdQT/ml2grSr3KXTH7hrLRLYj/9ni/yg/UQQSzKo1GRRXwxr9g2inYeB1Gup+ck7TnSy2OP3mZ/9c54sz8AkJ8cOM6aY5ul/prYhuE0auXWn0/ELB4KMjTRiWnQmPH0Z4VR2eBedd0nT7H/C57Y9vzXP9AG8mTZo0adKkSZMmjaVfFm9XY8fspmgAAAAASUVORK5CYII=" style="border: 0px;"><span style="font-weight: 700;"><br></span></h3><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;">We accept all cards such as VISA, Verve and MasterCard - (ALL Nigerian bank-issued cards) Customers will need to key in their 16-digit Debit Card number and the 3 digit CVV Code (Card Verification Value - found on the back of the card) and their card pin to complete the payment flow.</p><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;">All Debit card details remain confidential and private. Beautykink.com and our trusted payment gateway Rave by Flutterwave&nbsp; use SSL encryption technology to protect your card information.</p><hr size="2" width="100%" style="margin-top: 20px; margin-bottom: 20px; border-top-color: rgb(238, 238, 238); color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;"><h3 style="line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 22px; letter-spacing: 1px; text-align: -webkit-center; font-family: arial !important;"><span style="font-weight: 700;">Bank Transfer</span></h3><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;">If you opt for a bank transfer payment, a mail containing your order and payment details will be sent to you.</p><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;"><span style="font-weight: 700;">UBA</span></p><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;"><span style="font-weight: 700;">ACCT NAME: BK BEAUTY COMPANY</span></p><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;"><span style="font-weight: 700;">ACCT NO: 2084216096</span></p><p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(65, 65, 65); font-family: Poppins, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px; text-align: -webkit-center;">Please email teller number or reference number for online transfer,&nbsp;<span style="font-weight: 700;">order ID&nbsp;</span>and name of depositor to contact@beautykink.com after making a payment. Please note that your order will only be processed AFTER we receive confirmation of payment from the applicable bank.</p>','[{"value":"announcement"}]','announcement','0','2022-10-13 03:20:44','2022-10-29 15:46:25');

INSERT INTO pages (id, title, slug, details, meta_keywords, meta_descriptions, pos, created_at, updated_at) VALUES ('8','about page title','about-page-title','<p>Shipping fee -&gt; tied to a location</p><p>Bank Transfer ID =&gt; removedShipping fee -&gt; tied to a location</p><p>Bank Transfer ID =&gt; removedShipping fee -&gt; tied to a location</p><p>Bank Transfer ID =&gt; removedShipping fee -&gt; tied to a location</p><p>Bank Transfer ID =&gt; removed</p>','[{"value":"Shipping fee -> tied to a locationBank Transfer ID => removed"}]','Shipping fee -> tied to a location
Bank Transfer ID => removedShipping fee -> tied to a location
Bank Transfer ID => removed','','2022-11-03 04:24:02','2022-11-03 04:24:02');

INSERT INTO pages (id, title, slug, details, meta_keywords, meta_descriptions, pos, created_at, updated_at) VALUES ('9','about page title','about-page-title','<p>Shipping fee -&gt; tied to a location</p><p>Bank Transfer ID =&gt; removedShipping fee -&gt; tied to a location</p><p>Bank Transfer ID =&gt; removedShipping fee -&gt; tied to a location</p><p>Bank Transfer ID =&gt; removedShipping fee -&gt; tied to a location</p><p>Bank Transfer ID =&gt; removed</p>','[{"value":"Shipping fee -> tied to a locationBank Transfer ID => removed"}]','Shipping fee -> tied to a location
Bank Transfer ID => removedShipping fee -> tied to a location
Bank Transfer ID => removed','','2022-11-03 04:25:21','2022-11-03 04:25:21');


CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `payment_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `information` text COLLATE utf8mb4_unicode_ci,
  `unique_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `text` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO payment_settings (id, name, information, unique_keyword, photo, text, status, created_at, updated_at) VALUES ('1','Cash On Delivery','','cod','uploads/payment/0.69615800 1643790285.png','Cash on Delivery basically means you will pay the amount of product while you get the item delivered to you.','1','2022-11-13 06:32:37','2022-02-02 11:57:35');

INSERT INTO payment_settings (id, name, information, unique_keyword, photo, text, status, created_at, updated_at) VALUES ('26','FlutterWave','{"key":"pk_test_7e5a4ad6040603199b7f588b3a1b614cd4a2542f","email":"mughalimran923@gmail.com"}','flutterwave','uploads/payment/1667971364-slider.jpeg','FlutterWave is the faster & safer way to send money. Make an online payment via Paystack.','1','2022-11-13 06:43:37','2022-11-09 05:22:44');

INSERT INTO payment_settings (id, name, information, unique_keyword, photo, text, status, created_at, updated_at) VALUES ('27','Bank Transfer','','bank','uploads/payment/0.55461700 1643817418.png','<p>Account Number : 434 3434 3334</p><p><span style="font-size: 1rem;">Pay With Bank Transfer.
</span></p><p><span style="font-size: 1rem;">
Account Name : Jhon Due
</span></p><p><span style="font-size: 1rem;">
Account Email : demo@gmail.com</span></p>','1','2022-11-13 07:08:37','2022-02-02 12:03:28');


CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `category_id` bigint(20) DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descriptions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO posts (id, title, slug, details, photo, category_id, tags, meta_keywords, meta_descriptions, created_at, updated_at) VALUES ('4','Fashion and Beauty Series 1','fashion-and-beauty-series-1','<p><span style="color: rgb(0, 0, 0); font-family: "Open Sans", sans-serif; font-size: 13px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!</span><br></p>','["uploads\/posts\/0.05681600 1648662258-1632349673media_5-768x512.jpg"]','4','mobile,camera','[{"value":"asdf"},{"value":"fashion"},{"value":"beauty"}]','Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo.','2022-03-30 13:44:18','2022-03-30 13:46:22');

INSERT INTO posts (id, title, slug, details, photo, category_id, tags, meta_keywords, meta_descriptions, created_at, updated_at) VALUES ('5','Fashion and Beauty Series 2','fashion-and-beauty-series-2','<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!</p>','["uploads\/posts\/0.77006300 1653395958-1632349684media_7-768x512.jpg"]','4','mobile,phone,camera,laptop','[{"value":"mobile"},{"value":"phone"},{"value":"camera"},{"value":"laptop"}]','Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem?','2022-05-24 08:39:18','2022-05-24 08:39:18');

INSERT INTO posts (id, title, slug, details, photo, category_id, tags, meta_keywords, meta_descriptions, created_at, updated_at) VALUES ('6','Fashion and Beauty Series 3','fashion-and-beauty-series-3','<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!<br></p>','["uploads\/posts\/0.58998600 1653396074-1632349695media_10-768x512.jpg"]','4','beauty,fashion,street fashion','[{"value":"new outfit"},{"value":"cool stuff"}]','Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus','2022-05-24 08:41:14','2022-05-24 08:41:14');

INSERT INTO posts (id, title, slug, details, photo, category_id, tags, meta_keywords, meta_descriptions, created_at, updated_at) VALUES ('7','Fashion and Beauty Series 4','fashion-and-beauty-series-4','<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!<br></p>','["uploads\/posts\/0.03460700 1653396165-1632349704media_21-768x512.jpg"]','4','lorem,ipsum','[{"value":"lorem"},{"value":"ipsum"}]','Lorem ipsum dolor sit amet consectetur adipisicing elit.','2022-05-24 08:42:45','2022-05-24 08:42:45');

INSERT INTO posts (id, title, slug, details, photo, category_id, tags, meta_keywords, meta_descriptions, created_at, updated_at) VALUES ('8','Fashion and Beauty Series 5','fashion-and-beauty-series-5','<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!<br></p>','["uploads\/posts\/0.75579300 1653396227-1632349716media_23-768x512.jpg"]','4','mobile,phone,camera,laptop','[{"value":"mobile"},{"value":"phone"},{"value":"camera"},{"value":"lapop"}]','','2022-05-24 08:43:47','2022-05-24 08:43:47');

INSERT INTO posts (id, title, slug, details, photo, category_id, tags, meta_keywords, meta_descriptions, created_at, updated_at) VALUES ('9','Fashion and Beauty Series 6','fashion-and-beauty-series-6','<p><font color="#505050" face="Rubik, Helvetica, Arial, sans-serif"><span style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!</span></font><br></p>','["uploads\/posts\/0.97269200 1653396444-1632349728media_24-768x512.jpg"]','4','mobile,phone,camera,laptop','[{"value":"mobile"},{"value":"phone"},{"value":"camera"},{"value":"laptop"}]','','2022-05-24 08:47:24','2022-05-24 08:47:24');

INSERT INTO posts (id, title, slug, details, photo, category_id, tags, meta_keywords, meta_descriptions, created_at, updated_at) VALUES ('10','Fashion and Beauty Series 7','fashion-and-beauty-series-7','<p><font color="#505050" face="Rubik, Helvetica, Arial, sans-serif"><span style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!</span></font><br></p>','["uploads\/posts\/0.45259800 1653396505-1632349736media_26-768x512.jpg"]','5','mobile,phone,camera,laptop','[{"value":"mobile"},{"value":"phone"},{"value":"camera"},{"value":"laptop"}]','','2022-05-24 08:48:25','2022-05-24 08:48:25');


CREATE TABLE `promo_codes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_times` int(11) NOT NULL DEFAULT '0',
  `discount` double NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO promo_codes (id, title, code_name, no_of_times, discount, status, type, created_at, updated_at) VALUES ('2','Flash Discount','ironman','83','2','1','percentage','2022-01-27 13:32:13','2022-11-03 02:25:36');

INSERT INTO promo_codes (id, title, code_name, no_of_times, discount, status, type, created_at, updated_at) VALUES ('3','Black Friday','blackfriday','0','50','1','percentage','2022-10-23 15:43:16','2022-11-03 02:31:23');


CREATE TABLE `restock_reminders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prod_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO restock_reminders (id, prod_id, email, created_at, updated_at) VALUES ('1','61','ielemson@gmail.com','2022-10-24 11:51:52','2022-10-24 11:51:52');


CREATE TABLE `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `item_id` bigint(20) NOT NULL DEFAULT '0',
  `review` text COLLATE utf8mb4_unicode_ci,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO reviews (id, user_id, item_id, review, subject, rating, status, created_at, updated_at) VALUES ('1','9','59','staticBackdropstaticBackdropstaticBackdropstaticBackdropstaticBackdropstaticBackdrop','This is my subject','5','1','2022-10-27 03:48:35','2022-10-27 05:19:38');

INSERT INTO reviews (id, user_id, item_id, review, subject, rating, status, created_at, updated_at) VALUES ('2','9','59','staticBackdropstaticBackdropstaticBackdropstaticBackdropstaticBackdropstaticBackdrop','This is my subject','5','0','2022-10-27 05:13:35','2022-10-27 05:19:38');

INSERT INTO reviews (id, user_id, item_id, review, subject, rating, status, created_at, updated_at) VALUES ('3','9','61','review-subjectreview-subjectreview-subjectreview-subjectreview-subjectreview-subjectreview-subjectreview-subjectreview-subjectreview-subjectreview-subject','This is my subject','5','0','2022-10-27 05:20:02','2022-10-27 05:20:02');


CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO roles (id, name, section, created_at, updated_at) VALUES ('3','Manager','["Manage Orders","Manage Tickets","Manage Site"]','2022-05-24 03:06:37','2022-05-24 03:06:37');


CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO services (id, title, details, photo, created_at, updated_at) VALUES ('2','Secure Online Payment','We possess SSL / Secure Certificate','uploads/services/0.96221200 1646813485.png','2022-03-09 04:09:26','2022-03-09 04:11:25');

INSERT INTO services (id, title, details, photo, created_at, updated_at) VALUES ('3','24/7 Customer Support','Friendly 24/7 customer support','uploads/services/0.62546000 1646813509-162196471103.png','2022-03-09 04:11:49','2022-03-09 04:11:49');

INSERT INTO services (id, title, details, photo, created_at, updated_at) VALUES ('4','Money Back Guarantee','We return money within 30 days','uploads/services/0.91427600 1646813532-162196467602.png','2022-03-09 04:12:12','2022-03-09 04:12:12');

INSERT INTO services (id, title, details, photo, created_at, updated_at) VALUES ('5','Free Worldwide Shipping','Free shipping for all orders over $100 Contrary to popular belie','uploads/services/0.75088500 1646813551-162196463701.png','2022-03-09 04:12:31','2022-03-09 04:12:31');


CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `favicon` text COLLATE utf8mb4_unicode_ci,
  `loader` text COLLATE utf8mb4_unicode_ci,
  `is_loader` tinyint(4) DEFAULT '1',
  `feature_image` text COLLATE utf8mb4_unicode_ci,
  `primary_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_check` tinyint(4) DEFAULT '0',
  `email_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_pass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overlay` text COLLATE utf8mb4_unicode_ci,
  `google_analytics_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `is_shop` tinyint(4) DEFAULT '1',
  `is_blog` tinyint(4) DEFAULT '1',
  `is_faq` tinyint(4) DEFAULT '1',
  `is_contact` tinyint(4) DEFAULT '1',
  `facebook_check` tinyint(4) DEFAULT '1',
  `facebook_client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_client_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_redirect` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_check` tinyint(4) DEFAULT '1',
  `google_client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_client_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_redirect` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_price` double DEFAULT '0',
  `max_price` double DEFAULT '100000',
  `footer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_address` text COLLATE utf8mb4_unicode_ci,
  `footer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_gateway_img` text COLLATE utf8mb4_unicode_ci,
  `social_link` text COLLATE utf8mb4_unicode_ci,
  `friday_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `friday_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satureday_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satureday_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_right` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_slider` tinyint(4) DEFAULT '1',
  `is_category` tinyint(4) DEFAULT '1',
  `is_product` tinyint(4) DEFAULT '1',
  `is_top_banner` tinyint(4) DEFAULT '1',
  `is_recent` tinyint(4) DEFAULT '1',
  `is_top` tinyint(4) DEFAULT '1',
  `is_best` tinyint(4) DEFAULT '1',
  `is_flash` tinyint(4) DEFAULT '1',
  `is_brand` tinyint(4) DEFAULT '1',
  `is_blogs` tinyint(4) DEFAULT '1',
  `is_campaign` tinyint(4) DEFAULT '1',
  `is_brands` tinyint(4) DEFAULT '1',
  `is_bottom_banner` tinyint(4) DEFAULT '1',
  `is_service` tinyint(4) DEFAULT '1',
  `campaign_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_status` tinyint(4) DEFAULT '1',
  `twilio_sid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twilio_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twilio_form_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twilio_country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_announcement` tinyint(4) DEFAULT '1',
  `announcement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `announcement_delay` decimal(11,2) NOT NULL DEFAULT '0.00',
  `is_maintainance` tinyint(4) DEFAULT '1',
  `maintainance_image` text COLLATE utf8mb4_unicode_ci,
  `maintainance_text` text COLLATE utf8mb4_unicode_ci,
  `is_twilio` tinyint(4) DEFAULT '0',
  `twilio_section` text COLLATE utf8mb4_unicode_ci,
  `is_three_c_b_first` tinyint(4) DEFAULT '1',
  `is_popular_category` tinyint(4) DEFAULT '1',
  `is_three_c_b_second` tinyint(4) DEFAULT '1',
  `is_highlighted` tinyint(4) DEFAULT '1',
  `is_two_column_category` tinyint(4) DEFAULT '1',
  `is_popular_brand` tinyint(4) DEFAULT '1',
  `is_featured_category` tinyint(4) DEFAULT '1',
  `is_two_c_b` tinyint(4) DEFAULT '1',
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_recaptcha_site_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_recaptcha_secret_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recaptcha` tinyint(4) DEFAULT '0',
  `currency_direction` tinyint(4) DEFAULT '1',
  `google_analytics` text COLLATE utf8mb4_unicode_ci,
  `google_adsense` text COLLATE utf8mb4_unicode_ci,
  `facebook_pixel` text COLLATE utf8mb4_unicode_ci,
  `facebook_messenger` text COLLATE utf8mb4_unicode_ci,
  `is_google_analytics` tinyint(4) DEFAULT '0',
  `is_google_adsense` tinyint(4) DEFAULT '0',
  `is_facebook_pixel` tinyint(4) DEFAULT '0',
  `is_facebook_messenger` tinyint(4) DEFAULT '0',
  `announcement_link` text COLLATE utf8mb4_unicode_ci,
  `is_banner` int(11) NOT NULL DEFAULT '0',
  `banner_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inc_hdr_banner` int(1) NOT NULL DEFAULT '0',
  `is_pages` int(1) NOT NULL DEFAULT '0',
  `is_testimonial` int(1) NOT NULL DEFAULT '0',
  `footer_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO settings (id, title, logo, favicon, loader, is_loader, feature_image, primary_color, smtp_check, email_host, email_port, email_encryption, email_user, email_pass, email_from, email_from_name, contact_email, version, overlay, google_analytics_id, meta_keywords, meta_description, is_shop, is_blog, is_faq, is_contact, facebook_check, facebook_client_id, facebook_client_secret, facebook_redirect, google_check, google_client_id, google_client_secret, google_redirect, min_price, max_price, footer_phone, footer_address, footer_email, footer_gateway_img, social_link, friday_start, friday_end, satureday_start, satureday_end, copy_right, is_slider, is_category, is_product, is_top_banner, is_recent, is_top, is_best, is_flash, is_brand, is_blogs, is_campaign, is_brands, is_bottom_banner, is_service, campaign_title, campaign_end_date, campaign_status, twilio_sid, twilio_token, twilio_form_number, twilio_country_code, is_announcement, announcement, announcement_delay, is_maintainance, maintainance_image, maintainance_text, is_twilio, twilio_section, is_three_c_b_first, is_popular_category, is_three_c_b_second, is_highlighted, is_two_column_category, is_popular_brand, is_featured_category, is_two_c_b, theme, google_recaptcha_site_key, google_recaptcha_secret_key, recaptcha, currency_direction, google_analytics, google_adsense, facebook_pixel, facebook_messenger, is_google_analytics, is_google_adsense, is_facebook_pixel, is_facebook_messenger, announcement_link, is_banner, banner_text, banner_link, about_us, about_us_img, inc_hdr_banner, is_pages, is_testimonial, footer_img, created_at, updated_at) VALUES ('1','BeautyKink','uploads/setting/0.21215100 1663994652.png','uploads/setting/0.12172500 1662317623.png','uploads/setting/1666676349-slider.png','0','','#cc0067','1','smtp.mailtrap.io','465','tls','c1354090f67b01','d7b2121e9fddfa','noreply@icart.com','My Commerce','contact@icart.com','','','','lorem,ipsum,color,amet','iCart - Multipurpose eCommerce  Shopping Platform Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over .','0','1','1','0','0','437299763965909','bd6fd386f7dadad85d609188f6f4277d','https://localhost/mycom/public/auth/facebook/callback','1','898702380625-b009hh4qhnt5jbhr5bsm8f57gcv5gvg3.apps.googleusercontent.com','HXzaOqrZi_10lKWZa5OdaZV1','http://localhost/mycom/public/auth/google/callback','0','100000','+1 (782) 602-4624','514 S. Magnolia St. Orlando, FL 32806, USA','info@beautykink.com','uploads/setting/0.18927200 1645634457.png','{"icons":["fab fa-facebook-f","fab fa-twitter","fab fa-youtube","fab fa-instagram"],"links":["https:\/\/www.facebook.com","https:\/\/www.twitter.com","https:\/\/www.youtube.com","https:\/\/www.instagram.com"]}','10:00 AM','5:02 PM','9:00 AM','12:00 PM','BeautyKink © All rights reserved.','0','1','1','1','1','1','1','1','1','0','1','1','1','0','Deals Of The Week','08/14/2026','1','AC73e54518487ad4e26da8b465a7614f1f0','300d787df0c398ae46b84b74ea86f59c','+15612793700','+880','0','uploads/setting/0.33446400 1646990757.jpg','1.00','0','uploads/setting/0.68853800 1646991531.jpg','We are upgrading our site.  We will come back soon.  
Please stay with us. 
Thank you.','0','{"\'purchase\'":"Your Order Purchase Successfully....","\'order_status\'":"Your Order status update...."}','0','0','0','0','0','0','0','0','theme2','6LcnPoEaAAAAAF6QhKPZ8V4744yiEnr41li3SYDn','6LcnPoEaAAAAACV_xC4jdPqumaYKBnxz9Sj6y0zk','0','1','','','','<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById(\'fb-customer-chat\');
      chatbox.setAttribute("page_id", "858401617860382");
      chatbox.setAttribute("attribution", "biz_inbox");
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : \'v11.0\'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = \'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js\';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, \'script\', \'facebook-jssdk\'));
    </script>','0','0','0','0','http://beautykink.test/admin/announcement','1','FREE NATIONWIDE DELIVERY FOR ORDERS OVER N20000. SEE TERM','http://beautykinky.test/about-us','Beauty is for EVERYONE here at BeautyKink; be it a pro, a beginner or an enthusiast! So we believe it should be easy, straightforward and stress free! That is why we create easy to use beauty products that deliver professional results!','0','0','0','0','0','2022-01-20 18:07:38','2022-11-05 04:04:03');


CREATE TABLE `shipping_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `state_id` int(20) NOT NULL,
  `city_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO shipping_services (id, title, price, status, created_at, updated_at, state_id, city_id) VALUES ('1','Lagos-Ikorodu','6500','1','2022-11-02 18:41:54','2022-11-03 02:06:44','25','517');

INSERT INTO shipping_services (id, title, price, status, created_at, updated_at, state_id, city_id) VALUES ('2','Lagos-Ikorodu','5000','1','2022-11-02 21:00:24','2022-11-03 01:02:33','25','506');

INSERT INTO shipping_services (id, title, price, status, created_at, updated_at, state_id, city_id) VALUES ('3','Lagos-Island','3500','1','2022-11-03 02:08:03','2022-11-05 05:50:13','25','519');


CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`identifier`,`instance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO shoppingcart (identifier, instance, content, created_at, updated_at) VALUES ('9','default','O:29:"Illuminate\Support\Collection":2:{s:8:" * items";a:2:{s:32:"6a2841f59f68e0ac8e4d4873ae3927e4";O:32:"Gloudemans\Shoppingcart\CartItem":9:{s:5:"rowId";s:32:"6a2841f59f68e0ac8e4d4873ae3927e4";s:2:"id";i:60;s:3:"qty";s:1:"1";s:4:"name";s:9:"Hairliner";s:5:"price";d:20000;s:7:"options";O:39:"Gloudemans\Shoppingcart\CartItemOptions":2:{s:8:" * items";a:2:{s:5:"image";s:50:"uploads/items/1664845049-OMOSALEWA  BEAUTYKINK.jpg";s:4:"slug";s:9:"hairliner";}s:28:" * escapeWhenCastingToString";b:0;}s:49:" Gloudemans\Shoppingcart\CartItem associatedModel";N;s:41:" Gloudemans\Shoppingcart\CartItem taxRate";i:0;s:41:" Gloudemans\Shoppingcart\CartItem isSaved";b:0;}s:32:"5915efb90c0c3e7315a6c9c74998fd5f";O:32:"Gloudemans\Shoppingcart\CartItem":9:{s:5:"rowId";s:32:"5915efb90c0c3e7315a6c9c74998fd5f";s:2:"id";i:58;s:3:"qty";s:1:"1";s:4:"name";s:23:"Beautykink Color Shades";s:5:"price";d:1200;s:7:"options";O:39:"Gloudemans\Shoppingcart\CartItemOptions":2:{s:8:" * items";a:2:{s:5:"image";s:49:"uploads/items/1664000561-all swatch1-1000x800.jpg";s:4:"slug";s:23:"beautykink-color-shades";}s:28:" * escapeWhenCastingToString";b:0;}s:49:" Gloudemans\Shoppingcart\CartItem associatedModel";N;s:41:" Gloudemans\Shoppingcart\CartItem taxRate";i:0;s:41:" Gloudemans\Shoppingcart\CartItem isSaved";b:0;}}s:28:" * escapeWhenCastingToString";b:0;}','2022-10-18 18:07:58','2022-11-13 06:58:38');


CREATE TABLE `sitemaps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sitemap_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'theme1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pos` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO sliders (id, photo, title, link, logo, details, home_page, created_at, updated_at, pos) VALUES ('1','uploads/sliders/1667454923-slider.jpg','This is the title','','uploads/sliders/1667454923-slider.png','Lorem ipsum, dolor sit amet','theme1','2022-11-03 05:55:23','2022-11-03 06:06:09','1');

INSERT INTO sliders (id, photo, title, link, logo, details, home_page, created_at, updated_at, pos) VALUES ('2','uploads/sliders/1667457088-slider.png','Test Slider -2','','','','theme1','2022-11-03 06:31:28','2022-11-03 06:31:28','2');


CREATE TABLE `social_providers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_providers_user_id_foreign` (`user_id`),
  CONSTRAINT `social_providers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `socials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link` text COLLATE utf8mb4_unicode_ci,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='States in Nigeria.';


INSERT INTO states (id, name) VALUES ('1','Abia');

INSERT INTO states (id, name) VALUES ('2','Adamawa');

INSERT INTO states (id, name) VALUES ('3','Akwa Ibom');

INSERT INTO states (id, name) VALUES ('4','Anambra');

INSERT INTO states (id, name) VALUES ('5','Bauchi');

INSERT INTO states (id, name) VALUES ('6','Bayelsa');

INSERT INTO states (id, name) VALUES ('7','Benue');

INSERT INTO states (id, name) VALUES ('8','Borno');

INSERT INTO states (id, name) VALUES ('9','Cross River');

INSERT INTO states (id, name) VALUES ('10','Delta');

INSERT INTO states (id, name) VALUES ('11','Ebonyi');

INSERT INTO states (id, name) VALUES ('12','Edo');

INSERT INTO states (id, name) VALUES ('13','Ekiti');

INSERT INTO states (id, name) VALUES ('14','Enugu');

INSERT INTO states (id, name) VALUES ('15','FCT');

INSERT INTO states (id, name) VALUES ('16','Gombe');

INSERT INTO states (id, name) VALUES ('17','Imo');

INSERT INTO states (id, name) VALUES ('18','Jigawa');

INSERT INTO states (id, name) VALUES ('19','Kaduna');

INSERT INTO states (id, name) VALUES ('20','Kano');

INSERT INTO states (id, name) VALUES ('21','Katsina');

INSERT INTO states (id, name) VALUES ('22','Kebbi');

INSERT INTO states (id, name) VALUES ('23','Kogi');

INSERT INTO states (id, name) VALUES ('24','Kwara');

INSERT INTO states (id, name) VALUES ('25','Lagos');

INSERT INTO states (id, name) VALUES ('26','Nasarawa');

INSERT INTO states (id, name) VALUES ('27','Niger');

INSERT INTO states (id, name) VALUES ('28','Ogun');

INSERT INTO states (id, name) VALUES ('29','Ondo');

INSERT INTO states (id, name) VALUES ('30','Osun');

INSERT INTO states (id, name) VALUES ('31','Oyo');

INSERT INTO states (id, name) VALUES ('32','Plateau');

INSERT INTO states (id, name) VALUES ('33','Rivers');

INSERT INTO states (id, name) VALUES ('34','Sokoto');

INSERT INTO states (id, name) VALUES ('35','Taraba');

INSERT INTO states (id, name) VALUES ('36','Yobe');

INSERT INTO states (id, name) VALUES ('37','Zamfara');


CREATE TABLE `subcategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO subcategories (id, name, slug, category_id, status, created_at, updated_at) VALUES ('1','Face','Face','5','1','2022-09-24 04:54:00','2022-09-24 04:54:15');

INSERT INTO subcategories (id, name, slug, category_id, status, created_at, updated_at) VALUES ('2','Eyes','eyes','5','1','2022-09-24 04:54:43','2022-09-24 04:54:52');

INSERT INTO subcategories (id, name, slug, category_id, status, created_at, updated_at) VALUES ('3','Tools','tools','5','1','2022-09-24 04:55:11','2022-09-24 04:55:23');


CREATE TABLE `subscribers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO subscribers (id, email, created_at, updated_at) VALUES ('1','ielemson@gmail.com','2022-10-23 03:14:55','2022-10-23 03:14:55');

INSERT INTO subscribers (id, email, created_at, updated_at) VALUES ('2','ieemsons@gmail.com','2022-10-23 03:16:19','2022-10-23 03:16:19');

INSERT INTO subscribers (id, email, created_at, updated_at) VALUES ('3','ielemsons@yahoo.com','2022-10-23 03:19:19','2022-10-23 03:19:19');


CREATE TABLE `taxes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` double DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO taxes (id, name, value, status, created_at, updated_at) VALUES ('1','High Tax','4','1','2022-01-31 13:59:03','2022-01-31 13:59:07');

INSERT INTO taxes (id, name, value, status, created_at, updated_at) VALUES ('2','Low Tax','1','1','2022-01-31 13:59:16','2022-02-02 14:07:57');

INSERT INTO taxes (id, name, value, status, created_at, updated_at) VALUES ('3','No Tax','0','1','2022-01-31 13:59:24','2022-02-02 14:07:59');


CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO testimonials (id, user_id, testimonial, status, created_at, updated_at) VALUES ('1','9','Lorem ipsum dolor','0','2022-10-29 15:10:26','2022-10-29 16:13:31');


CREATE TABLE `tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `file` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `todos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `todo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO todos (id, todo, status, created_at, updated_at) VALUES ('7','This is just how we roll','1','2022-11-12 06:15:36','2022-11-13 07:10:39');

INSERT INTO todos (id, todo, status, created_at, updated_at) VALUES ('8','This is the other one-done','1','2022-11-12 06:31:41','2022-11-13 07:10:41');


CREATE TABLE `track_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO track_orders (id, order_id, title, created_at, updated_at) VALUES ('12','7','Pending','2022-05-23 08:48:04','2022-05-23 08:48:04');

INSERT INTO track_orders (id, order_id, title, created_at, updated_at) VALUES ('13','8','Pending','2022-05-23 08:50:43','2022-05-23 08:50:43');

INSERT INTO track_orders (id, order_id, title, created_at, updated_at) VALUES ('14','8','Pending','2022-05-23 08:51:28','2022-05-23 08:51:28');

INSERT INTO track_orders (id, order_id, title, created_at, updated_at) VALUES ('15','9','Pending','2022-05-23 08:53:27','2022-05-23 08:53:27');

INSERT INTO track_orders (id, order_id, title, created_at, updated_at) VALUES ('16','10','Pending','2022-05-23 08:59:30','2022-05-23 08:59:30');

INSERT INTO track_orders (id, order_id, title, created_at, updated_at) VALUES ('33','5','Pending','2022-10-29 13:26:40','2022-10-29 13:26:40');

INSERT INTO track_orders (id, order_id, title, created_at, updated_at) VALUES ('34','6','Pending','2022-10-29 13:28:40','2022-10-29 13:28:40');

INSERT INTO track_orders (id, order_id, title, created_at, updated_at) VALUES ('44','5','Pending','2022-11-03 02:31:23','2022-11-03 02:31:23');


CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txn_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_value` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO transactions (id, order_id, txn_id, amount, user_email, currency_sign, currency_value, created_at, updated_at) VALUES ('5','5','bcCtj0lxKK','40,000.00','elemson014@yahoo.com','₦','1','2022-10-29 13:26:40','2022-10-29 13:26:40');

INSERT INTO transactions (id, order_id, txn_id, amount, user_email, currency_sign, currency_value, created_at, updated_at) VALUES ('6','6','ZQlPndjwSU','0.00','elemson014@yahoo.com','₦','1','2022-10-29 13:28:40','2022-10-29 13:28:40');

INSERT INTO transactions (id, order_id, txn_id, amount, user_email, currency_sign, currency_value, created_at, updated_at) VALUES ('7','1','MtodC4wXXW','20,000.00','elemson014@yahoo.com','₦','1','2022-10-29 13:34:41','2022-10-29 13:34:41');

INSERT INTO transactions (id, order_id, txn_id, amount, user_email, currency_sign, currency_value, created_at, updated_at) VALUES ('8','2','Cbr3489qsp','40,000.00','ielemson@gmail.com','₦','1','2022-10-29 13:38:01','2022-10-29 13:38:01');

INSERT INTO transactions (id, order_id, txn_id, amount, user_email, currency_sign, currency_value, created_at, updated_at) VALUES ('9','3','VrD00PhC7c','40,000.00','elemson014@yahoo.com','₦','1','2022-10-31 16:11:56','2022-10-31 16:11:56');

INSERT INTO transactions (id, order_id, txn_id, amount, user_email, currency_sign, currency_value, created_at, updated_at) VALUES ('10','4','rcDQh5AmOR','21,200.00','elemson014@yahoo.com','₦','1','2022-11-02 21:03:17','2022-11-02 21:03:17');

INSERT INTO transactions (id, order_id, txn_id, amount, user_email, currency_sign, currency_value, created_at, updated_at) VALUES ('11','1','bPBy9F1b3i','60,000.00','ielemson@gmail.com','₦','1','2022-11-03 01:19:30','2022-11-03 01:19:30');

INSERT INTO transactions (id, order_id, txn_id, amount, user_email, currency_sign, currency_value, created_at, updated_at) VALUES ('12','2','9ovJCauHwd','40,000.00','elemson014@yahoo.com','₦','1','2022-11-03 01:53:32','2022-11-03 01:53:32');

INSERT INTO transactions (id, order_id, txn_id, amount, user_email, currency_sign, currency_value, created_at, updated_at) VALUES ('13','3','DCLLouTQDM','81,200.00','elemson014@yahoo.com','₦','1','2022-11-03 01:59:49','2022-11-03 01:59:49');

INSERT INTO transactions (id, order_id, txn_id, amount, user_email, currency_sign, currency_value, created_at, updated_at) VALUES ('14','4','jc58jw8Yan','41,200.00','ielemson@gmail.com','₦','1','2022-11-03 02:09:39','2022-11-03 02:09:39');

INSERT INTO transactions (id, order_id, txn_id, amount, user_email, currency_sign, currency_value, created_at, updated_at) VALUES ('15','5','goUzidXDxt','41,200.00','ielemson@gmail.com','₦','1','2022-11-03 02:31:23','2022-11-03 02:31:23');


CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO users (id, first_name, last_name, phone, email, photo, email_token, password, ship_address1, ship_address2, ship_zip, ship_city, ship_country, ship_company, bill_address1, bill_address2, bill_zip, bill_city, bill_country, bill_company, created_at, updated_at) VALUES ('9','Esther','Ogechi','+1 (467) 799-6513','ielemson@gmail.com','uploads/profile/1666211191-slider.png','82a750135fb55ab0fdf43f6ea90cccb1','$2y$10$eUleb3nqP5JDgLx4J2/s2u0Suxkkd9GQnnay9Plhh1fjh/O.piei.','','','','','','','','','38127','','','','2022-05-17 03:36:57','2022-10-19 20:27:09');

INSERT INTO users (id, first_name, last_name, phone, email, photo, email_token, password, ship_address1, ship_address2, ship_zip, ship_city, ship_country, ship_company, bill_address1, bill_address2, bill_zip, bill_city, bill_country, bill_company, created_at, updated_at) VALUES ('11','Freya','Leach','+1 (703) 395-5214','gulyfek@mailinator.com','','4VmgD4','$2y$10$mmdwnJu8J4Q9q0P6Xuem1.aQC41NzXyhZLT42AeRUwfcaZmJGqIHG','','','','','','','','','','','','','2022-05-25 04:44:32','2022-05-25 04:44:32');

INSERT INTO users (id, first_name, last_name, phone, email, photo, email_token, password, ship_address1, ship_address2, ship_zip, ship_city, ship_country, ship_company, bill_address1, bill_address2, bill_zip, bill_city, bill_country, bill_company, created_at, updated_at) VALUES ('12','Leonard','Benson','08067407355','elemson014@yahoo.com','','','eyJpdiI6IjN2Y2o2ejJwd1pSb1NuSjRiZ1NOOUE9PSIsInZhbHVlIjoieEEvWEdBd1NNVG5EVUR6SjRUU1lEUT09IiwibWFjIjoiMWU2ZGM5MmEzNzE3NmQ5MmU3OTg1MTQ2N2E3YTJkODdiNGZkY2JkMDA5YWZiZjIxY2Y5MjBjYzI1OGQ3MjUwOCIsInRhZyI6IiJ9','2702 Scarlet Sunset','','77478','508','','','','','','','','','2022-10-29 12:36:40','2022-11-03 01:59:49');


CREATE TABLE `visits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `primary_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` bigint(20) unsigned NOT NULL,
  `list` json DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `visits_primary_key_secondary_key_unique` (`primary_key`,`secondary_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `wishlists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

