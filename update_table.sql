SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `tabel_maintenance`
ADD COLUMN `monitor` int(1) NULL,
ADD COLUMN `keyboard` int(1) NULL,
ADD COLUMN `mouse` int(1) NULL,
ADD COLUMN `memory` int(1) NULL,
ADD COLUMN `hdd` int(1) NULL,
ADD COLUMN `processor` int(1) NULL,
ADD COLUMN `ups` int(1) NULL;

SET FOREIGN_KEY_CHECKS = 1;