-- 5 SQL Commands for Project Database & SQL

-- INSERT
INSERT INTO Groups VALUES('$gID', '$gName');
 -- creates a new group with a given name and a generated gID
INSERT INTO Users VALUES('$username', '$email', '$password');
-- adds a new user

-- UPDATE
UPDATE Groups Set gName = '$gName' WHERE gName = '$old_email';
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
