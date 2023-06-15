--
-- posyand5QL database dump
--

-- Dumped from database version 11.18
-- Dumped by pg_dump version 11.18

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: data_posyandu; Type: TABLE; Schema: public; Owner: posyand5
--

CREATE TABLE public.data_posyandu (
    id character varying(60) NOT NULL,
    nomor character varying(45) NOT NULL,
    nama_posyandu character varying(150) NOT NULL,
    alamat_posyandu text,
    kelurahan character varying(60),
    kecamatan character varying(60),
    kota character varying(60),
    puskesmas character varying(60),
    bulan character varying(15),
    tahun character varying(15),
    kategori character varying(60),
    nama_pasien character varying(150),
    tempat_lahir character varying(150),
    tanggal_lahir timestamp(0) without time zone,
    jenis_kelamin character varying(255),
    usia character varying(60),
    nama_orangtua character varying(150),
    rt character varying(5),
    rw character varying(5),
    berat_badan character varying(10),
    tinggi_badan character varying(10),
    kb character varying(150),
    lingkar_kepala character varying(10),
    lingkar_lengan character varying(10),
    fl_o character varying(1) DEFAULT 'N'::character varying NOT NULL,
    fl_naik character varying(1) DEFAULT 'N'::character varying NOT NULL,
    fl_turun character varying(1) DEFAULT 'N'::character varying NOT NULL,
    fl_tetap character varying(1) DEFAULT 'N'::character varying NOT NULL,
    fl_hijau character varying(1) DEFAULT 'N'::character varying NOT NULL,
    fl_kuning character varying(1) DEFAULT 'N'::character varying NOT NULL,
    fl_bgm character varying(1) DEFAULT 'N'::character varying NOT NULL,
    fl_pus character varying(1) DEFAULT 'N'::character varying NOT NULL,
    fl_wus character varying(1) DEFAULT 'N'::character varying NOT NULL,
    fl_ibu_hamil character varying(1) DEFAULT 'N'::character varying NOT NULL,
    fl_menyusui character varying(1) DEFAULT 'N'::character varying NOT NULL,
    fl_lansia character varying(1) DEFAULT 'N'::character varying NOT NULL,
    fl_lainnya character varying(1) DEFAULT 'N'::character varying NOT NULL,
    lainnya character varying(150),
    kader character varying(10),
    kader_aktif character varying(10),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT data_posyandu_jenis_kelamin_check CHECK (((jenis_kelamin)::text = ANY ((ARRAY['L'::character varying, 'P'::character varying])::text[])))
);


ALTER TABLE public.data_posyandu OWNER TO posyand5;

--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: posyand5
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO posyand5;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: posyand5
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO posyand5;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: posyand5
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: generate_number; Type: TABLE; Schema: public; Owner: posyand5
--

CREATE TABLE public.generate_number (
    id character varying(60) NOT NULL,
    number_format character varying(150),
    active character varying(255) DEFAULT 'N'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT generate_number_active_check CHECK (((active)::text = ANY ((ARRAY['Y'::character varying, 'N'::character varying])::text[])))
);


ALTER TABLE public.generate_number OWNER TO posyand5;

--
-- Name: kategori; Type: TABLE; Schema: public; Owner: posyand5
--

CREATE TABLE public.kategori (
    id character varying(60) NOT NULL,
    name character varying(150) NOT NULL,
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.kategori OWNER TO posyand5;

--
-- Name: kecamatan; Type: TABLE; Schema: public; Owner: posyand5
--

CREATE TABLE public.kecamatan (
    id character varying(60) NOT NULL,
    name character varying(150) NOT NULL,
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.kecamatan OWNER TO posyand5;

--
-- Name: kelurahan; Type: TABLE; Schema: public; Owner: posyand5
--

CREATE TABLE public.kelurahan (
    id character varying(60) NOT NULL,
    name character varying(150) NOT NULL,
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.kelurahan OWNER TO posyand5;

--
-- Name: kota; Type: TABLE; Schema: public; Owner: posyand5
--

CREATE TABLE public.kota (
    id character varying(60) NOT NULL,
    name character varying(150) NOT NULL,
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.kota OWNER TO posyand5;

--
-- Name: migrations; Type: TABLE; Schema: public; Owner: posyand5
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO posyand5;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: posyand5
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO posyand5;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: posyand5
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: posyand5
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO posyand5;

--
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: posyand5
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO posyand5;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: posyand5
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_access_tokens_id_seq OWNER TO posyand5;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: posyand5
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- Name: puskesmas; Type: TABLE; Schema: public; Owner: posyand5
--

CREATE TABLE public.puskesmas (
    id character varying(60) NOT NULL,
    name character varying(150) NOT NULL,
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.puskesmas OWNER TO posyand5;

--
-- Name: users; Type: TABLE; Schema: public; Owner: posyand5
--

CREATE TABLE public.users (
    id character varying(60) NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    username character varying(50) NOT NULL,
    no_telp character varying(15),
    tanggal_lahir timestamp(0) without time zone DEFAULT '2023-06-14 18:14:31'::timestamp without time zone NOT NULL,
    fl_admin character varying(255) DEFAULT 'N'::character varying NOT NULL,
    photo_profile character varying(250),
    CONSTRAINT users_fl_admin_check CHECK (((fl_admin)::text = ANY ((ARRAY['Y'::character varying, 'N'::character varying])::text[])))
);


ALTER TABLE public.users OWNER TO posyand5;

--
-- Name: usia; Type: TABLE; Schema: public; Owner: posyand5
--

CREATE TABLE public.usia (
    id character varying(60) NOT NULL,
    name character varying(150) NOT NULL,
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.usia OWNER TO posyand5;

--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: posyand5
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: posyand5
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: posyand5
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- Data for Name: data_posyandu; Type: TABLE DATA; Schema: public; Owner: posyand5
--

COPY public.data_posyandu (id, nomor, nama_posyandu, alamat_posyandu, kelurahan, kecamatan, kota, puskesmas, bulan, tahun, kategori, nama_pasien, tempat_lahir, tanggal_lahir, jenis_kelamin, usia, nama_orangtua, rt, rw, berat_badan, tinggi_badan, kb, lingkar_kepala, lingkar_lengan, fl_o, fl_naik, fl_turun, fl_tetap, fl_hijau, fl_kuning, fl_bgm, fl_pus, fl_wus, fl_ibu_hamil, fl_menyusui, fl_lansia, fl_lainnya, lainnya, kader, kader_aktif, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: posyand5
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: generate_number; Type: TABLE DATA; Schema: public; Owner: posyand5
--

COPY public.generate_number (id, number_format, active, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: kategori; Type: TABLE DATA; Schema: public; Owner: posyand5
--

COPY public.kategori (id, name, description, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: kecamatan; Type: TABLE DATA; Schema: public; Owner: posyand5
--

COPY public.kecamatan (id, name, description, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: kelurahan; Type: TABLE DATA; Schema: public; Owner: posyand5
--

COPY public.kelurahan (id, name, description, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: kota; Type: TABLE DATA; Schema: public; Owner: posyand5
--

COPY public.kota (id, name, description, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: posyand5
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_resets_table	1
3	2019_08_19_000000_create_failed_jobs_table	1
4	2019_12_14_000001_create_personal_access_tokens_table	1
5	2023_04_16_131414_create_kategori_table	1
6	2023_04_16_131806_create_puskesmas_table	1
7	2023_04_16_131850_create_kelurahan_table	1
8	2023_04_16_131903_create_kecamatan_table	1
9	2023_04_16_131917_create_kota_table	1
10	2023_04_16_131943_create_usia_table	1
11	2023_04_16_132240_create_data_posyandu_table	1
12	2023_04_17_124248__add_field_to_users_table	1
13	2023_04_24_022730_add_field_to_users_table	1
14	2023_04_29_072050_create_generate_number_table	1
\.


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: posyand5
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: posyand5
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: puskesmas; Type: TABLE DATA; Schema: public; Owner: posyand5
--

COPY public.puskesmas (id, name, description, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: posyand5
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at, username, no_telp, tanggal_lahir, fl_admin, photo_profile) FROM stdin;
fa65f0ed-6979-323e-a462-420f07ca99cf	Administrator	admin@posyandu-singkong.com	\N	$2y$10$iEPP08LiS5wRZcfBVDfUQO8TfwbFUvBCiP/9cDkSZ6b9PybCYg2bu	\N	2023-06-14 18:14:33	2023-06-14 18:14:33	posyanduadmin	\N	2023-06-14 18:14:32	Y	\N
\.


--
-- Data for Name: usia; Type: TABLE DATA; Schema: public; Owner: posyand5
--

COPY public.usia (id, name, description, created_at, updated_at) FROM stdin;
\.


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: posyand5
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: posyand5
--

SELECT pg_catalog.setval('public.migrations_id_seq', 14, true);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: posyand5
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- Name: data_posyandu data_posyandu_nomor_unique; Type: CONSTRAINT; Schema: public; Owner: posyand5
--

ALTER TABLE ONLY public.data_posyandu
    ADD CONSTRAINT data_posyandu_nomor_unique UNIQUE (nomor);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: posyand5
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: posyand5
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: posyand5
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: posyand5
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: posyand5
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: posyand5
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_username_unique; Type: CONSTRAINT; Schema: public; Owner: posyand5
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_unique UNIQUE (username);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: posyand5
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: posyand5
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- posyand5QL database dump complete
--

