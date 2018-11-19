/*
PostgreSQL Backup
Database: test/public
Backup Time: 2018-11-19 16:59:04
*/

DROP SEQUENCE IF EXISTS "public"."attachmet_id";
DROP SEQUENCE IF EXISTS "public"."cat_id";
DROP SEQUENCE IF EXISTS "public"."product_id";
DROP SEQUENCE IF EXISTS "public"."s_cat_id";
DROP SEQUENCE IF EXISTS "public"."sub_sub_id";
DROP SEQUENCE IF EXISTS "public"."user_id_plus1";
DROP TABLE IF EXISTS "public"."attachments";
DROP TABLE IF EXISTS "public"."categories";
DROP TABLE IF EXISTS "public"."products";
DROP TABLE IF EXISTS "public"."sub_categories";
DROP TABLE IF EXISTS "public"."sub_sub_categories";
DROP TABLE IF EXISTS "public"."users";
CREATE SEQUENCE "attachmet_id" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "cat_id" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "product_id" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "s_cat_id" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "sub_sub_id" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "user_id_plus1" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE TABLE "attachments" (
  "id" varchar(255) COLLATE "pg_catalog"."default" NOT NULL DEFAULT nextval('attachmet_id'::regclass),
  "product_id" int4,
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "status" int2
)
;
ALTER TABLE "attachments" OWNER TO "postgres";
COMMENT ON COLUMN "attachments"."status" IS '0- img 1- video';
CREATE TABLE "categories" (
  "id" int4 NOT NULL DEFAULT nextval('cat_id'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "categories" OWNER TO "postgres";
CREATE TABLE "products" (
  "id" int4 NOT NULL DEFAULT nextval('product_id'::regclass),
  "upc" varchar(255) COLLATE "pg_catalog"."default",
  "case_count" int2,
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "description" varchar(255) COLLATE "pg_catalog"."default",
  "brand" varchar(255) COLLATE "pg_catalog"."default",
  "size" varchar(255) COLLATE "pg_catalog"."default",
  "cat_id" int2,
  "sub_cat_id" int2,
  "sub_sub_cat_id" int2
)
;
ALTER TABLE "products" OWNER TO "postgres";
CREATE TABLE "sub_categories" (
  "id" int4 NOT NULL DEFAULT nextval('s_cat_id'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "cat_id" int4
)
;
ALTER TABLE "sub_categories" OWNER TO "postgres";
CREATE TABLE "sub_sub_categories" (
  "id" int4 NOT NULL DEFAULT nextval('sub_sub_id'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "sub_cat_id" int2
)
;
ALTER TABLE "sub_sub_categories" OWNER TO "postgres";
CREATE TABLE "users" (
  "id" int4 NOT NULL DEFAULT nextval('user_id_plus1'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "email" varchar(255) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "users" OWNER TO "postgres";
BEGIN;
LOCK TABLE "public"."attachments" IN SHARE MODE;
DELETE FROM "public"."attachments";
INSERT INTO "public"."attachments" ("id","product_id","name","status") VALUES ('234', 136, 'a66cb5148eab6d41833f20434d002464.mp4', 1),('235', 136, '3bdd32336b5fd5d14c65df4096e51154.mp4', 1),('236', 136, 'e24d84b0ee179b304dda62a3c6366692.jpg', 0),('237', 136, '3b6dc241cce5b6c9498b2e7981cb2c9c.png', 0),('238', 136, 'e07876993ad54a51c2de8a39de2807ac.jpg', 0),('239', 136, '46bd6d31ba19ff9f64b0f09189052b4e.png', 0),('240', 136, '83f638ed9c17593d7a8c43d3fb60f0e3.jpg', 0),('241', 136, 'c03802f005fb034ea3803a3268589229.png', 0),('242', 136, 'ad220d0ce80aafd5e2a24ef13e037d95.jpg', 0),('243', 137, '445093a50ebea0b0f933248ee445ba12.mp4', 1),('244', 137, 'd4e5ca5d4f2d8fdca5f32745373016f5.png', 0),('245', 137, '23cce71fc0cfc94d2f8deeb3d8f069be.jpg', 0);
COMMIT;
BEGIN;
LOCK TABLE "public"."categories" IN SHARE MODE;
DELETE FROM "public"."categories";
INSERT INTO "public"."categories" ("id","name") VALUES (9, 'Category 1');
COMMIT;
BEGIN;
LOCK TABLE "public"."products" IN SHARE MODE;
DELETE FROM "public"."products";
INSERT INTO "public"."products" ("id","upc","case_count","name","description","brand","size","cat_id","sub_cat_id","sub_sub_cat_id") VALUES (136, '786979', 4, 'Product name 1', 'Description 1', 'Brand name', '180X80', NULL, NULL, NULL),(137, '786974', 84, 'Product name 2', 'Description 2', 'Brand name', '10X88', NULL, NULL, NULL);
COMMIT;
BEGIN;
LOCK TABLE "public"."sub_categories" IN SHARE MODE;
DELETE FROM "public"."sub_categories";
INSERT INTO "public"."sub_categories" ("id","name","cat_id") VALUES (8, 'Sub Category 1', 9),(10, 'Sub Category 2', 9);
COMMIT;
BEGIN;
LOCK TABLE "public"."sub_sub_categories" IN SHARE MODE;
DELETE FROM "public"."sub_sub_categories";
INSERT INTO "public"."sub_sub_categories" ("id","name","sub_cat_id") VALUES (10, 'Sub Sub Category 1', 8),(11, 'Sub Sub Category 2', 8),(13, 'Sub Sub Category 3', 10),(14, 'Sub Sub Category 4', 10);
COMMIT;
BEGIN;
LOCK TABLE "public"."users" IN SHARE MODE;
DELETE FROM "public"."users";
INSERT INTO "public"."users" ("id","name","email") VALUES (1, 'Armen', 'asd'),(2, 'Armen', 'asd'),(3, 'Armen', 'asd'),(4, 'Armen', 'asd');
COMMIT;
ALTER TABLE "attachments" ADD CONSTRAINT "attachments_pkey" PRIMARY KEY ("id");
ALTER TABLE "categories" ADD CONSTRAINT "categories_pkey" PRIMARY KEY ("id");
ALTER TABLE "products" ADD CONSTRAINT "products_pkey" PRIMARY KEY ("id");
ALTER TABLE "sub_categories" ADD CONSTRAINT "sub_categories_pkey" PRIMARY KEY ("id");
ALTER TABLE "sub_sub_categories" ADD CONSTRAINT "sub_sub_categories_pkey" PRIMARY KEY ("id");
ALTER TABLE "users" ADD CONSTRAINT "user_pkey" PRIMARY KEY ("id");
ALTER SEQUENCE "attachmet_id"
OWNED BY "attachments"."id";
SELECT setval('"attachmet_id"', 246, true);
ALTER SEQUENCE "attachmet_id" OWNER TO "postgres";
ALTER SEQUENCE "cat_id"
OWNED BY "categories"."id";
SELECT setval('"cat_id"', 12, true);
ALTER SEQUENCE "cat_id" OWNER TO "postgres";
ALTER SEQUENCE "product_id"
OWNED BY "products"."id";
SELECT setval('"product_id"', 139, true);
ALTER SEQUENCE "product_id" OWNER TO "postgres";
ALTER SEQUENCE "s_cat_id"
OWNED BY "sub_categories"."id";
SELECT setval('"s_cat_id"', 11, true);
ALTER SEQUENCE "s_cat_id" OWNER TO "postgres";
ALTER SEQUENCE "sub_sub_id"
OWNED BY "sub_sub_categories"."id";
SELECT setval('"sub_sub_id"', 15, true);
ALTER SEQUENCE "sub_sub_id" OWNER TO "postgres";
ALTER SEQUENCE "user_id_plus1"
OWNED BY "users"."id";
SELECT setval('"user_id_plus1"', 5, true);
ALTER SEQUENCE "user_id_plus1" OWNER TO "postgres";
