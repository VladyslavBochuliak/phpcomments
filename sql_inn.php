<?
CREATE TABLE `comments` (
`id` int auto_increment primary key,
`name` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
`file` varchar(255) NOT NULL,
`subject` varchar(255) NOT NULL,
`submittime` datetime NOT NULL,
`status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;