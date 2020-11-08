/* 16-08-2020: Done in local, done in serever  */
#utf8mb4_0900_ai_ci
#utf8mb4_general_ci
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

/*01-09-2020: Done in local ,  Done in server */
UPDATE `ymd`.`user_details` SET `side` = 'master' WHERE (`id` = '1');
create table user_rewards(id int auto_increment primary key,
login_id varchar(20),full_name varchar(200),mobile varchar(15),
level_id int references levels(id),amount double,status varchar(20)
);


/*11-09-2020: Done in local ,  Not Done in server */
ALTER TABLE `ymd`.`user_details` ADD UNIQUE INDEX `login_id_UNIQUE` (`login_id` ASC) VISIBLE;
;
drop table `user_details_old`;
CREATE TABLE `user_details_old` (
  `delete_id` int not null primary key auto_increment,
  `id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `sponsor_id` int DEFAULT NULL,
  `spill_id` int DEFAULT NULL,
  `login_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address_1` text,
  `address_2` text,
  `acc_name` varchar(50) DEFAULT NULL,
  `acc_no` varchar(50) DEFAULT NULL,
  `ifsc` varchar(50) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `Gpay` varchar(50) DEFAULT NULL,
  `PhonePe` varchar(50) DEFAULT NULL,
  `PayTm` varchar(50) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `is_active` int NOT NULL,
  `side` varchar(10) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `reg_otp` varchar(10) DEFAULT NULL,
  `reg_verified` tinyint(1) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `deleted_date` datetime NOt null default current_timestamp,
  `delete_status` varchar(20)
);
drop trigger user_details_deleted_moved;
CREATE TRIGGER user_details_deleted_moved 
AFTER DELETE ON user_details
FOR EACH ROW
  INSERT INTO user_details_old(
    id,
    full_name,
    email,
    mobile,
    sponsor_id,
    spill_id,
    login_id,
    password,
    address_1,
    address_2,
    acc_name,
    acc_no,
    ifsc,
    bank_name,
    Gpay,
    PhonePe,
    PayTm,
    date_created,
    is_active,
    side,
    city,
    state,
    position,
    reg_otp,
    reg_verified,
    status,
    role,
    delete_status
    ) VALUES (
OLD.id,
OLD.full_name,
OLD.email,
OLD.mobile,
OLD.sponsor_id,
OLD.spill_id,
OLD.login_id,
OLD.password,
OLD.address_1,
OLD.address_2,
OLD.acc_name,
OLD.acc_no,
OLD.ifsc,
OLD.bank_name,
OLD.Gpay,
OLD.PhonePe,
OLD.PayTm,
OLD.date_created,
OLD.is_active,
OLD.side,
OLD.city,
OLD.state,
OLD.position,
OLD.reg_otp,
OLD.reg_verified,
OLD.status,
OLD.role,
'BLOCKED'
);

drop trigger invitations_deleted_moved;
CREATE TRIGGER invitations_deleted_moved 
AFTER DELETE ON invitations
FOR EACH ROW
INSERT INTO `invitations_old`
(
`id`,
`to_mobile`,
`provide_help_id`,
`provide_help_name`,
`date_sent`,
`to_user_id`,
`provide_mobile`,
`to_user_name`,
`status`,
`withdraw_req_id`,
`delete_status`)
VALUES
(
OLD.id ,
OLD.to_mobile ,
OLD.provide_help_id ,
OLD.provide_help_name ,
OLD.date_sent ,
OLD.to_user_id ,
OLD.provide_mobile ,
OLD.to_user_name ,
OLD.status ,
OLD.withdraw_req_id ,
'EXPIRED');


alter table user_wallet_credit add column txn_type char(6) default null;
alter table user_wallet_credit add column is_done tinyint;
alter table user_wallet_credit add column casue_type varchar(10);
alter table user_wallet_credit add column casue_type varchar(10);
alter table user_wallet_credit add column cause_user_id int;
alter table user_wallet_credit add column cause_full_name int;
alter table user_wallet_credit rename user_wallet_txn;

/*18-10-2020: Done in local ,  Not Done in server */
drop table user_details_old;
CREATE TABLE `user_details_old` (
  `delete_id` int NOT NULL AUTO_INCREMENT,
  `id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `sponsor_id` int DEFAULT NULL,
  `spill_id` int DEFAULT NULL,
  `login_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address_1` text,
  `address_2` text,
  `acc_name` varchar(50) DEFAULT NULL,
  `acc_no` varchar(50) DEFAULT NULL,
  `ifsc` varchar(50) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `Gpay` varchar(50) DEFAULT NULL,
  `PhonePe` varchar(50) DEFAULT NULL,
  `PayTm` varchar(50) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `is_active` int NOT NULL,
  `side` varchar(10) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `reg_otp` varchar(10) DEFAULT NULL,
  `reg_verified` tinyint(1) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `lvl_id` varchar(45) DEFAULT NULL,
  `reward_id` int DEFAULT NULL,
  `royalty_id` int DEFAULT NULL,
  `expired_date` datetime DEFAULT NULL,
  `txn_password` varchar(45) DEFAULT NULL,
  `kyc_done` tinyint DEFAULT '0',
  `deleted_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`delete_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*11-08-2020: Done in local ,  Not Done in server */
CREATE TABLE `housefull_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `login_id` varchar(20) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `cr_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `royalty_added` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
