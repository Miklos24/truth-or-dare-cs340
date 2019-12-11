--SQL Triggers

--Triggers to increment group members when a group is joined.
DELIMITER //

CREATE TRIGGER joinGroup 
AFTER INSERT ON `MemberOf`
FOR EACH ROW
BEGIN
UPDATE `Groups` G
SET G.numMembers = G.numMembers + 1
WHERE new.gID = G.gID;
END //

DELIMITER ;

DELIMITER //

CREATE TRIGGER leaveGroup 
AFTER DELETE ON `MemberOf`
FOR EACH ROW
BEGIN
UPDATE `Groups` G
SET G.numMembers = G.numMembers - 1
WHERE old.gID = G.gID;
END //

DELIMITER ;

--Trigger to increment the number of times a dare or truth was used

DELIMITER //

CREATE TRIGGER truthResponse 
AFTER INSERT ON `TruthResponses`
FOR EACH ROW
BEGIN
UPDATE `TruthPrompts` T
SET T.num_responses = T.num_responses + 1
WHERE new.tID = T.tID;
END //

DELIMITER ;


DELIMITER //

CREATE TRIGGER dareResponse 
AFTER INSERT ON `DareResponses`
FOR EACH ROW
BEGIN
UPDATE `DarePrompts`D
SET D.num_responses = D.num_responses + 1
WHERE new.dID = D.dID;
END //

DELIMITER ;