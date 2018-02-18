CREATE TABLE `%prefix%views` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` INT(11) UNSIGNED NULL DEFAULT NULL,
  `post_id` INT(11) UNSIGNED NULL DEFAULT NULL,
  `timestamp` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
  COLLATE='utf8_general_ci'
;