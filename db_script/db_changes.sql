/* 16-08-2020: Done in local, done in serever  */
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
alter table ymd.invitations add column withdraw_req_id int references user_withdrawls(id);
alter table ymd.user_paid_reciept add column withdraw_req_id int references user_withdrawls(id);

/* 29-08-2020: Done in local, Not done in serever  */
alter table ymd.invitations add column status varchar(20) after to_user_name; 
alter table ymd.user_paid_reciept add column invitation_id int references invitations(id);
alter table ymd.user_details add column role varchar(20);

/*31-08-2020: Done in local , Done in server */
# clean database
delete from invitations;
delete from user_withdrawls;
delete FROM user_wallet_credit;
delete from user_wallet_concat;
delete from user_paid_reciept;
delete from user_login;
delete from user_kyc;
delete from user_details;
delete from user_basic;
delete from invitations;

truncate table ymd.user_withdrawls;
truncate table ymd.user_wallet_credit;
truncate table user_wallet_concat;
truncate table user_paid_reciept;
truncate table invitations;
truncate table user_login;
truncate table user_kyc;
truncate table user_details;
truncate table user_basic;

ALTER TABLE user_details AUTO_INCREMENT = 1;
ALTER TABLE user_basic AUTO_INCREMENT = 1;
ALTER TABLE user_login AUTO_INCREMENT = 1;
ALTER TABLE user_kyc AUTO_INCREMENT = 1;

INSERT INTO `ymd`.`user_details` (`full_name`, `email`, `mobile`, `sponsor_id`, `spill_id`, `login_id`, `password`, `is_active`, `reg_verified`, `status`, `role`) VALUES ('Admin', 'admin@email.com', '9703111903', '0', '0', 'YMD6239827', '123456', '1', '1', 'ACTIVE', 'ROLE_ADMIN');

/*01-09-2020: Done in local , Not Done in server */
UPDATE `ymd`.`user_details` SET `side` = 'master' WHERE (`id` = '1');
