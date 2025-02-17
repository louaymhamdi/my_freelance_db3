PGDMP      0                 }            my_freelance_db    17.2    17.2 '               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                           false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                           false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                           false                       1262    16899    my_freelance_db    DATABASE     �   CREATE DATABASE my_freelance_db WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_United States.1252';
    DROP DATABASE my_freelance_db;
                     postgres    false            �            1259    16927    messages    TABLE        CREATE TABLE public.messages (
    message_id integer NOT NULL,
    project_id integer NOT NULL,
    sender_id integer NOT NULL,
    message_content text NOT NULL,
    sent_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    parent_id integer
);
    DROP TABLE public.messages;
       public         heap r       postgres    false            �            1259    16926    messages_message_id_seq    SEQUENCE     �   CREATE SEQUENCE public.messages_message_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.messages_message_id_seq;
       public               postgres    false    222                       0    0    messages_message_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.messages_message_id_seq OWNED BY public.messages.message_id;
          public               postgres    false    221            �            1259    16952    notifications    TABLE     �   CREATE TABLE public.notifications (
    notification_id integer NOT NULL,
    user_id integer NOT NULL,
    message text NOT NULL,
    is_read boolean DEFAULT false,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);
 !   DROP TABLE public.notifications;
       public         heap r       postgres    false            �            1259    16951 !   notifications_notification_id_seq    SEQUENCE     �   CREATE SEQUENCE public.notifications_notification_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.notifications_notification_id_seq;
       public               postgres    false    224                        0    0 !   notifications_notification_id_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public.notifications_notification_id_seq OWNED BY public.notifications.notification_id;
          public               postgres    false    223            �            1259    16911    projects    TABLE     �  CREATE TABLE public.projects (
    project_id integer NOT NULL,
    recruiter_id integer NOT NULL,
    title character varying(100) NOT NULL,
    description text NOT NULL,
    budget numeric(10,2),
    deadline date,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    status character varying(20) DEFAULT 'open'::character varying,
    hired_freelancer_id integer
);
    DROP TABLE public.projects;
       public         heap r       postgres    false            �            1259    16910    projects_project_id_seq    SEQUENCE     �   CREATE SEQUENCE public.projects_project_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.projects_project_id_seq;
       public               postgres    false    220            !           0    0    projects_project_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.projects_project_id_seq OWNED BY public.projects.project_id;
          public               postgres    false    219            �            1259    16901    users    TABLE     �   CREATE TABLE public.users (
    user_id integer NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(255) NOT NULL,
    role character varying(20),
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.users;
       public         heap r       postgres    false            �            1259    16900    users_user_id_seq    SEQUENCE     �   CREATE SEQUENCE public.users_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.users_user_id_seq;
       public               postgres    false    218            "           0    0    users_user_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.users_user_id_seq OWNED BY public.users.user_id;
          public               postgres    false    217            k           2604    16930    messages message_id    DEFAULT     z   ALTER TABLE ONLY public.messages ALTER COLUMN message_id SET DEFAULT nextval('public.messages_message_id_seq'::regclass);
 B   ALTER TABLE public.messages ALTER COLUMN message_id DROP DEFAULT;
       public               postgres    false    221    222    222            m           2604    16955    notifications notification_id    DEFAULT     �   ALTER TABLE ONLY public.notifications ALTER COLUMN notification_id SET DEFAULT nextval('public.notifications_notification_id_seq'::regclass);
 L   ALTER TABLE public.notifications ALTER COLUMN notification_id DROP DEFAULT;
       public               postgres    false    223    224    224            h           2604    16914    projects project_id    DEFAULT     z   ALTER TABLE ONLY public.projects ALTER COLUMN project_id SET DEFAULT nextval('public.projects_project_id_seq'::regclass);
 B   ALTER TABLE public.projects ALTER COLUMN project_id DROP DEFAULT;
       public               postgres    false    220    219    220            f           2604    16904    users user_id    DEFAULT     n   ALTER TABLE ONLY public.users ALTER COLUMN user_id SET DEFAULT nextval('public.users_user_id_seq'::regclass);
 <   ALTER TABLE public.users ALTER COLUMN user_id DROP DEFAULT;
       public               postgres    false    218    217    218                      0    16927    messages 
   TABLE DATA           j   COPY public.messages (message_id, project_id, sender_id, message_content, sent_at, parent_id) FROM stdin;
    public               postgres    false    222   1                 0    16952    notifications 
   TABLE DATA           _   COPY public.notifications (notification_id, user_id, message, is_read, created_at) FROM stdin;
    public               postgres    false    224   73                 0    16911    projects 
   TABLE DATA           �   COPY public.projects (project_id, recruiter_id, title, description, budget, deadline, created_at, status, hired_freelancer_id) FROM stdin;
    public               postgres    false    220   T3                 0    16901    users 
   TABLE DATA           N   COPY public.users (user_id, username, password, role, created_at) FROM stdin;
    public               postgres    false    218   r4       #           0    0    messages_message_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.messages_message_id_seq', 22, true);
          public               postgres    false    221            $           0    0 !   notifications_notification_id_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.notifications_notification_id_seq', 1, false);
          public               postgres    false    223            %           0    0    projects_project_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.projects_project_id_seq', 7, true);
          public               postgres    false    219            &           0    0    users_user_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.users_user_id_seq', 17, true);
          public               postgres    false    217            w           2606    16935    messages messages_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.messages
    ADD CONSTRAINT messages_pkey PRIMARY KEY (message_id);
 @   ALTER TABLE ONLY public.messages DROP CONSTRAINT messages_pkey;
       public                 postgres    false    222            y           2606    16961     notifications notifications_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.notifications
    ADD CONSTRAINT notifications_pkey PRIMARY KEY (notification_id);
 J   ALTER TABLE ONLY public.notifications DROP CONSTRAINT notifications_pkey;
       public                 postgres    false    224            u           2606    16920    projects projects_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_pkey PRIMARY KEY (project_id);
 @   ALTER TABLE ONLY public.projects DROP CONSTRAINT projects_pkey;
       public                 postgres    false    220            q           2606    16907    users users_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (user_id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public                 postgres    false    218            s           2606    16909    users users_username_key 
   CONSTRAINT     W   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_key UNIQUE (username);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_username_key;
       public                 postgres    false    218            |           2606    16946     messages messages_parent_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.messages
    ADD CONSTRAINT messages_parent_id_fkey FOREIGN KEY (parent_id) REFERENCES public.messages(message_id);
 J   ALTER TABLE ONLY public.messages DROP CONSTRAINT messages_parent_id_fkey;
       public               postgres    false    222    4727    222            }           2606    16936 !   messages messages_project_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.messages
    ADD CONSTRAINT messages_project_id_fkey FOREIGN KEY (project_id) REFERENCES public.projects(project_id);
 K   ALTER TABLE ONLY public.messages DROP CONSTRAINT messages_project_id_fkey;
       public               postgres    false    4725    222    220            ~           2606    16941     messages messages_sender_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.messages
    ADD CONSTRAINT messages_sender_id_fkey FOREIGN KEY (sender_id) REFERENCES public.users(user_id);
 J   ALTER TABLE ONLY public.messages DROP CONSTRAINT messages_sender_id_fkey;
       public               postgres    false    218    4721    222                       2606    16962 (   notifications notifications_user_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.notifications
    ADD CONSTRAINT notifications_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 R   ALTER TABLE ONLY public.notifications DROP CONSTRAINT notifications_user_id_fkey;
       public               postgres    false    4721    218    224            z           2606    16977 *   projects projects_hired_freelancer_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_hired_freelancer_id_fkey FOREIGN KEY (hired_freelancer_id) REFERENCES public.users(user_id);
 T   ALTER TABLE ONLY public.projects DROP CONSTRAINT projects_hired_freelancer_id_fkey;
       public               postgres    false    218    4721    220            {           2606    16921 #   projects projects_recruiter_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_recruiter_id_fkey FOREIGN KEY (recruiter_id) REFERENCES public.users(user_id);
 M   ALTER TABLE ONLY public.projects DROP CONSTRAINT projects_recruiter_id_fkey;
       public               postgres    false    218    4721    220                 x�u�Mn�0���)x�3$���hw�.��7JDŪ+�d�9R�ыuHEc;KA�{��7(PX���8m�ۃР���DJ�Fe������B'ڗV�](|BL��xk�-
S���g �� �2Hbٵ��<ɧv�W�)&�F @a��S����N��`]�������"�SG��>L���2L��y9W�dI�����0���N���Z]�X����M&�]�ښB#T�0�m>o>~��l6_o���0QP�XEXǨ�7lL�h5Ÿ���x�Ǉ�%���y4����3"Hɚ���}"�����E������D�7h��JH�|?w��,��¨úǏ���Or̲o�Y>O��DN�|#�	9�^!��ʯ�v����%�\�8Z�Ph+��9�y�
�&g��ͫ�s{�~�+ֺ^T��2�����r7߳�O<�pX�1���|�ݷ�E��ǧ\~�A�O�c^�lMLhy���^��b����c�5܏�R��Po"�j�^��q?���>ؒ��w��V5M��^�;            x������ � �           x����m�0�3=��@�eICd_����XI�l_�A�ڃ�?I@���=.B�
�-�Jt�gd�Qi<)S�|�	�C��B��0C�u��&�D;����������ğo�����d��㣲Iz46؍19>�O����2���8�A����>�Hm��-�I�E�Ra����t��ಝǑ��u����4wy���v���*��V������
��m{_\��p��S�������)5�9�矞���J���zֲ(�/᳃         �  x�u�I��H౬"9�0Z�	��46(�WQTD:V_����36�ǹq�N�7�������b^���EӪ���u�9�8��ۡ�?�S7,�;�-���BN�No�&�㲃!f� ���)DT�2H�@^�󼩱�S����њ���$�&v~������4X g��q�/b���P�PN���7���j�]�w�Fe������PT��zd�.�$�C�?H���uve������� dJ�L֩��ޔ4��1��綻���]z0s6+�R��S��Ubk���]j��$��!��@Y�HD�
b����K�;�5����-�I(l6�U���3bP��6��I�z�-�+k�)��L�P�D1����Bo*+�c��t+g�z9T�v�8;b� �᭫M��{I�C`�:ş(�`�@0cL"�M�7��[�3\���[�#�_W~�$��ָWD]���A�ngs��b3�?Q�k% 2�9��#3�ݽ��vپ�����9t�	�fqڨ�~1E�Y�]����5�o�	��+*X�
��`�=������[������fްQ�jI����5����:0�+qb�âk$(Y�P!�^��$u�w�v)���L9���L��>���Od=�w�8���q��99���3E����cJD~�9{S'i��m}�ͩ�zcfɉ��v�4�s.��=L�L�<;��Y����gJ~�(%��}����zr���S�7���c�ʪC�zc/3{�F��8DI���ܓ�~�O	���(�q�������J��l+��V���;p�l��;�}S
����6\�9Z�;�y��w���"
�D	�D@*�����i�Ԝ����ʞ�`�b�ۑ$�S�d����*�tM�z)'�ٹ��ٴ���&��כ��[W�喘���l��q]@B��]S��%��L5}���j���II�9���T�T�� ��y��     