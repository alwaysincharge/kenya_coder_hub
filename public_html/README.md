# Friday Camp - A hub for Kenyan programmers (Written from scratch in PHP 7).

With Friday Camp, you can create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.

All non-API code was written from scratch.



## Features.

1. Create, edit, and delete posts.

2. Create and edit user accounts user accounts.

3. Search for posts or users.

4. Message users.

5. Receive notifications when others message you or interact with your content. (Powered by Ajax).

6. Email users when they sign up or when they need to recover a forgotten password. (Powered by PHP Mailer).

7. View popular posts or all posts.

8. Change profile pictures.



### Homepage

Visit the hosted site at [Friday Camp](http://fridaycamp.com/home).



## SQL tables.

```
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






```


