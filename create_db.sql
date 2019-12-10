CREATE TABLE IF NOT EXISTS Groups (
    gID int NOT NULL AUTO_INCREMENT,
    gName char(20) NOT NULL,
    owner char(20) NOT NULL,
    numMembers int NOT NULL,
    PRIMARY KEY(gID)
);

CREATE TABLE IF NOT EXISTS MemberOf (
    username char(20) NOT NULL,
    gID int NOT NULL,
    num_pts int DEFAULT NULL,
    PRIMARY KEY(username, gID)
);

CREATE TABLE IF NOT EXISTS Users (
    username char(20) NOT NULL,
    email varchar(320) NOT NULL UNIQUE,
    password varchar(100) NOT NULL,
    salt varchar(30) NOT NULL,
    PRIMARY KEY(username)
);

CREATE TABLE IF NOT EXISTS DarePrompts (
    dID int NOT NULL AUTO_INCREMENT,
    dare_pt_val int DEFAULT 0,
    dare_text TINYTEXT NOT NULL,
    num_responses int NOT NULL,
    author char(20) NOT NULL,
    PRIMARY KEY(dID)
);

CREATE TABLE IF NOT EXISTS TruthPrompts (
    tID int NOT NULL AUTO_INCREMENT,
    truth_pt_val int DEFAULT 0,
    truth_text TINYTEXT NOT NULL,
    num_responses int NOT NULL,
    author char(20) NOT NULL,
    PRIMARY KEY(tID)
);

CREATE TABLE IF NOT EXISTS DareResponses (
    dID int NOT NULL,
    responder char(20) NOT NULL,
    pictureURL varchar(2083) NOT NULL,
    upvotes int NOT NULL,
    PRIMARY KEY(dID, responder)
);

CREATE TABLE IF NOT EXISTS TruthResponses (
    tID int NOT NULL,
    responder char(20) NOT NULL,
    response_text text NOT NULL,
    upvotes int NOT NULL,
    PRIMARY KEY(tID, responder)
);

CREATE TABLE IF NOT EXISTS DareGroup (
    dID int NOT NULL,
    gID int NOT NULL,
    PRIMARY KEY(dID, gID)
);

CREATE TABLE IF NOT EXISTS TruthGroup (
    tID int NOT NULL,
    gID int NOT NULL,
    PRIMARY KEY(tID, gID)
);

ALTER TABLE Groups
	ADD CONSTRAINT FK_Groups_Users
    FOREIGN KEY (owner) REFERENCES Users(username);

ALTER TABLE MemberOf
    ADD CONSTRAINT FK_MemberOf_Users
    FOREIGN KEY (username) REFERENCES Users(username),
    ADD CONSTRAINT FK_MemberOf_Groups
    FOREIGN KEY (gID) REFERENCES Groups(gID);

ALTER TABLE DarePrompts
    ADD CONSTRAINT FK_DarePrompts_Users
    FOREIGN KEY (author) REFERENCES Users(username);

ALTER TABLE DareResponses
    ADD CONSTRAINT FK_DareResponses_DarePrompts
    FOREIGN KEY (dID) REFERENCES DarePrompts(dID),
    ADD CONSTRAINT FK_DareResponses_Users
    FOREIGN KEY (responder) REFERENCES Users(username);

ALTER TABLE TruthPrompts
    ADD CONSTRAINT FK_TruthPrompts_Users
    FOREIGN KEY (author) REFERENCES Users(username);

ALTER TABLE TruthResponses
    ADD CONSTRAINT FK_TruthResponses_TruthPrompts
    FOREIGN KEY (tID) REFERENCES TruthPrompts(tID),
    ADD CONSTRAINT FK_TruthResponses_Users
    FOREIGN KEY (responder) REFERENCES Users(username);

ALTER TABLE DareGroup
    ADD CONSTRAINT FK_DareGroups_DarePrompts
    FOREIGN KEY (dID) REFERENCES DarePrompts(dID),
    ADD CONSTRAINT FK_DareGroups_Groups
    FOREIGN KEY (gID) REFERENCES Groups(gID);

ALTER TABLE TruthGroup
    ADD CONSTRAINT FK_TruthGroups_TruthPrompts
    FOREIGN KEY (tID) REFERENCES TruthPrompts(tID),
    ADD CONSTRAINT FK_TruthGroups_Groups
    FOREIGN KEY (gID) REFERENCES Groups(gID);
