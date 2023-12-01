# NOTE
Make sure the folder name is 'Faculty_Website' so that the base_url works

# we-faculty
For Web Engineering Website

# facility table
CREATE TABLE faci2(
  id INT NOT NULL AUTO_INCREMENT,
  fName VARCHAR(100) NOT NULL,
  fDes LONGTEXT NOT NULL,
  fImageName VARCHAR(100) NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

# insert data into faci2
INSERT INTO `faci2`(`id`, `fName`, `fDes`, `fImageName`) VALUES ('7','Graphic Lab','A training lab that can fit 35 PC and located at Labuan Campus','1656504725graphic-scaled.jpg')
INSERT INTO `faci2`(`id`, `fName`, `fDes`, `fImageName`) VALUES ('8','Games Lab','A training lab that can fit 35 PC and located at Labuan Campus','1656504762games-scaled.jpg')
INSERT INTO `faci2`(`id`, `fName`, `fDes`, `fImageName`) VALUES ('9','Windows Lab','A training lab that can fit 35 PC and located at Labuan Campus','1656504783windows.jpg')
INSERT INTO `faci2`(`id`, `fName`, `fDes`, `fImageName`) VALUES ('10','Solaris Lab','A training lab that can fit 30 PC and located at Labuan Campus','1656504803solaris-scaled.jpg')
INSERT INTO `faci2`(`id`, `fName`, `fDes`, `fImageName`) VALUES ('11','Recording Audio Studio','A post-production studio that can fit 5 people and located at Labuan Campus.','1656504824audio-scaled.jpg')
INSERT INTO `faci2`(`id`, `fName`, `fDes`, `fImageName`) VALUES ('12','Video Editing Studio','A post production studio with 2 PC that can fit 5 person and is located at Labuan Campus.','1656504847video-scaled.jpg')
INSERT INTO `faci2`(`id`, `fName`, `fDes`, `fImageName`) VALUES ('13','Animation Studio','A media studio that can fit 10 people and locate at Labuan Campus.','1656504910animation.jpg')
INSERT INTO `faci2`(`id`, `fName`, `fDes`, `fImageName`) VALUES ('14','Digital Marker Hub','A training/research lab that can fit 40 people and located at UMS Campus.','1656504928marker.jpg')
INSERT INTO `faci2`(`id`, `fName`, `fDes`, `fImageName`) VALUES ('15','HAINA','A training/research lab that can fit 25 people and located at UMS Campus.','1656504955haina-late-4.jpg')
INSERT INTO `faci2`(`id`, `fName`, `fDes`, `fImageName`) VALUES ('17','Bilik Tayangan','A discussion room that has a capacity of 5 pax and is located at Labuan Campus.','1656652818tayang-2.jpg')

# usertable
CREATE TABLE user1(
  userID INT NOT NULL UNIQUE,
  userLastName VARCHAR(50) NOT NULL,
  userFirstName VARCHAR(50) NOT NULL,
  role INT NOT NULL,
  phone VARCHAR(15) NOT NULL,
  email VARCHAR(50) NOT NULL,
  icNumber VARCHAR(14) NOT NULL,
  password VARCHAR(20) NOT NULL,
  courseID varchar(11),
  userPic mediumblob

  PRIMARY KEY(userID)
  FOREIGN KEY(courseID) REFERENCES course(`courseID`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Remind
1) To access private control (after login as students/user)
   In every constructor of ur module controller add the below code
   *for student
   if($this->session->userdata('verified') != 1){
			redirect(base_url('login'));
		}
   *for admin
   if($this->session->userdata('verified') != 2){
			redirect(base_url('login'));
		}
2) Basically everyone of us need to create 2 view for user
   Like if ur module is only for students, then u need 1 view that allow students to do the thing, and 1 view for admin view only.
   As to do that "view only" file:
   1)Go to controller->NormalViewPage.php, create a new functionto do manage the display only, u can refer to mine [displayFacility()], and for this u need to create a
     new view file
   3)Go to config->route.php, create a route  $route['urlULike']['GET'] = ['NormalViewPage/urdisplayfunctionname'];
   4)Last step, go to view->headerAfterLogin, modify the nav bar down there, the base url should be like this base_url('urlULike'), so whenever a user click on that
     link, the route view bring that user to the NormalViewPage controller and call the function urdisplayfunctionname, which will bring to the view only page
     
   **for reference only, if u have ur idea and it worked well and didn't affect others' work, then u may do so
   
   
