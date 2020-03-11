create table uploaded_text
(
    id          int auto_increment
        primary key,
    content     text null,
    date        date null,
    words_count int  null
);

create table word
(
    id      int auto_increment
        primary key,
    text_id int         null,
    word    varchar(45) null,
    count   int         not null,
    constraint text_id
        foreign key (text_id) references uploaded_text (id)
);

create index text_id_idx
    on word (text_id);


