Acreate table User
(
    Fname VARCHAR(32) NOT NULL,
    Lname VARCHAR(32) NOT NULL,
    Admin BOOLEAN NOT NULL,
    User_id VARCHAR(32) NOT NULL Primary key,
    Age INT NOT NULL,
    Email VARCHAR(32) NOT NULL
);
create table Band
(
    Band_Name VARCHAR(32) NOT NULL,
    Band_id VARCHAR(32) NOT NULL Primary key,
    Formation_Date DATE NOT NULL,
    Breakup_Date Date
);
create table Album
(
    Album VARCHAR(32) NOT NULL,
    Band_id VARCHAR(32) NOT NULL,
    Year_Released INT NOT NULL,
    Record_Label VARCHAR(32) NOT NULL,
    Album_id VARCHAR(32) NOT NULL Primary key

);
create table Member
(
    Fname VARCHAR(32) NOT NULL,
    Lname VARCHAR(32) NOT NULL

);
create table Song
(
    Name VARCHAR(32) NOT NULL,
    Duration TIME NOT NULL,
    Year_Released INT NOT NULL,
    Band_id VARCHAR(32) NOT NULL,
    Album VARCHAR(32),
    Song_id VARCHAR(32) NOT NULL Primary key

);
create table Performance
(
    Venue_id VARCHAR(32) NOT NULL,
    Band_id VARCHAR(32) NOT NULL,
    Performance_date DATE NOT NULL,
    Duration TIME NOT NULL,
    Performance_id VARCHAR(32) NOT NULL Primary key

);
create table Venue
(
    Name VARCHAR(32) NOT NULL,
    Address VARCHAR(32) NOT NULL,
    City VARCHAR(32) NOT NULL,
    State VARCHAR(32) NOT NULL,
    Date_opened VARCHAR(32) NOT NULL,
    Date_closed VARCHAR(32),
    Venue_id VARCHAR(32) NOT NULL Primary key

);

create table FavoriteBands
(
    User_id VARCHAR(32) NOT NULL,
    Band_id VARCHAR(32) NOT NULL
);
create table ShowsAttended
(
    User_id VARCHAR(32) NOT NULL,
    Performance_id VARCHAR(32) NOT NULL
);
create table BandMembers
(
    Band_id VARCHAR(32) NOT NULL,
    Member_fname VARCHAR(32) NOT NULL,
    Member_lname VARCHAR(32) NOT NULL,
    Years_active INT NOT NULL,
    Instrument VARCHAR(32) NOT NULL
);
create table Setlist
(
    Performance_id VARCHAR(32) NOT NULL,
    Song_id VARCHAR(32) NOT NULL
);
create table AlbumTracks
(
    Album_id VARCHAR(32) NOT NULL,
    Song_id VARCHAR(32) NOT NULL
);


create table BandComments
(
    Band_id VARCHAR(32) NOT NULL,
    User_id VARCHAR(32) NOT NULL,
    Comment VARCHAR(128) NOT NULL,
    Count_id INT NOT NULL
);
create table PerformanceComments
(
    Performance_id VARCHAR(32) NOT NULL,
    User_id VARCHAR(32) NOT NULL,
    Comment VARCHAR(128) NOT NULL,
    Count_id INT NOT NULL
);



---------------------- INSERTING INFO INTO USER ----------------------


INSERT INTO User (Fname,Lname,Admin,User_id,Age,Email)
    VALUES('Kris', 'Smith',TRUE,'e9302049',34,'ksmith@gmail.com' );
INSERT INTO User (Fname,Lname,Admin,User_id,Age,Email)
    VALUES('Rudy', 'Hawkins',FALSE,'e8603543',43,'Rhawkins@gmail.com' );
INSERT INTO User (Fname,Lname,Admin,User_id,Age,Email)
    VALUES('Sky', 'Gibson',FALSE,'e1029472',22,'Sgibson@gmail.com' );
INSERT INTO User (Fname,Lname,Admin,User_id,Age,Email)
    VALUES('Brice', 'Fraser',FALSE,'e9475934',28,'Bfraser@gmail.com' );
INSERT INTO User (Fname,Lname,Admin,User_id,Age,Email)
    VALUES('Aaron', 'Patel',FALSE,'e8462344',48,'Apatel@gmail.com' );
INSERT INTO User (Fname,Lname,Admin,User_id,Age,Email)
    VALUES('Drew', 'Roberson',FALSE,'e3959303',54,'Droberson@gmail.com' );
INSERT INTO User (Fname,Lname,Admin,User_id,Age,Email)
    VALUES('Alexis', 'Brennan',TRUE,'e4857293',58,'Abrennan@gmail.com' );
INSERT INTO User (Fname,Lname,Admin,User_id,Age,Email)
    VALUES('Lane', 'Tucker',FALSE,'e9475734',41,'Ltucker@gmail.com' );
INSERT INTO User (Fname,Lname,Admin,User_id,Age,Email)
    VALUES('Hayden', 'Erickson',FALSE,'e4757434',36,'Herickson@gmail.com' );
INSERT INTO User (Fname,Lname,Admin,User_id,Age,Email)
    VALUES('Stephen', 'Hodges',FALSE,'e8473645',39,'Shodges@gmail.com' );

---------------------- INSERTING BANDS ----------------------

INSERT INTO Band (Band_Name,Band_id,Formation_Date,Breakup_Date)
    Values('The Beatles','b4732','1957-3-2','1970-3-1');
INSERT INTO Band (Band_Name,Band_id,Formation_Date,Breakup_Date)
    Values('Black Sabbath','b3850','1968-6-3','2017-4-16');
INSERT INTO Band (Band_Name,Band_id,Formation_Date,Breakup_Date)
    Values('Led Zeppelin','b4654','1968-9-5','1980-10-4');
INSERT INTO Band (Band_Name,Band_id,Formation_Date,Breakup_Date)
    Values('The Rolling Stones','b1028','1962-1-6',NULL);
INSERT INTO Band (Band_Name,Band_id,Formation_Date,Breakup_Date)
    Values('Pink Floyd','b9853','1965-12-3','2014-7-6');
INSERT INTO Band (Band_Name,Band_id,Formation_Date,Breakup_Date)
    Values('Guns N Roses','b8796','1985-7-6',NULL);
INSERT INTO Band (Band_Name,Band_id,Formation_Date,Breakup_Date)
    Values('Metallica','b5840','1981-5-6',NULL);
INSERT INTO Band (Band_Name,Band_id,Formation_Date,Breakup_Date)
    Values('Aerosmith','b5769','1970-8-7',NULL);
INSERT INTO Band (Band_Name,Band_id,Formation_Date,Breakup_Date)
    Values('AC/DC','b0505','1973-6-5',NULL);
INSERT INTO Band (Band_Name,Band_id,Formation_Date,Breakup_Date)
    Values('Green Day','b3829','1986-4-2',NULL);
INSERT INTO Band (Band_Name,Band_id,Formation_Date,Breakup_Date)
    Values('Ramones','b2234','1974-4-4','1996-1-9');


---------------------- INSERTING ALBUMS ----------------------

INSERT INTO Album(Album,Band_id,Year_Released,Record_Label,Album_id)
    values('Abbey Road', 'b4732', 1969, 'Conover Records', 'a1');
INSERT INTO Album(Album,Band_id,Year_Released,Record_Label,Album_id)
    values('Let It Be', 'b4732', 1970, 'Oakes Records', 'a2');
INSERT INTO Album(Album,Band_id,Year_Released,Record_Label,Album_id)
    values('Heaven and Hell', 'b3850', 1980, 'ATL Beatz', 'a3');
INSERT INTO Album(Album,Band_id,Year_Released,Record_Label,Album_id)
    values('Physical Graffiti', 'b4654', 1980, 'Tang Records', 'a4');
INSERT INTO Album(Album,Band_id,Year_Released,Record_Label,Album_id)
    values('Coda', 'b4654', 1982, 'CSC Records', 'a5');
INSERT INTO Album(Album,Band_id,Year_Released,Record_Label,Album_id)
    values('Sticky Fingers', 'b1028', 1971, 'SCS Records', 'a6');
INSERT INTO Album(Album,Band_id,Year_Released,Record_Label,Album_id)
    values('The Dark Side of the Moon', 'b1028', 1973, 'SCS Records', 'a7');
INSERT INTO Album(Album,Band_id,Year_Released,Record_Label,Album_id)
    values('Wish You Were Here', 'b9853', 1975, 'WYWH Records', 'a8');
INSERT INTO Album(Album,Band_id,Year_Released,Record_Label,Album_id)
    values('Appetite for Destruction', 'b8796', 1987, 'Gunz Records', 'a9');
INSERT INTO Album(Album,Band_id,Year_Released,Record_Label,Album_id)
    values('...And Justice for All', 'b5840', 1988, 'Wowza Records', 'a10');
INSERT INTO Album(Album,Band_id,Year_Released,Record_Label,Album_id)
    values('Toys in the Attic', 'b5769', 1975, 'TIA Records', 'a11');
INSERT INTO Album(Album,Band_id,Year_Released,Record_Label,Album_id)
    values('Road to Ruin', 'b2234', 1978, 'RtR Records', 'a12');
INSERT INTO Album(Album,Band_id,Year_Released,Record_Label,Album_id)
    values('T.N.T.', 'b0505', 1979, 'ACDC Records', 'a13');
INSERT INTO Album(Album,Band_id,Year_Released,Record_Label,Album_id)
    values('Back in Black', 'b0505', 1975, 'ACDC Records', 'a14');
INSERT INTO Album(Album,Band_id,Year_Released,Record_Label,Album_id)
    values('Highway to Hell', 'b0505', 1979, 'ACDC Records', 'a15');


---------------------- INSERTING SONGS ----------------------

INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Come Together', '00:04:19', 1969, 'b4732', 'Abbey Road', 's47321');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Something', '00:03:03', 1969, 'b4732' ,'Abbey Road', 's47322');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Maxwells Silver Hammer', '00:03:27', 1969, 'b4732', 'Abbey Road', 's47323');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Oh! Darling', '00:03:27', 1969, 'b4732' ,'Abbey Road', 's47324');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Octopuss Garden', '00:02:51', 1969, 'b4732' ,'Abbey Road', 's47325');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('I Want You (Shes So Heavy)', '00:07:47', 1969, 'b4732', 'Abbey Road', 's47326');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Here Comes the Sun', '00:03:06', 1969, 'b4732', 'Abbey Road', 's47327');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Because', '00:02:46', 1969, 'b4732' ,'Abbey Road', 's47328');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('You Never Give Me Your Money', '00:04:02', 1969, 'b4732', 'Abbey Road', 's47329');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Sun King', '00:02:26', 1969, 'b4732' ,'Abbey Road', 's437210');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Mean Mr.Mustard', '00:01:06', 1969, 'b4732' ,'Abbey Road', 's437211');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Polythene Pam', '00:01:13', 1969, 'b4732', 'Abbey Road', 's437212');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('She Came in Through the Bathroom', '00:01:58', 1969, 'b4732', 'Abbey Road', 's437213');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Golden Slumbers', '00:01:32', 1969, 'b4732' ,'Abbey Road', 's437214');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Carry That Weight', '00:01:37', 1969, 'b4732', 'Abbey Road', 's437215');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('The End', '00:02:20', 1969, 'b4732' ,'Abbey Road', 's437216');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Her Majesty', '00:00:23', 1969, 'b4732', 'Abbey Road', 's437217');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Let It Be', '00:04:03', 1970, 'b4732' ,'Let It Be', 's437223');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Neon Lights', '00:03:53', 1980, 'b3850', 'Heaven and Hell', 's38501');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('The Rover', '00:05:37', 1975, 'b4654', 'Physical Graffiti', 's46542');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Were Gonna Grove', '00:02:38', 1982, 'b4654', 'Coda', 's465416');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Sway', '00:03:53', 1971, 'b1028', 'Sticky Fingers', 's10282');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('On the Run', '00:03:35', 1973, 'b9853', 'The Dark Side of the Moon', 's98532');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Welcome to the Machine', '00:07:27', 1975, 'b9853', 'Wish You Were Here', 's985311');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Welcome to the Jungle', '00:04:34', 1987, 'b8796', 'Appetite for Destruction', 's87961');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Blackened', '00:06:42', 1988, 'b5840', '...And Justice for All', 's58401');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Uncle Salty', '00:04:10', 1975, 'b5769' ,'Toys in the Attic', 's57692');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('I Wanted Everything', '00:03:19', 1978, 'b2234', 'Road to Ruin', 's22342');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('T.N.T.', '00:03:42', 1979, 'b0505', 'T.N.T.', 's05051');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Back in Black', '00:04:14', 1975, 'b050', 'Back in Black', 's05052');
INSERT INTO Song(Name, Duration, Year_Released, Band_id, Album, Song_id)
    Values('Highway to Hell', '00:03:28', 1979, 'b0505', 'Highway to Hell', 's05053');





---------------------- INSERTING ALBUM TRACKS ----------------------

INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s47321');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s47322');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s47323');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s47324');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s47325');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s47326');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s47327');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s47328');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s47329');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s473210');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s473211');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s473212');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s473213');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s473214');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s473215');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s473216');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a1','s473217');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a2','s437223');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a3','s38501');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a4','s46542');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a5','s465416');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a6','s10282');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a7','s98532');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a8','s985311');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a9','s87961');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a10','s58401');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a11','s57692');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a12','s22342');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a13','s05051');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a14','s05052');
INSERT INTO AlbumTracks(Album_id,Song_id)
    Values('a15','s05053');




---------------------- INSERTING PERFORMANCES ----------------------

INSERT INTO Performance(Venue_id,Band_id,Performance_date,Duration,Performance_id)
    Values('v01','b2234','1985-3-5','00:04:32','p22341');
INSERT INTO Performance(Venue_id,Band_id,Performance_date,Duration,Performance_id)
    Values('v02','b0505','1996-4-9','00:04:32','p05051');
INSERT INTO Performance(Venue_id,Band_id,Performance_date,Duration,Performance_id)
    Values('v03','b3850','1990-4-9','00:04:32','p38501');
INSERT INTO Performance(Venue_id,Band_id,Performance_date,Duration,Performance_id)
    Values('v04','b3829','2009-2-4','00:04:32','p38291');
INSERT INTO Performance(Venue_id,Band_id,Performance_date,Duration,Performance_id)
    Values('v05','b1028','1995-1-1','00:04:32','p10281');
INSERT INTO Performance(Venue_id,Band_id,Performance_date,Duration,Performance_id)
    Values('v06','b9853','2002-10-5','00:04:32','p98531');
INSERT INTO Performance(Venue_id,Band_id,Performance_date,Duration,Performance_id)
    Values('v07','b8796','1999-12-4','00:04:32','p87962');
INSERT INTO Performance(Venue_id,Band_id,Performance_date,Duration,Performance_id)
    Values('v08','b5840','1995-8-8','00:04:32','p58401');
INSERT INTO Performance(Venue_id,Band_id,Performance_date,Duration,Performance_id)
    Values('v09','b5840','1988-11-4','00:04:32','p58402');
INSERT INTO Performance(Venue_id,Band_id,Performance_date,Duration,Performance_id)
    Values('v10','b5769','2002-10-9','00:04:32','p57691');
INSERT INTO Performance(Venue_id,Band_id,Performance_date,Duration,Performance_id)
    Values('v11','b4732','1998-9-9','00:04:32','p47321');



---------------------- INSERTING VENUES ----------------------

INSERT INTO Venue(Name, Address, City, State, Date_opened, Date_closed, Venue_id)
    Values('Gorge Amphitheatre', '754 Silica Road Northwest', 'George', 'WA', 1985, NULL,'v01');
INSERT INTO Venue(Name, Address, City, State, Date_opened, Date_closed, Venue_id)
    Values('72 Meadowbrook Ln', 'Gilford', 'NH',1996,NULL,'v02');
INSERT INTO Venue(Name, Address, City, State, Date_opened, Date_closed, Venue_id)
    Values('901 W Sprague Ave','Spokane','WA',1915,NULL,'v03');
INSERT INTO Venue(Name, Address, City, State, Date_opened, Date_closed, Venue_id)
    Values('500 Jefferson Ave', 'Toledo', 'OH', 1915, NULL,'v04');
INSERT INTO Venue(Name, Address, City, State, Date_opened, Date_closed, Venue_id)
    Values('6 Championship Dr', 'Auburn Hills', 'MI', 1988,2017,'v05');
INSERT INTO Venue(Name, Address, City, State, Date_opened, Date_closed, Venue_id)
    Values('1001 Performance Pl', 'Grand Prarie', 'TX', 2002,NULL,'v06');
INSERT INTO Venue(Name, Address, City, State, Date_opened, Date_closed, Venue_id)
    Values('12880 E 146th St', 'Noblesvilli', 'IN', 1989,NULL,'v07');
INSERT INTO Venue(Name, Address, City, State, Date_opened, Date_closed, Venue_id)
    Values('2401 W Wisconsin Ave', 'Milwaukee', 'WI',1927,NULL,'v08');
INSERT INTO Venue(Name, Address, City, State, Date_opened, Date_closed, Venue_id)
    Values('885 S Main St', 'Mansfield', 'MA',1986,NULL,'v09');
INSERT INTO Venue(Name, Address, City, State, Date_opened, Date_closed, Venue_id)
    Values('15 Lansdowne','Boston','MA', 1992,NULL,'v10');
INSERT INTO Venue(Name, Address, City, State, Date_opened, Date_closed, Venue_id)
    Values('5515 Wilshire Blvd', 'Los Angeles', 'CA', 1936,NULL,'v11');


---------------------- INSERTING SHOWS ATTENDED ----------------------

INSERT INTO ShowsAttended(User_id, Performance_id)
    Values('e9302049','p22341');
INSERT INTO ShowsAttended(User_id, Performance_id)
    Values('e9302049','p05051');
INSERT INTO ShowsAttended(User_id, Performance_id)
    Values('e8603543','p87962');
INSERT INTO ShowsAttended(User_id, Performance_id)
    Values('e1029472','p38501');
INSERT INTO ShowsAttended(User_id, Performance_id)
    Values('e9475934','p38291');
INSERT INTO ShowsAttended(User_id, Performance_id)
    Values('e8462344','p10281');
INSERT INTO ShowsAttended(User_id, Performance_id)
    Values('e3959303','p98531');
INSERT INTO ShowsAttended(User_id, Performance_id)
    Values('e4857293','p58401');
INSERT INTO ShowsAttended(User_id, Performance_id)
    Values('e9475734','p58402');
INSERT INTO ShowsAttended(User_id, Performance_id)
    Values('e4757434','p57691');
INSERT INTO ShowsAttended(User_id, Performance_id)
    Values('e8473645','p47321');

---------------------- INSERTING FAVORITE BANDS ----------------------

INSERT INTO FavoriteBands(User_id,Band_id0)
    Values('e9302049','b4732');
INSERT INTO FavoriteBands(User_id,Band_id0)
    Values('e8603543','b3850');
INSERT INTO FavoriteBands(User_id,Band_id0)
    Values('e1029472','b4654');
INSERT INTO FavoriteBands(User_id,Band_id0)
    Values('e9475934','b1028');
INSERT INTO FavoriteBands(User_id,Band_id0)
    Values('e8462344','b8796');
INSERT INTO FavoriteBands(User_id,Band_id0)
    Values('e3959303','b8796');
INSERT INTO FavoriteBands(User_id,Band_id0)
    Values('e4857293','b5840');
INSERT INTO FavoriteBands(User_id,Band_id0)
    Values('e9475734','b5769');
INSERT INTO FavoriteBands(User_id,Band_id0)
    Values('e4757434','b3850');
INSERT INTO FavoriteBands(User_id,Band_id0)
    Values('e8473645','b4654');


---------------------- BAND MEMBERS ----------------------

INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b4732', 'John','Lennon',9,'Guitar');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b4732', 'Paul','McCartney',10,'Vocals');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b4732', 'Ringo','Starr',8,'Drums');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b4732', 'George','Harrison',10,'Guitar');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b4732', 'Pete','Best',2,'Drums');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b4732', 'Stuart','Little',1,'Bass');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b3850', 'Tony','Lommi',49,'Guitar');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b3850', 'Geezer','Butler',29,'Bass');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b3850', 'Ozzy','Osbourne',22,'Vocals');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b3850', 'Bill','Ward',34,'Drums');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b3850', 'Geoff','Nicholls',25,'Keyboards');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b4654','Jimmy','Page',12,'Guitar');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b4654','Robert','Plant',12,'Vocals');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b1028','Mick','Jagger',55,'Guitar');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b1028','Keith','Richards',55,'Piano');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b9853','Nick','Mason',29,'Drums');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b9853','Roger','Waters',20,'Vocals');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b8796','Saul','Hudson',32,'Guitar');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b8796','Axl','Rose',32,'Vocals');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b5840','James','Hetfield',36,'Vocals');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b5840','Lars','Ulrich',36,'Guitar');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b5769','Steven','Tyler',47,'Vocals');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b5769','Joe','Perry',47,'Guitar');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b0505','Angus','Young',44,'Guitar');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b0505','Chris','Slade',7,'Drums');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b3829','Billie','Armstrong',31,'Piano');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b3829','Tre','Cool',27,'Drums');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b2234','Joey','Ramone',22,'Drums');
INSERT INTO BandMembers(Band_id,Member_fname,Member_lname,Years_active,Instrument)
    Values('b2234','Dee Dee','Ramone',15,'Bass');


---------------------- SETLIST ----------------------

INSERT INTO Setlist(Performance_id,Song_id)
    Values('p22341','s22341');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p22341','s22342');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p22341','s22343');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p22341','s22344');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p22341','s22345');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p22341','s22346');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p22341','s22347');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p22341','s22348');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p05051','s05051');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p05051','s05052');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p05051','s05053');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p38501','s38501');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p38501','s38502');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p38501','s38503');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p38501','s38504');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p38501','s38505');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p38291','s38291');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p10281','s10281');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p10281','s10282');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p10281','s10283');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p10281','s10284');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p10281','s10285');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p10281','s10286');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p10281','s10287');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p98531','s98531');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p98531','s98532');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p98531','s98533');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p98531','s98534');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p98531','s98535');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p98531','s98536');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p87962','s87961');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p87962','s87962');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p87962','s87963');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p87962','s87964');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p87962','s87965');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p58401','s58402');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p58401','s58403');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p58401','s58404');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p58401','s58405');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p58401','s58406');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p58402','s58407');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p58402','s58408');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p58402','s58409');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p58402','s58410');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p58402','s58411');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p57691','s57691');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p57691','s57692');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p57691','s57693');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p57691','s57694');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p47321','s47321');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p47321','s47322');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p47321','s47323');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p47321','s47324');
INSERT INTO Setlist(Performance_id,Song_id)
    Values('p47321','s47325');