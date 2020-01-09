--
-- PostgreSQL database dump
--

-- Dumped from database version 12.0
-- Dumped by pg_dump version 12.0

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
-- Data for Name: tlt_category; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.tlt_category (id, shortname, longname) FROM stdin;
1	POO	Programmation Orientée Objet
2	PHP	Langage PHP
3	Symf4	Symfony version 4
\.


--
-- Data for Name: tlt_question; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.tlt_question (id, categories_id, text, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: tlt_answer; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.tlt_answer (id, question_id, text, correction) FROM stdin;
\.


--
-- Data for Name: tlt_user; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.tlt_user (id, email, roles, password) FROM stdin;
1	superadmin@gmail.com	["ROLE_SUPER_ADMIN"]	$argon2id$v=19$m=65536,t=4,p=1$REZWSlgzRmNmSUxzaE1Vag$1TBn2gh9SY1FpVYCsPzr8pGLqshU2g9SWe/uD4LeQF0
2	admin@gmail.com	["ROLE_ADMIN"]	$argon2id$v=19$m=65536,t=4,p=1$REZWSlgzRmNmSUxzaE1Vag$1TBn2gh9SY1FpVYCsPzr8pGLqshU2g9SWe/uD4LeQF0
3	user@gmail.com	["ROLE_USER"]	$argon2id$v=19$m=65536,t=4,p=1$REZWSlgzRmNmSUxzaE1Vag$1TBn2gh9SY1FpVYCsPzr8pGLqshU2g9SWe/uD4LeQF0
\.


--
-- Name: tlt_answer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tlt_answer_id_seq', 2, true);


--
-- Name: tlt_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tlt_category_id_seq', 3, true);


--
-- Name: tlt_question_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tlt_question_id_seq', 1, true);


--
-- Name: tlt_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tlt_user_id_seq', 3, true);


--
-- PostgreSQL database dump complete
--

