/* 16-08-2020: Done in local, Not done in serever  */
use ymd;
SET SQL_SAFE_UPDATES = 0;
alter table user_details add column reg_otp varchar(10);
alter table user_details add column reg_verified boolean;
alter table user_details add column status varchar(20);
alter table user_withdrawls add column is_done boolean;

alter table ymd.invitations add column to_user_id varchar(20);
alter table ymd.invitations add column provide_mobile varchar(12);
alter table ymd.invitations add column to_user_name varchar(60);
alter table ymd.invitations add column withdraw_req_id int references user_withdrawls(id);
alter table ymd.user_paid_reciept add column withdraw_req_id int references user_withdrawls(id);