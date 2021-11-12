

ALTER TABLE `teambuilder`.`members`
    ADD COLUMN `statu` INT(11) NOT NULL;
    
ALTER TABLE `teambuilder`.`members`
ALTER `statu` SET DEFAULT 0;
