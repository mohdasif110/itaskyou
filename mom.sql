	
INSERT INTO `ity_api_mom` (`momName`, `createdDate`, `modifiedDate`, `createdBy`) VALUES 
('mom1', '2016-09-27', '2016-09-27 00:00:00', '1'), 
('mom2', '2016-09-27', '2016-09-27 00:00:00', '1'), 
('mom3', '2016-09-27', '2016-09-27 00:00:00', '1'), 
('mom5', '2016-09-27', '2016-09-27 00:00:00', '1'), 
('mom5', '2016-09-27', '2016-09-27 00:00:00', '1'), 
('mom6', '2016-09-27', '2016-09-27 00:00:00', '1'), 
('mom7', '2016-09-27', '2016-09-27 00:00:00', '1'), 
('mom8', '2016-09-27', '2016-09-27 00:00:00', '1'), 
('mom9', '2016-09-27', '2016-09-27 00:00:00', '1');


INSERT INTO `ity_api_mom_participant` (`userID`, `momID`) VALUES 
('1', '1'),
('3', '1'),
('4', '1'),
('5', '1'),
('6', '1'),
('1', '2'),
('3', '2'),
('4', '3'),
('5', '3'),
('6', '3'),
('2', '3');

INSERT INTO `ity_api_mom_observation` (`momID`, `observationName`, `observationDescription`, `createdDate`, `modifiedDate`, `createdBy`) VALUES 
('1', 'this is the test7', 'Task', '2016-09-27', '2016-09-27 00:00:00', '1'),
('2', 'this is the test8', 'asdasd asdasd1', '2016-09-27', '2016-09-27', '1'),
('2', 'this is the test9', 'asdasd asdasd2', '2016-09-27', '2016-09-27', '1'),
('3', 'this is the test10', 'asdasd asdasd3', '2016-09-27', '2016-09-27', '1'),
('3', 'this is the test11', 'asdasd asdasd4', '2016-09-27', '2016-09-27', '1'),
('1', 'this is the test12', 'asdasd asdasd5', '2016-09-27', '2016-09-27', '1');

	
INSERT INTO `ity_api_tasks` (`taskName`, `taskDescription`, `allotmentDate`, `orginatorID`, `recieverID`, `ccID`, `tagID`, `revisedDate`, `dueDate`, `taskType`, `funtionalityType`, `funcationlityTypeID`, `status`) VALUES 
('mom Task name3', 'this is the mom task description2','2016-09-27', '1', '2,3,4', '5,6','26,27,28', null, '2016-09-30', 1,4,1,1),
('mom Task name2', 'this is the mom task description2','2016-09-27', '1', '2,3,4', '5,6','26,27,28', null, '2016-09-30', 1,4,1,1);



	


