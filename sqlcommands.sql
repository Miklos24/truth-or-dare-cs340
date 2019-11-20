-- 5 SQL Commands for Project Database & SQL

-- INSERT
INSERT INTO Groups VALUES( NULL, '$gName');
 -- creates a new group with a given name and a generated gID
INSERT INTO Users VALUES('$username', '$email', '$password');
-- adds a new user

-- UPDATE
UPDATE Groups Set gName = '$gName' WHERE gName = '$old_gName';
-- changes the groups name

-- SELECT(s)
SELECT M.username
From MemberOf M
NATURAL JOIN Groups G
WHERE G.gName = 'randomGroupName';
-- Gives usernames of users that are a memberOf 'randomGroupName'

SELECT username, email
FROM Users;
-- returns all usersnames and emails of Users

SELECT daretext, dare_pt_value, author
FROM dareprompt
NATURAL JOIN Dare-Group
NATURAL JOIN Groups G
WHERE G.gName = "anotherRandomGroupName";
-- Select all dare prompts from a groups

-- Select top 10 dare or truth prompts

-- Select dare responses that corespond to a dareprompt and group ID

-- Same as above but for truths

-- And the two above where it doesnt matter what the group ID is.


-- VIEW, TRIGGER, FUNCTION, or PROCEDURE

-- This is a trigger from class example
-- CREATE TRIGGER 'check_products' (IN cost Decimal(10,2), IN price Decimal(10,2))
-- Begin
--   IF cost < 0 THEN
--     SIGNAL SQLSTATE'45000' -- SQLSTATE 45000s are error messages we can write our selves. Before that they are reserved
--     SET message_text = 'check constraint on products.cost failed';
--   END IF;
--
--   IF price < 0 THEN
--     SIGNAL sqlstate '45001'
--     SET message_text = 'check constraint on products.price failed';
--   END IF;
--
--   IF price < cost THEN
--     SIGNAL SQLSTATE '45002'
--     SET Message_text = 'check constraint on products.price < products.cost';
--   END IF;
-- END;
