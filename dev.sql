create table blogs
(
    blog_pk  int(11) unsigned auto_increment
        primary key,
    title    varchar(255) not null,
    content  text         not null,
    category int(11) unsigned null
);

create table blog_categories
(
    pk           int(11) unsigned auto_increment
        primary key,
    categoryName varchar(255) null
);

alter table blogs alter column category set default 1;
alter table blogs
    add constraint blogs_blog_categories__fk
        foreign key (category) references blog_categories (pk)
            on update cascade on delete cascade;