--
-- PostgreSQL database dump
--

-- Dumped from database version 16.1 (Debian 16.1-1.pgdg120+1)
-- Dumped by pg_dump version 16.1

-- Started on 2024-01-29 08:39:03 UTC

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

--
-- TOC entry 6 (class 2615 OID 16389)
-- Name: schema; Type: SCHEMA; Schema: -; Owner: docker
--

CREATE SCHEMA schema;


ALTER SCHEMA schema OWNER TO docker;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 221 (class 1259 OID 16417)
-- Name: incidents_archive; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.incidents_archive (
    id integer NOT NULL,
    title character varying(255) NOT NULL,
    decription text NOT NULL,
    location character varying(255),
    "time" time without time zone NOT NULL,
    author character varying(255) NOT NULL,
    file bytea
);


ALTER TABLE public.incidents_archive OWNER TO docker;

--
-- TOC entry 220 (class 1259 OID 16416)
-- Name: incidents_archive_id_seq; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.incidents_archive_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.incidents_archive_id_seq OWNER TO docker;

--
-- TOC entry 3382 (class 0 OID 0)
-- Dependencies: 220
-- Name: incidents_archive_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: docker
--

ALTER SEQUENCE public.incidents_archive_id_seq OWNED BY public.incidents_archive.id;


--
-- TOC entry 219 (class 1259 OID 16408)
-- Name: incidents; Type: TABLE; Schema: schema; Owner: docker
--

CREATE TABLE schema.incidents (
    id integer NOT NULL,
    title character varying(255) NOT NULL,
    decription text NOT NULL,
    location character varying(255) NOT NULL,
    "time" time without time zone NOT NULL,
    author character varying(255) NOT NULL,
    file bytea
);


ALTER TABLE schema.incidents OWNER TO docker;

--
-- TOC entry 224 (class 1259 OID 16449)
-- Name: author_incidents; Type: SEQUENCE; Schema: schema; Owner: docker
--

CREATE SEQUENCE schema.author_incidents
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE schema.author_incidents OWNER TO docker;

--
-- TOC entry 3383 (class 0 OID 0)
-- Dependencies: 224
-- Name: author_incidents; Type: SEQUENCE OWNED BY; Schema: schema; Owner: docker
--

ALTER SEQUENCE schema.author_incidents OWNED BY schema.incidents.author;


--
-- TOC entry 223 (class 1259 OID 16433)
-- Name: incidents_archive; Type: TABLE; Schema: schema; Owner: docker
--

CREATE TABLE schema.incidents_archive (
    id integer NOT NULL,
    title character varying(255),
    description text NOT NULL,
    "time" time without time zone,
    author character varying(255) NOT NULL,
    file bytea,
    location character varying(255) NOT NULL
);


ALTER TABLE schema.incidents_archive OWNER TO docker;

--
-- TOC entry 222 (class 1259 OID 16432)
-- Name: incidents_archive_id_seq; Type: SEQUENCE; Schema: schema; Owner: docker
--

CREATE SEQUENCE schema.incidents_archive_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE schema.incidents_archive_id_seq OWNER TO docker;

--
-- TOC entry 3384 (class 0 OID 0)
-- Dependencies: 222
-- Name: incidents_archive_id_seq; Type: SEQUENCE OWNED BY; Schema: schema; Owner: docker
--

ALTER SEQUENCE schema.incidents_archive_id_seq OWNED BY schema.incidents_archive.id;


--
-- TOC entry 218 (class 1259 OID 16407)
-- Name: incidents_id_seq; Type: SEQUENCE; Schema: schema; Owner: docker
--

CREATE SEQUENCE schema.incidents_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE schema.incidents_id_seq OWNER TO docker;

--
-- TOC entry 3385 (class 0 OID 0)
-- Dependencies: 218
-- Name: incidents_id_seq; Type: SEQUENCE OWNED BY; Schema: schema; Owner: docker
--

ALTER SEQUENCE schema.incidents_id_seq OWNED BY schema.incidents.id;


--
-- TOC entry 217 (class 1259 OID 16392)
-- Name: users; Type: TABLE; Schema: schema; Owner: docker
--

CREATE TABLE schema.users (
    id integer NOT NULL,
    user_id character varying(100) NOT NULL,
    name character varying(100) NOT NULL,
    surname character varying(100) NOT NULL,
    email character varying(255) NOT NULL,
    password text NOT NULL,
    usertype character varying(20)
);


ALTER TABLE schema.users OWNER TO docker;

--
-- TOC entry 225 (class 1259 OID 16450)
-- Name: unique_id; Type: SEQUENCE; Schema: schema; Owner: docker
--

CREATE SEQUENCE schema.unique_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE schema.unique_id OWNER TO docker;

--
-- TOC entry 3386 (class 0 OID 0)
-- Dependencies: 225
-- Name: unique_id; Type: SEQUENCE OWNED BY; Schema: schema; Owner: docker
--

ALTER SEQUENCE schema.unique_id OWNED BY schema.users.user_id;


--
-- TOC entry 216 (class 1259 OID 16390)
-- Name: users_id_seq; Type: SEQUENCE; Schema: schema; Owner: docker
--

CREATE SEQUENCE schema.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE schema.users_id_seq OWNER TO docker;

--
-- TOC entry 3387 (class 0 OID 0)
-- Dependencies: 216
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: schema; Owner: docker
--

ALTER SEQUENCE schema.users_id_seq OWNED BY schema.users.id;


--
-- TOC entry 3223 (class 2604 OID 16420)
-- Name: incidents_archive id; Type: DEFAULT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.incidents_archive ALTER COLUMN id SET DEFAULT nextval('public.incidents_archive_id_seq'::regclass);


--
-- TOC entry 3222 (class 2604 OID 16411)
-- Name: incidents id; Type: DEFAULT; Schema: schema; Owner: docker
--

ALTER TABLE ONLY schema.incidents ALTER COLUMN id SET DEFAULT nextval('schema.incidents_id_seq'::regclass);


--
-- TOC entry 3224 (class 2604 OID 16436)
-- Name: incidents_archive id; Type: DEFAULT; Schema: schema; Owner: docker
--

ALTER TABLE ONLY schema.incidents_archive ALTER COLUMN id SET DEFAULT nextval('schema.incidents_archive_id_seq'::regclass);


--
-- TOC entry 3221 (class 2604 OID 16395)
-- Name: users id; Type: DEFAULT; Schema: schema; Owner: docker
--

ALTER TABLE ONLY schema.users ALTER COLUMN id SET DEFAULT nextval('schema.users_id_seq'::regclass);


--
-- TOC entry 3230 (class 2606 OID 16424)
-- Name: incidents_archive incidents_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.incidents_archive
    ADD CONSTRAINT incidents_pk PRIMARY KEY (id);


--
-- TOC entry 3232 (class 2606 OID 16438)
-- Name: incidents_archive incidents_archive_pk; Type: CONSTRAINT; Schema: schema; Owner: docker
--

ALTER TABLE ONLY schema.incidents_archive
    ADD CONSTRAINT incidents_archive_pk PRIMARY KEY (id);


--
-- TOC entry 3228 (class 2606 OID 16415)
-- Name: incidents incidents_pk; Type: CONSTRAINT; Schema: schema; Owner: docker
--

ALTER TABLE ONLY schema.incidents
    ADD CONSTRAINT incidents_pk PRIMARY KEY (id);


--
-- TOC entry 3226 (class 2606 OID 16400)
-- Name: users users_pk; Type: CONSTRAINT; Schema: schema; Owner: docker
--

ALTER TABLE ONLY schema.users
    ADD CONSTRAINT users_pk PRIMARY KEY (id);


--
-- TOC entry 3233 (class 2606 OID 16439)
-- Name: incidents_archive incidents_archive_fk; Type: FK CONSTRAINT; Schema: schema; Owner: docker
--

ALTER TABLE ONLY schema.incidents_archive
    ADD CONSTRAINT incidents_archive_fk FOREIGN KEY (id) REFERENCES schema.incidents_archive(id);


-- Completed on 2024-01-29 08:39:03 UTC

--
-- PostgreSQL database dump complete
--

