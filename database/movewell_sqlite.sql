-- MoveWell SQLite Database
-- Converted from MySQL (movewell.sql)

-- Table: appointments
CREATE TABLE IF NOT EXISTS "appointments" (
    "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    "name" VARCHAR(255) NOT NULL,
    "phone" VARCHAR(20) NOT NULL,
    "email" VARCHAR(255) DEFAULT NULL,
    "service" VARCHAR(255) DEFAULT NULL,
    "preferred_date" DATE DEFAULT NULL,
    "preferred_time" VARCHAR(255) DEFAULT NULL,
    "message" TEXT DEFAULT NULL,
    "status" TEXT NOT NULL DEFAULT 'pending' CHECK("status" IN ('pending','confirmed','completed','cancelled')),
    "created_at" TIMESTAMP NULL DEFAULT NULL,
    "updated_at" TIMESTAMP NULL DEFAULT NULL
);

-- Table: blogs
CREATE TABLE IF NOT EXISTS "blogs" (
    "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    "title" VARCHAR(255) NOT NULL,
    "slug" VARCHAR(255) NOT NULL,
    "category" VARCHAR(255) NOT NULL,
    "excerpt" TEXT NOT NULL,
    "content" TEXT NOT NULL,
    "image" VARCHAR(255) DEFAULT NULL,
    "is_published" INTEGER NOT NULL DEFAULT 1,
    "published_at" TIMESTAMP NULL DEFAULT NULL,
    "created_at" TIMESTAMP NULL DEFAULT NULL,
    "updated_at" TIMESTAMP NULL DEFAULT NULL
);

-- Table: cache
CREATE TABLE IF NOT EXISTS "cache" (
    "key" VARCHAR(255) NOT NULL PRIMARY KEY,
    "value" TEXT NOT NULL,
    "expiration" INTEGER NOT NULL
);

-- Table: cache_locks
CREATE TABLE IF NOT EXISTS "cache_locks" (
    "key" VARCHAR(255) NOT NULL PRIMARY KEY,
    "owner" VARCHAR(255) NOT NULL,
    "expiration" INTEGER NOT NULL
);

-- Table: contacts
CREATE TABLE IF NOT EXISTS "contacts" (
    "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    "name" VARCHAR(255) NOT NULL,
    "phone" VARCHAR(255) NOT NULL,
    "email" VARCHAR(255) DEFAULT NULL,
    "service" VARCHAR(255) DEFAULT NULL,
    "message" TEXT NOT NULL,
    "is_read" INTEGER NOT NULL DEFAULT 0,
    "created_at" TIMESTAMP NULL DEFAULT NULL,
    "updated_at" TIMESTAMP NULL DEFAULT NULL
);

-- Table: failed_jobs
CREATE TABLE IF NOT EXISTS "failed_jobs" (
    "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    "uuid" VARCHAR(255) NOT NULL,
    "connection" TEXT NOT NULL,
    "queue" TEXT NOT NULL,
    "payload" TEXT NOT NULL,
    "exception" TEXT NOT NULL,
    "failed_at" TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Table: galleries
CREATE TABLE IF NOT EXISTS "galleries" (
    "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    "title" VARCHAR(255) NOT NULL,
    "category" VARCHAR(255) NOT NULL DEFAULT 'clinic',
    "image" VARCHAR(255) NOT NULL,
    "sort_order" INTEGER NOT NULL DEFAULT 0,
    "is_active" INTEGER NOT NULL DEFAULT 1,
    "created_at" TIMESTAMP NULL DEFAULT NULL,
    "updated_at" TIMESTAMP NULL DEFAULT NULL
);

-- Table: jobs
CREATE TABLE IF NOT EXISTS "jobs" (
    "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    "queue" VARCHAR(255) NOT NULL,
    "payload" TEXT NOT NULL,
    "attempts" INTEGER NOT NULL,
    "reserved_at" INTEGER DEFAULT NULL,
    "available_at" INTEGER NOT NULL,
    "created_at" INTEGER NOT NULL
);

-- Table: job_batches
CREATE TABLE IF NOT EXISTS "job_batches" (
    "id" VARCHAR(255) NOT NULL PRIMARY KEY,
    "name" VARCHAR(255) NOT NULL,
    "total_jobs" INTEGER NOT NULL,
    "pending_jobs" INTEGER NOT NULL,
    "failed_jobs" INTEGER NOT NULL,
    "failed_job_ids" TEXT NOT NULL,
    "options" TEXT DEFAULT NULL,
    "cancelled_at" INTEGER DEFAULT NULL,
    "created_at" INTEGER NOT NULL,
    "finished_at" INTEGER DEFAULT NULL
);

-- Table: migrations
CREATE TABLE IF NOT EXISTS "migrations" (
    "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    "migration" VARCHAR(255) NOT NULL,
    "batch" INTEGER NOT NULL
);

-- Table: password_reset_tokens
CREATE TABLE IF NOT EXISTS "password_reset_tokens" (
    "email" VARCHAR(255) NOT NULL PRIMARY KEY,
    "token" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP NULL DEFAULT NULL
);

-- Table: sessions
CREATE TABLE IF NOT EXISTS "sessions" (
    "id" VARCHAR(255) NOT NULL PRIMARY KEY,
    "user_id" INTEGER DEFAULT NULL,
    "ip_address" VARCHAR(45) DEFAULT NULL,
    "user_agent" TEXT DEFAULT NULL,
    "payload" TEXT NOT NULL,
    "last_activity" INTEGER NOT NULL
);

-- Table: users
CREATE TABLE IF NOT EXISTS "users" (
    "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    "name" VARCHAR(255) NOT NULL,
    "email" VARCHAR(255) NOT NULL,
    "is_admin" INTEGER NOT NULL DEFAULT 0,
    "email_verified_at" TIMESTAMP NULL DEFAULT NULL,
    "password" VARCHAR(255) NOT NULL,
    "remember_token" VARCHAR(100) DEFAULT NULL,
    "created_at" TIMESTAMP NULL DEFAULT NULL,
    "updated_at" TIMESTAMP NULL DEFAULT NULL
);

-- Indexes
CREATE UNIQUE INDEX "blogs_slug_unique" ON "blogs" ("slug");
CREATE INDEX "cache_expiration_index" ON "cache" ("expiration");
CREATE INDEX "cache_locks_expiration_index" ON "cache_locks" ("expiration");
CREATE UNIQUE INDEX "failed_jobs_uuid_unique" ON "failed_jobs" ("uuid");
CREATE INDEX "jobs_queue_index" ON "jobs" ("queue");
CREATE INDEX "sessions_user_id_index" ON "sessions" ("user_id");
CREATE INDEX "sessions_last_activity_index" ON "sessions" ("last_activity");
CREATE UNIQUE INDEX "users_email_unique" ON "users" ("email");

-- ============================================
-- DATA (exact copy from movewell.sql)
-- ============================================

-- Appointments data
INSERT INTO "appointments" ("id", "name", "phone", "email", "service", "preferred_date", "preferred_time", "message", "status", "created_at", "updated_at") VALUES
(1, 'test', '1234567890', NULL, 'Knee Surgery', '2026-04-16', '10:00 AM - 12:00 PM', NULL, 'pending', '2026-04-03 08:26:33', '2026-04-03 08:26:33');
INSERT INTO "appointments" ("id", "name", "phone", "email", "service", "preferred_date", "preferred_time", "message", "status", "created_at", "updated_at") VALUES
(2, 'test order', '9373111709', NULL, 'Knee Surgery', '2026-04-25', '10:00 AM - 12:00 PM', NULL, 'pending', '2026-04-03 08:28:31', '2026-04-03 08:43:31');
INSERT INTO "appointments" ("id", "name", "phone", "email", "service", "preferred_date", "preferred_time", "message", "status", "created_at", "updated_at") VALUES
(3, 'test', '7030281823', NULL, NULL, NULL, NULL, NULL, 'pending', '2026-04-03 14:15:24', '2026-04-03 14:15:24');
INSERT INTO "appointments" ("id", "name", "phone", "email", "service", "preferred_date", "preferred_time", "message", "status", "created_at", "updated_at") VALUES
(4, 'new', '34333131311', NULL, 'Hip Surgery', '2026-04-23', '12:00 PM - 02:00 PM', NULL, 'pending', '2026-04-03 14:30:17', '2026-04-03 14:30:17');

-- Migrations data
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (4, '2026_03_31_090618_create_contacts_table', 1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (5, '2026_03_31_090623_create_galleries_table', 1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (6, '2026_03_31_090629_create_blogs_table', 1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (7, '2026_04_03_000000_add_is_admin_to_users_table', 1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (8, '2026_04_03_132044_create_appointments_table', 1);

-- Users data (admin user with hashed password)
INSERT INTO "users" ("id", "name", "email", "is_admin", "email_verified_at", "password", "remember_token", "created_at", "updated_at") VALUES
(1, 'Admin', 'admin@movewell.com', 1, NULL, '$2y$12$kddRhMaDgPMSx63OgKhCh.0A1yDWIZ5dSV.l6R0ZqlOJ2vJoh1Uf2', 'qoebFBS6SyprLOSKw51X6IWFjDbq0cB9ulLN2N3D4s3vnI7iPpXhRGe0TvBR', '2026-03-31 03:42:44', '2026-04-03 02:40:27');
