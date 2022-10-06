PGDMP     
    &            	    z         	   skm_libas    14.5    14.4 L    \           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            ]           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            ^           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            _           1262    16778 	   skm_libas    DATABASE     ^   CREATE DATABASE skm_libas WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'en_US.UTF-8';
    DROP DATABASE skm_libas;
                postgres    false            �            1259    17739    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    root    false            �            1259    17738    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          root    false    213            `           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          root    false    212            �            1259    17770    login_histories    TABLE     +  CREATE TABLE public.login_histories (
    id bigint NOT NULL,
    user_id character varying(255) NOT NULL,
    description character varying(255) NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 #   DROP TABLE public.login_histories;
       public         heap    root    false            �            1259    17769    login_histories_id_seq    SEQUENCE        CREATE SEQUENCE public.login_histories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.login_histories_id_seq;
       public          root    false    218            a           0    0    login_histories_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.login_histories_id_seq OWNED BY public.login_histories.id;
          public          root    false    217            �            1259    17726 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    root    false            �            1259    17725    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          root    false    210            b           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          root    false    209            �            1259    17732    password_resets    TABLE     �   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         heap    root    false            �            1259    17751    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    deleted_at timestamp(0) without time zone,
    last_used_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    root    false            �            1259    17750    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          root    false    215            c           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          root    false    214            �            1259    17779 	   questions    TABLE       CREATE TABLE public.questions (
    id bigint NOT NULL,
    questions_categorie_id integer NOT NULL,
    name text NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.questions;
       public         heap    root    false            �            1259    17788    questions_categories    TABLE     �   CREATE TABLE public.questions_categories (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 (   DROP TABLE public.questions_categories;
       public         heap    root    false            �            1259    17787    questions_categories_id_seq    SEQUENCE     �   CREATE SEQUENCE public.questions_categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.questions_categories_id_seq;
       public          root    false    222            d           0    0    questions_categories_id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.questions_categories_id_seq OWNED BY public.questions_categories.id;
          public          root    false    221            �            1259    17778    questions_id_seq    SEQUENCE     y   CREATE SEQUENCE public.questions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.questions_id_seq;
       public          root    false    220            e           0    0    questions_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.questions_id_seq OWNED BY public.questions.id;
          public          root    false    219            �            1259    17795    reports    TABLE     (  CREATE TABLE public.reports (
    id bigint NOT NULL,
    respondent_id integer NOT NULL,
    question_id integer NOT NULL,
    result integer NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.reports;
       public         heap    root    false            �            1259    17794    reports_id_seq    SEQUENCE     w   CREATE SEQUENCE public.reports_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.reports_id_seq;
       public          root    false    224            f           0    0    reports_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.reports_id_seq OWNED BY public.reports.id;
          public          root    false    223            �            1259    17809    respondents    TABLE     @  CREATE TABLE public.respondents (
    id bigint NOT NULL,
    unit_id integer NOT NULL,
    gender character varying(1) NOT NULL,
    education character varying(255) NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.respondents;
       public         heap    root    false            �            1259    17808    respondents_id_seq    SEQUENCE     {   CREATE SEQUENCE public.respondents_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.respondents_id_seq;
       public          root    false    228            g           0    0    respondents_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.respondents_id_seq OWNED BY public.respondents.id;
          public          root    false    227            �            1259    17802    units    TABLE     �   CREATE TABLE public.units (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.units;
       public         heap    root    false            �            1259    17801    units_id_seq    SEQUENCE     u   CREATE SEQUENCE public.units_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.units_id_seq;
       public          root    false    226            h           0    0    units_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.units_id_seq OWNED BY public.units.id;
          public          root    false    225            �            1259    17762    users    TABLE     �  CREATE TABLE public.users (
    id character varying(255) NOT NULL,
    email character varying(100) NOT NULL,
    password character varying(100) NOT NULL,
    level character varying(20) NOT NULL,
    name character varying(100) NOT NULL,
    phone character varying(14) NOT NULL,
    gender character varying(1) NOT NULL,
    address character varying(255) NOT NULL,
    date_born date NOT NULL,
    profile_pic character varying(255),
    email_verified_at timestamp(0) without time zone,
    remember_token character varying(100),
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         heap    root    false            �           2604    17742    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          root    false    212    213    213            �           2604    17773    login_histories id    DEFAULT     x   ALTER TABLE ONLY public.login_histories ALTER COLUMN id SET DEFAULT nextval('public.login_histories_id_seq'::regclass);
 A   ALTER TABLE public.login_histories ALTER COLUMN id DROP DEFAULT;
       public          root    false    217    218    218            �           2604    17729    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          root    false    210    209    210            �           2604    17754    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          root    false    215    214    215            �           2604    17782    questions id    DEFAULT     l   ALTER TABLE ONLY public.questions ALTER COLUMN id SET DEFAULT nextval('public.questions_id_seq'::regclass);
 ;   ALTER TABLE public.questions ALTER COLUMN id DROP DEFAULT;
       public          root    false    219    220    220            �           2604    17791    questions_categories id    DEFAULT     �   ALTER TABLE ONLY public.questions_categories ALTER COLUMN id SET DEFAULT nextval('public.questions_categories_id_seq'::regclass);
 F   ALTER TABLE public.questions_categories ALTER COLUMN id DROP DEFAULT;
       public          root    false    221    222    222            �           2604    17798 
   reports id    DEFAULT     h   ALTER TABLE ONLY public.reports ALTER COLUMN id SET DEFAULT nextval('public.reports_id_seq'::regclass);
 9   ALTER TABLE public.reports ALTER COLUMN id DROP DEFAULT;
       public          root    false    224    223    224            �           2604    17812    respondents id    DEFAULT     p   ALTER TABLE ONLY public.respondents ALTER COLUMN id SET DEFAULT nextval('public.respondents_id_seq'::regclass);
 =   ALTER TABLE public.respondents ALTER COLUMN id DROP DEFAULT;
       public          root    false    227    228    228            �           2604    17805    units id    DEFAULT     d   ALTER TABLE ONLY public.units ALTER COLUMN id SET DEFAULT nextval('public.units_id_seq'::regclass);
 7   ALTER TABLE public.units ALTER COLUMN id DROP DEFAULT;
       public          root    false    225    226    226            J          0    17739    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          root    false    213   �Z       O          0    17770    login_histories 
   TABLE DATA           g   COPY public.login_histories (id, user_id, description, deleted_at, created_at, updated_at) FROM stdin;
    public          root    false    218   �Z       G          0    17726 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          root    false    210   \       H          0    17732    password_resets 
   TABLE DATA           C   COPY public.password_resets (email, token, created_at) FROM stdin;
    public          root    false    211   �\       L          0    17751    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, deleted_at, last_used_at, created_at, updated_at) FROM stdin;
    public          root    false    215   ]       Q          0    17779 	   questions 
   TABLE DATA           i   COPY public.questions (id, questions_categorie_id, name, deleted_at, created_at, updated_at) FROM stdin;
    public          root    false    220   7]       S          0    17788    questions_categories 
   TABLE DATA           \   COPY public.questions_categories (id, name, deleted_at, created_at, updated_at) FROM stdin;
    public          root    false    222   �]       U          0    17795    reports 
   TABLE DATA           m   COPY public.reports (id, respondent_id, question_id, result, deleted_at, created_at, updated_at) FROM stdin;
    public          root    false    224   J^       Y          0    17809    respondents 
   TABLE DATA           i   COPY public.respondents (id, unit_id, gender, education, deleted_at, created_at, updated_at) FROM stdin;
    public          root    false    228   d       W          0    17802    units 
   TABLE DATA           M   COPY public.units (id, name, deleted_at, created_at, updated_at) FROM stdin;
    public          root    false    226   �d       M          0    17762    users 
   TABLE DATA           �   COPY public.users (id, email, password, level, name, phone, gender, address, date_born, profile_pic, email_verified_at, remember_token, deleted_at, created_at, updated_at) FROM stdin;
    public          root    false    216   �e       i           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          root    false    212            j           0    0    login_histories_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.login_histories_id_seq', 24, true);
          public          root    false    217            k           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 10, true);
          public          root    false    209            l           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          root    false    214            m           0    0    questions_categories_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.questions_categories_id_seq', 5, true);
          public          root    false    221            n           0    0    questions_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.questions_id_seq', 5, true);
          public          root    false    219            o           0    0    reports_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.reports_id_seq', 315, true);
          public          root    false    223            p           0    0    respondents_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.respondents_id_seq', 6, true);
          public          root    false    227            q           0    0    units_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.units_id_seq', 5, true);
          public          root    false    225            �           2606    17747    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            root    false    213            �           2606    17749 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            root    false    213            �           2606    17777 $   login_histories login_histories_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.login_histories
    ADD CONSTRAINT login_histories_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.login_histories DROP CONSTRAINT login_histories_pkey;
       public            root    false    218            �           2606    17731    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            root    false    210            �           2606    17758 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            root    false    215            �           2606    17761 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            root    false    215            �           2606    17793 .   questions_categories questions_categories_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.questions_categories
    ADD CONSTRAINT questions_categories_pkey PRIMARY KEY (id);
 X   ALTER TABLE ONLY public.questions_categories DROP CONSTRAINT questions_categories_pkey;
       public            root    false    222            �           2606    17786    questions questions_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.questions
    ADD CONSTRAINT questions_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.questions DROP CONSTRAINT questions_pkey;
       public            root    false    220            �           2606    17800    reports reports_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.reports
    ADD CONSTRAINT reports_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.reports DROP CONSTRAINT reports_pkey;
       public            root    false    224            �           2606    17814    respondents respondents_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.respondents
    ADD CONSTRAINT respondents_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.respondents DROP CONSTRAINT respondents_pkey;
       public            root    false    228            �           2606    17807    units units_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.units
    ADD CONSTRAINT units_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.units DROP CONSTRAINT units_pkey;
       public            root    false    226            �           2606    17768    users users_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (email);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            root    false    216            �           1259    17737    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public            root    false    211            �           1259    17759 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            root    false    215    215            J      x������ � �      O   P  x���Mj�@F��)rI��gt�� ��Bi6��3c��$*�
x�@�ϖ>L͸��uL�2��s�yW�����|���?��k���bn��J��C���ׯ���x���4�A�oП�NC},�Z�{�Dg�:�D���X9XzPQF�Az"h�(��ʡ�D��3i5�U�Š�����	R�b@�>m�H�l1 W��z��N�|���F���R� +�E��ש�@��-�*�.�R]��U���~W*o�HN�J��<�S
z��Ɉ�g�"��Š��R;j����1`o�v���6�U1�_Y�_+%�����d18� ����H      G   �   x�e��n� E�����m�/�,��-[&�!WB:�'T�	�\�mb���3đ"'�d����U�Iu��A�Y7�H_���_�����o'�������~7u6I]sW�-��\$�4`Ox&�mq�pw�NR��w�\+��G�)?Kr�z��6���~,鎞Q�| �b���5P��xW��
٪��ه��Ⱦ�??���y䗂      H      x������ � �      L      x������ � �      Q   z   x�m�1�@k���C���8?"/�9"Z@Q��

ngg�UR���-�֖�4���,K͐�p���ٵ��-��1�A[\Jĸ��SRɂ$p��O�<>��g�Z�n��cx2���c��;�>F!      S   y   x�m�1
�@��+�V�)�����ل`\B �O����vvgYNK{?��k�-}�tE�Y]�#ٽ1��#ݽ)������ul���������������K
���cբ"��JB�      U   �  x���K�$)D��)�=��?�'���c"�f1
�����&��B�>Pd���4����w��$�S}�쾽R���{G�;%�-Ƿ��^��玴ww��+zG�[Ď���U&�R�nk9!m�B���'d\�l�/BC��6�ιA���	a>n�f�0�Qi��J�6���Оj���k5������0&ϙas+�C���97��O������4�94�$��&�6��� �[&lPp�N?s�������89���?Yq[�T���N^~��`�6N#".���񜢬� ZO!��$<n�L�C�A�x^Y�$�q:����q��D~P�Cj���f"�/x�R��Pl�6׃��q}�����Gp[7�}��B�s=��[���1Ec�s��qMlc_i��q����D�cV݈ͭ�q�W<�ꍘ[��B�9D�0ߟ�x�	�ۃ�G!Z5��[õjt\���}Tbă��U1`ݚ���J\Q������[����}��ՐwG�-] Gz(�����#ΐ�%�I����P�� ��w�3T�M�3��
~�R�34����4�5����o������3��v��<�HuB�ic���c_��	aIB8lҐa�H����H��
c��/H�����KW���_���E��}�w��ւ�K���e"���J�܈���ȃ�Db�
�G�4!��-]�3���T��J#a���(���ш*�U%d�&"߫LfY^/��Uk�#5f��Z�.��$�Őw-�3$��6�_ޞ�D�n-ѽbs[�7������C��z$Nn_y1�>����*����o���������b4b�}�=�i�!%��S��=�+�P!��Q��4n��P'�||s5��2�F��	��H����G���������p.�^m� �.�>zqA�tG=��<���vAj�Z.h�&p�l�\P1MT�E�j��z��Sd�=�FsY�l�lf邒�$� [k� [k� {��q��l��OJ�F$1���=K�L��e�|��2�F�>�rA��G#���@9�3K�8��_� \P&�2��b�ƭg�:��0�*K#0�+��R�cqA�%��D�Q�MU��
�������j4��.Ⱦ�qAJ(l�է�DP�yE	BՔB.Ⱦ�wA���\� R����	q����W�.(����)TM��5Ba[g�4L��H���ކ� &���ܩ� ۳tA�����.Ⱦ�vA�8�}eÈ��!����!���pA�j��5f��^3�B.�Gc</O���\aST\�RL�3�[�Q?]�(�Ͽ:ݿ]T�P���ꇲ���jA������������ޔ�J����3�1�>��r�}�(	r9_)r���%�f�Qn��|��$=��*A�����?���_P�      Y   �   x�}��j1E��W���a�m��OK!�l��44)���g�fF��p��+,��[�p8�F�� I��"ndsva�<���+^��)�%bSn*㚉r�r0�i��)N�t<nCy3�i/)�RG�:\�:LJ�� ��sN�J���kA6�?��Êy�Ծ�����-Zc�Q�*��UW��cP���/�k)k�J�cPHtw���@�x��������U�K����� ��׋�      W   {   x�u�1�0k�������#xA'iϘ�?f��\�ړ$�n�+Z�P�H�D� #y�utV�#���h{���5��D�>Ͻ�������0���._&�y|�����T=��3 ��@�      M   X  x�m�Os�@���)<�;3���5��u�R��AP@�O��dwc%U���ݯՐ"&DX��
�}�#j �� I-��!J����A�hw����N�$>e��ӣ���:�Aˈ�k�J�h�zQo�0��)�_�}�YZ^f��E���D��4[�y,����R��U�3��_� V{�*�����5��PG����|Y��"Y��X�3��^�]f�-��H�`���6!� ЁFI�LBl`���c���c�(��Z	��,~�2Oc=��:
�cW���C�ks����"����x:�m,S8�7aW���3�iZ��j./[���5��D�s�߳���l�#���Ο�^�?�a�|���D��w�!���18�eSoȧ� ƎyEW��i`K�`�p��#�M���o�:�Ñ���qH������A�:�~�5����)$G�@&a�a 1'
�'_����%v)������Kɒ���:��;?3`сW��<l���b�n���o(��"�~j�P���ܰ�v�.�6��=���9�U�@��e,�L��]�	��2Z���ƭY1�����2��,�G���u � ���xi7�?ȼ	�     