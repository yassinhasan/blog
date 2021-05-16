<?php

/* 
                  ### blog tables ###

/-              users table

    /--- userid  primarykey int 11 
    /--- usergroupid int
    /--- firstname varchar 40 
    /--- last varchar 40 
    /--- email varchar 96 
    /--- password varchar 40 
    /--- gender varchar 5
    /--- birthday int
    /--- image varchar 40 
    /--- created int
    /--- status varchar 20 
    /--- ip varchar 32

/-              users group table

    /-- id int primary key
    /-- name varchar 40


/-              users group permession for permession

    /-- id int primary key
    /-- usergroup id 
    /-- rules text

/-              users online

    /-- id primary key
    /-- userid int
    /-- lastactivity

/-              category table
    /-- id int primary key
    /-- name varchar
    /-- parent_id

/-              posts table  

    /-- id 
    /-- title name varchar
    /-- categoryid
    /-- userid
    /-- details text
    /--  image text
    /--  tags text
    /--  related_posts text
    /--  views int
    /--  status varchar
    /--  cretaed int

/-              comments table  

    /-- id 
    /-- comment text
    /-- userid
    /-- postid
    /--  views int
    /--  status varchar
    /--  cretaed int

   
/-              settings table 

    /-- id 
    /-- key varchar 40
    /-- value text

/-              ads table  

    /-- id 
    /-- link text
    /-- page tect
    /-- image text
    /-- startin int
    /-- end in int


/-              contact us table  

    /-- id 
    /-- name text
    /-- useid 
    /-- email varchar
    /-- message text
    /-- phone varchar 40
    /-- subject varchar
    /-- message text


*/
