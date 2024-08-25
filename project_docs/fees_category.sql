ALTER TABLE `class_fees_setting` CHANGE `fees_id` `fees_category_id` INT NULL DEFAULT NULL;
ALTER TABLE `student_fees_details` CHANGE `fees_id` `fees_category_id` INT(11) NULL DEFAULT NULL;