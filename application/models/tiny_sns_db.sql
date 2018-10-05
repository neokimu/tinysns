/**
 * Author:  キム
 * Created: 2018/09/14
 */

CREATE DATABASE tinysns CHARACTER SET utf8 COLLATE utf8_general_ci;

use tinysns;

CREATE TABLE member (
    uq_number int(11) NOT NULL AUTO_INCREMENT,
    id char(20) NOT NULL,
    password varchar(80) NOT NULL,
    email varchar(80) NOT NULL,
    m_photo varchar(100) DEFAULT ,
    profile varchar(500),
    m_category  char(8) NOT NULL,
    unique (uq_number),
    PRIMARY KEY (id)
);

CREATE TABLE post (
    p_number int(11) NOT NULL AUTO_INCREMENT,
    id varchar(20) NOT NULL,
    title varchar(100) NOT NULL,
    p_photo varchar(100),
    m_photo varchar(100),
    p_text varchar(500)NOT NULL,
    p_category char(6) NOT NULL,
    like_num int(11) DEFAULT 0,
    p_date datetime NOT NULL,
    PRIMARY KEY (p_number),
    CONSTRAINT post_fk FOREIGN KEY (id) REFERENCES member (id) ON DELETE CASCADE
    CONSTRAINT post_fk_2 FOREIGN KEY (m_photo) REFERENCES member (m_photo) ON DELETE CASCADE
);

CREATE TABLE friends (   
    id varchar(20) NOT NULL, 
    request_id varchar(500),
    freiends_id varchar(500),
    PRIMARY KEY (id),
    CONSTRAINT friends_fk FOREIGN KEY (id) REFERENCES member(id)
);

/**
 * テストデータ
 * Created: 2018/09/14
 */

INSERT INTO member VALUES (null, 'test1', 'test', 'test1@test.com', 'test1.jpg', 'テストです。', '1,3');    
INSERT INTO member VALUES (null, 'test2', 'test', 'test2@test.com', 'test2.jpg', 'テストです。', '2,5');    
INSERT INTO member VALUES (null, 'test3', 'test', 'test3@test.com', 'test3.jpg', 'テストです。', '1');    
INSERT INTO member VALUES (null, 'test4', 'test', 'test4@test.com', 'test4.jpg', 'テストです。', '3');    
INSERT INTO member VALUES (null, 'test5', 'test', 'test5@test.com', 'test5.jpg', 'テストです。', '2');    
INSERT INTO member VALUES (null, 'test6', 'test', 'test6@test.com', 'test6.jpg', 'テストです。', '6');    
INSERT INTO member VALUES (null, 'test7', 'test', 'test7@test.com', 'test7.jpg', 'テストです。', '4,6');    
INSERT INTO member VALUES (null, 'test8', 'test', 'test8@test.com', 'test8.jpg', 'テストです。', '5');    
INSERT INTO member VALUES (null, 'test9', 'test', 'test9@test.com', 'test9.jpg', 'テストです。', '1,2');    
INSERT INTO member VALUES (null, 'test10', 'test', 'test10@test.com', 'test10.jpg', 'テストです。', '4');   