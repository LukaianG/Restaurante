--
-- PostgreSQL database dump
--

-- Dumped from database version 14.2
-- Dumped by pg_dump version 14.2

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
-- Name: cardapio_id_produto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cardapio_id_produto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cardapio_id_produto_seq OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: cardapio; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cardapio (
    id_produto integer DEFAULT nextval('public.cardapio_id_produto_seq'::regclass) NOT NULL,
    nome_prod character varying,
    status_prod character varying,
    desc_prod character varying,
    valor_prod character varying,
    quant_prod integer,
    id_cat integer
);


ALTER TABLE public.cardapio OWNER TO postgres;

--
-- Name: categoria_id_cat_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categoria_id_cat_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categoria_id_cat_seq OWNER TO postgres;

--
-- Name: categoria; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categoria (
    id_cat integer DEFAULT nextval('public.categoria_id_cat_seq'::regclass) NOT NULL,
    nome_cat character varying(20),
    desc_cat character varying(50)
);


ALTER TABLE public.categoria OWNER TO postgres;

--
-- Name: cliente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cliente (
    cep character varying(9),
    telefone character varying(11),
    logradouro character varying,
    complemento character varying,
    email_cliente character varying,
    num_rua integer,
    senha_cliente character varying,
    nome_cliente character varying,
    bairro character varying,
    cidade character varying,
    estado_cliente character varying,
    id_cliente integer NOT NULL
);


ALTER TABLE public.cliente OWNER TO postgres;

--
-- Name: cliente_id_cliente_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cliente_id_cliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cliente_id_cliente_seq OWNER TO postgres;

--
-- Name: cliente_id_cliente_seq1; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cliente_id_cliente_seq1
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cliente_id_cliente_seq1 OWNER TO postgres;

--
-- Name: cliente_id_cliente_seq1; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cliente_id_cliente_seq1 OWNED BY public.cliente.id_cliente;


--
-- Name: funcionario_id_func_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.funcionario_id_func_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.funcionario_id_func_seq OWNER TO postgres;

--
-- Name: funcionario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.funcionario (
    id_func integer DEFAULT nextval('public.funcionario_id_func_seq'::regclass) NOT NULL,
    nome_func character varying(50),
    cpf_func character varying(14),
    celular_func character varying(11),
    id_tipo integer
);


ALTER TABLE public.funcionario OWNER TO postgres;

--
-- Name: pagamento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pagamento (
    nome_pag character varying(20),
    id_pagamento integer NOT NULL
);


ALTER TABLE public.pagamento OWNER TO postgres;

--
-- Name: pagamento_id_pagamento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pagamento_id_pagamento_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pagamento_id_pagamento_seq OWNER TO postgres;

--
-- Name: pagamento_id_pagamento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pagamento_id_pagamento_seq OWNED BY public.pagamento.id_pagamento;


--
-- Name: pedido_id_pedido_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pedido_id_pedido_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pedido_id_pedido_seq OWNER TO postgres;

--
-- Name: pedido; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pedido (
    id_pedido integer DEFAULT nextval('public.pedido_id_pedido_seq'::regclass) NOT NULL,
    data date,
    local_entrega character varying(120),
    valor_pedido double precision,
    id_produto integer,
    id_unico_status integer,
    id_cliente integer,
    id_func integer,
    id_tipo_pag integer
);


ALTER TABLE public.pedido OWNER TO postgres;

--
-- Name: status_ped_id_unico_status_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.status_ped_id_unico_status_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.status_ped_id_unico_status_seq OWNER TO postgres;

--
-- Name: status_ped; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.status_ped (
    nome_status character varying(20),
    id_unico_status integer DEFAULT nextval('public.status_ped_id_unico_status_seq'::regclass) NOT NULL
);


ALTER TABLE public.status_ped OWNER TO postgres;

--
-- Name: tipo_id_tipo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipo_id_tipo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_id_tipo_seq OWNER TO postgres;

--
-- Name: tipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipo (
    id_tipo integer DEFAULT nextval('public.tipo_id_tipo_seq'::regclass) NOT NULL,
    nome_tipo character varying(20)
);


ALTER TABLE public.tipo OWNER TO postgres;

--
-- Name: cliente id_cliente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente ALTER COLUMN id_cliente SET DEFAULT nextval('public.cliente_id_cliente_seq1'::regclass);


--
-- Name: pagamento id_pagamento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pagamento ALTER COLUMN id_pagamento SET DEFAULT nextval('public.pagamento_id_pagamento_seq'::regclass);


--
-- Data for Name: cardapio; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.cardapio VALUES (2, 'pao', '1', 'paozinho', '0.43', 100, 2);
INSERT INTO public.cardapio VALUES (3, 'Coxinha', '1', 'Coxa pequena', '1.00', 2, 2);
INSERT INTO public.cardapio VALUES (4, 'pao de forma', '1', 'pao fatiado', '0.10', 230, 2);
INSERT INTO public.cardapio VALUES (5, 'Pão Brioche', '1', 'Dem Brioches aos Famintos', '0.75', 26, 2);
INSERT INTO public.cardapio VALUES (6, 'pao de sal', '1', 'cacetinho', '0.31', 210, 2);
INSERT INTO public.cardapio VALUES (7, 'paozinho', '1', 'pao pequeno', '0.15', 158, 2);
INSERT INTO public.cardapio VALUES (8, 'pao frances', '1', 'baguete', '1.00', 87, 2);


--
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.categoria VALUES (2, 'padaria', 'coisa de padaria');


--
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.cliente VALUES ('96030001', '53981585187', 'Avenida Duque de Caxias', '', 'Lukaianulguim@gmail.com', 123, '827ccb0eea8a706c4c34a16891f84e7b', 'lukaian guilherme ulguim', 'Fragata', 'Pelotas', 'RS', 1);
INSERT INTO public.cliente VALUES ('04538132', '53981585187', 'Avenida Brigadeiro Faria Lima', 'A', 'Teste@gmail.com', 986, '827ccb0eea8a706c4c34a16891f84e7b', 'Teste', 'Itaim Bibi', 'São Paulo', 'SP', 2);


--
-- Data for Name: funcionario; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: pagamento; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.pagamento VALUES ('cartao de credito', 1);


--
-- Data for Name: pedido; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: status_ped; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: tipo; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: cardapio_id_produto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cardapio_id_produto_seq', 8, true);


--
-- Name: categoria_id_cat_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categoria_id_cat_seq', 2, true);


--
-- Name: cliente_id_cliente_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cliente_id_cliente_seq', 1, false);


--
-- Name: cliente_id_cliente_seq1; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cliente_id_cliente_seq1', 2, true);


--
-- Name: funcionario_id_func_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.funcionario_id_func_seq', 1, true);


--
-- Name: pagamento_id_pagamento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pagamento_id_pagamento_seq', 1, true);


--
-- Name: pedido_id_pedido_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pedido_id_pedido_seq', 1, true);


--
-- Name: status_ped_id_unico_status_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.status_ped_id_unico_status_seq', 1, true);


--
-- Name: tipo_id_tipo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipo_id_tipo_seq', 1, true);


--
-- Name: cardapio cardapio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cardapio
    ADD CONSTRAINT cardapio_pkey PRIMARY KEY (id_produto);


--
-- Name: categoria categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (id_cat);


--
-- Name: cliente cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id_cliente);


--
-- Name: funcionario funcionario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.funcionario
    ADD CONSTRAINT funcionario_pkey PRIMARY KEY (id_func);


--
-- Name: pagamento pagamento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pagamento
    ADD CONSTRAINT pagamento_pkey PRIMARY KEY (id_pagamento);


--
-- Name: pedido pedido_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pedido
    ADD CONSTRAINT pedido_pkey PRIMARY KEY (id_pedido);


--
-- Name: status_ped status_ped_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_ped
    ADD CONSTRAINT status_ped_pkey PRIMARY KEY (id_unico_status);


--
-- Name: tipo tipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo
    ADD CONSTRAINT tipo_pkey PRIMARY KEY (id_tipo);


--
-- Name: cardapio cardapio_id_cat_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cardapio
    ADD CONSTRAINT cardapio_id_cat_fkey FOREIGN KEY (id_cat) REFERENCES public.categoria(id_cat);


--
-- Name: funcionario funcionario_id_tipo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.funcionario
    ADD CONSTRAINT funcionario_id_tipo_fkey FOREIGN KEY (id_tipo) REFERENCES public.tipo(id_tipo);


--
-- Name: pedido pedido_id_cliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pedido
    ADD CONSTRAINT pedido_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES public.cliente(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pedido pedido_id_func_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pedido
    ADD CONSTRAINT pedido_id_func_fkey FOREIGN KEY (id_func) REFERENCES public.funcionario(id_func);


--
-- Name: pedido pedido_id_produto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pedido
    ADD CONSTRAINT pedido_id_produto_fkey FOREIGN KEY (id_produto) REFERENCES public.cardapio(id_produto);


--
-- Name: pedido pedido_id_tipo_pag_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pedido
    ADD CONSTRAINT pedido_id_tipo_pag_fkey FOREIGN KEY (id_tipo_pag) REFERENCES public.pagamento(id_pagamento) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pedido pedido_id_unico_status_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pedido
    ADD CONSTRAINT pedido_id_unico_status_fkey FOREIGN KEY (id_unico_status) REFERENCES public.status_ped(id_unico_status);


--
-- PostgreSQL database dump complete
--

