use umbookdb;

show tables;

select * from migrations;
select * from users;
select * from circles;
select * from friends;
select * from circle_friend;
select * from friends where user_id = 51;
UPDATE umbookdb.friends SET accepted = '1' WHERE user_id = 51;

