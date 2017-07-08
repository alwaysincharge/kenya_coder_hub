

CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentowner` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `body` text NOT NULL,
  `code` text NOT NULL,
  `link` text NOT NULL,
  `precise` datetime NOT NULL,
  `ready` text NOT NULL,
  `postowner` text NOT NULL,  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `code` text NOT NULL,
  `link` text NOT NULL,
  `owner` int(11) NOT NULL,
  `precise` datetime NOT NULL,  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `message` text NOT NULL,
  `receiver` int(11) NOT NULL,
  `ready` text NOT NULL,
  `conversation` text NOT NULL,  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE `reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `replyowner` int(11) NOT NULL,
  `commentid` int(11) NOT NULL,
  `body` text NOT NULL,
  `link` text NOT NULL,
  `code` text NOT NULL,
  `precise` datetime NOT NULL,
  `ready` text NOT NULL,
  `commentowner` text NOT NULL,  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE `save` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forumid` int(11) NOT NULL,
  `saver` int(11) NOT NULL,  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img_path` varchar(500) NOT NULL,
  `img_name` varchar(500) NOT NULL,
  `img_type` varchar(500) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `story` text NOT NULL,
  `skill1` text NOT NULL,
  `skill2` text NOT NULL,
  `skill3` text NOT NULL,
  `skill4` text NOT NULL,
  `skill5` text NOT NULL,
  `skill6` text NOT NULL,
  `skill7` text NOT NULL,
  `skill8` text NOT NULL,
  `project1` text NOT NULL,
  `project2` text NOT NULL,
  `project3` text NOT NULL,
  `project4` text NOT NULL,
  `link1` text NOT NULL,
  `link2` text NOT NULL,
  `link3` text NOT NULL,
  `link4` text NOT NULL,
  `desc1` text NOT NULL,
  `desc2` text NOT NULL,
  `desc3` text NOT NULL,
  `desc4` text NOT NULL,
  `school1` text NOT NULL,
  `school2` text NOT NULL,
  `school3` text NOT NULL,
  `school4` text NOT NULL,
  `diplo1` text NOT NULL,
  `diplo2` text NOT NULL,
  `diplo3` text NOT NULL,
  `diplo4` text NOT NULL,
  `learn1` text NOT NULL,
  `learn2` text NOT NULL,
  `learn3` text NOT NULL,
  `learn4` text NOT NULL,  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
